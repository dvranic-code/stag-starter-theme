<?php
/**
 * All the strings that need to be translated for Polylang.
 *
 * @package stag-starter-theme
 */

/**
 *  Example usage: pll_register_string( $name, $string, $group, $multiline );
 *
 *  $name (string) (Required) The name of the string to register.
 */

// Group: Search.
pll_register_string( 'search', 'Тражим...', 'search' );
pll_register_string( 'search', 'Резултати претраге за:', 'search' );
pll_register_string( 'search', 'Још резултата', 'search' );

// Group: Index.
pll_register_string( 'index', 'Још чланака', 'index' );

// Group: 404.
pll_register_string( '404', 'Упс, нешто се десило... страница не постоји.', '404' );

// Group: General.
pll_register_string( 'general', 'Спремни сте за објаву вашег првог чланка? <a href="%1$s">Почните овде</a>.', 'general' );
pll_register_string( 'general', 'Нема резултата претраге.', 'general' );
pll_register_string( 'general', 'Изгледа да не можемо пронаћи оно шта тражите. Можда претрага може помоћи.', 'general' );