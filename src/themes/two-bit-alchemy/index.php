<?php
/**
 * Main fallback template.
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/card-entry' ); ?>
	<?php endwhile; ?>

	<?php get_template_part( 'template-parts/pagination' ); ?>
<?php else : ?>
	<p><?php esc_html_e( 'No content found.', 'two-bit-alchemy' ); ?></p>
<?php endif; ?>

<?php
get_template_part( 'template-parts/site-footer' );

