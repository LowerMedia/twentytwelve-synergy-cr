<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php if ( is_front_page() ) : ?>
				<div class='front-page-custom-image-holder'>
					<div class='fpci-left fpci-div'><?php echo get_post_meta($post->ID, 'front_page_image_left', true); ?></div>
					<div class='fpci-center fpci-div'><?php echo get_post_meta($post->ID, 'front_page_image_center', true); ?></div>
					<div class='fpci-right fpci-div'><?php echo get_post_meta($post->ID, 'front_page_image_right', true); ?></div>
				</div><!-- .front-page-custom-image-holder -->
				<div class='front-page-posts-holder'>
					<br />
					<?php
						$postslist = get_posts('numberposts=2&order=DESC&orderby=date');
						foreach ( $postslist as $post ) :
							setup_postdata( $post ); ?>
							<div class="entry">
								<h2 class='frontpage-postentry-title'><?php the_title(); ?></a></h2>
								<?php the_time(get_option('date_format')) ?>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>">Read More...</a>
							</div>
					<?php endforeach; ?>
					<br />
					<p><a href='/blog'>Click to read more about what's going on at Synergy!</a></p>
				<div><!-- .front-page-posts-holder -->
			<?php endif; ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
