<?php
/**
 * Custom Post Type: Projekti
 *
 * @package GenerateChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Stag_CPT_Projekti' ) ) {
	/**
	 * Custom Post Type: Projekti
	 *
	 * @package GenerateChild
	 * @since 1.0.0
	 */
	class Stag_CPT_Projekti {
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
				'name'                  => _x( 'Projekti', 'Post Type General Name', 'stag' ),
				'singular_name'         => _x( 'Projekat', 'Post Type Singular Name', 'stag' ),
				'menu_name'             => __( 'Projekti', 'stag' ),
				'name_admin_bar'        => __( 'Projekat', 'stag' ),
				'archives'              => __( 'Projekti Archives', 'stag' ),
				'attributes'            => __( 'Projekti Attributes', 'stag' ),
				'parent_item_colon'     => __( 'Parent Projekat:', 'stag' ),
				'all_items'             => __( 'All Projekti', 'stag' ),
				'add_new_item'          => __( 'Add New Projekat', 'stag' ),
				'add_new'               => __( 'Add New', 'stag' ),
				'new_item'              => __( 'New Projekat', 'stag' ),
				'edit_item'             => __( 'Edit Projekat', 'stag' ),
				'update_item'           => __( 'Update Projekat', 'stag' ),
				'view_item'             => __( 'View Projekat', 'stag' ),
				'view_items'            => __( 'View Projekti', 'stag' ),
				'search_items'          => __( 'Search Projekat', 'stag' ),
				'not_found'             => __( 'Not found', 'stag' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'stag' ),
				'featured_image'        => __( 'Featured Image', 'stag' ),
				'set_featured_image'    => __( 'Set featured image', 'stag' ),
				'remove_featured_image' => __( 'Remove featured image', 'stag' ),
				'use_featured_image'    => __( 'Use as featured image', 'stag' ),
			);

			$args = array(
				'label'               => __( 'Projekat', 'stag' ),
				'description'         => __( 'Projekat Description', 'stag' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-list-view',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => 'projekti',
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',
				'show_in_rest'        => true,
			);

			register_post_type( 'projekat', $args );
		}
	}
}

new Stag_CPT_Projekti();
