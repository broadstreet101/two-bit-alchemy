<?php
/**
 * Pagination.
 *
 * @package Two_Bit_Alchemy
 */

the_posts_pagination(
	array(
		'mid_size'           => 1,
		'prev_text'          => esc_html__( 'Previous', 'two-bit-alchemy' ),
		'next_text'          => esc_html__( 'Next', 'two-bit-alchemy' ),
		'screen_reader_text' => esc_html__( 'Posts navigation', 'two-bit-alchemy' ),
	)
);

