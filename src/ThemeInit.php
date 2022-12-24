<?php 
namespace stagTheme;

use stagTheme\Controllers\Enqueue;
use stagTheme\ACF\ACFRegisterBlocks;
use stagTheme\ACF\ACFSettings;
use stagTheme\ThemeSettings\Customizer;
use stagTheme\ThemeSettings\ThemeSetup;

class ThemeInit 
{
    function __construct()
    {
        add_filter( 'show_admin_bar', '__return_false' );
        
        ThemeSetup::getInstance();
        Enqueue::getInstance();
        ACFRegisterBlocks::getInstance();
        ACFSettings::getInstance();
        Customizer::getInstance();
    }

}