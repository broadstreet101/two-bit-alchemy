<?php
/**
 * Reusable Cabinet exhibit template.
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );

global $two_bit_alchemy_current_cabinet_exhibit;

$exhibit     = $two_bit_alchemy_current_cabinet_exhibit;
$status_note = ! empty( $exhibit ) ? two_bit_alchemy_get_cabinet_exhibit_status_note( $exhibit ) : '';
?>

<article class="page-content project-exhibit cabinet-exhibit">
	<nav class="entry-meta" aria-label="<?php esc_attr_e( 'Cabinet context', 'two-bit-alchemy' ); ?>">
		<a href="<?php echo esc_url( home_url( '/cabinet/' ) ); ?>"><?php esc_html_e( 'Cabinet', 'two-bit-alchemy' ); ?></a>
	</nav>

	<header class="entry-header project-exhibit__header">
		<?php if ( ! empty( $exhibit ) ) : ?>
			<p class="catalog-label"><?php echo esc_html( two_bit_alchemy_get_cabinet_exhibit_label( $exhibit ) ); ?></p>
		<?php endif; ?>
		<p class="entry-meta"><?php esc_html_e( 'Cabinet Exhibit', 'two-bit-alchemy' ); ?></p>
		<?php if ( $status_note ) : ?>
			<p class="entry-meta"><?php echo esc_html( $status_note ); ?></p>
		<?php endif; ?>
		<h1 class="entry-title"><?php echo esc_html( $exhibit['title'] ?? __( 'Cabinet Exhibit', 'two-bit-alchemy' ) ); ?></h1>
	</header>

	<?php if ( ! empty( $exhibit['image'] ) ) : ?>
		<figure class="exhibit-figure">
			<img
				src="<?php echo esc_url( get_theme_file_uri( $exhibit['image']['src'] ) ); ?>"
				alt="<?php echo esc_attr( $exhibit['image']['alt'] ?? '' ); ?>"
				width="<?php echo esc_attr( $exhibit['image']['width'] ?? '' ); ?>"
				height="<?php echo esc_attr( $exhibit['image']['height'] ?? '' ); ?>"
				decoding="async"
				fetchpriority="high"
			/>
			<?php if ( ! empty( $exhibit['image']['caption'] ) ) : ?>
				<figcaption><?php echo esc_html( $exhibit['image']['caption'] ); ?></figcaption>
			<?php endif; ?>
		</figure>
	<?php elseif ( ! empty( $exhibit['image_status'] ) ) : ?>
		<p class="placeholder-note"><?php echo esc_html( $exhibit['image_status'] ); ?></p>
	<?php endif; ?>

	<?php if ( ! empty( $exhibit['metadata'] ) ) : ?>
		<section class="project-section" aria-labelledby="artifact-metadata-title">
			<h2 id="artifact-metadata-title"><?php esc_html_e( 'Artifact Metadata', 'two-bit-alchemy' ); ?></h2>
			<dl class="metadata-list">
				<?php foreach ( $exhibit['metadata'] as $term => $description ) : ?>
					<div>
						<dt><?php echo esc_html( $term ); ?></dt>
						<dd><?php echo esc_html( $description ); ?></dd>
					</div>
				<?php endforeach; ?>
			</dl>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $exhibit['sections'] ) ) : ?>
		<?php foreach ( $exhibit['sections'] as $index => $section ) : ?>
			<?php $section_id = 'cabinet-section-' . ( $index + 1 ); ?>
			<section class="project-section cabinet-exhibit__story" aria-labelledby="<?php echo esc_attr( $section_id ); ?>">
				<h2 id="<?php echo esc_attr( $section_id ); ?>"><?php echo esc_html( $section['heading'] ); ?></h2>

				<?php foreach ( $section['paragraphs'] as $paragraph ) : ?>
					<p><?php echo esc_html( $paragraph ); ?></p>
				<?php endforeach; ?>
			</section>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if ( ! empty( $exhibit['related'] ) ) : ?>
		<section class="project-section project-exhibit__next" aria-labelledby="artifact-related-title">
			<h2 id="artifact-related-title"><?php esc_html_e( 'Related Content', 'two-bit-alchemy' ); ?></h2>
			<div class="related-exhibit-list">
				<?php foreach ( $exhibit['related'] as $related ) : ?>
					<article class="related-exhibit-card">
						<h3>
							<?php if ( ! empty( $related['url'] ) ) : ?>
								<a href="<?php echo esc_url( $related['url'] ); ?>"><?php echo esc_html( $related['title'] ); ?></a>
							<?php else : ?>
								<?php echo esc_html( $related['title'] ); ?>
							<?php endif; ?>
						</h3>
						<p><?php echo esc_html( $related['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>
</article>

<?php
get_template_part( 'template-parts/site-footer' );
