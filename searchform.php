<?php
/**
 * The template for displaying search forms.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Stag_Starter_Theme
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php pll_e( 'Тражим...' ); ?></span>
		<input type="search" class="search-form__search-field" placeholder="<?php pll_e( 'Тражим...' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="Search for:" />
	</label>
	<button type="submit" class="search-form__button">
	<svg xmlns="http://www.w3.org/2000/svg" width="35" height="32" viewBox="0 0 35 32" fill="none">
		<path d="M34.4693 29.6895L24.9386 21.9495C28.8664 16.5776 28.4621 8.89531 23.5523 4.04332C20.9531 1.44404 17.4874 0 13.7906 0C10.0939 0 6.62816 1.44404 4.02888 4.04332C-1.34296 9.41516 -1.34296 18.1949 4.02888 23.5668C6.62816 26.1661 10.0939 27.6101 13.7906 27.6101C17.3141 27.6101 20.6065 26.2816 23.2058 23.9134L32.852 31.7112C33.083 31.8845 33.3718 32 33.6606 32C34.065 32 34.4116 31.8267 34.6426 31.5379C35.1047 30.9603 35.0469 30.1516 34.4693 29.6895ZM13.7906 25.0108C10.787 25.0108 8.01444 23.8556 5.87726 21.7184C1.48736 17.3285 1.48736 10.2238 5.87726 5.8917C8.01444 3.75451 10.787 2.59928 13.7906 2.59928C16.7942 2.59928 19.5668 3.75451 21.704 5.8917C26.0939 10.2816 26.0939 17.3863 21.704 21.7184C19.6245 23.8556 16.7942 25.0108 13.7906 25.0108Z" fill="#003FE2"/>
	</svg>
	</button>
</form>