<?php
/**
 * Custom settings page for the theme.
 *
 * @package Transparency
 */

 add_action( 'admin_menu', 'transparency_add_options_page' );
 /**
  * Create an options page for the theme.
  */
 function transparency_add_options_page() {
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
 function transparency_display_options_page() {
 	echo '<h1>Transparency Settings</h1>';
 	echo '<form method="post" action="options.php">';
 	do_settings_sections( 'transparency-options-page' );
 	settings_fields( 'transparency_settings' );
 	submit_button();
 	echo '</form>';
 }

 add_action( 'admin_init', 'transparency_admin_init_section_homepage' );
 /**
  * Creates the "Homepage" settings section.
  */
 function transparency_admin_init_section_homepage() {
 	$post_types = array( 'post', 'features', 'island-tracker' );

 	$post_selection = array();


 	foreach( $post_types as $type ) {
 		$post_selection[$type] = get_posts(
 	        array(
 	            'post_type'  => $type,
 	            'numberposts' => -1,
              'suppress_filters'=>0,
              'orderby'=>'date',
              'order'=>'DESC'
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

 }
 function transparency_display_section_homepage_message() {
 	echo 'The featured posts shown on the home page.';
 }

 /**
  * Renders the text input fields.
  *
  * @param  Array $args Array of arguments passed by callback function.
  */
 function transparency_text_callback( $args ) {
 	$option = get_option( $args[0] );
 	echo '<input type="text" class="regular-text" id="' . esc_attr( $args[0] ) . '" name="' . esc_attr( $args[0] ) . '" value="' . esc_attr( $option ) . '" />';
 }
 /**
  * Renders the textareafields.
  *
  * @param  Array $args Array of arguments passed by callback function.
  */
 function transparency_textarea_callback( $args ) {
 	$option = get_option( $args[0] );
 	echo '<textarea class="regular-text" id="' . esc_attr( $args[0] ) . '" name="' . esc_attr( $args[0] ) . '" rows="5">' . esc_attr( $option ) . '</textarea>';
 }
 /**
  * Renders the post dropdown fields.
  *
  * @param  Array $args Array of arguments passed by callback function.
  */
 function transparency_posts_callback( $args ) {




 	$option = get_option( $args[0] );
 	echo '<select name="' . esc_attr( $args[0] ) . '" id="' . esc_attr( $args[0] ) . '" name="' . esc_attr( $args[0] ) . '">';
 	foreach( $args[1] as $post ) {


 		if ( $post->ID == esc_attr( $option ) ) {
 			$selected = "selected";
 		} else {
 			$selected = '';
 		}
 		echo '<option value="' . esc_attr( $post->ID ) . '" ' . $selected . '>' . esc_attr( $post->post_title ) . '</option>';
 	}
 	echo '</select>';
 }



  function transparency_posts_features_callback( $args ) {

     $post_list = array_merge($args[1],$args[2]);


$sorted_posts = sort_posts( $post_list, 'post_date', $order = 'DESC', $unique = true );
  	$option = get_option( $args[0] );
  	echo '<select name="' . esc_attr( $args[0] ) . '" id="' . esc_attr( $args[0] ) . '" name="' . esc_attr( $args[0] ) . '">';
    echo '<option value> -- </option>';

  	foreach( $sorted_posts as $post ) {


  		if ( $post->ID == esc_attr( $option ) ) {
  			$selected = "selected";
  		} else {
  			$selected = '';
  		}
      if ($post->post_type== 'post'){
  		    echo '<option value="' . esc_attr( $post->ID ) . '" ' . $selected . '>' . esc_attr( $post->post_title ) . ': ANALYSIS</option>';
    	} else{
        echo '<option value="' . esc_attr( $post->ID ) . '" ' . $selected . '>' . esc_attr( $post->post_title ) . ': FEATURE</option>';
      }
    }
  	echo '</select>';
  }
