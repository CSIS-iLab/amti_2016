<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Transparency
 */

get_header();

// Begin the post loop so we can get the post title and featured image to display in the header
while ( have_posts() ) : the_post();

$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
	<header class="entry-header">
		<div class="container">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<hr>
		</div>
		<div class="backstretch">
			<img src="<?php echo $feat_image; ?>" />
		</div>
	</header>

	<div id="primary" class="container">
		<div class="row">
			<main id="main" class="col-xs-12 col-md-9" role="main">

				<?php

					get_template_part( 'template-parts/content', get_post_format() );

					the_post_navigation( array(
						'prev_text'                  => __( '<h4>Previous Post</h4>%title' ),
						'next_text'                  => __( '<h4>Next Post</h4>%title' ),
			            'screen_reader_text' => __( 'Continue Reading' ),
			        ) );

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
			<?php
				get_sidebar();
			?>
		</div><!-- .row -->
	</div><!-- #primary -->

<?php
get_footer();
