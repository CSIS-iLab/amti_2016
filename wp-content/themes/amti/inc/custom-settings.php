<?php
/**
 * Custom settings page for the theme.
 *
 * @package Transparency
 */

 add_action('admin_menu', 'transparency_add_options_page');
 /**
  * Create an options page for the theme.
  */
 function transparency_add_options_page()
 {
     add_options_page(
        'Transparency Settings',
        'Transparency Settings',
        'manage_options',
        'transparency-options-page',
        'transparency_display_options_page'
    );
 }
 /**
  * Displays the option page and creates the form.
  */
 function transparency_display_options_page()
 {
     echo '<h1>Transparency Settings</h1>';
     echo '<form method="post" action="options.php">';
     do_settings_sections('transparency-options-page');
     settings_fields('transparency_settings');
     submit_button();
     echo '</form>';
 }

 add_action('admin_init', 'transparency_admin_init_section_homepage');
 /**
  * Creates the "Homepage" settings section.
  */
 function transparency_admin_init_section_homepage()
 {
     $post_types = array( 'post', 'features', 'island-tracker', 'attachment' );

     $post_selection = array();
     $image_selection = array();


     foreach ($post_types as $type) {
         $post_selection[$type] = get_posts(
            array(
              'post_type'  => $type,
              'numberposts' => -1,
              'suppress_filters'=>0,
              'orderby'=>'date',
              'order'=>'DESC'
            )
        );

         $image_selection[$type] = get_posts(
            array(
              'post_type'  => $type,
              'numberposts' => -1,
              'suppress_filters'=>0,
              'orderby'=>'date',
              'order'=>'DESC',
              'category_name'=>'A Map Image'
            )
        );
     }


     add_settings_section(
        'transparency_settings_section_homepage',
        'Homepage',
        'transparency_display_section_homepage_message',
        'transparency-options-page'
    );


     /**
      * Featured Post.
      */

     add_settings_field(
        'transparency_homepage_featured_post',
        'Featured Post',
        'transparency_posts_callback',
        'transparency-options-page',
        'transparency_settings_section_homepage',
        array( 'transparency_homepage_featured_post', $post_selection['features'] )
    );



     /**
      * Recent Posts.
      */


     add_settings_field(
        'transparency_homepage_recent_content_1',
        'Recent Content #1 (optional)',
        'transparency_posts_features_callback',
        'transparency-options-page',
        'transparency_settings_section_homepage',
        array( 'transparency_homepage_recent_content_1', $post_selection['post'],$post_selection['features'] )
    );
     add_settings_field(
        'transparency_homepage_recent_content_2',
    'Recent Content #2 (optional)',
        'transparency_posts_features_callback',
        'transparency-options-page',
        'transparency_settings_section_homepage',
        array( 'transparency_homepage_recent_content_2', $post_selection['post'],$post_selection['features'] )
    );
     add_settings_field(
        'transparency_homepage_recent_content_3',
    'Recent Content #3 (optional)',
        'transparency_posts_features_callback',
        'transparency-options-page',
        'transparency_settings_section_homepage',
        array( 'transparency_homepage_recent_content_3', $post_selection['post'],$post_selection['features'] )
    );

     add_settings_field(
        'transparency_homepage_featured_map',
        'Featured Map of the Asia Pacific',
        'transparency_posts_featured_map_callback',
        'transparency-options-page',
        'transparency_settings_section_homepage',
        array( 'transparency_homepage_featured_map', $image_selection['attachment'])
    );

     add_settings_field(
        'transparency_homepage_featured_in',
        'Featured In...',
        'transparency_posts_featured_in_callback',
        'transparency-options-page',
        'transparency_settings_section_homepage',
        array( 'transparency_homepage_featured_in')
    );

     register_setting(
        'transparency_settings',
        'transparency_homepage_featured_post',
        'sanitize_text_field'
    );


     register_setting(
        'transparency_settings',
        'transparency_homepage_recent_content_1',
        'sanitize_text_field'
    );

     register_setting(
        'transparency_settings',
        'transparency_homepage_recent_content_2',
        'sanitize_text_field'
    );

     register_setting(
        'transparency_settings',
        'transparency_homepage_recent_content_3',
        'sanitize_text_field'
    );

     register_setting(
        'transparency_settings',
        'transparency_homepage_featured_map',
        'sanitize_text_field'
    );

     register_setting(
        'transparency_settings',
        'transparency_homepage_featured_in',
        'sanitize_text_field'
    );
 }
 function transparency_display_section_homepage_message()
 {
     echo 'The featured posts shown on the home page.';
 }

 /**
  * Renders the text input fields.
  *
  * @param  Array $args Array of arguments passed by callback function.
  */
 function transparency_text_callback($args)
 {
     $option = get_option($args[0]);
     echo '<input type="text" class="regular-text" id="' . esc_attr($args[0]) . '" name="' . esc_attr($args[0]) . '" value="' . esc_attr($option) . '" />';
 }
 /**
  * Renders the textareafields.
  *
  * @param  Array $args Array of arguments passed by callback function.
  */
 function transparency_textarea_callback($args)
 {
     $option = get_option($args[0]);
     echo '<textarea class="regular-text" id="' . esc_attr($args[0]) . '" name="' . esc_attr($args[0]) . '" rows="5">' . esc_attr($option) . '</textarea>';
 }
 /**
  * Renders the post dropdown fields.
  *
  * @param  Array $args Array of arguments passed by callback function.
  */
 function transparency_posts_callback($args)
 {
     $latest_posts = wp_get_recent_posts(array(
     'post_status' => 'publish',
     'numberposts' => 1,
     'post_type' => 'features',
     'suppress_filters'=>0,
   ), OBJECT);

     $id = $latest_posts[0]->ID;

     $latest_post = get_post($id);


     $option = get_option($args[0]);
     echo '<select name="' . esc_attr($args[0]) . '" id="' . esc_attr($args[0]) . '">';
     echo '<option value> -- </option>';
     echo '<option value="' . esc_attr($latest_post->ID) . '" ' . 'selected >' . esc_attr($latest_post->post_title) . '</option>';

     foreach ($args[1] as $key=>$post) {
         if ($key == 0) {
             continue;
         } else {
             if ($post->ID == esc_attr($option)) {
                 $selected = "selected";
             } else {
                 $selected = '';
             }
             echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . '</option>';
         }
     }
     echo '</select>';
 }




  function transparency_posts_features_callback($args)
  {
      $post_list = array_merge($args[1], $args[2]);


      $sorted_posts = sort_posts($post_list, 'post_date', $order = 'DESC', $unique = true);
      $option = get_option($args[0]);
      echo '<select name="' . esc_attr($args[0]) . '" id="' . esc_attr($args[0]) . '">';
      echo '<option value> -- </option>';

      foreach ($sorted_posts as $post) {
          if ($post->ID == esc_attr($option)) {
              $selected = "selected";
          } else {
              $selected = '';
          }
          if ($post->post_type== 'post') {
              echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . ': ANALYSIS</option>';
          } else {
              echo '<option value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . ': FEATURE</option>';
          }
      }
      echo '</select>';
  }







  function transparency_posts_featured_map_callback($args)
  {
      echo '<select  multiple  style="height: 50vh;width: 100%;" name="' . esc_attr($args[0]) . '" id="' . esc_attr($args[0]) . '">';
      echo '<option value> -- </option>';

      foreach ($args[1] as $post) {
          if ($post->ID == esc_attr($option)) {
              $selected = "selected";
          } else {
              $selected = '';
          }
          $path = parse_url($post->guid)['path'];

          echo '<option style="background-image:url(\'' . $path . '\'); background-size:contain; background-repeat:no-repeat; width: 200px; height: 200px; display: inline;float:left; margin: 0 3px; box-sizing: content-box;" value="' . esc_attr($post->ID) . '" ' . $selected . '>&nbsp;</option>';
      }
      echo '</select>';
  }


  function transparency_posts_featured_in_callback($args)
  {
      echo '<input type="checkbox" name="' . esc_attr($args[0]) . '" value="Guardian">Guardian<br>';
      echo '<input type="checkbox" name="' . esc_attr($args[0]) . '" value="NY Times">NY Times<br>';
      echo '<input type="checkbox" name="' . esc_attr($args[0]) . '" value="Reuters">Reuters<br>';
      echo '<input type="checkbox" name="' . esc_attr($args[0]) . '" value="Sydney Morning Herald">Sydney Morning Herald<br>';
      echo '<input type="checkbox" name="' . esc_attr($args[0]) . '" value="Wall Street Journal">Wall Street Journal<br>';
      echo '<input type="checkbox" name="' . esc_attr($args[0]) . ' checked" value="Washington Post">Washington Post<br>';

      // if(isset($_POST['submit'])){
      // if(!empty($_POST[$args[0]])) {
      // // Counting number of checked checkboxes.
      // $checked_count = count($_POST[$args[0]]);
      // echo "You have selected following ".$checked_count." option(s): <br/>";
      // // Loop to store and display values of individual checked checkbox.
      // foreach($_POST[$args[0]] as $selected) {
      // echo "<p>".$selected ."</p>";
      // }
      // echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
      // }
      // else{
      // echo "<b>Please Select Atleast One Option.</b>";
      // }
      // }
  }
