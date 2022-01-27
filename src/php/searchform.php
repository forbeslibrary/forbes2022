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
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url() ); ?>">
	<label class="screen-reader-text" for="<?php $form_id->echo(); ?>-input">Search for:</label>
	<input class="search-box" id="<?php $form_id->echo(); ?>-input" type="search" value="<?php echo get_search_query(); ?>" name="s" required>
	<button class="search-button"><span class="icon-search icon"><span class="screen-reader-text">Search</span></span></button>
	<div class="search-options">
		<fieldset>
			<legend class="screen-reader-text">What to search</legend>
			<input id="<?php $form_id->echo(); ?>-website" class="search-website" name="search-target" value="website" <?php checked( $search_preference, 'website' ); ?> type="radio"><label class="inline" for="<?php $form_id->echo(); ?>-website">Website</label>
			<input id="<?php $form_id->echo(); ?>-catalog" class="search-catalog" name="search-target" value="catalog" <?php checked( $search_preference, 'catalog' ); ?> type="radio"><label class="inline" for="<?php $form_id->echo(); ?>-catalog">Catalog</label>
		</fieldset>
		<a class="advanced-search-link" href="https://northamptn.cwmars.org/eg/opac/advanced?locg=1">Advanced Catalog Search</a>
	</div>
	<input id="<?php $form_id->echo(); ?>-catalog-scope" class="catalog-scope" type="hidden" name="locg" value="1">
</form>
