<?php
/**
 * Stag ACF Register Blocks class file.
 *
 * This file contains the Stag ACF Register Blocks class, which is responsible for registering custom ACF blocks.
 *
 * @package Stag_Starter_Theme
 * @subpackage ACF
 * @since 1.0.0
 */

namespace stag_theme\ACF;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'STAG_ACF_Register_Blocks' ) ) {
	/**
	 * Registers custom ACF blocks for the STAG starter theme.
	 *
	 * @since 1.0.0
	 */
	class STAG_ACF_Register_Blocks {
		/**
		 * Class constructor.
		 *
		 * Initializes the Stag ACF Register Blocks class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'register_blocks' ) );
		}

		/**
		 * Registers custom ACF blocks.
		 *
		 * @return void
		 *
		 * @since 1.0.0
		 */
		public function register_blocks() {
			// Check function exists.
			if ( function_exists( 'register_block_type' ) ) {
				/**
				 * Block Name
				 * How to use: register_block_type( get_template_directory() . '/blocks/block_name' );
				 */
			}
		}
	}

	new STAG_ACF_Register_Blocks();
}
