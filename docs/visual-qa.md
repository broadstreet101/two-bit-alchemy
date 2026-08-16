# Visual QA

Two-Bit Alchemy uses automated public visual QA to reduce routine manual screenshot work after deployments.

The workflow captures public, logged-out pages only. It does not store WordPress credentials, bypass authentication, or review administrator-only draft previews.

## Tooling

- Runtime: Node.js.
- Browser automation: Playwright with Chromium.
- Wrapper script: `scripts\visual-qa.ps1`.
- Node runner: `tools\visual-qa\run-visual-qa.mjs`.

Playwright is installed as a root development dependency. It is not part of the WordPress theme and is not loaded by WordPress.

## Routes Captured

The public QA pass captures full-page screenshots at desktop and mobile widths for:

- `/`
- `/projects/`
- `/field-notes/`
- `/workshop-journal/`
- `/cabinet/`
- `/about/`
- `/contact/`

It also checks the public draft-only Cabinet exhibit URL:

- `/cabinet/a-sketch-that-was-never-meant-to-exist/`
- `/cabinet/1981-ford-escort-model/`

Those routes are expected to return the themed `404` for logged-out visitors.

## Viewports

- Desktop: `1440x1000`
- Mobile: `390x844`

## Artifacts

Screenshots and reports are written locally under:

- `qa\visual\latest\`
- `qa\visual\runs\YYYYMMDD-HHMMSS\`

These paths are Git-ignored. Do not commit visual QA screenshots or temporary browser state unless explicitly approved.

Each run produces:

- Full-page desktop screenshots.
- Full-page mobile screenshots.
- `visual-qa-report.json`
- `visual-qa-report.md`
- `index.html` contact sheet.

The report records URL, expected status, actual status, page title, screenshot paths, browser console errors, and missing or failed resource errors.

## Running Visual QA

From the project root:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\visual-qa.ps1
```

To run against a different public base URL:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\visual-qa.ps1 -BaseUrl "https://example.com"
```

## Deployment Integration

After an approved deployment and cache purge, visual QA can be run automatically with:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\deploy-theme.ps1 -ConfirmDeploy -RunVisualQa
```

Visual QA failures are reported for review. They do not automatically trigger rollback.

## Manual Review Still Required

Routine public screenshots should no longer need to be captured manually after every deployment.

Administrator-only Cabinet draft previews remain manual unless a future safe authenticated QA workflow is explicitly approved.
