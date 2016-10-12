<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Transparency
 */

get_header(); ?>

	<div id="primary" class="container">
		<div class="row">
			<main id="main" class="col-xs-12 col-md-9" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

					the_post_navigation();

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
