<?php
/**
 * Cabinet exhibit routes.
 *
 * @package Two_Bit_Alchemy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render repository-controlled Cabinet exhibit pages.
 */
function two_bit_alchemy_render_cabinet_exhibit_route() {
	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	$request_path = trim( (string) wp_parse_url( $request_uri, PHP_URL_PATH ), '/' );
	$home_path = trim( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ), '/' );

	if ( $home_path && str_starts_with( $request_path, $home_path . '/' ) ) {
		$request_path = substr( $request_path, strlen( $home_path ) + 1 );
	}

	if ( 'cabinet/a-sketch-that-was-never-meant-to-exist' !== $request_path ) {
		return;
	}

	global $wp_query;

	if ( $wp_query ) {
		$wp_query->is_404 = false;
	}

	status_header( 200 );
	include TWO_BIT_ALCHEMY_DIR . '/templates/cabinet-exhibit-a-sketch-that-was-never-meant-to-exist.php';
	exit;
}
add_action( 'template_redirect', 'two_bit_alchemy_render_cabinet_exhibit_route', 0 );
