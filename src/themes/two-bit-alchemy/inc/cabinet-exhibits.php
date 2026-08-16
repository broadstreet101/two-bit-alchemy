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
		'1981-ford-escort-model' => array(
			'title'         => __( '1981 Ford Escort Model', 'two-bit-alchemy' ),
			'excerpt'       => __( 'A white 1981 Ford Escort model in a display case, connected to a real car, an accident, friendship, and the shelf where it now supports another artifact.', 'two-bit-alchemy' ),
			'status'        => 'draft',
			'role'          => 'publication_candidate',
			'number'        => '001',
			'template'      => 'cabinet-exhibit.php',
			'rights_status' => __( 'Draft only. Image, privacy, caption, alt text, and final publication approval are still required.', 'two-bit-alchemy' ),
			'image_status'  => __( 'Photographs still needed. No source image or web derivative is available in the repository yet.', 'two-bit-alchemy' ),
			'metadata'      => array(
				__( 'Artifact type', 'two-bit-alchemy' )      => __( 'Model / display object', 'two-bit-alchemy' ),
				__( 'Object', 'two-bit-alchemy' )             => __( 'White 1981 Ford Escort model in a display case', 'two-bit-alchemy' ),
				__( 'Related real object', 'two-bit-alchemy' ) => __( "Dada's white 1981 Ford Escort", 'two-bit-alchemy' ),
				__( 'Given by', 'two-bit-alchemy' )           => __( 'Jon', 'two-bit-alchemy' ),
				__( 'Current role', 'two-bit-alchemy' )       => __( 'Display pedestal for the signed Tori Amos Camel cigarette pack', 'two-bit-alchemy' ),
				__( 'Publication status', 'two-bit-alchemy' ) => __( 'Draft only', 'two-bit-alchemy' ),
			),
			'sections'      => array(
				array(
					'heading'    => __( 'Artifact Description', 'two-bit-alchemy' ),
					'paragraphs' => array(
						__( 'This is a white 1981 Ford Escort model in a display case.', 'two-bit-alchemy' ),
						__( 'It matters because it is not just a small version of a car. It is a small version of a car Dada actually owned: the same year, make, model, and color.', 'two-bit-alchemy' ),
						__( "That real car was totaled in an accident where Dada's face went through the windshield.", 'two-bit-alchemy' ),
					),
				),
				array(
					'heading'    => __( 'Provenance / Context', 'two-bit-alchemy' ),
					'paragraphs' => array(
						__( 'The model was given to Dada by Jon.', 'two-bit-alchemy' ),
						__( "Jon was one of Dada's best friends. He was also close with James, and he had a knack for finding oddly specific niche items.", 'two-bit-alchemy' ),
						__( 'The exact date Jon gave Dada the model has not been captured yet.', 'two-bit-alchemy' ),
					),
				),
				array(
					'heading'    => __( 'Story Draft', 'two-bit-alchemy' ),
					'paragraphs' => array(
						__( 'At first glance, this is a white 1981 Ford Escort model in a display case.', 'two-bit-alchemy' ),
						__( 'It is also a memory of the real car.', 'two-bit-alchemy' ),
						__( "Dada owned the same year, make, model, and color. That car was totaled in an accident near the hospital where he worked. In the accident, his face went through the windshield.", 'two-bit-alchemy' ),
						__( 'A plastic surgeon from a larger city happened to be available and repaired the injuries.', 'two-bit-alchemy' ),
						__( "The model came later from Jon, one of Dada's best friends. Jon was also close with James, and he had a particular gift for finding strangely specific things that made sense only if you knew the person receiving them.", 'two-bit-alchemy' ),
						__( 'This was one of those things.', 'two-bit-alchemy' ),
						__( 'The model has traveled with Dada for years. It now has another life on the shelf: it serves as the display pedestal for the signed Tori Amos Camel cigarette pack.', 'two-bit-alchemy' ),
						__( "That connection matters too. The model links the car, the accident, survival, Jon, James, the Tori Amos artifact, and a later friendship between Jon's daughter and Juliet, who became close despite living in different states.", 'two-bit-alchemy' ),
						__( 'The story is not complete yet, but the object has clearly earned a shelf.', 'two-bit-alchemy' ),
					),
				),
				array(
					'heading'    => __( 'Unresolved Facts', 'two-bit-alchemy' ),
					'paragraphs' => array(
						__( "The exact accident date, hospital, larger city, surgeon's name, date Jon gave Dada the model, public naming choices, model manufacturer, scale, and current display location still need review.", 'two-bit-alchemy' ),
					),
				),
			),
			'related'       => array(
				array(
					'title' => __( 'Tori Amos Camel cigarette pack', 'two-bit-alchemy' ),
					'text'  => __( 'The model now serves as the display pedestal for the signed Tori Amos Camel cigarette pack. This relationship should become a cross-link when the Tori artifact draft is ready.', 'two-bit-alchemy' ),
					'url'   => '',
				),
				array(
					'title' => __( 'Return to the Cabinet', 'two-bit-alchemy' ),
					'text'  => __( 'The Cabinet gathers objects, references, photographs, and artifacts that help explain the projects, observations, and stories across Two-Bit Alchemy.', 'two-bit-alchemy' ),
					'url'   => home_url( '/cabinet/' ),
				),
			),
		),
		'a-sketch-that-was-never-meant-to-exist' => array(
			'title'         => __( 'A Sketch That Was Never Meant to Exist', 'two-bit-alchemy' ),
			'excerpt'       => __( 'A preserved private prototype Cabinet exhibit used to test the exhibit workflow, preview routing, rights notes, and draft protection.', 'two-bit-alchemy' ),
			'status'        => 'draft',
			'role'          => 'private_prototype',
			'number'        => '',
			'template'      => 'cabinet-exhibit-a-sketch-that-was-never-meant-to-exist.php',
			'rights_status' => __( 'Private/internal prototype. Not queued for public publication.', 'two-bit-alchemy' ),
		),
	);
}

/**
 * Return the display label for a Cabinet exhibit.
 *
 * @param array $exhibit Exhibit data.
 */
function two_bit_alchemy_get_cabinet_exhibit_label( $exhibit ) {
	if ( isset( $exhibit['role'] ) && 'private_prototype' === $exhibit['role'] ) {
		return __( 'Private Prototype', 'two-bit-alchemy' );
	}

	if ( ! empty( $exhibit['number'] ) ) {
		return sprintf(
			/* translators: %s: Cabinet exhibit number. */
			__( 'Cabinet No. %s', 'two-bit-alchemy' ),
			$exhibit['number']
		);
	}

	return __( 'Cabinet Exhibit', 'two-bit-alchemy' );
}

/**
 * Return the preview status note for a Cabinet exhibit.
 *
 * @param array $exhibit Exhibit data.
 */
function two_bit_alchemy_get_cabinet_exhibit_status_note( $exhibit ) {
	if ( isset( $exhibit['role'] ) && 'private_prototype' === $exhibit['role'] ) {
		return __( 'Private prototype. Not queued for public publication.', 'two-bit-alchemy' );
	}

	if ( ! two_bit_alchemy_is_cabinet_exhibit_published( $exhibit ) ) {
		return __( 'Preview only. Not publicly published.', 'two-bit-alchemy' );
	}

	return '';
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
