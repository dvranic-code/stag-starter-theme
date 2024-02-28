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

if ( isset( $args['section-title'] ) ) {
	$custom_title = $args['section-title'];
} else {
	$custom_title = '';
}

if ( $query->have_posts() ) : ?>
	<div class="posts-grid__wrapper">
	<?php if ( $custom_title ) { ?>
		<h3><?php echo esc_html( $custom_title ); ?></h3>
	<?php } ?>
	<?php
	while ( $query->have_posts() ) :
		$query->the_post();
		?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-grid__article' ); ?>>

	<div class="posts-grid__article--wrap-1">
		<?php
		$get_post_type = get_post_type();
		if ( 'page' === $get_post_type ) {
			echo '<span>' . esc_html( pll_e( 'Страна' ) ) . '</span>';
		} elseif ( 'post' === $get_post_type ) {
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
		} else {
			echo '<span>' . esc_html( ucfirst( $get_post_type ) ) . '</span>';
		}
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

		<?php
	endwhile;
	if ( $btn_text ) {
		?>
		<div class="posts-grid__btn-wrapper">
			<a href="#" class="btn btn--sm load--more"><?php echo esc_html( $btn_text ); ?></a>
		</div>
	<?php } ?>

	</div>
<?php else : ?>
	<?php $current_post_type = $query->get( 'post_type' ); ?>
	<div class="posts-grid__wrapper">
		<?php if ( $custom_title ) { ?>
			<h3><?php echo esc_html( $custom_title ); ?></h3>
		<?php } ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-grid__article' ); ?>>
		<?php if ( 'oglas' === $current_post_type ) : ?>
			<p><?php pll_e( 'Тренутно нема отворених позиција', 'stag' ); ?></p>
		<?php else : ?>
			<p><?php pll_e( 'Ништа није пронађено.', 'stag' ); ?></p>
		<?php endif; ?>
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>