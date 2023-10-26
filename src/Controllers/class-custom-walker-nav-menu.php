<?php
/**
 * Custom Walker Nav Menu class file.
 *
 * This file contains the definition for the Custom Walker Nav Menu class, which extends the default WordPress
 * Walker_Nav_Menu class to provide custom functionality for displaying navigation menus.
 *
 * @package Stag_Custom_Walker_Nav_Menu
 */

namespace stag_theme\Controllers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Custom_Walker_Nav_Menu' ) ) {
	/**
	 * Custom navigation menu walker class.
	 *
	 * Extends the Walker_Nav_Menu class to customize the output of navigation menus.
	 *
	 * @since 1.0.0
	 */
	class Custom_Walker_Nav_Menu extends \Walker_Nav_Menu {
		/**
		 * Starts the list before the elements are added.
		 *
		 * @since 1.0.0
		 *
		 * @param string $output Used to append additional content (passed by reference).
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An array of arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = null ) {
			// Add a custom class for the third level sub-menu.
			if ( 0 === $depth ) {
				$output .= '<ul class="sub-menu sub-menu-level-one">';
			} elseif ( 1 === $depth ) {
				$output .= '<ul class="sub-menu-level-two">';
			} else {
				parent::start_lvl( $output, $depth, $args );
			}
		}

		/**
		 * Ends the element output, if needed.
		 *
		 * @param string $output Used to append additional content (passed by reference).
		 * @param object $item   Menu item data object.
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An array of arguments.
		 * @param int    $id     Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
			// Add or modify classes as needed.
			if ( 0 === $depth ) {
				$item->classes[] = 'children-zero-level';
			}
			if ( 1 === $depth ) {
				$item->classes[] = 'children-first-level';
			}
			if ( 2 === $depth ) {
				$item->classes[] = 'sub-menu-level-two-items';
			}

			parent::start_el( $output, $item, $depth, $args, $id );
		}
	}

	new Custom_Walker_Nav_Menu();
}
