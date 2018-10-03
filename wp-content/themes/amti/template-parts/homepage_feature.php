<?php
/**
 * Template part for displaying homepage feature.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */


if (get_option('transparency_homepage_featured_post')) {
    $id = get_option('transparency_homepage_featured_post');
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

echo '<img class="feature-image"  src="' . wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size = 'large')[0] . '">

  <div class="feature-heading">

    <div class="feature-title">
      <div class="feature-subtitle">'.__('Latest Feature', 'transparency').'</div><a  class="title-latest" href="' . esc_url(get_permalink()) . '">
      ' . get_the_title() . '
        </a><div class="date">' . get_the_date() . '</div>
      </div>
  </div>

  <p class="feature-excerpt">' . wp_strip_all_tags(get_the_excerpt()) . ' <a href="' . esc_url(get_permalink()) . '">'
.__('Continue Reading', 'transparency').
 '</a>
  </p>'
?>
