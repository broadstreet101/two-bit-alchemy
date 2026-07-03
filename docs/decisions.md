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
