<?php
/**
 * The ThemeSetup class sets up the theme by registering menus, sidebars, scripts, and styles.
 *
 * @package Stag_Starter_Theme
 */

namespace stag_theme\ThemeSettings;

use stag_theme\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The ThemeSetup class contains methods for setting up the theme.
 *
 * @since 1.0.0
 */
class ThemeSetup {

	use Singleton;

	/**
	 * Class constructor.
	 *
	 * Initializes the ThemeSetup class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, '_s_setup' ) );
		add_action( 'after_setup_theme', array( $this, '_s_content_width' ) );
		add_filter( 'body_class', array( $this, '_s_body_classes' ) );
		add_action( 'wp_head', array( $this, '_s_pingback_header' ) );
	}

	/**
	 * Sets up the theme settings.
	 *
	 * @return void
	 */
	public function s_setup() {
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'stag' ),
				'footer' => esc_html__( 'Footer Menu', 'stag' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'_s_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}

	/**
	 * Sets the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	public function s_content_width() {
		$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
	}

	/**
	 * Adds custom classes to the body element.
	 *
	 * @param array $classes An array of body classes.
	 * @return array An array of modified body classes.
	 */
	public function s_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}

	/**
	 * Adds the pingback header to the HTTP response headers.
	 *
	 * @return void
	 */
	public function s_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}
