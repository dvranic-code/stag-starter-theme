<?php 

namespace stag_theme\ACF;

use stag_theme\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) exit;

class ACFSettings
{  
    use Singleton;

    public function __construct()
    {
        add_action('acf/init', [$this, 'addOptions']);
    }

    public function addOptions() 
    {
        if( function_exists('acf_add_options_page') ) 
        {
            acf_add_options_page(array(
                'page_title' 	=> __( 'Theme Settings', 'stag-theme' ),
                'menu_title'	=> __( 'Theme Settings', 'stag-theme' ),
                'menu_slug' 	=> 'theme-settings', 
                'icon_url'      => 'dashicons-art'
            ));
        }
    }
}