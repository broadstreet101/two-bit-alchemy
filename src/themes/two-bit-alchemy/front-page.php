<?php
/**
 * Front page template.
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/entry-header' ); ?>
		<?php get_template_part( 'template-parts/entry-content' ); ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php
get_template_part( 'template-parts/site-footer' );

