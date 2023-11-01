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

use stag_theme\Controllers\Custom_Walker_Nav_Menu;

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

		/**
		 * Retrieves a menu by its name or location.
		 *
		 * @param string $menu The name or location of the menu to retrieve.
		 */
		public static function get_menu( $menu ) {
			if ( has_nav_menu( $menu ) ) {
				wp_nav_menu(
					array(
						'theme_location' => $menu,
						'walker'         => new Custom_Walker_Nav_Menu(),
					)
				);
			}
		}

		/**
		 * Sets the maximum length of an excerpt by the number of characters.
		 *
		 * @param int $charlength The maximum number of characters allowed in the excerpt.
		 */
		public static function stag_excerpt( $charlength ) {
			$excerpt = get_the_excerpt();
			++$charlength;

			if ( mb_strlen( $excerpt ) > $charlength ) {
				$subex   = mb_substr( $excerpt, 0, $charlength - 5 );
				$exwords = explode( ' ', $subex );
				$excut   = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
				if ( $excut < 0 ) {
					echo '<p>' . mb_substr( $subex, 0, $excut ) . '</p>'; // phpcs:ignore
				} else {
					echo '<p>' . $subex . '</p>'; // phpcs:ignore
				}
			} else {
				echo '<p>' . $excerpt . '</p>'; // phpcs:ignore
			}
		}
	}

	new STAG_Extra_Functions();
}
