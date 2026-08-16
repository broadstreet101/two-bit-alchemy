[CmdletBinding()]
param(
    [string] $HostAlias = 'tba-ionos',
    [string] $RemoteThemePath,
    [string] $BackupPath,
    [switch] $ValidateOnly,
    [switch] $ConfirmRollback
)

$ErrorActionPreference = 'Stop'

function Assert-SafeRemoteThemePath {
    param([string] $Path)

    if ([string]::IsNullOrWhiteSpace($Path)) {
        throw 'RemoteThemePath is required.'
    }

    if (-not $Path.StartsWith('/')) {
        throw 'RemoteThemePath must be an absolute remote path.'
    }

    if ($Path.Contains("'")) {
        throw 'RemoteThemePath must not contain single quotes.'
    }

    if ($Path -notmatch '/wp-content/themes/two-bit-alchemy/?$') {
        throw 'RemoteThemePath must end with /wp-content/themes/two-bit-alchemy.'
    }
}

function Assert-SafeHostAlias {
    param([string] $Alias)

    if ($Alias -notmatch '^[A-Za-z0-9._-]+$') {
        throw 'HostAlias contains unsupported characters.'
    }
}

function Quote-Remote {
    param([string] $Value)

    if ($Value.Contains("'")) {
        throw 'Remote shell arguments must not contain single quotes.'
    }

    "'$Value'"
}

function Invoke-RemoteShellScript {
    param(
        [string] $HostAlias,
        [string] $Script,
        [string] $RemoteArguments
    )

    Assert-SafeHostAlias -Alias $HostAlias

    $processInfo = New-Object System.Diagnostics.ProcessStartInfo
    $processInfo.FileName = 'ssh'
    $processInfo.Arguments = "-o BatchMode=yes -o ConnectTimeout=15 $HostAlias sh -s -- $RemoteArguments"
    $processInfo.UseShellExecute = $false
    $processInfo.RedirectStandardInput = $true
    $processInfo.RedirectStandardOutput = $true
    $processInfo.RedirectStandardError = $true
    $processInfo.CreateNoWindow = $true

    $process = [System.Diagnostics.Process]::Start($processInfo)
    $lfScript = $Script -replace "`r`n", "`n"
    $process.StandardInput.NewLine = "`n"
    $process.StandardInput.Write($lfScript)
    if (-not $lfScript.EndsWith("`n")) {
        $process.StandardInput.Write("`n")
    }
    $process.StandardInput.Close()

    $stdout = $process.StandardOutput.ReadToEnd()
    $stderr = $process.StandardError.ReadToEnd()
    $process.WaitForExit()

    if ($stdout) {
        Write-Host $stdout
    }

    if ($stderr) {
        Write-Error $stderr
    }

    if ($process.ExitCode -ne 0) {
        throw "Remote rollback command failed with exit code $($process.ExitCode)."
    }
}

$projectRoot = (Resolve-Path (Join-Path $PSScriptRoot '..')).Path
$configPath = Join-Path $projectRoot 'config\ionos-deployment.json'

if (Test-Path -LiteralPath $configPath -PathType Leaf) {
    $config = Get-Content -Raw -LiteralPath $configPath | ConvertFrom-Json

    if (-not $PSBoundParameters.ContainsKey('HostAlias') -and $config.ssh.hostAlias) {
        $HostAlias = $config.ssh.hostAlias
    }

    if (-not $RemoteThemePath -and $config.wordpress.twoBitAlchemyTheme) {
        $RemoteThemePath = $config.wordpress.twoBitAlchemyTheme
    }
}

Assert-SafeRemoteThemePath -Path $RemoteThemePath

if ($BackupPath -and $BackupPath.Contains("'")) {
    throw 'BackupPath must not contain single quotes.'
}

if ($ValidateOnly) {
    $validateScript = @'
set -eu

theme_path="$1"
backup_path="${2:-}"
backup_root="$HOME/tba-theme-backups"
latest_marker="$backup_root/latest-two-bit-alchemy-backup.txt"

case "$theme_path" in
    */wp-content/themes/two-bit-alchemy|*/wp-content/themes/two-bit-alchemy/) ;;
    *)
        echo "Unexpected theme path: $theme_path" >&2
        exit 40
        ;;
esac

theme_path="${theme_path%/}"
[ -d "$theme_path" ] || { echo "Theme directory not found: $theme_path" >&2; exit 41; }

for required_file in style.css functions.php index.php theme.json; do
    [ -f "$theme_path/$required_file" ] || {
        echo "Remote theme missing required file: $required_file" >&2
        exit 42
    }
done

echo "VALIDATE_ROLLBACK_TARGET=$theme_path"
echo "VALIDATE_ROLLBACK_REQUIRED_FILES=ok"

if [ -n "$backup_path" ]; then
    if [ -d "$backup_path" ]; then
        echo "VALIDATE_ROLLBACK_EXPLICIT_BACKUP=$backup_path"
    else
        echo "VALIDATE_ROLLBACK_EXPLICIT_BACKUP_MISSING=$backup_path"
    fi
elif [ -f "$latest_marker" ]; then
    echo "VALIDATE_ROLLBACK_LATEST_BACKUP=$(cat "$latest_marker")"
else
    echo "VALIDATE_ROLLBACK_BACKUP_PENDING=no deployment-script backup exists yet"
fi

echo "VALIDATE_ROLLBACK_MODE=read-only"
'@

    $quotedThemePath = Quote-Remote -Value $RemoteThemePath
    $quotedBackupPath = if ($BackupPath) { Quote-Remote -Value $BackupPath } else { "''" }
    Invoke-RemoteShellScript -HostAlias $HostAlias -Script $validateScript -RemoteArguments "$quotedThemePath $quotedBackupPath"
    Write-Host 'Rollback validation completed without remote writes.'
    return
}

if (-not $ConfirmRollback) {
    throw 'Refusing rollback. Re-run with -ConfirmRollback after Dada explicitly authorizes rollback.'
}

$remoteScript = @'
set -eu

theme_path="$1"
backup_path="${2:-}"
timestamp=$(date +%Y%m%d-%H%M%S)
backup_root="$HOME/tba-theme-backups"
latest_marker="$backup_root/latest-two-bit-alchemy-backup.txt"

case "$theme_path" in
    */wp-content/themes/two-bit-alchemy|*/wp-content/themes/two-bit-alchemy/) ;;
    *)
        echo "Refusing rollback: unexpected theme path: $theme_path" >&2
        exit 20
        ;;
esac

theme_path="${theme_path%/}"

if [ -z "$backup_path" ]; then
    [ -f "$latest_marker" ] || { echo "No latest backup marker found: $latest_marker" >&2; exit 21; }
    backup_path=$(cat "$latest_marker")
fi

case "$backup_path" in
    "$backup_root"/two-bit-alchemy-*) ;;
    *)
        echo "Refusing rollback: backup path is outside expected backup root: $backup_path" >&2
        exit 22
        ;;
esac

[ -d "$backup_path" ] || { echo "Backup directory not found: $backup_path" >&2; exit 23; }

for required_file in style.css functions.php index.php theme.json; do
    [ -f "$backup_path/$required_file" ] || {
        echo "Backup missing required file: $required_file" >&2
        exit 24
    }
done

pre_rollback_backup="$backup_root/two-bit-alchemy-pre-rollback-$timestamp"

if [ -d "$theme_path" ]; then
    cp -a "$theme_path" "$pre_rollback_backup"
fi

rm -rf "$theme_path"
cp -a "$backup_path" "$theme_path"

for required_file in style.css functions.php index.php theme.json; do
    [ -f "$theme_path/$required_file" ] || {
        echo "Restored theme missing required file: $required_file" >&2
        exit 25
    }
done

echo "RESTORED_THEME=$theme_path"
echo "RESTORED_FROM=$backup_path"
echo "PRE_ROLLBACK_BACKUP=$pre_rollback_backup"
'@

$quotedThemePath = Quote-Remote -Value $RemoteThemePath
$quotedBackupPath = if ($BackupPath) { Quote-Remote -Value $BackupPath } else { "''" }

Write-Host "Restoring Two-Bit Alchemy theme on '$HostAlias'..."
Invoke-RemoteShellScript -HostAlias $HostAlias -Script $remoteScript -RemoteArguments "$quotedThemePath $quotedBackupPath"

Write-Host 'Rollback completed. WordPress theme activation and content publication were not changed.'
