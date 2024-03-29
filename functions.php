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

define( 'THEME_NAME', 'stag' );
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URL', get_template_directory_uri() );

/**
 * Include Stag Theme Classes
 */
// Include Theme Settings Classes.
require_once THEME_DIR . '/src/ThemeSettings/class-stag-theme-setup.php';
require_once THEME_DIR . '/src/ThemeSettings/class-stag-template-tags.php';
require_once THEME_DIR . '/src/ThemeSettings/class-stag-customizer.php';

// Include ACF Classes.
require_once THEME_DIR . '/src/ACF/class-stag-acf-register-blocks.php';
require_once THEME_DIR . '/src/ACF/class-stag-acf-settings.php';

// Include Controler Classes.
require_once THEME_DIR . '/src/Controllers/class-stag-enqueue.php';
