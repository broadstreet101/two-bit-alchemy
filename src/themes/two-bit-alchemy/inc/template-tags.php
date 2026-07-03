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

