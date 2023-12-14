<?php
/**
 * Default homepage hero block.
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

	echo '<img src="' . get_template_directory_uri() . '/blocks/homepage-hero/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">'; //phpcs:ignore

else :

	// Support custom "anchor" values.
	$anchor = '';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$class_name = 'homepage-hero full-width-container';
	if ( ! empty( $block['className'] ) ) {
		$class_name .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class_name .= ' align' . $block['align'];
	}

	$hero_title              = get_field( 'hero_title' );
	$hero_button             = get_field( 'hero_button' );
	$hero_background         = get_field( 'hero_background' );
	$video_background        = get_field( 'video_background' );
	$video_background_mobile = get_field( 'video_background_mobile' );
	$image_background        = get_field( 'image_background' );
	$playlist_id             = get_field( 'playlist_id' );
	$mobile_playlist_id      = get_field( 'mobile_playlist_id' );

	/**
	 * Process the video background.
	 *
	 * @param string $video_background The video background.
	 * @param int    $playlist_id The playlist ID.
	 * @param array  $params Additional parameters.
	 * @return string The processed video background.
	 */
	function process_video_background( $video_background, $playlist_id, $params ) {
		if ( $video_background ) {
			preg_match( '/src="(.+?)"/', $video_background, $matches );
			$src = $matches[1];

			$new_src          = add_query_arg( $params, $src );
			$video_background = str_replace( $src, $new_src, $video_background );
			$video_background = str_replace( 'frameborder="0"', '', $video_background );
		}

		return $video_background;
	}

	$desktop_params = array(
		'rel'      => 0,
		'autoplay' => 1,
		'loop'     => 1,
		'mute'     => 1,
		'controls' => 0,
		'hd'       => 1,
		'autohide' => 1,
		'playlist' => $playlist_id,
	);

	$mobile_params = array(
		'rel'      => 0,
		'autoplay' => 1,
		'loop'     => 1,
		'mute'     => 1,
		'controls' => 0,
		'hd'       => 1,
		'autohide' => 1,
		'playlist' => $mobile_playlist_id,
	);

	?>
<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
	<div class="homepage-hero__caption">
		<div class="grid-col">
			<h1 class="homepage-hero__caption--title"><?php echo esc_html( $hero_title ); ?></h1>
			<?php if ( $hero_button ) : ?>
				<a class="btn btn--ghost btn--white" href="<?php echo esc_url( $hero_button['url'] ); ?>"><?php echo esc_html( $hero_button['title'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
	<div class="homepage-hero__background">
		<?php if ( $video_background ) : ?>
		<div class="homepage-hero__background--video hide--sm show--lg">
			<?php echo $video_background = process_video_background( $video_background, $playlist_id, $desktop_params ); // phpcs:ignore ?>
		</div>
		<div class="homepage-hero__background--video hide--lg show--sm">
			<?php echo $video_background_mobile = process_video_background( $video_background_mobile, $playlist_id, $mobile_params ); // phpcs:ignore ?>
		</div>
		<?php elseif ( $image_background ) : ?>
		<figure class="homepage-hero__background--image">
			<?php echo wp_get_attachment_image( $image_background, 'full' ); ?>
		</figure>
		<?php endif; ?>
	</div>
	<div class="homepage-hero__overlay"></div>
</section>
<?php endif; ?>
