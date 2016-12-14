<?php
/**
 * The template for displaying Island Tracker country pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

get_header(); 

if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE != "en") {
	$langQuery = "/?lang=".ICL_LANGUAGE_CODE;
}
?>

	<div id="primary" class="container">
		<div class="row">
			<main id="main" class="col-xs-12" role="main">
				<?php
				if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							echo "<hr>";
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content-island-tracker', get_post_format() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content-island-tracker', 'none' );

				endif; ?>
				<footer>
					<nav class="navigation posts-navigation" role="navigation">
						<h2 class="screen-reader-text">Posts navigation</h2>
						<div class="nav-links"><div class="nav-previous"><a href="/island-tracker<?php echo $langQuery; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> <?php echo __('Return to Island Tracker', 'transparency'); ?></a></div></div>
					</nav>
				</footer>
			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php
get_footer();
