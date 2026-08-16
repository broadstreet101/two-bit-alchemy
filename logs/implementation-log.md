# Implementation Log

## 2026-08-16

Cache consistency and layout normalization completed.

### Completed

- Replaced fixed stylesheet enqueue versions with file modification time versions for local theme CSS assets through `two_bit_alchemy_get_asset_version()`.
- Confirmed `main.css` and `print.css` now receive deterministic WordPress asset versions when their files change, without manual `TWO_BIT_ALCHEMY_VERSION` edits.
- Centered reading-oriented page composition within the existing wide site wrapper while keeping text left aligned.
- Centered homepage composition more intentionally, kept the approved section order, and reduced the frontispiece max-width to `640px` on desktop.
- Tightened vertical rhythm across global paragraphs, homepage sections, section headings, cards, footer spacing, metadata, figure captions, and Cabinet exhibit story transitions.
- Reduced divider density by keeping major section rules and removing redundant heading underline rules from minor section hierarchy.
- Refined primary navigation alignment through shared flex alignment and line-height behavior, without any Home-only correction.
- Verified the active IONOS Performance plugin exposes `Ionos\Performance\Caching\Caching::flush_total_cache()` and that the class is available through PHP 8.2 WP-CLI.
- Added a non-fatal post-deployment IONOS Performance cache purge to `scripts/deploy-theme.ps1`.
- Ran package validation and confirmed the ZIP contains `two-bit-alchemy/style.css` without enclosing `src/`, `themes/`, or `dist/` paths.
- Pushed implementation commits `c0ebd74631fffd39a001052c9206ab46ce602af7` and `13cefd10a3596c8cca7c1442b4f300471aa679f4`.
- Deployed commit `13cefd10a3596c8cca7c1442b4f300471aa679f4` with `scripts/deploy-theme.ps1 -ConfirmDeploy`.
- Created the final timestamped remote backup at `/kunden/homepages/40/d1019605209/htdocs/tba-theme-backups/two-bit-alchemy-20260816-152731`.
- Confirmed IONOS Performance cache purge returned `CACHE_PURGE_STATUS=ok`.
- Verified the public homepage returns HTTP 200 and contains `two-bit-alchemy-frontispiece-web.jpg`.
- Verified the public Cabinet page returns HTTP 200 and does not contain the Charlie Adlard draft exhibit title.
- Verified the public direct Charlie Adlard exhibit URL returns HTTP 404.
- Confirmed the Charlie Adlard Cabinet exhibit remains `draft`.

### Notes

- The first deployment attempt created remote backup `/kunden/homepages/40/d1019605209/htdocs/tba-theme-backups/two-bit-alchemy-20260816-152556` and copied theme files, but the newly added cache purge command exposed a PHP namespace quoting defect and returned a deployment-script error. The script was corrected and redeployed successfully.
- PHP CLI is not available in the local Windows environment, so local PHP lint could not run during this pass. Validation used static review, package validation, PowerShell parse validation, remote deployment verification, and public HTTP checks.
- No WordPress content, page structure, plugins, uploads, PHP hosting versions, approved story text, source images, Charlie Adlard artifact image, or Cabinet publication status were changed.

## 2026-08-16

Visual refinement and frontispiece deployment completed.

### Completed

- Refined the shared primary navigation alignment so nav items use consistent flex alignment, line-height, and baseline behavior.
- Tightened global and section-level vertical rhythm while preserving readable long-form story spacing and clear major-section separation.
- Refined Cabinet and Cabinet exhibit spacing so exhibit cards, metadata, captions, story content, related content, and return paths read more like restrained archival catalog surfaces.
- Created a normal web-ready derivative of the approved Two-Bit Alchemy frontispiece image at `src/themes/two-bit-alchemy/assets/images/frontispiece/two-bit-alchemy-frontispiece-web.jpg`.
- Integrated the frontispiece on the homepage after the approved Welcome/guiding-word area and before Featured Projects.
- Ran the established theme package validation before deployment.
- Deployed source commit `e08be895032ee370bf2d086ba8cbdd3864e14ef5` with `scripts/deploy-theme.ps1 -ConfirmDeploy`.
- Created the timestamped remote backup at `/kunden/homepages/40/d1019605209/htdocs/tba-theme-backups/two-bit-alchemy-20260816-150628`.
- Verified the deployed remote theme contains required theme files, the frontispiece asset, the Cabinet exhibit registry, the Charlie Adlard exhibit template, and the Charlie Adlard artifact image.
- Confirmed the Charlie Adlard Cabinet exhibit remains `draft`.
- Verified the public draft exhibit URL still returns the themed 404 for logged-out visitors.
- Verified the cache-busted public homepage includes the frontispiece asset reference.

### Notes

- No WordPress database content, settings, plugins, uploads, PHP hosting configuration, Charlie Adlard story text, Charlie Adlard artifact image, or Cabinet publication status were changed.
- The approved source frontispiece image was not modified; the theme contains only a resized/compressed derivative for web delivery.
- No AI image generation, enhancement, retouching, crop, transparency conversion, or stylistic alteration was performed.

## 2026-08-16

WordPress structural page baseline created.

### Completed

- Inspected the clean WordPress installation before writing and found only one page: `The Beginning` (`ID 14`, slug `the-beginning`, published, default template).
- Confirmed `The Beginning` remained configured as the static homepage before changes.
- Confirmed the theme uses named page templates under `templates/`, requiring `_wp_page_template` assignments for the structural pages.
- Created the missing structural pages through WP-CLI using PHP 8.2 explicitly:
  - `Projects` (`ID 33`, slug `projects`, template `templates/page-projects.php`)
  - `Field Notes` (`ID 34`, slug `field-notes`, template `templates/page-field-notes.php`)
  - `Workshop Journal` (`ID 35`, slug `workshop-journal`, template `templates/page-workshop-journal.php`)
  - `Cabinet` (`ID 36`, slug `cabinet`, template `templates/page-cabinet.php`)
  - `About` (`ID 37`, slug `about`, template `templates/page-about.php`)
  - `Contact` (`ID 38`, slug `contact`, template `templates/page-contact.php`)
- Preserved static homepage setting: `show_on_front=page`, `page_on_front=14`, homepage title `The Beginning`.
- Preserved no Posts page assignment: `page_for_posts=0`.
- Verified permalink structure remains `/%postname%/`.
- Verified search engine visibility remains discouraged with `blog_public=0`.
- Corrected new-content discussion defaults to `default_comment_status=closed` and `default_ping_status=closed`.
- Verified user registration remains disabled with `users_can_register=0`.
- Flushed WordPress rewrite rules and object cache.
- Verified public routes for `/`, `/projects/`, `/field-notes/`, `/workshop-journal/`, `/cabinet/`, `/about/`, and `/contact/` return HTTP 200.
- Verified logged-out direct access to `/cabinet/a-sketch-that-was-never-meant-to-exist/` returns HTTP 404.
- Verified the Cabinet registry keeps the Charlie Adlard exhibit as `draft`, logged-out visibility count is zero, and administrator visibility includes the draft exhibit slug.

### Notes

- No WordPress core, `wp-config.php`, plugins, uploads, unrelated themes, PHP hosting configuration, images, approved story text, Cabinet artifact publication status, or custom theme files were modified.
- No Posts page was created.
- The anomalous default `/usr/bin/php` runtime was not used.

## 2026-08-16

First automated production theme deployment completed.

### Completed

- Deployed source commit `d31c03d222464668be962352b2b260977da9a17d` to the IONOS Two-Bit Alchemy WordPress theme directory.
- Ran local package validation before deployment and confirmed the ZIP structure contained `two-bit-alchemy/style.css` with no enclosing `src/`, `dist/`, or `themes/` paths.
- Ran remote pre-deployment validation and confirmed the Two-Bit Alchemy WordPress root and existing theme directory were present.
- Confirmed the pre-deployment remote theme had required core files but did not yet include the newer Cabinet exhibit implementation files.
- Ran `scripts/deploy-theme.ps1 -ConfirmDeploy`.
- Created the timestamped remote backup at `/kunden/homepages/40/d1019605209/htdocs/tba-theme-backups/two-bit-alchemy-20260816-143535`.
- Verified the post-deployment remote theme path `/kunden/homepages/40/d1019605209/htdocs/clickandbuilds/TwoBitAlchemy/wp-content/themes/two-bit-alchemy`.
- Verified deployed files: `style.css`, `functions.php`, `index.php`, `theme.json`, `inc/cabinet-exhibits.php`, `templates/cabinet-exhibit-a-sketch-that-was-never-meant-to-exist.php`, and `assets/images/cabinet/charlie-adlard-amish-zombie-sketch-web.jpg`.
- Confirmed the Charlie Adlard Cabinet exhibit remains `draft`.
- Confirmed the rollback marker points to the created backup.
- Confirmed the active WordPress stylesheet and template remain `two-bit-alchemy`.
- Validated that WP-CLI can be invoked with PHP 8.2 using `/usr/bin/php8.2-cli /usr/share/php/wp-cli/wp-cli-2.12.0.phar --info`.

### Notes

- No WordPress core, `wp-config.php`, plugins, uploads, database content, unrelated themes, WordPress settings, PHP hosting configuration, Cabinet publication status, story text, or image content were modified.
- `twobitalchemy.com` hosting runtime remains documented as PHP 8.2, `/usr/bin/wp` reports WP-CLI using PHP 8.0.30, and `/usr/bin/php8.2-cli` is available as PHP 8.2.33.
- Rollback is available through `scripts/rollback-theme.ps1 -ConfirmRollback`, but rollback was not run.

## 2026-08-16

IONOS SSH deployment discovery completed.

### Completed

- Verified key-only SSH authentication through the `tba-ionos` alias.
- Confirmed the remote home path as `/kunden/homepages/40/d1019605209/htdocs`.
- Ran read-only remote discovery and identified the Click & Build roots for `FisherAquatics` and `TwoBitAlchemy`.
- Confirmed the Two-Bit Alchemy WordPress root, `wp-content` directory, themes directory, and active `two-bit-alchemy` theme directory.
- Confirmed WordPress reports active stylesheet and template as `two-bit-alchemy`.
- Confirmed WP-CLI is available at `/usr/bin/wp` and reports version 2.12.0 using PHP 8.0.30.
- Recorded PHP status: `twobitalchemy.com` uses PHP 8.2, `fisheraquatics.com` uses PHP 8.3, legacy IONOS live-website hostnames use PHP 7.4, and no PHP changes are authorized.
- Added `config/ionos-deployment.json` with repository-safe remote path configuration.
- Updated the remote discovery, deployment, and rollback scripts so remote shell scripts are sent with LF-only stdin and no CRLF parsing errors.
- Added read-only `-ValidateOnly` modes to deployment and rollback scripts.
- Updated remote deployment and baseline automation documentation with the confirmed paths and safety status.

### Notes

- No live theme deployment, rollback, WordPress setting change, database write, PHP change, content publication, story edit, or image edit was performed.
- Password authentication was needed once manually to install the public key, but the password was not provided to Codex, recorded, stored, echoed, or committed.
- First automated deployment remains blocked pending explicit deployment approval and backup/rollback confirmation.

## 2026-08-16

Safe IONOS deployment workflow foundation created.

### Completed

- Inspected local SSH capabilities and confirmed OpenSSH client, `ssh-keygen`, `scp`, `sftp`, `ssh-agent`, and PowerShell are available.
- Created a project-specific local SSH keypair at `C:\Users\dougl\.ssh\two-bit-alchemy-ionos`, outside the repository.
- Added the local SSH alias `tba-ionos` in the user's SSH configuration, pointing to the IONOS host with the project-specific identity file.
- Added `docs/remote-deployment.md` documenting the hosting target, secrets policy, SSH setup, one-time IONOS public-key step, read-only path discovery, guarded deployment, rollback, preview/publication safety, and PHP version note.
- Added `scripts/discover-wordpress-remote.ps1` for read-only remote WordPress path discovery after SSH authentication is configured.
- Added `scripts/deploy-theme.ps1` for future explicit deployments of only the validated Two-Bit Alchemy theme files.
- Added `scripts/rollback-theme.ps1` for future explicit rollback from the latest timestamped remote theme backup.
- Updated `.gitignore`, `docs/development-workflow.md`, `docs/theme-deployment.md`, and `docs/wordpress-baseline-automation.md` with deployment and secrets safeguards.

### Notes

- No live WordPress deployment, remote path discovery, remote write, theme activation, database change, content publication, PHP change, story edit, or image edit was performed.
- SSH authentication was not tested because the public key still needs to be added to IONOS.
- Remote WordPress paths remain pending discovery.
- `twobitalchemy.com` currently uses PHP 8.2; `fisheraquatics.com` uses PHP 8.3; PHP migration remains deferred until deployment automation is proven.

## 2026-08-16

WordPress Baseline and Automation Phase completed.

### Completed

- Added `docs/wordpress-baseline-automation.md` with a conservative WordPress baseline audit, cleanup sequence, automation architecture, deployment readiness guidance, and permanent automation guardrails.
- Added `scripts/package-theme.ps1` as the canonical Windows-compatible local theme packaging and ZIP validation script.
- Updated `docs/theme-deployment.md` to use the packaging script before manual WordPress upload.
- Updated `docs/development-workflow.md` with automation-specific project instructions.
- Updated `README.md` to reflect the current repository-controlled WordPress theme status and link to the baseline automation plan.
- Ran the packaging script locally and verified `dist/two-bit-alchemy.zip` contains `two-bit-alchemy/style.css` with no enclosing `src/`, `themes/`, or `dist/` paths.

### Notes

- No live WordPress site changes, cleanup, content publication, theme upload, plugin changes, credential setup, story edits, or image edits were performed.
- Live WordPress cleanup remains blocked pending manual audit, backup and restore confirmation, and explicit approval for each consequential change batch.

## 2026-08-16

Cabinet exhibit preview mode completed.

### Completed

- Reworked the Cabinet exhibit route into a reusable registry-controlled preview mechanism in `src/themes/two-bit-alchemy/inc/cabinet-exhibits.php`.
- Added a `draft` / `published` status model as the source of truth for Cabinet exhibit visibility.
- Kept the Charlie Adlard exhibit in `draft` status so it remains unpublished and preview-only.
- Updated the Cabinet page so draft exhibit cards are visible only to logged-in administrators with `manage_options`.
- Updated direct exhibit routing so logged-in administrators can preview draft exhibits and logged-out visitors receive the themed 404.
- Added `noindex,nofollow` output for draft Cabinet preview pages.
- Updated the Cabinet publication queue, publication readiness checklist, and Charlie Adlard content source with the reusable preview/publish process.

### Notes

- The approved Charlie Adlard story, source image, derivative image, CSS, unrelated pages, navigation, and WordPress content were not altered.
- Rights status remains: Publication permission / copyright status: review before public launch.

## 2026-08-16

First Cabinet exhibit implementation completed.

### Completed

- Created the local ignored media archive path at `media-archive/cabinet/charlie-adlard-amish-zombie-sketch/master/` and copied the attached source photograph there unchanged as `charlie-adlard-amish-zombie-sketch-master.jpg`.
- Added `media-archive/` to `.gitignore` so archived source media is not committed.
- Created the web-ready derivative at `content/media/cabinet/a-sketch-that-was-never-meant-to-exist/charlie-adlard-amish-zombie-sketch-web.jpg`.
- Added a theme deploy copy at `src/themes/two-bit-alchemy/assets/images/cabinet/charlie-adlard-amish-zombie-sketch-web.jpg` so the WordPress theme package can render the exhibit image after installation.
- Implemented the repository-controlled Cabinet exhibit route `/cabinet/a-sketch-that-was-never-meant-to-exist/`.
- Added the Cabinet exhibit page using the approved story verbatim, restrained artifact metadata, image caption, alt text, rights/attribution status, related-content area, and return path to Cabinet.
- Updated the Cabinet page to surface the implemented exhibit.
- Updated `docs/cabinet-publication-queue.md`, `docs/publication-readiness-checklist.md`, and `content/cabinet/a-sketch-that-was-never-meant-to-exist.md` with the media workflow, implementation status, and remaining launch blockers.

### Notes

- No source/master image was modified.
- Image operations performed on the derivative: EXIF orientation checked, no orientation correction needed, no perspective correction, crop of unnecessary surrounding fabric/background, resize to 1000 pixels wide, high-quality JPEG export.
- No WordPress publication, live-site change, redesign, animation, decorative artwork, AI image enhancement, retouching, artwork recreation, or unrelated navigation change was performed.
- Public launch remains blocked pending rights/attribution review, WordPress preview, accessibility review, proofreading, and final approval.

## 2026-08-16

First Cabinet artifact content approval completed.

### Completed

- Added `content/cabinet/a-sketch-that-was-never-meant-to-exist.md` as the authoritative approved Cabinet content source for the Charlie Adlard Amish-zombie sketch.
- Preserved `content/workbench/cabinet/walking-dead-sketch.md` as the earlier raw Workbench source note.
- Recorded the approved publication draft verbatim, without publishing it to WordPress or implementing a public page.
- Documented the image integration plan, including recommended master location, future web-ready derivative location, WordPress filename, caption, alt text approach, image-use approach, and copyright/attribution review needs.
- Documented the intended Cabinet exhibit presentation plan for the future public page.
- Added the punctuation house-style rule to `docs/voice-and-editorial-guide.md`.
- Updated `docs/cabinet-publication-queue.md` and `content/cabinet/README.md` to reflect the approved content source and remaining publication blockers.

### Notes

- No website, theme, templates, CSS, JavaScript, WordPress configuration, source photograph, uploaded image, or published content were modified.
- The artifact is approved as repository content, but it is not publication-ready until image rights/attribution review, image preparation, final caption/alt text review, page implementation, accessibility review, and final approval are complete.

## 2026-08-12

Publication Phase Step 3 completed.

### Completed

- Added `docs/cabinet-publication-queue.md` as a reusable queue for tracking Cabinet artifacts through the publication pipeline.
- Seeded the queue with the current known Cabinet artifact drafts: Charlie Adlard Amish Zombie Sketch, Tori Amos Camel cigarette pack, and 1981 Ford Escort model.
- Tracked each artifact for status, editorial completeness, story completeness, image status, metadata, captions, cross-links, accessibility, publication readiness, target shelf, and notes.

### Notes

- No website, theme, templates, CSS, JavaScript, WordPress configuration, published content, or live site content were modified.
- All seeded artifacts remain unpublished and not publication-ready pending content completion, image preparation, metadata, accessibility review, and final approval.

## 2026-07-06

Publication Phase Step 2 completed.

### Completed

- Added `docs/publication-readiness-checklist.md` as a reusable pre-publication checklist for future shelves, exhibits, Field Notes, artifacts, projects, and related content groups.
- Included checklist sections for repository content, editorial review, fact and uncertainty review, image inventory, captions, alt text, metadata, cross-links, related content, accessibility, proofreading, and final approval.
- Added concise image preparation guidelines for artifacts, Field Notes, projects, and exhibits.

### Notes

- No website, theme, templates, CSS, JavaScript, WordPress configuration, live content, or publication actions were modified.
- The checklist distills `docs/publication-phase-plan.md` into a practical reusable review tool.

## 2026-07-05

Publication Phase planning completed.

### Completed

- Added `docs/publication-phase-plan.md` to define the checklist and implementation plan for bringing the first complete shelf live.
- Identified remaining publication steps for `Black Willow Propagation`, the Tori Amos Camel cigarette pack, and the 1981 Ford Escort model.
- Documented required work for repository content completion, page/template decisions, images, captions, metadata, cross-linking, accessibility, related content, quality control, and publication sequencing.

### Notes

- No website, theme, templates, CSS, JavaScript, WordPress configuration, live site content, or publication actions were modified.
- The plan preserves the current boundary that all three shelf items still require final content, review, media preparation, and approval before publication.

## 2026-07-05

Museum Opening Phase 1 completed.

### Completed

- Updated the homepage featured project summaries to use approved repository text for Fisher Aquatics, Kiwi, and Photography.
- Surfaced `Black Willow Propagation` as the first featured Field Note on the homepage.
- Added the Black Willow Field Note content to the Field Notes page using approved Workbench facts while preserving uncertainty and practical-observation boundaries.
- Added the Cabinet introduction and launch-status note without displaying individual artifacts.
- Reviewed About and Kiwi content; existing templates continue to use approved content and guarded placeholders where final content is not yet approved.

### Notes

- No redesign, decorative artwork, animation, JavaScript, WordPress admin change, or live-site modification was introduced.
- Kiwi-specific purpose, background, timeline, and image content remain placeholders because the repository still marks those details as missing approved content.

## 2026-07-05

First Workbench Field Note Phase completed.

### Completed

- Added `content/workbench/field-notes/black-willow-propagation.md` as the first structured Workbench Field Note draft.
- Captured the black willow propagation observations, including the mistaken weeping willow order, several years of growth, rooting experiments, lavender result, and Heidi O'Toole's practical insight about natural rooting compounds.
- Clearly marked uncertain details and preserved the distinction between practical observation and scientific proof.

### Notes

- No website, theme, templates, CSS, JavaScript, WordPress configuration, or live site content were modified.
- The Field Note remains unpublished Workbench material and was not polished into finished prose.

## 2026-07-05

Shelf Worthiness Guide Phase completed.

### Completed

- Added `docs/shelf-worthiness.md` to define how objects, stories, photographs, projects, memories, and exhibits earn a lasting place in Two-Bit Alchemy.
- Documented that shelf worthiness is based on meaning, learning, memory, kindness, curiosity, and preservation rather than monetary value, rarity, or prestige.
- Added cross-references from `docs/creative-constitution.md` and `docs/editorial-workflow.md`.

### Notes

- No website, theme, templates, CSS, JavaScript, WordPress configuration, Workbench artifacts, or live site content were modified.
- The guide clarifies that not every interesting thing earns a shelf, not every shelf item becomes an exhibit, some stories remain private, and some stories may stay in the Workbench indefinitely.

## 2026-07-05

First Artifact Draft Population completed.

### Completed

- Updated `content/workbench/artifacts/tori-amos-cigarette-pack.md` with raw story material supplied by Dada, including the 9:30 Club context, uncertain late-1990s tour/date, autograph circumstances, starstruck memory, and shelf location.
- Updated `content/workbench/artifacts/1981-ford-escort-model.md` with raw story material supplied by Dada, including the model description, real car connection, accident context, Jon provenance, family/friend connections, and current relationship to the signed Tori Amos cigarette pack.
- Clearly marked uncertain or missing details as open questions or placeholders.

### Notes

- No website, theme, templates, CSS, JavaScript, WordPress configuration, or live site content were modified.
- The material remains unpublished Workbench content and was not polished into final exhibit prose.

## 2026-07-05

Artifact Draft Workflow Phase completed.

### Completed

- Added `content/workbench/artifacts/` for structured unpublished artifact drafts.
- Added `content/workbench/artifacts/README.md` defining the Artifact Draft workflow, required sections, rules, source references, and graduation criteria.
- Added initial Workbench artifact drafts for `tori-amos-cigarette-pack.md` and `1981-ford-escort-model.md` using only known artifact names and unpublished Workbench status, with placeholders for unknown details.
- Updated `content/workbench/README.md` to include the new artifact draft area.

### Notes

- No website, theme, templates, CSS, JavaScript, WordPress configuration, or live site content were modified.
- No artifact details were invented; unknown information remains explicitly marked as placeholder material.

## 2026-07-05

Editorial Workflow Phase completed.

### Completed

- Added `docs/editorial-workflow.md` to document the lifecycle from Conversation to Workbench Notes, Editorial Draft, Fact Review, Final Exhibit, and Publication.
- Clarified that every exhibit begins as conversation, the Workbench preserves raw observations, editorial work improves structure without changing facts, and the author's voice should be preserved.
- Documented the boundary between editorial development and technical implementation, including Codex's support role and limits.

### Notes

- No website, theme, template, CSS, WordPress configuration, live site content, or Workbench artifacts were modified.
- Codex may structure and support editorial material but should not author personal stories or invent facts.

## 2026-07-04

First Workbench Artifact Phase completed.

### Completed

- Added `content/workbench/cabinet/walking-dead-sketch.md` as the first Workbench Cabinet artifact starting point.
- Included only structured placeholder headings for object description, story, relationships, photographs, status, and notes.

### Notes

- No website, theme, template, CSS, WordPress configuration, live site content, artifact prose, or invented content was added.
- The artifact remains unpublished Workbench material.

## 2026-07-04

Workbench Workflow Phase completed.

### Completed

- Added `content/workbench/` as the repository staging area where new material begins life before publication.
- Added Workbench subdirectories for Field Notes, Workshop Journal, Cabinet, Exhibits, Tributes, Photography, and Ideas.
- Added `content/workbench/README.md` with Workbench purpose, rules, and the Observation -> Workbench -> Review -> publication workflow.
- Updated `README.md` to link to the Workbench.

### Notes

- No website, theme, template, CSS, WordPress configuration, or live site files were modified.
- Workbench material is explicitly not considered published until it graduates through review.

## 2026-07-04

Kiwi Exhibit Completion Phase 1 completed.

### Completed

- Expanded `src/themes/two-bit-alchemy/templates/page-kiwi.php` into a fuller Phase 1 exhibit with metadata, final orientation copy, timeline, gallery support, figure/caption placeholder, educational callout, related exhibits, related Field Notes, related Workshop Journal, and You May Also Enjoy paths.
- Preserved the rule that repository-approved content remains the source of truth and kept Kiwi-specific unknowns as concise placeholders.
- Added supporting CSS for exhibit metadata, timeline layout, figure/caption presentation, related exhibit cards, and educational callouts.

### Notes

- No homepage content, JavaScript, animations, new color tokens, artwork, photographs, or live WordPress changes were added.
- No Kiwi-specific facts were invented; project-specific narrative, images, milestones, and related entries still require approved source content.

## 2026-07-04

Exhibit Standard Phase completed.

### Completed

- Added `docs/exhibit-standard.md` to define what makes a Two-Bit Alchemy exhibit complete before publication.
- Documented required narrative elements, structural elements, educational value, related content expectations, cross-linking requirements, image philosophy, evidence versus storytelling, accessibility expectations, editorial checklist, and publication checklist.
- Defined the five core exhibit questions: what it is, why it matters, what someone can learn, where visitors should go next, and why it belongs in Two-Bit Alchemy.

### Notes

- No theme files, templates, CSS, WordPress configuration, or live site content were modified.
- The exhibit standard is documentation only and should guide future project, artifact, and archive exhibits.

## 2026-07-04

Kiwi Project Exhibit Implementation completed.

### Completed

- Added `src/themes/two-bit-alchemy/templates/page-kiwi.php` as the initial Kiwi project exhibit template.
- Included sections for Project Introduction, Purpose, Background, Timeline, Related Field Notes, Related Workshop Journal, Gallery, Related Projects, and You May Also Enjoy.
- Used only approved project-architecture facts and clearly labeled placeholders where Kiwi-specific content has not yet been approved.
- Updated `src/themes/two-bit-alchemy/assets/css/main.css` so project exhibit sections share the established archival section rhythm.

### Notes

- No Kiwi facts, artwork, photographs, homepage changes, JavaScript, animations, new color tokens, or live WordPress changes were added.
- The Kiwi page template is ready for assignment to the `/projects/kiwi/` WordPress page once that page exists.

## 2026-07-04

Experience Map Phase completed.

### Completed

- Added `docs/experience-map.md` to describe the intended visitor journey through Two-Bit Alchemy.
- Documented first-time and returning visitor paths, natural content relationships, cross-linking philosophy, suggested related-content patterns, section reinforcement, and future-area integration.
- Included guidance for Tributes, Memorials, and the Clutch Archive as future experience areas requiring privacy, permission, copyright, and attribution review.

### Notes

- No theme files, templates, CSS, WordPress configuration, or live site content were modified.
- The experience map is planning documentation only.

## 2026-07-04

About Page Content Implementation completed.

### Completed

- Replaced early About placeholder copy in `src/themes/two-bit-alchemy/templates/page-about.php` with approved introductory language from project documentation where available.
- Structured the About page around Introduction, Why Two-Bit Alchemy Exists, A Life of Curiosity, The Workshop, and What You'll Find Here.
- Left the personal biography area as a clearly marked placeholder because final personal content has not yet been approved.
- Added restrained About section styling in `src/themes/two-bit-alchemy/assets/css/main.css`.

### Notes

- No personal facts, artwork, photographs, animations, JavaScript, new colors, homepage content changes, or live WordPress changes were added.
- The About page now has a stronger launch structure while leaving room for future approved personal content.

## 2026-07-04

Global Site Shell Implementation completed.

### Completed

- Refined the shared site header with quieter spacing, title hierarchy, and archival separation.
- Implemented the approved primary navigation order as a fallback when no WordPress menu is assigned.
- Added a restrained shared footer with site identity, footer navigation, and a simple ownership note.
- Updated site-shell CSS for responsive navigation, footer rhythm, and accessible link/focus behavior.

### Notes

- No homepage content, decorative artwork, icons, animations, JavaScript, new color tokens, or live WordPress changes were added.
- WordPress-assigned primary menus remain supported and take precedence over the fallback navigation.

## 2026-07-04

Cabinet Motif Implementation completed.

### Completed

- Added subtle CSS-only archival separators for homepage sections and footer separation.
- Refined homepage project and entry cards to feel more like restrained catalog cards using existing color tokens.
- Added non-animated hover and focus-within treatments for homepage cards while preserving accessibility and responsive behavior.
- Adjusted homepage guiding-word alignment without changing content, typography tokens, or homepage order.

### Notes

- No decorative artwork, new colors, animations, JavaScript, new content, template changes, or live WordPress changes were added.
- The motif remains intentionally quiet and uses existing theme tokens only.

## 2026-07-04

Homepage Layout Refinement Phase completed.

### Completed

- Refined the homepage hero and Welcome layout using the existing typography foundation.
- Improved homepage section spacing, heading scale, project card layout, latest-entry spacing, footer spacing, and responsive behavior.
- Preserved the approved Welcome text exactly and kept the current homepage section order.

### Notes

- No decorative artwork, animations, JavaScript, new content, site redesign, or live WordPress changes were added.
- The homepage remains restrained, readable, and aligned with the workshop-like direction.

## 2026-07-04

Typography Implementation Phase completed.

### Completed

- Updated `src/themes/two-bit-alchemy/theme.json` with expanded system-font typography tokens and heading/caption defaults.
- Updated `src/themes/two-bit-alchemy/assets/css/main.css` with base typography, heading hierarchy, paragraph rhythm, lists, links, captions, metadata, blockquotes, code/preformatted blocks, tables, and responsive typography adjustments.
- Updated `src/themes/two-bit-alchemy/assets/css/editor.css` so the block editor better reflects the front-end typography foundation.

### Notes

- No decorative artwork, animations, Victorian ornament, JavaScript, page builders, or live WordPress changes were added.
- Typography remains intentionally restrained and system-font based.

## 2026-07-04

Component Library Phase completed.

### Completed

- Added `docs/component-library.md` to define reusable typography, navigation, content, interactive, and structural components for Two-Bit Alchemy.
- Documented purpose, content rules, accessibility expectations, responsive behavior, reuse guidelines, objective implementation rules, and subjective styling considerations for each component.
- Updated `docs/design-system.md` and `docs/theme-architecture.md` to cross-reference the component library.

### Notes

- No CSS, component implementation, website redesign, decorative styling, or live WordPress changes were added.
- Component styling remains reserved for a later approved implementation phase.

## 2026-07-04

Visual Language Phase completed.

### Completed

- Added `docs/visual-language.md` to define how imagery is used throughout Two-Bit Alchemy.
- Documented image philosophy, photography principles, illustration principles, artifact philosophy, image hierarchy, image editing, accessibility, credits, licensing, and objective versus subjective image decisions.
- Updated `docs/design-system.md` and `docs/creative-constitution.md` to cross-reference the visual language guide.

### Notes

- No website files, code, decorative styling, final artwork placement, or live WordPress changes were modified.
- Imagery should be treated as evidence, documentation, and historical material rather than filler decoration.

## 2026-07-04

Layout System Phase completed.

### Completed

- Added `docs/layout-system.md` as the structural layout reference for Two-Bit Alchemy.
- Documented content width philosophy, vertical rhythm, homepage section order, interior page structure, image placement, navigation placement, footer philosophy, responsive behavior, accessibility considerations, and objective versus subjective layout decisions.
- Updated `docs/theme-architecture.md` to cross-reference the layout system.

### Notes

- No code, decorative styling, final typography, color, illustration, ornamentation, or live WordPress changes were implemented.
- The document establishes structural layout language for future implementation phases.

## 2026-07-04

Homepage Welcome Content Phase completed.

### Completed

- Added `content/homepage/welcome.md` with the approved Welcome text exactly as provided.
- Updated `src/themes/two-bit-alchemy/front-page.php` to render the approved Welcome beneath the homepage site title.
- Preserved the existing homepage structure and guiding words.

### Notes

- The Welcome text was not rewritten, summarized, or embellished.
- No decorative artwork, animations, marketing call-to-action buttons, or new JavaScript were added.

## 2026-07-04

About Page Implementation completed.

### Completed

- Updated `src/themes/two-bit-alchemy/templates/page-about.php` with a semantic About page structure.
- Added sections for opening introduction, purpose, workshop/tools, what visitors will find, and a short closing invitation.
- Used approved voice and editorial guidance, the Creative Constitution, Brand Manifest, and Design System direction.

### Notes

- No personal facts were invented.
- No decorative artwork, new JavaScript, site-wide redesign, or live WordPress changes were added.
- The page is ready for content drafting and later refinement.

## 2026-07-04

Voice & Editorial Guide Phase started.

### Completed

- Added `docs/voice-and-editorial-guide.md` as the writing voice reference for future Two-Bit Alchemy content.
- Documented core voice, tone, storytelling, technical writing, preservation philosophy, editorial test, and practical writing rules.
- Updated `docs/creative-constitution.md` to cross-reference the editorial guide.
- Updated `docs/decisions.md` with approved voice and editorial direction.

### Notes

- No code, website features, visual styling, or live WordPress changes were implemented.
- Future content documents should reference the voice and editorial guide before drafting or publishing.

## 2026-07-03

Creative Constitution Phase started.

### Completed

- Added `docs/creative-constitution.md` as the internal long-term creative purpose document for Two-Bit Alchemy.
- Documented purpose, philosophy, what belongs, what does not belong, visitor experience, creative principles, preservation principles, and a future decision test.
- Updated `docs/decisions.md` to reference the Creative Constitution as a durable project decision source.

### Notes

- No code, website features, visual styling, or live WordPress changes were implemented.
- Future planning documents should reference the Creative Constitution when evaluating major content, design, or feature decisions.

## 2026-07-03

Design System Phase started.

### Completed

- Added `docs/design-system.md` as the permanent visual design reference for the Two-Bit Alchemy website.
- Documented design philosophy, layout system, typography, color, components, motion, accessibility, and future artwork integration.
- Updated `docs/theme-architecture.md` to reference the design system.
- Updated `docs/decisions.md` with approved design system direction.

### Notes

- No homepage redesign, CSS implementation, decorative Victorian artwork, JavaScript, or new website features were added.
- Final palette values, typeface choices, illustration density, ornament placement, and artwork placement still require future approval before implementation.

## 2026-07-03

Homepage Structure Phase started.

### Completed

- Implemented the structural homepage framework in `src/themes/two-bit-alchemy/front-page.php`.
- Added semantic sections for hero, featured projects, latest Field Notes, latest Workshop Journal, Cabinet call-to-action, and reflection.
- Used native WordPress category queries for Field Notes and Workshop Journal with friendly empty states when categories or posts are missing.
- Updated `docs/theme-architecture.md` to record the homepage implementation direction.

### Notes

- No decorative Victorian artwork, animations, JavaScript, page builders, third-party libraries, or final homepage design work was added.
- Visual styling remains intentionally minimal and will be handled in a later approved phase.

## 2026-07-03

Theme Smoke Test Phase prepared.

### Completed

- Added `docs/theme-smoke-test.md`.
- Created a first-activation checklist covering immediate activation, front-end rendering, WordPress admin, accessibility, browser console checks, and recovery procedure.
- Reviewed the current theme skeleton for objective pre-homepage issues.

### Notes

- No layouts, styling, new features, third-party libraries, page builders, or live WordPress changes were added.
- No objective skeleton issues were identified that must be corrected before first activation.
- Activation is recommended as the next validation step before homepage implementation.

## 2026-07-03

Theme skeleton validation completed.

### Completed

- Added `docs/theme-validation.md`.
- Verified required theme files, template-part references, `theme.json` validity, enqueued asset paths, dependency-free scope, and accessibility basics.
- Documented that PHP is not available locally, so PHP lint could not be run.
- Fixed objective skeleton defects found during validation.

### Notes

- No layouts, decorative styling, third-party libraries, page builders, unnecessary JavaScript, or live WordPress changes were added.
- The theme skeleton is ready to package for WordPress installation testing, with PHP lint/install testing still required in a WordPress/PHP environment.

## 2026-07-03

WordPress theme skeleton created.

### Completed

- Added the initial custom WordPress theme under `src/themes/two-bit-alchemy/`.
- Created required theme files, core templates, approved page templates, reusable template parts, setup includes, `theme.json`, and minimal CSS/editor support.
- Added intentionally empty asset folders for future JavaScript, fonts, images, icons, and language files.
- Added `docs/theme-deployment.md` with packaging, installation, safe activation, and rollback instructions.
- Updated `docs/theme-architecture.md` to reference deployment documentation and the implemented skeleton path.

### Notes

- No live WordPress site changes were made.
- No page layouts, decorative styling, page builders, third-party libraries, or unnecessary JavaScript were added.

## 2026-07-03

Theme skeleton prerequisites finalized.

### Completed

- Added `docs/theme-skeleton-plan.md`.
- Finalized the initial template file list, reusable template-part list, minimal block pattern list, typography strategy, color tokens, brand asset export requirements, image rules, accessibility targets, performance targets, deployment process, and Philosophy placement.
- Updated `docs/theme-architecture.md` to reference the skeleton plan and reduce remaining implementation prerequisites to explicit approval to create files.
- Updated `docs/content-model.md` to record Philosophy as a section on the About page at launch.
- Updated `docs/decisions.md` with approved theme skeleton prerequisites.

### Notes

- No theme code was written.
- No live WordPress site changes were made.

## 2026-07-03

Launch content model approved.

### Completed

- Updated `docs/content-model.md` to mark the launch content model as approved.
- Updated `docs/theme-architecture.md` to reflect the approved content model and the requirement for Field Notes and Workshop Journal category archive templates.
- Updated `docs/decisions.md` to record approved launch content model decisions.

### Notes

- No theme code was written.
- No live WordPress site changes were made.

## 2026-07-03

Content Model Phase started.

### Completed

- Added `docs/content-model.md`.
- Proposed a simple maintainable WordPress content model using standard Pages, Posts, native Categories, organic Tags, and the native Media Library.
- Documented why custom post types and custom taxonomies are not recommended for launch.
- Mapped Projects, Fisher Aquatics, Kiwi, Photography, Field Notes, Workshop Journal, Cabinet, Tributes / Memorials, and Clutch Archive to launch or future content models.
- Updated `docs/theme-architecture.md` with a cross-reference to the content model.
- Added the proposed content model to `docs/decisions.md` as pending approval.

### Notes

- No theme code was written.
- No live WordPress site changes were made.
- Future custom post types remain possible only if content volume or structure justifies them later.

## 2026-07-03

Future content areas recorded and theme architecture approved.

### Completed

- Added Tributes / Memorials as a future meaningful personal archive in `docs/site-architecture.md`.
- Added Clutch Archive / Interactive References as a future special project requiring copyright and attribution review in `docs/site-architecture.md`.
- Added future expansion candidates to `docs/site-map.md`.
- Recorded future content areas and approved theme architecture in `docs/decisions.md`.
- Updated `docs/theme-architecture.md` to mark the custom repository-controlled theme model and `src/themes/two-bit-alchemy/` path as approved.

### Notes

- No code was implemented.
- No live WordPress site changes were made.
- Future Tributes / Memorials work requires privacy, permissions, and submission decisions.
- Future Clutch archive work requires copyright and attribution review before implementation.

## 2026-07-03

Theme Architecture Phase started.

### Completed

- Added `docs/theme-architecture.md`.
- Documented architecture for a lightweight, maintainable custom Two-Bit Alchemy WordPress theme.
- Covered philosophy, folder structure, template hierarchy, reusable template parts, assets, CSS, JavaScript, image handling, typography, color tokens, Gutenberg compatibility, child theme considerations, accessibility, and performance.
- Used official WordPress Theme Handbook and `theme.json` documentation as technical references.

### Notes

- No live WordPress site modifications were made.
- No PHP, CSS, or JavaScript was written.
- No third-party page builders, Elementor-style tools, themes, or plugins were recommended.

## 2026-07-03

Live WordPress Inspection Phase prepared.

### Completed

- Added `docs/wordpress-inspection-checklist.md` as a step-by-step read-only inspection checklist for the existing Fisher Aquatics WordPress installation.
- Organized the checklist to minimize unnecessary WordPress admin navigation.
- Included purpose, WordPress location, information to record, evidence to collect, export opportunities, administrator-access requirements, and migration relevance for each step.
- Added Inspection Complete criteria.
- Cross-referenced the checklist from `docs/wordpress-audit.md`.

### Notes

- No live website inspection was performed.
- No live website modifications were made.
- No themes or plugins were recommended.

## 2026-07-03

WordPress Audit Phase started.

### Completed

- Added `docs/wordpress-audit.md` as a framework for capturing the current state of the existing Fisher Aquatics WordPress site before redesign.
- Included audit sections for hosting, WordPress/PHP versions, theme status, plugins, media, pages, posts, menus, widgets, custom CSS/JavaScript, performance, accessibility, backups, security, URLs, SEO, and migration risks.
- Marked unknown information as requiring live WordPress inspection where the repository cannot verify it.

### Notes

- No live website inspection was performed.
- No website modifications were made.
- No themes or plugins were recommended.

## 2026-07-03

Information architecture decisions approved.

### Completed

- Updated `docs/site-architecture.md` with approved launch navigation, Philosophy placement, Search handling, Workshop Journal naming, Photography structure, Fisher Aquatics integration, category strategy, internal project status handling, and URL structure.
- Updated `docs/site-map.md` to remove Search from primary navigation, place Philosophy under About, and add approved launch URLs and categories.
- Updated `docs/decisions.md` so the approved information architecture is recorded as a durable project decision.

### Notes

- No website code was implemented.
- No page layouts, themes, or plugins were added or recommended.

## 2026-07-03

Information Architecture Phase started.

### Completed

- Added `docs/site-architecture.md`.
- Added `docs/site-map.md`.
- Proposed top-level navigation, secondary navigation, homepage content hierarchy, section purposes, audiences, typical content, and cross-section relationships.
- Documented Fisher Aquatics as a project inside Two-Bit Alchemy rather than the primary identity.
- Included assumptions, search strategy, category and tag strategy, future expansion points, and decisions requiring user approval.

### Notes

- No page layouts were designed.
- No themes or plugins were recommended.
- No website code was implemented.

## 2026-07-03

Development workflow policy established.

### Completed

- Added `docs/development-workflow.md` as permanent project governance.
- Documented the repository-first workflow: repository, Git, GitHub, deployment, then WordPress configuration and content.
- Limited expected WordPress admin work to activation, configuration, content, media, menus, widgets, unavoidable configuration, and final testing.
- Added references to the workflow policy in the README, project summary, brand manifest, and discovery phase document.

### Notes

- No website features were implemented.
- No website implementation files were added.

## 2026-07-03

Website Discovery Phase started.

### Completed

- Added `docs/discovery-phase.md`.
- Documented facts, assumptions, and items requiring user decisions.
- Added objective recommendations for WordPress architecture, theme strategy, plugin strategy, content migration, brand assets, accessibility, performance, security, and launch roadmap.

### Notes

- Recommendations were documented as recommendations, not final decisions.
- No website implementation was started.
- No website files were modified.

## 2026-07-03

Brand manifest refinements added.

### Completed

- Added North Star, Content Principles, Technology Philosophy, and Major Brand Decisions sections to `docs/brand-manifest.md`.
- Preserved the existing approved brand manifest content while adding the approved refinements.
- Added references to the brand manifest in the README, project summary, project decisions, and implementation approval checklist.

### Notes

- No new brand direction was invented.
- No website implementation was started.

## 2026-07-03

Brand manifest created.

### Completed

- Added `docs/brand-manifest.md` as the long-term creative and design constitution for Two-Bit Alchemy.
- Used the AI handoff, README, project summary, and decisions documents as source material.
- Included sections for identity, guiding question, design philosophy, visual style, voice, site principles, approved symbols, things to avoid, decision rules, and ChatGPT/Codex responsibilities.

### Notes

- No new brand direction was invented.
- No website implementation was started.

## 2026-07-03

GitHub repository setup completed.

### Completed

- Initialized the local project as a Git repository.
- Added a conservative `.gitignore` for local clutter, dependencies, build outputs, secrets, logs, and common WordPress generated files.
- Connected the local repository to `https://github.com/broadstreet101/two-bit-alchemy.git`.
- Confirmed the local default branch is `main`.
- Created the initial commit with the message `Initial project structure`.
- Pushed `main` to GitHub and set it to track `origin/main`.

### Notes

- Git reported Windows line-ending warnings during the first commit. These were warnings only, not errors.
- No website implementation was started.

## 2026-07-03

Planning scaffold created.

### Completed

- Read the current AI handoff document.
- Reviewed the current emblem artwork.
- Created project folders for assets, content, documentation, logs, future source code, and tests.
- Added starter Markdown files for project summary, decisions, repository structure, missing files, content inventory, WordPress audit planning, and implementation approval.

### Not Done

- No website code generated.
- No framework selected.
- No WordPress audit performed.
- No design redesign proposed.

### Rationale

The project needs a stable planning layer before implementation so future changes can preserve successful decisions and distinguish practical improvements from personal taste.
