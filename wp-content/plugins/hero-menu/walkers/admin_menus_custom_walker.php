<?php
/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
	// /**
	//  * @see Walker_Nav_Menu::start_lvl()
	//  * @since 3.0.0
	//  *
	//  * @param string $output Passed by reference.
	//  */
	// function start_lvl(&$output) {	
	// }
	
	// /**
	//  * @see Walker_Nav_Menu::end_lvl()
	//  * @since 3.0.0
	//  *
	//  * @param string $output Passed by reference.
	//  */
	// function end_lvl(&$output) {
	// }
	
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	    global $_wp_nav_menu_max_depth;
	    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

	    ob_start();
	    $item_id = esc_attr( $item->ID );
	    $removed_args = array(
	        'action',
	        'customlink-tab',
	        'edit-menu-item',
	        'menu-item',
	        'page-tab',
	        '_wpnonce',
	    );

	    $original_title = '';
	    if ( 'taxonomy' == $item->type ) {
	        $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
	        if ( is_wp_error( $original_title ) )
	            $original_title = false;
	    } elseif ( 'post_type' == $item->type ) {
	        $original_object = get_post( $item->object_id );
	        $original_title = $original_object->post_title;
	    }

	    $classes = array(
	        'menu-item menu-item-depth-' . $depth,
	        'menu-item-' . esc_attr( $item->object ),
	        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
	    );

	    $title = $item->title;

	    if ( ! empty( $item->_invalid ) ) {
	        $classes[] = 'menu-item-invalid';
	        /* translators: %s: title of menu item which is invalid */
	        $title = sprintf( __( '%s (Invalid)' ), $item->title );
	    } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
	        $classes[] = 'pending';
	        /* translators: %s: title of menu item in draft status */
	        $title = sprintf( __('%s (Pending)'), $item->title );
	    }

	    $title = empty( $item->label ) ? $title : $item->label;
	    $description = empty( $item->description ) ? $item->type_label : $item->description;

	    // Get our options
	    $options = wp_parse_args(get_option( 'js_hm_settings'));

	    ?>
	    <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
	        <dl class="menu-item-bar">
	            <dt class="menu-item-handle">
	                <span class="item-title"><?php echo esc_html( $title ); ?></span>
	                <span class="item-controls">
	                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
	                    <span class="item-order hide-if-js">
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-up-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up'); ?>">&#8593;</abbr></a>
	                        |
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-down-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down'); ?>">&#8595;</abbr></a>
	                    </span>
	                    <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item'); ?>" href="<?php
	                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
	                    ?>"><?php _e( 'Edit Menu Item' ); ?></a>
	                </span>
	            </dt>
	        </dl>

	        <div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo $item_id; ?>">
	            <?php if( 'custom' == $item->type ) : ?>
	                <p class="field-url description description-wide">
	                    <label for="edit-menu-item-url-<?php echo $item_id; ?>">
	                        <?php _e( 'URL' ); ?><br />
	                        <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
	                    </label>
	                </p>
	            <?php endif; ?>
	            <p class="description description-thin">
	                <label for="edit-menu-item-title-<?php echo $item_id; ?>">
	                    <?php _e( 'Navigation Label' ); ?><br />
	                    <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
	                </label>
	            </p>
	            <p class="description description-thin">
	                <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
	                    <?php _e( 'Title Attribute' ); ?><br />
	                    <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
	                </label>
	            </p>
	            <p class="field-link-target description">
	                <label for="edit-menu-item-target-<?php echo $item_id; ?>">
	                    <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
	                    <?php _e( 'Open link in a new window/tab' ); ?>
	                </label>
	            </p>
	            <p class="field-css-classes description description-thin">
	                <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
	                    <?php _e( 'CSS Classes (optional)' ); ?><br />
	                    <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
	                </label>
	            </p>
	            <p class="field-xfn description description-thin">
	                <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
	                    <?php _e( 'Link Relationship (XFN)' ); ?><br />
	                    <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
	                </label>
	            </p>
	            <p class="field-description description description-wide">
	                <label for="edit-menu-item-description-<?php echo $item_id; ?>">
	                    <?php _e( 'Content Type' ); ?><br />
	                    <input type="text" id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat code edit-menu-item-description" name="menu-item-description[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $description ); ?>" />
	                    <span class="description"><?php _e('Ex: Feature, Analysis, Podcast, Question, etc.'); ?></span>
	                </label>
	            </p>        
	            <?php
	            /*
	             * This is the added field
	             */
	            ?>      
	            <p class="field-custom description-wide">
	                <label for="edit-menu-item-featured-image-<?php echo $item_id; ?>">
	                    <?php _e( 'Featured Image (Overrides post featured image)' ); ?><br />
	                    <input type="hidden" id="edit-menu-item-featured-image-<?php echo $item_id; ?>" class="widefat code edit-menu-item-featured-image" name="menu-item-featured-image[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->featured_image ); ?>" />
				        <div id='image-container-edit-menu-item-featured-image-<?php echo $item_id; ?>'>
				        	<?php
					    		if($item->featured_image) {
					                    echo "<img src='".$item->featured_image."' id='".$item_id."'style='width:200px;height:auto;cursor:pointer;' class='choose-meta-image-button' title='Change Image' data-target='edit-menu-item-featured-image-".$item_id."' /><br />";
					                    echo '<input type="button" id="remove-meta-image-button" class="button" value="Remove Image" data-target="edit-menu-item-featured-image-'.$item_id.'" />';
					                }
					        ?>
				        </div>
				        <input type="button" id="meta-image-button-menu-item-featured-image-<?php echo $item_id; ?>" class="button choose-meta-image-button" data-target="edit-menu-item-featured-image-<?php echo $item_id; ?>" value="<?php _e( 'Choose or Upload an Image', 'text_domain' )?>" />

	                </label>
	            </p>
	            <p class="field-custom description-wide">
	                <label for="edit-menu-item-cta-<?php echo $item_id; ?>">
	                    <?php _e( 'Call to Action Text' ); ?><br />
	                    <input type="text" id="edit-menu-item-cta-<?php echo $item_id; ?>" class="widefat code edit-menu-item-cta" name="menu-item-cta[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->cta ); ?>" />
	                    <span class="description"><?php _e('If left blank, button will say "'.$options['js_hm_default_cta'].'"'); ?></span>
	                </label>
	            </p>
	            <p class="field-custom description-thin">
	                <label for="edit-menu-item-bgpos-x-<?php echo $item_id; ?>">
	                    <?php _e( 'Background Image X Position:' ); ?><br />
	                    <input type="text" id="edit-menu-item-bgpos-x-<?php echo $item_id; ?>" class="widefat code edit-menu-item-bgpos-x" name="menu-item-bgpos-x[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->bgpos_x ); ?>" />
	                </label>
	            </p>
	            <p class="field-custom description-thin">
	                <label for="edit-menu-item-bgpos-y-<?php echo $item_id; ?>">
	                    <?php _e( 'Background Image Y Position:' ); ?><br />
	                    <input type="text" id="edit-menu-item-bgpos-y-<?php echo $item_id; ?>" class="widefat code edit-menu-item-bgpos-y" name="menu-item-bgpos-y[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->bgpos_y ); ?>" />
	                </label>
	            </p>

	            <!-- Excerpt & Date only if setting is turned on -->
	            <?php if($options['js_hm_include_excerpt']) { 
	            	$postExcerpt = strip_tags(apply_filters('the_excerpt', get_post_field('post_excerpt', $item->object_id)));
	            	$excerpt = empty( $item->excerpt ) ? $postExcerpt : $item->excerpt;
	           	?>

	            <p class="field-custom description-thin">
	                <label for="edit-menu-item-excerpt-<?php echo $item_id; ?>">
	                    <?php _e( 'Excerpt:' ); ?><br />
	                    <textarea id="edit-menu-item-bgpos-x-<?php echo $item_id; ?>" class="widefat code edit-menu-item-excerpt" name="menu-item-excerpt[<?php echo $item_id; ?>]"><?php echo esc_attr( $excerpt ); ?></textarea>
	                    <span class="description"><?php _e('25 word maximum'); ?></span>
	                </label>
	            </p>
	            <?php } ?>

	        	<?php if($options['js_hm_include_date']) { 

	        		$postDate = get_the_date('',$item->object_id);
	        		$date = empty( $item->date ) ? $postDate : $item->date;

	        	?>
	            <p class="field-custom description-thin">
	                <label for="edit-menu-item-date-<?php echo $item_id; ?>">
	                    <?php _e( 'Date:' ); ?><br />
	                    <input type="text" id="edit-menu-item-date-<?php echo $item_id; ?>" class="widefat code edit-menu-item-date" name="menu-item-date[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $date ); ?>" />
	                </label>
	            </p>
	            <?php } ?>

	            <?php
	            /*
	             * end added field
	             */
	            ?>
	            <div class="menu-item-actions description-wide submitbox">
	                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
	                    <p class="link-to-original">
	                        <?php printf( __('Original: %s'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
	                    </p>
	                <?php endif; ?>
	                <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
	                echo wp_nonce_url(
	                    add_query_arg(
	                        array(
	                            'action' => 'delete-menu-item',
	                            'menu-item' => $item_id,
	                        ),
	                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                    ),
	                    'delete-menu_item_' . $item_id
	                ); ?>"><?php _e('Remove'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
	                    ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel'); ?></a>
	            </div>

	            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
	            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
	            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
	            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
	            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
	            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
	        </div><!-- .menu-item-settings-->
	        <ul class="menu-item-transport"></ul>
	    <?php
	    $output .= ob_get_clean();
	}
}
