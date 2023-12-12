<?php
/**
 * Default Certificate Block.
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

  echo '<img src="' . get_template_directory_uri() . '/blocks/certificate-block/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">'; //phpcs:ignore

else :

	// Support custom "anchor" values.
	$anchor = '';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$class_name = 'certificate-block';
	if ( ! empty( $block['className'] ) ) {
		$class_name .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class_name .= ' align' . $block['align'];
	}

	?>
<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
	<div class="certificate-block__grid">
	<?php if ( have_rows( 'add_certificate' ) ) : ?>
		<?php
		while ( have_rows( 'add_certificate' ) ) :
			the_row();
			?>
			<?php
			$certificate_image       = get_sub_field( 'certificate_image' );
			$certificate_title       = get_sub_field( 'certificate_title' );
			$certificate_description = get_sub_field( 'certificate_description' );
			?>
			<a class="certificate-block__grid--card" href="#" title="<?php echo esc_html( $certificate_title ); ?>" data-img-url="<?php echo esc_html( $certificate_image['url'] ); ?>">
				<?php if ( $certificate_image ) : ?>
				<figure class="certificate-block__grid--card--image">
					<?php echo wp_get_attachment_image( $certificate_image['id'], 'full' ); ?>
				</figure>
				<?php endif; ?>
				<?php if ( $certificate_title || $certificate_description ) : ?>
				<div class="certificate-block__grid--card--overlay">
					<h3><?php echo esc_html( $certificate_title ); ?></h3>
					<p><?php echo esc_html( $certificate_description ); ?></p>
				</div>
				<?php endif; ?>
			</a>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</section>
<?php endif; ?>
