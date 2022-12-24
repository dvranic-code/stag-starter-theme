<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

	<footer id="colophon" class="site-footer">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer',
				'menu_id'        => 'footer-nav',
			)
		);
		?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
