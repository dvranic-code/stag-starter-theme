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

if ( isset( $block['data']['preview_image_help'] ) ) :    /* rendering in inserter preview  */

	echo '<img src="' . get_template_directory_uri() . '/blocks/content-slider/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">'; //phpcs:ignore

else :

	if ( ! function_exists( 'get_anchor' ) ) {
		/**
		 * Returns the anchor for the given block.
		 *
		 * @param array $block The block to get the anchor for.
		 * @return string The anchor for the given block.
		 */
		function get_anchor( $block ) {
			return ! empty( $block['anchor'] ) ? 'id=' . esc_attr( $block['anchor'] ) . ' ' : '';
		}
	}

	if ( ! function_exists( 'get_class_name' ) ) {
		/**
		 * Returns the class name for the given block.
		 *
		 * @param array $block The block to get the class name for.
		 * @return string The class name for the given block.
		 */
		function get_class_name( $block ) {
			$class_name = 'content-slider';
			if ( ! empty( $block['className'] ) ) {
				$class_name .= ' ' . $block['className'];
			}
			if ( ! empty( $block['align'] ) ) {
				$class_name .= ' align' . $block['align'];
			}
			return $class_name;
		}
	}

	if ( ! function_exists( 'display_slide' ) ) {
		/**
		 * Displays the slide.
		 *
		 * @param WP_Post $post_object The post object to display.
		 */
		function display_slide( $post_object ) {
			$post = $post_object;
			setup_postdata( $post );
			$additional_images = get_field( 'additional_images', $post_object->ID );
			?>
		<div class="swiper-slide">
			<div class="content-slider__swiper--img-wrap tor-fade">
				<?php if ( has_post_thumbnail( $post_object->ID ) ) : ?>
					<div class="tor-fade__item">
						<?php echo get_the_post_thumbnail( $post_object->ID, 'full' ); ?>
					</div>
					<?php if ( $additional_images ) : ?>
						<?php foreach ( $additional_images as $item ) : ?>
							<div class="tor-fade__item">
								<?php echo wp_get_attachment_image( $item['image'], 'large' ); ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				<?php else : ?>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholder-image.jpg" alt="<?php the_title_attribute(); ?>" />
				<?php endif; ?>
			</div>
			<h4 class="content-slider__swiper--title"><a href="<?php echo esc_url( get_permalink( $post_object ) ); ?>"><?php echo esc_html( $post_object->post_title ); ?></a></h4>
			<?php STAG_Extra_Functions::stag_excerpt( 115, $post_object ); ?>
			<a class="learn--more" href="<?php echo esc_url( get_permalink( $post_object ) ); ?>"><?php pll_e( 'Сазнај више' ); ?> <?php STAG_Extra_Functions::fetch_icon( 'icon-arrow' ); ?></a>
		</div>
			<?php
			wp_reset_postdata();
		}
	}

	$anchor        = get_anchor( $block );
	$class_name    = get_class_name( $block );
	$section_title = get_field( 'section_title' );
	$select_slides = get_field( 'select_slides' );
	?>

<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
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
						<?php display_slide( $post_object ); ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="swiper-pagination content-slider__swiper-pagination"></div>
		<div class="content-slider__controls">
			<div class="swiper-button-prev-1 swiper-pagination__swiper-button-prev">
				<?php STAG_Extra_Functions::fetch_icon( 'icon-circle-prev' ); ?>
			</div>
			<div class="swiper-button-next-1 swiper-pagination__swiper-button-next">
				<?php STAG_Extra_Functions::fetch_icon( 'icon-circle-next' ); ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
