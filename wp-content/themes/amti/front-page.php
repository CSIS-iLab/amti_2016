<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

    get_header();
    $lang = ICL_LANGUAGE_CODE == 'en' ? '' : '?lang='.ICL_LANGUAGE_CODE;
    ?>
<div class="wrapper">

    <section class="primary">

      <!-- BEGIN MAIN FEATURE // -->
        <?php get_template_part('template-parts/homepage_feature'); ?>
      <!-- // END MAIN FEATURE -->

      <div class="recent-content">
        <!-- BEGIN RECENT CONTENT // -->
          <?php get_template_part('template-parts/homepage_recent_content'); ?>
        <!-- // END RECENT CONTENT -->
      </div>

    </section>

    <section class="secondary">

      <!-- BEGIN SLIDER // -->
          <?php get_template_part('template-parts/homepage_slider'); ?>
      <!-- // END SLIDER-->

      <div class="island-tracker">
        <h2 class="feature-title">
          <?php echo
          '<a href="island-tracker' . $lang . '">'
             . __('Island Tracker', 'transparency') .
          '</a>'
          ?>
        </h2>
        <p class="feature-excerpt">
          <?php echo __('Five claimants occupy nearly 70 disputed reefs and islets spread across the South China Sea. They have built more than 90 outposts on these contested features, many of which have seen expansion in recent years.', 'transparency')?>
        </p>
      </div>

      <div class="island-claimants">
        <p class="feature-description">
          <?php echo __('Explore the database by selecting a claimant below.', 'transparency')?>
        </p>
        <div class="islands">
          <div class="island">
            <?php echo
              '<a class="island-shape" href="island-tracker/china' . $lang . '">';

              get_template_part("img/island_tracker_icons/china-outline.svg");

              echo '</a><a class="island-name" href="island-tracker/china' . $lang . '">China</a>'
              ?>
          </div>
          <div class="island">
            <?php echo
              '<a class="island-shape" href="island-tracker/malaysia' . $lang . '">';
               get_template_part("img/island_tracker_icons/malaysia-outline.svg");

               echo '</a><a class="island-name" href="island-tracker/malaysia' . $lang . '">Malaysia</a>'
              ?>
          </div>
          <div class="island">
            <?php echo
              '<a class="island-shape" href="island-tracker/phillipines' . $lang . '">';

              get_template_part("img/island_tracker_icons/phillipines-outline.svg");

              echo '</a><a class="island-name" href="island-tracker/philippines' . $lang . '">Philippines</a>'
              ?>
          </div>
          <div class="island">
            <?php echo
              '<a class="island-shape" href="island-tracker/taiwan' . $lang . '">';

              get_template_part("img/island_tracker_icons/taiwan-outline.svg");

              echo '</a><a class="island-name" href="island-tracker/taiwan' . $lang . '">Taiwan</a>'
              ?>
          </div>
          <div class="island">
            <?php echo
              '<a class="island-shape" href="island-tracker/vietnam' . $lang . '">';

              get_template_part("img/island_tracker_icons/vietnam-outline.svg");

              echo '</a><a class="island-name" href="island-tracker/vietnam' . $lang . '">Vietnam</a>'
              ?>
          </div>
        </div>
      </div>

        <div class="island-maps">
        <div class="feature-heading">
          <h2 class="feature-title">
              <?php echo
                '<a href="maps' . $lang . '">'
                . __('Maps of the Asia Pacific', 'transparency').
            '</a>'
            ?>
          </h2>

            <div class="island-maps feature-description">
            <p class="island-maps">
              <?php echo __('AMTI’s interactive maps strive to provide the most complete, accurate, and up-to-date source of geospatial information on maritime Asia.', 'transparency')?>
            </p>
            <div class="seeMore"><a href="/maps">
              <?php echo __('View Maps', 'transparency')?>
            </a></div>
          </div>
          </div>


        <?php
        $id = get_option('transparency_homepage_featured_map')
        ? $id = get_option('transparency_homepage_featured_map')
        : $id = wp_get_recent_posts(array(
          'post_type'  => 'attachment',
          'numberposts' => 1,
          'orderby'=>'date',
          'order'=>'DESC',
          'category_name'=> 'A Map Image'
      ), OBJECT)[0]->ID;

        echo '<a href="maps' . $lang . '" class="feature-map"><img alt="' . $post->post_title  . '"src="' . wp_get_attachment_image_src($id, $size = 'large')[0] . '"></a>';
        ?>

  </div>

      <div class="featured-in">

        <!-- BEGIN FEATURED IN // -->
        <?php get_template_part('template-parts/homepage_featured_in'); ?>
        <!-- // END FEATURED IN -->

      </div>

      <div class="background"></div>

    </section>
</div>

	</div>

  <?php
  get_footer();
