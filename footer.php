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

use stag_theme\ThemeSettings\STAG_Extra_Functions;

$footer_info = get_field(
	'footer_info',
	'option'
);
$footer_copy = get_field(
	'footer_copy',
	'option'
);
?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-footer__top">
				<div class="row">
					<div class="col-lg-4">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					}
					?>
					</div>
					<div class="col-lg-8">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_id'        => 'footer-nav',
						)
					);
					?>
					</div>
				</div>
			</div>
			<div class="site-footer__bottom">
				<div class="row">
					<div class="col-lg-8">
						<p><?php echo $footer_info; // phpcs:ignore ?></p>
						<p>©<?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $footer_copy ); ?></p>
					</div>
					<div class="col-lg-4">
						<?php if ( have_rows( 'footer_social', 'option' ) ) : ?>
						<ul class="site-footer__bottom--socials">
							<?php
							while ( have_rows( 'footer_social', 'option' ) ) :
								the_row();
								$social_network = get_sub_field( 'social_network' );
								?>
								<li>
									<a href="<?php the_sub_field( 'social_url' ); ?>" target="_blank">
										<?php STAG_Extra_Functions::fetch_icon( $social_network ); ?>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
