<?php
/**
 * Stag Extra Functions class file.
 *
 * This file contains the definition for the StagExtraFunctions class, which provides additional helper functions
 * for the Stag Starter Theme.
 *
 * @package Stag_Starter_Theme
 * @subpackage Theme_Settings
 * @since 1.0.0
 */

namespace stag_theme\ThemeSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'STAG_Extra_Functions' ) ) {
	/**
	 * Class STAG_Extra_Functions
	 *
	 * This class contains extra functions for the Stag Starter Theme.
	 *
	 * @package Stag_Extra_Functions
	 */
	class STAG_Extra_Functions {

		/**
		 * Fetches the icon with the specified name and theme.
		 *
		 * @param string $icon The name of the icon to fetch.
		 */
		public static function fetch_icon( $icon ) {
			get_template_part( "assets/public/src/icons/$icon", \null, array() );
		}
	}

	new STAG_Extra_Functions();
}
