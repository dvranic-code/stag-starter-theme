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
				<div class="col-md-3 custom-md-3 pr-0 pr-sm d-f-sm">
					<div class="site-header__branding">
						<?php
						if ( has_custom_logo() ) {
							the_custom_logo();
						}
						?>
					</div>
					<div class="site-header__mobile-wrap hide--xl">
						<div class="site-header__mobile-wrapr--search-mobile">
							<a id="triggerSearchBoxMobile" class="search-icon" href="#">
								<?php STAG_Extra_Functions::fetch_icon( 'icon-search' ); ?>
							</a>
						</div>
						<button class="site-header__mobile-wrap--hamburger" aria-controls="mobile-menu" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32" fill="none">
								<path d="M34.6337 14.1855H1.36634C0.653465 14.1855 0 15.0103 0 16.0825C0 17.0721 0.594059 17.9794 1.36634 17.9794H34.6337C35.3465 17.9794 36 17.1546 36 16.0825C36 15.0103 35.3465 14.1855 34.6337 14.1855Z" fill="#1C2033"/>
								<path d="M34.6337 28.2063H1.36634C0.653465 28.2063 0 29.031 0 30.1032C0 31.1754 0.594059 32.0001 1.36634 32.0001H34.6337C35.3465 32.0001 36 31.1754 36 30.1032C36 29.031 35.3465 28.2063 34.6337 28.2063Z" fill="#1C2033"/>
								<path d="M1.36634 3.79381H34.6337C35.3465 3.79381 36 2.96907 36 1.89691C36 0.824742 35.4059 0 34.6337 0H1.36634C0.653465 0 0 0.824742 0 1.89691C0 2.96907 0.653465 3.79381 1.36634 3.79381Z" fill="#1C2033"/>
							</svg>
							<span class="screen-reader-text">Open header menu</span>
						</button>
					</div>
				</div>
				<div class="col-md-5 custom-md-5 pl-0 pr-0 mobile-menu-container">
					<div id="mainNavWidth" class="site-header__nav-wrap">
						<nav id="main-navigation" class="site-header__main--navigation">
							<?php STAG_Extra_Functions::get_menu( 'primary-menu' ); ?>
						</nav>
						<div class="site-header__nav-overlay"></div>
					</div>
				</div>
				<div class="col-md-4 custom-md-4 pl-0 mobile-menu-container">
					<nav id="secondary-navigation" class="site-header__main--navigation site-header__main--navigation--right">
						<?php STAG_Extra_Functions::get_menu( 'header-right' ); ?>
						<div class="site-header__main--navigation--right--links">
							<ul>
								<li class="hide--sm show--xl">
									<a id="triggerSearchBox" class="search-icon" href="#">
										<?php STAG_Extra_Functions::fetch_icon( 'icon-search' ); ?>
									</a>
								</li>
								<!-- <li>
									<a href="#">Login</a>
								</li> -->
								<li>
									<a id="languageIcon" class="language-icon" href="#">
										<?php STAG_Extra_Functions::fetch_icon( 'icon-language' ); ?>
									</a>
									<ul class="lang-sub-menu">
										<?php pll_the_languages(); ?>
										<li class="divider"></li>
										<li class="pismo">
											<a href="?pismo=lat">Latinica</a>
										</li>
										<li class="pismo">
											<a href="?pismo=cir">Ћирилица</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="mobile-menu" class="mobile-menu hide--xl">
		<div class="mobile-menu-container">
			<div class="mobile-menu__nav-wrap">
				<nav id="mobile-menu-navigation" class="mobile-menu__main--navigation">
					<?php STAG_Extra_Functions::get_menu( 'primary-menu' ); ?>
				</nav>
				<div class="mobile-menu__nav-overlay"></div>
			</div>
		</div>
		<div class="mobile-menu__container-bottom">
			<nav class="mobile-menu__main--navigation mobile-menu__main--navigation--right">
				<?php STAG_Extra_Functions::get_menu( 'header-right' ); ?>
				<div class="mobile-menu__main--navigation--right--links">
					<ul>
						<!-- <li>
							<a href="#">Login</a>
						</li> -->
						<li>
							<a id="languageIconMobile" class="language-icon" href="#">
								<?php STAG_Extra_Functions::fetch_icon( 'icon-language' ); ?>
							</a>
							<ul class="lang-sub-menu-mobile">
								<?php pll_the_languages(); ?>
								<li class="divider"></li>
								<li class="pismo">
									<a href="?pismo=lat">Latinica</a>
								</li>
								<li class="pismo">
									<a href="?pismo=cir">Ћирилица</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<div class="site-header__search-popup">
		<div class="container">
			<?php get_search_form(); ?>
		</div>
	</div>
