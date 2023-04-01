<?php
/**
 * The search results template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Forbes2022
 */

use function ForbesLibrary\WordPress\Forbes2022\get_home_url_for_display;
use function ForbesLibrary\WordPress\Forbes2022\get_page_number_display;
use function ForbesLibrary\WordPress\Forbes2022\get_pagination;

get_header();
?>
<header id="search-results-header">
	<h1 class="post-title">
		Search results from <?php echo get_home_url_for_display(); ?>
	</h1>
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url() ); ?>">
		<label class="screen-reader-text" for="search-header-input">Search for:</label>
		<input class="search-box" id="search-header-input" type="search" value="<?php echo get_search_query(); ?>" name="s" required>
		<button class="search-button"><span class="icon-search icon"><span class="screen-reader-text">Search</span></span></button>
	</form>
</header>

<?php
if ( have_posts() ) {
	echo get_page_number_display();
	// Load posts loop.
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/search-results/search-result', get_post_type() );
	}
} else {
	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/search-results/search-result', 'none' );
}

echo get_pagination();
get_footer();
