# Content Model

This document defines the approved launch WordPress content model for Two-Bit Alchemy. It is a planning document only. Do not write theme code or modify the live WordPress site from this document.

## Source Documents

This model is based on:

- `docs/brand-manifest.md`
- `docs/site-architecture.md`
- `docs/site-map.md`
- `docs/decisions.md`
- `docs/theme-architecture.md`
- `docs/development-workflow.md`
- `docs/wordpress-audit.md`

## Guiding Principle

Prefer the simplest maintainable WordPress architecture.

The launch content model should use standard WordPress pages, posts, categories, tags, and media wherever they fit cleanly. Custom post types and custom taxonomies should be introduced only when they provide clear long-term benefit that outweighs added complexity.

## Approved Launch Model

Approved launch model:

- Standard Pages for top-level sections, project landing pages, individual project pages, About, Philosophy, Contact, and curated index pages.
- Posts for dated or article-like content, including Field Notes and Workshop Journal entries.
- Native Categories for the approved launch category set.
- Native Tags added organically later.
- Native Media Library for images and files, with clear filenames, meaningful alt text, and credit notes where needed.
- No custom post types at launch.
- No custom taxonomies at launch.
- Cabinet starts as a curated page.
- Projects are child pages under `/projects/`.
- Philosophy lives under About.
- Category archive templates should be included at launch for Field Notes and Workshop Journal.

This keeps the first implementation small, understandable, and aligned with the repository-first workflow.

## 1. Standard Pages

### Why Standard Pages Exist

Pages are best for stable, hierarchical, non-date-driven content. They fit the approved launch URLs and give the theme straightforward template targets without requiring custom content infrastructure.

### Proposed Standard Pages

- Home: `/`
- Projects: `/projects/`
- Fisher Aquatics: `/projects/fisher-aquatics/`
- Kiwi: `/projects/kiwi/`
- Photography: `/projects/photography/`
- Field Notes landing page: `/field-notes/`
- Workshop Journal landing page: `/workshop-journal/`
- Cabinet landing page: `/cabinet/`
- About: `/about/`
- Philosophy under About, if public as a child page or section.
- Contact: `/contact/`

### Section Mapping

| Section | Recommended WordPress Type | Notes |
| --- | --- | --- |
| Home | Page | Static front page controlled by the theme and curated content. |
| Projects | Page | Index page for project child pages. |
| Fisher Aquatics | Child page under Projects | Preserves project identity without making it the whole site. |
| Kiwi | Child page under Projects | Stable project page. |
| Photography | Child page under Projects | Project page with selected galleries and embedded photos. |
| Field Notes | Page plus Posts category | Landing page curates posts categorized as Field Notes. |
| Workshop Journal | Page plus Posts category | Landing page curates posts categorized as Workshop Journal. |
| Cabinet | Page for launch | Curated landing page; individual cabinet entries can wait until volume justifies more structure. |
| About | Page | Personal context. |
| Philosophy | Child page or section under About | Approved under About for launch, not top-level. |
| Contact | Page | Simple communication path. |

### Why Pages Should Not Be Custom Post Types

The approved launch page set is small, stable, and hierarchical. Custom post types would add admin complexity, theme logic, rewrite rules, archive behavior, and migration considerations before the content volume proves they are needed.

### Benefits

- Simple editorial workflow.
- Easy URL control.
- Easy parent/child structure for Projects.
- Good fit for approved launch slugs.
- Low migration and maintenance burden.
- Works cleanly with a custom theme and Gutenberg content editing.

### Drawbacks

- Relationships between pages and posts may need manual curation at first.
- Large future archives may outgrow page-based organization.
- Page lists can become unwieldy if every object, tribute, annotation, or archive item becomes a page.

### Simpler Alternatives

- None simpler for stable site sections.
- For very small launch content, some landing pages could begin as placeholder pages with curated links and grow later.

## 2. Posts

### Why Posts Exist

Posts are best for dated, publishable, archive-friendly content. They support categories, tags, feeds, author/date metadata, and chronological organization.

### Proposed Post Uses

- Field Notes articles.
- Workshop Journal entries.
- Photography posts or photo essays, when date-based.
- Aquatics reference or history posts.
- Software, Electronics, and Craft notes.
- Future posts related to project progress or experiments.

### Why Posts Should Not Be Custom Post Types At Launch

Field Notes and Workshop Journal are both article-like content streams. Categories can distinguish evergreen reference material from dated progress notes without introducing custom content types.

### Benefits

- Native WordPress behavior.
- Easy category and tag support.
- Good archive behavior.
- Date and author metadata are useful for journal content.
- Easy migration from existing Fisher Aquatics posts.
- Lower implementation cost.

### Drawbacks

- Field Notes and Workshop Journal share the same underlying post type.
- More careful category discipline is required.
- Template logic may need to present Field Notes and Workshop Journal differently based on category.

### Simpler Alternatives

- Use only pages for everything. This is simpler structurally but weaker for dated entries, archives, RSS, and ongoing publishing.

## 3. Custom Post Types

### Launch Recommendation

Do not create custom post types at launch.

Approval status:
Approved.

### Why This Is Objectively Beneficial

- The approved launch model can be represented with standard pages and posts.
- Fewer content types reduce training, migration, template, and admin complexity.
- The live WordPress audit has not yet revealed whether existing content depends on custom fields, page builders, or plugin-managed post types.
- Deferring custom post types keeps implementation closer to WordPress defaults and easier to maintain.

### Possible Future Custom Post Types

Custom post types may become beneficial later if content volume or structure grows.

| Future Area | Possible CPT | Why It Might Help Later | Simpler Alternative |
| --- | --- | --- | --- |
| Cabinet | Cabinet Item | Useful if many tools, books, specimens, references, and artifacts need individual records and filtering. | Cabinet page with curated sections; posts categorized by topic. |
| Tributes / Memorials | Tribute | Useful if memorial biographies, stories, photos, submissions, and permissions need structured management. | Standard pages for each person. |
| Clutch Archive / Interactive References | Reference Entry or Annotation | Useful if many annotated references need fields for source, citation, lyric/reference context, attribution, and review status. | Special project page with child pages and manually curated annotations. |
| Projects | Project | Useful only if project count grows substantially and requires structured fields, archives, or filtering. | Current recommendation: project pages under `/projects/`. |
| Galleries | Gallery | Useful only if selected work needs structured gallery archives beyond native blocks/media. | Photography page plus native galleries and posts. |

### Drawbacks Of Custom Post Types

- More code and template logic.
- More admin complexity.
- More migration planning.
- Rewrite and archive behavior must be managed.
- Can create unnecessary separation when categories and pages are enough.

### Decision Rule

Create a custom post type only when at least one of these is true:

- The content has many repeatable entries.
- The content needs fields that do not fit normal pages/posts.
- The content needs its own archive behavior.
- The content needs a distinct editorial workflow.
- The simpler page/post model has become hard to maintain.

## 4. Categories

### Approved Launch Categories

- Projects
- Field Notes
- Workshop Journal
- Photography
- Aquatics
- Software
- Electronics
- Craft

### Category Use

Categories should be few and stable. They should help identify broad content type and subject area.

Recommended category behavior:

- Field Notes posts should use `Field Notes`.
- Workshop Journal posts should use `Workshop Journal`.
- Photography posts should use `Photography` when photography is the main content.
- Aquatics, Software, Electronics, and Craft should be used as subject categories when they describe the content.
- Posts may use more than one category when useful, such as `Field Notes` plus `Aquatics`.

### Benefits

- Native WordPress archives.
- Simple editorial workflow.
- Useful for section landing pages.
- Easy migration from existing posts.
- No custom taxonomy code required.

### Drawbacks

- The approved categories mix section labels and subject labels.
- Too many multi-category posts could become inconsistent without editorial discipline.
- Category archives may need theme handling to avoid confusing visitors.

### Simpler Alternatives

- Use only Field Notes and Workshop Journal categories at launch, then add subject categories later. This is simpler but conflicts with the currently approved category list.

## 5. Tags

### Launch Recommendation

Use tags organically later. Do not create a large predefined tag set at launch.

### Why Tags Exist

Tags are useful for recurring ideas, materials, methods, people, places, and references that cut across sections.

### Benefits

- Flexible cross-section discovery.
- Good for emergent themes.
- Useful once the archive grows.

### Drawbacks

- Tags can become messy quickly.
- Near-duplicates reduce usefulness.
- Empty or one-off tags create clutter.

### Tag Rules

- Add tags only when they help connect multiple pieces of content.
- Use clear human-readable names.
- Avoid singular/plural duplicates.
- Avoid using every project name as a tag by default.
- Review tags periodically.

### Simpler Alternatives

- Do not use tags at launch. Add them only after real content patterns emerge.

## 6. Custom Taxonomies

### Launch Recommendation

Do not create custom taxonomies at launch.

Approval status:
Approved.

### Why Custom Taxonomies Are Not Yet Justified

The approved category list and organic tags are enough for the first content model. Custom taxonomies would add implementation complexity before the live content audit proves a need.

### Possible Future Custom Taxonomies

| Future Taxonomy | Possible Use | Simpler Alternative |
| --- | --- | --- |
| Project Area | Connect posts, media, and cabinet items to projects. | Categories and manual related-content links. |
| Person | Connect Tributes, photos, stories, and objects. | Tribute pages and tags. |
| Artifact Type | Organize Cabinet entries by tools, books, specimens, references, artifacts. | Cabinet page sections. |
| Source Type | Organize Clutch references by lyrics, interviews, books, places, historical references. | Tags or child pages. |
| Status | Internal project status. | Draft notes or private metadata; not public at launch. |

### Benefits

- Better filtering for large archives.
- Cleaner relationships than broad categories.
- Useful for structured future content.

### Drawbacks

- More code.
- More editorial rules.
- More archive templates.
- More migration complexity.

### Decision Rule

Add a custom taxonomy only after repeated content demonstrates that categories and tags are no longer clear enough.

## 7. Media Organization

### Recommended Media Model

Use the native WordPress Media Library for launch.

### What Media Supports

- Project hero and thumbnail images.
- Photography galleries.
- Field Note illustrations.
- Workshop Journal process images.
- Cabinet object photos.
- Fisher Aquatics legacy images.
- Future Tributes / Memorials photos.
- Future Clutch Archive source images, only after copyright and attribution review.

### Media Rules

- Use descriptive filenames before upload where practical.
- Add meaningful alt text for informative images.
- Use empty alt text for decorative images.
- Use captions when they add context.
- Preserve credit and source information with credit notes where needed.
- Avoid uploading oversized originals when optimized exports are available.
- Keep sensitive family or memorial media private until permissions are clear.
- Do not publish copyrighted archive material without review.

### Benefits

- Native WordPress support.
- Works with responsive image output.
- Supports captions, alt text, and attachment metadata.
- Keeps editorial workflow simple.

### Drawbacks

- WordPress media organization can become cluttered.
- Media folders are not a native organizing model.
- Large archives may require naming discipline or future tooling.

### Simpler Alternatives

- Keep launch media minimal and upload only images used by approved launch pages and posts.

## 8. Relationships Between Content Types

### Relationship Model

Relationships should start as explicit links and curated sections rather than complex custom relationship fields.

Recommended launch relationships:

- Project pages link to related Field Notes and Workshop Journal posts.
- Field Notes link back to related project pages when applicable.
- Workshop Journal posts link to projects and may later produce Field Notes.
- Photography appears as a project page, galleries, and embedded media across projects/posts.
- Cabinet landing page links to related projects, posts, and media.
- Fisher Aquatics page links to aquatics Field Notes, Workshop Journal entries, photographs, and legacy content.
- About links to Philosophy and Contact.

### Benefits

- Simple and durable.
- Easy to migrate.
- Requires no custom relationship plugin or database model.
- Keeps editorial intent visible.

### Drawbacks

- Manual related links require upkeep.
- Automatic related-content features are limited without custom taxonomies or fields.
- Large future archives may need more structure.

### Simpler Alternatives

- Use only category archives and no curated relationships. This is simpler but weaker for storytelling and project context.

## 9. Future Expansion Support

### Tributes / Memorials

Launch status:
Future section only.

Recommended initial model:
Standard pages under a future Tributes / Memorials landing page.

Why it exists:
To preserve meaningful personal history and remembrance for important deceased people in Dada's life.

Why it should not be a custom post type yet:
The section is not launch content, privacy and permissions are not defined, and the number of entries is unknown.

Benefits of standard pages:

- Respectful, controlled publishing.
- Clear biography-style structure.
- Easy manual curation.

Drawbacks:

- Submitted stories and photos may become harder to manage manually.
- If the archive grows, pages may not support filtering or submission review well.

Future CPT trigger:
Consider a Tribute custom post type if there are many memorial entries, multiple contributors, review workflows, submission forms, or structured fields for dates, relationships, stories, and photo permissions.

Decisions required:

- Whether this section becomes public.
- Privacy and consent rules.
- Submission rules.
- Photo permissions.
- Whether comments or submitted stories are allowed.

### Clutch Archive / Interactive References

Launch status:
Future special project only.

Recommended initial model:
Project page under Projects, with child pages or posts only after copyright and attribution review.

Why it exists:
To preserve or reinterpret Dada's original Clutch fan/archive website and potentially create interactive reference annotations.

Why it should not be a custom post type yet:
Copyright, attribution, source handling, restored-site boundaries, and interaction requirements are not defined.

Benefits of standard pages at first:

- Easy to scope.
- Clear review surface.
- Avoids premature structured annotation code.

Drawbacks:

- Interactive annotations may outgrow pages.
- Source/citation fields may eventually need structure.
- Restoration work may need special templates or tooling.

Future CPT trigger:
Consider a Reference Entry or Annotation custom post type only after copyright review and once there is a confirmed need for repeated structured entries.

Decisions required:

- Copyright boundaries.
- Lyric quotation policy.
- Source attribution rules.
- Whether a restored late-1990s site experience is public, private, or archival only.
- Whether the archive lives under Projects or as a special standalone section later.

### Cabinet

Launch status:
Page-based section.

Recommended initial model:
Standard Cabinet page with curated sections.

Why it should not be a custom post type yet:
Individual cabinet entry volume is unknown.

Future CPT trigger:
Consider Cabinet Item if tools, books, specimens, artifacts, references, and photographs become numerous enough to require individual records and filtering.

### Projects

Launch status:
Page-based section.

Recommended initial model:
Projects landing page with child project pages.

Why it should not be a custom post type yet:
The initial project set is small and stable. Pages provide simpler URL control and hierarchy.

Future CPT trigger:
Consider Project only if the number of projects grows enough to require structured fields, archives, status filtering, or automated related content.

## Section Mapping

| Site Section | Launch Content Model | Future Option |
| --- | --- | --- |
| Projects | Page with child project pages | Project CPT if project volume grows |
| Fisher Aquatics | Child page under Projects | Legacy archive after audit |
| Kiwi | Child page under Projects | Project CPT only if broader project model changes |
| Photography | Child page under Projects plus media/galleries/posts | Gallery CPT only if selected work archive grows |
| Field Notes | Landing page plus posts categorized Field Notes | Custom taxonomy only if topic structure grows |
| Workshop Journal | Landing page plus posts categorized Workshop Journal | None currently needed |
| Cabinet | Landing page with curated sections | Cabinet Item CPT if many entries emerge |
| Tributes / Memorials | Future pages | Tribute CPT if structured archive/submissions grow |
| Clutch Archive | Future project page | Reference Entry or Annotation CPT after copyright review |

## Implementation Notes For Theme Planning

The theme should support this model with:

- Page templates for approved launch pages.
- Category archive templates for Field Notes and Workshop Journal.
- Template parts for project cards, post cards, gallery previews, and related links.
- Editor styles that make standard WordPress content feel consistent.
- No custom post type implementation until approved.
- No custom taxonomy implementation until approved.

## Decisions Required Before Theme Implementation

- Confirm whether any legacy Fisher Aquatics content requires special handling after audit.
- Confirm whether Philosophy is implemented as a child page under About or as a section within the About page.
- Confirm final template file list for the approved content model.
