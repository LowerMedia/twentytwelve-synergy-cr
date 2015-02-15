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
				</div class='front-page-posts-holder'>

				<h2><a href='/blog'>What's going on at Synergy?</a></h2>
				<ul>
				<?php
					$args = array( 'numberposts' => 2 );

					$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
					foreach( $recent_posts as $recent ){
						echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					}
				?>
				</ul>
				<div>
				</div>
			<?php endif; ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
