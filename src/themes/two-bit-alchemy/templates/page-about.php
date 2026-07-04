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

		<section class="about-section" aria-labelledby="about-opening-title">
			<h2 id="about-opening-title"><?php esc_html_e( 'Opening The Door', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'Two-Bit Alchemy is a place for the things that reward curiosity: projects, notes, photographs, tools, questions, and the small discoveries that become worth keeping.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'This page will eventually include more specific personal context. For now, it opens the workshop without turning the site into a resume.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="about-section" aria-labelledby="about-purpose-title">
			<h2 id="about-purpose-title"><?php esc_html_e( 'Why Two-Bit Alchemy Exists', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'The common thread here is not having a lot of hobbies. It is learning enough about something to make something meaningful with it.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'The site exists to observe, record, understand, and create: to keep track of what was noticed, what was tried, what changed, and what might be useful later.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="about-section" aria-labelledby="about-workshop-title">
			<h2 id="about-workshop-title"><?php esc_html_e( 'A Workshop With Many Tools', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'Some days the tool is a camera. Some days it is an aquarium, a notebook, a bit of code, a soldering iron, a reference book, or a half-finished experiment on the bench.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'The tools change. The habit stays the same: look closely, make carefully, learn honestly, and preserve the thread so it can be followed again.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="about-section" aria-labelledby="about-find-title">
			<h2 id="about-find-title"><?php esc_html_e( 'What You Will Find Here', 'two-bit-alchemy' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><?php esc_html_e( 'Projects', 'two-bit-alchemy' ); ?></a><?php esc_html_e( ' that gather longer-running work, including Fisher Aquatics, Kiwi, and Photography.', 'two-bit-alchemy' ); ?></li>
				<li><a href="<?php echo esc_url( home_url( '/field-notes/' ) ); ?>"><?php esc_html_e( 'Field Notes', 'two-bit-alchemy' ); ?></a><?php esc_html_e( ' for observations and reference material that should stay useful beyond the day they were written.', 'two-bit-alchemy' ); ?></li>
				<li><a href="<?php echo esc_url( home_url( '/workshop-journal/' ) ); ?>"><?php esc_html_e( 'Workshop Journal', 'two-bit-alchemy' ); ?></a><?php esc_html_e( ' entries for process, experiments, repairs, failures, and lessons from the bench.', 'two-bit-alchemy' ); ?></li>
				<li><a href="<?php echo esc_url( home_url( '/cabinet/' ) ); ?>"><?php esc_html_e( 'The Cabinet', 'two-bit-alchemy' ); ?></a><?php esc_html_e( ' for objects, references, photographs, tools, and artifacts that help explain the work.', 'two-bit-alchemy' ); ?></li>
			</ul>
		</section>

		<section class="about-section" aria-labelledby="about-invitation-title">
			<h2 id="about-invitation-title"><?php esc_html_e( 'A Short Invitation', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'If something here makes you pause, follow the thread. The best discoveries often begin as a small reason to look again.', 'two-bit-alchemy' ); ?></p>
		</section>
	</article>

<?php endwhile; ?>

<?php
get_template_part( 'template-parts/site-footer' );
