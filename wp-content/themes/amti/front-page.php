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

    get_header(); ?>

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
          <?php echo __('Island Tracker', 'transparency')?>
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
              <a class="island-shape" href="island-tracker/china"><?php get_template_part("img/island_tracker_icons/china-outline.svg")?></a>
              <a class="island-name" href="island-tracker/china">China</a>
          </div>
          <div class="island">
              <a class="island-shape" href="island-tracker/malaysia"><?php get_template_part("img/island_tracker_icons/malaysia-outline.svg")?></a>
              <a class="island-name" href="island-tracker/malaysia">Malaysia</a>
          </div>
          <div class="island">
              <a class="island-shape" href="island-tracker/phillipines"><?php get_template_part("img/island_tracker_icons/phillipines-outline.svg")?></a>
              <a class="island-name" href="island-tracker/phillipines">Phillipines</a>
          </div>
          <div class="island">
              <a class="island-shape" href="island-tracker/taiwan"><?php get_template_part("img/island_tracker_icons/taiwan-outline.svg")?></a>
              <a class="island-name" href="island-tracker/taiwan">Taiwan</a>
          </div>
          <div class="island">
              <a class="island-shape" href="island-tracker/vietnam"><?php get_template_part("img/island_tracker_icons/vietnam-outline.svg")?></a>
              <a class="island-name" href="island-tracker/vietnam">Vietnam</a>
          </div>
        </div>
      </div>

        <div class="island-maps">
        <div class="feature-heading">
          <h2 class="feature-title">
            <?php echo __('Maps of the Asia Pacific', 'transparency')?>
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
        echo '<img class="feature-map"  src="' . wp_get_attachment_image_src($id, $size = 'large')[0] . '">';
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
  <script src="http://amti.csis.test:35729/livereload.js?snipver=1"></script>


  <?php
  get_footer();
