<?php
/**
 * Site footer and document close.
 *
 * @package Two_Bit_Alchemy
 */
?>
</main>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner">
		<p class="site-footer__title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</a>
		</p>

		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer navigation', 'two-bit-alchemy' ); ?>">
			<?php two_bit_alchemy_approved_navigation_list( 'footer-navigation__list' ); ?>
		</nav>

		<p class="site-footer__meta">
			&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
