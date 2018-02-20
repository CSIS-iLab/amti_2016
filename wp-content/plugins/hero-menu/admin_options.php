<?php

function js_hm_settings_init(  ) { 

	register_setting( 'pluginPage', 'js_hm_settings', 'js_hm_sanitize_options' );

	add_settings_section(
		'js_hm_pluginPage_section', 
		__( 'General Settings', 'heroMenu' ), 
		'', 
		'pluginPage'
	);

	add_settings_field( 
		'js_hm_fb_image', 
		__( 'Fallback Image', 'heroMenu' ), 
		'js_hm_fb_image_render', 
		'pluginPage', 
		'js_hm_pluginPage_section' 
	);

	add_settings_field( 
		'js_hm_fb_color', 
		__( 'Fallback Background Color', 'heroMenu' ), 
		'js_hm_fb_color_render', 
		'pluginPage', 
		'js_hm_pluginPage_section' 
	);

	add_settings_field( 
		'js_hm_default_cta', 
		__( 'Default Call to Action Text', 'heroMenu' ), 
		'js_hm_default_cta_render', 
		'pluginPage', 
		'js_hm_pluginPage_section' 
	);

	add_settings_field( 
		'js_hm_include_featured', 
		__( 'Include featured item on side menu?', 'heroMenu' ), 
		'js_hm_include_featured_render', 
		'pluginPage', 
		'js_hm_pluginPage_section' 
	);

	add_settings_field( 
		'js_hm_include_excerpt', 
		__( 'Include featured item\'s excerpt?', 'heroMenu' ), 
		'js_hm_include_excerpt_render', 
		'pluginPage', 
		'js_hm_pluginPage_section' 
	);

	add_settings_field( 
		'js_hm_include_date', 
		__( 'Include featured item\'s date?', 'heroMenu' ), 
		'js_hm_include_date_render', 
		'pluginPage', 
		'js_hm_pluginPage_section' 
	);

	add_settings_field( 
		'js_hm_show_on_pages', 
		__( 'Display menu on:', 'heroMenu' ), 
		'js_hm_show_on_pages_render', 
		'pluginPage', 
		'js_hm_pluginPage_section' 
	);

	add_settings_field( 
		'js_hm_layout_style', 
		__( 'Menu Layout Style', 'heroMenu' ), 
		'js_hm_layout_style_render', 
		'pluginPage', 
		'js_hm_pluginPage_section' 
	);

	add_settings_field( 
		'js_hm_custom_css', 
		__( 'Custom CSS', 'heroMenu' ), 
		'js_hm_custom_css_render', 
		'pluginPage', 
		'js_hm_pluginPage_section' 
	);


}

// Set Setting Defaults
$defaults = array(
    'js_hm_default_cta'   => 'See More',
    'js_hm_fb_color' => '#cccccc',
    'js_hm_fb_image' => null,
	'js_hm_include_featured' => 1,
	'js_hm_include_excerpt' => 0,
	'js_hm_include_date' => 0,
	'js_hm_show_on_pages' => 'all',
	'js_hm_layout_style' => 'side',
	'js_hm_custom_css' => null	    

);

function js_hm_fb_image_render(  ) { 

	global $defaults;
	$options = wp_parse_args(get_option( 'js_hm_settings', $defaults ), $defaults);
	?>
	<input type='hidden' name='js_hm_settings[js_hm_fb_image]' value='<?php echo $options['js_hm_fb_image']; ?>' id='fb_image_input' data-target='fb_image_input'>
    <div id='image-container-fb_image_input'>
    	<?php
    		if($options['js_hm_fb_image']) {
                    echo "<img src='".$options['js_hm_fb_image']."' id='fb_image_input' style='width:200px;height:auto;cursor:pointer;' class='choose-meta-image-button' title='Change Image' data-target='fb_image_input' /><br />";
                    echo '<input type="button" id="remove-meta-image-button" class="button" value="Remove Image" data-target="fb_image_input" />';
                }
        ?>
    </div>
    <input type="button" id="meta-image-button" class="button choose-meta-image-button" value="<?php _e( 'Choose or Upload an Image', 'text_domain' )?>" data-target="fb_image_input" />
	<p class="description">If there is no featured image, this image will be used instead.</p>
	<?php

}


function js_hm_fb_color_render(  ) { 

	global $defaults;
	$options = wp_parse_args(get_option( 'js_hm_settings', $defaults ), $defaults);
	?>
	<input type='text' name='js_hm_settings[js_hm_fb_color]' value='<?php echo $options['js_hm_fb_color']; ?>' class='color-field'>
	<p class="description">If this is no featured image or a fallback image selected, this background color will be used instead.</p>
	<?php

}


function js_hm_default_cta_render(  ) { 
	global $defaults;
	$options = wp_parse_args(get_option( 'js_hm_settings', $defaults ), $defaults);

	?>
	<input type='text' name='js_hm_settings[js_hm_default_cta]' value='<?php echo $options['js_hm_default_cta']; ?>'>
	<?php

}


function js_hm_include_featured_render(  ) { 

	global $defaults;
	$options = wp_parse_args(get_option( 'js_hm_settings', $defaults ), $defaults);
	?>
	<label for='js_hm_settings[js_hm_include_featured]'>
		<input type="radio" name="js_hm_settings[js_hm_include_featured]" value="1" <?php checked(1, $options['js_hm_include_featured'], true); ?>> Yes
        <input type="radio" name="js_hm_settings[js_hm_include_featured]" value="0" <?php checked(0, $options['js_hm_include_featured'], true); ?>> No
	</label>
	<p class='description'>Should the featured item also be included on the side menu?</p>
	<?php

}

function js_hm_include_excerpt_render(  ) { 

	global $defaults;
	$options = wp_parse_args(get_option( 'js_hm_settings', $defaults ), $defaults);
	?>
	<label for='js_hm_settings[js_hm_include_excerpt]'>
		<input type="radio" name="js_hm_settings[js_hm_include_excerpt]" value="1" <?php checked(1, $options['js_hm_include_excerpt'], true); ?>> Yes
        <input type="radio" name="js_hm_settings[js_hm_include_excerpt]" value="0" <?php checked(0, $options['js_hm_include_excerpt'], true); ?>> No
	</label>
	<p class='description'>Should the featured item's excerpt be displayed?</p>
	<?php
}

function js_hm_include_date_render(  ) { 

	global $defaults;
	$options = wp_parse_args(get_option( 'js_hm_settings', $defaults ), $defaults);
	?>
	<label for='js_hm_settings[js_hm_include_date]'>
		<input type="radio" name="js_hm_settings[js_hm_include_date]" value="1" <?php checked(1, $options['js_hm_include_date'], true); ?>> Yes
        <input type="radio" name="js_hm_settings[js_hm_include_date]" value="0" <?php checked(0, $options['js_hm_include_date'], true); ?>> No
	</label>
	<p class='description'>Should the featured item's date be displayed?</p>
	<?php
}


function js_hm_show_on_pages_render(  ) { 

	global $defaults;
	$options = wp_parse_args(get_option( 'js_hm_settings', $defaults ), $defaults);
	?>
	<select name='js_hm_settings[js_hm_show_on_pages]'>
		<option value='all' <?php selected( $options['js_hm_show_on_pages'], 'all' ); ?>>All Pages</option>
		<option value='front' <?php selected( $options['js_hm_show_on_pages'], 'front' ); ?>>Front Page Only</option>
	</select>

<?php

}


function js_hm_layout_style_render(  ) { 

	global $defaults;
	$options = wp_parse_args(get_option( 'js_hm_settings', $defaults ), $defaults);
	?>
	<select name='js_hm_settings[js_hm_layout_style]'>
		<option value='side' <?php selected( $options['js_hm_layout_style'], 'side' ); ?>>Featured Item with Side Menu</option>
		<option value='single' <?php selected( $options['js_hm_layout_style'], 'single' ); ?>>Single Featured Item</option>
	</select>

<?php

}


function js_hm_custom_css_render(  ) { 

	global $defaults;
	$options = wp_parse_args(get_option( 'js_hm_settings', $defaults ), $defaults);
	?>
	<textarea cols='80' rows='10' name='js_hm_settings[js_hm_custom_css]'><?php echo $options['js_hm_custom_css']; ?></textarea>
 	<p class='description'>Customize the appearance of the menu to match your site's theme.</p>
	<?php

}

function js_hm_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Hero Menu Settings</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

function js_hm_sanitize_options($input) {

	// Create our array for storing the validated options
    $output = array();
     
    // Loop through each of the incoming options
    foreach( $input as $key => $value ) {
         
        // Check to see if the current option has a value. If so, process it.
        if( isset( $input[$key] ) ) {
         
            // Strip all HTML and PHP tags and properly handle quoted strings
            $output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
             
        } // end if
         
    } // end foreach
     
    // Return the array processing any additional functions filtered by this action
    return apply_filters( 'js_hm_sanitize_options', $output, $input );

}

?>