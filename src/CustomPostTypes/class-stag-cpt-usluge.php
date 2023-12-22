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
			add_action( 'init', array( $this, 'register_taxonomy' ) );
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
				'supports'            => array( 'title', 'custom-fields' ),
				'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-code-standards',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'rewrite'             => false,
				'slug'                => 'dijagnosticke-usluge',
				'has_archive'         => false,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
				'show_in_rest'        => true,
			);

			register_post_type( 'usluge', $args );
		}

		/**
		 * Register Custom Taxonomy
		 */
		public function register_taxonomy() {
			$labels = array(
				'name'                       => _x( 'Tipovi Dijagnostike', 'Taxonomy General Name', 'stag' ),
				'singular_name'              => _x( 'Tip Dijagnostike', 'Taxonomy Singular Name', 'stag' ),
				'menu_name'                  => __( 'Tipovi Dijagnostike', 'stag' ),
				'all_items'                  => __( 'Svi Tipovi Dijagnostike', 'stag' ),
				'parent_item'                => __( 'Roditeljski Tip Dijagnostike', 'stag' ),
				'parent_item_colon'          => __( 'Roditeljski Tip Dijagnostike:', 'stag' ),
				'new_item_name'              => __( 'Novi Naziv Tipa Dijagnostike', 'stag' ),
				'add_new_item'               => __( 'Dodaj Novi Tip Dijagnostike', 'stag' ),
				'edit_item'                  => __( 'Uredi Tip Dijagnostike', 'stag' ),
				'update_item'                => __( 'Ažuriraj Tip Dijagnostike', 'stag' ),
				'view_item'                  => __( 'Pogledaj Tip Dijagnostike', 'stag' ),
				'separate_items_with_commas' => __( 'Odvoji Tipove Dijagnostike zarezima', 'stag' ),
				'add_or_remove_items'        => __( 'Dodaj ili ukloni Tipove Dijagnostike', 'stag' ),
				'choose_from_most_used'      => __( 'Izaberi iz najkorišćenijih', 'stag' ),
				'popular_items'              => __( 'Popularni Tipovi Dijagnostike', 'stag' ),
				'search_items'               => __( 'Pretraži Tipove Dijagnostike', 'stag' ),
				'not_found'                  => __( 'Nije pronađeno', 'stag' ),
				'no_terms'                   => __( 'Nema Tipova Dijagnostike', 'stag' ),
				'items_list'                 => __( 'Lista Tipova Dijagnostike', 'stag' ),
				'items_list_navigation'      => __( 'Navigacija kroz listu Tipova Dijagnostike', 'stag' ),
			);

			$args = array(
				'labels'             => $labels,
				'hierarchical'       => true,
				'public'             => false,
				'show_ui'            => true,
				'show_admin_column'  => true,
				'show_in_nav_menus'  => true,
				'show_in_rest'       => true,
				'publicly_queryable' => true,
			);

			register_taxonomy( 'tip_dijagnostike', array( 'usluge' ), $args );
		}
	}
}

new Stag_CPT_Usluge();
