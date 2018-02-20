<?php
/*
Plugin Name: Hero Menu
Plugin URL: hhttps://github.com/jnschrag/wp-slider
Description: Creates a custom menu with a featured image on the main page.
Version: 1.2
Author: Jacque Schrag
Author URI: http://jschrag.com
Text Domain: heroMenu
Domain Path: languages
*/

class HeroMenu {


	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {

		register_activation_hook( __FILE__, array($this, 'plugin_activated' ));
        register_deactivation_hook( __FILE__, array($this, 'plugin_deactivated' ));

		// load the plugin translation files
		add_action( 'init', array( $this, 'textdomain' ) );

		// load CSS & JavaScript
		add_action( 'wp_enqueue_scripts', array($this, 'js_slider_scripts_frontend' ));
		add_action( 'admin_enqueue_scripts', array($this, 'js_slider_scripts_backend' ));

		/*----------  Backend Filters  ----------*/

		// Add Link to Slider in Admin Panel
		add_action('admin_menu', array($this, 'add_slider_admin_menu_item'));

		// Register Menu Location
		add_action( 'after_setup_theme', array($this, 'js_hm_register_menu'));

		// Register Options Link
		add_action( 'admin_menu', array($this, 'js_hm_add_admin_menu' ));

		// Register Plugin Options Page
		add_action( 'admin_init', 'js_hm_settings_init' );
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'js_hm_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'js_hm_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'js_hm_edit_walker'), 10, 2 );

	} // end constructor

	public function plugin_activated(){
         // This will run when the plugin is activated, setup the database
    }

    public function plugin_deactivated(){
        // This will run when the plugin is deactivated, use to delete the database
        
    }
	
	/**
	 * Load the plugin's text domain
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function textdomain() {
		load_plugin_textdomain( 'heroMenu', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Enqueue front end scripts and styles.
	 */
	public function js_slider_scripts_frontend() {
		wp_enqueue_style( 'js-slider-style', plugins_url( 'assets/css/styles.css', __FILE__ ) );

		// Include our custom CSS if we have any
		$options = get_option( 'js_hm_settings');

		if($options['js_hm_fb_color']) {
			$css = "#hero-menu-container .feature-background {background-color:".sanitize_text_field($options['js_hm_fb_color']).";}";
			$css = wp_kses( $css, array( "\'", '\"' ) );
			wp_add_inline_style('js-slider-style', $css);
		}

		if($options['js_hm_custom_css']) {
			$css = sanitize_text_field($options['js_hm_custom_css']);
			$css = wp_kses( $css, array( "\'", '\"' ) );
			wp_add_inline_style('js-slider-style', $css);
		}

	}

	/**
	 * Enqueue back end scripts and styles.
	 */
	public function js_slider_scripts_backend($hook) {
		// Load only on ?page=mypluginname
        if($hook == 'settings_page_hero-menu' || $hook == 'nav-menus.php') {
			wp_enqueue_media();
	        wp_enqueue_style( 'wp-color-picker');
	        wp_enqueue_script( 'js-slider-options', plugins_url('assets/js/options.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	    }
	}

	/**
	 * Register Hero Menu in Admin Menu bar
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function add_slider_admin_menu_item() {
		$theme_locations = get_nav_menu_locations();
		$menu_obj = get_term( $theme_locations['hero-menu'], 'nav_menu' );
		$menuID = $menu_obj->term_id;

	  add_menu_page(__('Hero Menu'), __('Hero Menu'), 'edit_theme_options', 'nav-menus.php?action=edit&menu='.$menuID, '', 'dashicons-images-alt2', 58);
	}

	/**
	 * Register new navigation menu for slider
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function js_hm_register_menu() {
	    register_nav_menus( array(
			'hero-menu' => __( 'Hero Menu', 'js_slider' )
		) );
	}
	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function js_hm_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->featured_image = get_post_meta( $menu_item->ID, '_menu_item_featured_image', true );
	    $menu_item->cta = get_post_meta( $menu_item->ID, '_menu_item_cta', true );
	    $menu_item->bgpos_x = get_post_meta( $menu_item->ID, '_menu_item_bgpos_x', true );
	    $menu_item->bgpos_y = get_post_meta( $menu_item->ID, '_menu_item_bgpos_y', true );
	    $menu_item->excerpt = get_post_meta( $menu_item->ID, '_menu_item_excerpt', true );
	    $menu_item->date = get_post_meta( $menu_item->ID, '_menu_item_date', true );
	    return $menu_item;
	    
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function js_hm_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {

		$locations = get_nav_menu_locations();
		$sliderMenuID = $locations['hero-menu'];

		if($menu_id == $sliderMenuID) {
	
		    // Check if element is properly sent
		    if ( is_array( $_REQUEST['menu-item-featured-image']) ) {
		        $featured_image_value = $_REQUEST['menu-item-featured-image'][$menu_item_db_id];
		        update_post_meta( $menu_item_db_id, '_menu_item_featured_image', $featured_image_value );
		    }

		    if ( is_array( $_REQUEST['menu-item-cta']) ) {
		        $cta_value = $_REQUEST['menu-item-cta'][$menu_item_db_id];
		        update_post_meta( $menu_item_db_id, '_menu_item_cta', $cta_value );
		    }

		    if ( is_array( $_REQUEST['menu-item-bgpos-x']) ) {
		        $bgpos_x_value = $_REQUEST['menu-item-bgpos-x'][$menu_item_db_id];
		        update_post_meta( $menu_item_db_id, '_menu_item_bgpos_x', $bgpos_x_value );
		    }

		    if ( is_array( $_REQUEST['menu-item-bgpos-y']) ) {
		        $bgpos_y_value = $_REQUEST['menu-item-bgpos-y'][$menu_item_db_id];
		        update_post_meta( $menu_item_db_id, '_menu_item_bgpos_y', $bgpos_y_value );
		    }

		    if ( is_array( $_REQUEST['menu-item-excerpt']) ) {
		        $excerpt_value = $_REQUEST['menu-item-excerpt'][$menu_item_db_id];
		        update_post_meta( $menu_item_db_id, '_menu_item_excerpt', $excerpt_value );
		    }

		    if ( is_array( $_REQUEST['menu-item-date']) ) {
		        $date_value = $_REQUEST['menu-item-date'][$menu_item_db_id];
		        update_post_meta( $menu_item_db_id, '_menu_item_date', $date_value );
		    }
		}
		    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function js_hm_edit_walker($walker,$menu_id) {
		$locations = get_nav_menu_locations();
		$sliderMenuID = $locations['hero-menu'];

		if($menu_id == $sliderMenuID) {
	    	return 'Walker_Nav_Menu_Edit_Custom';
	    }
	    else {
	    	return 'Walker_Nav_Menu_Edit';
	    }
	    
	}

	/**
	 * Display the Slider on the front end
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function js_hm_display_slider($customLayout = null) {
		$location = 'hero-menu';
		$options = get_option( 'js_hm_settings');

		if($options['js_hm_show_on_pages'] == 'front') {
			$showConditional = is_front_page();
		}
		else {
			$showConditional = true;
		}

		if ( has_nav_menu( $location ) && $showConditional ) {
			$locations = get_nav_menu_locations();
			$menu = get_term( $locations[$location], 'nav_menu' );
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			$walker = new Slider_Menu_With_Description;

			// Get the feature image, title, description, and url of the first menu item that has an image
			$feat_image = "";
			$feat_title = "";
			$feat_description = "";
			$feat_link = "";
			$feat_id = "";
			$feat_excerpt = "";
			$feat_date = "";

			// Remove Featured Item from the side menu?
			if($options['js_hm_include_featured'] == 1) {
				$hideFeature = false;
			}
			else {
				$hideFeature = true;
			}

			// Loop through the menu to get the featured item
			foreach($menu_items as $key => $itemObj) {

				if($itemObj->featured_image) {
					$feat_image = $itemObj->featured_image;
					$feat_title = $itemObj->title;
					$feat_description = $itemObj->description ?: $itemObj->type_label;
					$feat_link = $itemObj->url;
					$feat_id = $itemObj->object_id;
					$feat_cta = $itemObj->cta ?: sanitize_text_field($options['js_hm_default_cta']);
					$feat_bgpos_x = $itemObj->bgpos_x;
					$feat_bgpos_y = $itemObj->bgpos_y;
					$feat_excerpt = $itemObj->excerpt;
					$feat_date = $itemObj->date;
					break;
				}
				else {
					if(get_post_thumbnail_id($itemObj->object_id)) {
						$feat_image = wp_get_attachment_url( get_post_thumbnail_id($itemObj->object_id) );
						$feat_title = $itemObj->title;
						$feat_description = $itemObj->description ?: $itemObj->type_label;
						$feat_link = $itemObj->url;
						$feat_id = $itemObj->object_id;
						$feat_cta = $itemObj->cta ?: sanitize_text_field($options['js_hm_default_cta']);
						$feat_bgpos_x = $itemObj->bgpos_x;
						$feat_bgpos_y = $itemObj->bgpos_y;
						$feat_excerpt = $itemObj->excerpt;
						$feat_date = $itemObj->date;
						break;
					}
				}
			}
			// If no feature image was set, set featured item to the first item in the menu and the image to the fallback image
			if(!$feat_image) {
				$feat_image = sanitize_text_field($options['js_hm_fb_image']);
				$feat_title = $menu_items[0]->title;
				$feat_description = $menu_items[0]->description ?: $menu_items[0]->type_label;
				$feat_link = $menu_items[0]->url;
				$feat_id = $menu_items[0]->object_id;
				$feat_cta = $menu_items[0]->cta ?: sanitize_text_field($options['js_hm_default_cta']);
				$feat_bgpos_x = $menu_items[0]->bgpos_x;
				$feat_bgpos_y = $menu_items[0]->bgpos_y;
				$feat_excerpt = $menu_items[0]->excerpt;
				$feat_date = $menu_items[0]->date;
			}

			// Include the Featured Item's Excerpt
			if($options['js_hm_include_excerpt'] == 1) {
				$excerpt = "<div class='excerpt'>".$feat_excerpt."</div>";
			}
			else {
				$excerpt = null;
			}

			// Include the Featured Item's Date
			if($options['js_hm_include_date'] == 1) {
				$date = "<div class='date'>".$feat_date."</div>";
			}
			else {
				$date = null;
			}

			// Include the sidebar navigation
			$sidebar = null;
			if($options['js_hm_layout_style'] == "side") {
				$sidebar = function() use ($location, $walker, $feat_id, $hideFeature) {
					$options = array('theme_location' => $location,'walker' => $walker, 'container_class' => 'menu-hero-menu-container', 'activeID' => $feat_id, 'hideFeature' => $hideFeature);
					wp_nav_menu( $options );
				};
			}
			else {
				$sidebar = function() {return false;};
			}

			// If custom layout was declared and exists, use it, otherwise default to one of the default templates
			if ($customLayout != null && $newTemplate = locate_template('/hero-menu/'.$customLayout.'.php')) {
				// yep, load the page template
				echo "<!-- START: Hero Menu Plugin -->\n";
				include($newTemplate);
				echo "<!-- END: Hero Menu Plugin -->\n";
			} else {
				// Default to either single view or sidebar view
				if($options['js_hm_layout_style'] == "single") {
					echo "<!-- START: Hero Menu Plugin -->\n";
					include('templates/slider-single.php');
					echo "<!-- END: Hero Menu Plugin -->\n";
				}
				else {
					echo "<!-- START: Hero Menu Plugin -->\n";
					include('templates/slider-side.php');
					echo "<!-- END: Hero Menu Plugin -->\n";
				}
			}
		}
	    
	}

	function js_hm_add_admin_menu(  ) { 
		add_options_page( 'Hero Menu', 'Hero Menu', 'manage_options', 'hero-menu', 'js_hm_options_page' );
	}

}

// instantiate plugin's class
$GLOBALS['heroMenu'] = new HeroMenu();

function putHeroMenu($customLayout = null) {
	return $GLOBALS['heroMenu']->js_hm_display_slider($customLayout);
}

include_once( 'admin_options.php' );
include_once( 'walkers/admin_menus_custom_walker.php' );
include_once( 'walkers/front_slider_walker.php' );
