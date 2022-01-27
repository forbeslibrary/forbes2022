<?php
/**
 * Template part for search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Forbes2022
 */

use function ForbesLibrary\WordPress\Forbes2022\get_breadcrumbs;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<?php
			the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			edit_post_link( 'Edit ' . get_post_type_object( get_post_type() )->labels->singular_name );
			echo get_breadcrumbs( ' > ' );
		?>
	</header><!-- .post-header -->

	<div class="post-content">
		<?php the_excerpt(); ?>
	</div><!-- .post-content -->
</article><!-- #post-<?php the_ID(); ?> -->
