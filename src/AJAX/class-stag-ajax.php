<?php
/**
 * Class STAG_Ajax handles AJAX requests for the Stag Starter Theme.
 *
 * Description: This file contains the Stag_Ajax class, which handles AJAX requests for the Stag Starter Theme.
 *
 * @package Stag_Starter_Theme
 */

namespace stag_theme\AJAX;

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
		}
	}

	new STAG_Ajax();
}
