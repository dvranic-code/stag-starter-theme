<?php
/**
 * Default Timeline Slider block.
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

	echo '<img src="' . esc_url( get_template_directory_uri() ) . '/blocks/timeline-slider/' . esc_attr( $block['data']['preview_image_help'] ) . '" style="width:100%; height:auto;">';

else :

	// Support custom "anchor" values.
	$anchor = '';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$class_name = 'timeline-slider';
	if ( ! empty( $block['className'] ) ) {
		$class_name .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class_name .= ' align' . $block['align'];
	}

	?>
	<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
		<div class="timeline-slider__swiper">
			<div class="swiper-wrapper">
				<?php if ( have_rows( 'timeline' ) ) : ?>
					<?php
					while ( have_rows( 'timeline' ) ) :
						the_row();
						$timeline_year  = get_sub_field( 'timeline_year' );
						$timeline_title = get_sub_field( 'timeline_title' );
						$timeline_image = get_sub_field( 'timeline_image' );
						$timeline_text  = get_sub_field( 'timeline_text' );
						?>
						<div class="swiper-slide">
							<?php if ( $timeline_year && $timeline_title ) : ?>
							<div class="timeline-slider__timestamp">
								<span class="timeline-slider__timestamp--year"><?php echo esc_html( $timeline_year ); ?></span>
								<h5 class="timeline-slider__timestamp--title"><?php echo esc_html( $timeline_title ); ?></h5>
							</div>
							<?php endif; ?>
							<?php if ( $timeline_image && $timeline_text ) : ?>
							<div class="timeline-slider__content">
								<div class="timeline-slider__content--image">
									<?php echo wp_get_attachment_image( $timeline_image, 'full' ); ?>
								</div>
								<div class="timeline-slider__content--text">
									<?php echo wp_kses_post( $timeline_text ); ?>
								</div>
							</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<div class="timeline-slider__controls">
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