<?php
/**
 * Template Name: Kiwi Project
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );
?>

<?php
while ( have_posts() ) :
	the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content project-exhibit' ); ?>>
		<header class="entry-header project-exhibit__header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<p><?php esc_html_e( 'Kiwi is an approved Two-Bit Alchemy project exhibit under Projects. This Phase 1 exhibit establishes the complete publication structure while clearly marking the project-specific material that still needs approved content.', 'two-bit-alchemy' ); ?></p>
		</header>

		<section class="project-section" aria-labelledby="kiwi-metadata-title">
			<h2 id="kiwi-metadata-title"><?php esc_html_e( 'Exhibit Metadata', 'two-bit-alchemy' ); ?></h2>
			<dl class="metadata-list">
				<div>
					<dt><?php esc_html_e( 'Exhibit type', 'two-bit-alchemy' ); ?></dt>
					<dd><?php esc_html_e( 'Project', 'two-bit-alchemy' ); ?></dd>
				</div>
				<div>
					<dt><?php esc_html_e( 'Section', 'two-bit-alchemy' ); ?></dt>
					<dd><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><?php esc_html_e( 'Projects', 'two-bit-alchemy' ); ?></a></dd>
				</div>
				<div>
					<dt><?php esc_html_e( 'Approved URL', 'two-bit-alchemy' ); ?></dt>
					<dd><code><?php echo esc_html( '/projects/kiwi/' ); ?></code></dd>
				</div>
				<div>
					<dt><?php esc_html_e( 'Content status', 'two-bit-alchemy' ); ?></dt>
					<dd><?php esc_html_e( 'Phase 1 exhibit structure; project-specific narrative pending approval.', 'two-bit-alchemy' ); ?></dd>
				</div>
			</dl>
		</section>

		<section class="project-section" aria-labelledby="kiwi-introduction-title">
			<h2 id="kiwi-introduction-title"><?php esc_html_e( 'Project Introduction', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'This exhibit is the public home for Kiwi inside Two-Bit Alchemy. It is designed to preserve the project story, gather related notes and artifacts, and give visitors a clear path into the work once approved Kiwi-specific material has been created.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'For now, the exhibit demonstrates the complete structure of a Two-Bit Alchemy project page without pretending that missing project details are already known.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-purpose-title">
			<h2 id="kiwi-purpose-title"><?php esc_html_e( 'Purpose', 'two-bit-alchemy' ); ?></h2>
			<div class="educational-callout">
				<h3><?php esc_html_e( 'Exhibit question', 'two-bit-alchemy' ); ?></h3>
				<p><?php esc_html_e( 'What does Kiwi help someone observe, understand, preserve, or make?', 'two-bit-alchemy' ); ?></p>
			</div>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'Approved purpose content for Kiwi has not been created yet. This section should explain why the project exists and what question or need it serves.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-background-title">
			<h2 id="kiwi-background-title"><?php esc_html_e( 'Background', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'Approved background content for Kiwi has not been created yet. This section should preserve the project origin, context, constraints, and history once they are available.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-timeline-title">
			<h2 id="kiwi-timeline-title"><?php esc_html_e( 'Timeline', 'two-bit-alchemy' ); ?></h2>
			<ol class="exhibit-timeline">
				<li>
					<p class="entry-meta"><?php esc_html_e( 'Approved project architecture', 'two-bit-alchemy' ); ?></p>
					<h3><?php esc_html_e( 'Kiwi is defined as a project page', 'two-bit-alchemy' ); ?></h3>
					<p><?php esc_html_e( 'Project documentation identifies Kiwi as an approved child page under Projects at /projects/kiwi/.', 'two-bit-alchemy' ); ?></p>
				</li>
				<li>
					<p class="entry-meta"><?php esc_html_e( 'Phase 1 exhibit', 'two-bit-alchemy' ); ?></p>
					<h3><?php esc_html_e( 'Publication structure established', 'two-bit-alchemy' ); ?></h3>
					<p><?php esc_html_e( 'This template adds the exhibit structure needed for introduction, purpose, background, chronology, related content, gallery material, and next paths.', 'two-bit-alchemy' ); ?></p>
				</li>
				<li>
					<p class="entry-meta"><?php esc_html_e( 'Pending approved content', 'two-bit-alchemy' ); ?></p>
					<h3><?php esc_html_e( 'Project-specific milestones still needed', 'two-bit-alchemy' ); ?></h3>
					<p><?php esc_html_e( 'Future timeline entries should preserve real Kiwi chronology rather than retroactive polish.', 'two-bit-alchemy' ); ?></p>
				</li>
			</ol>
		</section>

		<section class="project-section" aria-labelledby="kiwi-field-notes-title">
			<h2 id="kiwi-field-notes-title"><?php esc_html_e( 'Related Field Notes', 'two-bit-alchemy' ); ?></h2>
			<div class="related-exhibit-list">
				<article class="related-exhibit-card">
					<h3><a href="<?php echo esc_url( home_url( '/field-notes/' ) ); ?>"><?php esc_html_e( 'Field Notes', 'two-bit-alchemy' ); ?></a></h3>
					<p><?php esc_html_e( 'Durable Kiwi observations and reference notes should appear here once they have been created and approved.', 'two-bit-alchemy' ); ?></p>
				</article>
			</div>
		</section>

		<section class="project-section" aria-labelledby="kiwi-workshop-journal-title">
			<h2 id="kiwi-workshop-journal-title"><?php esc_html_e( 'Related Workshop Journal', 'two-bit-alchemy' ); ?></h2>
			<div class="related-exhibit-list">
				<article class="related-exhibit-card">
					<h3><a href="<?php echo esc_url( home_url( '/workshop-journal/' ) ); ?>"><?php esc_html_e( 'Workshop Journal', 'two-bit-alchemy' ); ?></a></h3>
					<p><?php esc_html_e( 'Kiwi process notes, build notes, experiments, repairs, or updates should appear here once they have been created and approved.', 'two-bit-alchemy' ); ?></p>
				</article>
			</div>
		</section>

		<section class="project-section" aria-labelledby="kiwi-gallery-title">
			<h2 id="kiwi-gallery-title"><?php esc_html_e( 'Gallery', 'two-bit-alchemy' ); ?></h2>
			<div class="exhibit-gallery">
				<figure class="exhibit-figure">
					<div class="exhibit-figure__placeholder" aria-hidden="true"></div>
					<figcaption>
						<strong><?php esc_html_e( 'Image placeholder:', 'two-bit-alchemy' ); ?></strong>
						<?php esc_html_e( 'No approved Kiwi images have been selected yet. Future images should function as evidence, process documentation, or useful visual context rather than decoration.', 'two-bit-alchemy' ); ?>
					</figcaption>
				</figure>
			</div>
		</section>

		<section class="project-section" aria-labelledby="kiwi-related-projects-title">
			<h2 id="kiwi-related-projects-title"><?php esc_html_e( 'Related Projects', 'two-bit-alchemy' ); ?></h2>
			<div class="related-exhibit-list">
				<article class="related-exhibit-card">
					<h3><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><?php esc_html_e( 'Projects', 'two-bit-alchemy' ); ?></a></h3>
					<p><?php esc_html_e( 'Browse the broader project archive. Kiwi-specific project relationships should be added only when the relationship is meaningful.', 'two-bit-alchemy' ); ?></p>
				</article>
				<article class="related-exhibit-card">
					<h3><a href="<?php echo esc_url( home_url( '/projects/photography/' ) ); ?>"><?php esc_html_e( 'Photography', 'two-bit-alchemy' ); ?></a></h3>
					<p><?php esc_html_e( 'Photography is an approved project area and may later support Kiwi if images become part of the project record.', 'two-bit-alchemy' ); ?></p>
				</article>
			</div>
		</section>

		<section class="project-section" aria-labelledby="kiwi-learning-title">
			<h2 id="kiwi-learning-title"><?php esc_html_e( 'What This Exhibit Teaches', 'two-bit-alchemy' ); ?></h2>
			<div class="educational-callout">
				<h3><?php esc_html_e( 'Exhibit standard in practice', 'two-bit-alchemy' ); ?></h3>
				<p><?php esc_html_e( 'A Two-Bit Alchemy exhibit should separate known facts from missing material. Kiwi currently teaches the shape of a complete exhibit while preserving space for the real project story.', 'two-bit-alchemy' ); ?></p>
			</div>
		</section>

		<section class="project-section project-exhibit__next" aria-labelledby="kiwi-next-title">
			<h2 id="kiwi-next-title"><?php esc_html_e( 'You May Also Enjoy', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'Until more Kiwi-specific relationships are approved, these paths offer natural ways to keep exploring Two-Bit Alchemy.', 'two-bit-alchemy' ); ?></p>
			<ul class="project-link-list">
				<li><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><?php esc_html_e( 'Projects', 'two-bit-alchemy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/field-notes/' ) ); ?>"><?php esc_html_e( 'Field Notes', 'two-bit-alchemy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/workshop-journal/' ) ); ?>"><?php esc_html_e( 'Workshop Journal', 'two-bit-alchemy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/cabinet/' ) ); ?>"><?php esc_html_e( 'Cabinet', 'two-bit-alchemy' ); ?></a></li>
			</ul>
		</section>
	</article>

<?php endwhile; ?>

<?php
get_template_part( 'template-parts/site-footer' );
