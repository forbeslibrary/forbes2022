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
<?php if ( is_404() ): ?>
	<main id="main" class="site-main">
	<?php return; ?>
<?php endif; ?>
<?php get_template_part( 'template-parts/alerts' ); ?>
<a href="#main" class="screen-reader-text">Skip to Content</a>
<header id="page-header">
	<?php
	if ( is_front_page() ) {
		echo '<h1 class="screen-reader-text">Forbes Library</h1>';
	}
	?>
	<a id="header-home-link" <?php echo 'href="' . esc_url( home_url() ) . '" title="Forbes Library Home" rel="home"'; ?>>
		<picture id="header-logo">
			<source media="(prefers-color-scheme: dark)"
				srcset = "
					<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-dark-mode-375-110.png' ) ); ?> 375w,
					<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-dark-mode-751-220.png' ) ); ?> 751w,
					<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-dark-mode-1502-440.png' ) ); ?> 1502w
				"
				sizes="
					(min-width: 70em) 50vw,
					(min-width: 50em) 751px,
					100vw
				"
			>
			<source media="(prefers-color-scheme: light)"
				srcset = "
					<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-375-110.png' ) ); ?> 375w,
					<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-751-220.png' ) ); ?> 751w,
					<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-1502-440.png' ) ); ?> 1502w
				"
				sizes="
					(min-width: 70em) 50vw,
					(min-width: 50em) 751px,
					100vw
				"
			>
			<img alt="Home Page" width="375" height="110"
				src="<?php echo esc_url( get_theme_file_uri( '/assets/img/forbes-logo-375-110.png' ) ); ?>"
			>
		</picture>
	</a>
	<div id="quick-navigation">
		<nav id="quick-navigation-links" aria-label="Top Links">
			<a class="my-account icon-profile icon" href="https://catalog.cwmars.org/eg/opac/login" title="Use your CW MARS account to place holds, check due dates, etc.">My Account</a>
			<a class="accessibility icon-univeral-design icon" href="https://forbeslibrary.org/accessibility/" title="Library Accessibility Information">Accessibility</a>
			<a class="hours icon-clock icon" href="https://forbeslibrary.org/info/hours/" title="Library Hours">Hours</a>
			<a class="contact icon-contact icon" href="https://forbeslibrary.org/info/contact/" title="Contact the Library">Contact</a>
			<a class="donate icon-gift icon" href="https://forbeslibrary.org/giving/donate-online/">Donate</a>
		</nav>
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
			'container_aria_label' => 'Main'
		)
	);
	?>
	</header>
	<main id="main" class="site-main">