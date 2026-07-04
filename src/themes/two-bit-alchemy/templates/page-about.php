<?php
/**
 * Template Name: About
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );
?>

<?php
while ( have_posts() ) :
	the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>
		<header class="entry-header about-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<p><?php esc_html_e( 'Come here for a minute. I want to show you something.', 'two-bit-alchemy' ); ?></p>
		</header>

		<section class="about-section" aria-labelledby="about-introduction-title">
			<h2 id="about-introduction-title"><?php esc_html_e( 'Introduction', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'Two-Bit Alchemy is a personal identity and website project centered on curiosity, observation, craft, and patient transformation.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'The site should feel personal, exploratory, grounded, and durable rather than corporate, sales-focused, or trend-driven.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="about-section" aria-labelledby="about-purpose-title">
			<h2 id="about-purpose-title"><?php esc_html_e( 'Why Two-Bit Alchemy Exists', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'Two-Bit Alchemy exists to collect, preserve, and share the things that reward curiosity.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'The site exists to document genuine curiosity, preserve discoveries, and encourage others to observe the world a little more closely.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'Its common thread is not a list of hobbies. Its common thread is learning enough about something to make something meaningful with it.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="about-section" aria-labelledby="about-curiosity-title">
			<h2 id="about-curiosity-title"><?php esc_html_e( 'A Life of Curiosity', 'two-bit-alchemy' ); ?></h2>
			<p class="placeholder-note"><strong><?php esc_html_e( 'Placeholder:', 'two-bit-alchemy' ); ?></strong> <?php esc_html_e( 'Final personal context for this section has not been approved yet. This section should describe Dada\'s lifelong curiosity without becoming resume-like or inventing facts.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="about-section" aria-labelledby="about-workshop-title">
			<h2 id="about-workshop-title"><?php esc_html_e( 'The Workshop', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'The site should feel like being invited into a thoughtful workshop rather than reading someone\'s private journal.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'It can be personal, reflective, and specific, but it should also give visitors something to examine, follow, learn from, or return to.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'The work should feel grounded in craft, science, memory, and close attention. Curiosity should lead the structure.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="about-section" aria-labelledby="about-find-title">
			<h2 id="about-find-title"><?php esc_html_e( "What You'll Find Here", 'two-bit-alchemy' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><?php esc_html_e( 'Projects', 'two-bit-alchemy' ); ?></a><?php esc_html_e( ' show bodies of work.', 'two-bit-alchemy' ); ?></li>
				<li><a href="<?php echo esc_url( home_url( '/field-notes/' ) ); ?>"><?php esc_html_e( 'Field Notes', 'two-bit-alchemy' ); ?></a><?php esc_html_e( ' preserve durable knowledge.', 'two-bit-alchemy' ); ?></li>
				<li><a href="<?php echo esc_url( home_url( '/workshop-journal/' ) ); ?>"><?php esc_html_e( 'Workshop Journal', 'two-bit-alchemy' ); ?></a><?php esc_html_e( ' shows process and current curiosity.', 'two-bit-alchemy' ); ?></li>
				<li><a href="<?php echo esc_url( home_url( '/cabinet/' ) ); ?>"><?php esc_html_e( 'The Cabinet', 'two-bit-alchemy' ); ?></a><?php esc_html_e( ' gathers objects, references, photographs, and artifacts.', 'two-bit-alchemy' ); ?></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'two-bit-alchemy' ); ?></a><?php esc_html_e( ' stays available without turning the site into a sales funnel.', 'two-bit-alchemy' ); ?></li>
			</ul>
		</section>
	</article>

<?php endwhile; ?>

<?php
get_template_part( 'template-parts/site-footer' );
