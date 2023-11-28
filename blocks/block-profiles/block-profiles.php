<?php
/**
 * Default profiles block.
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

	echo '<img src="' . get_template_directory_uri() . '/blocks/block-profiles/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">'; //phpcs:ignore

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
			$class_name = 'block-profiles';
			if ( ! empty( $block['className'] ) ) {
				$class_name .= ' ' . $block['className'];
			}
			if ( ! empty( $block['align'] ) ) {
				$class_name .= ' align' . $block['align'];
			}
			return $class_name;
		}
	}

	$anchor     = get_anchor( $block );
	$class_name = get_class_name( $block );
	?>

<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
	<div class="block-profiles__swiper">
		<div class="swiper-wrapper block-profiles__swiper--wrapper">
			<?php
				$zaposleni = get_field( 'zaposleni' );
			if ( $zaposleni ) :
				?>
				<?php foreach ( $zaposleni as $zaposlen ) : ?>
					<?php
					$zvanje   = get_field( 'zvanje', $zaposlen->ID );
					$pozicija = get_field( 'pozicija', $zaposlen->ID );
					$odsek    = get_field( 'odsek', $zaposlen->ID );
					?>
			<div class="swiper-slide">
				<div class="block-profiles__swiper--wrapper--image">
					<?php echo get_the_post_thumbnail( $zaposlen->ID, 'full' ); ?>
				</div>
				<div class="block-profiles__swiper--wrapper--content">
					<h3><?php echo esc_html( get_the_title( $zaposlen->ID ) ); ?></h3>
					<span><?php echo esc_html( $zvanje ); ?></span>
					<p>
						<span><?php echo esc_html( $pozicija ); ?></span>
						<span><?php echo esc_html( $odsek ); ?></span>
					</p>
				</div>
			</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="block-profiles__swiper--controls">
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