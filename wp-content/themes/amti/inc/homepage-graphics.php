<?php
/**
 * Custom settings page for the theme.
 *
 * @package Transparency
 */

function transparency_admin_init_section_homepage_graphics()
{
    $image_types = array( 'A Map Image', 'A Satellite Image', 'A Logo Image' );

    $image_selection = array();



    foreach ($image_types as $type) {
        $image_selection[$type] = get_posts(
           array(
             'post_type'  => 'attachment',
             'numberposts' => -1,
             'orderby'=>'date',
             'order'=>'DESC',
             'category_name'=> $type
           )
       );
    }



    add_settings_field(
       'transparency_homepage_featured_map',
       'Featured Map of the Asia Pacific',
       'transparency_posts_featured_map_callback',
       'transparency-options-page',
       'transparency_settings_section_homepage',
       array( 'transparency_homepage_featured_map', $image_selection['A Map Image'] )
   );

    add_settings_field(
       'transparency_homepage_featured_satellites',
       'Island Tracker Images',
       'transparency_posts_featured_satellites_callback',
       'transparency-options-page',
       'transparency_settings_section_homepage',
       array( 'transparency_homepage_featured_satellites', $image_selection['A Satellite Image'] )
   );

    add_settings_field(
       'transparency_homepage_featured_in',
       'Featured In...',
       'transparency_posts_featured_in_callback',
       'transparency-options-page',
       'transparency_settings_section_homepage',
       array( 'transparency_homepage_featured_in', $image_selection['A Logo Image'])
   );


    register_setting(
       'transparency_settings',
       'transparency_homepage_featured_map'
   );

    register_setting(
       'transparency_settings',
       'transparency_homepage_featured_satellites'
    );

    register_setting(
       'transparency_settings',
       'transparency_homepage_featured_in'
   );
}


function transparency_posts_featured_map_callback($args)
{
    $option = get_option($args[0]);
    echo '<select size="9" name="' . esc_attr($args[0]) . '" id="' . esc_attr($args[0]) . '">';

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


function transparency_posts_featured_satellites_callback($args)
{
    $option = get_option($args[0]);
    echo '<select multiple name="' . $args[0] . '[key][]" id="' . esc_attr($args[0]) . '">';

    foreach ($args[1] as $post) {
        $selected = in_array($post->ID, $option['key']) ? ' selected="selected" ' : '';

        $path = parse_url($post->guid)['path'];

        echo '<option style="background-image:url(\'' . $path . '\'); " value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . '</option>';
    }
    echo '</select>';
}




function transparency_posts_featured_in_callback($args)
{
    $option = get_option($args[0]);
    echo '<select multiple class="logo" name="' . $args[0] . '[key][]" id="' . esc_attr($args[0]) . '">';

    foreach ($args[1] as $post) {
        $selected = in_array($post->ID, $option['key']) ? ' selected="selected" ' : '';

        $path = parse_url($post->guid)['path'];

        echo '<option style="background-image:url(\'' . $path . '\'); " value="' . esc_attr($post->ID) . '" ' . $selected . '>' . esc_attr($post->post_title) . '</option>';
    }
    echo '</select>';
}
