<?php
/**
 * Custom Post Type: Usluge
 *
 * @package GenerateChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Stag_CPT_Usluge' ) ) {
	/**
	 * Custom Post Type: Usluge
	 *
	 * @package GenerateChild
	 * @since 1.0.0
	 */
	class Stag_CPT_Usluge {
		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'register_post_type' ) );
		}
		/**
		 * Register Custom Post Type
		 */
		public function register_post_type() {
			$labels = array(
				'name'                  => _x( 'Usluge', 'Post Type General Name', 'stag' ),
				'singular_name'         => _x( 'Usluga', 'Post Type Singular Name', 'stag' ),
				'menu_name'             => __( 'Usluge', 'stag' ),
				'name_admin_bar'        => __( 'Usluga', 'stag' ),
				'archives'              => __( 'Usluge Archives', 'stag' ),
				'attributes'            => __( 'Usluge Attributes', 'stag' ),
				'parent_item_colon'     => __( 'Parent Usluga:', 'stag' ),
				'all_items'             => __( 'All Usluge', 'stag' ),
				'add_new_item'          => __( 'Add New Usluga', 'stag' ),
				'add_new'               => __( 'Add New', 'stag' ),
				'new_item'              => __( 'New Usluga', 'stag' ),
				'edit_item'             => __( 'Edit Usluga', 'stag' ),
				'update_item'           => __( 'Update Usluga', 'stag' ),
				'view_item'             => __( 'View Usluga', 'stag' ),
				'view_items'            => __( 'View Usluge', 'stag' ),
				'search_items'          => __( 'Search Usluga', 'stag' ),
				'not_found'             => __( 'Not found', 'stag' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'stag' ),
				'featured_image'        => __( 'Featured Image', 'stag' ),
				'set_featured_image'    => __( 'Set featured image', 'stag' ),
				'remove_featured_image' => __( 'Remove featured image', 'stag' ),
				'use_featured_image'    => __( 'Use as featured image', 'stag' ),
			);

			$args = array(
				'label'               => __( 'Usluga', 'stag' ),
				'description'         => __( 'Usluga Description', 'stag' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-portfolio',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => 'usluge',
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',
				'show_in_rest'        => true,
			);

			register_post_type( 'usluge', $args );
		}
	}
}

new Stag_CPT_Usluge();
