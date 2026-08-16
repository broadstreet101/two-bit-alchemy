<?php
/**
 * Template Name: Cabinet
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
			<p><?php esc_html_e( 'Cabinet gathers the physical, visual, and reference material that supports curiosity.', 'two-bit-alchemy' ); ?></p>
		</header>

		<section class="project-section" aria-labelledby="cabinet-purpose-title">
			<h2 id="cabinet-purpose-title"><?php esc_html_e( 'Purpose', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'Collections, tools, books, specimens, photographs, and related notes belong here.', 'two-bit-alchemy' ); ?></p>
			<p><?php esc_html_e( 'The Cabinet is a curated place for objects, references, photographs, and artifacts that help explain the projects, observations, and stories gathered across Two-Bit Alchemy.', 'two-bit-alchemy' ); ?></p>
		</section>

		<section class="project-section" aria-labelledby="cabinet-launch-title">
			<h2 id="cabinet-launch-title"><?php esc_html_e( 'Launch Status', 'two-bit-alchemy' ); ?></h2>
			<p><?php esc_html_e( 'Individual Cabinet artifacts will be added after their stories, photographs, context, privacy, and publication readiness have been reviewed.', 'two-bit-alchemy' ); ?></p>
		</section>

		<?php $cabinet_exhibits = two_bit_alchemy_get_visible_cabinet_exhibits(); ?>
		<?php if ( $cabinet_exhibits ) : ?>
			<section class="project-section" aria-labelledby="cabinet-exhibits-title">
				<h2 id="cabinet-exhibits-title"><?php esc_html_e( 'Cabinet Exhibits', 'two-bit-alchemy' ); ?></h2>
				<div class="related-exhibit-list">
					<?php foreach ( $cabinet_exhibits as $slug => $exhibit ) : ?>
						<?php $status_note = two_bit_alchemy_get_cabinet_exhibit_status_note( $exhibit ); ?>
						<article class="related-exhibit-card related-exhibit-card--catalog">
							<p class="catalog-label"><?php echo esc_html( two_bit_alchemy_get_cabinet_exhibit_label( $exhibit ) ); ?></p>
							<h3>
								<a href="<?php echo esc_url( home_url( '/cabinet/' . $slug . '/' ) ); ?>">
									<?php echo esc_html( $exhibit['title'] ); ?>
								</a>
							</h3>
							<?php if ( $status_note ) : ?>
								<p class="entry-meta"><?php echo esc_html( $status_note ); ?></p>
							<?php endif; ?>
							<p><?php echo esc_html( $exhibit['excerpt'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</section>
		<?php endif; ?>
	</article>

<?php endwhile; ?>

<?php
get_template_part( 'template-parts/site-footer' );
