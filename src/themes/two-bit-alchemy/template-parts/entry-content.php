<?php
/**
 * Entry content.
 *
 * @package Two_Bit_Alchemy
 */
?>

<div class="entry-content">
	<?php
	the_content();

	wp_link_pages(
		array(
			'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'two-bit-alchemy' ) . '">',
			'after'  => '</nav>',
		)
	);
	?>
</div>

