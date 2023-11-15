<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<section class="no-results not-found general-search">
	<div class="general-search__bottom">
		<div class="container">
			<header class="page-header">
				<h1 class="page-title"><?php pll_e( 'Резултати претраге за: ' ); ?></h1>
				<h3 class="search-query"><?php echo esc_html( get_search_query() ); ?></h3>
			</header><!-- .page-header -->

			<div class="page-content">

				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) :

					printf(
						'<p>' . wp_kses(
							/* translators: 1: link to WP admin new post page. */
							pll_e( 'Спремни сте за објаву вашег првог чланка? <a href="%1$s">Почните овде</a>.' ),
							array(
								'a' => array(
									'href' => array(),
								),
							)
						) . '</p>',
						esc_url( admin_url( 'post-new.php' ) )
					);

				elseif ( is_search() ) :
					?>

					<p><?php pll_e( 'Нема резултата претраге.' ); ?></p>
					<?php

				else :
					?>

					<p><?php pll_e( 'Изгледа да не можемо пронаћи оно шта тражите. Можда претрага може помоћи.' ); ?></p>
					<?php
				endif;
				?>
			</div><!-- .page-content -->
		</div>
	</div>
</section><!-- .no-results -->
