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
		'primary' => esc_html__( 'Primary', 'transparency' ),
		'home-page-slider' => esc_html__( 'Home Page Slider', 'transparency' ),
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

	// Font Awesome
	wp_enqueue_script('transparency-font-awesome', 'https://use.fontawesome.com/08b1a76eab.js');

	// jQuery
	wp_enqueue_script('jquery');

	// Bootstrap
	wp_enqueue_script('transparency-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
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
		'name'              => _x( 'Countries', 'taxonomy general name' ),
		'singular_name'     => _x( 'Country', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Countries' ),
		'all_items'         => __( 'All Countries' ),
		'parent_item'       => __( 'Parent Country' ),
		'parent_item_colon' => __( 'Parent Country:' ),
		'edit_item'         => __( 'Edit Country' ),
		'update_item'       => __( 'Update Country' ),
		'add_new_item'      => __( 'Add New Country' ),
		'new_item_name'     => __( 'New Country Name' ),
		'menu_name'         => __( 'Countries' ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'island-tracker' ),
		'with_front'        => false,
	);
	register_taxonomy( 'countries', array( 'island-tracker' ), $args );
}

// Include Countries custom meta
include_once("js-countries-meta.php");

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
	'edit_pages' => false,
	'edit_posts' => true,
	'edit_private_pages' => false,
	'edit_private_posts' => true,
	'edit_published_pages' => false,
	'edit_published_posts' => true,
	'manage_categories' => true,
	'manage_links' => false,
  'manage_options' => true,
	'publish_pages' => true,
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
/* Add featured image to post and page items in home slider menu
/*-----------------------------------------------------------------------------------*/
require_once('homepage_slider_navwalker.php');

function transparency_slider() {
	$menu_name = 'home-page-slider';
	$menu_items = wp_get_nav_menu_items($menu_name);
	$walker = new Menu_With_Description;

	// Get the feature image, title, description, and url of the first menu item that has an image
	$feat_image = "";
	$feat_title = "";
	$feat_description = "";
	$feat_link = "";
	$feat_id = "";

	// Check if js-homepage-slider is installed, if so, pull the featured image from there
	if ( class_exists( 'hps_custom_menu' ) ) {
	    foreach($menu_items as $key => $itemObj) {

			if($itemObj->featured_image) {
				$feat_image = $itemObj->featured_image;
				$feat_title = $itemObj->title;
				$feat_description = $itemObj->description ?: $itemObj->type_label;
				$feat_link = $itemObj->url;
				$feat_id = $itemObj->object_id;
				break;
			}
			else {
				if(get_post_thumbnail_id($itemObj->object_id)) {
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id($itemObj->object_id) );
					$feat_title = $itemObj->title;
					$feat_description = $itemObj->description ?: $itemObj->type_label;
					$feat_link = $itemObj->url;
					$feat_id = $itemObj->object_id;
					break;
				}
			}

		}
	}
	else {
		foreach($menu_items as $key => $itemObj) {
			if(get_post_thumbnail_id($itemObj->object_id)) {
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id($itemObj->object_id) );
				$feat_title = $itemObj->title;
				$feat_description = $itemObj->description ?: $itemObj->type_label;
				$feat_link = $itemObj->url;
				$feat_id = $itemObj->object_id;
				break;
			}
		}
	}

	echo "<div class='feature-background' style='background-image:url(".$feat_image.");'><div class='overlay'>";
	echo "<div class='featuredItem'><span class='description'>".$feat_description."</span><br />".$feat_title."<br /><a href='".$feat_link."' class='seeMore'>".__('See More', 'transparency')."</a></div>";
	wp_nav_menu( array('theme_location' => 'home-page-slider','menu' => 'home-page-slider','walker' => $walker,'activeID' => $feat_id) );
	echo "</div></div>";
}

// Add menu item for slider
function add_slider_admin_menu_item() {
	$theme_locations = get_nav_menu_locations();
	$menu_obj = get_term( $theme_locations['home-page-slider'], 'nav_menu' );
	$menuID = $menu_obj->term_id;

  // $page_title, $menu_title, $capability, $menu_slug, $callback_function
  add_menu_page(__('Home Page Slider'), __('Home Page Slider'), 'edit_theme_options', 'nav-menus.php?action=edit&menu='.$menuID, '', 'dashicons-images-alt2', 58);
}
add_action('admin_menu', 'add_slider_admin_menu_item');

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
	    $twitter = "<li class='twitter'><a href='http://twitter.com/AsiaMTI' target='_blank'><i class='fa fa-twitter fa-lg' aria-hidden='true' title='AMTI on Twitter'></i></a></li>";
	    return $items.$search.$twitter;
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
