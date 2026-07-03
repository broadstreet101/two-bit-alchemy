<?php
/**
 * Asset loading.
 *
 * @package Two_Bit_Alchemy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue theme styles.
 */
function two_bit_alchemy_enqueue_assets() {
	wp_enqueue_style(
		'two-bit-alchemy-main',
		TWO_BIT_ALCHEMY_URI . '/assets/css/main.css',
		array(),
		TWO_BIT_ALCHEMY_VERSION
	);

	wp_enqueue_style(
		'two-bit-alchemy-print',
		TWO_BIT_ALCHEMY_URI . '/assets/css/print.css',
		array( 'two-bit-alchemy-main' ),
		TWO_BIT_ALCHEMY_VERSION,
		'print'
	);
}
add_action( 'wp_enqueue_scripts', 'two_bit_alchemy_enqueue_assets' );
