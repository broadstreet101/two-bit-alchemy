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
 * Get a deterministic version for a local theme asset.
 *
 * @param string $relative_path Theme-relative asset path.
 * @return string Asset version.
 */
function two_bit_alchemy_get_asset_version( $relative_path ) {
	$asset_path = TWO_BIT_ALCHEMY_DIR . $relative_path;

	if ( file_exists( $asset_path ) ) {
		return (string) filemtime( $asset_path );
	}

	return TWO_BIT_ALCHEMY_VERSION;
}

/**
 * Enqueue theme styles.
 */
function two_bit_alchemy_enqueue_assets() {
	wp_enqueue_style(
		'two-bit-alchemy-main',
		TWO_BIT_ALCHEMY_URI . '/assets/css/main.css',
		array(),
		two_bit_alchemy_get_asset_version( '/assets/css/main.css' )
	);

	wp_enqueue_style(
		'two-bit-alchemy-print',
		TWO_BIT_ALCHEMY_URI . '/assets/css/print.css',
		array( 'two-bit-alchemy-main' ),
		two_bit_alchemy_get_asset_version( '/assets/css/print.css' ),
		'print'
	);
}
add_action( 'wp_enqueue_scripts', 'two_bit_alchemy_enqueue_assets' );
