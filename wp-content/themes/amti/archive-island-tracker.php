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
					echo "<h1 class='page-title'>".__('Land Reclamation By Country', 'transparency')."</h1>";
					echo "<hr>";
					echo "<p>".__("China’s large-scale island-building in the South China Sea since late 2013 has focused international attention on the disputes and invited widespread criticism that Beijing is responsible for escalating tensions. China has responded by pointing out that other claimants have also engaged in land reclamation. Explore the scale of each claimants’ reclamation work, documented by satellite imagery, below.", 'transparency')."</p>";
					?>
				</header><!-- .page-header -->
				<div class="row">
					<?php 
						$args=array(
						  'name' => 'countries'
						);
						$output = 'objects'; // or names
						$taxonomies=get_taxonomies($args,$output);

						if ($taxonomies) {
						  foreach ($taxonomies  as $taxonomy ) {
						  	$terms = get_terms($taxonomy->name, array('parent' => 0));
		        			foreach ( $terms as $term) {


		        				$image = get_term_meta( $term->term_id, 'countries_feature_image', true );

		        				if(function_exists('icl_object_id') && ICL_LANGUAGE_CODE != "en") {
		        					$langQuery = "/?lang=".ICL_LANGUAGE_CODE;
		        				}

		        			?>

		        			<div class="col-xs-12 col-sm-6">
		        				<a href="<?php echo $term->slug.$langQuery; ?>">
			        				<div class="country-listing" style="background-image:url('<?php echo $image; ?>');">
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
