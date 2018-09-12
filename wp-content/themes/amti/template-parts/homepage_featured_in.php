<?php
/**
 * Template part for displaying featured-in media outlet logos on homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

 if (count(get_option('transparency_homepage_featured_in')['key'])) {

 echo '<div class="section-title">
 Featured In
 </div>
 <div class="line"></div>

 <div class="logos">';
       $logo_ids = get_option('transparency_homepage_featured_in')['key'];
       foreach ($logo_ids as $id) {
           echo '<img class="logo" src="' . wp_get_attachment_image_src($id, $size = 'large')[0] . '">';
       }
     echo '</div>';
   }
 ?>
