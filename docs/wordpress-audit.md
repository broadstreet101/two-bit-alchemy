# WordPress Audit

This document captures the current-state audit framework for the existing Fisher Aquatics WordPress website before any redesign work begins.

No live WordPress inspection has been performed yet. Information not present in the repository is explicitly marked as requiring live WordPress inspection.

## Audit Rules

- Do not modify the live website during audit.
- Do not redesign during audit.
- Do not recommend themes or plugins during this framework stage.
- Record verified facts separately from unknown information.
- Leave future recommendations blank when there is not enough verified information.
- Preserve Fisher Aquatics history for later migration into Two-Bit Alchemy.

## 1. Hosting Environment

### Verified Facts

- No hosting provider, server type, control panel, CDN, DNS, SSL, or deployment information is recorded in the repository.

### Unknown Information Requiring Inspection

- Hosting provider.
- Server environment.
- Domain and DNS configuration.
- SSL/TLS status.
- CDN or proxy status.
- Staging environment availability.
- File access method.
- Database access method.
- Backup tooling available through hosting.

### Future Recommendations


## 2. WordPress Version

### Verified Facts

- The existing Fisher Aquatics site is WordPress-based.
- Existing project documentation says WordPress core should be updated before redesign work.

### Unknown Information Requiring Inspection

- Current WordPress core version.
- Whether automatic minor updates are enabled.
- Whether the installation has pending core updates.
- Whether any update blockers or compatibility warnings exist.

### Future Recommendations


## 3. PHP Version

### Verified Facts

- No PHP version is recorded in the repository.

### Unknown Information Requiring Inspection

- Current PHP version.
- PHP memory limit.
- PHP max upload size.
- PHP max execution time.
- Enabled PHP extensions relevant to WordPress.
- Hosting support window for PHP upgrades.

### Future Recommendations


## 4. Active Theme

### Verified Facts

- Existing project documentation says themes should be updated before redesign work.
- No active theme name is recorded in the repository.

### Unknown Information Requiring Inspection

- Active theme name.
- Active theme version.
- Theme source.
- Whether updates are available.
- Whether theme files have been modified directly.
- Whether the theme supports current WordPress features.
- Whether the theme creates accessibility, performance, or maintainability concerns.

### Future Recommendations


## 5. Child Theme Status

### Verified Facts

- No child theme status is recorded in the repository.

### Unknown Information Requiring Inspection

- Whether a child theme is active.
- Whether a child theme exists but is inactive.
- Whether customizations are stored in a child theme, parent theme, custom CSS, snippets, or plugins.
- Whether theme customizations can be preserved safely.

### Future Recommendations


## 6. Active Plugins

### Verified Facts

- Existing project documentation says plugins should be updated before redesign work.
- Existing project documentation says active plugins should be inventoried.
- No active plugin list is recorded in the repository.

### Unknown Information Requiring Inspection

- Active plugins.
- Inactive plugins.
- Plugin versions.
- Available plugin updates.
- Plugin compatibility warnings.
- Plugin overlap or duplicate functionality.
- Plugins responsible for SEO, forms, galleries, redirects, custom fields, security, caching, backups, spam handling, analytics, or page building.

### Future Recommendations


## 7. Media Library Overview

### Verified Facts

- Existing project documentation says the image library size and quality should be checked.
- No media library export or inventory is recorded in the repository.

### Unknown Information Requiring Inspection

- Number of media items.
- File types and file sizes.
- Image dimensions.
- Unused media.
- Missing alt text.
- Broken media references.
- Duplicate images.
- Existing galleries.
- Media attached to Fisher Aquatics content.
- Original image quality and suitability for migration.

### Future Recommendations


## 8. Existing Pages

### Verified Facts

- No current page inventory is recorded in the repository.
- Approved future architecture places Fisher Aquatics under `/projects/fisher-aquatics/`.

### Unknown Information Requiring Inspection

- Published pages.
- Draft pages.
- Private pages.
- Page hierarchy.
- Page templates.
- Page slugs.
- Page metadata.
- Pages with obsolete content.
- Pages that should be preserved, revised, archived, redirected, or deleted after review.

### Future Recommendations


## 9. Existing Posts

### Verified Facts

- No current post inventory is recorded in the repository.
- Future architecture separates evergreen Field Notes from dated Workshop Journal content.

### Unknown Information Requiring Inspection

- Published posts.
- Draft posts.
- Private posts.
- Categories and tags.
- Post dates.
- Author data.
- Featured images.
- Comments status.
- Posts that are evergreen reference material.
- Posts that are dated process or journal material.
- Posts that should remain part of Fisher Aquatics.

### Future Recommendations


## 10. Navigation Menus

### Verified Facts

- Approved launch navigation is Home, Projects, Field Notes, Workshop Journal, Cabinet, About, Contact.
- No current live navigation menu is recorded in the repository.

### Unknown Information Requiring Inspection

- Existing menu names.
- Existing menu locations.
- Existing menu items.
- Footer or utility menus.
- Broken menu links.
- Custom menu URLs.
- Legacy Fisher Aquatics navigation patterns.

### Future Recommendations


## 11. Widgets

### Verified Facts

- Existing project documentation says widgets should be inventoried.
- No current widget inventory is recorded in the repository.

### Unknown Information Requiring Inspection

- Active widget areas.
- Active widgets.
- Inactive widgets.
- Widget content.
- Widget-generated scripts or embeds.
- Footer, sidebar, search, recent posts, category, archive, or form widgets.

### Future Recommendations


## 12. Custom CSS

### Verified Facts

- Existing project documentation says custom CSS should be inventoried.
- No custom CSS is recorded in the repository.

### Unknown Information Requiring Inspection

- Additional CSS in the WordPress Customizer.
- Theme file CSS edits.
- Child theme CSS.
- Plugin-managed CSS.
- Page-level custom CSS.
- CSS snippets.
- CSS that affects Fisher Aquatics branding, layouts, galleries, forms, or navigation.

### Future Recommendations


## 13. Custom JavaScript

### Verified Facts

- No custom JavaScript inventory is recorded in the repository.

### Unknown Information Requiring Inspection

- Theme JavaScript customizations.
- Plugin-managed scripts.
- Analytics scripts.
- Embed scripts.
- Form scripts.
- Custom code snippets.
- Header or footer injected scripts.
- JavaScript errors in browser console.

### Future Recommendations


## 14. Performance Observations

### Verified Facts

- Existing project documentation identifies performance optimization as future Codex work.
- No current performance measurements are recorded in the repository.

### Unknown Information Requiring Inspection

- Homepage load behavior.
- Representative page load behavior.
- Image weight.
- Caching status.
- Render-blocking assets.
- Font loading.
- JavaScript weight.
- Server response time.
- Core Web Vitals status.
- Mobile performance.

### Future Recommendations


## 15. Accessibility Observations

### Verified Facts

- Existing project documentation identifies accessibility optimization as future Codex work.
- Discovery documentation recommends WCAG 2.2 AA as the practical baseline unless another standard is approved.
- No current accessibility measurements are recorded in the repository.

### Unknown Information Requiring Inspection

- Heading structure.
- Landmark structure.
- Keyboard navigation.
- Focus visibility.
- Color contrast.
- Link text quality.
- Image alt text.
- Form labels and errors.
- Menu accessibility.
- Motion or animation behavior.
- Mobile readability.

### Future Recommendations


## 16. Backup Status

### Verified Facts

- Existing project documentation says the site should be backed up before redesign.
- Existing project documentation says the backup and restore path should be confirmed.
- No current backup status is recorded in the repository.

### Unknown Information Requiring Inspection

- Whether a recent full-site backup exists.
- Whether database backups exist.
- Whether file backups exist.
- Backup storage location.
- Backup schedule.
- Backup retention.
- Restore process.
- Whether restore has been tested.
- Hosting-level backup availability.

### Future Recommendations


## 17. Security Observations

### Verified Facts

- Existing project documentation says security should be reviewed before redesign.
- Existing project documentation says approximately 1,700 spam comments should be removed using an appropriate workflow.
- No current security scan, user inventory, or hardening status is recorded in the repository.

### Unknown Information Requiring Inspection

- Administrator accounts.
- User roles.
- Password and two-factor practices.
- Pending core, theme, or plugin updates.
- Inactive themes or plugins.
- Comment moderation status.
- Spam queue size.
- Malware or integrity warnings.
- HTTPS enforcement.
- Login protection.
- File permissions.
- XML-RPC status, if relevant.

### Future Recommendations


## 18. Existing URL Structure

### Verified Facts

- Fisher Aquatics currently exists as the site identity.
- Approved future URL structure includes `/projects/fisher-aquatics/`.
- Approved architecture says Fisher Aquatics legacy URLs should be preserved or redirected later after audit.
- No current URL inventory is recorded in the repository.

### Unknown Information Requiring Inspection

- Current permalink structure.
- Current page URLs.
- Current post URLs.
- Category and tag archive URLs.
- Media URLs.
- Existing redirects.
- Broken links.
- High-value legacy URLs.
- URLs indexed by search engines.

### Future Recommendations


## 19. SEO Observations

### Verified Facts

- No SEO configuration, search indexing, sitemap, redirect, or metadata information is recorded in the repository.

### Unknown Information Requiring Inspection

- SEO title and meta description patterns.
- Open Graph metadata.
- XML sitemap status.
- Robots.txt status.
- Search indexing status.
- Canonical URLs.
- Redirect rules.
- Broken links.
- Image alt text.
- Existing analytics or search console access.
- High-performing pages, if analytics are available.

### Future Recommendations


## 20. Migration Risks

### Verified Facts

- Fisher Aquatics is moving from primary identity to a project under Two-Bit Alchemy.
- Existing WordPress content has not yet been inventoried.
- Legacy URLs should be preserved or redirected after audit.
- The current site has known spam comment cleanup needs.

### Unknown Information Requiring Inspection

- Amount of content to migrate.
- Content quality and relevance.
- Media quality and licensing status.
- URL value and backlink risk.
- Theme or plugin lock-in.
- Custom fields or page-builder dependencies.
- Embedded third-party content.
- Broken links or missing media.
- Comment data worth preserving.
- Forms or contact flows that must continue working.

### Future Recommendations


## Live Inspection Checklist

The following information must be gathered from the live WordPress site or hosting environment:

- Hosting environment and access details.
- WordPress core version.
- PHP version and server limits.
- Active theme and child theme status.
- Full active and inactive plugin inventory.
- Media library size, quality, metadata, and alt text status.
- Page and post inventory.
- Navigation menus and widgets.
- Custom CSS and JavaScript locations.
- Performance baseline.
- Accessibility baseline.
- Backup and restore status.
- Security posture and spam comment status.
- Current permalink and URL structure.
- SEO metadata, indexing, redirects, and sitemap status.
- Migration risks tied to content, media, URLs, plugins, and theme dependencies.

