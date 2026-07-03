<?php
/**
 * Primary navigation.
 *
 * @package Two_Bit_Alchemy
 */

if ( ! has_nav_menu( 'primary' ) ) {
	return;
}
?>

<nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'two-bit-alchemy' ); ?>">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'depth'          => 2,
			'fallback_cb'    => false,
		)
	);
	?>
</nav>

