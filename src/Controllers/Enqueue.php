<?php 

namespace pacvueTheme\Controllers;

use pacvueTheme\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) exit;

class Enqueue 
{  
    use Singleton;

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'themeEnqueueStyles']);
        add_action('admin_enqueue_scripts', [$this, 'adminEnqueueStyles']);
    }

    public function themeEnqueueStyles()
    {
        $theTheme = wp_get_theme();

        $themeVersion = $theTheme->get( 'Version' );

        $cssVersionChild = $themeVersion . '.' . filemtime( get_stylesheet_directory() . '/assets/public/dist/css/theme.min.css');
        $jsVersionChild = $themeVersion . '.' . filemtime( get_stylesheet_directory() . '/assets/public/dist/js/theme.min.js');

        // Swiper style
        wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
        // Theme style
        wp_enqueue_style('stag-theme-styles', get_stylesheet_directory_uri() . '/assets/public/dist/css/theme.min.css', array(), $cssVersionChild);

        // Swiper script
        wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), false, true);
        // Theme script
        wp_enqueue_script('stag-theme-scripts', get_stylesheet_directory_uri() . '/assets/public/dist/js/theme.min.js', array(), $jsVersionChild, true);
    }

    public function adminEnqueueStyles()
    {
        wp_enqueue_style('stag-admin-styles', get_stylesheet_directory_uri() . '/assets/admin/dist/css/theme-admin.min.css', array(), '');
    }
}
