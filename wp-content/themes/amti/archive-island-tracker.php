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
					echo "<h1 class='page-title'>".__('Occupation and Island Building', 'transparency')."</h1>";
					echo "<hr>";
					echo "<p>".__("Five claimants occupy nearly 70 disputed reefs and islets spread across the South China Sea. They have built more than 90 outposts on these contested features, many of which have seen expansion in recent years. AMTI has gathered satellite imagery of each outpost, along with other relevant information, to document their current status and any changes they have undergone in recent years. Explore the database below.", 'transparency')."</p>";
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
