<?php
/**
 * The template for displaying all single island trackers.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Transparency
 */

get_header(); ?>

<div id="primary" class="container">
	<div class="row">
		<main id="main" class="col-xs-12" role="main">
			
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-island-tracker-single', 'none' );
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- #primary -->

<?php
get_footer();
