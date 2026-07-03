<?php
/**
 * Site header and document opening.
 *
 * @package Two_Bit_Alchemy
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/skip-link' ); ?>

<header class="site-header" role="banner">
	<div class="site-branding">
		<?php two_bit_alchemy_site_identity(); ?>
		<?php if ( get_bloginfo( 'description' ) ) : ?>
			<p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
		<?php endif; ?>
	</div>

	<?php get_template_part( 'template-parts/primary-navigation' ); ?>
</header>

<main id="primary" class="site-main">

