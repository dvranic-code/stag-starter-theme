<?php
/**
 * Custom Post Type: Partneri
 *
 * @package GenerateChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Stag_CPT_Partneri' ) ) {
	/**
	 * Custom Post Type: Partneri
	 *
	 * @package GenerateChild
	 * @since 1.0.0
	 */
	class Stag_CPT_Partneri {
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
				'name'                  => _x( 'Partneri', 'Post Type General Name', 'stag' ),
				'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'stag' ),
				'menu_name'             => __( 'Partneri', 'stag' ),
				'name_admin_bar'        => __( 'Partner', 'stag' ),
				'archives'              => __( 'Partneri Archives', 'stag' ),
				'attributes'            => __( 'Partneri Attributes', 'stag' ),
				'parent_item_colon'     => __( 'Parent Partner:', 'stag' ),
				'all_items'             => __( 'All Partneri', 'stag' ),
				'add_new_item'          => __( 'Add New Partner', 'stag' ),
				'add_new'               => __( 'Add New', 'stag' ),
				'new_item'              => __( 'New Partner', 'stag' ),
				'edit_item'             => __( 'Edit Partner', 'stag' ),
				'update_item'           => __( 'Update Partner', 'stag' ),
				'view_item'             => __( 'View Partner', 'stag' ),
				'view_items'            => __( 'View Partneri', 'stag' ),
				'search_items'          => __( 'Search Partner', 'stag' ),
				'not_found'             => __( 'Not found', 'stag' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'stag' ),
				'featured_image'        => __( 'Partner Logo', 'stag' ),
				'set_featured_image'    => __( 'Podesi logo', 'stag' ),
				'remove_featured_image' => __( 'Remove featured image', 'stag' ),
				'use_featured_image'    => __( 'Use as featured image', 'stag' ),
			);

			$args = array(
				'label'               => __( 'Partneri', 'stag' ),
				'description'         => __( 'Partneri Description', 'stag' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'custom-fields', 'thumbnail' ),
				'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-businessperson',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'rewrite'             => false,
				'slug'                => 'partneri',
				'has_archive'         => false,
				'exclude_from_search' => true,
				'publicly_queryable'  => false,
				'capability_type'     => 'page',
				'show_in_rest'        => true,
			);

			register_post_type( 'partneri', $args );
		}
	}
}

new Stag_CPT_Partneri();
