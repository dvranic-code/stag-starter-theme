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

			// TODO: dynamic posts per page.
			$wp_query = new \WP_Query(
				array(
					'paged' => $next_page,
				)
			);

			// TODO: dynamic button text and also button position.

			// TODO: Check why it is not working.
			// if ( is_home() ) {
			// $btn_text = pll__( 'Још чланака' );
			// } elseif ( is_search() ) {
			// $btn_text = pll__( 'Још резултата' );
			// } else {
			// $btn_text = pll__( 'Све објаве' );
			// }.

			$data = '';

			if ( $wp_query->post_count > 0 ) {
				$data .= STAG_Extra_Functions::store_template(
					'template-parts/content',
					'posts-grid',
					array(
						'posts'    => $wp_query,
						'btn-text' => pll__( 'Још чланака' ),
					)
				);
			} else {
				$data = '<h3>No posts ...</h3>';
			}

			wp_send_json_success( $data );

			die();
		}
	}

	new STAG_Ajax();
}
