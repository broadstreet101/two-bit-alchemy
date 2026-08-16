[CmdletBinding()]
param(
    [string] $HostAlias = 'tba-ionos',
    [string] $RemoteThemePath,
    [switch] $ValidateOnly,
    [switch] $ConfirmDeploy
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
        throw "Remote deployment command failed with exit code $($process.ExitCode)."
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

$packageScript = Join-Path $PSScriptRoot 'package-theme.ps1'
$zipPath = Join-Path $projectRoot 'dist\two-bit-alchemy.zip'

& powershell.exe -NoProfile -ExecutionPolicy Bypass -File $packageScript
if ($LASTEXITCODE -ne 0) {
    throw 'Theme package validation failed. Deployment refused.'
}

if (-not (Test-Path -LiteralPath $zipPath -PathType Leaf)) {
    throw "Validated theme ZIP not found: $zipPath"
}

if ($ValidateOnly) {
    $validateScript = @'
set -eu

theme_path="$1"

case "$theme_path" in
    */wp-content/themes/two-bit-alchemy|*/wp-content/themes/two-bit-alchemy/) ;;
    *)
        echo "Unexpected theme path: $theme_path" >&2
        exit 30
        ;;
esac

theme_path="${theme_path%/}"
themes_dir=$(dirname "$theme_path")

[ -d "$themes_dir" ] || { echo "Themes directory not found: $themes_dir" >&2; exit 31; }
[ -d "$theme_path" ] || { echo "Theme directory not found: $theme_path" >&2; exit 32; }

for required_file in style.css functions.php index.php theme.json; do
    [ -f "$theme_path/$required_file" ] || {
        echo "Remote theme missing required file: $required_file" >&2
        exit 33
    }
done

echo "VALIDATE_DEPLOY_TARGET=$theme_path"
echo "VALIDATE_DEPLOY_REQUIRED_FILES=ok"
echo "VALIDATE_DEPLOY_MODE=read-only"
'@

    $quotedThemePath = Quote-Remote -Value $RemoteThemePath
    Invoke-RemoteShellScript -HostAlias $HostAlias -Script $validateScript -RemoteArguments $quotedThemePath
    Write-Host 'Deployment validation completed without remote writes.'
    return
}

if (-not $ConfirmDeploy) {
    throw 'Refusing remote deployment. Re-run with -ConfirmDeploy after Dada explicitly authorizes deployment.'
}

$timestamp = Get-Date -Format 'yyyyMMdd-HHmmss'
$remoteDeployDir = ".tba-theme-deploy/$timestamp"
$remotePackagePath = "$remoteDeployDir/two-bit-alchemy.zip"

Write-Host "Preparing remote deployment staging directory on '$HostAlias'..."
& ssh -o BatchMode=yes -o ConnectTimeout=15 $HostAlias "mkdir -p '$remoteDeployDir'"
if ($LASTEXITCODE -ne 0) {
    throw 'Unable to create remote deployment staging directory.'
}

Write-Host 'Uploading validated theme package to remote staging...'
& scp -o BatchMode=yes $zipPath "${HostAlias}:$remotePackagePath"
if ($LASTEXITCODE -ne 0) {
    throw 'Theme package upload failed.'
}

$remoteScript = @'
set -eu

theme_path="$1"
package_path="$2"
timestamp="$3"
backup_root="$HOME/tba-theme-backups"

case "$theme_path" in
    */wp-content/themes/two-bit-alchemy|*/wp-content/themes/two-bit-alchemy/) ;;
    *)
        echo "Refusing deployment: unexpected theme path: $theme_path" >&2
        exit 10
        ;;
esac

theme_path="${theme_path%/}"
themes_dir=$(dirname "$theme_path")
backup_path="$backup_root/two-bit-alchemy-$timestamp"
stage_dir="$HOME/.tba-theme-deploy/stage-$timestamp"

[ -d "$themes_dir" ] || { echo "Themes directory not found: $themes_dir" >&2; exit 11; }
[ -d "$theme_path" ] || { echo "Current theme directory not found: $theme_path" >&2; exit 12; }
[ -f "$theme_path/style.css" ] || { echo "Current theme missing style.css: $theme_path" >&2; exit 13; }
[ -f "$package_path" ] || { echo "Uploaded package not found: $package_path" >&2; exit 14; }
command -v unzip >/dev/null 2>&1 || { echo "Remote unzip command not available." >&2; exit 15; }

rm -rf "$stage_dir"
mkdir -p "$stage_dir" "$backup_root"
unzip -q "$package_path" -d "$stage_dir"

for required_file in style.css functions.php index.php theme.json; do
    [ -f "$stage_dir/two-bit-alchemy/$required_file" ] || {
        echo "Staged package missing required file: $required_file" >&2
        exit 16
    }
done

cp -a "$theme_path" "$backup_path"
printf '%s\n' "$backup_path" > "$backup_root/latest-two-bit-alchemy-backup.txt"

rm -rf "$theme_path"
cp -a "$stage_dir/two-bit-alchemy" "$theme_path"

for required_file in style.css functions.php index.php theme.json; do
    [ -f "$theme_path/$required_file" ] || {
        echo "Deployed theme missing required file: $required_file" >&2
        exit 17
    }
done

echo "DEPLOYED_THEME=$theme_path"
echo "BACKUP_PATH=$backup_path"
echo "ROLLBACK_MARKER=$backup_root/latest-two-bit-alchemy-backup.txt"
'@

$quotedThemePath = Quote-Remote -Value $RemoteThemePath
$quotedPackagePath = Quote-Remote -Value $remotePackagePath
$quotedTimestamp = Quote-Remote -Value $timestamp

Write-Host 'Creating remote backup and deploying theme files...'
Invoke-RemoteShellScript -HostAlias $HostAlias -Script $remoteScript -RemoteArguments "$quotedThemePath $quotedPackagePath $quotedTimestamp"

Write-Host 'Deployment completed. WordPress theme activation and content publication were not changed.'
