<?php
/**
 * Default Partner Slider Block.
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

if ( isset( $block['data']['preview_image_help'] ) ) :    /* rendering in inserter preview  */

  echo '<img src="' . get_template_directory_uri() . '/blocks/partner-slider/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">'; //phpcs:ignore

else :

	// Support custom "anchor" values.
	$anchor = '';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$class_name = 'partner-slider full-width-container';
	if ( ! empty( $block['className'] ) ) {
		$class_name .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class_name .= ' align' . $block['align'];
	}

	// $transient_key = 'select_partners_transient';
	// $expiration    = 12 * HOUR_IN_SECONDS; // Set the expiration time for 1 day.

	// $select_partners = get_transient( $transient_key );

	// if ( false === $select_partners ) {
	// 	// If the transient does not exist, regenerate the data and save it as a transient.
	// 	$select_partners = get_field( 'select_partners' );
	// 	set_transient( $transient_key, $select_partners, 0 );
	// }

	$select_partners = get_field( 'select_partners' );
	?>
<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
	<div class="partner-slider__marquee" id="marqueeSlider">
		<div class="item-wrap">
			<?php
			if ( $select_partners ) :
				foreach ( $select_partners as $partner ) :
					$partner_link  = get_field( 'link', $partner->ID );
					$partner_title = get_the_title( $partner->ID );
					if ( empty( $partner_link ) ) {
						$partner_link = '#';
					}
					?>
					<a class="partner-slider__marquee--link item" href="<?php echo esc_url( $partner_link ); ?>" target="_blank" title="<?php echo esc_html( $partner_title ); ?>">
					<?php if ( has_post_thumbnail( $partner->ID ) ) : ?>
							<?php echo get_the_post_thumbnail( $partner->ID, 'full' ); ?>
					<?php else : ?>
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholder-image.jpg" alt="<?php echo esc_html( get_the_title( $partner->ID ) ); ?>" />
					<?php endif; ?>
					</a>
					<?php
				endforeach;
			endif;
			?>
		</div>
	</div>
</section>
<?php endif; ?>