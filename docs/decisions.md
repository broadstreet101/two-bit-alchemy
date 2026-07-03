# Project Decisions

This file records durable decisions that should not be casually overwritten.

For creative and design decisions, `docs/brand-manifest.md` is the long-term constitution and should be checked before recommending or implementing changes.

## Approved Baseline

- Two-Bit Alchemy is the main identity.
- Fisher Aquatics is a project within Two-Bit Alchemy.
- The tone is personal, curious, grounded, handcrafted, and quietly mystical.
- The main visual direction is Victorian natural-history engraving.
- The site should prioritize observation, recordkeeping, understanding, and making.

## Visual Direction

Include:

- Scientific plates
- Field journals
- Cabinet-of-curiosities references
- Antique laboratory details
- Warm ivory backgrounds
- Strong typography
- Photography and illustration

Avoid:

- Corporate visual language
- Fantasy magic
- Steampunk
- Horror
- Excessive animation

## Emblem Direction

The preferred emblem includes:

- Triple Moon
- Draco constellation
- Polaris
- Microscope
- Antique camera
- Axolotl
- Botanical elements
- Appalachian stream
- Candle
- Notebook
- Mortar and pestle
- Subtle pentacle
- Exposed roots

Future refinements from the handoff:

- Make Draco feel like an authentic celestial engraving.
- Reduce remaining geometric diagrams.
- Remove or soften constellation labels.

## Approved Information Architecture For Launch

- Top navigation: Home, Projects, Field Notes, Workshop Journal, Cabinet, About, Contact.
- Philosophy belongs under About for launch and should not be top-level yet.
- Search should not appear in primary navigation at launch.
- "Workshop Journal" is the public label.
- "Build Log" is an internal or documentation concept.
- Photography uses a combination approach: project page, selected galleries, and embedded photos throughout related projects and posts.
- Fisher Aquatics is a project under Projects.
- Fisher Aquatics legacy URLs should be preserved or redirected later after audit.
- Categories should start minimal: Projects, Field Notes, Workshop Journal, Photography, Aquatics, Software, Electronics, Craft.
- Tags may be added organically later.
- Project status labels may be used internally but should not be prominent public labels at launch.
- URL slugs should be simple and lowercase.

Approved launch URL structure:

- `/`
- `/projects/`
- `/projects/fisher-aquatics/`
- `/projects/kiwi/`
- `/projects/photography/`
- `/field-notes/`
- `/workshop-journal/`
- `/cabinet/`
- `/about/`
- `/contact/`

## Approved Future Content Areas

- Tributes / Memorials is a future section dedicated to remembering important deceased people in Dada's life.
- Initial likely Tributes / Memorials focus: James McLaughlin, David McLaughlin, and possibly grandparents and other loved ones.
- Tributes / Memorials may include personal biography pages, photos, short remembrances, long stories, submitted stories from others, and optional story or photo submissions.
- Tributes / Memorials should be treated as a meaningful personal archive with a respectful memorial tone, not generic blog content.
- Clutch Archive / Interactive References is a future special project inspired by Dada's original Clutch fan/archive website.
- Clutch Archive / Interactive References may include historical archive material, interactive lyric or reference annotations, obscure reference explanations, authoritative source links where appropriate, and possible restoration or preservation of a saved late-1990s Clutch website experience.
- Clutch Archive / Interactive References requires copyright and attribution review before implementation.

## Approved Theme Architecture

- Build a custom repository-controlled WordPress theme.
- Use `src/themes/two-bit-alchemy/` as the theme path.
- Keep the theme Gutenberg-compatible.
- Use `theme.json` for design tokens where appropriate.
- Use minimal CSS and JavaScript.
- Do not use page builders.
- Do not use Elementor or similar tools.

## Approved Launch Content Model

- Use standard WordPress Pages plus Posts/Categories at launch.
- Use standard WordPress Pages for stable launch sections and project pages.
- Projects are child pages under `/projects/`.
- Fisher Aquatics, Kiwi, and Photography are child pages under `/projects/`.
- Philosophy lives under About.
- Cabinet starts as a curated page.
- Use standard WordPress Posts for Field Notes, Workshop Journal entries, and article-like content.
- Use approved native Categories: Projects, Field Notes, Workshop Journal, Photography, Aquatics, Software, Electronics, Craft.
- Add Tags organically later.
- Use the native WordPress Media Library for launch.
- Media should use clear filenames, meaningful alt text, and credit notes where needed.
- Do not create custom post types at launch.
- Do not create custom taxonomies at launch.
- Include category archive templates at launch for Field Notes and Workshop Journal.
