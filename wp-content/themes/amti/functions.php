<?php
/**
 * Transparency functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Transparency
 */



if ( ! function_exists( 'transparency_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function transparency_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Transparency, use a find and replace
	 * to change 'transparency' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'transparency', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'transparency' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'transparency_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Disable WPML Stylesheet if one exists
	if ( function_exists('icl_object_id') ) {
	    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
	}
}
endif;
add_action( 'after_setup_theme', 'transparency_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function transparency_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'transparency_content_width', 1200 );
}
add_action( 'after_setup_theme', 'transparency_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function transparency_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'transparency' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'transparency' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name' => __( 'Footer', 'transparency' ),
		'id' => 'footer',
		'description' => __( 'Widgets in this area will be shown in the Footer.' , 'transparency'),
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'before_widget' => '<div id="%1$s" class="widget %2$s col-lg-4 col-md-4 col-sm-6 col-xs-12">',
		'after_widget' => '</div>'
	  )
	);
}
add_action( 'widgets_init', 'transparency_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function transparency_scripts() {
	wp_enqueue_style( 'transparency-style', get_stylesheet_uri() );

	wp_enqueue_script( 'transparency-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'transparency-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'transparency-topbutton', get_template_directory_uri() . '/js/topbutton.js', array(), '20151215', true );

	wp_enqueue_script( 'transparency-slider', get_template_directory_uri() . '/js/slider.js', array(), '20151215', true );

	// Font Awesome
	wp_enqueue_script('transparency-font-awesome', 'https://use.fontawesome.com/08b1a76eab.js');

	// jQuery
	wp_enqueue_script('jquery');

	// Bootstrap
	wp_enqueue_script('transparency-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script('clickgallery-settings', get_template_directory_uri() . '/js/custom-gallery-setting.js', array('jquery'), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'transparency_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Custom Post Type Formats
**/

add_theme_support( 'post-formats', array( 'standard', 'image' ) );

function rename_post_formats( $safe_text ) {
    if ( $safe_text == 'Image' )
        return 'Full-Width';

    return $safe_text;
}
add_filter( 'esc_html', 'rename_post_formats' );

//rename image in posts list table
function live_rename_formats() {
    global $current_screen;

    if ( $current_screen->id == 'edit-post' ) { ?>
        <script type="text/javascript">
        jQuery('document').ready(function() {

            jQuery("span.post-state-format").each(function() {
                if ( jQuery(this).text() == "Image" )
                    jQuery(this).text("Full-Width");
            });

        });
        </script>
<?php }
}
add_action('admin_head', 'live_rename_formats');

/*-----------------------------------------------------------------------------------*/
/* Register Features taxonomy
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'create_feature_type' );
function create_feature_type() {
  register_post_type( 'features',
    array(
      'labels' => array(
        'name' => __( 'Features' ),
        'singular_name' => __( 'Feature' )
      ),
			'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'publicize', 'thumbnail', 'post-formats' ),
      'public' => true,
      'has_archive' => true,
			'menu_icon'   => 'dashicons-layout',
    )
  );
}
add_action( 'init', 'create_features_taxonomy', 0 );
function create_features_taxonomy() {
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'features' ),
		'show_in_rest'    => true
	);
	register_taxonomy( 'categories', array( 'features' ), $args );
}

/*-----------------------------------------------------------------------------------*/
/* Register Island Tracker Taxonomy
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'create_island_tracker_type' );
function create_island_tracker_type() {
  register_post_type( 'island-tracker',
    array(
      	'labels' => array(
        	'name' => __( 'Island Tracker' ),
        	'singular_name' => __( 'Island' )
      	),
      	'description' => __('Description of the Island Tracker'),
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'publicize', 'thumbnail' ),
      	'public' => true,
      	'has_archive' => true,
		'menu_icon'   => 'dashicons-layout',
    )
  );
}
add_action( 'init', 'create_countries_taxonomy', 0 );
function create_countries_taxonomy() {
	$labels = array(
		'name'              => _x( 'Locations', 'taxonomy general name' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Locations' ),
		'all_items'         => __( 'All Locations' ),
		'parent_item'       => __( 'Parent Country' ),
		'parent_item_colon' => __( 'Parent Country:' ),
		'edit_item'         => __( 'Edit Location' ),
		'update_item'       => __( 'Update Location' ),
		'add_new_item'      => __( 'Add New Location' ),
		'new_item_name'     => __( 'New Location Name' ),
		'menu_name'         => __( 'Locations' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'island-tracker' ),
		'show_in_rest'    => true

	);
	register_taxonomy( 'countries', array( 'island-tracker' ), $args );
}

// Include Countries custom meta
include_once("js-countries-meta.php");



/*----------  Custom Meta Fields  ----------*/
/**
 * Add meta box
 *
 * @param post $post The post object.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function islandtracker_add_meta_boxes( $post ) {
add_meta_box( 'island-tracker_meta_box', __( 'Island Details', 'amti' ), 'islandtracker_build_meta_box', 'island-tracker', 'normal', 'high' );

}
add_action( 'add_meta_boxes_island-tracker', 'islandtracker_add_meta_boxes' );


/**
 * Build custom field meta box
 *
 * @param post $post The post object.
 */

function amti_get_sample_options() {
	$options = array (
		'Option 1' => 'option1',
		'Option 2' => 'option2',
		'Option 3' => 'option3',
	);

	return $options;
}


function islandtracker_build_meta_box( $post ) {
	// Make sure the form request comes from WordPress.
	wp_nonce_field( basename( __FILE__ ), 'island-tracker_meta_box_nonce' );

	// Retrieve current value of fields.
	$current_occupation = get_post_meta( $post->ID, '_island-tracker_occupation', true );
	$current_status = get_post_meta( $post->ID, '_island-tracker_status', true );
	$current_area = get_post_meta( $post->ID, '_island-tracker_area', true );
	$current_usa = get_post_meta( $post->ID, '_island-tracker_usa', true );
	$current_china = get_post_meta( $post->ID, '_island-tracker_china', true );
	$current_taiwan = get_post_meta( $post->ID, '_island-tracker_taiwan', true );
	$current_vietnam = get_post_meta( $post->ID, '_island-tracker_vietnam', true );
	$current_philippines = get_post_meta( $post->ID, '_island-tracker_philippines', true );
	$current_malaysia = get_post_meta( $post->ID, '_island-tracker_malaysia', true );
	$current_gps = get_post_meta( $post->ID, '_island-tracker_gps', true );
	$current_links = get_post_meta( $post->ID, '_island-tracker_links', true );
	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
	$options = amti_get_sample_options();

	?>
	<div class='inside'>
<script type="text/javascript">
	jQuery(document).ready(function( $ ){
		$( '#add-row' ).on('click', function() {
			var row = $( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
			return false;
		});

		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
	});
	</script>
		<p><strong><label style="display: inline-block; width: 15%;" for="occupation">Occupied by: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="occupation" value="<?php echo esc_attr( $current_occupation ); ?>" /></p>
		<p><strong><label style="display: inline-block; width: 15%;" for="status">Legal status: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="status" value="<?php echo esc_attr( $current_status ); ?>" /></p>
		<p><strong><label style="display: inline-block; width: 15%;" for="area">Total area of reclamation: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="area" value="<?php echo esc_attr( $current_area ); ?>" /></p>
		<p><strong><label style="display: inline-block; width: 15%;" for="gps">GPS: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="gps" value="<?php echo esc_attr( $current_gps ); ?>" /></p>

		<h3 style="margin-top: 50px;">Name Translations</h3>
		<p><strong><label style="display: inline-block; width: 15%;" for="usa">Board of Geographic Names: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="usa" value="<?php echo esc_attr( $current_usa ); ?>" /></p>
		<p><strong><label style="display: inline-block; width: 15%;" for="china">China: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="china" value="<?php echo esc_attr( $current_china ); ?>" /></p>
		<p><strong><label style="display: inline-block; width: 15%;" for="taiwan">Taiwan: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="taiwan" value="<?php echo esc_attr( $current_taiwan ); ?>" /></p>
		<p><strong><label style="display: inline-block; width: 15%;" for="vietnam">Vietnam: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="vietnam" value="<?php echo esc_attr( $current_vietnam ); ?>" /></p>
		<p><strong><label style="display: inline-block; width: 15%;" for="philippines">Philippines: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="philippines" value="<?php echo esc_attr( $current_philippines ); ?>" /></p>
		<p><strong><label style="display: inline-block; width: 15%;" for="malaysia">Malaysia: </label></strong>
			<input type="text" style="width: 50%;" class="large-text" name="malaysia" value="<?php echo esc_attr( $current_malaysia ); ?>" /></p>


<h3 style="margin-top: 50px;">Relevant Links</h3>
<table id="repeatable-fieldset-one" width="100%">
	<thead>
		<tr>
			<th width="40%">Link Title</th>
			<th width="40%">URL</th>
			<th width="20%"></th>
		</tr>
	</thead>
	<tbody>
<?php

	if ( $repeatable_fields ) :

	foreach ( $repeatable_fields as $field ) {
	?>
	<tr>
		<td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>

		<td><input type="text" class="widefat" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); else echo 'http://'; ?>" /></td>

		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>
	<?php
	}
	else :
	// show a blank one
	?>
	<tr>
		<td><input type="text" class="widefat" name="name[]" /></td>


		<td><input type="text" class="widefat" name="url[]" value="http://" /></td>

		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>
	<?php endif; ?>

	<!-- empty hidden one for jQuery -->
	<tr class="empty-row screen-reader-text">
		<td><input type="text" class="widefat" name="name[]" /></td>


		<td><input type="text" class="widefat" name="url[]" value="http://" /></td>

		<td><a class="button remove-row" href="#">Remove</a></td>
	</tr>
	</tbody>
	</table>

	<p><a id="add-row" class="button" href="#">Add another</a></p>


	</div>
<?php
}
/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function islandtracker_save_meta_box_data( $post_id ) {
	// Verify meta box nonce.
	if ( ! isset( $_POST['island-tracker_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['island-tracker_meta_box_nonce'] ) ), basename( __FILE__ ) ) ) { // Input var okay.
		return;
	}
	// Return if autosave.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Occupation.
	if ( isset( $_REQUEST['occupation'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_occupation', sanitize_text_field( $_POST['occupation'] ) );  // Input var okay.
	}
	// Status.
	if ( isset( $_REQUEST['status'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_status', sanitize_text_field( $_POST['status'] ) );  // Input var okay.
	}
	// Area.
	if ( isset( $_REQUEST['area'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_area', sanitize_text_field( $_POST['area'] ) );  // Input var okay.
	}
	// GPS.
	if ( isset( $_REQUEST['gps'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_gps', sanitize_text_field( $_POST['gps'] ) );  // Input var okay.
	}
	// USA.
	if ( isset( $_REQUEST['usa'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_usa', sanitize_text_field( $_POST['usa'] ) );  // Input var okay.
	}
	// China.
	if ( isset( $_REQUEST['china'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_china', sanitize_text_field( $_POST['china'] ) );  // Input var okay.
	}
	// Taiwan.
	if ( isset( $_REQUEST['taiwan'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_taiwan', sanitize_text_field( $_POST['taiwan'] ) );  // Input var okay.
	}
	// Vietnam.
	if ( isset( $_REQUEST['vietnam'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_vietnam', sanitize_text_field( $_POST['vietnam'] ) );  // Input var okay.
	}
	// Philippines.
	if ( isset( $_REQUEST['philippines'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_philippines', sanitize_text_field( $_POST['philippines'] ) );  // Input var okay.
	}
	// Malaysia.
	if ( isset( $_REQUEST['malaysia'] ) ) {  // Input var okay.
		update_post_meta( $post_id, '_island-tracker_malaysia', sanitize_text_field( $_POST['malaysia'] ) );  // Input var okay.
	}
		//New Links
	$old = get_post_meta($post_id, 'repeatable_fields', true);
	$new = array();

	$names = $_POST['name'];
	$urls = $_POST['url'];

	$count = count( $names );

	for ( $i = 0; $i < $count; $i++ ) {
		if ( $names[$i] != '' ) :
			$new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );


			if ( $urls[$i] == 'http://' )
				$new[$i]['url'] = '';
			else
				$new[$i]['url'] = stripslashes( esc_url( $urls[$i] ) ); // and however you want to sanitize
		endif;
	}
	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'repeatable_fields', $old );
}



add_action( 'save_post_island-tracker', 'islandtracker_save_meta_box_data' );


/*-----------------------------------------------------------------------------------*/
/* Remove 'features' and 'island-tracker' from post slug
/*-----------------------------------------------------------------------------------*/

function remove_feature_slug( $post_link, $post, $leavename ) {
	$post_types = array("features","island-tracker");

    if ( !in_array($post->post_type,$post_types) || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'remove_feature_slug', 10, 3 );


function parse_request_custom( $query ) {

    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;

    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'page', 'features', 'island-tracker' ) );
    }
}
add_action( 'pre_get_posts', 'parse_request_custom' );

/*-----------------------------------------------------------------------------------*/
/* Change Posts to Analysis in admin
/*-----------------------------------------------------------------------------------*/
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Analysis';
    $submenu['edit.php'][5][0] = 'Analysis';
    $submenu['edit.php'][10][0] = 'Add Analysis';
    $submenu['edit.php'][16][0] = 'Analysis Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Analysis';
    $labels->singular_name = 'Analysis';
    $labels->add_new = 'Add Analysis';
    $labels->add_new_item = 'Add Analysis';
    $labels->edit_item = 'Edit Analysis';
    $labels->new_item = 'Analysis';
    $labels->view_item = 'View Analysis';
    $labels->search_items = 'Search Analysis';
    $labels->not_found = 'No Analysis found';
    $labels->not_found_in_trash = 'No Analysis found in Trash';
    $labels->all_items = 'All Analysis';
    $labels->menu_name = 'Analysis';
    $labels->name_admin_bar = 'Analysis';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

/*-----------------------------------------------------------------------------------*/
/* Add Staff Editor Role
/*-----------------------------------------------------------------------------------*/

$staffed = add_role( 'staff_editor', __( 'Staff Editor' ),

array(

	'delete_others_posts' => true,
	'delete_pages' => false,
	'delete_posts' => true,
	'delete_private_pages' => false,
	'delete_private_posts' => true,
	'delete_published_pages' => false,
	'delete_published_posts' => true,
	'edit_others_pages' => true,
	'edit_others_posts' => true,
	'edit_pages' => true,
	'edit_posts' => true,
	'edit_private_pages' => true,
	'edit_private_posts' => true,
	'edit_published_pages' => true,
	'edit_published_posts' => true,
	'manage_categories' => true,
	'manage_links' => false,
  	'manage_options' => true,
	'publish_pages' => false,
	'publish_posts' => true,
	'read' => true,
	'read_private_pages' => true,
	'read_private_posts' => true,
	'unfiltered_html' => true,
	'upload_files' => true,
	'list_users' => true,
	'create_users' => true,
	'edit_users' => true,
	'delete_users' => true,
	'promote_users' => true,
	'add_users' => true,
	'remove_users' => true,
	'edit_theme_options' => true,

)

);
/*-----------------------------------------------------------------------------------*/
/* Register Custom Navigation Walker - Adds Bootstrap styling to menu
/*-----------------------------------------------------------------------------------*/
require_once('wp_bootstrap_navwalker.php');

/*-----------------------------------------------------------------------------------*/
/* Add Search Bar and Twitter Link to Menu
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {

	if($args->theme_location == 'primary') {
	    $search = '<li class="search">';
	    $search .= '<form method="get" id="searchform" action="/"><div class="input-group">';
	    $search .= '<label class="screen-reader-text" for="navSearchInput">Search for:</label>';
	    $search .= '<input type="text" class="form-control" name="s" id="navSearchInput" placeholder="Search" />';
	    $search .= '<label for="navSearchInput" id="navSearchLabel"><i class="fa fa-search" aria-hidden="true"></i></label>';
	    $search .= '</div></form>';
	    $search .= '</li>';
	    return $items.$search;
	}
	return $items;
}

/*-----------------------------------------------------------------------------------*/
/* Add Setting to "Reading" options for # of posts on analysis page
/*-----------------------------------------------------------------------------------*/
// Register and define the settings
add_action('admin_init', 'transparency_postListing_admin_init');
function transparency_postListing_admin_init(){
	register_setting(
		'reading',                 						// settings page
		'transparency_postListing_options',          	// option name
		'transparency_postListing_validate_options'  	// validation callback
	);

	add_settings_field(
		'transparency_postListing_limit',      			// # of Posts to Display
		'Analysis Page Post Limit',              		// setting title
		'transparency_postListing_setting_input',    	// display callback
		'reading',                 						// settings page
		'default'                  						// settings section
	);

}

// Display and fill the form field
function transparency_postListing_setting_input() {
	// get option 'post_limit' value from the database
	$options = get_option( 'transparency_postListing_options' );
	$value = $options['post_limit'];

	?>
<input id='post_limit' name='transparency_postListing_options[post_limit]'
 type='number' step='1' min='1' class='small-text' value='<?php echo esc_attr( $value ); ?>' /> posts
	<?php
}

// Validate user input
function transparency_postListing_validate_options( $input ) {
	$valid = array();
	$valid['post_limit'] = intval(sanitize_text_field( $input['post_limit'] ));

	// Something dirty entered? Warn user.
	if( $valid['post_limit'] != $input['post_limit'] ) {
		add_settings_error(
			'transparency_postListing_post_limit',           // setting title
			'transparency_postListing_texterror',            // error ID
			'Invalid number',   // error message
			'error'                        // type of message
		);
	}

	return $valid;
}

// Remove comments from media attachments, specifically the comments on the JetPack Carousel Slides
function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );
// ------------------------------------

// Full Width Shortcode
// Add Shortcode
function shortcode_fullWidth( $atts , $content = null ) {
	return "<div class='fullWidthFeatureContent'>".$content."</div>";
}
add_shortcode( 'fullWidth', 'shortcode_fullWidth' );

/*-----------------------------------------------------------------------------------*/
/* WPML Custom Language Switcher
/* Filter wp_nav_menu() to add additional links and other output
/* Show only other language in language switcher
/* Use the new filter: https://wpml.org/wpml-hook/wpml_active_languages/
/*-----------------------------------------------------------------------------------*/
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);
function new_nav_menu_items($items, $args) {
    // get languages
    $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=1' );

    if ( $languages && $args->theme_location == 'primary') {


        if(!empty($languages)){

        	// Create Menu Item
 			$active = "";
 			$list = "";

            foreach($languages as $l){

            	// First Item
            	if($l['active']) {
            		if($l['language_code'] == 'zh-hans') {
            			$label = "CH";
            		}
            		elseif($l['language_code'] == 'zh-hant') {
            			$label = "TW";
            		}
            		else {
            			$label = $l['language_code'];
            		}

        			$active = '<img src="/wp-content/themes/amti/img/' . $l['language_code'] . '.png" height="12" alt="' . $l['language_code'] . '" width="18" /> ' . $label;
            	}
            	else {
            		if($l['language_code'] == 'zh-hant') {
            			$native = "正體中文";
            		}
            		else {
            			$native = $l['native_name'];
            		}
                	$list .= '<li><a href="'.$l['url'].'"><img src="/wp-content/themes/amti/img/' . $l['language_code'] . '.png" height="12" alt="' . $l['language_code'] . '" width="18" /> ' . $native.'</a></li>';
                }

                // $count++;
            }

            // Combine List Items into dropdown if we have more than one language available
            if($list) {
	            $items = $items . '<li class="menu-item-language menu-item menu-item-has-children wpml-ls-slot-2 wpml-ls-item wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item dropdown">
	            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">'.$active.'<span class="caret"></span></a><ul role="menu" class="dropdown-menu">';
	            $items = $items . $list;
	            $items = $items . '<li class="last"><div>NOTE: Some content may not be available in all languages.</div></li>';
	            $items = $items . '</ul></li>';
	        }
	        else {
	        	$items = $items . '<li class="menu-item-language menu-item menu-item-has-children wpml-ls-slot-2 wpml-ls-item wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item">
	            <a href="#">'.$active.'</a>';
	        }

        }
    }

    return $items;
}

/*===============================================================
=            Add Custom Meta Box to Features & Posts            =
===============================================================*/
/**
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function features_add_meta_boxes( $post ){
	add_meta_box( 'features_meta_box', __( 'Feature Image', 'features_customMeta' ), 'features_build_meta_box', array('features','post'), 'side', 'low' );
}
add_action( 'add_meta_boxes', 'features_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function features_build_meta_box( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'features_meta_box_nonce' );

	// retrieve the _features_imageShadow current value
	$current_imageShadow = get_post_meta( $post->ID, '_features_imageShadow', true );
	if(isset($current_imageShadow) && strlen($current_imageShadow) == 0) {
		$current_imageShadow = 1;
	}

	?>
	<div class='inside'>
		<strong><?php _e( 'Include shadow on image?', 'features_customMeta' ); ?></strong>
		<p>
			<input type="radio" name="imageShadow" value="1" <?php checked( $current_imageShadow, '1' ); ?> /> Yes<br />
			<input type="radio" name="imageShadow" value="0" <?php checked( $current_imageShadow, '0' ); ?> /> No
		</p>
	</div>
	<?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function features_save_meta_box_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['features_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['features_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}

	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

  // Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}

	// store custom fields values
	// imageShadow
	if ( isset( $_REQUEST['imageShadow'] ) ) {
		update_post_meta( $post_id, '_features_imageShadow', sanitize_text_field( $_POST['imageShadow'] ) );
	}
}
add_action( 'save_post', 'features_save_meta_box_data' );

/**
 * Don't index pages where the robot index option
 * in the Yoast SEO plugin is set to noindex.
 *
 * @param bool    $should_index
 * @param WP_Post $post
 *
 * @return bool
 */
function filter_post( $should_index, WP_Post $post )
{
    if ( false === $should_index ) {
        return false;
    }

    return get_post_meta($post->ID, '_yoast_wpseo_meta-robots-noindex', true) == 1 ? false : true;
}

// Hook into Algolia to manipulate the post that should be indexed.
add_filter( 'algolia_should_index_searchable_post', 'filter_post', 10, 2 );

/**
 * Don't index pages where the robot index option
 * in the Yoast SEO plugin is set to noindex.
 *
 * @param bool    $should_index
 * @param WP_Post $post
 *
 * @return bool
 */
function filter_multilanguage_post( $should_index, WP_Post $post )
{
	if ( false === $should_index ) {
        return false;
    }

    $language_details = apply_filters( 'wpml_post_language_details', null,  $post->ID );

    if($language_details['language_code'] != "en") {
    	return false;
    }
    else {
    	return true;
    }
}

// Hook into Algolia to manipulate the post that should be indexed.
add_filter( 'algolia_should_index_searchable_post', 'filter_multilanguage_post', 10, 2 );

add_filter('algolia_autocomplete_config', function(array $config) {
    $new_labels = array(
        'searchable_posts' => 'Analysis & Features',
        'users' => 'Authors',
    );

    foreach ($config as &$item) {
        if(isset($new_labels[$item['index_id']])) {
            $item['label'] = $new_labels[$item['index_id']];
        }
    }

    return $config;
});




// Full Width Shortcode
// Add Shortcode
// Add Shortcode
function clickgallery( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'option-titles' => '',
			'photo-ids' => '',

		),
		$atts
	);
	$output;
	$str = $atts['option-titles'];
	$titles = explode(",",$str);

	if ( get_post_type( get_the_ID() ) == 'features' ) {
   $postlayout .= "features-gallery";
} else {
	  $postlayout .= "";
}


	$no_whitespaces = $atts['photo-ids'];
	$output .= '<div class="slider ' . $postlayout . '" id="main-slider"><div class="slider-container"><div class="slider-wrapper">';
	$array = explode( ',', $no_whitespaces );
	foreach ( $array as $index => $id ) {


		$output .=  '<div class="slide';


		 $output .=  ' " id="slide-' . $id . '" data-index="' . $index . '" data-image="' . esc_url( wp_get_attachment_url( $id ) ) . '"></div>';
	}
	$output .=  "</div></div>";
	$output .=  '<div class="slider-pagination">';

	$output .=  '<ul class="slider-list">';


	foreach ( $array as $index => $id ) {
		$num = $array[$index];
		$output .=  '<li class="slide-info">';
//		if ($index == 0) {

//	}

	$output .=  '<a href="'. $num .'"';

	if ($index == 0) {
		$output .=  ' class="current"';
	}
	$image = get_post($num);
	$image_title = $image->post_title;
	$output .=  '>'. trim($image_title) .'</a><div class="cg-description">';


	$image_caption = $image->post_excerpt;
	$output .=  $image_caption;
	do_shortcode('[addthis tool="addthis_inline_share_toolbox"]');
	$output .=  '</div></li>';
}
	$output .=  '</ul></div></div>';
	//echo $titles[0];
	$current_title = $titles[0];
  global $wp;
  $current_url = home_url( add_query_arg( array(), $wp->request ) );

	$image = get_post($array[0]);
	$current_caption = $image->post_excerpt;

	return $output;

}
add_shortcode( 'clickgallery', 'clickgallery' );





function sort_posts( $posts, $orderby, $order = 'ASC', $unique = true ) {
	if ( ! is_array( $posts ) ) {
		return false;
	}

	usort( $posts, array( new Sort_Posts( $orderby, $order ), 'sort' ) );

	// use post ids as the array keys
	if ( $unique && count( $posts ) ) {
		$posts = array_combine( wp_list_pluck( $posts, 'ID' ), $posts );
	}

	return $posts;
}
class Sort_Posts {
	var $order, $orderby;

	function __construct( $orderby, $order ) {
		$this->orderby = $orderby;
		$this->order = ( 'desc' == strtolower( $order ) ) ? 'DESC' : 'ASC';
	}

	function sort( $a, $b ) {
		if ( $a->{$this->orderby} == $b->{$this->orderby} ) {
			return 0;
		}

		if ( $a->{$this->orderby} < $b->{$this->orderby} ) {
			return ( 'ASC' == $this->order ) ? -1 : 1;
		} else {
			return ( 'ASC' == $this->order ) ? 1 : -1;
		}
	}
}




/**
 * Load custom settings.
 */
require get_template_directory() . '/inc/custom-settings.php';
