# WordPress Inspection Checklist

This document is the step-by-step checklist for inspecting the existing Fisher Aquatics WordPress installation before any redesign or migration work begins.

Inspection is read-only. Do not modify the live website, activate themes, install plugins, update software, delete spam, change settings, or edit content during this phase.

## Evidence Standards

- Record facts in `docs/wordpress-audit.md` after inspection.
- Capture screenshots when they help prove configuration, counts, warnings, or unusual behavior.
- Export data where WordPress provides a safe read-only export.
- Mark any inaccessible item as blocked and note the access required.
- Do not include passwords, secret keys, private tokens, or sensitive personal data in screenshots or repository files.

## Administrator Access

Many steps require Administrator access. If the available account is not an Administrator account, record what can be seen and mark restricted steps as requiring administrator access.

## Recommended Inspection Order

### 1. Confirm Access And Read-Only Ground Rules

Purpose:
Confirm that the inspector can access the site safely and understands that no live changes should be made.

Location in WordPress:
Login screen, then Dashboard.

What to record:

- Site login URL.
- Username or role used for inspection, without recording credentials.
- User role shown in the admin area.
- Whether the account appears to have Administrator access.
- Date and time of inspection.

Screens to visit:

- Login screen.
- Dashboard landing page.
- Users > Profile, only if role cannot be confirmed elsewhere.

Evidence to collect:

- Screenshot of Dashboard landing page after login, avoiding sensitive notices if needed.
- Screenshot or note confirming visible admin menu items.

Items that can be exported:

- None.

Items requiring administrator access:

- Full admin menu visibility.
- User role verification if restricted.

Why it matters to the migration:
The quality of the audit depends on knowing whether the inspector saw the full WordPress configuration or only a limited subset.

### 2. Capture Dashboard Warnings And Site Health Summary

Purpose:
Collect high-level warnings before inspecting detailed settings.

Location in WordPress:
Dashboard, then Tools > Site Health.

What to record:

- Dashboard update notices.
- PHP or WordPress warnings.
- Security or performance notices.
- Site Health status.
- Critical issues and recommended improvements listed in Site Health.

Screens to visit:

- Dashboard > Home.
- Tools > Site Health > Status.
- Tools > Site Health > Info.

Evidence to collect:

- Screenshot of update warnings or dashboard notices.
- Screenshot of Site Health status summary.
- Copy or screenshot of Site Health Info sections if export is unavailable.

Items that can be exported:

- Site Health Info can usually be copied to clipboard from Tools > Site Health > Info.

Items requiring administrator access:

- Tools > Site Health.
- Full update notices.

Why it matters to the migration:
Site Health provides an efficient first pass on server environment, WordPress configuration, performance warnings, and security warnings.

### 3. Record Hosting And Server Environment

Purpose:
Capture the hosting and server facts needed before updates, backup planning, migration, or performance decisions.

Location in WordPress:
Tools > Site Health > Info.

What to record:

- Hosting provider, if visible.
- Web server software.
- PHP version.
- PHP memory limit.
- PHP max upload size.
- PHP max execution time.
- Database type and version.
- WordPress directory and uploads directory paths, if useful and safe to record.
- SSL/HTTPS status.

Screens to visit:

- Tools > Site Health > Info > Server.
- Tools > Site Health > Info > Database.
- Tools > Site Health > Info > WordPress Constants.
- Settings > General for site URL and WordPress URL.

Evidence to collect:

- Site Health Info export or copied text.
- Screenshot of Settings > General with sensitive fields avoided if necessary.

Items that can be exported:

- Site Health Info.

Items requiring administrator access:

- Tools > Site Health.
- Settings > General.

Why it matters to the migration:
Server versions and limits affect compatibility, media handling, backup size, upload limits, and future deployment planning.

### 4. Record WordPress Version And Update State

Purpose:
Understand how current or stale the WordPress installation is without applying updates.

Location in WordPress:
Dashboard > Updates.

What to record:

- Current WordPress version.
- Whether core updates are available.
- Whether automatic maintenance or security updates are enabled.
- Number of pending theme updates.
- Number of pending plugin updates.
- Any update warnings.

Screens to visit:

- Dashboard > Updates.

Evidence to collect:

- Screenshot of update summary.
- Written list of pending update counts.

Items that can be exported:

- None from this screen by default.

Items requiring administrator access:

- Dashboard > Updates.

Why it matters to the migration:
Outdated software can affect security, compatibility, and whether the current theme or plugin stack can safely support the redesign.

### 5. Confirm Backup And Restore Status

Purpose:
Determine whether the site can be restored before any future updates or changes.

Location in WordPress:
Dashboard menus for any existing backup tooling, plus hosting control panel if available.

What to record:

- Whether a backup solution is present.
- Date of most recent full-site backup.
- Whether database and files are both included.
- Backup storage location.
- Backup schedule.
- Retention period.
- Whether a restore process is documented.
- Whether restore has been tested.

Screens to visit:

- Any visible backup-related admin menu.
- Plugins > Installed Plugins to identify backup-related tooling.
- Hosting backup screen, if accessible outside WordPress.

Evidence to collect:

- Screenshot of backup status or latest backup date.
- Screenshot of backup settings if visible and non-sensitive.
- Notes from hosting backup area, if accessible.

Items that can be exported:

- Backup logs or settings only if the existing tool offers a safe export.

Items requiring administrator access:

- Backup plugin settings.
- Plugins list.
- Hosting control panel backup area.

Why it matters to the migration:
No updates, cleanup, or redesign work should proceed until backup and restore confidence exists.

### 6. Inventory Themes And Child Theme Status

Purpose:
Record the active theme, inactive themes, child theme status, and visible customization risk.

Location in WordPress:
Appearance > Themes.

What to record:

- Active theme name.
- Active theme version.
- Active theme author/source.
- Whether the active theme is a child theme.
- Parent theme name, if applicable.
- Inactive themes and versions.
- Available theme updates.
- Any theme warning messages.

Screens to visit:

- Appearance > Themes.
- Theme details modal for active theme.
- Theme details modal for any parent theme or child theme.

Evidence to collect:

- Screenshot of active theme card.
- Screenshot of theme details with version.
- Screenshot showing inactive themes if there are many or if update warnings appear.

Items that can be exported:

- None from the standard theme screen by default.

Items requiring administrator access:

- Appearance > Themes.

Why it matters to the migration:
Theme structure determines whether existing layout and customizations can be preserved, replaced, or safely ignored later.

### 7. Inventory Plugins Without Changing Them

Purpose:
Record active and inactive plugin inventory, versions, and update status without recommending or changing plugins.

Location in WordPress:
Plugins > Installed Plugins.

What to record:

- Active plugins.
- Inactive plugins.
- Plugin versions.
- Plugin authors.
- Available updates.
- Auto-update status, if visible.
- Plugins related to SEO, forms, galleries, redirects, custom fields, security, caching, backups, spam, analytics, or page building.
- Any plugin warnings or compatibility notices.

Screens to visit:

- Plugins > Installed Plugins.
- Plugin details modal where version or compatibility details are unclear.

Evidence to collect:

- Screenshots of plugin list, paginated if needed.
- Screenshot of plugin update notices.

Items that can be exported:

- Plugin inventory may require manual copy unless an existing admin export is available.

Items requiring administrator access:

- Plugins > Installed Plugins.

Why it matters to the migration:
Plugins may control critical content, redirects, forms, galleries, SEO metadata, caching, or custom fields that affect migration risk.

### 8. Inventory Users And Basic Security Signals

Purpose:
Identify user-role risk and basic security posture without changing accounts.

Location in WordPress:
Users > All Users.

What to record:

- Number of Administrator accounts.
- Number of Editor, Author, Contributor, and Subscriber accounts.
- Suspicious or obsolete accounts, if obvious.
- Whether the inspection account has administrator access.
- Comment moderation status, if visible later in Settings > Discussion.
- HTTPS status from Settings > General or browser address bar.

Screens to visit:

- Users > All Users.
- Settings > General.
- Settings > Discussion.

Evidence to collect:

- Screenshot of user role counts, avoiding email addresses if possible.
- Screenshot of HTTPS/site URL status if needed.

Items that can be exported:

- None from standard WordPress screens by default.

Items requiring administrator access:

- Users > All Users.
- Settings screens.

Why it matters to the migration:
User roles and account hygiene affect security, ownership, content attribution, and launch readiness.

### 9. Record General Site Settings And Permalinks

Purpose:
Capture current site identity, URLs, timezone, reading settings, and permalink structure before migration planning.

Location in WordPress:
Settings > General, Settings > Reading, Settings > Permalinks.

What to record:

- Site title.
- Tagline.
- WordPress Address URL.
- Site Address URL.
- Administration email, without recording the full address if sensitive.
- Timezone.
- Date format.
- Homepage display setting.
- Homepage and posts page, if assigned.
- Search engine visibility setting.
- Permalink structure.
- Category base and tag base, if customized.

Screens to visit:

- Settings > General.
- Settings > Reading.
- Settings > Permalinks.

Evidence to collect:

- Screenshots of settings screens with sensitive details obscured if needed.
- Written permalink pattern.

Items that can be exported:

- None from standard settings screens by default.

Items requiring administrator access:

- Settings screens.

Why it matters to the migration:
Settings influence URL preservation, redirects, SEO continuity, homepage behavior, date display, and content mapping.

### 10. Inventory Pages

Purpose:
Capture all current pages and identify candidates for preserve, revise, archive, redirect, or delete decisions later.

Location in WordPress:
Pages > All Pages.

What to record:

- Published pages.
- Draft pages.
- Private pages.
- Page titles.
- Page slugs.
- Parent/child relationships.
- Assigned templates, if visible.
- Authors.
- Last modified dates.
- Pages used as homepage or posts page.
- Pages that appear obsolete or important for Fisher Aquatics history.

Screens to visit:

- Pages > All Pages.
- Quick Edit view only if needed to inspect slug, parent, template, or status.
- Edit screen for representative pages only if needed to inspect template, custom fields, or editor type.

Evidence to collect:

- Screenshots of page list, paginated if needed.
- Export of pages if available through Tools > Export.

Items that can be exported:

- Tools > Export > Pages.

Items requiring administrator access:

- Full page list access may require Editor or Administrator.
- Tools > Export usually requires Administrator.

Why it matters to the migration:
Pages form the current site structure and determine what must be preserved, redirected, rewritten, or folded into the new architecture.

### 11. Inventory Posts, Categories, Tags, And Comments

Purpose:
Capture existing post content and taxonomy structure, including spam/comment cleanup needs.

Location in WordPress:
Posts > All Posts, Posts > Categories, Posts > Tags, Comments.

What to record:

- Published posts.
- Draft posts.
- Private posts.
- Post titles.
- Post slugs.
- Categories.
- Tags.
- Authors.
- Dates.
- Featured image presence.
- Comment count.
- Existing categories and descriptions.
- Existing tags and counts.
- Number of approved, pending, spam, and trash comments.
- Evidence of approximately 1,700 spam comments if still present.

Screens to visit:

- Posts > All Posts.
- Posts > Categories.
- Posts > Tags.
- Comments.

Evidence to collect:

- Screenshots of post list, category list, tag list, and comment status counts.
- Export of posts if available through Tools > Export.

Items that can be exported:

- Tools > Export > Posts.

Items requiring administrator access:

- Tools > Export.
- Full comment management screens.

Why it matters to the migration:
Posts may become Field Notes, Workshop Journal entries, Fisher Aquatics project history, or archived legacy material.

### 12. Inventory Media Library

Purpose:
Understand media volume, image quality, metadata, alt text, and reuse risk.

Location in WordPress:
Media > Library.

What to record:

- Approximate number of media items.
- Common file types.
- Large images or unusually heavy files.
- Missing alt text patterns.
- Duplicate or near-duplicate media.
- Broken thumbnails or missing files.
- Media attached to key pages/posts.
- Existing galleries or gallery blocks if visible.

Screens to visit:

- Media > Library grid view.
- Media > Library list view, if available.
- Attachment details for representative images.
- Attachment details for current Fisher Aquatics images.

Evidence to collect:

- Screenshot of media library count or pagination.
- Screenshots of representative attachment details showing metadata and alt text.

Items that can be exported:

- Media export may be available through Tools > Export > Media if supported.
- Full media file export usually requires hosting/file access or a backup.

Items requiring administrator access:

- Full media library access may require Author, Editor, or Administrator depending on role.
- Full file export requires hosting or administrator-level backup access.

Why it matters to the migration:
Media quality, metadata, and file size affect migration cost, accessibility, performance, and visual readiness.

### 13. Inspect Menus

Purpose:
Capture current navigation before replacing or reorganizing it.

Location in WordPress:
Appearance > Menus, or Appearance > Editor / Navigation if using a block theme.

What to record:

- Menu names.
- Menu locations.
- Menu items.
- Custom links.
- Hierarchy.
- Broken or obsolete links.
- Footer or utility menus.
- Legacy Fisher Aquatics labels or URLs.

Screens to visit:

- Appearance > Menus.
- Manage Locations tab, if present.
- Appearance > Editor > Navigation, if menus are block-based.

Evidence to collect:

- Screenshots of each menu and menu location.

Items that can be exported:

- None from standard menu screens by default.

Items requiring administrator access:

- Appearance menu access.

Why it matters to the migration:
Menus reveal current user paths, legacy content priorities, and links that may need redirects or replacement.

### 14. Inspect Widgets And Reusable Site Areas

Purpose:
Capture sidebar, footer, and reusable content that may otherwise be missed in page/post inventories.

Location in WordPress:
Appearance > Widgets, Appearance > Customize > Widgets, or Appearance > Editor for block-based site areas.

What to record:

- Widget areas.
- Active widgets.
- Inactive widgets.
- Footer content.
- Sidebar content.
- Embedded scripts, shortcodes, forms, search, archives, recent posts, categories, or custom HTML.

Screens to visit:

- Appearance > Widgets.
- Appearance > Customize > Widgets, if used.
- Appearance > Editor > template parts, if block-based.

Evidence to collect:

- Screenshots of each active widget area.
- Screenshots of custom HTML widgets or shortcode widgets.

Items that can be exported:

- None from standard widget screens by default.

Items requiring administrator access:

- Appearance screens.

Why it matters to the migration:
Widgets often contain contact details, tracking snippets, footer copy, forms, and legacy navigation not visible in pages.

### 15. Inspect Custom CSS And Custom JavaScript

Purpose:
Find custom code that affects current design, behavior, analytics, forms, or embeds.

Location in WordPress:
Appearance > Customize > Additional CSS, theme file editor if enabled, plugin settings for snippets or header/footer scripts, and relevant Custom HTML widgets.

What to record:

- Additional CSS presence and rough size.
- Location of CSS customizations.
- Any custom JavaScript locations.
- Header/footer injected scripts.
- Code snippets.
- Analytics scripts.
- Custom HTML widgets containing code.
- Whether code appears theme-specific or content-specific.

Screens to visit:

- Appearance > Customize > Additional CSS.
- Appearance > Theme File Editor only if enabled and safe to view.
- Any existing snippet or header/footer script admin screens, if visible.
- Widgets containing Custom HTML.

Evidence to collect:

- Screenshots of locations where custom code exists.
- Copy custom CSS/JavaScript into a local audit note only if it is not secret and if copying is necessary for preservation.

Items that can be exported:

- Custom CSS/JavaScript may require manual copy.
- Theme files require file access or safe read-only viewing.

Items requiring administrator access:

- Customizer access.
- Theme file editor access.
- Plugin settings for code snippets or injected scripts.

Why it matters to the migration:
Custom code may explain current visual behavior, analytics, embeds, or hidden dependencies that must be preserved or retired later.

### 16. Inspect Forms, Galleries, SEO, Redirects, Analytics, And Other Feature Areas

Purpose:
Identify feature-specific data controlled by plugins or theme settings without recommending replacements.

Location in WordPress:
Admin menu items for existing forms, galleries, SEO, redirects, analytics, custom fields, security, caching, or page building features.

What to record:

- Forms and their destinations.
- Galleries and associated pages.
- SEO title/meta patterns.
- XML sitemap status.
- Redirect rules.
- Analytics or tracking configuration.
- Custom fields or content models.
- Caching status.
- Security notices.
- Page-builder usage, if present.

Screens to visit:

- Only admin screens for feature areas that already exist in the live site.
- Related settings pages for existing features.

Evidence to collect:

- Screenshots of lists and settings summaries.
- Exports where the existing tool provides safe export options.

Items that can be exported:

- Forms, redirects, SEO settings, and custom fields may have exports depending on existing tooling.
- Export only when the existing tool provides a read-only export path.

Items requiring administrator access:

- Most feature settings and exports.

Why it matters to the migration:
Feature areas can contain critical business logic, redirects, metadata, forms, and structured content not visible in pages or posts.

### 17. Export Content From WordPress

Purpose:
Capture a safe content snapshot for later review without changing the site.

Location in WordPress:
Tools > Export.

What to record:

- Available export types.
- Date and time of export.
- Export file names.
- Whether exports include all content, pages, posts, media, or custom content types.
- Any export errors.

Screens to visit:

- Tools > Export.

Evidence to collect:

- Screenshot of export options.
- Export files stored outside the repository until reviewed for privacy and size.

Items that can be exported:

- All content.
- Posts.
- Pages.
- Media, if available.
- Custom post types, if present.

Items requiring administrator access:

- Tools > Export.

Why it matters to the migration:
Exports provide a reviewable snapshot for content inventory, migration planning, URL mapping, and risk analysis.

### 18. Inspect Public Frontend Pages

Purpose:
Compare admin records with what visitors actually experience.

Location in WordPress:
Public website frontend in a browser.

What to record:

- Homepage appearance and content.
- Current navigation.
- Footer content.
- Important Fisher Aquatics pages.
- Representative posts.
- Forms.
- Galleries.
- Mobile behavior.
- Broken visible elements.
- Browser console errors, if checked.

Screens to visit:

- Homepage.
- Main navigation pages.
- Representative post.
- Representative image-heavy page.
- Contact page or form page, if present.
- 404 page, if useful.

Evidence to collect:

- Screenshots of representative desktop pages.
- Screenshots of representative mobile pages.
- Notes on visible errors or broken elements.

Items that can be exported:

- None directly from frontend.

Items requiring administrator access:

- None for public pages, unless pages are private or unpublished.

Why it matters to the migration:
The frontend shows actual visitor-facing content, design, performance, and accessibility issues that admin screens do not reveal.

### 19. Run Baseline Performance Observations

Purpose:
Capture rough performance conditions before redesign or cleanup.

Location in WordPress:
Public website frontend plus browser developer tools or external testing tools.

What to record:

- Homepage load behavior.
- Representative page load behavior.
- Largest or slow-loading assets.
- Image weight patterns.
- Render-blocking CSS or JavaScript observations.
- Mobile performance concerns.
- Any obvious caching behavior.

Screens to visit:

- Homepage.
- Representative page.
- Representative post.
- Image-heavy page.

Evidence to collect:

- Screenshots of performance tool summaries if useful.
- Notes on large images, slow responses, or obvious bottlenecks.

Items that can be exported:

- Performance reports may be exportable depending on the tool used.

Items requiring administrator access:

- None for public testing.
- Administrator access may be needed to confirm caching configuration later.

Why it matters to the migration:
Baseline performance helps separate existing-site problems from redesign decisions and future implementation effects.

### 20. Run Baseline Accessibility Observations

Purpose:
Capture obvious accessibility issues before redesign work begins.

Location in WordPress:
Public website frontend plus browser inspection or accessibility testing tools.

What to record:

- Heading structure.
- Keyboard navigation.
- Focus visibility.
- Color contrast concerns.
- Link text quality.
- Image alt text patterns.
- Form label behavior.
- Menu behavior.
- Motion or animation concerns.
- Mobile readability.

Screens to visit:

- Homepage.
- Navigation menu.
- Representative page.
- Representative post.
- Contact/form page, if present.
- Gallery or image-heavy page, if present.

Evidence to collect:

- Screenshots of accessibility tool summaries if useful.
- Notes on keyboard traps, missing labels, missing alt text, or contrast issues.

Items that can be exported:

- Accessibility reports may be exportable depending on the tool used.

Items requiring administrator access:

- None for public testing.
- Administrator access may be needed later to inspect content alt text or form configuration.

Why it matters to the migration:
Accessibility baseline informs future template, content, image, and form requirements.

### 21. Identify Existing URL Structure And SEO Signals

Purpose:
Capture URL, metadata, redirect, and indexing information before Fisher Aquatics is moved under Two-Bit Alchemy.

Location in WordPress:
Settings > Permalinks, SEO-related admin screens if present, frontend page source if needed, and any connected search tools if available.

What to record:

- Current permalink pattern.
- Important page and post URLs.
- Category and tag URL formats.
- Existing redirects.
- XML sitemap URL.
- Robots.txt status.
- Title and meta description patterns.
- Canonical URL behavior.
- Open Graph metadata.
- Pages likely to need redirects.
- High-value URLs, if analytics or search data is available.

Screens to visit:

- Settings > Permalinks.
- Existing SEO or redirect settings screens if present.
- Public sitemap and robots.txt URLs if available.
- Search console or analytics only if access is already available.

Evidence to collect:

- Screenshot of permalink settings.
- Screenshot of sitemap or SEO settings.
- Export redirect rules if an existing tool supports it.
- URL inventory notes.

Items that can be exported:

- Redirect rules, SEO settings, or analytics reports if existing systems provide exports.
- WordPress XML export for URL/content mapping.

Items requiring administrator access:

- Settings > Permalinks.
- SEO and redirect settings.
- Search console or analytics access may require separate account permissions.

Why it matters to the migration:
URL and SEO records are essential for preserving Fisher Aquatics history and avoiding unnecessary traffic loss or broken links.

### 22. Review Migration Risks And Open Questions

Purpose:
Summarize risks that must be resolved before implementation begins.

Location in WordPress:
No new screen required. Review notes gathered from earlier steps.

What to record:

- Content requiring preservation.
- Content requiring revision.
- Content requiring archival.
- URL redirect concerns.
- Media cleanup concerns.
- Plugin or theme dependency risks.
- Form or contact flow risks.
- Security or backup blockers.
- Accessibility or performance blockers.
- Access limitations encountered during inspection.

Screens to visit:

- None unless earlier notes require confirmation.

Evidence to collect:

- Final inspection notes.
- List of blocked items.
- List of exports collected.
- List of screenshots collected.

Items that can be exported:

- None beyond earlier exports.

Items requiring administrator access:

- Depends on any blocked earlier steps.

Why it matters to the migration:
Migration should not begin until risks and blockers are visible enough to plan around.

## Inspection Complete Criteria

Inspection is complete when all of the following are true:

- Administrator access level has been confirmed or limitations are documented.
- WordPress version, PHP version, active theme, child theme status, and plugin inventory are recorded.
- Backup status and restore confidence are recorded, even if the result is "unknown" or "not verified."
- Pages, posts, categories, tags, comments, media, menus, and widgets have been inventoried.
- Custom CSS and JavaScript locations have been checked.
- Current permalink structure and important existing URLs have been recorded.
- SEO, redirect, sitemap, robots.txt, and analytics/search access have been checked where available.
- Baseline performance and accessibility observations have been recorded.
- Security observations, user-role counts, pending updates, and spam comment status have been recorded.
- Available WordPress exports have been collected or intentionally skipped with a reason.
- Screenshots or evidence notes exist for key configuration screens.
- Migration risks and blocked inspection items are summarized.
- `docs/wordpress-audit.md` can be updated with verified facts from the inspection.

