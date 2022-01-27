<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Forbes2022
 */

get_header();
?>
<main id="main">
	<h1 class="post-title">Error 404</h1>
	Oh gosh! We cannot find that page!
	<p>
		You may use the search form below. If you still can't find what you are
		looking for, please <a href="http://forbeslibrary.org/info/contact/">contact
		us</a>.
	</p>
	<?php get_search_form(); ?>
</main>
<?php
get_footer();
