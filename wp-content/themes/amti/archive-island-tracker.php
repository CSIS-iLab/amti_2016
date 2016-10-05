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

		        				switch($term->name) {
		        					case "China":
		        						$image = "/wp-content/uploads/2015/04/150415_fiery_cross_tmb.jpg?w=880";
		        						break;
		        					case "Taiwan":
		        						$image = "/wp-content/uploads/2016/03/20160127_itu-aba.jpg?w=880";
		        						break;
		        					case "Vietnam";
		        						$image = "/wp-content/uploads/2015/05/wl_island_tmb.jpg?w=880";
		        						break;
		        					default:
		        						$image = "";
		        				}

		        			?>

		        			<div class="col-xs-12 col-sm-6">
		        				<a href="<?php echo $term->slug; ?>">
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
