<?php
/**
 * The functions.php file for the Stag Starter Theme.
 *
 * @package Stag_Starter_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

define( 'THEME_NAME', 'STAG Starter Theme' );
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URL', get_template_directory_uri() );

/**
 * Include themeinit class
 */
require_once THEME_DIR . '/src/class-themeinit.php';
