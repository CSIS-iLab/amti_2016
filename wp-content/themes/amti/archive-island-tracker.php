<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

get_header(); ?>

	<div id="primary" class="container">
		<div class="row">
			<main id="main" class="col-xs-12" role="main">
				<header class="page-header">
					<?php
					echo "<h1 class='page-title'>Land Reclamation By Country</h1>";
					echo "<hr>";
					echo "<p>China’s large-scale island-building in the South China Sea since late 2013 has focused international attention on the disputes and invited widespread criticism that Beijing is responsible for escalating tensions. China has responded by pointing out that other claimants have also engaged in land reclamation. Explore the scale of each claimants’ reclamation work, documented by satellite imagery, below.</p>";
					?>
				</header><!-- .page-header -->
				<div class="row">
					<?php 
						$args=array(
						  'name' => 'countries'
						);
						$output = 'objects'; // or names
						$taxonomies=get_taxonomies($args,$output); 
						if  ($taxonomies) {
						  foreach ($taxonomies  as $taxonomy ) {
						  	$terms = get_terms($taxonomy->name);
		        			foreach ( $terms as $term) {

		        				$posts_array = get_posts(
								    array(
								        'posts_per_page' => 1,
								        'post_type' => 'island-tracker',
								        'order'		=> 'DESC',
								        'tax_query' => array(
								            array(
								                'taxonomy' => 'countries',
								                'field' => 'term_id',
								                'terms' => $term->term_id,
								            )
								        )
								    )
								);
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_array[0]->ID ), 'full' );

		        			?>

		        			<div class="col-xs-12 col-sm-6">
		        				<a href="<?php echo $term->slug; ?>">
			        				<div class="country-listing" style="background-image:url('<?php echo $image[0]; ?>');">
			        					<div class="title"><?php echo $term->name; ?></div>
			        				</div>
			        			</a>
		        			</div>

		        			<?
		        			}
						  }
						}  
					?>
				</div>
			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php
get_footer();
