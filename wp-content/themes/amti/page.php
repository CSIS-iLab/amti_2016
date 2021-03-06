<?php
/**
 * The template for displaying all pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#pages
 *
 * @package Transparency
 */

get_header(); ?>

	<div id="primary" class="container">
		<div class="row">
			<main id="main" class="col-xs-12" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- .row -->
	</div><!-- #primary -->

<?php
get_footer();
