<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

use stag_theme\ThemeSettings\STAG_Extra_Functions;

get_header();

global $wp_query;
?>

	<main id="primary" class="site-main container" data-page="<?php echo esc_attr( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ); ?>" data-max="<?php echo esc_attr( $wp_query->max_num_pages ); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h3 class="page-title">', '</h3>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php

			get_template_part(
				'template-parts/content',
				'posts-grid',
				array(
					'posts'    => $wp_query,
					'btn-text' => pll__( 'Још чланака' ),
				)
			);

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
