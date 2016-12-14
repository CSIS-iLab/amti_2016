<?php
/**
 * The template for displaying archive pages.
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
				<?php
				echo "<h1 class='page-title'>".__("Features", "transparency")."</h1>";
				echo "<hr>";
				echo "<p>".__("Dive deep on the latest maritime issues in AMTI's Features, an interactive and media-rich repository of information.", "transparency")."</p>";
				?>
			</header><!-- .entry-header -->
			<div class="text-center search-container">
				<?php get_search_form(); ?>
			</div>

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
				get_template_part( 'template-parts/content-feature', get_post_format() );

			endwhile;

			the_posts_navigation(array('prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i> '.__("Older Posts", "transparency"), 'next_text' => __("Newer Posts", "transparency").' <i class="fa fa-angle-right" aria-hidden="true"></i>'));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

</main><!-- #main -->
</div><!-- .row -->
</div><!-- #primary -->

<?php
get_footer();
