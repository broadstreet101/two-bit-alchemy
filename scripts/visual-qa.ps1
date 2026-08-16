[CmdletBinding()]
param(
    [string] $BaseUrl = 'https://twobitalchemy.com'
)

$ErrorActionPreference = 'Stop'

$projectRoot = (Resolve-Path (Join-Path $PSScriptRoot '..')).Path
$runner = Join-Path $projectRoot 'tools\visual-qa\run-visual-qa.mjs'

if (-not (Get-Command node -ErrorAction SilentlyContinue)) {
    throw 'Node.js is required to run visual QA.'
}

if (-not (Test-Path -LiteralPath $runner -PathType Leaf)) {
    throw "Visual QA runner not found: $runner"
}

$env:TBA_VISUAL_QA_BASE_URL = $BaseUrl

Push-Location $projectRoot
try {
    & node $runner
    exit $LASTEXITCODE
}
finally {
    Pop-Location
    Remove-Item Env:\TBA_VISUAL_QA_BASE_URL -ErrorAction SilentlyContinue
}
