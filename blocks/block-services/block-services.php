<?php
/**
 * Service Block.
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

  echo '<img src="' . get_template_directory_uri() . '/blocks/block-services/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">'; //phpcs:ignore

else :

	// Support custom "anchor" values.
	$anchor = '';
	if ( ! empty( $block['anchor'] ) ) {
		$anchor = 'id=' . esc_attr( $block['anchor'] ) . ' ';
	}

	// Create class attribute allowing for custom "className" and "align" values.
	$class_name = 'block-services';
	if ( ! empty( $block['className'] ) ) {
		$class_name .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$class_name .= ' align' . $block['align'];
	}

	// Get all terms for post type 'usluge'.
	$terms = get_terms(
		array(
			'taxonomy'   => 'tip_dijagnostike',
			'hide_empty' => true,
			'order'      => 'DESC',
		)
	);

	$lang = pll_current_language();
	if ( 'en' === $lang ) {
		$curency     = 'EUR';
		$booking_url = get_field( 'booking_page_en', 'option' );
	} else {
		$curency     = 'РСД';
		$booking_url = get_field( 'booking_page_rs', 'option' );
	}

	?>
	<section <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>">
		<div class="block-services__search">
			<h3><?php pll_e( 'Филтер' ); ?></h3>
			<label>
				<span class="screen-reader-text"><?php pll_e( 'Тражим...' ); ?></span>
				<input type="search" class="search-form__search-field" placeholder="<?php pll_e( 'Тражим...' ); ?>" value="" name="s" />
			</label>
		</div>
		<figure class="wp-block-table is-style-stripes tor-service-table">
			<table>
				<thead>
					<tr>
						<th class="has-text-align-left" data-align="left"></th>
						<th class="has-text-align-left" data-align="left"><?php pll_e( 'Категорија' ); ?></th>
						<th class="has-text-align-left" data-align="left"><?php pll_e( 'Назив услуге' ); ?></th>
						<th class="has-text-align-center" data-align="center"><?php pll_e( 'Могуће на упут лекара (РФЗО)' ); ?></th>
						<th class="has-text-align-center" data-align="center"><?php pll_e( 'Могуће на лични захтев (плаћање)' ); ?></th>
						<th class="has-text-align-center" data-align="center"><?php pll_e( 'Узорак' ); ?></th>
						<th class="has-text-align-center" data-align="center"><?php pll_e( 'Метода' ); ?></th>
						<th class="has-text-align-center" data-align="center"><?php pll_e( 'Време издавања резултата (радни дани)' ); ?></th>
						<th class="has-text-align-right" data-align="right"><?php pll_e( 'Цена услуге' ); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ( $terms as $service_term ) :
					$service_title = $service_term->name;
					$service_slug  = $service_term->slug;

					$service_query = new WP_Query(
						array(
							'post_type'      => 'usluge',
							'posts_per_page' => -1,
							'tax_query'      => array( // phpcs:ignore
								array(
									'taxonomy' => 'tip_dijagnostike',
									'field'    => 'slug',
									'terms'    => $service_slug,
								),
							),

						)
					);
					if ( $service_query->have_posts() ) :

						while ( $service_query->have_posts() ) :
							$service_query->the_post();
							$service_id     = get_the_ID();
							$service_name   = get_the_title();
							$service_rfzo   = get_field( 'moguce_na_uput_lekara', get_the_ID() );
							$service_buy    = get_field( 'moguce_na_licni_zahtev', get_the_ID() );
							$service_sample = get_field( 'preporucen_uzorak', get_the_ID() );
							$service_method = get_field( 'metoda', get_the_ID() );
							$service_time   = get_field( 'obrtno_vreme_izdavanja_rezultata', get_the_ID() );
							$service_price  = get_field( 'cena', get_the_ID() );
							$is_available   = get_field( 'is_available', get_the_ID() );

							if ( $is_available ) :
								?>
							
								<tr>
									<td class="has-text-align-left tor-service-checkbox" data-align="left"><input type="checkbox"></td>
									<td class="has-text-align-left" data-align="left"><?php echo esc_html( $service_title ); ?></td>
									<td class="has-text-align-left tor-service-name" data-align="left" data-service-id="<?php echo esc_html( $service_id ); ?>"><?php echo esc_html( $service_name ); ?></td>
									<td class="has-text-align-center" data-align="center"><?php ( $service_rfzo ) ? pll_e( 'ДА' ) : pll_e( 'НЕ' ); ?></td>
									<td class="has-text-align-center" data-align="center"><?php ( $service_buy ) ? pll_e( 'ДА' ) : pll_e( 'НЕ' ); ?></td>
									<td class="has-text-align-center" data-align="center"><?php echo esc_html( $service_sample ); ?></td>
									<td class="has-text-align-center" data-align="center"><?php echo esc_html( $service_method ); ?></td>
									<td class="has-text-align-center" data-align="center"><?php echo esc_html( $service_time ); ?></td>
									<td class="has-text-align-right tor-service-price" data-align="right" data-tor-curency="<?php echo esc_html( $curency ); ?>"><?php echo esc_html( $service_price . ' ' . $curency ); ?></td>
								</tr>

								<?php
							endif;
						endwhile;
					endif;
					wp_reset_postdata();
				endforeach;
				?>
				</tbody>
			</table>
		</figure>
		<!-- Table to show choosen services -->
		<figure class="wp-block-table is-style-stripes tor-service-choosen">
			<h3><?php pll_e( 'Изабрали сте следеће услуге:' ); ?></h3>
			<table>
				<thead>
					<tr>
						<th class="has-text-align-left" data-align="left" style="width: 36px"><?php pll_e( 'Бр.' ); ?></th>
						<th class="has-text-align-left" data-align="left"><?php pll_e( 'Назив услуге' ); ?></th>
						<th class="has-text-align-right" data-align="right" style="width: 130px"><?php pll_e( 'Цена' ); ?></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
				<tfoot>
					<tr>
						<td class="has-text-align-left" data-align="left"></td>
						<td class="has-text-align-right" data-align="right"><strong><?php pll_e( 'Укупно:' ); ?></strong></td>
						<td class="has-text-align-right tor-service-total" data-align="right"></td>
					</tr>
				</tfoot>
			</table>
			<div style="text-align:right; margin-top:21px;">
				<a href="<?php echo esc_url( $booking_url ); ?>" class="btn btn-sm btn-booking"><?php pll_e( 'Закажи' ); ?></a>
			</div>
		</figure>
	</section>
<?php endif; ?>