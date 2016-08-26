<?php
/**
 * The template for displaying full width pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#pages
 *
 * @package Transparency
 *
 * Template Name: Full Width Page
 */

get_header(); ?>

	<div id="primary" class="full-width">
		<main id="main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
