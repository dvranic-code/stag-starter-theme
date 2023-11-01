<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

use stag_theme\ThemeSettings\STAG_Template_Tags;
use stag_theme\ThemeSettings\STAG_Extra_Functions;

$query    = $args['posts'];
$btn_text = $args['btn-text'];
?>

<?php
$query = new WP_Query( $query );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-grid__article' ); ?>>

	<div class="posts-grid__article--wrap-1">
		<?php
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
		?>
	</div>

	<div class="posts-grid__article--wrap-2">
		<?php STAG_Template_Tags::stag_post_thumbnail(); ?>
	</div>

	<div class="posts-grid__article--wrap-3">
		<header class="posts-grid__article--entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="posts-grid__article--entry-content">
			<?php STAG_Extra_Functions::stag_excerpt( 150 ); ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

		<?php
		endwhile;

	if ( $btn_text ) {
		?>
			<div class="posts-grid__btn-wrapper">
				<a href="#" class="btn btn--sm"><?php echo esc_html( $btn_text ); ?></a>
			</div>
		<?php
	}
		endif;
		wp_reset_postdata();