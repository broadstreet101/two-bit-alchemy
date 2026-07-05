<?php
/**
 * Template Name: Field Notes
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
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<p><?php esc_html_e( 'Field Notes preserve evergreen knowledge, observations, references, and methods in a form that remains useful beyond the date it was written.', 'two-bit-alchemy' ); ?></p>
		</header>

		<article class="project-exhibit" id="black-willow-propagation" aria-labelledby="black-willow-propagation-title">
			<header class="project-exhibit__header">
				<h2 id="black-willow-propagation-title"><?php esc_html_e( 'Black Willow Propagation', 'two-bit-alchemy' ); ?></h2>
				<p><?php esc_html_e( 'A practical observation about black willow cuttings, rooting water, and the moment an old pattern finally made sense.', 'two-bit-alchemy' ); ?></p>
			</header>

			<section class="project-section" aria-labelledby="black-willow-observation-title">
				<h3 id="black-willow-observation-title"><?php esc_html_e( 'Observation', 'two-bit-alchemy' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'Black willow cuttings were originally obtained by mistake after ordering weeping willow.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'The trees have been grown for several years.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Experiments progressed naturally from growing seedlings, to rooting cuttings, to simple bonsai pruning.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Water used to root black willow cuttings appears to dramatically improve rooting success in other plants.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Lavender successfully rooted in the same water despite being an unexpected candidate.', 'two-bit-alchemy' ); ?></li>
				</ul>
			</section>

			<section class="project-section" aria-labelledby="black-willow-background-title">
				<h3 id="black-willow-background-title"><?php esc_html_e( 'Background', 'two-bit-alchemy' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'Intended plant: weeping willow.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Plant actually received: black willow.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Exact order date: uncertain.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Exact source/vendor: unknown.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Number of years grown: several years; exact count uncertain.', 'two-bit-alchemy' ); ?></li>
				</ul>
			</section>

			<section class="project-section" aria-labelledby="black-willow-what-happened-title">
				<h3 id="black-willow-what-happened-title"><?php esc_html_e( 'What Happened', 'two-bit-alchemy' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'Black willow cuttings were rooted in water.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'The same water was later used with other plant cuttings.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Other plants appeared to root more successfully in that water.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Lavender rooted successfully in the same water.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Lavender was an unexpected rooting candidate in this context.', 'two-bit-alchemy' ); ?></li>
				</ul>
			</section>

			<section class="project-section" aria-labelledby="black-willow-explanation-title">
				<h3 id="black-willow-explanation-title"><?php esc_html_e( 'Working Explanation', 'two-bit-alchemy' ); ?></h3>
				<ul>
					<li><?php esc_html_e( "Heidi O'Toole explained that black willow contains natural rooting compounds.", 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Heidi is the source of the practical insight connecting the observed rooting success to naturally occurring rooting compounds in black willow.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'This explanation created the "head-slapping" moment where years of observation finally made sense.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'This remains a working explanation based on practical observation.', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'No controlled experiment has been recorded yet.', 'two-bit-alchemy' ); ?></li>
				</ul>
			</section>

			<section class="project-section" aria-labelledby="black-willow-takeaway-title">
				<h3 id="black-willow-takeaway-title"><?php esc_html_e( 'Practical Takeaway', 'two-bit-alchemy' ); ?></h3>
				<p><?php esc_html_e( 'Water used for rooting black willow cuttings may be useful when attempting to root other plant cuttings.', 'two-bit-alchemy' ); ?></p>
				<p><?php esc_html_e( 'This should be treated as a practical technique to observe further, not a proven universal method.', 'two-bit-alchemy' ); ?></p>
				<p><?php esc_html_e( 'Future use should record plant species, timing, water age, cutting condition, and success rate.', 'two-bit-alchemy' ); ?></p>
			</section>

			<section class="project-section" aria-labelledby="black-willow-related-title">
				<h3 id="black-willow-related-title"><?php esc_html_e( 'Related People', 'two-bit-alchemy' ); ?></h3>
				<p><?php esc_html_e( "Heidi O'Toole - source of the practical insight about black willow and natural rooting compounds.", 'two-bit-alchemy' ); ?></p>
			</section>

			<section class="project-section" aria-labelledby="black-willow-future-title">
				<h3 id="black-willow-future-title"><?php esc_html_e( 'Future Questions', 'two-bit-alchemy' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'What was the exact date or year the mistaken black willow order arrived?', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'What vendor or source supplied the original cuttings?', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Which other plants rooted successfully in black willow water?', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'How long had the black willow cuttings been soaking before the water was reused?', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Does water age affect the observed rooting success?', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'Would a side-by-side comparison with plain water show a meaningful difference?', 'two-bit-alchemy' ); ?></li>
					<li><?php esc_html_e( 'What pruning notes or photographs already exist?', 'two-bit-alchemy' ); ?></li>
				</ul>
			</section>
		</article>
	</article>

<?php endwhile; ?>

<?php
get_template_part( 'template-parts/site-footer' );
