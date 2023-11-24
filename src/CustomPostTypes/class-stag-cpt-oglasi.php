<?php
/**
 * Custom Post Type: Oglasi
 *
 * @package GenerateChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Stag_CPT_Oglasi' ) ) {
	/**
	 * Custom Post Type: Oglasi
	 *
	 * @package GenerateChild
	 * @since 1.0.0
	 */
	class Stag_CPT_Oglasi {
		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'register_post_type' ) );
			add_action( 'init', array( $this, 'register_taxonomy' ) );
		}
		/**
		 * Register Custom Post Type
		 */
		public function register_post_type() {
			$labels = array(
				'name'                  => _x( 'Oglasi', 'Post Type General Name', 'stag' ),
				'singular_name'         => _x( 'Oglas', 'Post Type Singular Name', 'stag' ),
				'menu_name'             => __( 'Oglasi', 'stag' ),
				'name_admin_bar'        => __( 'Oglas', 'stag' ),
				'archives'              => __( 'Oglasi Archives', 'stag' ),
				'attributes'            => __( 'Oglasi Attributes', 'stag' ),
				'parent_item_colon'     => __( 'Parent Oglas:', 'stag' ),
				'all_items'             => __( 'All Oglasi', 'stag' ),
				'add_new_item'          => __( 'Add New Oglas', 'stag' ),
				'add_new'               => __( 'Add New', 'stag' ),
				'new_item'              => __( 'New Oglas', 'stag' ),
				'edit_item'             => __( 'Edit Oglas', 'stag' ),
				'update_item'           => __( 'Update Oglas', 'stag' ),
				'view_item'             => __( 'View Oglas', 'stag' ),
				'view_items'            => __( 'View Oglasi', 'stag' ),
				'search_items'          => __( 'Search Oglas', 'stag' ),
				'not_found'             => __( 'Not found', 'stag' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'stag' ),
				'featured_image'        => __( 'Featured Image', 'stag' ),
				'set_featured_image'    => __( 'Set featured image', 'stag' ),
				'remove_featured_image' => __( 'Remove featured image', 'stag' ),
				'use_featured_image'    => __( 'Use as featured image', 'stag' ),
			);

			$args = array(
				'label'               => __( 'Oglas', 'stag' ),
				'description'         => __( 'Oglas Description', 'stag' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
				'taxonomies'          => array( 'tipovi_oglasa' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-welcome-widgets-menus',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => 'oglasi',
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
				'show_in_rest'        => true,
			);

			register_post_type( 'oglas', $args );
		}


		/**
		 * Register Custom Taxonomy
		 */
		/**
		 * Register Custom Taxonomy
		 */
		public function register_taxonomy() {
			$labels = array(
				'name'                       => _x( 'Tipovi Oglasa', 'Taxonomy General Name', 'stag' ),
				'singular_name'              => _x( 'Tip Oglasa', 'Taxonomy Singular Name', 'stag' ),
				'menu_name'                  => __( 'Tipovi Oglasa', 'stag' ),
				'all_items'                  => __( 'Svi Tipovi Oglasa', 'stag' ),
				'parent_item'                => __( 'Roditeljski Tip Oglasa', 'stag' ),
				'parent_item_colon'          => __( 'Roditeljski Tip Oglasa:', 'stag' ),
				'new_item_name'              => __( 'Novi Naziv Tipa Oglasa', 'stag' ),
				'add_new_item'               => __( 'Dodaj Novi Tip Oglasa', 'stag' ),
				'edit_item'                  => __( 'Uredi Tip Oglasa', 'stag' ),
				'update_item'                => __( 'Ažuriraj Tip Oglasa', 'stag' ),
				'view_item'                  => __( 'Pogledaj Tip Oglasa', 'stag' ),
				'separate_items_with_commas' => __( 'Odvoji Tipove Oglasa zarezima', 'stag' ),
				'add_or_remove_items'        => __( 'Dodaj ili ukloni Tipove Oglasa', 'stag' ),
				'choose_from_most_used'      => __( 'Izaberi iz najkorišćenijih', 'stag' ),
				'popular_items'              => __( 'Popularni Tipovi Oglasa', 'stag' ),
				'search_items'               => __( 'Pretraži Tipove Oglasa', 'stag' ),
				'not_found'                  => __( 'Nije pronađeno', 'stag' ),
				'no_terms'                   => __( 'Nema Tipova Oglasa', 'stag' ),
				'items_list'                 => __( 'Lista Tipova Oglasa', 'stag' ),
				'items_list_navigation'      => __( 'Navigacija kroz listu Tipova Oglasa', 'stag' ),
			);

			$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_in_rest'      => true,
			);

			register_taxonomy( 'tipovi_oglasa', array( 'oglas' ), $args );
		}
	}
}

new Stag_CPT_Oglasi();
