<?php
/*
Plugin Name: WPML Featured image duplication fix
Description: When a post is duplicated the featured image from the source post is copied to the duplicate post and updated until the post is translated independently
Version: 1.0
Author: Peter Smith
Author URI: http://sandjam.co.uk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


class WpmlFeaturedImageDuplicationFix{

    function __construct(){
        // check $sitepress object
        global $sitepress;
        if ( !is_object($sitepress) ) {
            return;
        }

        // Add hooks
        add_action( 'icl_make_duplicate', array($this, 'make_duplicate'), 99, 4 );
        add_action('save_post', array($this, 'save_post'), 99, 3);
    }

    function make_duplicate($master_post_id, $lang, $post_array, $id){
        $this->copyImageToDuplicates($master_post_id);
    }

    function copyImageToDuplicates($post_id){
        global $sitepress;
        $trid = $sitepress->get_element_trid($post_id);
        $translations = $sitepress->get_element_translations($trid);

        // get thumbnail and id of src post
        foreach( $translations as $translation ) {
            if ($translation->original=='1') {
                $src_id = $translation->element_id;
                $src_thumbnail_id = get_post_meta($translation->element_id, '_thumbnail_id', true);
            }
        }

        // ensure a src post is found
        if (!$src_thumbnail_id) {
            return;
        }

        // get all duplicates of this post
        $duplicates = $sitepress->get_duplicates($src_id);

        // set thumbnail on all duplicates
        foreach( $duplicates as $countryCode => $duplicateId ) {
            update_post_meta ( $duplicateId, '_thumbnail_id', $src_thumbnail_id );
        }
    }

    function save_post( $post_id, $post, $update ){
        $this->copyImageToDuplicates($post_id);
    }
}

$wpmlFeaturedImageDuplicationFix = new WpmlFeaturedImageDuplicationFix();