<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 * Template Name: Archive Page
 */

get_header(); ?>

	<div id="primary" class="container archives-index">
		<div class="row">
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					echo "<hr>";
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<main id="main" class="col-xs-12 col-md-9" role="main">

			<?php
			if ( have_posts() ) : ?>

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

				the_posts_navigation(array('prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i> '.__("Older Posts", "transparency"), 'next_text' => __("Newer Posts", "transparency").' <i class="fa fa-angle-right" aria-hidden="true"></i>'));

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</main><!-- #main -->
			<?php
				get_sidebar();
			?>
		</div><!-- .row -->
	</div><!-- #primary -->

<?php
get_footer();
