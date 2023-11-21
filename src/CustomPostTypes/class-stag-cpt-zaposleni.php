<?php
/**
 * Custom Post Type: Zaposleni
 *
 * @package GenerateChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Stag_CPT_Zaposleni' ) ) {
	/**
	 * Custom Post Type: Zaposleni
	 *
	 * @package GenerateChild
	 * @since 1.0.0
	 */
	class Stag_CPT_Zaposleni {
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
				'name'                  => _x( 'Zaposleni', 'Post Type General Name', 'generatepress-child' ),
				'singular_name'         => _x( 'Zaposlen', 'Post Type Singular Name', 'generatepress-child' ),
				'menu_name'             => __( 'Zaposleni', 'generatepress-child' ),
				'name_admin_bar'        => __( 'Zaposlen', 'generatepress-child' ),
				'archives'              => __( 'Zaposleni Archives', 'generatepress-child' ),
				'attributes'            => __( 'Zaposleni Attributes', 'generatepress-child' ),
				'parent_item_colon'     => __( 'Parent Zaposlen:', 'generatepress-child' ),
				'all_items'             => __( 'All Zaposleni', 'generatepress-child' ),
				'add_new_item'          => __( 'Add New Zaposlen', 'generatepress-child' ),
				'add_new'               => __( 'Add New', 'generatepress-child' ),
				'new_item'              => __( 'New Zaposlen', 'generatepress-child' ),
				'edit_item'             => __( 'Edit Zaposlen', 'generatepress-child' ),
				'update_item'           => __( 'Update Zaposlen', 'generatepress-child' ),
				'view_item'             => __( 'View Zaposlen', 'generatepress-child' ),
				'view_items'            => __( 'View Zaposleni', 'generatepress-child' ),
				'search_items'          => __( 'Search Zaposlen', 'generatepress-child' ),
				'not_found'             => __( 'Not found', 'generatepress-child' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'generatepress-child' ),
				'featured_image'        => __( 'Featured Image', 'generatepress-child' ),
				'set_featured_image'    => __( 'Set featured image', 'generatepress-child' ),
				'remove_featured_image' => __( 'Remove featured image', 'generatepress-child' ),
				'use_featured_image'    => __( 'Use as featured image', 'generatepress-child' ),
			);

			$args = array(
				'label'               => __( 'Zaposlen', 'generatepress-child' ),
				'description'         => __( 'Zaposlen Description', 'generatepress-child' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-admin-users',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => 'zaposleni',
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',
				'show_in_rest'        => true,
			);

			register_post_type( 'zaposleni', $args );
		}
	}
}

new Stag_CPT_Zaposleni();
