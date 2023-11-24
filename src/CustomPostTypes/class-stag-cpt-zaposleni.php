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
				'name'                  => _x( 'Zaposleni', 'Post Type General Name', 'stag' ),
				'singular_name'         => _x( 'Zaposlen', 'Post Type Singular Name', 'stag' ),
				'menu_name'             => __( 'Zaposleni', 'stag' ),
				'name_admin_bar'        => __( 'Zaposlen', 'stag' ),
				'archives'              => __( 'Zaposleni Archives', 'stag' ),
				'attributes'            => __( 'Zaposleni Attributes', 'stag' ),
				'parent_item_colon'     => __( 'Parent Zaposlen:', 'stag' ),
				'all_items'             => __( 'All Zaposleni', 'stag' ),
				'add_new_item'          => __( 'Add New Zaposlen', 'stag' ),
				'add_new'               => __( 'Add New', 'stag' ),
				'new_item'              => __( 'New Zaposlen', 'stag' ),
				'edit_item'             => __( 'Edit Zaposlen', 'stag' ),
				'update_item'           => __( 'Update Zaposlen', 'stag' ),
				'view_item'             => __( 'View Zaposlen', 'stag' ),
				'view_items'            => __( 'View Zaposleni', 'stag' ),
				'search_items'          => __( 'Search Zaposlen', 'stag' ),
				'not_found'             => __( 'Not found', 'stag' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'stag' ),
				'featured_image'        => __( 'Featured Image', 'stag' ),
				'set_featured_image'    => __( 'Set featured image', 'stag' ),
				'remove_featured_image' => __( 'Remove featured image', 'stag' ),
				'use_featured_image'    => __( 'Use as featured image', 'stag' ),
			);

			$args = array(
				'label'               => __( 'Zaposlen', 'stag' ),
				'description'         => __( 'Zaposlen Description', 'stag' ),
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
