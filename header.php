<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<div id="page" class="hfeed site">
		
		<header id="masthead" class="site-header left-column" role="banner">

			<hgroup class="hgroup">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>

			<?php if ( get_header_image() ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="Synergy Massage Cedar Rapids Logo | Reiki - Continuing Education" /></a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/synergy-massage-cedar-rapids-iowa-reiki-continuing-education-280x176.png" class="header-image" width="280" height="176" alt="Synergy Massage Cedar Rapids Logo | Reiki - Continuing Education" /></a>
			<?php endif; ?>
			
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></button>
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav><!-- #site-navigation -->

			<div class='desktop-scheduler'><?php echo do_shortcode( '[schedule_now_button align="left" style="button9"]' ); ?></div>
			<div class='mobile-scheduler'><?php echo do_shortcode( '[schedule_now_button align="center" style="button9"]' ); ?></div>

			<div class='testimonial-wrap'>
				<?php echo do_shortcode('[WPCR_SHOW POSTID="11" NUM="4" SNIPPET="80" MORE="Continue reading..." HIDECUSTOM="1" HIDERESPONSE="1"]'); ?>
				<br />
				<a href="/reviews">More Testimonials</a>
			</div>

			<?php if ( is_active_sidebar( 'bottom-header-widget' ) ) : ?>
				<div id="bottom-header-widget" class="bottom-header-widget widget-area" role="complementary">
					<?php dynamic_sidebar( 'bottom-header-widget' ); ?>
				</div><!-- #bottom-header-widget -->
			<?php endif; ?>
			
		</header><!-- #masthead -->
		
		<div id="main" class="wrapper main-wrapper right-column">