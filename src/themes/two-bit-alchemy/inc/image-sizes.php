<?php
/**
 * Image size registration.
 *
 * @package Two_Bit_Alchemy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register initial image sizes used by cards and archives.
 */
function two_bit_alchemy_register_image_sizes() {
	add_image_size( 'two-bit-alchemy-card', 640, 426, true );
	add_image_size( 'two-bit-alchemy-wide', 1280, 720, false );
}
add_action( 'after_setup_theme', 'two_bit_alchemy_register_image_sizes' );

