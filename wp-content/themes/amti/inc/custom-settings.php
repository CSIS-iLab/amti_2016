<?php
/**
 * Custom settings page for the theme.
 *
 * @package Transparency
 */



 add_action('admin_menu', function () {
     add_options_page(
        'Transparency Settings',
        'Transparency Settings',
        'manage_options',
        'transparency-options-page',
        function () {
            echo '<h1>Transparency Settings</h1>'; ?>
                    <?php $active_tab = isset($_GET[ 'tab' ]) ? $_GET[ 'tab' ] : 'EN'; ?>
                    <h2 class="nav-tab-wrapper">
                       <a href="?page=transparency-options-page&tab=EN" class="nav-tab <?php echo $active_tab == 'EN' ? 'nav-tab-active' : ''; ?>">English</a>
                       <a href="?page=transparency-options-page&tab=ZH-HANT" class="nav-tab <?php echo $active_tab == 'ZH-HANT' ? 'nav-tab-active' : ''; ?>">Chinese (Traditional)</a>
                       <a href="?page=transparency-options-page&tab=ZH-HANS" class="nav-tab <?php echo $active_tab == 'ZH-HANS' ? 'nav-tab-active' : ''; ?>">Chinese (Simplified)</a>
                       <a href="?page=transparency-options-page&tab=VI" class="nav-tab <?php echo $active_tab == 'VI' ? 'nav-tab-active' : ''; ?>">Vietnamese</a>
                       <a href="?page=transparency-options-page&tab=MS" class="nav-tab <?php echo $active_tab == 'MS' ? 'nav-tab-active' : ''; ?>">Malaysian</a>
                     </h2>
            <?php
            echo '<form method="post" id="transparency-settings" action="options.php">';
            do_settings_sections('transparency-options-page');

                $languages = array( 'VI', 'MS', 'EN', 'ZH-HANS', 'ZH-HANT' );
                foreach ($languages as $language) {
                  $tab = isset($_GET[ 'tab' ]) ? $_GET[ 'tab' ] : 'EN';

                  if ($tab==$language){
                    settings_fields('transparency_settings-'.$language);
                }
}


            submit_button();
            echo '</form>';
        }
    );
 });

 add_action(
   'admin_init',
   function () {
       add_settings_section(
        'transparency_settings_section_homepage',
        'Homepage',
        function () {        },
        'transparency-options-page'
    );
   }
  );


add_action('admin_menu', function () {
    wp_enqueue_script('settings-page', get_template_directory_uri() . '/settings-page/settings-page.js');
    wp_enqueue_style('settings-page', get_template_directory_uri() . '/settings-page/settings-page.css');
});

require_once('homepage-content.php');
require_once('homepage-graphics.php');
add_action('admin_init', 'transparency_admin_init_section_homepage_content');
add_action('admin_init', 'transparency_admin_init_section_homepage_graphics');




 function transparency_admin_init_section_homepage_content()
 {
   $post_types = array( 'post', 'features', 'island-tracker', 'attachment' );
   $post_selection = array();
   foreach ($post_types as $type) {
       $post_selection[$type] = get_posts(
          array(
          'post_status' => 'publish',
            'post_type'  => $type,
            'numberposts' => -1,
            'suppress_filters'=>true,
            'orderby'=>'date',
            'order'=>'DESC'
          )
      );
   }

     $languages = array( 'VI', 'MS', 'EN', 'ZH-HANS', 'ZH-HANT' );

     foreach ($languages as $language) {

     $tab = isset($_GET[ 'tab' ]) ? $_GET[ 'tab' ] : 'EN';

     if ($tab==$language){
       add_settings_field(
          'transparency_homepage_featured_post-'.$language,
          'Featured Post-'.$language,
          'transparency_feature_callback',
          'transparency-options-page',
          'transparency_settings_section_homepage',
          array( 'transparency_homepage_featured_post-'.$language, $post_selection['features'], $language)
      );

       add_settings_field(
          'transparency_homepage_recent_content_1-'.$language,
          'Recent Content #1 (optional)-'.$language,
          'transparency_recent_content_callback',
          'transparency-options-page',
          'transparency_settings_section_homepage',
          array( 'transparency_homepage_recent_content_1-'.$language, $post_selection['post'],$post_selection['features'], $language)
      );

       add_settings_field(
          'transparency_homepage_recent_content_2-'.$language,
          'Recent Content #2 (optional)-'.$language,
          'transparency_recent_content_callback',
          'transparency-options-page',
          'transparency_settings_section_homepage',
          array( 'transparency_homepage_recent_content_2-'.$language, $post_selection['post'],$post_selection['features'], $language)
      );

       add_settings_field(
          'transparency_homepage_recent_content_3-'.$language,
          'Recent Content #3 (optional)-'.$language,
          'transparency_recent_content_callback',
          'transparency-options-page',
          'transparency_settings_section_homepage',
          array( 'transparency_homepage_recent_content_3-'.$language, $post_selection['post'],$post_selection['features'], $language)
      );
    }

     register_setting(
        'transparency_settings-'.$language,
        'transparency_homepage_featured_post-'.$language,
        'sanitize_text_field'
    );

     register_setting(
        'transparency_settings-'.$language,
        'transparency_homepage_recent_content_1-'.$language,
        'sanitize_text_field'
    );

     register_setting(
        'transparency_settings-'.$language,
        'transparency_homepage_recent_content_2-'.$language,
        'sanitize_text_field'
    );

     register_setting(
        'transparency_settings-'.$language,
        'transparency_homepage_recent_content_3-'.$language,
        'sanitize_text_field'
    );
 }
}
