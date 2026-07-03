<?php
/**
 * Archive template.
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );
?>

<header class="archive-header">
	<?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
	<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
</header>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/card-entry' ); ?>
	<?php endwhile; ?>

	<?php get_template_part( 'template-parts/pagination' ); ?>
<?php else : ?>
	<p><?php esc_html_e( 'No entries found.', 'two-bit-alchemy' ); ?></p>
<?php endif; ?>

<?php
get_template_part( 'template-parts/site-footer' );

