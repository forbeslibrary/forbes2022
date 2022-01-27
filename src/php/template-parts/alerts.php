<?php
/**
 * Displays the alerts at the top of each page.
 *
 * This will display the first 10 posts with a category of 'alert'. We should
 * never have that many alerts, but we cap the number retrieved just in case.
 *
 * @package Forbes2022
 */

$query = new WP_Query(
	array(
		'category_name'          => 'alerts',
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'posts_per_page'         => 10,
	)
);

if ( $query->have_posts() ) {
	echo '<aside role="alert" id="alerts">';
	while ( $query->have_posts() ) {
		$query->the_post();
		$content_array = get_extended( $post->post_content );
		$has_more      = $content_array['extended'];
		$more_text     = $content_array ['more_text'] ? $content_array['more_text'] : 'Learn More';
		?>
		<section <?php post_class(); ?>>
		<div class="alert-content">
			<?php the_content( '' ); ?>
		</div>
		<?php if ( $has_more ) : ?>
			<?php echo sprintf( '<a href="%s" rel="bookmark" class="read-more">%s</a>', esc_url( get_permalink() ), esc_html( $more_text ) ); ?>
		<?php endif; ?>
		<?php edit_post_link( 'Edit Alert', '<div class="admin">', '</div>' ); ?>
		</section>
		<?php
	}
	echo '</aside>';
}
wp_reset_postdata();
