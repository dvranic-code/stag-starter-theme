<?php 
namespace stag_theme;

use stag_theme\Controllers\Enqueue;
use stag_theme\ACF\ACFRegisterBlocks;
use stag_theme\ACF\ACFSettings;
use stag_theme\ThemeSettings\Customizer;
use stag_theme\ThemeSettings\ThemeSetup;

class ThemeInit 
{
    function __construct()
    {
        // add_filter( 'show_admin_bar', '__return_false' ); // to hide admin bar on FE please remove this comment
    
        
        ThemeSetup::getInstance();
        Enqueue::getInstance();
        ACFRegisterBlocks::getInstance();
        ACFSettings::getInstance();
        Customizer::getInstance();
    }

}