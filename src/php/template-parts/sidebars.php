<?php
/**
 * Displays the sidebars / widget areas
 *
 * Sidebars must be registered before they can be displayed. Sidebars for this
 * theme are registed in the register_sidebars() function in functions.php.
 *
 * @package Forbes2022
 */

use function ForbesLibrary\WordPress\Forbes2022\get_top_level_slug;

if ( is_front_page() ) {
	dynamic_sidebar( 'main-page-widget-area-1' );
	dynamic_sidebar( 'main-page-widget-area-2' );
}

if ( 'coolidge' === get_top_level_slug() ) {
	dynamic_sidebar( 'coolidge-widget-area' );
}

if ( 'events' === get_top_level_slug() ) {
	dynamic_sidebar( 'events-widget-area' );
}
