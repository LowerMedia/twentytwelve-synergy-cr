<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_front_page() ) : ?>
		<?php if ( is_active_sidebar( 'bottom-header-widget' ) ) : ?>
			<div id="bottom-content-widget-wrap" class="bottom-content-widget-wrap widget-area-wrap" role="complementary">
				<?php dynamic_sidebar( 'bottom-content-widget' ); ?>
			</div><!-- #bottom-header-widget -->
		<?php endif; ?>
	<?php endif; ?>
	
	</div><!-- #main .wrapper -->
	
</div><!-- #page -->

<footer id="colophon" role="contentinfo">
	<div class="site-info">
		<h4>Synergy Cedar Rapids - &copy;<?php echo date("Y"); ?></h4>
		<h5><a href='http://lowermedia.net/'>A LowerMedia Site</a></h5>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); 

/*

<?php do_action( 'twentytwelve_credits' ); ?>
		<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>

*/
?>
</body>
</html>