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
		'description' => __( 'Fisher Aquatics should be treated as a project within Two-Bit Alchemy, not as the entire site identity.', 'two-bit-alchemy' ),
	),
	array(
		'title'       => __( 'Kiwi', 'two-bit-alchemy' ),
		'url'         => home_url( '/projects/kiwi/' ),
		'description' => __( 'This exhibit is the public home for Kiwi inside Two-Bit Alchemy. It is designed to preserve the project story, gather related notes and artifacts, and give visitors a clear path into the work once approved Kiwi-specific material has been created.', 'two-bit-alchemy' ),
	),
	array(
		'title'       => __( 'Photography', 'two-bit-alchemy' ),
		'url'         => home_url( '/projects/photography/' ),
		'description' => __( 'Support photography as both a standalone project and a documentation method across the whole site.', 'two-bit-alchemy' ),
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

	<div class="home-hero__welcome">
		<h2><?php esc_html_e( 'Welcome', 'two-bit-alchemy' ); ?></h2>
		<p><?php esc_html_e( "I'm glad you found your way here.", 'two-bit-alchemy' ); ?></p>
		<p><?php esc_html_e( "Two-Bit Alchemy isn't a portfolio, and it isn't really a blog.", 'two-bit-alchemy' ); ?></p>
		<p><?php esc_html_e( "It's a place where I keep the things that have taught me something, surprised me, or simply seemed worth paying attention to.", 'two-bit-alchemy' ); ?></p>
		<p><?php esc_html_e( 'Some of those things are projects. Others are photographs, field notes, experiments, stories, or people who left the world a little more interesting than they found it.', 'two-bit-alchemy' ); ?></p>
		<p><?php esc_html_e( 'Think of it less as a collection and more as a workshop with well-used shelves. Everything here earned its place because it taught me something, solved a problem, inspired a question, or reminded me to slow down and notice.', 'two-bit-alchemy' ); ?></p>
		<p><?php esc_html_e( "I don't expect every shelf to interest every visitor.", 'two-bit-alchemy' ); ?></p>
		<p><?php esc_html_e( 'But if something here sends you down a rabbit hole of your own, helps you solve a problem, or simply makes you stop and look a little closer, then this little corner of the internet has done exactly what I hoped it would.', 'two-bit-alchemy' ); ?></p>
		<p><strong><?php esc_html_e( "Come in. There's something I'd like to show you.", 'two-bit-alchemy' ); ?></strong></p>
	</div>

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

		<?php if ( 'field-notes' === $section['category_slug'] ) : ?>
			<div class="home-entry-list">
				<article class="home-entry" id="black-willow-propagation">
					<h3>
						<a href="<?php echo esc_url( home_url( '/field-notes/#black-willow-propagation' ) ); ?>">
							<?php esc_html_e( 'Black Willow Propagation', 'two-bit-alchemy' ); ?>
						</a>
					</h3>
					<p><?php esc_html_e( 'Black willow cuttings were originally obtained by mistake after ordering weeping willow.', 'two-bit-alchemy' ); ?></p>
					<p><?php esc_html_e( 'Water used to root black willow cuttings appears to dramatically improve rooting success in other plants, including lavender, based on practical observation rather than controlled experimentation.', 'two-bit-alchemy' ); ?></p>
				</article>
			</div>
			<?php continue; ?>
		<?php endif; ?>

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
