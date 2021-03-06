<?php
/**
 * Template part for displaying recent content on homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */


echo '<h3 class="section-title">'.__('Recent Content', 'transparency').'</h3>
<div class="feature-list">';
  $recent_post1 = get_option('transparency_homepage_recent_content_1-'.ICL_LANGUAGE_CODE);
  $recent_post2 = get_option('transparency_homepage_recent_content_2-'.ICL_LANGUAGE_CODE);
  $recent_post3 = get_option('transparency_homepage_recent_content_3-'.ICL_LANGUAGE_CODE);

  $featuredPostsArgs = array(
    'post__in' => array(
      $recent_post1,
      $recent_post2,
      $recent_post3,
      ),
      'post_type'=>'any',
      'orderby'=>'post__in'
  );


  $featured = get_posts($featuredPostsArgs);

  $offset = 3  - count($featured);

  if ($offset > 0) {
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

        'numberposts' => $offset,
        'orderby'=>'post__in'
      );

      $latest = get_posts($latestPostsArgs);

      $all_posts =  array_merge($latest, $featured);
  } else {
      $all_posts =  $featured;
  }

          foreach ($all_posts as $key=>$post) : setup_postdata($post);
          $index = $key + 1;

          if (get_option('transparency_homepage_recent_content_'.$index.'_title-'.ICL_LANGUAGE_CODE)) {
              $title = get_option('transparency_homepage_recent_content_'.$index.'_title-'.ICL_LANGUAGE_CODE);
          } else {
              $title =
              $title = get_the_title();
          }




            echo '<div class="feature">
              <div class="date"><span>' . get_the_date('M') . '</span> <span>' . get_the_date('j') . '</span></div>
              <div class="title-author"><a class="title" href="' . esc_url(get_permalink()) . '">' . $title . '</a>';

                  if ($post->post_type=="post") {
                      echo '<div class="authors">by <a href="' . esc_url(get_permalink()) . '">' . get_the_author() . '</a></div>';
                  }

              echo '</div>
              </div>';


          endforeach;
        wp_reset_postdata();
echo '</div>


<a class="button" href="/analysis?lang=' . ICL_LANGUAGE_CODE . '">
'.__('See More', 'transparency').'
</a>';
