# Design System

This document is the permanent visual design reference for the Two-Bit Alchemy website. It translates the approved brand direction into practical visual rules for future theme work.

It documents the design system only. It does not implement CSS, PHP, JavaScript, artwork, layouts, or final homepage design.

## Source Documents

- `docs/brand-manifest.md`
- `docs/theme-architecture.md`
- `docs/content-model.md`
- `docs/site-architecture.md`
- `docs/decisions.md`

## 1. Design Philosophy

### Overall Visual Goals

The site should feel personal, exploratory, grounded, durable, and quietly magical without becoming fantasy, steampunk, horror, corporate, or trend-driven.

The visual system should support:

- Observation.
- Recordkeeping.
- Understanding.
- Making.
- Patient transformation through craft and curiosity.

The design should feel like a thoughtful field journal, workshop notebook, or natural-history archive. It should be calm enough for reading, structured enough for ongoing publishing, and distinctive enough to belong to Two-Bit Alchemy.

### Craftsmanship, Science, Curiosity, And Quiet Exploration

Two-Bit Alchemy sits between hand work and study:

- Craftsmanship appears through careful details, durable structure, restrained ornament, and respect for process.
- Science appears through clarity, hierarchy, observation, labeling, evidence, and useful references.
- Curiosity appears through discovery paths, related links, photographs, artifacts, and room for wandering.
- Quiet exploration appears through calm pacing, readable pages, minimal animation, and content that rewards close attention.

Objective design improvements should improve readability, accessibility, orientation, performance, maintainability, or preservation of approved brand decisions. Subjective choices such as exact ornament density, typeface personality, and final artwork treatment require creative approval.

## 2. Layout System

### Maximum Content Width

Use a generous but controlled maximum width for broad page structures.

Approved direction:

- Wide content maximum: approximately `1120px`.
- Use wider layouts only when content benefits from comparison, galleries, project cards, or archive scanning.
- Avoid full-width text paragraphs.

### Reading Width

Long-form reading should remain comfortably narrow.

Approved direction:

- Reading content maximum: approximately `720px`.
- Body copy, posts, Field Notes, Workshop Journal entries, About content, and reflective writing should prefer the reading width.
- Wider media may break out only when the image, gallery, table, or artifact needs more room.

### Spacing Scale

Spacing should be simple, predictable, and token-driven.

Initial scale:

- Small: `0.75rem`.
- Medium: `1.5rem`.
- Large: `3rem`.

Future expansion may add intermediate or extra-large spacing tokens only if repeated layout needs justify them.

### Section Rhythm

Sections should feel calm and intentional.

Guidance:

- Use clear section boundaries through spacing, headings, and content grouping before relying on decoration.
- Avoid crowded transitions between major sections.
- Let homepage, archive, and project sections breathe without turning each section into a decorative panel.
- Keep related groups visually connected.

### White-Space Philosophy

White space should create attention and readability, not emptiness for its own sake.

Use white space to:

- Separate observations, notes, and artifacts.
- Make scans and comparisons easier.
- Reduce the pressure of visually dense archive content.
- Give photographs and quoted/reflection content room to be understood.

Avoid:

- Overly sparse pages that make content feel unfinished.
- Excessive card spacing that makes archives inefficient to browse.
- Decorative emptiness that hides useful navigation or relationships.

## 3. Typography

### Initial Font Direction

Use system fonts initially.

Reasons:

- Fast loading.
- No licensing risk.
- Strong baseline accessibility.
- Easy local testing before final creative typography approval.

Future custom typefaces require licensing review and explicit approval.

### Heading Hierarchy

Headings should communicate structure before style.

Guidance:

- `h1`: page or post identity.
- `h2`: major page sections.
- `h3`: cards, sub-sections, and grouped content entries.
- `h4` and below: only where content structure genuinely requires deeper hierarchy.

Headings should avoid decorative excess in early implementation. Final display personality can be refined later through approved typography and artwork integration.

### Body Text Hierarchy

Body text should prioritize reading comfort.

Guidance:

- Standard body copy should use a comfortable line height.
- Intro or summary text may be slightly larger or more spacious, but should not become a marketing hero voice.
- Metadata, category labels, dates, and utility text should be smaller and quieter without becoming low contrast.

### Caption Treatment

Captions should support photographs, artifacts, and references.

Guidance:

- Captions should be readable, specific, and useful.
- Use captions for source notes, context, dates, locations, process notes, or attribution.
- Caption text may be smaller than body copy but must meet contrast goals.

### Blockquote Treatment

Blockquotes should feel reflective or archival, not ornamental by default.

Guidance:

- Use blockquotes for quoted material, reflection, or excerpted notes.
- Avoid oversized quote styling that disrupts long-form reading.
- Attribution should be clear when a quote comes from another person or source.
- Copyright-sensitive material must follow quotation limits and attribution rules.

### Code Treatment

Code should be clear and practical.

Guidance:

- Inline code should be visually distinct from prose.
- Code blocks should preserve indentation and be easy to scan.
- Code styling should remain restrained and readable.
- Long code examples should not dominate non-technical pages unless the content calls for it.

### Future Typography Placeholders

Potential future typography roles:

- Body face for comfortable reading.
- Heading face with field-journal or natural-history character.
- Caption or label treatment for archive notes, plates, and specimen-style metadata.

These are roles, not final typeface approvals.

## 4. Color System

### Background Colors

Approved direction:

- Warm ivory or similarly calm reading surfaces.
- Avoid harsh white as the dominant experience unless contrast testing shows a clear need.
- Background should support photography, writing, and engraving-style artwork.

### Surface Colors

Surface colors should be subtle and content-supportive.

Use surfaces for:

- Cards.
- Tables.
- Callouts.
- Archive groupings.
- Form areas.

Avoid a page full of competing boxed surfaces.

### Text Colors

Text colors should prioritize legibility.

Guidance:

- Primary text should be dark and high contrast.
- Muted text must remain readable.
- Metadata should be visually quieter but still accessible.

### Link Colors

Links should be recognizable without relying on color alone when possible.

Guidance:

- Links should meet WCAG contrast targets against their background.
- Hover and focus states should be clear.
- Underlines or other non-color affordances should be considered for body-copy links.

### Accent Colors

Accent colors should be used sparingly.

Appropriate uses:

- Focus states.
- Selected details.
- Small navigational emphasis.
- Call-to-action emphasis.
- Future artwork coordination.

Avoid using accent color as a broad decorative wash.

### WCAG Contrast Goals

Target WCAG 2.2 AA:

- Normal text: at least 4.5:1.
- Large text: at least 3:1.
- Non-text UI indicators and focus states: at least 3:1 where applicable.

Contrast should be tested before launch and after any color-token change.

## 5. Components

### Navigation

Navigation should be clear, stable, and understated.

Guidance:

- Primary navigation follows the approved launch order: Home, Projects, Field Notes, Workshop Journal, Cabinet, About, Contact.
- Search should not appear in primary navigation at launch.
- Navigation must be keyboard accessible.
- Active/current states should be visible without being loud.
- Mobile navigation should favor reliability and accessibility over novelty.

### Cards

Cards should organize repeated content, not become the main visual language for every section.

Use cards for:

- Project summaries.
- Post summaries.
- Gallery previews.
- Cabinet highlights.

Guidance:

- Cards should have clear headings and links.
- Cards should support excerpts, dates, categories, and images when useful.
- Avoid nested cards.
- Avoid excessive decoration, shadows, or large rounded shapes.

### Buttons

Buttons should be reserved for clear actions.

Use buttons for:

- Forms.
- Downloads.
- Explicit commands.
- Strong calls to action where a plain link is insufficient.

Guidance:

- Normal navigation links should not become buttons by default.
- Button labels should be direct and specific.
- Focus and hover states must be clear.

### Images

Images should be content, evidence, or meaningful support.

Guidance:

- Use meaningful alt text for informative images.
- Use empty alt text for decorative images.
- Preserve captions and credit notes where needed.
- Do not use generic stock-like imagery.
- Do not place large photography libraries directly inside the theme.

### Galleries

Galleries should support looking closely.

Guidance:

- Use galleries for selected work, project documentation, and visual archives.
- Preserve image order and context.
- Captions should explain why images matter.
- Gallery layouts should remain accessible and responsive.

### Quotes

Quotes and reflections should be treated with restraint.

Guidance:

- Use quotes to support meaning, not to create decorative filler.
- Attribution should be visible when relevant.
- Closing reflection areas may be quiet and text-led.

### Dividers

Dividers should clarify structure.

Guidance:

- Use spacing first.
- Use lines, rules, or small separators only when they improve scanning.
- Avoid ornate dividers until artwork integration is explicitly approved.

### Lists

Lists should remain practical and readable.

Guidance:

- Use lists for observations, project materials, methods, references, and navigation.
- Avoid over-styling lists into decorative objects.
- Keep list markers clear and aligned.

### Tables

Tables should support comparison and reference.

Guidance:

- Use tables for structured information, not layout.
- Tables must remain readable on small screens.
- Headers should be clear.
- Captions or nearby context should explain what the table represents.

## 6. Motion

Animation should remain minimal and purposeful.

Allowed motion should:

- Clarify state changes.
- Support navigation or disclosure.
- Respect reduced-motion preferences.
- Avoid slowing reading or distracting from content.

Avoid:

- Decorative animation.
- Scroll gimmicks.
- Motion-heavy hero treatments.
- Animation that makes the site feel trendy, theatrical, or less accessible.

## 7. Accessibility

### Keyboard

All navigation, links, forms, and controls must be usable by keyboard.

Requirements:

- Logical tab order.
- No keyboard traps.
- Skip link remains available.
- Mobile navigation must remain keyboard operable if enhanced later.

### Focus

Focus states must be visible.

Guidance:

- Focus treatment should be clear and high contrast.
- Focus should not rely on color alone when avoidable.
- Do not remove browser focus outlines without replacing them with an accessible alternative.

### Contrast

Contrast should meet WCAG 2.2 AA targets.

Testing should include:

- Body text.
- Muted text.
- Links.
- Buttons.
- Focus indicators.
- Captions.
- Form states.

### Reduced Motion

Reduced-motion preferences should be respected.

Guidance:

- Use `prefers-reduced-motion` where motion is introduced.
- Avoid content that only makes sense through animation.
- Keep the site fully usable without motion.

## 8. Future Artwork Integration

Artwork should deepen the approved identity without overwhelming content.

General rules:

- Artwork should support observation, recordkeeping, craft, natural history, and quiet exploration.
- Victorian engraving assets should be used intentionally and sparingly.
- Decorative assets should never interfere with reading, navigation, accessibility, or performance.
- Large or repeated artwork should be optimized before entering the theme.
- Final placement requires creative approval.

### Two-Bit Alchemy Emblem

Eventual role:

- Primary brand mark.
- Site identity support.
- Possible footer or About context.
- Possible source for favicon/social preview derivations.

Do not treat current emblem references as final production exports until export requirements are approved.

### Favicon

Eventual role:

- Browser tab identity.
- Bookmark identity.
- Mobile shortcut support if needed.

The favicon should be derived from a simplified, legible form of the approved emblem or symbol set.

### Social Preview Image

Eventual role:

- Default sharing image for the site.
- Visual summary of the identity for social platforms and link previews.

The social preview should be readable at small sizes and should not rely on dense details.

### Section Illustrations

Eventual role:

- Light support for major sections such as Projects, Field Notes, Workshop Journal, Cabinet, About, and Contact.

Section illustrations should clarify tone and identity without locking every section into heavy ornament.

### Victorian Engraving Assets

Eventual role:

- Natural-history accents.
- Cabinet/archive details.
- Project-specific support imagery.
- Carefully selected visual references.

Usage should remain restrained. Engraving assets should feel like part of the archive, not a decorative costume placed over the content.

## Decision Rules

Objective improvements may be implemented or recommended when they improve accessibility, readability, performance, maintainability, navigation, content clarity, or WordPress stability.

Subjective visual choices require approval when they affect:

- Exact palette values.
- Typeface selection.
- Illustration density.
- Ornament placement.
- Final homepage composition.
- Brand asset usage.
