<?php
/**
 * Custom settings page for the theme.
 *
 * @package Transparency
 */


 function transparency_feature_callback($args)
 {
     $pages = new WP_Query(array(
     'suppress_filters' => true,
     'post_type' => 'page',

));

     $post_list = array_merge($pages->posts, $args[1]->posts, $args[2]->posts);


     $filteredPosts = array();

     foreach ($post_list as $pid) {
         $clang = apply_filters('wpml_post_language_details', null, $pid->ID);
         if (in_array($clang['language_code'], [strtolower($args[3])])) {
             $filteredPosts[] = get_post($pid);
         }
     }

     $post_list=$filteredPosts;



     $sorted_posts = sort_posts($post_list, 'post_date', $order = 'DESC', $unique = true);
     $option = get_option($args[0]);

     echo '<select name="' . esc_attr($args[0]) . '"  name="' . esc_attr($args[0]) . '" id="' . esc_attr($args[0]) . '">';
     echo '<option value> -- </option>';

     foreach ($sorted_posts as $post) {
         if ($post->ID == esc_attr($option)) {
             $selected = "selected";
         } else {
             $selected = '';
         }
         if ($post->post_type== 'post') {
             echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . ': ANALYSIS</option>';
         } elseif ($post->post_type== 'features') {
             echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . ': FEATURE</option>';
         } else {
             echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . ': PAGE</option>';
         }
     }
     echo '</select>';
 }


  function transparency_recent_content_callback($args)
  {
      $pages = new WP_Query(array(
      'suppress_filters' => true,
      'post_type' => 'page',

 ));

      $post_list = array_merge($pages->posts, $args[1]->posts, $args[2]->posts);

      $filteredPosts = array();
      foreach ($post_list as $pid) {
          $clang = apply_filters('wpml_post_language_details', null, $pid->ID);
          if (in_array($clang['language_code'], [strtolower($args[3])])) {
              $filteredPosts[] = get_post($pid);
          }
      }

      $post_list=$filteredPosts;


      $sorted_posts = sort_posts($post_list, 'post_date', $order = 'DESC', $unique = true);
      $option = get_option($args[0]);

      echo '<select name="' . esc_attr($args[0]) . '"  name="' . esc_attr($args[0]) . '" id="' . esc_attr($args[0]) . '">';
      echo '<option value> -- </option>';

      foreach ($sorted_posts as $post) {
          if ($post->ID == esc_attr($option)) {
              $selected = "selected";
          } else {
              $selected = '';
          }
          if ($post->post_type== 'post') {
              echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . ': ANALYSIS</option>';
          } elseif ($post->post_type== 'features') {
              echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . ': FEATURE</option>';
          } else {
              echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . ': PAGE</option>';
          }
      }
      echo '</select>';
  }


  function transparency_featured_image_callback($args)
  {
      $option = get_option($args[0]);
      echo '<select size="9" class="featured" name="' . esc_attr($args[0]) . '" id="' . esc_attr($args[0]) . '">';

      foreach ($args[1] as $post) {
          if ($post->ID == esc_attr($option)) {
              $selected = "selected";
          } else {
              $selected = '';
          }

          $path = parse_url($post->guid)['path'];

          echo '<option style="background-image:url(\'' . $path . '\'); " value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . '</option>';
      }
      echo '</select>';
  }
