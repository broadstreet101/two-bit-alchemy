# WordPress Baseline And Automation Plan

This plan defines the next cleanup and automation phase for the existing Two-Bit Alchemy WordPress installation.

It is documentation and local tooling guidance only. It does not authorize live WordPress changes, content deletion, plugin changes, theme changes, publication, or credential setup.

Related project references:

- `docs/development-workflow.md`
- `docs/theme-deployment.md`
- `docs/remote-deployment.md`
- `docs/wordpress-audit.md`
- `docs/wordpress-inspection-checklist.md`
- `docs/theme-smoke-test.md`
- `docs/publication-readiness-checklist.md`
- `docs/cabinet-publication-queue.md`

## Current Repository-Derived Facts

- The repository is the source of truth for project-controlled files.
- The custom WordPress theme lives at `src/themes/two-bit-alchemy/`.
- The active publication model uses standard WordPress Pages plus Posts and Categories at launch.
- Cabinet exhibits are currently repository-controlled theme routes, not WordPress custom post types.
- Cabinet exhibit preview/publication status is controlled in `src/themes/two-bit-alchemy/inc/cabinet-exhibits.php`.
- The Charlie Adlard Cabinet exhibit is intentionally `draft`, preview-only, and not publicly approved.
- Theme packages must contain a single top-level `two-bit-alchemy/` folder with `style.css` directly inside it.
- Previous manual packaging attempts failed when the ZIP included an enclosing `src/`, `themes/`, or similar parent directory.
- PHP is not required for local ZIP packaging validation.
- Remote deployment foundation exists in `docs/remote-deployment.md`, but deployment remains approval-gated.

## Dada-Reported Live WordPress Facts

These facts were supplied by Dada and still need to be recorded during live inspection before cleanup:

- WordPress is running version 7.0.4.
- The custom Two-Bit Alchemy theme is active.
- The WordPress installation predates the current project and contains legacy/default material.
- The dashboard currently shows 1 published post.
- The dashboard currently shows 2 published pages.
- The dashboard currently shows 1 approved comment.
- The dashboard currently shows approximately 1,865 comments awaiting moderation.
- The default `Hello world!` post appears to still exist.

## WordPress Baseline Audit

Use this checklist to create the cleanup baseline. Record results in `docs/wordpress-audit.md` or a dated audit note before making changes.

| Item | Repository Can Determine | Dada Must Inspect In WordPress | Safe / Recommended Change | Requires Explicit Approval |
| --- | --- | --- | --- | --- |
| WordPress version | No | Dashboard > Updates or Tools > Site Health | Record exact version and update notices | Applying core updates |
| PHP version | No | Tools > Site Health > Info > Server | Record version and hosting support status | Changing PHP version |
| Hosting environment | No | Hosting panel or Site Health, if visible | Record provider, server, database, backup tools | Changing hosting settings |
| HTTPS status | No | Browser, Settings > General, Site Health | Record whether admin and public site use HTTPS | Redirect or certificate changes |
| Site title | No | Settings > General | Record current value | Changing title |
| Tagline | No | Settings > General | Record current value | Changing tagline |
| Administrator email | No | Settings > General | Record presence without committing full private address | Changing email |
| Timezone | No | Settings > General | Record current setting | Changing timezone |
| Language | No | Settings > General | Record current setting | Changing language |
| Permalink structure | No | Settings > Permalinks | Record current structure | Changing permalinks or bases |
| Homepage / posts page | Theme has `front-page.php` and `home.php` | Settings > Reading | Record assigned pages | Changing homepage or posts page |
| Registration settings | No | Settings > General | Record whether public registration is enabled | Disabling or changing registration |
| Discussion settings | No | Settings > Discussion | Record defaults, moderation, pingbacks, avatars | Changing comment policy |
| Existing posts | Repository has Workbench and theme content only | Posts > All Posts | Inventory before cleanup | Editing, trashing, or deleting posts |
| Existing pages | Repository has approved target page structure | Pages > All Pages | Inventory before cleanup | Editing, trashing, or deleting pages |
| Existing comments / spam | No | Comments | Record approved, pending, spam, trash counts | Bulk deleting comments or spam |
| Installed themes | Repository contains custom theme source | Appearance > Themes | Record active and inactive themes | Deleting inactive themes |
| Installed plugins | No | Plugins > Installed Plugins | Inventory active and inactive plugins | Deactivating, deleting, updating, or installing plugins |
| Active plugins | No | Plugins > Installed Plugins | Record versions and purposes | Changing active plugin set |
| Inactive plugins | No | Plugins > Installed Plugins | Identify candidates for later removal | Deleting inactive plugins |
| Caching | No | Hosting panel or existing cache plugin | Record whether cache is active | Purging, disabling, or changing cache |
| Backup mechanism | No | Hosting panel or backup plugin | Confirm most recent full backup and restore path | Creating, restoring, or replacing backup system |
| Security configuration | No | Users, Site Health, security plugin if present | Record user roles, updates, warnings, HTTPS | Account, firewall, login, or file permission changes |
| Media settings | No | Settings > Media, Media > Library | Record dimensions, count, alt text patterns | Bulk media edits or cleanup |
| Search-engine visibility | No | Settings > Reading | Record whether indexing is discouraged | Changing visibility |
| User accounts and roles | No | Users > All Users | Record counts by role, avoid private details in repo | Creating, removing, or changing users |

## Safe Versus Approval-Gated Work

Safe or recommended before approval:

- Read-only inspection.
- Screenshots or notes that do not expose secrets or sensitive personal data.
- WordPress export files stored outside Git until reviewed.
- Repository documentation updates.
- Local theme package builds and ZIP validation.
- Local static review of repository-controlled theme files.

Requires explicit approval before execution:

- Deleting, trashing, editing, publishing, or unpublishing live content.
- Bulk comment cleanup, including spam deletion.
- Changing site settings, permalinks, discussion settings, registration, timezone, language, or search visibility.
- Installing, deleting, updating, activating, or deactivating plugins or themes.
- Changing user accounts, roles, passwords, email addresses, or security settings.
- Running database cleanup, media cleanup, or optimization tools.
- Adding credentials, deployment keys, APIs, webhooks, CI/CD, or production access.

## WordPress Cleanup Plan

This sequence is conservative. Do not perform it until the baseline audit is complete, backup and restore are confirmed, and Dada approves the specific cleanup batch.

### 1. Confirm Recovery Path

- Confirm a current full-site backup exists, including database and files.
- Confirm how to restore the site if cleanup breaks something.
- Record the previous theme and active plugin state.
- Delay cleanup if restore confidence is unknown.

### 2. Export Before Cleanup

- Export all WordPress content through Tools > Export where available.
- Store export files outside the repository until reviewed.
- Capture screenshots of posts, pages, comments, menus, widgets, plugins, themes, and key settings.
- Do not commit private exports or personally sensitive data without review.

### 3. Review Default And Legacy Content

- Identify the `Hello world!` post, sample page, default comments, and other demo material.
- Identify any older Fisher Aquatics material that should become archive, redirect source, or project content.
- Mark each item as keep, revise, redirect, trash, or delete.
- Do not delete legacy content solely because it appears old.

### 4. Review Comments And Spam

- Record counts for approved, pending, spam, and trash comments.
- Decide whether comments belong on Two-Bit Alchemy at launch.
- If comments are not part of the launch experience, plan to close comments on existing and future posts.
- Bulk-delete spam only after backup, export, and approval.
- Preserve any meaningful approved comment only if it has historical or content value.

### 5. Review Plugins

- Inventory active and inactive plugins with versions and purpose.
- Identify whether any plugin controls forms, SEO, redirects, caching, security, backups, analytics, galleries, or content structure.
- Remove inactive or unused plugins only after confirming they are not needed for recovery, redirects, or legacy content.
- Defer specific replacement recommendations until the live inventory is known.

### 6. Review Themes

- Confirm the Two-Bit Alchemy theme is active.
- Identify inactive themes and whether one should remain as a recovery fallback.
- Delete unused themes only after backup, active theme stability, and approval.
- Keep at least one known-good fallback theme unless hosting recovery procedures provide a better path.

### 7. Review Widgets, Menus, And Defaults

- Inventory widget areas and menus before removing anything.
- Remove default widgets, sample menus, or obsolete legacy links only after review.
- Ensure approved navigation remains Home, Projects, Field Notes, Workshop Journal, Cabinet, About, Contact.

### 8. Review Settings

- Confirm homepage/posts-page configuration.
- Confirm permalink structure before changing it.
- Confirm search-engine visibility intentionally matches launch status.
- Confirm discussion defaults before creating additional posts.
- Confirm caching behavior during active development.

### 9. Cache During Development

- Record existing caching layers before changing them.
- During active theme testing, clear cache after theme uploads when necessary.
- Consider temporarily reducing aggressive caching only if it prevents accurate review.
- Restore or configure production caching later after content and theme behavior are stable.

### 10. Final Cleanup Verification

- Review public homepage, Cabinet, About, representative posts, 404 page, and admin dashboard.
- Verify logged-out visitors cannot access preview-only Cabinet exhibits.
- Verify no default/demo content remains visible unless intentionally preserved.
- Update the implementation log with what changed, who approved it, and rollback notes.

## Automation Architecture

Approved desired workflow:

```text
Dada
-> ChatGPT
-> Codex
-> Git repository
-> build/package
-> WordPress preview
-> human approval
-> public publication
```

### Can Be Automated Safely Now

- Repository file creation and edits.
- Documentation updates.
- Theme static file inspection.
- Theme ZIP packaging.
- Theme ZIP structure validation.
- Reporting package contents.
- Draft/published registry checks for repository-controlled Cabinet exhibits.
- Local generated artifact cleanup under `dist/`.
- Git commit and push for approved repository changes.

### Should Remain Manual For Now

- WordPress login and admin inspection, because credentials are not stored or requested.
- Theme upload and activation, because this affects the live site.
- Cleanup of comments, posts, pages, themes, plugins, widgets, and settings, because each is consequential live-site change.
- Public publication approval, because Two-Bit Alchemy preserves personal, copyright-sensitive, and permission-sensitive material.
- Media upload to WordPress, because source image handling and captions need human review.

### Potential Future Automation Options

These are options only. Do not implement them until Dada approves the problem, access model, rollback path, and credential handling.

- WP-CLI over SSH: would automate content inventory, user role counts, cache clearing, plugin inventory, and theme installation.
- SFTP or hosting file deploy: would reduce manual theme uploads while preserving repository-built packages.
- Repository-controlled IONOS deployment scripts: can deploy only the validated custom theme after SSH authentication, path discovery, backup confirmation, and explicit approval.
- A staging WordPress site: would allow safer preview and activation testing before production.
- GitHub Actions package validation: would run repeatable ZIP checks on every push.
- WordPress REST API tooling: could automate draft creation, media attachment, metadata checks, and preview workflows.
- Deployment keys or secrets manager: would support automated deployment while keeping credentials outside Git.
- Visual regression screenshots: would document frontend changes before approval.

## Build And Package Hardening

The canonical local packaging command is:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File scripts\package-theme.ps1
```

The script:

- Builds `D:\TBA\dist\two-bit-alchemy.zip`.
- Packages from `D:\TBA\src\themes\two-bit-alchemy\`.
- Creates exactly one top-level `two-bit-alchemy/` directory inside the ZIP.
- Verifies `two-bit-alchemy/style.css`.
- Verifies `two-bit-alchemy/functions.php`.
- Verifies `two-bit-alchemy/index.php`.
- Verifies `two-bit-alchemy/theme.json`.
- Verifies expected templates, template parts, includes, patterns, and assets.
- Rejects accidental `src/`, `themes/`, `dist/`, or other enclosing directories.
- Reports the archive tree and first 20 ZIP paths.
- Fails clearly if validation fails.

Do not use ad hoc packaging commands for release or review packages unless the script itself is broken and the workaround is documented.

## Deployment Readiness

Immediate deployment workflow:

1. Build and validate the theme ZIP locally using `scripts\package-theme.ps1`.
2. Confirm a full WordPress backup and rollback path.
3. Upload the ZIP manually in WordPress through Appearance > Themes.
4. Preview or activate only after approval.
5. Verify homepage, navigation, Cabinet, preview-only exhibits, posts, pages, mobile behavior, and admin access.
6. Roll back by reactivating the previous theme or renaming the theme folder through hosting access if admin is unavailable.

Remote deployment foundation:

- `scripts\discover-wordpress-remote.ps1` can discover paths read-only after SSH authentication is configured.
- `scripts\deploy-theme.ps1` can deploy only the validated Two-Bit Alchemy theme after explicit approval and a verified remote theme path.
- `scripts\rollback-theme.ps1` can restore the latest timestamped theme backup after explicit approval.
- See `docs/remote-deployment.md` before using any remote deployment script.

Future deployment automation should preserve:

- Explicit human publication approval.
- Rollback.
- Secrets outside Git.
- No production credentials committed to the repository.
- Draft content remaining inaccessible to public visitors.
- A validated package artifact before installation.
- A record in the implementation log.

## Permanent Project Instructions

The following instructions consolidate existing workflow policy and add automation-specific guardrails:

- Maximize deterministic automation for repository-controlled work.
- Minimize unnecessary manual file handling.
- Batch related safe operations when practical.
- Never publish live content without explicit approval.
- Preserve preview and draft states.
- Never commit credentials, secrets, private exports, backup files, or production access details.
- Validate WordPress theme ZIP structure before presenting it for installation.
- Use `D:\TBA` for all project-controlled files rather than creating additional root-level `D:\` directories.
- Keep WordPress admin work limited to actions that cannot reasonably be represented in the repository.
- Report errors before attempting workarounds that affect the live site or deployment process.
- Do not change PHP versions during deployment automation setup. `twobitalchemy.com` currently uses PHP 8.2, `fisheraquatics.com` uses PHP 8.3, and migration is deferred until after deployment automation is proven.

## Recommended Information Collection Order

1. Confirm backup and restore path.
2. Capture Dashboard and Site Health.
3. Record WordPress, PHP, hosting, HTTPS, and core settings.
4. Inventory users and roles.
5. Inventory themes and plugins.
6. Inventory posts, pages, categories, tags, comments, and media.
7. Inventory menus, widgets, custom CSS, and custom JavaScript.
8. Record permalink, SEO, indexing, redirects, and sitemap state.
9. Capture public frontend screenshots and baseline observations.
10. Summarize cleanup candidates and approval-gated actions.

## Open Questions

- Is there a recent full-site backup that includes both files and database?
- Is there a tested restore path?
- Should comments be disabled for launch content?
- Should the `Hello world!` post be deleted, redirected, or archived after review?
- Which two published pages currently exist, and are either needed for legacy Fisher Aquatics history?
- Are the approximately 1,865 pending comments all spam, or do any require preservation?
- Which plugins control backup, security, cache, SEO, redirects, forms, galleries, analytics, or custom content?
- Is a staging environment available?
- What permalink structure is currently active?
- Should search-engine visibility remain enabled during current preview/content preparation?
