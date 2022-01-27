<?php
/**
 * Displayed if there are no search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Forbes2022
 */

use function ForbesLibrary\WordPress\Forbes2022\get_home_url_for_display;
?>
<p class="no-results">
	Your search – <strong><?php echo get_search_query(); ?></strong> – did not match any pages on
	<?php echo get_home_url_for_display(); ?>
</p>
