<?php
/**
 * Default posts grid block.
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

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'posts-grid';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

$number_of_posts    = get_field( 'number_of_posts' );
$posts_type         = get_field( 'post_type' );
$load_more_btn_text = get_field( 'load_more_btn_text' );
$custom_title       = get_field( 'custom_title' );

$posts_grid = array(
	'posts_per_page' => $number_of_posts,
	'post_type'      => $posts_type,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
);

?>
<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
	<?php if ( $custom_title ) { ?>
		<h3><?php echo esc_html( $custom_title ); ?></h3>
	<?php } ?>
	<?php
	$query = new WP_Query( $posts_grid );
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();

			get_template_part(
				'template-parts/content',
				'posts-grid',
				array(
					'posts'    => $posts_grid,
					'btn-text' => $load_more_btn_text,
				)
			);

		endwhile;
	endif;
	wp_reset_postdata();

	if ( $load_more_btn_text ) {
		?>
				<div class="posts-grid__btn-wrapper">
					<a href="#" class="btn btn--sm"><?php echo esc_html( $load_more_btn_text ); ?></a>
				</div>
			<?php } ?>
</section>