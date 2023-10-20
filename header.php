<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

use stag_theme\ThemeSettings\STAG_Extra_Functions;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="site-header__branding">
						<?php
						if ( has_custom_logo() ) {
							the_custom_logo();
						}
						?>
					</div>
				</div>
				<div class="col-md-5">
					<nav id="site-navigation" class="site-header__main--navigation">
						<?php STAG_Extra_Functions::get_menu( 'primary-menu' ); ?>
					</nav>
				</div>
				<div class="col-md-4">
					<nav id="secondary-navigation" class="site-header__main--navigation site-header__main--navigation--right">
						<?php STAG_Extra_Functions::get_menu( 'header-right' ); ?>
					</nav>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
