<?php 
namespace pacvueTheme;

use pacvueTheme\Controllers\Enqueue;
use pacvueTheme\ACF\ACFRegisterBlocks;
use pacvueTheme\ACF\ACFSettings;
use pacvueTheme\ThemeSettings\Customizer;
use pacvueTheme\ThemeSettings\ThemeSetup;

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