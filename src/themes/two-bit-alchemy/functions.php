<?php
/**
 * Two-Bit Alchemy theme bootstrap.
 *
 * @package Two_Bit_Alchemy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TWO_BIT_ALCHEMY_VERSION', '0.1.0' );
define( 'TWO_BIT_ALCHEMY_DIR', get_template_directory() );
define( 'TWO_BIT_ALCHEMY_URI', get_template_directory_uri() );

require_once TWO_BIT_ALCHEMY_DIR . '/inc/setup.php';
require_once TWO_BIT_ALCHEMY_DIR . '/inc/enqueue.php';
require_once TWO_BIT_ALCHEMY_DIR . '/inc/template-tags.php';
require_once TWO_BIT_ALCHEMY_DIR . '/inc/image-sizes.php';

