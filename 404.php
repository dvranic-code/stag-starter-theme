<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _s
 */

use stag_theme\ThemeSettings\STAG_Extra_Functions;

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container">
				<header class="page-header">
					<h2 class="error-404-text">404 <?php STAG_Extra_Functions::fetch_icon( 'icon-404' ); ?></h2>
					<h1 class="page-title"><?php pll_e( 'Упс, нешто се десило... страница не постоји.' ); ?></h1>
				</header><!-- .page-header -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
