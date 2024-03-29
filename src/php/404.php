<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Forbes2022
 */

get_header();
?>
	<h1 class="post-title">Error 404</h1>
	Oh gosh! We cannot find that page!
	<img id="image404"
		src="<?php echo esc_url( get_theme_file_uri( '/assets/img/404-image-aliens_from_fifties.jpg' ) ); ?>"
		alt=""
	>
	<p>
		You can visit our <a <?php echo 'href="' . esc_url( home_url() ) . '" title="Forbes Library Home" rel="home"'; ?>>home page</a> or use the search form below. If you still can't find what you are
		looking for, please <a href="http://forbeslibrary.org/info/contact/">contact&nbsp;us</a>.
	</p>
	<?php get_search_form(); ?>
<?php
get_footer();
