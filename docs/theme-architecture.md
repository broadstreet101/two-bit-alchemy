# Theme Architecture

This document defines the planned architecture for a custom Two-Bit Alchemy WordPress theme. It is an architecture document only. Do not create PHP, CSS, JavaScript, or theme files until implementation is explicitly approved.

## Source Documents And References

Project documents:

- `docs/brand-manifest.md`
- `docs/development-workflow.md`
- `docs/site-architecture.md`
- `docs/site-map.md`
- `docs/content-model.md`
- `docs/decisions.md`
- `docs/discovery-phase.md`

Official WordPress references:

- WordPress Theme Handbook: https://developer.wordpress.org/themes/
- WordPress Global Settings and Styles: https://developer.wordpress.org/themes/global-settings-and-styles/

## Overall Philosophy

The theme should be lightweight, maintainable, accessible, and specific to Two-Bit Alchemy.

Architectural principles:

- The repository is the source of truth.
- Theme structure should live as complete project files under version control.
- WordPress admin work should focus on content and necessary configuration, not repeated code copy/paste.
- Technology should quietly support the content.
- Prefer simple solutions before complex ones.
- Prefer fast loading, minimal dependencies, open standards, and accessible defaults.
- Do not use third-party page builders.
- Do not depend on Elementor or similar tools.
- Do not place durable implementation code only inside WordPress admin fields.

Approved theme model:

- A custom repository-controlled WordPress theme.
- PHP templates and template parts for durable layout structure.
- Gutenberg/block editor support for page and post content.
- `theme.json` for editor-facing design tokens, block settings, and global styles where appropriate.
- Minimal JavaScript, only where interaction requires it.
- Minimal WordPress admin customization beyond theme activation, menus, media, content, and unavoidable configuration.
- No page builders.

## Proposed Folder Structure

Future implementation should place the theme under the approved path `src/themes/two-bit-alchemy/`.

```text
src/
`-- themes/
    `-- two-bit-alchemy/
        |-- style.css
        |-- functions.php
        |-- theme.json
        |-- screenshot.png
        |-- index.php
        |-- front-page.php
        |-- home.php
        |-- page.php
        |-- single.php
        |-- archive.php
        |-- category.php
        |-- search.php
        |-- 404.php
        |-- templates/
        |   |-- page-about.php
        |   |-- page-contact.php
        |   |-- page-projects.php
        |   |-- page-field-notes.php
        |   |-- page-workshop-journal.php
        |   `-- page-cabinet.php
        |-- template-parts/
        |   |-- site-header.php
        |   |-- site-footer.php
        |   |-- primary-navigation.php
        |   |-- entry-header.php
        |   |-- entry-content.php
        |   |-- entry-footer.php
        |   |-- card-project.php
        |   |-- card-entry.php
        |   |-- card-cabinet-item.php
        |   |-- related-content.php
        |   `-- pagination.php
        |-- patterns/
        |   |-- intro.php
        |   |-- featured-projects.php
        |   |-- recent-journal.php
        |   |-- selected-field-notes.php
        |   `-- cabinet-highlights.php
        |-- assets/
        |   |-- css/
        |   |   |-- main.css
        |   |   |-- editor.css
        |   |   `-- print.css
        |   |-- js/
        |   |   |-- navigation.js
        |   |   `-- theme.js
        |   |-- fonts/
        |   |-- images/
        |   `-- icons/
        |-- inc/
        |   |-- setup.php
        |   |-- enqueue.php
        |   |-- template-tags.php
        |   |-- block-support.php
        |   |-- image-sizes.php
        |   |-- navigation.php
        |   `-- cleanup.php
        `-- languages/
```

This is an architectural target, not an instruction to create files yet.

## Template Hierarchy

The theme should follow WordPress template hierarchy conventions while keeping project-specific templates explicit and readable.

Core templates:

- `front-page.php` for the homepage.
- `home.php` for the posts index if WordPress needs a separate posts page.
- `page.php` for normal pages.
- `single.php` for posts and journal-style entries unless custom post types are approved later.
- `archive.php` for general archives.
- `category.php` for category archives.
- `search.php` for future search results if search is enabled after launch.
- `404.php` for not-found pages.
- `index.php` as the required fallback.

Approved launch page templates:

- Projects landing page.
- Fisher Aquatics project page.
- Kiwi project page.
- Photography project page.
- Field Notes landing page.
- Workshop Journal landing page.
- Cabinet landing page.
- About page with Philosophy under About.
- Contact page.

Content model direction:
`docs/content-model.md` approves standard pages, posts, categories, tags, and media for launch, with no custom post types or custom taxonomies until a clear future need is approved.

Approved archive template requirement:
Include category archive templates for Field Notes and Workshop Journal at launch.

## Reusable Template Parts

Template parts should prevent duplicate markup and keep future maintenance simple.

Recommended template parts:

- Site header.
- Site footer.
- Primary navigation.
- Skip link.
- Entry header.
- Entry content wrapper.
- Entry footer.
- Project card.
- Journal card.
- Field note card.
- Cabinet item card.
- Gallery preview.
- Related content block.
- Pagination.
- Breadcrumb or contextual navigation, if approved later.

Rules:

- Keep template parts small and named by purpose.
- Use template parts for repeated structures only.
- Avoid decorative template parts that add complexity without reuse.
- Ensure template parts can be tested and reviewed in isolation.

## Asset Organization

Theme assets should be separate from source brand references.

Repository-level brand assets:

- `assets/brand/`
- `assets/images/`
- `assets/photography/`
- `assets/references/`

Theme-ready assets:

- `src/themes/two-bit-alchemy/assets/images/`
- `src/themes/two-bit-alchemy/assets/icons/`
- `src/themes/two-bit-alchemy/assets/fonts/`

Rules:

- Keep original source/reference assets outside the theme.
- Place optimized production assets inside the theme only when needed by templates.
- Do not duplicate large photography libraries inside the theme.
- Use clear filenames and document final asset export rules before launch.
- Keep favicons, social images, and logo variants governed by the brand asset requirements.

## CSS Organization

CSS should be small, layered, and token-driven.

Recommended CSS files:

- `main.css` for front-end theme styles.
- `editor.css` for block editor alignment with front-end typography and spacing.
- `print.css` only if print styling is worth maintaining.

Recommended CSS organization:

```text
1. Reset or normalization
2. Design tokens and root variables
3. Base elements
4. Typography
5. Layout primitives
6. WordPress block defaults
7. Template parts
8. Components
9. Utilities
10. Print styles, if separated
```

Rules:

- Favor CSS custom properties for design tokens.
- Avoid large utility frameworks unless separately approved.
- Avoid page-specific CSS unless a real content need exists.
- Keep block editor CSS aligned with front-end reading experience.
- Do not rely on Customizer Additional CSS as durable implementation.

## JavaScript Organization

JavaScript should be minimal and progressive.

Recommended files:

- `navigation.js` for responsive navigation behavior, if needed.
- `theme.js` for small theme interactions, if any are approved.

Rules:

- No JavaScript for effects that CSS or native HTML can handle.
- No heavy animation libraries.
- No decorative motion that conflicts with the brand's minimal-animation principle.
- Support reduced-motion preferences.
- Keep scripts scoped, defer where appropriate, and avoid global clutter.
- Ensure navigation works without fragile dependencies.

## Image Handling

Image handling should support photography and illustration without slowing the site.

Principles:

- Use WordPress image sizes intentionally.
- Define only the image sizes the theme truly needs.
- Use responsive images through WordPress native image output.
- Prefer optimized production image formats and dimensions.
- Preserve meaningful alt text.
- Use empty alt text for decorative images.
- Avoid embedding oversized originals directly into theme templates.
- Treat the current emblem image as a reference until final production exports are approved.

Likely theme image needs:

- Logo or emblem display.
- Project thumbnail.
- Journal thumbnail.
- Field note thumbnail.
- Cabinet item thumbnail.
- Gallery image.
- Social preview image.

Implementation decision still required:
Final image sizes and crop behavior should be based on approved content models and actual media inventory from the WordPress audit.

## Typography Strategy

Typography should support calm reading, a field-journal tone, and strong content hierarchy.

Principles:

- Choose typefaces after creative approval.
- Limit font families and font weights.
- Prefer local font hosting if licensing allows.
- Define font tokens in `theme.json` and CSS custom properties.
- Keep body text highly readable.
- Avoid viewport-scaled font sizes.
- Use consistent heading levels and semantic hierarchy.
- Ensure editor typography mirrors front-end typography.

Token groups:

- Body font.
- Heading font.
- Supporting or caption font, if approved.
- Base size.
- Reading size.
- Small text.
- Heading scale.
- Line heights.

Implementation decision still required:
Final typefaces and font licensing.

## Color Token Strategy

Color should preserve the approved warm, natural-history direction while staying accessible.

Principles:

- Define approved color tokens before implementation.
- Use semantic token names rather than one-off color names.
- Use `theme.json` color presets for editor consistency.
- Use CSS custom properties for front-end implementation.
- Test foreground/background contrast before approval.
- Avoid introducing a broad palette that dilutes the visual identity.

Possible token categories:

- Background.
- Surface.
- Text.
- Muted text.
- Border.
- Link.
- Link hover/focus.
- Accent.
- Selection.
- Focus outline.
- Warning or error, if forms require it.

Implementation decision still required:
Final palette and contrast validation.

## Gutenberg Compatibility

The theme should support Gutenberg for content editing while keeping layout architecture in the repository.

Approach:

- Support standard WordPress blocks.
- Use `theme.json` for editor settings, typography presets, color presets, spacing controls, and block style alignment where appropriate.
- Provide editor styles so content authors see a close approximation of the front-end reading experience.
- Register project-specific block patterns only when they reduce repeated manual assembly.
- Keep patterns simple and content-oriented.
- Avoid building critical site structure only in the Site Editor database.
- Avoid third-party page builders.

Allowed Gutenberg uses:

- Page and post content.
- Reusable content patterns after approval.
- Galleries and image content where appropriate.
- Editorial formatting.

Avoid:

- Treating ad hoc block layouts as the durable source of theme architecture.
- Using block editor customization to replace repository-managed templates.
- Requiring manual copy/paste of block HTML for normal publishing.

## Future Child Theme Considerations

The preferred launch direction is a single custom parent theme controlled by the repository.

Child theme support should remain possible but not necessary for launch.

Guidelines:

- Do not create a child theme unless there is a clear future need.
- Keep hooks, filters, and template parts organized enough that a child theme could override selectively later.
- Avoid hard-coding content that should be managed through WordPress.
- Keep brand-critical design tokens in predictable places.
- Document any extension points created during implementation.

Potential future child theme use:

- A special Fisher Aquatics legacy presentation.
- Experimental seasonal or gallery-specific styling.
- A future subproject with a distinct presentation need.

These are future possibilities, not launch requirements.

## Accessibility Approach

Accessibility should be built into the theme from the first implementation pass.

Theme requirements:

- Semantic HTML landmarks.
- Skip link.
- Keyboard-accessible navigation.
- Visible focus styles.
- Correct heading order.
- Sufficient color contrast.
- Respect reduced-motion preferences.
- Accessible menu controls.
- Accessible pagination.
- Form styles that support labels, errors, and instructions.
- Image alt text guidance.
- No content hidden exclusively behind hover.
- Responsive typography and spacing.

Testing expectations:

- Test keyboard navigation.
- Test screen-reader landmarks at a basic level.
- Test color contrast.
- Test mobile reading comfort.
- Test representative templates: Home, Project, Field Note, Workshop Journal entry, Cabinet, About, Contact, and 404.

## Performance Approach

Performance should reinforce the calm, readable experience.

Theme requirements:

- Minimal CSS.
- Minimal JavaScript.
- No page builder dependency.
- No unnecessary animation library.
- Use native WordPress image handling.
- Avoid loading assets globally when only needed on specific templates.
- Use system fonts or limited local font files unless creative direction requires otherwise.
- Defer non-critical scripts where appropriate.
- Keep template logic simple.
- Avoid large theme-bundled images.

Performance checks:

- Homepage weight.
- Representative content page weight.
- Image sizes.
- Font file count and size.
- Render-blocking resources.
- Mobile load behavior.
- Caching compatibility after hosting details are known.

## Implementation Approval Checklist

Before theme implementation begins, approve:

- Required initial templates.
- Required reusable template parts.
- Initial block pattern list.
- Typography choices and licensing.
- Color tokens and contrast targets.
- Production brand asset exports.
- Image sizes and crop rules.
- Accessibility target.
- Performance target.
- Deployment process from repository to WordPress.

Already approved:

- Custom theme model: repository-controlled WordPress theme.
- Theme folder path: `src/themes/two-bit-alchemy/`.
- Gutenberg compatibility.
- `theme.json`-based design tokens.
- Minimal CSS and JavaScript.
- No page builders.

Content model approval status:

Approved.

Approved content model:

- Launch model uses standard pages plus posts/categories.
- No custom post types at launch.
- No custom taxonomies at launch.
- Cabinet starts as a curated page.
- Projects are child pages under `/projects/`.
- Philosophy lives under About.
- Media uses clear filenames, meaningful alt text, and credit notes where needed.
- Category archive templates are included at launch for Field Notes and Workshop Journal.

## Non-Goals

- Do not modify the live WordPress site during architecture.
- Do not create PHP, CSS, or JavaScript during this phase.
- Do not recommend third-party page builders.
- Do not use Elementor or similar tools.
- Do not make WordPress admin edits the source of truth.
- Do not create a child theme for launch unless separately approved.
