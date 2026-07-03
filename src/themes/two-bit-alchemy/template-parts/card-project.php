<?php
/**
 * Project card.
 *
 * @package Two_Bit_Alchemy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'project-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="project-card__image" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'two-bit-alchemy-card' ); ?>
		</a>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/entry-header' ); ?>
</article>

