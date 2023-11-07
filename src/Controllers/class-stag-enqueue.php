<?php
/**
 * Class STAG_Enqueue scripts and styles for the Stag Starter Theme.
 *
 * @package Stag_Starter_Theme
 * @subpackage Controllers
 * @since 1.0.0
 */

namespace stag_theme\Controllers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'STAG_Enqueue' ) ) {
	/**
	 * The STAG_Enqueue class enqueues scripts and styles for the theme.
	 *
	 * @since 1.0.0
	 */
	class STAG_Enqueue {

		/**
		 * Class constructor.
		 *
		 * Initializes the Enqueue controller.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'theme_enqueue_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_styles' ) );
		}

		/**
		 * Enqueues the theme's stylesheets.
		 *
		 * @since 1.0.0
		 */
		public function theme_enqueue_styles() {
			$the_theme = wp_get_theme();

			$theme_version = $the_theme->get( 'Version' );

			$css_version_child = $theme_version . '.' . filemtime( get_stylesheet_directory() . '/assets/public/dist/css/theme.min.css' );
			$js_version_child  = $theme_version . '.' . filemtime( get_stylesheet_directory() . '/assets/public/dist/js/theme.min.js' );

			// Swiper style.
			wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), $css_version_child );

			// Theme style.
			wp_enqueue_style( 'stag-theme-styles', get_stylesheet_directory_uri() . '/assets/public/dist/css/theme.min.css', array(), $css_version_child );

			// Swiper script.
			wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), $js_version_child, true );

			// Theme script.
			wp_enqueue_script( 'stag-theme-scripts', get_stylesheet_directory_uri() . '/assets/public/dist/js/theme.min.js', array(), $js_version_child, true );

			$stag_vars = array(
				'ajaxURL' => admin_url( 'admin-ajax.php' ),
			);
			wp_localize_script( 'stag-theme-scripts', 'WP_vars', $stag_vars );
		}

		/**
		 * Enqueues styles for the WordPress admin area.
		 *
		 * @since 1.0.0
		 */
		public function admin_enqueue_styles() {
			wp_enqueue_style( 'stag-admin-styles', get_stylesheet_directory_uri() . '/assets/admin/dist/css/theme-admin.min.css', array(), _S_VERSION );
		}
	}

	new STAG_Enqueue();
}
