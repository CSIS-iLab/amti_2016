<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Transparency
 */

get_header();

if ( has_post_format( 'image' )) {
	if(get_post_thumbnail_id($post->ID)) {
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	}
	else {
		$feat_image = '/wp-content/uploads/2016/08/banner_3.jpg';
	}
	echo '<header class="entry-header entry-header--with-image full-width">
		<div class="container">
			<div class="entry-header_image"><div class="image-container"><img src="'.$feat_image.'"/><div class="entry-header_text">';

	        the_title('<h1 class="entry-title">', '</h1>');

	        echo '<hr>
						</div>
					</div>
				</div>
		</div>
	</header>
	<div id="primary" class="container">';
} else {
echo	'<header class="entry-header">
	<div class="container">
		<div class="entry-header_text">';
				the_title('<h1 class="entry-title">', '</h1>');
				echo '<hr>
		</div>
	</div>
</header>
<div id="primary" class="container">';
}
?>
	<div class="row">
		<main id="main" class="col-xs-12" role="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content-feature-single', 'none' );
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- #primary -->

<?php
get_footer();
