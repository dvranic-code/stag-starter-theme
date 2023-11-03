<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

use stag_theme\ThemeSettings\STAG_Extra_Functions;

get_header();
global $wp_query;

$select_featured_post = get_field( 'select_featured_post', 'options' );
$post_thumbnail       = get_the_post_thumbnail( $select_featured_post->ID, 'full' );
?>

	<main id="primary" class="site-main container">

		<?php if ( $select_featured_post ) : ?>
		<div class="featured-post">
			<div class="row">
				<div class="col-lg-6">
				<?php if ( ! empty( $post_thumbnail ) ) : ?>
					<figure class="featured-post__image">
						<?php
							echo $post_thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</figure>
				<?php else : ?>
					<figure class="default-placeholder">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholder-image.jpg" alt="<?php the_title_attribute(); ?>" />
					</figure>
				<?php endif; ?>
				</div>
				<div class="col-lg-6">
					<div class="featured-post__content">
						<h2 class="featured-post__title">
							<?php echo esc_html( $select_featured_post->post_title ); ?>
						</h2>
						<div class="featured-post__excerpt">
							<?php STAG_Extra_Functions::stag_excerpt( 150 ); ?>
						</div>
						<a class="btn btn--sm" href="<?php echo esc_url( get_permalink( $select_featured_post->ID ) ); ?>">
							<?php pll_e( 'Прочитај' ); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

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
