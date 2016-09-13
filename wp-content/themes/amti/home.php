<?php
/**
 * The template for displaying the latest blog posts.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
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
					<p>Read commentary and analysis from the top AMTI experts on maritime Asia.</p>
					<?php get_search_form(); ?>
				</div>

				<?php
				if ( have_posts() ) :
				?>

					<?php

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

				<div class="more-archives">
					<a href="/archives">Want more? Browse our full text-based archive of analysis.</a>
				</div>

		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- #primary -->

<?php
get_footer();
