[CmdletBinding()]
param(
    [string] $ProjectRoot,
    [string] $ThemeSlug = 'two-bit-alchemy',
    [string] $OutputPath
)

$ErrorActionPreference = 'Stop'

if (-not $ProjectRoot) {
    $scriptRoot = if ($PSScriptRoot) { $PSScriptRoot } else { Split-Path -Parent $MyInvocation.MyCommand.Path }
    $ProjectRoot = (Resolve-Path (Join-Path $scriptRoot '..')).Path
}

if (-not $OutputPath) {
    $OutputPath = Join-Path $ProjectRoot "dist\$ThemeSlug.zip"
}

$themeRoot = Join-Path $ProjectRoot "src\themes\$ThemeSlug"
$distRoot = Split-Path -Parent $OutputPath

if (-not (Test-Path -LiteralPath $themeRoot -PathType Container)) {
    throw "Theme folder not found: $themeRoot"
}

New-Item -ItemType Directory -Force -Path $distRoot | Out-Null

if (Test-Path -LiteralPath $OutputPath) {
    Remove-Item -LiteralPath $OutputPath -Force
}

Add-Type -AssemblyName System.IO.Compression
Add-Type -AssemblyName System.IO.Compression.FileSystem

$zip = [System.IO.Compression.ZipFile]::Open(
    $OutputPath,
    [System.IO.Compression.ZipArchiveMode]::Create
)

try {
    $zip.CreateEntry("$ThemeSlug/") | Out-Null

    Get-ChildItem -LiteralPath $themeRoot -Recurse -Directory |
        Sort-Object FullName |
        ForEach-Object {
            $relative = $_.FullName.Substring($themeRoot.Length + 1).Replace('\', '/')
            $entryName = "$ThemeSlug/$($relative.TrimEnd('/'))/"
            $zip.CreateEntry($entryName) | Out-Null
        }

    Get-ChildItem -LiteralPath $themeRoot -Recurse -File |
        Sort-Object FullName |
        ForEach-Object {
            $relative = $_.FullName.Substring($themeRoot.Length + 1).Replace('\', '/')
            $entryName = "$ThemeSlug/$relative"
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

$archive = [System.IO.Compression.ZipFile]::OpenRead($OutputPath)
try {
    $paths = @($archive.Entries | ForEach-Object { $_.FullName })

    if ($paths.Count -eq 0) {
        throw "Theme ZIP is empty: $OutputPath"
    }

    $invalidTopLevel = @(
        $paths |
            Where-Object { -not $_.StartsWith("$ThemeSlug/") } |
            Sort-Object -Unique
    )

    if ($invalidTopLevel.Count -gt 0) {
        throw "Theme ZIP contains entries outside $ThemeSlug/: $($invalidTopLevel -join ', ')"
    }

    $forbiddenPrefixes = @('src/', 'themes/', 'dist/')
    foreach ($prefix in $forbiddenPrefixes) {
        $matches = @($paths | Where-Object { $_.StartsWith($prefix) })
        if ($matches.Count -gt 0) {
            throw "Theme ZIP contains forbidden enclosing path '$prefix'."
        }
    }

    $requiredFiles = @(
        "$ThemeSlug/style.css",
        "$ThemeSlug/functions.php",
        "$ThemeSlug/index.php",
        "$ThemeSlug/theme.json",
        "$ThemeSlug/front-page.php",
        "$ThemeSlug/page.php",
        "$ThemeSlug/single.php",
        "$ThemeSlug/archive.php",
        "$ThemeSlug/category.php",
        "$ThemeSlug/404.php",
        "$ThemeSlug/inc/setup.php",
        "$ThemeSlug/inc/enqueue.php",
        "$ThemeSlug/inc/template-tags.php",
        "$ThemeSlug/inc/image-sizes.php",
        "$ThemeSlug/inc/cabinet-exhibits.php",
        "$ThemeSlug/assets/css/main.css",
        "$ThemeSlug/assets/css/editor.css",
        "$ThemeSlug/assets/css/print.css",
        "$ThemeSlug/template-parts/site-header.php",
        "$ThemeSlug/template-parts/site-footer.php",
        "$ThemeSlug/template-parts/primary-navigation.php",
        "$ThemeSlug/templates/page-cabinet.php"
    )

    foreach ($requiredFile in $requiredFiles) {
        if ($paths -notcontains $requiredFile) {
            throw "Theme ZIP missing required file: $requiredFile"
        }
    }

    $topLevels = @(
        $paths |
            ForEach-Object { $_.Split('/')[0] } |
            Where-Object { $_ } |
            Sort-Object -Unique
    )

    if ($topLevels.Count -ne 1 -or $topLevels[0] -ne $ThemeSlug) {
        throw "Theme ZIP must contain exactly one top-level folder named $ThemeSlug/. Found: $($topLevels -join ', ')"
    }

    $children = New-Object 'System.Collections.Generic.HashSet[string]'
    foreach ($path in $paths) {
        $rest = $path.Substring("$ThemeSlug/".Length)
        if ($rest.Length -eq 0) {
            continue
        }

        $first = $rest.Split('/')[0]
        if ($rest.Contains('/')) {
            [void] $children.Add("$first/")
        } else {
            [void] $children.Add($first)
        }
    }

    Write-Host "Built and validated: $OutputPath"
    Write-Host ''
    Write-Host 'Verified top-level ZIP tree:'
    Write-Host "$ThemeSlug/"
    $children |
        Sort-Object |
        ForEach-Object { Write-Host "  $_" }

    Write-Host ''
    Write-Host 'First 20 ZIP paths:'
    $paths |
        Sort-Object |
        Select-Object -First 20 |
        ForEach-Object { Write-Host $_ }
} finally {
    $archive.Dispose()
}
