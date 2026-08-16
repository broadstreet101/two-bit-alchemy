[CmdletBinding()]
param(
    [string] $HostAlias = 'tba-ionos',
    [int] $MaxDepth = 7
)

$ErrorActionPreference = 'Stop'

function Invoke-RemoteShellScript {
    param(
        [string] $HostAlias,
        [string] $Script
    )

    if ($HostAlias -notmatch '^[A-Za-z0-9._-]+$') {
        throw 'HostAlias contains unsupported characters.'
    }

    $processInfo = New-Object System.Diagnostics.ProcessStartInfo
    $processInfo.FileName = 'ssh'
    $processInfo.Arguments = "-o BatchMode=yes -o ConnectTimeout=15 $HostAlias sh -s"
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

    if ($process.ExitCode -ne 0) {
        if ($stderr) {
            Write-Error $stderr
        }

        throw "Remote discovery failed with exit code $($process.ExitCode)."
    }

    if ($stderr) {
        Write-Warning $stderr
    }

    $stdout
}

if ($MaxDepth -lt 1 -or $MaxDepth -gt 12) {
    throw 'MaxDepth must be between 1 and 12.'
}

$remoteScript = @'
set -eu

printf 'REMOTE_HOME=%s\n' "$HOME"
printf 'REMOTE_PWD=%s\n' "$(pwd)"
printf 'PHP_BIN=%s\n' "$(command -v php || true)"
if command -v php >/dev/null 2>&1; then
    php -v | sed -n '1s/^/PHP_VERSION=/p'
fi

printf 'WP_CLI_BIN=%s\n' "$(command -v wp || true)"
if command -v wp >/dev/null 2>&1; then
    wp --info 2>/dev/null | sed 's/^/WP_CLI_INFO=/'
fi

printf 'UNZIP_BIN=%s\n' "$(command -v unzip || true)"
printf 'TAR_BIN=%s\n' "$(command -v tar || true)"

printf 'WEBSPACE_TOP_LEVEL_BEGIN\n'
find "$HOME" -maxdepth 2 -type d 2>/dev/null | sort | sed 's/^/WEBSPACE_DIR=/'
printf 'WEBSPACE_TOP_LEVEL_END\n'

find "$HOME" -maxdepth __MAX_DEPTH__ -type f -name wp-config.php 2>/dev/null | sort | while IFS= read -r config_file; do
    wp_root=$(dirname "$config_file")
    wp_content="$wp_root/wp-content"
    themes_dir="$wp_content/themes"
    tba_theme="$themes_dir/two-bit-alchemy"

    printf 'WORDPRESS_ROOT=%s\n' "$wp_root"

    if [ -d "$wp_content" ]; then
        printf 'WP_CONTENT=%s\n' "$wp_content"
    fi

    if [ -d "$themes_dir" ]; then
        printf 'THEMES_DIR=%s\n' "$themes_dir"
    fi

    if [ -d "$tba_theme" ]; then
        printf 'TBA_THEME_DIR=%s\n' "$tba_theme"
        for required_file in style.css functions.php index.php theme.json; do
            if [ -f "$tba_theme/$required_file" ]; then
                printf 'TBA_THEME_FILE_OK=%s\n' "$required_file"
            else
                printf 'TBA_THEME_FILE_MISSING=%s\n' "$required_file"
            fi
        done
    fi
done
'@.Replace('__MAX_DEPTH__', [string] $MaxDepth)

Write-Host "Running read-only WordPress path discovery through SSH alias '$HostAlias'..."
Write-Host 'No files will be uploaded, edited, deleted, activated, or published.'
Write-Host ''

Invoke-RemoteShellScript -HostAlias $HostAlias -Script $remoteScript
