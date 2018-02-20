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

$taxonomy = $wp_query->get_queried_object();
$term_children = get_term_children( $taxonomy->term_id, $taxonomy->taxonomy );
$test = get_queried_object()->term_id;
$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );

?>

	<div id="primary" class="container">
		<div class="row">
			<main id="main" class="col-xs-12" role="main">
				<?php
				if ( have_posts() ) : ?>

					<header class="page-header">
						<?php

							echo "<h1 class='page-title'>" . $term->name . " Island Tracker</h1>";
							echo "<hr>";
							the_archive_description( '<div class="archive-description">', '</div>' );
							echo '<div class="anchor-links">';
							foreach ( $term_children as $index => $child ) {
								$term = get_term_by( 'id', $child, $taxonomy->taxonomy );
								if($index == 0) {
									echo '<a href="#' . $term->name . '">' . $term->name . '</a>';
								}
								else {
									echo ' &middot; <a href="#' . $term->name . '">' . $term->name . '</a>';
								}
							}
							echo '</div>';
						?>
					</header><!-- .page-header -->

					<?php
					/* Get the child terms subsections and posts */

					if($term_children) {

						foreach ( $term_children as $child ) {
							$term = get_term_by( 'id', $child, $taxonomy->taxonomy );
							echo '<a name="' . $term->name . '"><h2>' . $term->name . '</h2></a>';

							$args = array(
								'post_type' => 'island-tracker',
								'tax_query' => array(
									array(
										'taxonomy' => $taxonomy->taxonomy,
										'term_id' => 'term_id',
										'terms' => $child
									)
								)
							);
							$postslist = new WP_Query( $args );
							
							while ( $postslist->have_posts() ) : $postslist->the_post();
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content-island-tracker');

							endwhile;
							wp_reset_postdata();
						}
					}
					else {
						while ( have_posts() ) : the_post();
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content-island-tracker');

						endwhile;
					}


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

	<script>
	  (function($) {
	    $('#primary a[href*="#"]:not([href="#"])').click(function() {
	      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	        if (target.length) {
	          $('html, body').animate({
	            scrollTop: target.offset().top - 100
	          }, 1000);
	          return false;
	        }
	      }
	    });
	})(jQuery);
	</script>

<?php
get_footer();
