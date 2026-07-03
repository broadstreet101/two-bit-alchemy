# Recommended Repository Structure

This structure separates planning, content, assets, implementation, tests, and logs. That keeps early strategic decisions visible while leaving room for either a WordPress theme workflow or a separate static/headless build later.

## Structure

```text
D:\TBA
|-- README.md
|-- Two-Bit_Alchemy_Website_AI_Handoff.md
|-- assets\
|   |-- brand\
|   |-- images\
|   |-- photography\
|   `-- references\
|-- content\
|   |-- about\
|   |-- cabinet\
|   |-- field-notes\
|   |-- journal\
|   |-- philosophy\
|   `-- projects\
|       |-- electronics\
|       |-- fisher-aquatics\
|       |-- kiwi\
|       |-- other-experiments\
|       |-- photography\
|       |-- software\
|       `-- wms\
|-- docs\
|   |-- planning\
|   `-- wordpress\
|-- logs\
|-- src\
`-- tests\
```

## Objective Benefits

- `docs/` preserves decisions and handoff material outside of implementation code.
- `content/` lets writing and information architecture develop before templates exist.
- `assets/` separates brand art, photographs, general images, and references so production files are not mixed with inspiration material.
- `logs/` creates an implementation history that future AI sessions can quickly scan.
- `src/` gives future website code one obvious home without committing to a framework today.
- `tests/` reserves space for accessibility, visual, performance, and integration checks once implementation begins.

## Subjective Preferences

- Folder names are plain English instead of abbreviated names. This is a preference for human readability.
- Project slugs use lowercase words with hyphens. This is a preference that tends to map cleanly to URLs later.

