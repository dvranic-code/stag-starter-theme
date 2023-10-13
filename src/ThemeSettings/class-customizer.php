<?php
/**
 * Customizer class for the Stag Starter Theme.
 *
 * @package Stag_Starter_Theme
 */

namespace stag_theme\ThemeSettings;

use stag_theme\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Customizer' ) ) {
	/**
	 * The Customizer class handles all customizer settings for the theme.
	 *
	 * @since 1.0.0
	 */
	class Customizer {
		use Singleton;

		/**
		 * Class constructor.
		 *
		 * Initializes the ThemeSettings class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'stag_customize_register' ) );
			add_action( 'customize_preview_init', array( $this, 'stag_customize_preview_js' ) );
		}

		/**
		 * Register customizer settings for the Stag Starter Theme.
		 *
		 * @param WP_Customize_Manager $wp_customize The customizer manager instance.
		 */
		public function stag_customize_register( $wp_customize ) {
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'blogname',
					array(
						'selector'        => '.site-title a',
						'render_callback' => '_s_customize_partial_blogname',
					)
				);
				$wp_customize->selective_refresh->add_partial(
					'blogdescription',
					array(
						'selector'        => '.site-description',
						'render_callback' => '_s_customize_partial_blogdescription',
					)
				);
			}
		}

		/**
		 * Enqueues scripts for the Theme Customizer preview.
		 *
		 * @return void
		 */
		public function stag_customize_preview_js() {
			wp_enqueue_script( 'stag-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
		}
	}
}
