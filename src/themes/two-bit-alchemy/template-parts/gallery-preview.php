<?php
/**
 * Gallery preview.
 *
 * @package Two_Bit_Alchemy
 */
if ( ! has_post_thumbnail() ) {
	return;
}
?>

<div class="gallery-preview" aria-label="<?php esc_attr_e( 'Gallery preview', 'two-bit-alchemy' ); ?>">
	<?php the_post_thumbnail( 'two-bit-alchemy-wide' ); ?>
</div>
