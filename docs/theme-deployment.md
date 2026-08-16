# Theme Deployment

This document explains how to package, install, activate, and roll back the Two-Bit Alchemy WordPress theme. The repository remains the source of truth.

## Package The Theme

Package the theme from the repository root so the ZIP contains the `two-bit-alchemy` folder with `style.css`, `functions.php`, and `theme.json` at that folder root.

Use the repository packaging script for review or release packages:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\package-theme.ps1
```

The script builds `dist/two-bit-alchemy.zip`, verifies the archive structure, confirms required theme files, rejects accidental enclosing folders such as `src/`, `themes/`, or `dist/`, and reports the archive contents.

The ZIP must contain:

```text
two-bit-alchemy/
|-- style.css
|-- functions.php
|-- index.php
|-- theme.json
`-- ...
```

Do not upload a package unless `two-bit-alchemy/style.css` is verified inside the archive.

## Remote Deployment Foundation

Remote deployment tooling exists for future approved deployments:

- `scripts\discover-wordpress-remote.ps1`
- `scripts\deploy-theme.ps1`
- `scripts\rollback-theme.ps1`

See `docs/remote-deployment.md` before using these scripts.

Remote deployment is not automatic. It requires SSH authentication, a verified remote theme path, a current backup, and explicit approval. It deploys theme files only and does not activate themes, publish content, change WordPress settings, change the database, or change Cabinet draft/published status.

### Manual Packaging Reference

PowerShell example:

```powershell
New-Item -ItemType Directory -Force dist

$themeRoot = (Resolve-Path 'src/themes/two-bit-alchemy').Path.TrimEnd('\')
$zipPath = Join-Path (Resolve-Path 'dist') 'two-bit-alchemy.zip'

if (Test-Path $zipPath) {
    Remove-Item -LiteralPath $zipPath -Force
}

Add-Type -AssemblyName System.IO.Compression
Add-Type -AssemblyName System.IO.Compression.FileSystem

$zip = [System.IO.Compression.ZipFile]::Open(
    $zipPath,
    [System.IO.Compression.ZipArchiveMode]::Create
)

try {
    $zip.CreateEntry('two-bit-alchemy/') | Out-Null

    Get-ChildItem -LiteralPath $themeRoot -Recurse -Directory | Sort-Object FullName | ForEach-Object {
        $relative = $_.FullName.Substring($themeRoot.Length + 1).Replace('\', '/')
        $entryName = 'two-bit-alchemy/' + $relative.TrimEnd('/') + '/'

        $zip.CreateEntry($entryName) | Out-Null
    }

    Get-ChildItem -LiteralPath $themeRoot -Recurse -File | Sort-Object FullName | ForEach-Object {
        $relative = $_.FullName.Substring($themeRoot.Length + 1).Replace('\', '/')
        $entryName = 'two-bit-alchemy/' + $relative

        [System.IO.Compression.ZipFileExtensions]::CreateEntryFromFile(
            $zip,
            $_.FullName,
            $entryName,
            [System.IO.Compression.CompressionLevel]::Optimal
        ) | Out-Null
    }
} finally {
    $zip.Dispose()
}
```

This creates explicit folder entries and forward-slash ZIP paths so WordPress sees `two-bit-alchemy/style.css` directly inside the theme folder. Avoid `Compress-Archive` for this package because it can create backslash paths inside the ZIP on Windows.

## Install In WordPress

1. Sign in to WordPress with administrator access.
2. Go to Appearance > Themes.
3. Choose Add New.
4. Choose Upload Theme.
5. Upload `dist/two-bit-alchemy.zip`.
6. Choose Install Now.

Do not activate immediately unless the backup and review steps below are complete.

## Activate Safely

Before activation:

- Confirm a recent full-site backup exists, including files and database.
- Confirm the previous theme name and version.
- If staging is available, install and test the theme there first.
- Preview the theme in WordPress before activation when possible.
- Confirm key pages, posts, archives, menus, media, and forms are ready for review.

After activation:

- Test the homepage.
- Test Projects, Field Notes, Workshop Journal, Cabinet, About, and Contact.
- Test at least one post, one category archive, and the 404 page.
- Test keyboard navigation and visible focus states.
- Confirm images render at expected sizes.
- Confirm no critical errors appear in WordPress admin or the public site.

## Roll Back

If the site needs to return to the previous theme:

1. Go to Appearance > Themes.
2. Activate the previous working theme.
3. Clear any hosting or caching layers if they are active.
4. Recheck the homepage, navigation, representative pages, and posts.

If WordPress admin is unavailable, use the hosting file manager or SFTP to rename the `two-bit-alchemy` theme folder, then restore the previous theme or restore from backup as needed.

## Live Site Policy

No live WordPress changes should happen until the inspection, backup, and approval steps are complete. Manual WordPress admin work should remain limited to theme upload, activation, menus, media, content, unavoidable configuration, and final testing.
