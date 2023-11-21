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
				'name'                  => _x( 'Projekti', 'Post Type General Name', 'generatepress-child' ),
				'singular_name'         => _x( 'Projekat', 'Post Type Singular Name', 'generatepress-child' ),
				'menu_name'             => __( 'Projekti', 'generatepress-child' ),
				'name_admin_bar'        => __( 'Projekat', 'generatepress-child' ),
				'archives'              => __( 'Projekti Archives', 'generatepress-child' ),
				'attributes'            => __( 'Projekti Attributes', 'generatepress-child' ),
				'parent_item_colon'     => __( 'Parent Projekat:', 'generatepress-child' ),
				'all_items'             => __( 'All Projekti', 'generatepress-child' ),
				'add_new_item'          => __( 'Add New Projekat', 'generatepress-child' ),
				'add_new'               => __( 'Add New', 'generatepress-child' ),
				'new_item'              => __( 'New Projekat', 'generatepress-child' ),
				'edit_item'             => __( 'Edit Projekat', 'generatepress-child' ),
				'update_item'           => __( 'Update Projekat', 'generatepress-child' ),
				'view_item'             => __( 'View Projekat', 'generatepress-child' ),
				'view_items'            => __( 'View Projekti', 'generatepress-child' ),
				'search_items'          => __( 'Search Projekat', 'generatepress-child' ),
				'not_found'             => __( 'Not found', 'generatepress-child' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'generatepress-child' ),
				'featured_image'        => __( 'Featured Image', 'generatepress-child' ),
				'set_featured_image'    => __( 'Set featured image', 'generatepress-child' ),
				'remove_featured_image' => __( 'Remove featured image', 'generatepress-child' ),
				'use_featured_image'    => __( 'Use as featured image', 'generatepress-child' ),
			);

			$args = array(
				'label'               => __( 'Projekat', 'generatepress-child' ),
				'description'         => __( 'Projekat Description', 'generatepress-child' ),
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
