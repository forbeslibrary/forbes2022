<?php
/**
 * Forbes2022 functions and definitions
 *
 * This file is automatically loaded by WordPress and is responsible for:
 * - Setting up theme defaults
 * - Registering support for various WordPress features
 * - Including any PHP code that is required by the theme but not in a template
 *
 * @package Forbes2022
 */

namespace ForbesLibrary\WordPress\Forbes2022;

require_once 'class-google-font.php';
use ForbesLibrary\WordPress\Forbes2022\Google_font;
$google_fonts = new Google_font( 'Source Serif Pro', 'ital,wght@0,400;0,600;0,700;1,400;1,600;1,700' );
$google_fonts->add_font_family( 'Montserrat', 'ital,wght@0,400;0,700;0,800;0,900;1,400;1,700;1,800;1,900' );
$google_fonts->register_hooks();

/**
 * Only use our own templates for the Library Databases plugin.
 */
add_filter( 'lib_database_use_plugin_templates', '__return_false' );

/**
 * Hook into WordPress so that theme setup is done at the right time.
 */
add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_setup' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_setup() : void {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'custom-units', 'rem', 'em' );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-font-sizes' );
	add_theme_support( 'disable-custom-gradients' );
	add_theme_support( 'editor-color-palette', get_color_palette() );
	add_theme_support( 'editor-gradient-presets', array() );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'post-thumbnails' ); // we don't actually do much with post thumbnails, but we still allow them
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'title-tag' );

	add_editor_style( 'assets/css/style-editor.min.css' );

	// Allow custom excerpts to be set for pages.
	add_post_type_support( 'page', 'excerpt' );

	register_nav_menus(
		array(
			'main-menu' => 'Main Menu',
		)
	);
}

/**
 * Hook into WordPress to queue our css assets.
 */
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\register_styles' );

/**
 * Register and enqueue styles.
 */
function register_styles() : void {
	wp_enqueue_style(
		'forbes2022-style',
		get_theme_file_uri( '/assets/css/style.min.css' ),
		array(),
		get_theme_version(),
	);

	wp_enqueue_style(
		'forbes2022-style-large',
		get_theme_file_uri( '/assets/css/style-large.min.css' ),
		array(),
		get_theme_version(),
		'all and (min-width: 50em)'
	);

	wp_enqueue_style(
		'forbes2022-style-wide',
		get_theme_file_uri( '/assets/css/style-wide.min.css' ),
		array(),
		get_theme_version(),
		'all and (min-width: 80em)'
	);

	wp_enqueue_style(
		'forbes2022-print',
		get_theme_file_uri( '/assets/css/print.min.css' ),
		array(),
		get_theme_version(),
		'print'
	);
}

/**
 * Hook into WordPress to queue our JavaScript assets.
 */
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\register_scripts' );

/**
 * Queues the JavaScript assets used by our theme.
 *
 * We put these scripts at the bottom of the page to improve page load times.
 */
function register_scripts() : void {

	wp_enqueue_script(
		'libraryh3lp',
		get_theme_file_uri( '/assets/js/forbes2022-libraryh3lp.js' ),
		array(), // No dependencies.
		get_theme_version(),
		true // Put in footer.
	);

	wp_enqueue_script(
		'accessibility',
		get_theme_file_uri( '/assets/js/accessibility.js' ),
		array(), // No dependencies.
		get_theme_version(),
		true // Put in footer.
	);

	wp_enqueue_script(
		'forbes2022-catalog-search',
		get_theme_file_uri( '/assets/js/catalog-search.js' ),
		array(), // No dependencies.
		get_theme_version(),
		true // Put in footer.
	);
}

/**
 * Hook into WordPress to register our widget areas
 */
add_action( 'widgets_init', __NAMESPACE__ . '\register_sidebars' );

/**
 * Register our widget areas.
 */
function register_sidebars() : void {
	$common_sidebar_attributes = array(
		'after_sidebar'  => '</aside>',
		'before_widget'  => '<section id="%1$s" class="%2$s">',
		'after_widget'   => '</section>',
		'before_title'   => '<h2>',
		'after_title'    => '</h2>',
	);

	register_sidebar(
		array_merge(
			$common_sidebar_attributes,
			array(
				'before_sidebar' => '<aside id="%1$s" class="%2$s" aria-label="Home Page Sidebar 1">',
				'name'        => 'Home Page Widget Area 1',
				'id'          => 'main-page-widget-area-1',
				'class'       => 'widget-area widget-area-left',
				'description' => 'Shown only on the home page. On large screens this appears on the left.',
			)
		)
	);

	register_sidebar(
		array_merge(
			$common_sidebar_attributes,
			array(
				'before_sidebar' => '<aside id="%1$s" class="%2$s" aria-label="Home Page Sidebar 2">',
				'name'        => 'Home Page Widget Area 2',
				'id'          => 'main-page-widget-area-2',
				'class'       => 'widget-area widget-area-right',
				'description' => 'Shown only on the home page. On large screens this appears on the right.',
			)
		)
	);

	register_sidebar(
		array_merge(
			$common_sidebar_attributes,
			array(
				'before_sidebar' => '<aside id="%1$s" class="%2$s" aria-label="Coolidge Sidebar">',
				'name'        => 'Coolidge Widget Area',
				'id'          => 'coolidge-widget-area',
				'class'       => 'widget-area widget-area-right',
				'description' => 'Shown on all Coolidge pages. On large screens this appears on the right.',
			)
		)
	);

	register_sidebar(
		array_merge(
			$common_sidebar_attributes,
			array(
				'before_sidebar' => '<aside id="%1$s" class="%2$s" aria-label="Events Sidebar">',
				'name'        => 'Events Widget Area',
				'id'          => 'events-widget-area',
				'class'       => 'widget-area widget-area-right',
				'description' => 'Shown on all Events pages. On large screens this appears on the right.',
			)
		)
	);
}

/**
 * Hook into WordPress to change the "read more" string.
 */
add_filter( 'excerpt_more', __NAMESPACE__ . '\excerpt_more' );

/**
 * Replace the default "read more" string
 *
 * @see https://developer.wordpress.org/reference/hooks/excerpt_more/
 *
 * @param string $more The string shown within the more link.
 */
function excerpt_more( $more ) : string {
		return '…';
}

/**
 * Hook into WordPress to modify the generated excerpt.
 */
add_filter( 'get_the_excerpt', __NAMESPACE__ . '\modify_exceprt', 999 );

/**
 * Change the exerpt.
 *
 * We add some placeholder text if the post is empty and we add the date to the
 * exceprt if the post type is 'post'.
 *
 * The exerpt is used on search results pages, archive pages, etc.
 *
 * @param string $excerpt The excerpt text.
 */
function modify_exceprt( $excerpt ) : string {
	if ( '' === trim( $excerpt ) ) {
		$excerpt = '&lt;no preview available&gt;';
	}
	if ( get_post_type() === 'post' ) {
		return get_the_date() . ' — ' . $excerpt;
	}
	return $excerpt;
}

/**
 * Hook into WordPress to modify post contents.
 */
add_filter( 'the_content', __NAMESPACE__ . '\modify_content', 999 );

/**
 * Change the content so placeholder text appears on empty posts.
 *
 * @param string $content Content of the current post.
 */
function modify_content( $content ) : string {
	if ( in_the_loop() && is_main_query() ) {
		if ( '' === trim( $content ) ) {
			return '<div class="empty">&lt;no content&gt;</div>';
		}
	}
	return $content;
}

/**
 * Hook into WordPress to modify the way the Relevanssi plugin creates its
 * excerpts. This will only be used if the Relevanssi plugin in installed.
 */
add_filter( 'relevanssi_excerpt_part', __NAMESPACE__ . '\relevanssi_excerpt_part', 10, 3 );

/**
 * Customize the Relevanssi Excerpt
 *
 * Make so we can use custom excerpts with Relevanssi. Also, in the case
 * that no custom excerpt is defined, makes sure that the excerpt begins at the
 * beginning of the post, even if the Relevanssi snippet begins further in.
 *
 * @see https://www.relevanssi.com/user-manual/filter-hooks/relevanssi_excerpt_part/
 *
 * @param string $excerpt_text The excerpt text, not used.
 * @param array  $excerpt      The full excerpt array.
 * @param int    $post_id      The id of the post.
 *
 * @return string The modified excerpt.
 */
function relevanssi_excerpt_part( string $excerpt_text, array $excerpt, int $post_id ) : string {
	$post = get_post( $post_id );

	if ( $post->post_excerpt ) { // Post has a custom excerpt.
		$pre_exerpt = relevanssi_highlight_terms( $post->post_excerpt, get_search_query(), true );
		return $pre_exerpt . '…' . $excerpt['text'];
	}

	if ( $excerpt['start'] ) { // The Relevanssi snippet begins at the start of the post.
		return $excerpt['text'];
	}

	$content    = apply_filters( 'the_content', get_the_content( null, null, $post ) );
	$pre_exerpt = wp_trim_words( $content, 30, '' );
	$pre_exerpt = relevanssi_highlight_terms( $pre_exerpt, get_search_query(), true );
	return $pre_exerpt . $excerpt['text'];
}

/**
 * Hook into WordPress to modify text used to represent the author.
 */
add_filter( 'the_author', __NAMESPACE__ . '\the_author', 10, 1 );

/**
 * We always return 'Forbes Library' as the author in feeds.
 *
 * @see https://developer.wordpress.org/reference/hooks/the_author/
 *
 * @param string $display_name The author's display name.
 */
function the_author( $display_name ) : string {
	if ( is_feed() ) {
		return 'Forbes Library';
	}

	return $display_name;
}

/**
 * Hook into WordPress to change the list of allowed query variables.
 */
add_filter( 'query_vars', __NAMESPACE__ . '\add_query_vars' );

/**
 * Adds custom query variables so they will be recognized by WordPress.
 *
 * We add:
 * - search-target: used by our search form to indicate whether folks wish to
 *                  search the website or the library catalog
 *
 * @param string[] $vars - The array of allowed query variable names.
 */
function add_query_vars( $vars ) {
	$vars[] = 'search-target';
	return $vars;
}

/**
 * Hook into WordPress during query parsing so that we can redirect the user if
 * needed.
 */
add_action( 'parse_query', __NAMESPACE__ . '\search_redirect' );

/**
 * Redirects search to the online catalog if needed.
 *
 * This may happen if the user does not have Javascript enabled.
 */
function search_redirect() : void {
	if ( get_query_var( 'search-target' ) === 'catalog' ) {
		if ( ! isset( $_SERVER['QUERY_STRING'] ) ) {
			return; // This should not happen!
		}
		$atts = array();
		// we are only modifying the query string using it to build a url for a
		// redirect, so we don't have to worry about unslashing or sanitizing the
		// content of $_SERVER['QUERY_STRING'].
		// phpcs:disable WordPress.Security.ValidatedSanitizedInput.MissingUnslash
		// phpcs:disable WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		parse_str( $_SERVER['QUERY_STRING'], $atts );
		// phpcs:enable
		$atts['lookfor'] = $atts['s'];
		unset( $atts['s'] );
		unset( $atts['search-target'] );
		header( 'Location: https://northamptn.cwmars.org/Union/Search?' . http_build_query( $atts ) );
		exit();
	}
}

/**
 * Hooks into WordPress to set the forbes-search-preference cookie if needed.
 *
 * We hook into 'init' because we can only set cookies before output has been
 * generated.
 */
add_action( 'init', __NAMESPACE__ . '\search_init' );

/**
 * Sets the cookie if we recieve a request for a search with a search-target.
 *
 * This may happen if the user does not have Javascript enabled.
 */
function search_init() : void {
	// We can't use get_query_var() in init, so we use the $_GET superglobal.

	// We aren't doing anything persistent here, so no nonce is required.
	// phpcs:disable WordPress.Security.NonceVerification.Recommended
	if ( isset( $_GET['search-target'] ) ) {
		$cookie_expiration = time() + 60 * 60 * 24 * 365;

		if ( 'catalog' === $_GET['search-target'] ) {
			setcookie( 'forbes-search-preference', 'catalog', $cookie_expiration, '/' );
		}
		if ( 'website' === $_GET['search-target'] ) {
			setcookie( 'forbes-search-preference', 'website', $cookie_expiration, '/' );
		}
	}
	// phpcs:enable
}

/**
 * Hooks into WordPress to mofify post titles.
 *
 * We hook into 'init' because we can only set cookies before output has been
 * generated.
 */
add_action( 'the_title', __NAMESPACE__ . '\filter_title', 10, 2 );

/**
 * Gives a title to untitled posts.
 *
 * @param string $title The post title.
 * @param int    $id    The post ID.
 */
function filter_title( $title, $id ) {
	if ( '' === trim( $title ) ) {
		$title = 'untitled';
	}
	return $title;
}

/**
 * Returns the pagination
 *
 * We use WordPress's get_the_posts_pagination() except:
 *
 * - We precede it with a page count ('Page m of n').
 * - We change the options based on the current page and the max number of pages
 *   to avoid those cases where the default arguments to
 *   get_the_posts_pagination() would give very sparse results.
 * - We change the class from pagination to pagination-complete when displaying
 *   a link for every page.
 */
function get_pagination() : string {
	if ( ! have_posts() ) {
		return '';
	}
	$pagination_options = array(
		'screen_reader_text' => 'Page Navigation',
		'aria_label'         => 'Page',
		'prev_text'          => '←<span class="screen-reader-text">Previous"</span>',
		'next_text'          => '→<span class="screen-reader-text">Next"</span>',
		'before_page_number' => '<span class="screen-reader-text">Page"</span>',
	);

	$max_pages   = $GLOBALS['wp_query']->max_num_pages;
	$page_number = $GLOBALS['wp_query']->is_paged ? get_query_var( 'paged' ) : 1;

	if ( $max_pages < 9 ) {
		$pagination_options['class']    = 'pagination-complete';
		$pagination_options['show_all'] = true;
	} else {
		$pagination_options['class'] = 'pagination';

		$distance_from_end = min( $page_number - 1, $max_pages - $page_number );

		$pagination_options['mid_size'] = max( 2, 5 - $distance_from_end );
	}

	return get_page_number_display() . get_the_posts_pagination( $pagination_options );
}

/**
 * Returns the page number text
 *
 * The page number text reads "page n of m" where n is the current page and m
 * is the last page. The text is wrapped in a <p> tag with class page-n-of-m
 */
function get_page_number_display() : string {
	$max_pages   = $GLOBALS['wp_query']->max_num_pages;
	$max_pages   = $max_pages ? $max_pages : 1;
	$page_number = $GLOBALS['wp_query']->is_paged ? get_query_var( 'paged' ) : 1;
	$page_number = $page_number ? $page_number : 1;
	return sprintf( '<p class="page-n-of-m">page %s of %s</p>', $page_number, $max_pages );
}

/**
 * Returns the breadcrumbs for the current post.
 *
 * If the post has ancestors we use these to build the breadcrumbs.
 *
 * Failing that, we check to see if post has a category. If so we use the first
 * category listed as an intermediary.
 *
 * In all other cases the breadcrumbs will just consist of Home > The Post.
 * To Do: expand this using get_post_type( $post );
 *
 * This function only returns breadcrumbs for posts type objects and cannot be
 * used to get breadcrumbs for pages with mutiple posts.
 *
 * @param string           $seperator The text to display between the link.
 * @param int|WP_Post|null $post Post ID or post object. Falsey values use the
 * current global post inside the loop. Defaults to global $post.
 */
function get_breadcrumbs( $seperator = '→', $post = 0 ) : string {
	$post   = get_post( $post );
	$output = '';

	$output .= '<nav aria-label="Breadcrumb" class="breadcrumbs">';
	$output .= sprintf( '<a href="%s">Home</a>', get_home_url() );
	$output .= $seperator;

	$ancestors = get_post_ancestors( $post );
	if ( $ancestors ) {
		for ( $i = count( $ancestors ) - 1; $i >= 0; $i-- ) {
			$ancestor       = get_post( $ancestors[ $i ] );
			$ancestor_title = sanitize_link_text( get_the_title( $ancestor ) );

			$output .= sprintf( '<a href="%s">%s</a>', get_permalink( $ancestor ), $ancestor_title );
			$output .= $seperator;
		}
	} elseif ( is_object_in_taxonomy( get_post_type( $post ), 'category' ) ) {
		$category = get_the_category()[0];

		$output .= sprintf( '<a href="%s">%s</a>', get_category_link( $category->term_id ), $category->name );
		$output .= $seperator;
	}
	$output .= sprintf( '<span aria-current="page">%s</span>', sanitize_link_text( get_the_title( $post ) ) );
	$output .= '</nav>';
	return $output;
}

/**
 * Returns the breadcrumbs for an archive page.
 *
 * @param string $seperator The text to display between the link.
 */
function get_archive_breadcrumbs( $seperator = '→' ) : string {
	$output = '';

	$output .= '<div class="breadcrumbs">';
	$output .= sprintf( '<a href="%s">Home</a>', get_home_url() );
	$output .= $seperator;

	$output .= sanitize_link_text( get_the_archive_title() );
	$output .= '</div>';
	return $output;
}

/**
 * Strips most HTML from a passed string, and returns the result, suitable for
 * use as link text.
 *
 * This removes all HTML except for simple styling. Links, images, and
 * attributes are not allowed. This is useful as the text for links.
 *
 * @param string $text The text to be sanitized.
 */
function sanitize_link_text( $text ) : string {
	$allowed_html = array(
		'strong' => array(),
		'em'     => array(),
		'b'      => array(),
		'i'      => array(),
		'sub'    => array(),
		'sup'    => array(),
		'u'      => array(),
	);
	return wp_kses( $text, $allowed_html );
}

/**
 * Returns the color palette used by this theme, for use in
 * add_theme_support( 'editor-color-palette' ).
 *
 * See: https://wpdevelopment.courses/articles/gutenberg-colour-settings/
 */
function get_color_palette() {
	return array(
		array(
			'name'  => esc_attr( 'Black', ),
			'slug'  => 'black',
			'color' => '#000',
		),
		array(
			'name'  => esc_attr( 'Forbes Red', ),
			'slug'  => 'forbes-red',
			'color' => '#722327',
		),
		array(
			'name'  => esc_attr( 'Forbes Green' ),
			'slug'  => 'forbes-green',
			'color' => '#006c64',
		),
	);
}

/**
 * Returns the home url minus the protocol.
 *
 * If the home url is http://example.com this would return example.com.
 *
 * This isn't useful as a link, but is often prefered for display. */
function get_home_url_for_display() : string {
	return str_replace( array( 'http://', 'https://' ), '', home_url() );
}

/**
 * Consult cookies and return the users search preference.
 *
 * This will always return 'website' unless a cookie specifics specifies a
 * preference of 'catalog'.
 *
 * @return string The users search preference, 'website' or 'catalog'.
 */
function get_search_preference() : string {
	if ( isset( $_COOKIE['forbes-search-preference'] ) ) {
		if ( 'catalog' === $_COOKIE['forbes-search-preference'] ) {
			return 'catalog';
		}
	}
	return 'website';
}

/**
 * Gets the theme version.
 *
 * @return string The version string for this theme.
 */
function get_theme_version() : string {
	return wp_get_theme()->get( 'Version' );
}

/**
 * Get the slug of the top-level ancestor of the current post
 */
function get_top_level_slug() : string {
	$id            = null;
	$posts_checked = array();

	while ( $ancestor = get_post( $id ) ) {
		if ( empty( $ancestor->post_parent ) || in_array( $id, $posts_checked, true ) ) {
			break;
		}
		$id              = $ancestor->post_parent;
		$posts_checked[] = $id;
	}

	if ( ! $ancestor ) {
		return '';
	}

	return $ancestor->post_name;
}
