<?php
/**
 * Template part for displaying ajax load more parts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

use stag_theme\ThemeSettings\STAG_Template_Tags;
use stag_theme\ThemeSettings\STAG_Extra_Functions;

global $post;

if ( $args['id'] ) {
	$id = $args['id']; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
}
setup_postdata( $post = get_post( $id ) ); // phpcs:ignore
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-grid__article' ); ?>>

	<div class="posts-grid__article--wrap-1">
		<?php
		if ( 'page' === get_post_type() ) :
			echo '<span>Page</span>';
		else :
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
				echo '<div class="posts-grid__article--categories">';
				$last_category = end( $categories );
				foreach ( $categories as $category ) {
					echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
					if ( $category !== $last_category ) {
						echo ', ';
					}
				}
				echo '</div>';
			}
		endif;
		?>
	</div>

	<div class="posts-grid__article--wrap-2">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php STAG_Template_Tags::stag_post_thumbnail(); ?>
		<?php else : ?>
			<figure class="default-placeholder">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholder-image.jpg" alt="<?php the_title_attribute(); ?>" />
			</figure>
		<?php endif; ?>
	</div>

	<div class="posts-grid__article--wrap-3">
		<header class="posts-grid__article--entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="posts-grid__article--entry-content">
			<?php STAG_Extra_Functions::stag_excerpt( 150, $post ); ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->