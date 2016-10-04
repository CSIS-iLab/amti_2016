<?php
/*
Plugin Name: Home Page Slider
Plugin URL: hhttps://github.com/jnschrag/wp-slider
Description: Creates a custom menu with a featured image on the main page.
Version: 0.1
Author: Jacque Schrag
Author URI: http://jschrag.com
Text Domain: js_hps
Domain Path: languages
*/

class hps_custom_menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {

		// load the plugin translation files
		add_action( 'init', array( $this, 'textdomain' ) );
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'js_hps_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'js_hps_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'js_hps_edit_walker'), 10, 2 );

	} // end constructor
	
	
	/**
	 * Load the plugin's text domain
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	public function textdomain() {
		load_plugin_textdomain( 'js_hps', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function js_hps_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->featured_image = get_post_meta( $menu_item->ID, '_menu_item_featured_image', true );
	    return $menu_item;
	    
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function js_hps_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
	    if ( is_array( $_REQUEST['menu-item-featured-image']) ) {
	        $featured_image_value = $_REQUEST['menu-item-featured-image'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_featured_image', $featured_image_value );
	    }
	    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function js_hps_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}

}

// instantiate plugin's class
$GLOBALS['js_hps'] = new hps_custom_menu();


include_once( 'edit_custom_walker.php' );
