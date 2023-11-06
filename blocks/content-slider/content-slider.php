<?php
/**
 * Default content slider block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 *
 * @package Stag_Starter_Theme
 * @since 1.0.0
 */

use stag_theme\ThemeSettings\STAG_Extra_Functions;

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'content-slider';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$section_title = get_field( 'section_title' );
$select_slides = get_field( 'select_slides' );


?>
<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
	<div class="container">

	<?php if ( $section_title ) : ?>
	<h3 class="content-slider__title">
		<?php echo esc_html( $section_title ); ?>
	</h3>
	<?php endif; ?>
	
	<div class="content-slider__swiper">
		<div class="swiper-wrapper">
	<?php if ( have_rows( 'select_slides' ) ) : ?>
		<?php
		while ( have_rows( 'select_slides' ) ) :
			the_row();
			?>
			<?php $post_object = get_sub_field( 'slide' ); ?>
			<?php if ( $post_object ) : ?>
				<?php
				$post = $post_object; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				setup_postdata( $post );
				?>
			<div class="swiper-slide">
		<div class="swiper-slide__img-wrap">
					<?php echo get_the_post_thumbnail( $post_object->ID, 'full' ); ?>
		</div>
				<h4><?php echo esc_html( $post_object->post_title ); ?></h4>
						<?php STAG_Extra_Functions::stag_excerpt( 150, $post_object ); ?>
				<a href="<?php echo esc_url( get_permalink( $post_object ) ); ?>"><?php pll_e( 'Сазнај више' ); ?></a>
			</div>
				<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-pagination"></div>
		</div>
	</div>
	  
	</div>

	</div>
</section>