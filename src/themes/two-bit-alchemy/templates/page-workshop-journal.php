<?php
/**
 * Template Name: Workshop Journal
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
		<?php
		get_template_part( 'template-parts/entry-header' );
		get_template_part( 'template-parts/entry-content' );
		get_template_part( 'template-parts/entry-footer' );
		?>
	</article>

<?php endwhile; ?>

<?php
get_template_part( 'template-parts/site-footer' );
