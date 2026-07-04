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
			<p><?php esc_html_e( 'Kiwi is an approved Two-Bit Alchemy project page under Projects. This initial exhibit establishes the project structure while final project-specific content is gathered.', 'two-bit-alchemy' ); ?></p>
		</header>

		<section class="project-section" aria-labelledby="kiwi-introduction-title">
			<h2 id="kiwi-introduction-title"><?php esc_html_e( 'Project Introduction', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'Approved introductory content for Kiwi has not been created yet. This section should explain what Kiwi is without inventing project facts.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-purpose-title">
			<h2 id="kiwi-purpose-title"><?php esc_html_e( 'Purpose', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'Approved purpose content for Kiwi has not been created yet. This section should explain why the project exists and what question or need it serves.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-background-title">
			<h2 id="kiwi-background-title"><?php esc_html_e( 'Background', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'Approved background content for Kiwi has not been created yet. This section should preserve the project origin, context, constraints, and history once they are available.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-timeline-title">
			<h2 id="kiwi-timeline-title"><?php esc_html_e( 'Timeline', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'No approved Kiwi timeline entries exist yet. Future entries should preserve real chronology rather than retroactive polish.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-field-notes-title">
			<h2 id="kiwi-field-notes-title"><?php esc_html_e( 'Related Field Notes', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'No Kiwi-related Field Notes have been approved yet. Add links here when durable observations or reference notes are created.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-workshop-journal-title">
			<h2 id="kiwi-workshop-journal-title"><?php esc_html_e( 'Related Workshop Journal', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'No Kiwi-related Workshop Journal entries have been approved yet. Add links here when process notes, build notes, experiments, or updates are created.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-gallery-title">
			<h2 id="kiwi-gallery-title"><?php esc_html_e( 'Gallery', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'No approved Kiwi images have been selected yet. Future images should function as evidence, process documentation, or useful visual context rather than decoration.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="kiwi-related-projects-title">
			<h2 id="kiwi-related-projects-title"><?php esc_html_e( 'Related Projects', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'No Kiwi-specific related projects have been approved yet. Related project links should be added only when the relationship is meaningful.', 'two-bit-alchemy' ); ?></p>
			<p>
				<a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>">
					<?php esc_html_e( 'Browse all projects', 'two-bit-alchemy' ); ?>
				</a>
			</p>
		</section>

		<section class="project-section project-exhibit__next" aria-labelledby="kiwi-next-title">
			<h2 id="kiwi-next-title"><?php esc_html_e( 'You May Also Enjoy', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'Until Kiwi-specific relationships are approved, these paths offer natural ways to keep exploring Two-Bit Alchemy.', 'two-bit-alchemy' ); ?></p>
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
