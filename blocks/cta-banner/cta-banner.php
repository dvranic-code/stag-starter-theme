<?php
/**
 * Default CTA block.
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

	echo '<img src="' . get_template_directory_uri() . '/blocks/cta-banner/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">'; //phpcs:ignore

else :

	// Support custom "anchor" values.
	$anchor = '';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$class_name = 'cta-banner full-width-container';
	if ( ! empty( $block['className'] ) ) {
		$class_name .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class_name .= ' align' . $block['align'];
	}

	$banner_text = get_field( 'banner_text' );
	$banner_link = get_field( 'banner_link' );

	?>
<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
	<div class="cta-banner__container container">
		<div class="cta-banner__text">
		<?php if ( $banner_text ) : ?>
			<h2><?php echo esc_html( $banner_text ); ?></h2>
		<?php endif; ?>
		</div>
		<div class="cta-banner__link">
		<?php if ( $banner_link ) : ?>
			<a class="btn btn--cta btn--sm" href="<?php echo esc_url( $banner_link['url'] ); ?>"><?php echo esc_html( $banner_link['title'] ); ?></a>
		<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>
