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
		<?php if ( is_active_sidebar( 'bottom-content-widget' ) ) : ?>
			<div id="bottom-content-widget-wrap" class="bottom-content-widget-wrap widget-area-wrap" role="complementary">
				<?php dynamic_sidebar( 'bottom-content-widget' ); ?>
			</div><!-- #bottom-content-widget -->
		<?php endif; ?>
	<?php endif; ?>
	
	</div><!-- #main .wrapper -->
	
</div><!-- #page -->

<footer id="colophon" role="contentinfo">
	<div class="site-info">
		<h4>Synergy Massage - &copy;<?php echo date("Y"); ?></h4>
		<h5><a href='https://www.google.com/maps/place/Synergy+Massage+%26+Healing+Center/@41.9716968,-91.6699474,17z/data=!3m1!4b1!4m5!3m4!1s0x87e4f7412d966773:0xe3aca906087b3a0b!8m2!3d41.9719891!4d-91.6587432'>42 7th Ave. SW Suite 1B,  Cedar Rapids, IA 52404</a> | <?php echo do_shortcode( '[phonenumber]' ); ?></h5>
		<h6><a href='http://lowermedia.net/'>A LowerMedia Site</a></h6>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
