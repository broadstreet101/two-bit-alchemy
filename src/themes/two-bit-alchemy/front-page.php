<?php
/**
 * Front page template.
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );

$featured_projects = array(
	array(
		'title'       => __( 'Fisher Aquatics', 'two-bit-alchemy' ),
		'url'         => home_url( '/projects/fisher-aquatics/' ),
		'description' => __( 'A legacy aquatics project becoming part of the larger Two-Bit Alchemy archive.', 'two-bit-alchemy' ),
	),
	array(
		'title'       => __( 'Kiwi', 'two-bit-alchemy' ),
		'url'         => home_url( '/projects/kiwi/' ),
		'description' => __( 'A project space for careful making, practical experiments, and what gets learned along the way.', 'two-bit-alchemy' ),
	),
	array(
		'title'       => __( 'Photography', 'two-bit-alchemy' ),
		'url'         => home_url( '/projects/photography/' ),
		'description' => __( 'Selected photographs and visual observations that support the record of curiosity.', 'two-bit-alchemy' ),
	),
);

$latest_sections = array(
	array(
		'id'            => 'latest-field-notes',
		'title'         => __( 'Latest Field Notes', 'two-bit-alchemy' ),
		'category_slug' => 'field-notes',
		'empty'         => __( 'No Field Notes have been recorded yet. The notebook is ready for the first durable observation.', 'two-bit-alchemy' ),
	),
	array(
		'id'            => 'latest-workshop-journal',
		'title'         => __( 'Latest Workshop Journal', 'two-bit-alchemy' ),
		'category_slug' => 'workshop-journal',
		'empty'         => __( 'No Workshop Journal entries have been posted yet. The bench is ready for the first build note.', 'two-bit-alchemy' ),
	),
);
?>

<section class="home-hero" aria-labelledby="home-hero-title">
	<h1 id="home-hero-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
	<p><?php esc_html_e( 'Two-Bit Alchemy celebrates the joy of learning by making, preserving discoveries, and noticing the world more closely.', 'two-bit-alchemy' ); ?></p>

	<ul class="home-hero__words" aria-label="<?php esc_attr_e( 'Guiding words', 'two-bit-alchemy' ); ?>">
		<li><?php esc_html_e( 'Observe.', 'two-bit-alchemy' ); ?></li>
		<li><?php esc_html_e( 'Record.', 'two-bit-alchemy' ); ?></li>
		<li><?php esc_html_e( 'Understand.', 'two-bit-alchemy' ); ?></li>
		<li><?php esc_html_e( 'Create.', 'two-bit-alchemy' ); ?></li>
	</ul>
</section>

<section class="home-featured-projects" aria-labelledby="home-featured-projects-title">
	<h2 id="home-featured-projects-title"><?php esc_html_e( 'Featured Projects', 'two-bit-alchemy' ); ?></h2>

	<div class="home-card-list">
		<?php foreach ( $featured_projects as $project ) : ?>
			<article class="home-card">
				<h3>
					<a href="<?php echo esc_url( $project['url'] ); ?>">
						<?php echo esc_html( $project['title'] ); ?>
					</a>
				</h3>
				<p><?php echo esc_html( $project['description'] ); ?></p>
			</article>
		<?php endforeach; ?>
	</div>
</section>

<?php foreach ( $latest_sections as $section ) : ?>
	<section class="home-latest" aria-labelledby="<?php echo esc_attr( $section['id'] ); ?>-title">
		<h2 id="<?php echo esc_attr( $section['id'] ); ?>-title"><?php echo esc_html( $section['title'] ); ?></h2>

		<?php
		$category     = get_category_by_slug( $section['category_slug'] );
		$latest_query = null;

		if ( $category ) {
			$latest_query = new WP_Query(
				array(
					'cat'                 => $category->term_id,
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'posts_per_page'      => 3,
				)
			);
		}

		if ( $latest_query && $latest_query->have_posts() ) :
			?>
			<div class="home-entry-list">
				<?php
				while ( $latest_query->have_posts() ) :
					$latest_query->the_post();
					?>
					<article <?php post_class( 'home-entry' ); ?>>
						<h3>
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<?php echo esc_html( get_the_title() ); ?>
							</a>
						</h3>
						<p class="entry-meta">
							<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
								<?php echo esc_html( get_the_date() ); ?>
							</time>
						</p>
						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p><?php echo esc_html( $section['empty'] ); ?></p>
		<?php endif; ?>
	</section>
<?php endforeach; ?>

<section class="home-cabinet" aria-labelledby="home-cabinet-title">
	<h2 id="home-cabinet-title"><?php esc_html_e( 'Explore the Cabinet', 'two-bit-alchemy' ); ?></h2>
	<p><?php esc_html_e( 'A growing place for artifacts, tools, references, photographs, and other useful traces of curiosity.', 'two-bit-alchemy' ); ?></p>
	<p>
		<a href="<?php echo esc_url( home_url( '/cabinet/' ) ); ?>">
			<?php esc_html_e( 'Visit the Cabinet', 'two-bit-alchemy' ); ?>
		</a>
	</p>
</section>

<section class="home-reflection" aria-labelledby="home-reflection-title">
	<h2 id="home-reflection-title"><?php esc_html_e( 'Reflection', 'two-bit-alchemy' ); ?></h2>
	<p><?php esc_html_e( 'The useful discovery is often the one that teaches you to look again.', 'two-bit-alchemy' ); ?></p>
</section>

<?php
get_template_part( 'template-parts/site-footer' );
