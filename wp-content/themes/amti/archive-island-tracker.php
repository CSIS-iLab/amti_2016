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
                    echo "<h1 class='page-title'>".esc_html__('Occupation and Island Building', 'transparency')."</h1>";
                    echo "<hr>";
                    echo "<p>".esc_html__("Five claimants occupy nearly 70 disputed reefs and islets spread across the South China Sea. They have built more than 90 outposts on these contested features, many of which have seen expansion in recent years. AMTI has gathered satellite imagery of each outpost, along with other relevant information, to document their current status and any changes they have undergone in recent years. Explore the database below.", 'transparency')."</p>";
                    ?>
				</header><!-- .page-header -->
				<div class="row">
					<?php
                        $args=array(
                          'name' => 'countries'
                        );
                        $output = 'objects'; // or names
                        $taxonomies=get_taxonomies($args, $output);

                        if ($taxonomies) {
                            echo '<div id="islandTrackerContainer">';

                            foreach ($taxonomies  as $taxonomy) {
                                $terms = get_terms($taxonomy->name, array('parent' => 0));
                                foreach ($terms as $term) {
                                    $image = get_term_meta($term->term_id, 'countries_feature_image', true);

                                    if (function_exists('icl_object_id') && ICL_LANGUAGE_CODE != "en") {
                                        $langQuery = "/?lang=".ICL_LANGUAGE_CODE;
                                    } ?>

									<?php	echo '<a href="' . $term->slug.$langQuery . '" class="country-listing">
					 			 <span class="background" style="background-image:url('.$image .'");>
					 			 </span>
					 			 <span class="title">' . $term->name . '</span>
					 			 </a>';

		        
                                }
                            }
                            echo '</div>';
                        }
                    ?>
				</div>
			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php
get_footer();
