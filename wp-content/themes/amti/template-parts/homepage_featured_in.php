<?php
/**
 * Template part for displaying featured-in media outlet logos on homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Transparency
 */

 if (count(get_option('transparency_homepage_featured_in')['key'])) {

 echo '<h3 class="section-title">
'.__('Featured In', 'transparency').'
 </h3>
 <div class="line"></div>

 <div class="logos">';
       $logo_ids = get_option('transparency_homepage_featured_in')['key'];
       foreach ($logo_ids as $id) {
           echo '<div class="logo"><img src="' . wp_get_attachment_image_src($id, $size = 'large')[0] . '"></div>';
       }
     echo '</div>';
   }
 ?>
