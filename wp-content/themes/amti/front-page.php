<?php/**
 * Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */
?>
 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>
 <head>
 <meta charset="<?php bloginfo('charset'); ?>">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="profile" href="http://gmpg.org/xfn/11">
 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

 <?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
 <div id="page" class="site">
 	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'transparency'); ?></a>

 	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
       	<div class="container">
         	<div class="row">
 	          	<div class="navbar-header">
 		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu-top-wrapper">
 		              <span class="sr-only">Toggle navigation</span>
 		              <span class="icon-bar"></span>
 		              <span class="icon-bar"></span>
 		              <span class="icon-bar"></span>
 		            </button>
 		            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
 		                              <h2><?php bloginfo('name'); ?></h2>
 		                            </a>
 	          	</div>

 				<!-- Bootstrap Navigation -->
         		<?php
                    wp_nav_menu(
    array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse navbar-responsive-collapse',
                        'container_id'      => 'main-menu-top-wrapper',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker()
                        )
                    );
                ?>
 			</div>
 		</div><!-- /.container-fluid -->
     </nav>

 	<div id="content" class="site-content">
    <section class="primary">
    <?php

      if (get_option('transparency_homepage_featured_post')) {
          $id = get_option('transparency_homepage_featured_post');
      } else {
          $latest_post = wp_get_recent_posts(array(
            'post_status' => 'publish',
            'numberposts' => 1,
            'post_type' => 'features',
            'suppress_filters'=>0,
          ), OBJECT);

          $id = $latest_post[0]->ID;
      }

    $post = get_post($id);
    setup_postdata($post);

      echo '<img class="feature-image"  src="' . wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large')[0] . '">

        <div class="feature-heading">

          <div class="feature-title">
            <div class="feature-subtitle">Latest Feature</div><a  class="title-latest" href="' . esc_url(get_permalink()) . '">
            ' . get_the_title() . '
              </a><div class="date">' . get_the_date() . '</div>
            </div>
        </div>

        <p class="feature-excerpt">' . wp_strip_all_tags(get_the_excerpt()) . ' <a href="' . esc_url(get_permalink()) . '">CONTINUE READING</a>
        </p>'
    ?>


      <div class="recent-content">
        <div class="section-title">Recent Content</div>
        <div class="feature-list">
          <?php



          $recent_post1 = get_option('transparency_homepage_recent_content_1');
          $recent_post2 = get_option('transparency_homepage_recent_content_2');
          $recent_post3 = get_option('transparency_homepage_recent_content_3');

          $featuredPostsArgs = array(
            'post__in' => array(
              $recent_post1,
              $recent_post2,
              $recent_post3,

              ),
              'orderby'=>'date',
              'order'=>'DESC',
              'post_type'=>'any'
          );


          $featured = get_posts($featuredPostsArgs);

          $offset = 3  - count($featured);

          $latest_post_ids = array(
            'post_status' => 'publish',
            'numberposts' => 3
          );

          $latest_posts = wp_get_recent_posts($latest_post_ids, OBJECT);

            $latestPostsArgs = array(
              'post__in' => array(
               $latest_posts[0]->ID,
               $latest_posts[1]->ID,
               $latest_posts[2]->ID

                ),
                'orderby'=>'date',
                'order'=>'DESC',
              'numberposts' => $offset
            );

            $latest = get_posts($latestPostsArgs);


            $all_posts =  sort_posts(array_merge($latest, $featured), 'post_date', $order = 'DESC', $unique = true);


                  foreach ($all_posts as $post) : setup_postdata($post);

                    echo '<div class="feature">
                      <div class="date"><span>' . get_the_date('M') . '</span> <span>' . get_the_date('j') . '</span></div>
                      <div class="title-author">
                        <a class="title" href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a>
                        <div class="authors">by <a href="' . esc_url(get_permalink()) . '">' . get_the_author() . '</a></div>
                      </div>
                      </div>';


                  endforeach;
                wp_reset_postdata();
              ?>
      </div>


      <a class="button" href="/analysis">
        <button>See More</button>
      </a>
      </div>

      <div class="margin-left">
      </div>

      <div class="margin-right">
      </div>

      <div class="margin-bottom">
      </div>

    </section>


    <section class="secondary">

          <img class="island-slideshow-image"  src="/wp-content/themes/amti/img/mischief.png">

        <div class="island-slideshow-caption">
          <span class="feature-subtitle">Photo:</span>
          <span class="feature-caption">Mischief Reef</span>
        </div>

        <div class="island-slideshow-slider">
          <span class="control">•</span>
          <span class="control active">•</span>
          <span class="control">•</span>
          <span class="control">•</span>
        </div>



      <div class="island-tracker">
        <div class="feature-title">
          Island Tracker
        </div>
        <p class="feature-excerpt">
          Five claimants occupy nearly 70 disputed reefs and islets spread across the South China Sea. They have built more than 90 outposts on these contested features, many of which have seen expansion in recent years.
        </p>
      </div>

      <div class="island-claimants">
        <p class="feature-description">
          Explore the database by selecting a claimant below.
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

        <div class="island-maps feature-heading">
          <div class="island-maps feature-title">
            Maps of the Asia Pacific
          </div>

            <div class="island-maps feature-description">
            <p class="island-maps">
              AMTI’s interactive maps strive to provide the most complete, accurate, and up-to-date source of geospatial information on maritime Asia.
            </p>
            <div  class="seeMore"><a href="">View Maps</a></div>
          </div>
        </div>
        <?php

          if (get_option('transparency_homepage_featured_map')) {
              $id = get_option('transparency_homepage_featured_map');
          } else {
              $id = get_option('transparency_homepage_featured_map');
          }

        echo '<img class="island-maps feature-map"  src="' . wp_get_attachment_image_src($id, $size = 'large')[0] . '">';


        ?>
      <div class="margin-left">
      </div>

      <div class="margin-right">
      </div>

      <div class="featured-in">
        <div class="section-title">
        Featured In
        </div>
        <div class="line"></div>
        <?php
        print_r(get_option('transparency_homepage_featured_in'));
         ?>
        <div class="logos">
          <img class="logo" src="/wp-content/themes/amti/img/featured_in/guardian.svg">
          <img class="logo" src="/wp-content/themes/amti/img/featured_in/nyt.svg">
          <img class="logo" src="/wp-content/themes/amti/img/featured_in/reuters.svg">
          <img class="logo" src="/wp-content/themes/amti/img/featured_in/smh.svg">
          <img class="logo" src="/wp-content/themes/amti/img/featured_in/wsj.svg">
          <img class="logo" src="/wp-content/themes/amti/img/featured_in/wapo.svg">
        </div>
      </div>
      <div class="background"></div>

    </section>


	</div>






	<script src="http://amti.csis.test:35729/livereload.js?snipver=1"></script>

  <?php
  get_footer();
