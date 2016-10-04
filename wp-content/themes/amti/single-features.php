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
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	?>

	<header class="entry-header full-width" style="background-image:url('<?php echo $feat_image; ?>');">
		<div class="container">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<hr>
		</div>
		<div class="backstretch"></div>
	</header>
	<div id="primary" class="container">
<?
} else {
	?>
	<div id="primary" class="container">
	<header class="entry-header">
		<div class="container">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<hr>
		</div>
	</header>
	<?
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
