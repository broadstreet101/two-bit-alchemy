<?php
/**
 * Gallery preview placeholder.
 *
 * @package Two_Bit_Alchemy
 */
?>

<div class="gallery-preview" aria-label="<?php esc_attr_e( 'Gallery preview', 'two-bit-alchemy' ); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( 'two-bit-alchemy-wide' ); ?>
	<?php endif; ?>
</div>

