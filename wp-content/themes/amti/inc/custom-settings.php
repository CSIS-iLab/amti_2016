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
 add_action( 'admin_init', 'transparency_admin_init_section_footer' );
 /**
  * Creates the "Footer" settings section.
  */
 function transparency_admin_init_section_footer() {
 	add_settings_section(
 		'transparency_settings_section_footer',
 		'Footer',
 		'transparency_display_section_footer_message',
 		'transparency-options-page'
 	);
 	add_settings_field(
 		'transparency_description',
 		'Description',
 		'transparency_textarea_callback',
 		'transparency-options-page',
 		'transparency_settings_section_footer',
 		array( 'transparency_description' )
 	);
 	add_settings_field(
 		'transparency_newsletter_desc',
 		'Newsletter Description',
 		'transparency_textarea_callback',
 		'transparency-options-page',
 		'transparency_settings_section_footer',
 		array( 'transparency_newsletter_desc' )
 	);
 	add_settings_field(
 		'transparency_newsletter_url',
 		'Newsletter URL',
 		'transparency_text_callback',
 		'transparency-options-page',
 		'transparency_settings_section_footer',
 		array( 'transparency_newsletter_url' )
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_description',
 		'wp_filter_post_kses'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_newsletter_desc',
 		'sanitize_text_field'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_newsletter_url',
 		'esc_url'
 	);
 }
 /**
  * Footer section description.
  */
 function transparency_display_section_footer_message() {
 	echo 'Information visible in the site\'s footer.';
 }
 add_action( 'admin_init', 'transparency_admin_init_section_contact' );
 /**
  * Creates the "Contact" settings section.
  */
 function transparency_admin_init_section_contact() {
 	add_settings_section(
 		'transparency_settings_section_contact',
 		'Contact Information',
 		'transparency_display_section_contact_message',
 		'transparency-options-page'
 	);
 	add_settings_field(
 		'transparency_email',
 		'Email',
 		'transparency_text_callback',
 		'transparency-options-page',
 		'transparency_settings_section_contact',
 		array( ' transparency_email' )
 	);
 	add_settings_field(
 		'transparency_twitter',
 		'Twitter',
 		'transparency_text_callback',
 		'transparency-options-page',
 		'transparency_settings_section_contact',
 		array( ' transparency_twitter' )
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_email',
 		'sanitize_text_field'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_twitter',
 		'sanitize_text_field'
 	);
 }
 /**
  * Contact section description.
  */
 function transparency_display_section_contact_message() {
 	echo 'The contact information for the site, email and social media accounts.';
 }
 add_action( 'admin_init', 'transparency_admin_init_section_homepage' );
 /**
  * Creates the "Homepage" settings section.
  */
 function transparency_admin_init_section_homepage() {
 	$post_types = array( 'post', 'events', 'data' );
 	$post_selection = array();
 	foreach( $post_types as $type ) {
 		$post_selection[$type] = get_posts(
 	        array(
 	            'post_type'  => $type,
 	            'numberposts' => -1
 	        )
 	    );
 	}
 	add_settings_section(
 		'transparency_settings_section_homepage',
 		'Homepage',
 		'transparency_display_section_homepage_message',
 		'transparency-options-page'
 	);
 	add_settings_field(
 		'transparency_homepage_featured_post_1',
 		'Featured Post #1',
 		'transparency_posts_callback',
 		'transparency-options-page',
 		'transparency_settings_section_homepage',
 		array( 'transparency_homepage_featured_post_1', $post_selection['post'] )
 	);
 	add_settings_field(
 		'transparency_homepage_featured_post_2',
 		'Featured Post #2',
 		'transparency_posts_callback',
 		'transparency-options-page',
 		'transparency_settings_section_homepage',
 		array( 'transparency_homepage_featured_post_2', $post_selection['post'] )
 	);
 	add_settings_field(
 		'transparency_homepage_featured_post_3',
 		'Featured Post #3',
 		'transparency_posts_callback',
 		'transparency-options-page',
 		'transparency_settings_section_homepage',
 		array( 'transparency_homepage_featured_post_3', $post_selection['post'] )
 	);
 	add_settings_field(
 		'transparency_homepage_featured_event',
 		'Featured Event',
 		'transparency_posts_callback',
 		'transparency-options-page',
 		'transparency_settings_section_homepage',
 		array( 'transparency_homepage_featured_event', $post_selection['events'] )
 	);
 	add_settings_field(
 		'transparency_homepage_featured_data_1',
 		'Featured Data #1',
 		'transparency_posts_callback',
 		'transparency-options-page',
 		'transparency_settings_section_homepage',
 		array( 'transparency_homepage_featured_data_1', $post_selection['data'] )
 	);
 	add_settings_field(
 		'transparency_homepage_featured_data_2',
 		'Featured Data #2',
 		'transparency_posts_callback',
 		'transparency-options-page',
 		'transparency_settings_section_homepage',
 		array( 'transparency_homepage_featured_data_2', $post_selection['data'] )
 	);
 	add_settings_field(
 		'transparency_homepage_transparency101_desc',
 		'Transparency101 Description',
 		'transparency_textarea_callback',
 		'transparency-options-page',
 		'transparency_settings_section_homepage',
 		array( 'transparency_homepage_transparency101_desc' )
 	);
 	add_settings_field(
 		'transparency_homepage_data_desc',
 		'Data Repo Desc',
 		'transparency_textarea_callback',
 		'transparency-options-page',
 		'transparency_settings_section_homepage',
 		array( 'transparency_homepage_data_desc' )
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_homepage_featured_post_1',
 		'sanitize_text_field'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_homepage_featured_post_2',
 		'sanitize_text_field'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_homepage_featured_post_3',
 		'sanitize_text_field'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_homepage_featured_event',
 		'sanitize_text_field'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_homepage_featured_data_1',
 		'sanitize_text_field'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_homepage_featured_data_2',
 		'sanitize_text_field'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_homepage_transparency101_desc',
 		'wp_filter_post_kses'
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_homepage_data_desc',
 		'wp_filter_post_kses'
 	);
 }
 /**
  * Contact section description.
  */
 function transparency_display_section_homepage_message() {
 	echo 'The featured posts shown on the home page.';
 }
 add_action( 'admin_init', 'transparency_admin_init_section_archives' );
 /**
  * Creates the "Footer" settings section.
  */
 function transparency_admin_init_section_archives() {
 	add_settings_section(
 		'transparency_settings_section_archives',
 		'Archives',
 		'transparency_display_section_archives_message',
 		'transparency-options-page'
 	);
 	add_settings_field(
 		'transparency_archives_transparency101_filter_limit',
 		'Transparency101 Filter Tags Limit',
 		'transparency_text_callback',
 		'transparency-options-page',
 		'transparency_settings_section_archives',
 		array( 'transparency_archives_transparency101_filter_limit' )
 	);
 	register_setting(
 		'transparency_settings',
 		'transparency_archives_transparency101_filter_limit',
 		'sanitize_text_field'
 	);
 }
 /**
  * Archives section description.
  */
 function transparency_display_section_archives_message() {
 	echo 'Information visible in the site\'s archives.';
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
