<?php
/**
 * Entry footer.
 *
 * @package Two_Bit_Alchemy
 */

$categories = get_the_category_list( esc_html__( ', ', 'two-bit-alchemy' ) );
$tags       = get_the_tag_list( '', esc_html__( ', ', 'two-bit-alchemy' ) );

if ( ! $categories && ! $tags ) {
	return;
}
?>

<footer class="entry-footer">
	<?php if ( $categories ) : ?>
		<p class="entry-taxonomy"><?php echo wp_kses_post( $categories ); ?></p>
	<?php endif; ?>

	<?php if ( $tags ) : ?>
		<p class="entry-taxonomy"><?php echo wp_kses_post( $tags ); ?></p>
	<?php endif; ?>
</footer>

