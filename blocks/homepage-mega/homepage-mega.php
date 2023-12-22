<?php
/**
 * Default homepage mega block.
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

	echo '<img src="' . get_template_directory_uri() . '/blocks/homepage-mega/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">'; //phpcs:ignore

else :

	// Support custom "anchor" values.
	$anchor = '';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$class_name = 'homepage-mega';
	if ( ! empty( $block['className'] ) ) {
		$class_name .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class_name .= ' align' . $block['align'];
	}

	$section_title        = get_field( 'section_title' );
	$section_title_text   = get_field( 'section_title_text' );
	$block_image          = get_field( 'block_image' );
	$block_images         = get_field( 'block_images' );
	$block_image_aligment = get_field( 'block_image_aligment' );
	$block_title          = get_field( 'block_title' );
	$block_description    = get_field( 'block_description' );
	$block_button         = get_field( 'block_button' );

	?>

<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
	<?php if ( $section_title ) : ?>
		<h5 class="homepage-mega__section-title"><?php echo esc_html( $section_title_text ); ?></h5>
	<?php endif; ?>
	<div class="row <?php echo 'right' === $block_image_aligment ? 'row-reverse' : ''; ?>">
	<?php if ( $block_image ) : ?>
	<div class="col-lg-6">
		<?php if ( $block_images ) : ?>
			<div class="homepage-mega__images-container">
				<?php foreach ( $block_images as $item ) : ?>
					<figure class="homepage-mega__block-image">
						<?php echo wp_get_attachment_image( $item['image'], 'large' ); ?>
					</figure>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<div class="<?php echo $block_image ? 'col-lg-6' : 'col-lg-12'; ?>">
		<div class="homepage-mega__content">
		<?php if ( $block_title ) : ?>
		<h2 class="homepage-mega__content--title"><?php echo esc_html( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $block_description ) : ?>
		<p class="homepage-mega__content--description"><?php echo esc_html( $block_description ); ?></p>
		<?php endif; ?>
		<?php if ( $block_button ) : ?>
		<a href="<?php echo esc_url( $block_button['url'] ); ?>" class="btn btn--sm"><?php echo esc_html( $block_button['title'] ); ?></a>
	<?php endif; ?>
		</div>
	</div>
	</div>
</section>
<?php endif; ?>
