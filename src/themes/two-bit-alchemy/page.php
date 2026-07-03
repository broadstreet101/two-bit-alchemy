<?php
/**
 * Page template.
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );
?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<?php get_template_part( 'template-parts/entry-header' ); ?>
	<?php get_template_part( 'template-parts/entry-content' ); ?>
	<?php get_template_part( 'template-parts/entry-footer' ); ?>
<?php endwhile; ?>

<?php
get_template_part( 'template-parts/site-footer' );

