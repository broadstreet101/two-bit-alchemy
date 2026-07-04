<?php
/**
 * Template helper functions.
 *
 * @package Two_Bit_Alchemy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print the site title when no custom logo is set.
 */
function two_bit_alchemy_site_identity() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}

	if ( is_front_page() && is_home() ) {
		printf(
			'<h1 class="site-title"><a href="%1$s" rel="home">%2$s</a></h1>',
			esc_url( home_url( '/' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
		return;
	}

	printf(
		'<p class="site-title"><a href="%1$s" rel="home">%2$s</a></p>',
		esc_url( home_url( '/' ) ),
		esc_html( get_bloginfo( 'name' ) )
	);
}

/**
 * Return the approved launch navigation routes.
 *
 * These routes provide a quiet fallback before a WordPress menu is assigned.
 */
function two_bit_alchemy_get_approved_navigation_items() {
	return array(
		array(
			'label' => __( 'Home', 'two-bit-alchemy' ),
			'url'   => home_url( '/' ),
		),
		array(
			'label' => __( 'Projects', 'two-bit-alchemy' ),
			'url'   => home_url( '/projects/' ),
		),
		array(
			'label' => __( 'Field Notes', 'two-bit-alchemy' ),
			'url'   => home_url( '/field-notes/' ),
		),
		array(
			'label' => __( 'Workshop Journal', 'two-bit-alchemy' ),
			'url'   => home_url( '/workshop-journal/' ),
		),
		array(
			'label' => __( 'Cabinet', 'two-bit-alchemy' ),
			'url'   => home_url( '/cabinet/' ),
		),
		array(
			'label' => __( 'About', 'two-bit-alchemy' ),
			'url'   => home_url( '/about/' ),
		),
		array(
			'label' => __( 'Contact', 'two-bit-alchemy' ),
			'url'   => home_url( '/contact/' ),
		),
	);
}

/**
 * Print the approved navigation fallback list.
 *
 * @param string $class_name List class name.
 */
function two_bit_alchemy_approved_navigation_list( $class_name = 'menu' ) {
	?>
	<ul class="<?php echo esc_attr( $class_name ); ?>">
		<?php foreach ( two_bit_alchemy_get_approved_navigation_items() as $item ) : ?>
			<li>
				<a href="<?php echo esc_url( $item['url'] ); ?>">
					<?php echo esc_html( $item['label'] ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
}

/**
 * Print post metadata for posts.
 */
function two_bit_alchemy_post_meta() {
	if ( 'post' !== get_post_type() ) {
		return;
	}

	printf(
		'<p class="entry-meta"><time datetime="%1$s">%2$s</time></p>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);
}
