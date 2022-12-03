<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the top of the document up to the
 * end of the header. WordPress uses it when the get_header() function is called.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Forbes2022
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if ( is_404() ) { return; } ?>
<?php get_template_part( 'template-parts/alerts' ); ?>
<a href="#main" class="screen-reader-text">Skip to Content</a>
<header id="page-header">
	<?php
	if ( is_front_page() ) {
		echo '<h1 class="screen-reader-text">Forbes Library</h1>';
	}
	?>
	<a <?php echo 'href="' . esc_url( home_url() ) . '" title="Forbes Library Home" rel="home"'; ?>>
		<img id="header-logo" width="533" height="110" alt="Home Page"
			src="<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-horizontal-cropped-533x110.png' ) ); ?>"
			srcset = "
				<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-horizontal-cropped-533x110.png' ) ); ?> 533w,
				<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-horizontal-cropped-1040x210.png' ) ); ?> 1040w,
				<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-horizontal-cropped-2080x420.png' ) ); ?> 2080w
			"
			sizes="
				(min-width: 70em) 50vw,
				(min-width: 50em) 533px,
				100vw
			"
		>
	</a>
	<div id="quick-navigation">
		<div id="quick-navigation-links">
			<a class="my-account icon-profile icon" href="https://catalog.cwmars.org/eg/opac/login" title="Use your CW MARS account to place holds, check due dates, etc.">My Account</a>
			<a class="accessibility icon-univeral-design icon" href="https://forbeslibrary.org/accessibility/" title="Library Accessibility Information">Accessibility</a>
			<a class="hours icon-clock icon" href="https://forbeslibrary.org/info/hours/" title="Library Hours">Hours</a>
			<a class="contact icon-contact icon" href="https://forbeslibrary.org/info/contact/" title="Contact the Library">Contact</a>
			<a class="donate icon-gift icon" href="https://forbeslibrary.org/giving/donate-online/">Donate</a>
		</div>
		<?php get_search_form(); ?>
	</div>
	<input type="checkbox" id="top-menu-toggle">
	<h2 id="top-menu-heading"><label for="top-menu-toggle">Menu</label></h2>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'main-menu',
			'container'      => 'nav',
			'container_id'   => 'top-menu',
			'contain_class'  => 'menu-bar',
		)
	);
	?>
	</header>
