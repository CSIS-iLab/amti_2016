<?php
/**
 * The template for displaying the analysis post listing page.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 * Template Name: Analysis Listing
 */

get_header(); ?>

	<div id="primary" class="container posts-index">
		<div class="row">
			<main id="main" class="col-xs-12" role="main">

				<header class="entry-header">
					<?php single_post_title( '<h1 class="page-title">', '</h1>' ); ?>
					<hr>
				</header><!-- .entry-header -->
				<div class="text-center search-container">
					<p><?php echo __("Read commentary and analysis from the top AMTI experts on maritime Asia.", "transparency"); ?></p>
					<?php get_search_form(); ?>
				</div>

				<?php 
					$analysisSettings = get_option("transparency_postListing_options");
					$args = array( 'posts_per_page' => $analysisSettings['post_limit']);
					$recent_posts = new WP_Query( $args );

					while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
				    	get_template_part( 'template-parts/content', get_post_format() );
					endwhile; // end of the loop.
					wp_reset_postdata();
				?>

				<div class="more-archives">
					<a href="/archives"><?php echo __("Want more? Browse our full text-based archive of analysis.", "transparency"); ?></a>
				</div>

		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- #primary -->

<?php
get_footer();