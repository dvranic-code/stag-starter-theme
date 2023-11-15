<?php
/**
 * Default Title block.
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

	echo '<img src="' . esc_url( get_template_directory_uri() ) . '/blocks/title-block/' . esc_attr( $block['data']['preview_image_help'] ) . '" style="width:100%; height:auto;">';


else :

	// Support custom "anchor" values.
	$anchor = '';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$class_name = 'title-block full-width-container';
	if ( ! empty( $block['className'] ) ) {
		$class_name .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class_name .= ' align' . $block['align'];
	}

	$block_image = get_field( 'block_image' );
	$block_title = get_field( 'block_title' );

	?>
	<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
	<?php if ( $block_image ) : ?>
	<figure class="title-block__image">
		<?php echo wp_get_attachment_image( $block_image, 'full' ); ?>
	</figure>
	<?php endif; ?>
	<div class="title-block__container container">
	<?php if ( $block_title ) : ?>
	<h1 class="title-block__title"><?php echo esc_html( $block_title ); ?></h1>
	<?php endif; ?>
	</div>
	<div class="title-block__overlay"></div>
	</section>
<?php endif; ?>
