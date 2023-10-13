<?php
/**
 * Theme initialization class file.
 *
 * This file contains the ThemeInit class, which is responsible for initializing the theme.
 *
 * @package Stag_Starter_Theme
 */

namespace stag_theme;

// use stag_theme\Controllers\Enqueue;
// use stag_theme\ACF\ACFRegisterBlocks;
// use stag_theme\ACF\ACFSettings;

if ( ! class_exists( 'ThemeInit' ) ) {
	/**
	 * The ThemeInit class initializes the theme and registers its features.
	 *
	 * @since 1.0.0
	 */
	class ThemeInit {
		/**
		 * The single instance of the ThemeInit class.
		 *
		 * @var ThemeInit|null
		 */
		private static $instance;

		/**
		 * ThemeInit constructor.
		 *
		 * @access public
		 */
		public function __construct() {

			// Enqueue::getInstance();
			// ACFRegisterBlocks::getInstance();
			// ACFSettings::getInstance();

			$this->theme_settings();
			$this->enqueue();
		}

		/**
		 * Theme settings function.
		 *
		 * This function handles the initialization of the theme settings.
		 *
		 * @since 1.0.0
		 */
		public function theme_settings() {
			include THEME_DIR . '/src/ThemeSettings/class-customizer.php';
			include THEME_DIR . '/src/ThemeSettings/class-themesetup.php';
			include THEME_DIR . '/src/ThemeSettings/class-templatetags.php';
		}

		/**
		 * Enqueue function.
		 *
		 * This function handles the enqueueing of scripts and styles.
		 *
		 * @since 1.0.0
		 */
		public function enqueue() {
			include THEME_DIR . '/src/Controllers/class-enqueue.php';
		}

		/**
		 * Class instantiation
		 *
		 * @return ThemeInit
		 */
		public static function stag_instance(): ThemeInit {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

	ThemeInit::stag_instance();
}
