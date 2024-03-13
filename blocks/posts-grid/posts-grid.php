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

	$is_events       = get_field( 'is_events' );
	$is_decisions    = get_field( 'is_decisions' );
	$is_specific_cat = get_field( 'is_specific_cat' );

	$specific_category_post   = get_field( 'specific_category_post' );
	$specific_category_oglasi = get_field( 'specific_category_oglasi' );
	$events_category          = get_field( 'select_category' );
	$ad_type                  = get_field( 'select_ad_type' );

	// Get search taxonomy.
	if ( $is_events || $specific_category_post ) {
		$search_taxonomy = 'category';
	} elseif ( $is_decisions || $specific_category_oglasi ) {
		$search_taxonomy = 'tipovi_oglasa';
	} else {
		$search_taxonomy = false;
	}

	// Get search terms.
	if ( $specific_category_post ) {
		$search_terms = $specific_category_post;
	} elseif ( $specific_category_oglasi ) {
		$search_terms = $specific_category_oglasi;
	} else {
		$search_terms = array();
	}

	if ( $is_events ) {
		$events_args = array(
			'posts_per_page' => 5,
			'post_type'      => 'post',
			'category_name'  => $events_category->slug,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		if ( $is_specific_cat ) {
			$posts_grid = array(
				'posts_per_page' => $number_of_posts,
				'post_type'      => $posts_type,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'tax_query'      => array(
					'relation' => 'AND',
					array(
						'taxonomy' => $search_taxonomy,
						'field'    => 'slug',
						'terms'    => $events_category->slug,
						'operator' => 'NOT IN',
					),
					array(
						'taxonomy' => $search_taxonomy,
						'field'    => 'id',
						'terms'    => $search_terms,
					),
				),
			);
		} else {
			$posts_grid = array(
				'posts_per_page' => $number_of_posts,
				'post_type'      => $posts_type,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'tax_query'      => array(
					array(
						'taxonomy' => $search_taxonomy,
						'field'    => 'slug',
						'terms'    => $events_category->slug,
						'operator' => 'NOT IN',
					),
				),
			);
		}
	} elseif ( $is_decisions ) {
		$decisions_args = array(
			'posts_per_page' => 8,
			'post_type'      => 'oglas',
			'tax_query'      => array(
				array(
					'taxonomy' => 'tipovi_oglasa',
					'field'    => 'slug',
					'terms'    => $ad_type->slug,
				),
			),
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		if ( $is_specific_cat ) {
			$posts_grid = array(
				'posts_per_page' => $number_of_posts,
				'post_type'      => $posts_type,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'tax_query'      => array(
					'relation' => 'AND',
					array(
						'taxonomy' => $search_taxonomy,
						'field'    => 'slug',
						'terms'    => $ad_type->slug,
						'operator' => 'NOT IN',
					),
					array(
						'taxonomy' => $search_taxonomy,
						'field'    => 'id',
						'terms'    => $search_terms,
					),
				),
			);
		} else {
			$posts_grid = array(
				'posts_per_page' => $number_of_posts,
				'post_type'      => $posts_type,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'tax_query'      => array(
					array(
						'taxonomy' => $search_taxonomy,
						'field'    => 'slug',
						'terms'    => $ad_type->slug,
						'operator' => 'NOT IN',
					),
				),
			);
		}
	} elseif ( $search_taxonomy ) {
		$posts_grid = array(
			'posts_per_page' => $number_of_posts,
			'post_type'      => $posts_type,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'tax_query'      => array(
				array(
					'taxonomy' => $search_taxonomy,
					'field'    => 'id',
					'terms'    => $search_terms,
				),
			),
		);
	} else {
		$posts_grid = array(
			'posts_per_page' => $number_of_posts,
			'post_type'      => $posts_type,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
	}



	$query = new WP_Query( $posts_grid );

	?>
<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>" data-number="<?php echo esc_attr( $number_of_posts ); ?>" data-post="<?php echo esc_attr( $posts_type ); ?>" data-block="is-block" data-page="<?php echo esc_attr( $query->query_vars['paged'] ? $query->query_vars['paged'] : 1 ); ?>" data-max="<?php echo esc_attr( $query->max_num_pages ); ?>">

	<div class="row">
		<div class="<?php echo ( $is_events || $is_decisions ) ? 'col-lg-9' : 'col-lg-12'; ?>">
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

		<?php
		if ( $is_decisions ) :
			$decisions_query = new WP_Query( $decisions_args );
			?>
			<div class="col-lg-3 posts-grid__events">
				<h3><?php echo esc_html( $ad_type->name ); ?></h3>
				<?php if ( $decisions_query->have_posts() ) : ?>
					<div class="posts-grid__events--wrapper">
						<?php
						while ( $decisions_query->have_posts() ) :
							$decisions_query->the_post();
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
