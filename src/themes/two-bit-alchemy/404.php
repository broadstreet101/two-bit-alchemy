<?php
/**
 * Not found template.
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );
?>

<article class="not-found">
	<header class="entry-header">
		<h1><?php esc_html_e( 'Page not found', 'two-bit-alchemy' ); ?></h1>
	</header>
	<div class="entry-content">
		<p><?php esc_html_e( 'The requested page could not be found.', 'two-bit-alchemy' ); ?></p>
	</div>
</article>

<?php
get_template_part( 'template-parts/site-footer' );

