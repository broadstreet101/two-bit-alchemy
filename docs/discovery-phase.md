# Website Discovery Phase

This document begins the Website Discovery Phase for Two-Bit Alchemy. It is a planning document only. It does not make final platform, theme, plugin, design, or implementation decisions.

## Scope

This discovery is based on the existing project documentation:

- `Two-Bit_Alchemy_Website_AI_Handoff.md`
- `README.md`
- `docs/project-summary.md`
- `docs/decisions.md`
- `docs/brand-manifest.md`
- `docs/planning/implementation-approval-checklist.md`
- `docs/wordpress/pre-development-audit.md`

## Facts

- Two-Bit Alchemy is the umbrella identity.
- Fisher Aquatics should become one project within Two-Bit Alchemy.
- The existing Fisher Aquatics WordPress site has been mostly untouched for about one year.
- Before redesign work touches the live site, WordPress should be backed up, updated, audited, cleaned, and reviewed for security.
- No implementation framework, WordPress theme strategy, or platform direction has been approved yet.
- The brand manifest is the long-term creative and design constitution.
- The development workflow policy makes the Git repository the single source of truth.
- The project values simple technology, fast loading, accessibility, maintainability, open standards, and minimal dependencies.

## Assumptions

- The existing WordPress site contains content worth preserving or reviewing before replacement.
- The owner may prefer to retain WordPress if it reduces migration risk and keeps publishing familiar.
- The project will need both structured project pages and ongoing post-like content.
- Visual assets will require production preparation before launch.
- The repository is currently documentation-first and does not yet contain website implementation code.

## Items Requiring User Decisions

- Whether WordPress remains the production platform.
- Whether the existing site is redesigned in place or rebuilt separately and migrated.
- Whether Fisher Aquatics content remains at existing URLs, redirects to new URLs, or both.
- Which content belongs in Projects, Workshop Journal, Field Notes, Cabinet, About, and Philosophy.
- Which visual assets are final, which are references, and which need refinement.
- Accessibility, performance, privacy, analytics, and maintenance targets.
- Hosting and deployment constraints.

## 1. WordPress Architecture

### Recommendation

Continue discovery with WordPress as the leading candidate, but do not commit to it until the existing site audit is complete.

### Objective Reasons

- The current site is already WordPress-based, so staying with WordPress may reduce migration complexity.
- WordPress supports pages, posts, media, taxonomies, reusable templates, redirects, and editorial workflows without requiring custom publishing infrastructure.
- The planned site has multiple content types that map naturally to WordPress concepts: projects, journal posts, field notes, cabinet entries, pages, and media.
- Keeping WordPress may preserve existing URLs and content history more easily than a full platform migration.

### Advantages Of Continuing With WordPress

- Lower migration risk if existing content and media are worth preserving.
- Familiar administrative workflow.
- Mature ecosystem for backups, security, caching, SEO metadata, forms, image handling, and redirects.
- Suitable for both static pages and ongoing journal-style publishing.
- Can support either classic templates or modern block-based editing.

### Disadvantages Of Continuing With WordPress

- Requires ongoing updates, backups, security monitoring, and plugin maintenance.
- Plugin choices can introduce performance, compatibility, or security risk.
- A heavily customized WordPress setup can become harder to maintain than a simpler static site.
- The design may be constrained by theme architecture unless the theme strategy is chosen carefully.

### Alternative: Static Site

Advantages:

- Fast, secure, and low-maintenance once built.
- Minimal server-side attack surface.
- Good fit for mostly evergreen content and carefully prepared media.

Disadvantages:

- Less convenient for non-technical publishing unless paired with an editor-friendly workflow.
- Migration from WordPress requires content export, media cleanup, redirects, and manual review.
- Forms, search, comments, and dynamic features require additional services or custom work.

### Alternative: Headless CMS Or Hybrid

Advantages:

- Can separate content management from frontend presentation.
- Can support a highly optimized frontend while preserving a content editor.

Disadvantages:

- More moving parts than a conventional WordPress site.
- Higher maintenance burden.
- Less aligned with the approved technology philosophy of simple solutions and minimal dependencies unless there is a clear need.

### Objective Recommendation

Use WordPress as the default discovery path unless the audit reveals serious performance, security, hosting, editorial, or maintainability issues that make migration objectively safer.

## 2. Theme Strategy

### Existing Theme

Recommendation: Audit before retaining.

Advantages:

- Lowest immediate disruption.
- May preserve current layouts, settings, and content relationships.

Disadvantages:

- May carry outdated code, compatibility problems, visual constraints, or unnecessary features.
- May not support the broader Two-Bit Alchemy structure cleanly.

Best fit:

- Temporary stabilization or if the audit shows it is current, secure, lightweight, and flexible.

### Child Theme

Recommendation: Consider if the current parent theme is technically sound but needs controlled visual and template customization.

Advantages:

- Preserves parent theme update path.
- Allows targeted styling and template changes.
- Lower risk than editing a parent theme directly.

Disadvantages:

- Still depends on the parent theme's architecture and markup.
- Can become fragile if parent theme updates change template behavior.

Best fit:

- Incremental redesign where the existing theme foundation is healthy.

### Modern Block Theme

Recommendation: Strong candidate if WordPress remains the platform and the audit supports a modern rebuild.

Advantages:

- Aligns with current WordPress editing patterns.
- Supports reusable patterns, templates, and global styles.
- Can reduce dependency on page-builder plugins.
- Good fit for structured pages, journals, project templates, and content blocks.

Disadvantages:

- Requires careful setup to prevent inconsistent editing.
- May require new template and pattern planning.
- Existing content may need cleanup during migration.

Best fit:

- A site that needs flexible content editing while keeping implementation maintainable.

### Custom Theme

Recommendation: Consider only if brand, performance, or content structure needs cannot be met cleanly with an existing or block theme approach.

Advantages:

- Highest control over markup, performance, accessibility, and design system.
- Can be tailored precisely to Two-Bit Alchemy's content model and visual direction.

Disadvantages:

- Highest initial build cost.
- Requires more maintenance responsibility.
- Can overcomplicate the project if the content needs are straightforward.

Best fit:

- A carefully scoped build after content model, brand assets, and launch scope are approved.

### Objective Recommendation

Audit the existing theme first. If WordPress remains the platform, prefer the simplest theme strategy that supports accessibility, fast loading, brand expression, maintainable templates, and editor-friendly publishing.

## 3. Plugin Strategy

### Recommendation

Use plugins sparingly and only where they provide clear operational value. Avoid plugin overlap and avoid adding plugins for purely decorative effects.

### Broad Plugin Categories To Evaluate

- Backup and restore
- Security hardening
- Spam protection and comment moderation
- Caching and performance
- Image optimization
- SEO metadata and redirects
- Forms
- Gallery or media presentation
- Accessibility support and testing
- Analytics or privacy-friendly measurement
- Content organization, custom fields, or custom post type support
- Database cleanup and maintenance
- Migration or import/export tools

### Objective Plugin Rules

- Prefer fewer plugins with clear purpose.
- Prefer actively maintained plugins with strong compatibility history.
- Avoid duplicate plugins that solve the same problem.
- Avoid plugins that create lock-in unless the benefit is clear.
- Test performance impact before launch.
- Document every approved plugin category and reason.

## 4. Content Migration Strategy

### Recommendation

Migrate Fisher Aquatics from being the site identity into a dedicated project area under Two-Bit Alchemy.

### Proposed Content Model

- Two-Bit Alchemy: umbrella identity and homepage.
- Projects: primary section for major areas of work.
- Fisher Aquatics: one project within Projects.
- Workshop Journal: chronological progress and process posts.
- Field Notes: evergreen knowledge and reference material.
- Cabinet: collections, tools, books, specimens, photographs, and artifacts.
- About: personal introduction.
- Philosophy: explanation of Two-Bit Alchemy's meaning.

### Migration Steps

1. Inventory existing Fisher Aquatics pages, posts, media, comments, categories, tags, menus, forms, and redirects.
2. Classify each item as keep, revise, archive, redirect, or delete after review.
3. Identify Fisher Aquatics content that remains project-specific.
4. Identify broader content that belongs under Two-Bit Alchemy instead.
5. Preserve useful media and metadata.
6. Map existing URLs to future URLs before changing structure.
7. Create redirects for moved or retired pages.
8. Keep a migration record so content history is preserved.

### Objective Recommendation

Do not rewrite Fisher Aquatics as if it never existed. Preserve its history, move it into the broader project architecture, and use redirects and context-setting copy to make the transition clear.

## 5. Brand Asset Requirements

### Recommendation

Prepare final production assets before launch and keep original source/reference files separate from optimized web exports.

### Required Brand Assets Before Launch

- Master emblem source file
- Full-color or primary emblem export
- Monochrome emblem export
- Light-background logo/emblem variant
- Dark-background logo/emblem variant, if dark usage is approved
- Horizontal wordmark or lockup
- Stacked wordmark or lockup
- Icon-only mark
- SVG exports for scalable interface use
- PNG exports at common web sizes
- High-resolution social sharing image
- Open Graph image
- Favicon `.ico`
- SVG favicon, if supported by the final platform
- Apple touch icon
- Android or web app icon sizes, if needed
- Browser theme color definition
- Site placeholder image style
- Project thumbnail style
- Default journal post image style
- Default field note image style
- Image alt text guidance
- Brand color reference
- Typography reference
- Asset naming convention
- Asset optimization rules
- Usage notes for the current emblem artwork

### Objective Recommendation

Do not treat the current generated emblem image as the only production asset. Use it as an approved visual reference until final source, export, naming, optimization, and accessibility rules are defined.

## 6. Accessibility Goals

### Recommendation

Target WCAG 2.2 AA as the practical accessibility baseline unless a different standard is explicitly approved.

### Goals

- Semantic headings and landmarks.
- Keyboard-accessible navigation and controls.
- Visible focus states.
- Sufficient color contrast.
- Descriptive link text.
- Useful alt text for meaningful images.
- Empty alt text for decorative images.
- Reduced-motion support for any animation.
- Forms with labels, errors, and instructions.
- Responsive layouts that preserve reading comfort.
- No content hidden exclusively behind hover.

### Objective Recommendation

Make accessibility a design and implementation requirement from the first template, not a cleanup task before launch.

## 7. Performance Goals

### Recommendation

Set performance goals before theme or plugin selection so technical choices can be evaluated objectively.

### Goals

- Fast first load on mobile connections.
- Minimal render-blocking assets.
- Optimized images in appropriate formats and sizes.
- Lazy loading for non-critical images.
- Limited font files and weights.
- Minimal JavaScript.
- Caching strategy appropriate to hosting.
- No unnecessary animation libraries.
- No page-builder dependency unless approved by clear need.

### Suggested Launch Targets

- Pass Core Web Vitals in field data when enough traffic exists.
- Keep page weight low, especially on content pages.
- Keep homepage media carefully optimized.
- Test representative pages before launch: Home, Project, Journal post, Field Note, Cabinet entry, and About.

### Objective Recommendation

Performance should be treated as part of the brand experience: calm, readable, and fast supports the approved identity better than heavy decorative effects.

## 8. Security Goals

### Recommendation

Complete security and recoverability basics before redesign or launch work proceeds.

### Goals

- Verified full-site backup.
- Verified restore process.
- Updated WordPress core, theme, and plugins.
- Removal or moderation of spam comments.
- Least-privilege user accounts.
- Strong administrator credentials.
- Limited plugin count.
- Removal of inactive themes and plugins after backup.
- Form spam protection.
- HTTPS enforced.
- Regular update process.
- Security monitoring appropriate to the hosting environment.

### Objective Recommendation

Do not redesign on top of an unaudited or unbacked WordPress installation. Backup, updates, and restore confidence should come first.

## 9. Launch Roadmap

### Phase 1: Repository And Documentation Baseline

- Maintain project docs, brand manifest, implementation log, and discovery notes.
- Keep decisions separate from recommendations.
- Confirm GitHub remains the source of truth for project documentation and implementation files.
- Follow `docs/development-workflow.md` so implementation occurs as maintainable version-controlled files.

Status: In progress.

### Phase 2: WordPress Site Audit

- Backup site.
- Confirm restore path.
- Inventory WordPress version, theme, plugins, content, media, comments, forms, menus, users, and customizations.
- Review security, performance, accessibility, and content health.
- Document risks before making changes.

### Phase 3: Platform And Theme Decision

- Decide whether to continue with WordPress.
- Choose existing theme, child theme, block theme, custom theme, static site, or hybrid.
- Confirm hosting and deployment constraints.
- Confirm initial launch scope.

### Phase 4: Content Model And Migration Plan

- Define project, journal, field note, cabinet, about, and philosophy structures.
- Map Fisher Aquatics into the Projects area.
- Create URL and redirect plan.
- Decide what to keep, revise, archive, or remove.

### Phase 5: Brand Asset Production

- Finalize emblem production assets.
- Prepare favicon, social images, logo variants, and image guidelines.
- Confirm typography and color direction.
- Document asset usage rules.

### Phase 6: Prototype Or First Template

- Build the smallest approved implementation needed to validate architecture and visual direction.
- Test accessibility, performance, and maintainability early.
- Review against the brand manifest.

### Phase 7: Template And Content Buildout

- Build approved templates and content structures.
- Migrate and revise content.
- Optimize media.
- Configure approved plugin categories.

### Phase 8: Pre-Launch QA

- Test accessibility.
- Test performance.
- Test redirects.
- Test forms.
- Test backups.
- Review security.
- Review responsive layouts.
- Review content completeness.

### Phase 9: Public Launch

- Deploy approved site.
- Verify live pages, redirects, analytics or privacy settings, forms, and indexing rules.
- Monitor errors and performance.
- Record launch notes in the implementation log.

### Phase 10: Post-Launch Stewardship

- Maintain updates, backups, security checks, and content additions.
- Review plugin needs periodically.
- Continue documenting decisions and implementation sessions.

## Summary Of Objective Recommendations

- Keep WordPress as the leading candidate until the site audit proves otherwise.
- Audit the existing theme before choosing a theme strategy.
- Prefer the simplest theme approach that meets accessibility, performance, maintainability, and brand needs.
- Use plugins sparingly and by category, not habit.
- Move Fisher Aquatics into the Projects structure while preserving history and URLs where practical.
- Produce final brand assets before launch.
- Target WCAG 2.2 AA unless another standard is approved.
- Define performance targets before implementation choices.
- Complete backup, update, and security basics before redesign work.
- Use a phased launch roadmap that separates discovery, decisions, implementation, QA, and launch.
