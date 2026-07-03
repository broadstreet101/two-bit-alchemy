# Site Architecture

This document defines the proposed logical structure for the Two-Bit Alchemy website. It is an information architecture document only. It does not define page layouts, themes, plugins, visual treatments, or implementation code.

## Source Documents

This architecture is based on:

- `Two-Bit_Alchemy_Website_AI_Handoff.md`
- `README.md`
- `docs/project-summary.md`
- `docs/brand-manifest.md`
- `docs/discovery-phase.md`
- `docs/development-workflow.md`
- `docs/decisions.md`

## Guiding Question

The website should answer:

> What has Dada been curious about lately?

The architecture should make current curiosity visible while preserving past discoveries, projects, artifacts, and field notes.

## Assumptions

- Two-Bit Alchemy is the primary site identity.
- Fisher Aquatics remains important, but it becomes one project within the broader site.
- The site needs both durable reference content and time-based progress content.
- Photography is both a project area and supporting evidence for other sections.
- Search, tags, and categories should help visitors follow themes across sections.
- Final WordPress content types, URL rules, and template implementation are not yet approved.

## Approved Launch Architecture Decisions

Approved top navigation:

- Home
- Projects
- Field Notes
- Workshop Journal
- Cabinet
- About
- Contact

Approved launch rules:

- Place Philosophy under About for launch. Do not make it top-level yet.
- Do not include Search in primary navigation at launch.
- Use "Workshop Journal" publicly.
- Treat "Build Log" as an internal or documentation concept.
- Use Photography as a project page, as selected galleries, and as embedded support throughout related projects and posts.
- Place Fisher Aquatics under Projects.
- Preserve or redirect Fisher Aquatics legacy URLs later after audit.
- Start with minimal categories.
- Add tags organically later.
- Use project status labels internally for now; do not make public status labels prominent at launch.
- Use simple lowercase URL slugs.

Approved launch categories:

- Projects
- Field Notes
- Workshop Journal
- Photography
- Aquatics
- Software
- Electronics
- Craft

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

## Top-Level Navigation

Approved top-level navigation:

- Home
- Projects
- Field Notes
- Workshop Journal
- Cabinet
- About
- Contact

### Navigation Rationale

- `Projects` foregrounds real work and supports Fisher Aquatics, Kiwi, WMS, Photography, Electronics, Software, and other experiments.
- `Field Notes` separates evergreen knowledge from dated process updates.
- `Workshop Journal` gives current activity a home and supports the guiding question.
- `Cabinet` supports collections, tools, books, specimens, photographs, and artifacts.
- `About` keeps the personal context available without making the site resume-like.
- `Contact` provides a clear path for direct communication without turning the site into a sales funnel.
- Search should exist as an archive support feature later, but it is not part of primary navigation at launch.

## Secondary Navigation

Secondary navigation should appear where it helps visitors understand a section's internal structure.

### Projects Secondary Navigation

- Fisher Aquatics
- Kiwi
- WMS
- Photography
- Electronics
- Software
- Other Experiments

### Field Notes Secondary Navigation

- Aquatics
- Natural History
- Photography
- Electronics
- Software
- Tools and Methods
- Places and Observations

### Workshop Journal Secondary Navigation

- Recent
- Builds
- Experiments
- Repairs
- Research Notes
- Failures and Lessons

### Cabinet Secondary Navigation

- Tools
- Books
- Specimens
- Photographs
- References
- Artifacts

### About Secondary Navigation

- About Dada
- Philosophy
- Contact

## Homepage Content Hierarchy

The homepage should introduce the identity, surface current curiosity, and provide routes into deeper content.

Recommended content hierarchy:

1. Identity introduction: Two-Bit Alchemy as the umbrella identity.
2. Guiding theme: Observe. Record. Understand. Create.
3. Current curiosity: recent or featured work that answers what Dada has been curious about lately.
4. Featured projects: a small set of durable project entries, including Fisher Aquatics as one project.
5. Recent Workshop Journal entries: time-based progress and process notes.
6. Selected Field Notes: evergreen knowledge and observations.
7. Cabinet highlights: artifacts, tools, photographs, books, or specimens.
8. Short personal context: link to About and Philosophy.
9. Contact path: simple route for direct communication.

This is content priority, not page layout.

## Major Sections

### Home

Purpose:
Introduce Two-Bit Alchemy, establish the guiding question, and route visitors into current and durable areas of curiosity.

Primary audience:
First-time visitors, returning readers, friends, collaborators, and anyone trying to understand what the site is.

Typical content:
Brief identity statement, featured project links, recent journal entries, selected field notes, cabinet highlights, and links to About and Contact.

Relationships to other sections:
Home should point outward to Projects, Workshop Journal, Field Notes, Cabinet, About, and Contact. It should not replace those sections or carry all explanatory burden.

### Projects

Purpose:
Collect major bodies of work and give each project enough context, history, artifacts, and related updates to stand on its own.

Primary audience:
Visitors interested in specific work areas, collaborators, returning readers, and people arriving from search or old Fisher Aquatics links.

Typical content:
Project overviews, project histories, related journal entries, related field notes, photographs, artifacts, and links to external resources where appropriate.

Relationships to other sections:
Projects should connect to Workshop Journal for process updates, Field Notes for durable reference material, Cabinet for artifacts, and Photography when images are central to the project.

### Fisher Aquatics

Purpose:
Preserve Fisher Aquatics as an important project history within Two-Bit Alchemy rather than presenting it as the whole site identity.

Primary audience:
Existing Fisher Aquatics visitors, aquatics readers, people following legacy links, and visitors interested in the project's history.

Typical content:
Project overview, legacy context, aquatics articles, photographs, useful references, selected historical content, and links to related Field Notes and Workshop Journal entries.

Relationships to other sections:
Fisher Aquatics belongs under Projects. Aquatics reference content can connect to Field Notes. Aquatics progress or restoration work can connect to Workshop Journal. Aquatic specimens, tools, or photographs can connect to Cabinet and Photography.

### Photography

Purpose:
Support photography as both a standalone project and a documentation method across the whole site.

Primary audience:
Visitors interested in visual work, project documentation, field observation, and photographic records.

Typical content:
Photography project overview, photo series, project galleries, field documentation, process notes, camera or method notes, and selected images tied to other sections.

Relationships to other sections:
Photography should exist as a Project while also appearing inside Field Notes, Workshop Journal, Cabinet, and other project pages when photographs support the story.

### Workshop Journal

Purpose:
Document progress, experiments, builds, repairs, failures, process notes, and current curiosity over time.

Primary audience:
Returning readers, collaborators, people interested in process, and visitors who want to see what is active now.

Typical content:
Dated posts, build logs, experiment notes, progress updates, mistakes, lessons learned, and links to finished or ongoing projects.

Relationships to other sections:
Journal entries should link back to related Projects and forward to relevant Field Notes when a process insight becomes evergreen. Entries may also reference Cabinet artifacts, tools, and photographs.

### Field Notes

Purpose:
Preserve evergreen knowledge, observations, references, and methods in a form that remains useful beyond the date it was written.

Primary audience:
Readers looking for explanations, reference material, research notes, methods, observations, and durable knowledge.

Typical content:
Reference articles, observation notes, field methods, aquatics knowledge, photography methods, electronics notes, software explanations, natural history notes, and lessons distilled from projects.

Relationships to other sections:
Field Notes should connect to Projects when knowledge came from a specific project, to Workshop Journal when a note grew from a process post, and to Cabinet when artifacts or references support the note.

### Cabinet

Purpose:
Collect and contextualize objects, references, tools, books, specimens, photographs, and artifacts that support the site's curiosity-driven archive.

Primary audience:
Visitors interested in collections, research objects, tools, source material, and visual or physical references.

Typical content:
Collection entries, tool notes, book notes, specimen notes, reference images, artifacts, photographs, and brief annotations.

Relationships to other sections:
Cabinet entries should support Projects, Field Notes, Workshop Journal, and Photography by providing source material and object context.

### About

Purpose:
Provide personal context for Dada and explain the spirit of Two-Bit Alchemy without becoming resume-like.

Primary audience:
First-time visitors, collaborators, friends, and people who want to understand the person behind the work.

Typical content:
Personal introduction, origin of Two-Bit Alchemy, selected interests, philosophy link, and contact path.

Relationships to other sections:
About should connect to Philosophy, Projects, and Contact. It should frame the site rather than duplicate project details.

### Philosophy

Purpose:
Explain Two-Bit Alchemy as transformation through observation, craftsmanship, patience, curiosity, and the joy of learning by making.

Primary audience:
Visitors interested in the meaning behind the site, returning readers, and collaborators seeking creative context.

Typical content:
Statement of values, explanation of the name, the observe-record-understand-create theme, and links to representative projects or notes.

Relationships to other sections:
Philosophy can sit within or near About. It should connect the brand manifest's ideas to public-facing content.

Launch placement:
Philosophy should live under About for launch and should not appear as a top-level navigation item yet.

### Contact

Purpose:
Provide a simple, clear path for direct communication.

Primary audience:
Friends, collaborators, readers, project contacts, and people with relevant questions or opportunities.

Typical content:
Contact instructions, preferred topics, optional social or external links, and expectations for response if desired.

Relationships to other sections:
Contact should be accessible from primary navigation, About, project pages, and footer navigation. It should not dominate the site or reframe it as a service business.

### Search

Purpose:
Help visitors find older posts, project references, specific topics, and cross-section themes as the site grows.

Primary audience:
Returning readers, researchers, legacy Fisher Aquatics visitors, and anyone looking for a specific topic.

Typical content:
Search field, search results, filters or refinements if approved later, and links into tags or categories.

Relationships to other sections:
Search should index Projects, Field Notes, Workshop Journal, Cabinet entries, and other public content. It should support tags and categories without replacing section navigation.

Launch placement:
Search should not appear in primary navigation at launch. It may be added later when the archive has enough content to justify it.

## Projects Structure

Recommended project index:

- Fisher Aquatics
- Kiwi
- WMS
- Photography
- Electronics
- Software
- Other Experiments

Each project should eventually support:

- Project overview
- Status or phase
- Why it exists
- Related journal entries
- Related field notes
- Related cabinet items
- Related photographs
- External links, if needed

Project status labels may be useful later, such as:

- Active
- Ongoing
- Paused
- Archived
- Reference

Approved launch use:
Project status labels may be used internally for planning, but they should not be prominent public labels at launch.

## Fisher Aquatics Integration

Fisher Aquatics should be introduced as part of the history and ongoing curiosity of Two-Bit Alchemy.

Recommended integration:

- Create a Fisher Aquatics project landing page under Projects.
- Preserve useful aquatics content as project-related Field Notes or legacy project material.
- Keep historical context visible instead of erasing the former identity.
- Use redirects if existing URLs change.
- Avoid making aquatics the dominant site-wide navigation identity.

Approved launch handling:
Fisher Aquatics becomes a project under Projects. Legacy URLs should be preserved or redirected later after audit.

## Photography Organization

Photography should be organized in two ways:

- As a standalone project for photographic work.
- As supporting documentation across other sections.
- As galleries for selected work.

Potential photography groupings:

- Project documentation
- Field observations
- Cabinet objects
- Aquatics
- Places
- Experiments
- Camera or process notes

Approved launch handling:
Use a combination approach: Photography as a project page, selected galleries, and photos embedded throughout related projects and posts.

## Field Notes And Journal Organization

Field Notes and Workshop Journal should remain distinct.

Field Notes:

- Evergreen
- Reference-oriented
- Useful beyond the original date
- Organized by topic and tags

Workshop Journal:

- Dated
- Process-oriented
- Current or historical progress
- Organized by date, project, and tags

Relationship:
A Workshop Journal entry may later produce a Field Note when an experiment or build yields durable knowledge.

## Workshop And Build Log Organization

Workshop content should make process visible without requiring every entry to become a polished article.

Recommended organization:

- Builds
- Experiments
- Repairs
- Research Notes
- Failures and Lessons
- Updates connected to Projects

Approved launch handling:
Use "Workshop Journal" publicly. Treat "Build Log" as an internal or documentation concept.

## About And Contact Organization

Recommended organization:

- About
  - About Dada
  - Philosophy
  - Contact link
- Contact
  - Preferred contact method
  - Relevant topics
  - Optional external links

Approved launch handling:
Place Philosophy under About for launch. Do not make it top-level yet.

## Search Strategy

Search should support discovery across the whole archive once content grows.

Recommended search scope:

- Projects
- Field Notes
- Workshop Journal
- Cabinet
- Photography
- About and Philosophy, if useful

Search should prioritize:

- Clear titles
- Excerpts or summaries
- Section labels
- Dates for journal entries
- Project relationships
- Tags and categories

Approved launch handling:
Do not include Search in primary navigation at launch.

## Tag And Category Strategy

Categories should define broad content structure. Tags should connect ideas across sections.

### Recommended Categories

Approved launch categories:

- Projects
- Field Notes
- Workshop Journal
- Photography
- Aquatics
- Software
- Electronics
- Craft

If WordPress remains the platform, these may map to pages, post categories, custom post types, or taxonomies after implementation decisions are made.

### Tags

Tags should capture recurring ideas, materials, methods, and subjects.

Approved launch handling:
Start with minimal categories. Add tags organically later.

Tag rules:

- Keep tags human-readable.
- Avoid near-duplicates.
- Prefer tags that can connect multiple sections.
- Review tags periodically as the archive grows.

Project names should not automatically become tags unless they emerge organically as useful cross-section connectors.

## Future Expansion Points

The architecture should support future growth without requiring a site restructure.

Potential expansion:

- Additional projects
- Project status archives
- Photo series
- Public notes by place or subject
- Resource lists
- Reading lists
- Tool indexes
- Specimen or artifact indexes
- Downloadable references
- Newsletter or updates page, if ever desired
- External project links
- Legacy Fisher Aquatics archive

Expansion rule:
Add new sections only when repeated content no longer fits existing sections cleanly.

## Decisions Requiring Approval

- Final WordPress content type and taxonomy mapping.
- Final redirect strategy after the Fisher Aquatics audit.
- Whether Search should be added after launch as the archive grows.
- Whether public project status labels should be introduced after launch.
- Final handling for project pages not included in the approved launch URL list, such as WMS, Electronics, Software, and Other Experiments.
