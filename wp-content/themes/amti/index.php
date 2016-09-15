<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

get_header(); ?>

<?php if ( has_nav_menu( 'home-page-slider' ) ) : ?>
	<div id="homepage-slider-container">
		<?php transparency_slider(); ?>
	</div><!-- #homepage-slider-container -->
<?php endif; ?>

	<div id="primary" class="container posts-index archives-index">
		<header class="entry-header">
			<h1 class="page-title"><?php single_post_title( ); ?></h1>
			<hr>
			<p class='title-description'>Browse all of our analysis.</p>
		</header><!-- .entry-header -->
		<div class="row">
			<main id="main" class="col-xs-12 col-md-9" role="main">

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

					the_posts_navigation(array('prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i> Older Posts', 'next_text' => 'Newer Posts <i class="fa fa-angle-right" aria-hidden="true"></i>'));

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
