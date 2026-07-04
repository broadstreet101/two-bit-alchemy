# Layout System

This document defines the structural layout language for Two-Bit Alchemy.

It does not specify final typography, colors, illustrations, decorative artwork, or ornamentation. It exists to keep future implementation consistent, readable, accessible, and easy to maintain.

## Source Documents

- `docs/design-system.md`
- `docs/theme-architecture.md`
- `docs/site-architecture.md`
- `docs/content-model.md`
- `docs/creative-constitution.md`

## 1. Content Width Philosophy

### Maximum Reading Width

Long-form text should remain comfortably narrow.

Rule:

- Use an approximate maximum reading width of `720px`.
- Apply this to posts, Field Notes, Workshop Journal entries, About content, Philosophy content, and normal body copy.
- Do not allow long paragraphs to stretch across the full viewport.

Objective reason:
Narrower reading lines improve legibility and reduce fatigue.

### Wide Content

Wide content is for comparison, browsing, and media-supported sections.

Rule:

- Use an approximate wide maximum of `1120px`.
- Apply this to project cards, archive lists, homepage sections, selected galleries, tables, and grouped navigation areas.
- Wide content should still have page margins on small and medium screens.

Objective reason:
Wide space supports scanning and comparison without making text difficult to read.

### Full-Width Content

Full-width content should be rare.

Rule:

- Use full-width treatment only when the content genuinely benefits from it.
- Do not use full-width text blocks.
- Do not use full-width sections merely for decoration.

Possible future uses:

- Immersive gallery moments.
- Large project photography.
- Special archive material.

These uses require separate approval.

### Gallery Width

Galleries should have room to breathe without becoming disconnected from context.

Rule:

- Small image groups may use reading width.
- Selected galleries may use wide width.
- Individual images may break wider than text when detail matters.
- Captions should remain readable and connected to the image they describe.

## 2. Vertical Rhythm

### Section Spacing

Major sections should feel clearly separated.

Rule:

- Use larger spacing between major sections.
- Use smaller spacing within related content groups.
- Avoid using borders or decorative dividers when spacing and headings are enough.

### Paragraph Spacing

Paragraphs should support calm reading.

Rule:

- Keep paragraph spacing consistent.
- Avoid dense walls of text.
- Avoid excessive gaps that make related paragraphs feel disconnected.

### Heading Spacing

Headings should announce structure.

Rule:

- Add more space before a new major heading than after it.
- Keep headings close enough to the content they introduce.
- Do not use heading size alone to create layout drama.

### Page Margins

Pages should always have comfortable side margins.

Rule:

- Use responsive page margins so content does not touch viewport edges.
- Keep margins modest on small screens to preserve usable space.
- Keep margins generous enough on large screens to prevent content from feeling loose or unanchored.

## 3. Homepage Section Order

The homepage structure should continue to follow the approved architecture:

1. Hero with site title and approved Welcome.
2. Guiding words: Observe. Record. Understand. Create.
3. Featured Projects.
4. Latest Field Notes.
5. Latest Workshop Journal.
6. Explore the Cabinet.
7. Closing reflection area.

Rule:

- Do not reorder homepage sections without approval.
- Later visual design may change presentation, but not the core content sequence unless a better information-architecture reason is documented.

## 4. Interior Page Structure

Interior pages should feel like rooms in the same cabinet of curiosities.

Typical structure:

1. Page title.
2. Short orientation or introduction.
3. Main content sections.
4. Related links or next-step paths when useful.

Rules:

- Use one clear `h1`.
- Use `h2` for major page sections.
- Use `h3` for cards, sub-sections, and repeated entries.
- Avoid decorative wrappers that do not clarify structure.
- Keep stable page templates readable and maintainable.

## 5. Image Placement Philosophy

Images should support evidence, memory, observation, or atmosphere with purpose.

Rules:

- Place images near the content they support.
- Do not use images as generic filler.
- Let important images have enough width for inspection.
- Keep captions visually and structurally connected to images.
- Use native WordPress responsive image output where possible.
- Avoid placing large image archives directly inside the theme.

Image roles:

- Project evidence.
- Field observation.
- Workshop process.
- Cabinet artifact.
- Photography as standalone work.
- Future approved artwork or engraving support.

## 6. Navigation Placement Philosophy

Navigation should orient visitors without dominating the page.

Rules:

- Primary navigation belongs in the site header.
- Footer navigation may repeat key paths or provide practical supporting links.
- Secondary navigation belongs only where it helps visitors understand a section.
- Search should not appear in primary navigation at launch.
- Breadcrumbs or contextual navigation may be added later if archive depth justifies them.

Objective reason:
Navigation should support wandering and discovery while preserving clear orientation.

## 7. Footer Philosophy

The footer should be quiet and useful.

Possible footer content:

- Site identity.
- Key navigation links.
- Contact link.
- Copyright or ownership note.
- Future small emblem use, after artwork approval.

Rules:

- Do not turn the footer into a large promotional area.
- Do not use the footer as a dumping ground for unrelated links.
- Keep footer content accessible and easy to scan.

## 8. Responsive Behavior Principles

Layouts should adapt by simplifying, not by hiding essential content.

Rules:

- Preserve content order on small screens.
- Stack multi-column layouts naturally.
- Keep tap targets usable.
- Avoid horizontal scrolling for normal content.
- Let images scale responsively.
- Keep navigation usable without fragile interactions.
- Avoid viewport-scaled typography.

Objective reason:
Responsive behavior must protect readability, access, and orientation across devices.

## 9. Accessibility Considerations Affecting Layout

Layout decisions must support accessibility from the start.

Rules:

- Maintain a logical document order.
- Preserve visible focus states.
- Keep skip link behavior intact.
- Avoid layout patterns that rely only on hover.
- Do not visually reorder content in a way that conflicts with keyboard or screen-reader order.
- Keep labels, captions, and related content close to the elements they describe.
- Ensure line length, spacing, and margins support comfortable reading.
- Avoid sticky or fixed elements that obscure content unless there is a clear need and careful testing.

## 10. Objective Implementation Rules Versus Subjective Visual Decisions

### Objective Implementation Rules

These may be implemented or recommended when they improve usability or maintainability:

- Preserve approved homepage section order.
- Keep long-form text within reading width.
- Use wide width only for content that benefits from comparison, media, or scanning.
- Keep page margins on all viewport sizes.
- Maintain semantic heading order.
- Keep navigation keyboard accessible.
- Ensure images and captions remain connected.
- Avoid full-width text blocks.
- Avoid empty layout wrappers.
- Keep responsive layouts free from horizontal overflow.

### Subjective Visual Decisions

These require approval before implementation:

- Exact spacing values beyond the approved initial scale.
- Final rhythm and density.
- Exact relationship between text and artwork.
- Whether a section should feel sparse or compact.
- Decorative divider style.
- Ornament placement.
- Gallery presentation style.
- Footer visual treatment.

Decision rule:
If a layout change improves readability, accessibility, orientation, or maintainability, it is likely objective. If it primarily changes mood, visual density, or personality, treat it as subjective and request approval.
