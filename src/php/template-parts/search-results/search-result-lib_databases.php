<?php
/**
 * Template part for displaying the lib_databases custom post type in search
 * results.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Forbes2022
 */

use function ForbesLibrary\WordPress\Forbes2022\get_breadcrumbs;
use ForbesLibrary\WordPress\LibraryDatabases\Database;

if ( is_singular() ) {
  echo get_breadcrumbs();
}
$database = new Database( get_post() );
$database->show();
