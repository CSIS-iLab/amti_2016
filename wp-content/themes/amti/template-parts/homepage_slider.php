<?php
/**
 * Template part for displaying homepage slider.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */


 $satellite_ids = get_option('transparency_homepage_featured_satellites')['key'];

 $satellites = get_posts(array(
   'post_type'  => 'attachment',
   'post__in' => $satellite_ids
 ));

echo '<div class="island-slideshow-container"><div class="island-slideshow-image"><div class="frame">';
   foreach ($satellites as $post) : setup_postdata($post);
     echo '<img src="' . wp_get_attachment_image_src($post->ID, $size = 'large')[0] . '">';
   endforeach;
echo '</div></div></div>';

echo '<div class="island-slideshow-caption">
    <span class="feature-subtitle">Photo:</span>';

 foreach ($satellites as $key=>$post) : setup_postdata($post);
    if ($key == 0) {
        echo '<span class="feature-caption">&nbsp;' . $post->post_title . '</span>';
    } else {
        echo '<span class="feature-caption" style="display:none">&nbsp;' . $post->post_title . '</span>';
    }
 endforeach;

echo '</div>';
 wp_reset_postdata();

 echo '<div class="island-slideshow-slider">';
 foreach ($satellites as $key=>$post) {
     if ($key == 0) {
         echo '<span class="control active">•</span>';
     } else {
         echo '<span class="control">•</span>';
     }
 }
   echo '</div>';
