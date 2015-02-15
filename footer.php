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
		<h5><a href='https://www.google.com/maps?q=329+10th+Ave.+SE+Ste+%23128+Cedar+Rapids,+IA&bav=on.2,or.r_qf.&bvm=bv.85970519,d.cGU&biw=1489&bih=948&dpr=1&um=1&ie=UTF-8&sa=X&ei=ZczgVMmAAY-rogT994GABg&ved=0CAYQ_AUoAQ'>329 10th Ave. SE Ste #128 Cedar Rapids, IA</a> | <?php echo do_shortcode( '[phonenumber]' ); ?></h5>
		<h6><a href='http://lowermedia.net/'>A LowerMedia Site</a></h6>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>