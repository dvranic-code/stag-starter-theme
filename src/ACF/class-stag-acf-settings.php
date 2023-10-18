<?php
/**
 * Stag ACF Settings class.
 *
 * This class handles the registration of custom fields and options pages using the Advanced Custom Fields plugin.
 *
 * @package Stag_Starter_Theme
 * @subpackage ACF
 * @since 1.0.0
 */

namespace stag_theme\ACF;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'STAG_ACF_Settings' ) ) {
	/**
	 * The STAG_ACF_Settings class contains methods for managing the Advanced Custom Fields settings
	 * used in the Stag Starter Theme.
	 *
	 * @since 1.0.0
	 */
	class STAG_ACF_Settings {
		/**
		 * Class constructor.
		 *
		 * Initializes the Stag ACF Settings class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'acf/init', array( $this, 'add_options' ) );
		}

		/**
		 * Adds options to the Advanced Custom Fields plugin.
		 *
		 * @return void
		 */
		public function add_options() {
			if ( function_exists( 'acf_add_options_page' ) ) {
				acf_add_options_page(
					array(
						'page_title' => __( 'Theme Settings', 'stag-theme' ),
						'menu_title' => __( 'Theme Settings', 'stag-theme' ),
						'menu_slug'  => 'theme-settings',
						'icon_url'   => 'dashicons-art',
					)
				);

				acf_add_options_sub_page(
					array(
						'page_title'  => __( 'General' ),
						'menu_title'  => __( 'General' ),
						'parent_slug' => 'theme-settings',
					)
				);

				acf_add_options_sub_page(
					array(
						'page_title'  => __( 'Footer Settings' ),
						'menu_title'  => __( 'Footer Settings' ),
						'parent_slug' => 'theme-settings',
					)
				);
			}
		}
	}

	new STAG_ACF_Settings();
}
