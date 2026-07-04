<?php
/**
 * Primary navigation.
 *
 * @package Two_Bit_Alchemy
 */
?>

<nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'two-bit-alchemy' ); ?>">
	<?php if ( has_nav_menu( 'primary' ) ) : ?>
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
	<?php else : ?>
		<?php two_bit_alchemy_approved_navigation_list(); ?>
	<?php endif; ?>
</nav>
