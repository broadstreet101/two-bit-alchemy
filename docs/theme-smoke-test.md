# Theme Smoke Test

Date: 2026-07-03

Purpose: provide the first-activation checklist for the installed but not-yet-activated Two-Bit Alchemy WordPress theme.

Scope: activation verification only. Do not use this phase to add layouts, styling, or new features.

## 1. Immediate Activation Checks

| What to check | Expected result | Severity if it fails | Blocks further development |
| --- | --- | --- | --- |
| Activate the `Two-Bit Alchemy` theme from Appearance > Themes. | Theme activates without a WordPress critical error. | Critical | Yes |
| Public site loads immediately after activation. | Homepage returns a normal page response instead of a white screen or fatal error. | Critical | Yes |
| WordPress admin remains accessible. | Dashboard and Appearance screens still load. | Critical | Yes |
| WordPress sends no critical-error email. | No fatal-error email is received after activation. | High | Yes, if an error is reported |
| Previous theme remains available. | Previous working theme is still listed in Appearance > Themes. | High | No, but it is required for rollback safety |

## 2. Front-End Rendering Checks

| What to check | Expected result | Severity if it fails | Blocks further development |
| --- | --- | --- | --- |
| Homepage rendering. | Site title or logo area, main content area, and footer render plainly. | High | Yes, if page is blank or broken |
| Standard page rendering. | Page title and page content render with basic readable markup. | High | Yes, if pages fail to render |
| Single post rendering. | Post title, date, content, categories, and tags render where available. | High | Yes, if posts fail to render |
| Category archive rendering. | Archive title and post list render. | Medium | Yes, before archive/homepage work |
| 404 rendering. | Not-found page renders instead of a server error. | Medium | No, unless it exposes a fatal error |
| Featured image rendering. | Posts with featured images show images in archive/card contexts. | Medium | No, unless image output causes errors |
| Primary navigation rendering. | Menu appears only after assigning a menu to the Primary Navigation location. | Medium | No, unless assigned menus fail to render |

## 3. WordPress Admin Checks

| What to check | Expected result | Severity if it fails | Blocks further development |
| --- | --- | --- | --- |
| Appearance > Themes. | Two-Bit Alchemy appears as the active theme. | High | Yes |
| Appearance > Menus or Site Editor navigation controls, depending on WordPress setup. | Primary Navigation location is available for assignment. | Medium | No, but navigation testing is incomplete |
| Page editor. | Pages can still be edited in the block editor. | High | Yes |
| Post editor. | Posts can still be edited in the block editor. | High | Yes |
| Template selector for Pages. | Approved page templates appear where WordPress exposes page templates. | Medium | No, unless required templates are missing |
| Media Library. | Existing media library loads normally. | Medium | No, unless editor/media workflows break |

## 4. Accessibility Checks

| What to check | Expected result | Severity if it fails | Blocks further development |
| --- | --- | --- | --- |
| Keyboard tab from top of page. | Skip link appears and moves focus to the main content area. | High | Yes, before layout work |
| Visible keyboard focus. | Links and controls show a visible focus outline. | High | Yes, before layout work |
| Main landmark. | Page includes a single main content area targeted by the skip link. | High | Yes |
| Primary navigation label. | Navigation is exposed as a labeled primary navigation landmark when a menu is assigned. | Medium | No, but must be fixed before launch |
| Heading structure. | Singular pages/posts have one main `h1`; archives have an archive `h1` and entry `h2` headings. | Medium | No, unless headings are missing or duplicated badly |
| Empty landmarks. | No empty navigation, aside, or main landmarks are visible to assistive technology. | Medium | No, but should be corrected before new layout work |

## 5. Browser Console Checks

| What to check | Expected result | Severity if it fails | Blocks further development |
| --- | --- | --- | --- |
| Browser console after loading homepage. | No JavaScript errors appear. | Medium | Yes, if errors are theme-related |
| Network panel for theme CSS. | `assets/css/main.css` and `assets/css/print.css` load successfully. | High | Yes |
| Missing asset errors. | No 404s for theme assets. | Medium | Yes, if theme files are missing |
| Mixed-content warnings. | No mixed-content warnings appear in local testing. | Low | No, unless tied to theme asset paths |
| PHP warnings rendered into page source. | No PHP warnings or notices appear in the browser output. | High | Yes |

## 6. Recovery Procedure If Activation Fails

| What to check | Expected result | Severity if it fails | Blocks further development |
| --- | --- | --- | --- |
| Return to Appearance > Themes. | If admin is available, reactivate the previous working theme. | Critical | Yes |
| Use WordPress recovery mode if offered. | Recovery mode lets an administrator access the dashboard and switch themes. | Critical | Yes |
| Rename theme folder if admin is unavailable. | Renaming `wp-content/themes/two-bit-alchemy/` forces WordPress away from the broken theme. | Critical | Yes |
| Restore from backup if needed. | Site returns to its pre-activation state. | Critical | Yes |
| Capture failure details before retrying. | Exact error text, screenshot, WordPress version, PHP version, and active plugin list are saved. | High | Yes |

## Current Skeleton Review

Static checks performed:

- Required theme files exist: `style.css`, `functions.php`, `index.php`, and `theme.json`.
- `theme.json` parses as valid JSON.
- Referenced template parts resolve to existing files.
- Enqueued CSS files exist at the expected paths.
- No JavaScript is enqueued.
- No page builders or third-party libraries are present.
- PHP lint was not run because PHP is not available in the local shell.

Objective issues to correct before building the homepage:

- None identified during this smoke-test preparation.

Remaining risks:

- First activation has not yet been completed.
- PHP lint still needs to be run in a PHP-enabled environment or verified indirectly through successful WordPress activation.
- Real menu, page, post, category, and media behavior must be verified in WordPress.
- Final accessibility checks require browser testing after activation.
