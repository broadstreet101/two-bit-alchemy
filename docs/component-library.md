# Component Library

This document defines reusable UI components for Two-Bit Alchemy.

It is documentation only. It does not create CSS, implement components, redesign the website, or define final visual styling.

## Source Documents

- `docs/design-system.md`
- `docs/layout-system.md`
- `docs/visual-language.md`
- `docs/theme-architecture.md`
- `docs/content-model.md`
- `docs/voice-and-editorial-guide.md`

## Component Rules

Every component should support the approved goals:

- Calm reading.
- Clear navigation.
- Authentic documentation.
- Accessible interaction.
- Maintainable WordPress templates.
- Reuse without decorative excess.

For each component:

- Purpose defines why it exists.
- Content rules define what belongs inside it.
- Accessibility expectations define minimum behavior.
- Responsive behavior defines how it adapts.
- Reuse guidelines define where it should appear.
- Objective implementation rules may be applied directly.
- Subjective styling considerations require future approval.

## 1. Typography Components

### Page Title

- Purpose: Identify the current page, post, archive, or major template.
- Content rules: Use one clear title; do not combine title and subtitle into one heading.
- Accessibility expectations: Usually `h1`; must be unique and descriptive.
- Responsive behavior: Wrap naturally; do not shrink with viewport width.
- Reuse guidelines: All pages, posts, archives, and 404 views.
- Objective implementation rules: Preserve one primary `h1`; avoid empty headings.
- Subjective styling considerations: Display size, personality, ornament, alignment.

### Section Title

- Purpose: Identify a major content region.
- Content rules: Short, specific, and connected to the following content.
- Accessibility expectations: Usually `h2`; referenced by `aria-labelledby` when labeling a section.
- Responsive behavior: Wrap cleanly without overlap.
- Reuse guidelines: Homepage sections, About sections, project sections, archive groupings.
- Objective implementation rules: Maintain logical heading order.
- Subjective styling considerations: Spacing, decorative treatments, final typographic scale.

### Subheading

- Purpose: Identify a subsection or repeated component title.
- Content rules: Use for cards, grouped content, and nested explanations.
- Accessibility expectations: Usually `h3` or lower, depending on context.
- Responsive behavior: Keep close to the content it introduces.
- Reuse guidelines: Cards, callouts, gallery groups, related content.
- Objective implementation rules: Do not skip heading levels for visual reasons.
- Subjective styling considerations: Weight, size, casing, rhythm.

### Body Text

- Purpose: Carry the main reading experience.
- Content rules: Plain, specific, and grounded in observation or context.
- Accessibility expectations: Meets contrast and readable line-height targets.
- Responsive behavior: Constrained to reading width.
- Reuse guidelines: All long-form content.
- Objective implementation rules: Avoid full-width long paragraphs.
- Subjective styling considerations: Final font, size, texture, paragraph rhythm.

### Caption

- Purpose: Explain or contextualize an image, artifact, figure, or table.
- Content rules: Add context, source, date, place, credit, or meaning; do not merely repeat visible text.
- Accessibility expectations: Associated with the relevant media when possible.
- Responsive behavior: Stay visually connected to the media.
- Reuse guidelines: Figures, galleries, artifact images, tables.
- Objective implementation rules: Use captions when context or credit is needed.
- Subjective styling considerations: Size, placement, muted tone, label treatment.

### Metadata

- Purpose: Provide date, category, tag, credit, status, source, or contextual details.
- Content rules: Keep concise and factual.
- Accessibility expectations: Use semantic elements such as `time` when appropriate.
- Responsive behavior: Wrap without becoming cramped.
- Reuse guidelines: Posts, previews, artifacts, galleries, archive cards.
- Objective implementation rules: Machine-readable dates where possible.
- Subjective styling considerations: Divider marks, label style, uppercase or sentence case.

### Pull Quote

- Purpose: Highlight a meaningful excerpt or reflection.
- Content rules: Use sparingly; do not use as filler.
- Accessibility expectations: Preserve quote text in document flow; attribution when needed.
- Responsive behavior: Fit within reading width or approved wide context.
- Reuse guidelines: Essays, Field Notes, Workshop Journal entries, About/Philosophy content.
- Objective implementation rules: Do not quote copyrighted material beyond allowed limits.
- Subjective styling considerations: Scale, indentation, rules, ornament.

### Code Block

- Purpose: Present code, commands, configuration, or structured examples.
- Content rules: Include only code that helps the explanation.
- Accessibility expectations: Preserve text, contrast, wrapping/scrolling, and keyboard access.
- Responsive behavior: Avoid page-level horizontal overflow.
- Reuse guidelines: Software notes, technical Field Notes, Workshop Journal entries.
- Objective implementation rules: Preserve indentation; label context when useful.
- Subjective styling considerations: Syntax highlighting, background, border, typeface.

### Lists

- Purpose: Organize observations, steps, materials, references, or navigation.
- Content rules: Use when items are parallel or easier to scan as a group.
- Accessibility expectations: Use semantic `ul` or `ol`.
- Responsive behavior: Indentation should remain readable on small screens.
- Reuse guidelines: Content pages, callouts, project notes, checklists.
- Objective implementation rules: Do not fake lists with line breaks.
- Subjective styling considerations: Marker style, spacing, custom icons.

## 2. Navigation Components

### Primary Navigation

- Purpose: Provide the main site routes.
- Content rules: Use approved launch order: Home, Projects, Field Notes, Workshop Journal, Cabinet, About, Contact.
- Accessibility expectations: Semantic `nav` with label; keyboard accessible.
- Responsive behavior: Remains usable on small screens without hiding essential routes.
- Reuse guidelines: Site header only.
- Objective implementation rules: No Search in primary navigation at launch.
- Subjective styling considerations: Alignment, spacing, active-state treatment.

### Breadcrumbs

- Purpose: Show location in deeper hierarchies.
- Content rules: Use only when depth justifies them.
- Accessibility expectations: Labeled navigation; current page indicated.
- Responsive behavior: Wrap or truncate carefully without losing meaning.
- Reuse guidelines: Future project child pages, deep archives, special collections.
- Objective implementation rules: Do not add until navigation depth creates a real need.
- Subjective styling considerations: Separator symbol, placement, subtlety.

### Footer Navigation

- Purpose: Provide quiet secondary access to important routes.
- Content rules: Include only useful destinations.
- Accessibility expectations: Semantic navigation if it contains link groups.
- Responsive behavior: Stack cleanly on small screens.
- Reuse guidelines: Site footer.
- Objective implementation rules: Do not use footer as a dumping ground.
- Subjective styling considerations: Column count, grouping, visual weight.

### Previous / Next Navigation

- Purpose: Move between posts, archive pages, or related sequential material.
- Content rules: Label destinations clearly.
- Accessibility expectations: Labeled navigation; link text understandable.
- Responsive behavior: Stack when horizontal space is limited.
- Reuse guidelines: Single posts, archives, galleries, multi-part content.
- Objective implementation rules: Preserve keyboard access and screen-reader clarity.
- Subjective styling considerations: Arrow treatment, labels, layout.

## 3. Content Components

### Project Card

- Purpose: Preview a project and route visitors to its page.
- Content rules: Project title, short description, optional image, optional metadata.
- Accessibility expectations: Clear heading and link; image alt text follows purpose.
- Responsive behavior: Cards stack or reflow without losing scan order.
- Reuse guidelines: Homepage Featured Projects, Projects landing page, related project lists.
- Objective implementation rules: Do not use cards without a meaningful destination.
- Subjective styling considerations: Border, surface, image ratio, density.

### Field Note Preview

- Purpose: Preview an evergreen observation or reference post.
- Content rules: Title, date or context, excerpt, optional category/topic, optional image.
- Accessibility expectations: Linked title; date uses `time` when available.
- Responsive behavior: Readable in list or card layouts.
- Reuse guidelines: Homepage, Field Notes landing, category archive, related content.
- Objective implementation rules: Do not show unrelated posts when category is empty.
- Subjective styling considerations: Excerpt length, card/list treatment.

### Workshop Journal Preview

- Purpose: Preview dated process work.
- Content rules: Title, date, excerpt, project/topic context, optional process image.
- Accessibility expectations: Same as Field Note Preview.
- Responsive behavior: Supports chronological scanning.
- Reuse guidelines: Homepage, Workshop Journal landing, category archive.
- Objective implementation rules: Preserve date visibility.
- Subjective styling considerations: Timeline feeling, metadata placement.

### Gallery Preview

- Purpose: Preview a selected group of images.
- Content rules: Title, representative image, short context, image count when useful.
- Accessibility expectations: Representative image alt text or decorative empty alt as appropriate.
- Responsive behavior: Image crops remain honest and not misleading.
- Reuse guidelines: Photography project, Cabinet, project pages, related galleries.
- Objective implementation rules: Do not render empty gallery wrappers.
- Subjective styling considerations: Grid density, crop style, hover treatment.

### Figure

- Purpose: Present an image, diagram, artifact, or media object as content.
- Content rules: Media must support nearby content.
- Accessibility expectations: Use meaningful alt text or empty alt if decorative.
- Responsive behavior: Scale without overflow.
- Reuse guidelines: Posts, pages, Field Notes, Workshop Journal, Cabinet.
- Objective implementation rules: Keep media close to relevant text.
- Subjective styling considerations: Alignment, width, border, surface.

### Figure With Caption

- Purpose: Present media with explanation, credit, or source context.
- Content rules: Caption should add useful information.
- Accessibility expectations: Semantic `figure` and `figcaption` when implemented.
- Responsive behavior: Caption stays associated with media.
- Reuse guidelines: Artifact images, photographs, diagrams, historical records.
- Objective implementation rules: Use when source, date, credit, or context matters.
- Subjective styling considerations: Caption tone, placement, typography.

### Blockquote

- Purpose: Present quoted or excerpted material.
- Content rules: Use only when quote matters; include attribution when needed.
- Accessibility expectations: Semantic blockquote; citation if available.
- Responsive behavior: Remain readable inside content width.
- Reuse guidelines: Essays, notes, memorials, references.
- Objective implementation rules: Respect copyright and quotation limits.
- Subjective styling considerations: Indentation, rules, accent marks.

### Observation Callout

- Purpose: Highlight a noticed detail, lesson, or field observation.
- Content rules: Short, specific, tied to real context.
- Accessibility expectations: Do not rely on color alone to communicate type.
- Responsive behavior: Fit within reading width.
- Reuse guidelines: Field Notes, Workshop Journal, project pages.
- Objective implementation rules: Use only when emphasis improves understanding.
- Subjective styling considerations: Icon, label, surface color.

### Tip / Technique Callout

- Purpose: Highlight a practical method or learned technique.
- Content rules: Actionable and experience-based.
- Accessibility expectations: Clear label and readable contrast.
- Responsive behavior: Avoid cramped multi-column tips.
- Reuse guidelines: Technical notes, process posts, methods pages.
- Objective implementation rules: Separate tested guidance from speculation.
- Subjective styling considerations: Label text, visual emphasis.

### Historical Artifact

- Purpose: Present preserved material as evidence or memory.
- Content rules: Include context, source, date, credit, and sensitivity notes when needed.
- Accessibility expectations: Meaningful alt text and captions.
- Responsive behavior: Allow enough size for inspection.
- Reuse guidelines: Cabinet, legacy Fisher Aquatics, Tributes, Clutch Archive after review.
- Objective implementation rules: Review privacy, permission, copyright, and attribution.
- Subjective styling considerations: Restoration level, crop, frame, aged-paper treatment.

### Related Content

- Purpose: Connect pages, posts, projects, notes, and artifacts.
- Content rules: Related items should be genuinely useful.
- Accessibility expectations: Labeled region when rendered; no empty landmarks.
- Responsive behavior: Stack or grid predictably.
- Reuse guidelines: Single posts, project pages, Field Notes, Workshop Journal.
- Objective implementation rules: Do not render if no related content exists.
- Subjective styling considerations: Card/list format, section title.

### Metadata Block

- Purpose: Group structured details about a project, post, artifact, or source.
- Content rules: Use concise labels and values.
- Accessibility expectations: Use semantic lists, tables, or definition lists as appropriate.
- Responsive behavior: Stack labels and values on small screens.
- Reuse guidelines: Projects, artifacts, technical notes, archive pages.
- Objective implementation rules: Keep metadata factual and maintainable.
- Subjective styling considerations: Label treatment, dividers, density.

## 4. Interactive Components

### Buttons

- Purpose: Trigger clear actions.
- Content rules: Direct action labels; no vague button text.
- Accessibility expectations: Native buttons for actions; links for navigation.
- Responsive behavior: Tap targets remain usable.
- Reuse guidelines: Forms, downloads, approved tools.
- Objective implementation rules: Do not style ordinary navigation as buttons by default.
- Subjective styling considerations: Shape, weight, icon use, hierarchy.

### Text Links

- Purpose: Move visitors to related content or sources.
- Content rules: Link text should describe the destination.
- Accessibility expectations: Recognizable without relying only on color.
- Responsive behavior: Wrap naturally.
- Reuse guidelines: Body copy, captions, metadata, related links.
- Objective implementation rules: Avoid "click here" when a meaningful label is possible.
- Subjective styling considerations: Underline treatment, hover style.

### External Links

- Purpose: Link to outside sources, references, tools, or credits.
- Content rules: Use when external context is useful.
- Accessibility expectations: Indicate external behavior when it matters.
- Responsive behavior: Long URLs should not overflow.
- Reuse guidelines: Source lists, credits, references, project pages.
- Objective implementation rules: Use authoritative sources where appropriate.
- Subjective styling considerations: External-link icon, label style.

### Download Links

- Purpose: Provide files for download.
- Content rules: Include file type and size when useful.
- Accessibility expectations: Clear destination and format.
- Responsive behavior: Tap target remains usable.
- Reuse guidelines: Reference PDFs, project files, future resources.
- Objective implementation rules: Do not hide file type for non-HTML destinations.
- Subjective styling considerations: Icon, button versus text link.

### Search Field

- Purpose: Help visitors find archive content when search is approved.
- Content rules: Clear label and submit behavior.
- Accessibility expectations: Associated label, keyboard accessible.
- Responsive behavior: Fits small screens without truncating label or input.
- Reuse guidelines: Future search page or archive support, not primary nav at launch.
- Objective implementation rules: Do not add to primary navigation at launch.
- Subjective styling considerations: Placement, compactness, icon treatment.

### Pagination

- Purpose: Navigate archive pages.
- Content rules: Previous/next labels and page numbers when useful.
- Accessibility expectations: Labeled navigation and screen-reader text.
- Responsive behavior: Compress or wrap on small screens.
- Reuse guidelines: Archives, search results, long lists.
- Objective implementation rules: Preserve page context and keyboard access.
- Subjective styling considerations: Number style, arrows, spacing.

## 5. Structural Components

### Hero Section

- Purpose: Introduce a page's main identity or purpose.
- Content rules: Title, short welcome/orientation, optional approved supporting content.
- Accessibility expectations: Contains or follows the page `h1`; no hidden critical text.
- Responsive behavior: Text remains readable before visual drama.
- Reuse guidelines: Homepage and major landing pages only.
- Objective implementation rules: No decorative hero artwork until approved.
- Subjective styling considerations: Scale, image use, artwork placement.

### Intro Section

- Purpose: Orient visitors before deeper content.
- Content rules: Brief, plain-language context.
- Accessibility expectations: Logical heading and readable text.
- Responsive behavior: Reading width preferred.
- Reuse guidelines: Projects, About, Cabinet, section landing pages.
- Objective implementation rules: Avoid marketing-style filler.
- Subjective styling considerations: Lead text size, spacing.

### Standard Content Section

- Purpose: Group related content under a heading.
- Content rules: One clear idea per section.
- Accessibility expectations: Labeled by a heading.
- Responsive behavior: Preserve content order.
- Reuse guidelines: All interior pages and homepage sections.
- Objective implementation rules: Use semantic `section` only when there is a meaningful heading/region.
- Subjective styling considerations: Spacing, divider, background surface.

### Gallery Section

- Purpose: Present a selected image group.
- Content rules: Curated images, meaningful order, captions as needed.
- Accessibility expectations: Alt text, captions, keyboard accessible if interactive.
- Responsive behavior: Reflow without cropping away meaning.
- Reuse guidelines: Photography, projects, Cabinet, Field Notes.
- Objective implementation rules: Optimize images and preserve context.
- Subjective styling considerations: Grid, masonry, carousel avoidance or approval.

### Footer

- Purpose: Close the page quietly and provide useful secondary context.
- Content rules: Site identity, key links, contact path, practical notes as needed.
- Accessibility expectations: Semantic footer; navigation labeled if present.
- Responsive behavior: Stack cleanly.
- Reuse guidelines: Every public template.
- Objective implementation rules: Keep footer useful and not promotional clutter.
- Subjective styling considerations: Emblem use, columns, visual weight.

## Implementation Notes

Component implementation should begin with semantic markup and accessibility behavior before styling.

Do not create new variants unless:

- A repeated content need exists.
- The existing component cannot support the content clearly.
- The new variant improves accessibility, maintainability, or content clarity.

Subjective visual treatment should be handled in later approved styling phases.
