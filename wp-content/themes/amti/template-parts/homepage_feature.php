<?php
/**
 * Template part for displaying homepage feature.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */


if (get_option('transparency_homepage_featured_post-'.ICL_LANGUAGE_CODE)) {
    $id = get_option('transparency_homepage_featured_post-'.ICL_LANGUAGE_CODE);
} else {
    $latest_post = wp_get_recent_posts(array(
      'post_status' => 'publish',
      'numberposts' => 1,
      'post_type' => 'features',
      'suppress_filters'=>0,
    ), OBJECT);

    $id = $latest_post[0]->ID;
}

$post = get_post($id);
setup_postdata($post);

if (get_option('transparency_homepage_featured_post_title-'.ICL_LANGUAGE_CODE)) {
    $title = get_option('transparency_homepage_featured_post_title-'.ICL_LANGUAGE_CODE);
} else {
    $title =
    $title = get_the_title();
}




if (get_option('transparency_homepage_featured_image-'.ICL_LANGUAGE_CODE)) {
    $image_id = get_option('transparency_homepage_featured_image-'.ICL_LANGUAGE_CODE);
    $image = wp_get_attachment_image_src($image_id, $size = 'large')[0];
} else {
    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large')[0];
}


echo '<div class="feature-image">
  <a  class="title-latest" href="' . esc_url(get_permalink()) . '">
    <img alt="' . $title  . '"src="' . $image . '">
  </a>
</div>

  <div class="feature-heading">

    <div class="feature-title">
      <div class="feature-subtitle">'.__('Latest Feature', 'transparency').'</div><a  class="title-latest" href="' . esc_url(get_permalink()) . '">
      ' . $title . '
        </a><div class="date">' . get_the_date() . '</div>
      </div>
  </div>

  <p class="feature-excerpt">' . wp_strip_all_tags(get_the_excerpt()) . ' <a href="' . esc_url(get_permalink()) . '">'
.__('Continue Reading', 'transparency').
 '</a>
  </p>';
