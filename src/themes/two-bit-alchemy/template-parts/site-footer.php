<?php
/**
 * Site footer and document close.
 *
 * @package Two_Bit_Alchemy
 */
?>
</main>

<footer class="site-footer" role="contentinfo">
	<p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</a>
	</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
