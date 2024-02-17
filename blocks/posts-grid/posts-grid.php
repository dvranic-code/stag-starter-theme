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

if ( isset( $block['data']['preview_image_help'] ) ) :    /* rendering in inserter preview  */

	echo '<img src="' . get_template_directory_uri() . '/blocks/posts-grid/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">'; //phpcs:ignore

else :

	// Support custom "anchor" values.
	$anchor = '';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
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

	$query = new WP_Query( $posts_grid );

	$is_events       = get_field( 'is_events' );
	$events_category = get_field( 'select_category' );
	$events_args     = array(
		'posts_per_page' => 5,
		'post_type'      => 'post',
		'category_name'  => $events_category->slug,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	?>
<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>" data-number="<?php echo esc_attr( $number_of_posts ); ?>" data-post="<?php echo esc_attr( $posts_type ); ?>" data-block="is-block" data-page="<?php echo esc_attr( $query->query_vars['paged'] ? $query->query_vars['paged'] : 1 ); ?>" data-max="<?php echo esc_attr( $query->max_num_pages ); ?>">

	<div class="row">
		<div class="<?php echo ( $is_events ) ? 'col-lg-9' : 'col-lg-12'; ?>">
			<?php
			get_template_part(
				'template-parts/content',
				'posts-grid',
				array(
					'posts'         => $query,
					'btn-text'      => $load_more_btn_text,
					'section-title' => $custom_title,
				)
			);
			?>
		</div>

		<?php
		if ( $is_events ) :
			$events_query = new WP_Query( $events_args );
			?>
			<div class="col-lg-3 posts-grid__events">
				<h3><?php echo esc_html( $events_category->name ); ?></h3>
				<?php if ( $events_query->have_posts() ) : ?>
					<div class="posts-grid__events--wrapper">
						<?php
						while ( $events_query->have_posts() ) :
							$events_query->the_post();
							?>
							<div class="posts-grid__events--item">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p><?php echo esc_html( get_the_date() ); ?></p>
							</div>
							<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>
