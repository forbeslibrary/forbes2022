<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Forbes2022
 */

use function ForbesLibrary\WordPress\Forbes2022\get_archive_breadcrumbs;
use function ForbesLibrary\WordPress\Forbes2022\get_page_number_display;
use function ForbesLibrary\WordPress\Forbes2022\get_pagination;

get_header();
?>

	<main id="main" class="site-main">

	<?php if ( is_archive() || ! is_singular() ) : ?>
		<header>
			<?php
			if ( is_archive() ) {
				echo get_archive_breadcrumbs();
				the_archive_title('<h1 class="post-title">','</h1>');
			}

			if ( ! is_singular() ) {
				the_archive_description();
			}
			?>
		</header>
		<?php
	endif;

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

	if ( ! is_singular() ) {
		echo get_pagination();
	}
	?>

	</main><!-- .site-main -->

<?php
get_footer();
