<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Forbes2022
 */

use function ForbesLibrary\WordPress\Forbes2022\get_breadcrumbs;

$post_type_name = get_post_type_object( get_post_type() )->labels->singular_name;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<?php
		if ( is_singular() ) {
			echo get_breadcrumbs();
			the_title( '<h1 class="post-title">', '</h1>' );
			echo '<div class="post-date">' . get_the_date() . '</div>';
			the_tags( '<div class="post-tags">', '', '</div>' );
		} else {
			the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			edit_post_link( 'Edit ' . $post_type_name );
		}
		?>
	</header><!-- .post-header -->

	<div class="post-content">
		<?php
		$content_array = get_extended( $post->post_content );
		$has_more      = $content_array['extended'];
		if ( ! is_singular() && $has_more ) {
			echo get_the_date() . ' – ';
		}
		if ( is_singular() || $has_more ) {
			the_content( 'See the full ' . strtolower( $post_type_name ) . '…' );
		} else {
			the_excerpt();
		}

		if ( is_singular() ) {
			wp_link_pages(
				array(
					'before' => '<div class="page-links">Pages:',
					'after'  => '</div>',
				)
			);
		}
		?>
	</div><!-- .post-content -->
</article><!-- #post-<?php the_ID(); ?> -->
