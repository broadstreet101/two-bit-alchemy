# Theme Skeleton Plan

This document finalizes the approved prerequisites for creating the initial Two-Bit Alchemy WordPress theme skeleton.

Do not write theme code from this document until implementation is explicitly approved.

## Approved Theme Skeleton Direction

- Theme path: `src/themes/two-bit-alchemy/`
- Theme type: custom repository-controlled WordPress theme.
- Deployment target: WordPress.
- Editor support: Gutenberg-compatible.
- Design token strategy: `theme.json` for typography, colors, spacing, and editor consistency.
- CSS and JavaScript: minimal.
- Page builders: none.
- Deployment: package the theme from the repository, upload/install it in WordPress, and activate only after backup and review.

## 1. Initial Template File List

Approved initial root templates:

- `index.php`
- `front-page.php`
- `home.php`
- `page.php`
- `single.php`
- `archive.php`
- `category.php`
- `404.php`

Approved page templates:

- `templates/page-about.php`
- `templates/page-contact.php`
- `templates/page-projects.php`
- `templates/page-field-notes.php`
- `templates/page-workshop-journal.php`
- `templates/page-cabinet.php`

Approved category archive handling:

- Field Notes category archive.
- Workshop Journal category archive.

Implementation note:
These may begin through `category.php` with conditional handling or dedicated category templates after category slugs are confirmed. The requirement is that Field Notes and Workshop Journal archives have launch-ready presentation.

Deferred:

- `search.php` can wait until Search is introduced after launch.
- Custom post type templates are not needed at launch.
- Custom taxonomy templates are not needed at launch.

## 2. Reusable Template-Part List

Approved initial template parts:

- `template-parts/site-header.php`
- `template-parts/site-footer.php`
- `template-parts/primary-navigation.php`
- `template-parts/skip-link.php`
- `template-parts/entry-header.php`
- `template-parts/entry-content.php`
- `template-parts/entry-footer.php`
- `template-parts/card-project.php`
- `template-parts/card-entry.php`
- `template-parts/gallery-preview.php`
- `template-parts/related-content.php`
- `template-parts/pagination.php`

Deferred:

- `card-cabinet-item.php` until Cabinet has individual entries.
- Breadcrumbs unless later approved.
- Search form template part until Search is introduced.

## 3. Initial Block Pattern List

Keep block patterns minimal at launch.

Approved initial patterns:

- `patterns/intro.php`
- `patterns/featured-projects.php`
- `patterns/recent-journal.php`
- `patterns/selected-field-notes.php`

Deferred:

- Cabinet highlights pattern until Cabinet content is defined.
- Memorial patterns until Tributes / Memorials privacy and permissions are approved.
- Clutch archive patterns until copyright and attribution review is complete.

## 4. Typography Strategy

Approved strategy:

- Use system fonts initially.
- Do not add custom webfonts unless a clearly licensed typeface is already available and approved.
- Define typography settings in `theme.json`.
- Mirror front-end typography in the block editor.
- Prioritize readability over decorative personality.

Initial font stack direction:

- Body: readable system sans or serif stack, to be finalized during implementation.
- Headings: system stack initially.
- Captions/meta: system stack initially.

Typography targets:

- Comfortable long-form reading.
- Clear heading hierarchy.
- No viewport-scaled font sizes.
- Limited font weights.
- Consistent line-height tokens.

## 5. Color Tokens And Contrast Targets

Approved strategy:

- Use `theme.json` for editor-facing color presets.
- Use CSS custom properties for implementation.
- Use semantic token names.
- Preserve the warm, natural-history direction.
- Prioritize accessibility over decorative complexity.

Approved initial token categories:

- `background`
- `surface`
- `text`
- `muted-text`
- `border`
- `link`
- `link-hover`
- `accent`
- `focus`
- `selection`
- `error`

Contrast targets:

- Meet WCAG 2.2 AA for normal text, large text, links, controls, and focus indicators.
- Do not rely on color alone to communicate state.
- Validate token pairings before launch.

## 6. Brand Asset Export Requirements

Required before final launch:

- Master emblem source file.
- Primary emblem export.
- Monochrome emblem export.
- Light-background emblem/logo variant.
- Dark-background emblem/logo variant, if dark usage is approved.
- Horizontal wordmark or lockup.
- Stacked wordmark or lockup.
- Icon-only mark.
- SVG exports where appropriate.
- PNG exports at common web sizes.
- Favicon `.ico`.
- SVG favicon, if supported.
- Apple touch icon.
- Social sharing image.
- Open Graph image.
- Project placeholder image style.
- Journal placeholder image style.
- Field Note placeholder image style.
- Cabinet placeholder image style.

Implementation note:
The current emblem artwork remains a reference until final production exports are approved.

## 7. Image Sizes And Crop Rules

Approved initial image use cases:

- Emblem/logo display.
- Project thumbnail.
- Journal thumbnail.
- Field Note thumbnail.
- Gallery image.
- Full-width content image.
- Social preview image.

Approved crop strategy:

- Avoid aggressive crops for photography and documentary images.
- Prefer aspect-ratio consistency for cards and previews.
- Preserve original context where images are evidence, artifact, memorial, or reference material.
- Use WordPress responsive image output.
- Define only image sizes the theme truly needs.

Initial size planning:

- Project thumbnail: consistent card ratio.
- Journal and Field Note thumbnails: consistent archive ratio.
- Gallery images: optimized for viewing without oversized originals.
- Social preview: Open Graph-ready size.

Final dimensions should be confirmed after the WordPress media audit.

## 8. Accessibility Targets

Approved target:

- WCAG 2.2 AA as the practical baseline.

Theme skeleton must support:

- Semantic landmarks.
- Skip link.
- Keyboard-accessible navigation.
- Visible focus styles.
- Correct heading order.
- Sufficient color contrast.
- Reduced-motion support.
- Accessible pagination.
- Accessible image alt-text practices.
- Forms that can support labels, errors, and instructions.
- No content hidden exclusively behind hover.

Verification expectation:
Theme implementation should be tested on representative pages: Home, Projects, Project, Field Notes archive, Workshop Journal archive, single post, Cabinet, About, Contact, and 404.

## 9. Performance Targets

Approved performance priorities:

- Fast loading.
- Minimal CSS.
- Minimal JavaScript.
- No page builders.
- No heavy animation libraries.
- System fonts initially.
- Native WordPress responsive images.
- No large theme-bundled photography.
- Load assets only where needed when practical.

Launch checks:

- Homepage page weight.
- Representative page/post weight.
- Image dimensions and compression.
- Font file count, expected to be zero custom webfont files initially.
- Render-blocking resources.
- Mobile load behavior.

## 10. Deployment Process From Repository To WordPress

Approved simple deployment process:

1. Build or package the custom theme from `src/themes/two-bit-alchemy/`.
2. Confirm the live WordPress site has a current backup and restore path.
3. Review the package contents before upload.
4. Upload/install the theme in WordPress.
5. Activate only after backup and review.
6. Configure required WordPress settings, menus, media, and content manually where unavoidable.
7. Run final testing after activation.
8. Record deployment notes in the implementation log.

Deployment principles:

- The repository remains the source of truth.
- No durable code should exist only inside WordPress admin.
- Manual WordPress work should be limited to activation, configuration, media, content, menus, unavoidable settings, and final testing.

## 11. Philosophy Placement

Approved launch placement:

- Philosophy should be a section on the About page at launch.
- Philosophy should not be a top-level page at launch.
- Philosophy should not be a separate child page at launch unless a later decision changes this.

Reason:
This keeps the launch navigation simple while preserving the philosophical framing inside the personal About context.

## Ready For Theme Skeleton Creation

Theme skeleton creation is ready to begin after explicit implementation approval, with these constraints:

- Create files only under the approved repository path.
- Do not modify the live WordPress site.
- Do not add custom post types.
- Do not add custom taxonomies.
- Do not add page builders or page-builder dependencies.
- Keep the skeleton minimal and deployable.

