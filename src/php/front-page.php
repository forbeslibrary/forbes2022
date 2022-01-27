<?php
/**
 * The front page template file
 *
 * This is used on the front page of the site, i.e. the base url
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Forbes2022
 */

get_header();
?>

	<main id="main" class="site-main">

	<?php
	if ( have_posts() ) {
		// Load posts loop.
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/content', get_post_type() );
		}
	} else {
		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content', 'none' );
	}
	?>
	</main><!-- .site-main -->

<?php
get_footer();
