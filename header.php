<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Kirumo
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page-clip">
	<nav id="mobile-menu" role="navigation">
	<div id="nav-toggle">
		<div class="toggle genericon"></div>
	</div>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kirumo' ); ?></a>
		<?php wp_nav_menu(
			array(
				'theme_location' => 'mobile',
				'link_before'    => '<span>',
				'link_after'     => '</span>',
				'depth'          => 5,
				'walker'         => new Mobile_Menu_Walker,
			)
		); ?>
	</nav><!-- #site-navigation -->
	<div id="page-wrap">
		<?php do_action( 'before' ); ?>
		<div class="mobile-header">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>
		<header id="masthead" class="site-header" role="banner">
			<div class="header-wrap">
			<?php $tagline = get_bloginfo( 'description' ); ?>
				<div class="site-branding<?php echo empty( $tagline ) ? ' no-tagline' : ''; ?>">
					<?php if ( get_header_image() ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img class="site-title" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
						</a>
					<?php else : // End header image check. ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php endif; ?>
				</div>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kirumo' ); ?></a>

					<?php wp_nav_menu(
						array(
							'theme_location' => 'header',
							'walker' => new Primary_Menu_Walker,
						)
					); ?>
				</nav><!-- #site-navigation -->
			</div><!-- .header-wrap -->
		</header><!-- #masthead -->
		<div id="page" class="hfeed site">

		<!-- Hook in your slider/carousel here -->
		<?php do_action( 'slider-area' ); ?>

		<div id="content" class="site-content">
