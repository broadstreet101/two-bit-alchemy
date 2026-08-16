<?php
/**
 * Cabinet exhibit registry and preview routes.
 *
 * @package Two_Bit_Alchemy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return repository-controlled Cabinet exhibits.
 *
 * Status is the source of truth for preview/publish behavior.
 */
function two_bit_alchemy_get_cabinet_exhibits() {
	return array(
		'a-sketch-that-was-never-meant-to-exist' => array(
			'title'         => __( 'A Sketch That Was Never Meant to Exist', 'two-bit-alchemy' ),
			'excerpt'       => __( 'An original Charlie Adlard sketch preserved as the first Cabinet exhibit, with rights and attribution review recorded before public launch.', 'two-bit-alchemy' ),
			'status'        => 'draft',
			'template'      => 'cabinet-exhibit-a-sketch-that-was-never-meant-to-exist.php',
			'rights_status' => __( 'Publication permission / copyright status: review before public launch.', 'two-bit-alchemy' ),
		),
	);
}

/**
 * Return a single Cabinet exhibit by slug.
 *
 * @param string $slug Exhibit slug.
 * @return array|null
 */
function two_bit_alchemy_get_cabinet_exhibit( $slug ) {
	$exhibits = two_bit_alchemy_get_cabinet_exhibits();

	return $exhibits[ $slug ] ?? null;
}

/**
 * Whether the current user may preview unpublished Cabinet exhibits.
 */
function two_bit_alchemy_can_preview_cabinet_exhibits() {
	return is_user_logged_in() && current_user_can( 'manage_options' );
}

/**
 * Whether an exhibit is publicly published.
 *
 * @param array $exhibit Exhibit data.
 */
function two_bit_alchemy_is_cabinet_exhibit_published( $exhibit ) {
	return isset( $exhibit['status'] ) && 'published' === $exhibit['status'];
}

/**
 * Whether the current visitor may view an exhibit.
 *
 * @param array $exhibit Exhibit data.
 */
function two_bit_alchemy_can_view_cabinet_exhibit( $exhibit ) {
	return two_bit_alchemy_is_cabinet_exhibit_published( $exhibit ) || two_bit_alchemy_can_preview_cabinet_exhibits();
}

/**
 * Return exhibits visible to the current visitor.
 */
function two_bit_alchemy_get_visible_cabinet_exhibits() {
	return array_filter(
		two_bit_alchemy_get_cabinet_exhibits(),
		'two_bit_alchemy_can_view_cabinet_exhibit'
	);
}

/**
 * Return the current request path relative to the site root.
 */
function two_bit_alchemy_get_request_path() {
	$request_uri  = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
	$request_path = trim( (string) wp_parse_url( $request_uri, PHP_URL_PATH ), '/' );
	$home_path    = trim( (string) wp_parse_url( home_url( '/' ), PHP_URL_PATH ), '/' );

	if ( $home_path && str_starts_with( $request_path, $home_path . '/' ) ) {
		$request_path = substr( $request_path, strlen( $home_path ) + 1 );
	}

	return $request_path;
}

/**
 * Render repository-controlled Cabinet exhibit pages.
 */
function two_bit_alchemy_render_cabinet_exhibit_route() {
	$request_path = two_bit_alchemy_get_request_path();
	$prefix       = 'cabinet/';

	if ( ! str_starts_with( $request_path, $prefix ) ) {
		return;
	}

	$slug    = substr( $request_path, strlen( $prefix ) );
	$exhibit = two_bit_alchemy_get_cabinet_exhibit( $slug );

	if ( ! $exhibit ) {
		return;
	}

	if ( ! two_bit_alchemy_can_view_cabinet_exhibit( $exhibit ) ) {
		global $wp_query;

		if ( $wp_query ) {
			$wp_query->set_404();
		}

		status_header( 404 );
		nocache_headers();
		include TWO_BIT_ALCHEMY_DIR . '/404.php';
		exit;
	}

	global $wp_query, $two_bit_alchemy_current_cabinet_exhibit;

	if ( $wp_query ) {
		$wp_query->is_404 = false;
	}

	$two_bit_alchemy_current_cabinet_exhibit = $exhibit;

	status_header( 200 );

	if ( ! two_bit_alchemy_is_cabinet_exhibit_published( $exhibit ) ) {
		nocache_headers();
	}

	include TWO_BIT_ALCHEMY_DIR . '/templates/' . $exhibit['template'];
	exit;
}
add_action( 'template_redirect', 'two_bit_alchemy_render_cabinet_exhibit_route', 0 );

/**
 * Prevent draft Cabinet previews from being indexed.
 */
function two_bit_alchemy_noindex_cabinet_preview() {
	global $two_bit_alchemy_current_cabinet_exhibit;

	if (
		empty( $two_bit_alchemy_current_cabinet_exhibit ) ||
		two_bit_alchemy_is_cabinet_exhibit_published( $two_bit_alchemy_current_cabinet_exhibit )
	) {
		return;
	}

	echo "\n" . '<meta name="robots" content="noindex,nofollow">' . "\n";
}
add_action( 'wp_head', 'two_bit_alchemy_noindex_cabinet_preview' );
