<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _s
 */

get_header();
?>

<main id="primary" class="site-main" data-search="is-search" data-page="<?php echo esc_attr( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ); ?>" data-max="<?php echo esc_attr( $wp_query->max_num_pages ); ?>">
	<div class="general-search__top">
		<div class="container">
			<?php get_search_form(); ?>
		</div>
	</div>
	<div class="container">
	<?php if ( have_posts() ) : ?>
		<div class="general-search__bottom">
			<div class="container">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Резултати претраге за: ', '_s' ); ?></h1>
					<h3 class="search-query"><?php echo esc_html( get_search_query() ); ?></h3>
				</header><!-- .page-header -->
			</div>
		</div>
		
		<?php

			get_template_part(
				'template-parts/content',
				'posts-grid',
				array(
					'posts'    => $wp_query,
					'btn-text' => pll__( 'Још резултата' ),
				)
			);

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
