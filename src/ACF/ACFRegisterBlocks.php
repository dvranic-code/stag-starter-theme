<?php 

namespace stagTheme\ACF;

use stagTheme\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) exit;

class ACFRegisterBlocks 
{  
    use Singleton;

    public function __construct()
    {
        add_action('init', [$this, 'registerBlocks']);
    }

    public function registerBlocks()
    {
        // Check function exists.
        if( function_exists('register_block_type') ) {
            /**
             * Block Name
             */
            // register_block_type( get_template_directory(  ) . '/blocks/block_name' );
        }
    }
}