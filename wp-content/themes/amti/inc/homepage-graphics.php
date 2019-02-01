<?php
/**
 * Custom settings page for the theme.
 *
 * @package Transparency
 */



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
    echo '<select  multiple name="' . $args[0] . '[key][]" id="' . esc_attr($args[0]) . '">';

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
