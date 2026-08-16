# Cabinet Publication Queue

This document tracks Cabinet artifact drafts through the Two-Bit Alchemy publication pipeline.

It is documentation only. It does not publish content, modify the website, change WordPress, alter the theme, add templates, change CSS, or change JavaScript.

## Source Documents

- `docs/editorial-workflow.md`
- `docs/exhibit-standard.md`
- `docs/publication-phase-plan.md`
- `docs/publication-readiness-checklist.md`
- `docs/shelf-worthiness.md`
- `content/workbench/README.md`
- `content/workbench/artifacts/README.md`

## Queue Use

Use this queue for Cabinet artifacts that may eventually become public shelf items, Cabinet entries, exhibits, or supporting material.

Pipeline stages:

```text
Workbench Draft
      |
      v
Editorial Draft
      |
      v
Fact / Uncertainty Review
      |
      v
Image / Metadata Preparation
      |
      v
Publication Readiness Review
      |
      v
Approved For Publication
      |
      v
Published
```

## Status Labels

- `Workbench Draft` - raw or structured notes exist, but the artifact is not publication-ready.
- `Editorial Draft Needed` - facts have been captured, but the public story has not been shaped.
- `Review Needed` - content exists but needs fact, privacy, permission, copyright, or uncertainty review.
- `Media Needed` - required photographs, captions, alt text, or credits are missing.
- `Ready For Approval` - publication checklist appears complete and awaits final approval.
- `Approved For Publication` - approved, but not yet live.
- `Implemented / Not Published` - implemented in the repository-controlled theme, but not yet deployed or approved for public WordPress publication.
- `Published` - live public content has been verified.

## Current Queue

| Artifact | Source file | Current status | Editorial completeness | Story completeness | Image status | Metadata | Caption status | Cross-links | Accessibility | Publication readiness | Target shelf | Notes |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| Charlie Adlard Amish Zombie Sketch | `content/cabinet/a-sketch-that-was-never-meant-to-exist.md`; source note preserved at `content/workbench/cabinet/walking-dead-sketch.md` | Implemented / Not Published | Approved publication draft exists | Complete approved story exists | Master archived outside Git; web derivative and theme deploy copy prepared | Prepared in approved content source and page template | Caption implemented; final review pending WordPress preview | Return to Cabinet implemented; no other related content approved yet | Alt text implemented; final rendered review pending | Not public-launch ready; rights/attribution review, WordPress preview, accessibility review, proofreading, and final approval remain | First Cabinet artifact | Approved title: `A Sketch That Was Never Meant to Exist`. Workbench placeholder preserved. Public route implemented at `/cabinet/a-sketch-that-was-never-meant-to-exist/`; do not publish to WordPress until remaining blockers are cleared. |
| Tori Amos Camel cigarette pack | `content/workbench/artifacts/tori-amos-cigarette-pack.md` | Workbench Draft | Partial Workbench facts captured | Partial; "Why I Kept It" and "Why It Matters" still contain placeholders | Needed | Partial | Not prepared | Partial; related to 1981 Ford Escort model | Not started | Not ready | First shelf | Exact show date and tour are uncertain. Needs final editorial draft, image review, caption/alt text, privacy/copyright review, and final approval before publication. |
| 1981 Ford Escort model | `content/workbench/artifacts/1981-ford-escort-model.md` | Workbench Draft | Partial Workbench facts captured | Partial; core connection captured, but dates, names, places, and privacy decisions remain open | Needed | Partial | Not prepared | Partial; related to Tori Amos Camel cigarette pack | Not started | Not ready | First shelf | Needs accident/detail privacy review, public naming decisions, photographs, captions, alt text, final metadata, and final approval before publication. |

## Artifact Review Template

Copy this section when adding a new Cabinet artifact to the queue.

### Artifact Name

- Source file:
- Current status:
- Editorial completeness:
- Story completeness:
- Image status:
- Metadata:
- Caption status:
- Cross-links:
- Accessibility:
- Publication readiness:
- Target shelf:
- Notes:

## Field Definitions

### Current Status

Track the artifact's position in the publication pipeline.

### Editorial Completeness

Record whether the artifact has only raw notes, a structured Workbench draft, an editorial draft, or approved final copy.

### Story Completeness

Track whether the artifact answers the core questions from `docs/exhibit-standard.md`:

1. What is this?
2. Why does it matter?
3. What can someone learn from it?
4. Where should they go next?
5. Why does it belong in Two-Bit Alchemy?

### Image Status

Track whether original photographs exist, whether web-ready exports are prepared, and whether credits or permission notes are recorded.

### Metadata

Track the artifact title, content type, people, places, dates or uncertainty notes, related items, privacy notes, permission notes, and publication status.

### Caption Status

Track whether each selected image has an approved caption that adds context without inventing details.

### Cross-Links

Track only real relationships to Projects, Field Notes, Workshop Journal entries, Cabinet artifacts, exhibits, or external sources.

### Accessibility

Track alt text, heading structure, descriptive links, semantic metadata, caption association, and keyboard/reading review requirements.

### Publication Readiness

Use `docs/publication-readiness-checklist.md` before changing an artifact from `Workbench Draft` or `Review Needed` to `Ready For Approval`.

### Target Shelf

Identify the planned shelf or publication group. If unknown, mark as pending rather than inventing a destination.

### Notes

Record blockers, approval needs, source gaps, privacy concerns, media needs, or editorial cautions.

## Current Publication Blockers

- No current Cabinet artifact is publication-ready.
- Most artifact photographs have not been prepared.
- Captions and alt text still require final rendered review before public launch.
- Final metadata still requires review before public launch.
- Privacy, permission, and copyright review remain open where relevant.
- Public placement for future Cabinet artifacts still requires approval; the Charlie Adlard route is implemented but not approved for WordPress publication.

## Queue Maintenance Rules

- Keep Workbench source files preserved.
- Do not move an artifact forward because it is interesting; it must earn the shelf and meet publication readiness.
- Do not invent missing story, dates, motives, or relationships.
- Keep uncertainty visible until it is resolved.
- Update this queue whenever a Cabinet artifact gains approved content, images, metadata, cross-links, or publication approval.
- Published items should remain in the queue with their published status and final public location.
