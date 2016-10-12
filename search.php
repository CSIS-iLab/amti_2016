<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Transparency
 */

get_header(); ?>

	<section id="primary" class="container search-results">
		<header class="page-header">
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'transparency' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<hr>
		</header><!-- .page-header -->
		<main id="main" class="col-xs-12 col-md-9" role="main">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation(array('prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i> Older Posts', 'next_text' => 'Newer Posts <i class="fa fa-angle-right" aria-hidden="true"></i>'));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
		<?php
			get_sidebar();
		?>
	</section><!-- #primary -->

<?php
get_footer();
