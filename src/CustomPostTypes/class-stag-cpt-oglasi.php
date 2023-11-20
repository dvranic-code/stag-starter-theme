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
				'name'                  => _x( 'Oglasi', 'Post Type General Name', 'generatepress-child' ),
				'singular_name'         => _x( 'Oglas', 'Post Type Singular Name', 'generatepress-child' ),
				'menu_name'             => __( 'Oglasi', 'generatepress-child' ),
				'name_admin_bar'        => __( 'Oglas', 'generatepress-child' ),
				'archives'              => __( 'Oglasi Archives', 'generatepress-child' ),
				'attributes'            => __( 'Oglasi Attributes', 'generatepress-child' ),
				'parent_item_colon'     => __( 'Parent Oglas:', 'generatepress-child' ),
				'all_items'             => __( 'All Oglasi', 'generatepress-child' ),
				'add_new_item'          => __( 'Add New Oglas', 'generatepress-child' ),
				'add_new'               => __( 'Add New', 'generatepress-child' ),
				'new_item'              => __( 'New Oglas', 'generatepress-child' ),
				'edit_item'             => __( 'Edit Oglas', 'generatepress-child' ),
				'update_item'           => __( 'Update Oglas', 'generatepress-child' ),
				'view_item'             => __( 'View Oglas', 'generatepress-child' ),
				'view_items'            => __( 'View Oglasi', 'generatepress-child' ),
				'search_items'          => __( 'Search Oglas', 'generatepress-child' ),
				'not_found'             => __( 'Not found', 'generatepress-child' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'generatepress-child' ),
				'featured_image'        => __( 'Featured Image', 'generatepress-child' ),
				'set_featured_image'    => __( 'Set featured image', 'generatepress-child' ),
				'remove_featured_image' => __( 'Remove featured image', 'generatepress-child' ),
				'use_featured_image'    => __( 'Use as featured image', 'generatepress-child' ),
			);

			$args = array(
				'label'               => __( 'Oglas', 'generatepress-child' ),
				'description'         => __( 'Oglas Description', 'generatepress-child' ),
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
				'name'                       => _x( 'Tipovi Oglasa', 'Taxonomy General Name', 'generatepress-child' ),
				'singular_name'              => _x( 'Tip Oglasa', 'Taxonomy Singular Name', 'generatepress-child' ),
				'menu_name'                  => __( 'Tipovi Oglasa', 'generatepress-child' ),
				'all_items'                  => __( 'Svi Tipovi Oglasa', 'generatepress-child' ),
				'parent_item'                => __( 'Roditeljski Tip Oglasa', 'generatepress-child' ),
				'parent_item_colon'          => __( 'Roditeljski Tip Oglasa:', 'generatepress-child' ),
				'new_item_name'              => __( 'Novi Naziv Tipa Oglasa', 'generatepress-child' ),
				'add_new_item'               => __( 'Dodaj Novi Tip Oglasa', 'generatepress-child' ),
				'edit_item'                  => __( 'Uredi Tip Oglasa', 'generatepress-child' ),
				'update_item'                => __( 'Ažuriraj Tip Oglasa', 'generatepress-child' ),
				'view_item'                  => __( 'Pogledaj Tip Oglasa', 'generatepress-child' ),
				'separate_items_with_commas' => __( 'Odvoji Tipove Oglasa zarezima', 'generatepress-child' ),
				'add_or_remove_items'        => __( 'Dodaj ili ukloni Tipove Oglasa', 'generatepress-child' ),
				'choose_from_most_used'      => __( 'Izaberi iz najkorišćenijih', 'generatepress-child' ),
				'popular_items'              => __( 'Popularni Tipovi Oglasa', 'generatepress-child' ),
				'search_items'               => __( 'Pretraži Tipove Oglasa', 'generatepress-child' ),
				'not_found'                  => __( 'Nije pronađeno', 'generatepress-child' ),
				'no_terms'                   => __( 'Nema Tipova Oglasa', 'generatepress-child' ),
				'items_list'                 => __( 'Lista Tipova Oglasa', 'generatepress-child' ),
				'items_list_navigation'      => __( 'Navigacija kroz listu Tipova Oglasa', 'generatepress-child' ),
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
