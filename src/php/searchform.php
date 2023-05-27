<?php
/**
 * Displays the search form shown in the header
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Forbes2022
 */

/** We use Unique_ID since we sometimes have multiple search forms on a page. */
require_once 'class-unique-id.php';

use ForbesLibrary\WordPress\Forbes2022\Unique_ID;
use function ForbesLibrary\WordPress\Forbes2022\get_search_preference;

$form_id           = new Unique_ID( 'search-form-' );
$search_preference = get_search_preference();
?>
<form role="search" aria-label="Website and Catalog" method="get" class="search-form" action="<?php echo esc_url( home_url() ); ?>">
	<label class="screen-reader-text" for="<?php $form_id->echo(); ?>-input">Search for:</label>
	<input class="search-box" id="<?php $form_id->echo(); ?>-input" type="search" value="<?php echo get_search_query(); ?>" name="s" required>
	<button class="search-button"><span class="icon-search icon"><span class="screen-reader-text">Search</span></span></button>
	<fieldset class="search-options">
		<legend class="screen-reader-text">What to search</legend>
		<label class="inline" for="<?php $form_id->echo(); ?>-website">
			<input id="<?php $form_id->echo(); ?>-website" class="search-website" name="search-target" value="website" <?php checked( $search_preference, 'website' ); ?> type="radio">
			Website
		</label>
		<label class="inline" for="<?php $form_id->echo(); ?>-catalog">
			<input id="<?php $form_id->echo(); ?>-catalog" class="search-catalog" name="search-target" value="catalog" <?php checked( $search_preference, 'catalog' ); ?> type="radio">
			Catalog
		</label>
	</fieldset>
	<input id="<?php $form_id->echo(); ?>-catalog-scope" class="catalog-scope" type="hidden" name="locg" value="1">
</form>
