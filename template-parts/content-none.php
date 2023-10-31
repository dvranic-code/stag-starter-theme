<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<section class="no-results not-found">
	<div class="no-results__top">
		<div class="container">
			<?php get_search_form(); ?>
		</div>
	</div>
	<div class="no-results__bottom">
		<div class="container">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Rezultati pretrage za: ', '_s' ); ?></h1>
				<h3 class="search-query"><?php echo esc_html( get_search_query() ); ?></h3>
			</header><!-- .page-header -->

			<div class="page-content">

				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) :

					printf(
						'<p>' . wp_kses(
							/* translators: 1: link to WP admin new post page. */
							__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', '_s' ),
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

					<p><?php esc_html_e( 'Nema rezultata pretrage.', '_s' ); ?></p>
					<?php

				else :
					?>

					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '_s' ); ?></p>
					<?php
				endif;
				?>
			</div><!-- .page-content -->
		</div>
	</div>
</section><!-- .no-results -->
