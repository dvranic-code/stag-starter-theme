<?php
/**
 * Class STAG_Ajax handles AJAX requests for the Stag Starter Theme.
 *
 * Description: This file contains the Stag_Ajax class, which handles AJAX requests for the Stag Starter Theme.
 *
 * @package Stag_Starter_Theme
 */

namespace stag_theme\AJAX;

use stag_theme\ThemeSettings\STAG_Extra_Functions;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'STAG_Ajax' ) ) {
	/**
	 * Class STAG_Ajax
	 *
	 * Handles AJAX requests for the theme.
	 */
	class STAG_Ajax {

		/**
		 * Class constructor.
		 */
		public function __construct() {
			add_action( 'wp_ajax_load_more_posts', array( $this, 'load_more_posts' ) );
			add_action( 'wp_ajax_nopriv_load_more_posts', array( $this, 'load_more_posts' ) );
		}

		/**
		 * Loads more posts.
		 */
		public function load_more_posts() {

			if ( ! empty( $_POST['_nonce'] ) && ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['_nonce'] ) ), 'ajax_nonce' ) ) {
				wp_die( 'Security check' );
			}

			$get_current_page = isset( $_POST['currentPage'] ) ? intval( wp_unslash( $_POST['currentPage'] ) ) : 1;
			$next_page        = $get_current_page + 1;

			$search_query = isset( $_POST['searchQuery'] ) ? sanitize_text_field( wp_unslash( $_POST['searchQuery'] ) ) : '';

			// TODO: dynamic posts per page.
			// TODO: dynamic post type for block on homepage.
			$args = array(
				'paged'          => $next_page,
				'posts_per_page' => 3,
			);

			if ( ! empty( $search_query ) ) {
				$args['s'] = $search_query;
			}

			$query = new \WP_Query( $args );

			$data = '';

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$data .= STAG_Extra_Functions::store_template( 'template-parts/content', 'posts-article' );
				}
				wp_reset_postdata();
			} else {
				$data = '<h3>' . pll__( 'Нема више резултата ...' ) . '</h3>';
			}

			// This seems to fix the issue with the max_num_pages not being correct on search page.
			$max_pages_search = $query->max_num_pages;
			if ( $query->is_search ) {
				$max_pages_search = ceil( $query->found_posts / $query->get( 'posts_per_page' ) );
			}

			wp_send_json_success( array( $data, $max_pages_search ) );

			die();
		}
	}

	new STAG_Ajax();
}
