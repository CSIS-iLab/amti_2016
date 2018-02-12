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
		$current_imageShadow = get_post_meta( $post->ID, '_features_imageShadow', true );
		if($current_imageShadow == 1 || strlen($current_imageShadow) == 0) {
			$shadow = "<div class='backstretch'></div>";
		}
		else {
			$shadow = "";
		}
		$feat_image = 'style="background-image:url('.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).');"';
	}
	else {
		$feat_image = "";
		$shadow = "";
	}
	?>

	<header class="entry-header full-width" <?php echo $feat_image; ?>>
		<div class="container">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<hr>
		</div>
		<?php echo $shadow; ?>
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
