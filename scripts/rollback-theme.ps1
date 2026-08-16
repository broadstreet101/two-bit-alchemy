[CmdletBinding()]
param(
    [string] $HostAlias = 'tba-ionos',
    [Parameter(Mandatory = $true)]
    [string] $RemoteThemePath,
    [string] $BackupPath,
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

function Quote-Remote {
    param([string] $Value)

    if ($Value.Contains("'")) {
        throw 'Remote shell arguments must not contain single quotes.'
    }

    "'$Value'"
}

if (-not $ConfirmRollback) {
    throw 'Refusing rollback. Re-run with -ConfirmRollback after Dada explicitly authorizes rollback.'
}

Assert-SafeRemoteThemePath -Path $RemoteThemePath

if ($BackupPath -and $BackupPath.Contains("'")) {
    throw 'BackupPath must not contain single quotes.'
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
$remoteScript | & ssh -o BatchMode=yes -o ConnectTimeout=15 $HostAlias "sh -s -- $quotedThemePath $quotedBackupPath"
if ($LASTEXITCODE -ne 0) {
    throw 'Remote rollback failed. Review output above before retrying.'
}

Write-Host 'Rollback completed. WordPress theme activation and content publication were not changed.'
