<?php
/**
 * Template part for displaying popup content
 *
 * @package stag-starter-theme
 */

$show_popup = get_field( 'show_popup', 'options' );

if ( $show_popup ) :
	$curent_language = pll_current_language();

	if ( 'sr' === $curent_language ) {
		$popup = get_field( 'serbian_popup', 'options' );
	} elseif ( 'en' === $curent_language ) {
		$popup = get_field( 'english_popup', 'options' );
	}

	$pop_title        = $popup['title'];
	$background_image = $popup['background_image'];
	$content          = $popup['content'];
	$cta              = $popup['cta'];

	if ( ! empty( $pop_title ) ) :
		?>

		<style>
			.popup__wrapper .stag-popup {
				--stag-overlay-color: <?php echo wp_kses_post( $popup['overlay_color'] ); ?>;
				--stag-text-color: <?php echo wp_kses_post( $popup['text_color'] ); ?>;
			}
		</style>

		<div class="popup__wrapper">
			<div class="stag-popup">
				<?php if ( ! empty( $background_image ) ) : ?>
					<div class="stag-popup__background">
						<?php echo wp_get_attachment_image( $background_image, 'large', false, array( 'loading' => 'lazy' ) ); ?>
					</div>
				<?php endif; ?>
				<div class="stag-popup__overlay"></div>
				<div class="stag-popup__wrap">
					<?php if ( ! empty( $pop_title ) ) : ?>
						<h2 class="stag-popup__title"><?php echo esc_html( $pop_title ); ?></h2>
					<?php endif; ?>
					<?php if ( ! empty( $content ) ) : ?>
						<div class="stag-popup__content"><?php echo wp_kses_post( $content ); ?></div>
					<?php endif; ?>
					<?php if ( ! empty( $cta ) ) : ?>
						<div class="stag-popup__cta">
							<a href="<?php echo esc_url( $cta['url'] ); ?>" target="<?php echo esc_attr( $cta['target'] ); ?>" class="btn"><?php echo esc_html( $cta['title'] ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

	<?php endif; ?>

<?php endif; ?>
