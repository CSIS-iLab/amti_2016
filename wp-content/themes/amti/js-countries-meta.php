<?php

// source: http://wordpress.stackexchange.com/questions/211703/need-a-simple-but-complete-example-of-adding-metabox-to-taxonomy
// code authored by jgraup - http://wordpress.stackexchange.com/users/84219/jgraup

// REGISTER SCRIPTS
function __js_term_meta_scripts()  {
    //
    wp_enqueue_media();
    // add theme scripts
    wp_enqueue_script( 'js-custom-taxonomy', get_template_directory_uri() . '/js/js-taxonomy-custom-meta.js', array( 'jquery' ), '', true );


}
add_action( 'admin_enqueue_scripts', '__js_term_meta_scripts' );

// REGISTER TERM META

add_action( 'init', '___register_countries_feature_image' );

function ___register_countries_feature_image() {

    register_meta( 'term', 'countries_feature_image', '___sanitize_countries_feature_image' );
}

// SANITIZE DATA

function ___sanitize_countries_feature_image ( $value ) {
    return sanitize_text_field ($value);
}

// GETTER (will be sanitized)

function ___get_countries_feature_image( $term_id ) {
  $value = get_term_meta( $term_id, 'countries_feature_image', true );
  $value = ___sanitize_countries_feature_image( $value );
  return $value;
}

// ADD FIELD TO CATEGORY TERM PAGE

add_action( 'countries_add_form_fields', '___add_form_field_countries_feature_image' );

function ___add_form_field_countries_feature_image() { ?>
    <?php wp_nonce_field( basename( __FILE__ ), 'countries_feature_image_nonce' ); ?>
    <div class="form-field countries-feature-image-wrap">
        <label for="countries-feature-image"><?php _e( 'Feature Image', 'text_domain' ); ?></label>
        <input type="hidden" name="countries_feature_image" id="countries-feature-image" value="" class="countries-feature-image-field" />
        <div class='countries_feature_image_container'></div>
        <input type="button" id="meta-image-button" class="button choose-meta-image-button" value="<?php _e( 'Choose or Upload an Image', 'text_domain' )?>" />
    </div>
<?php }


// ADD FIELD TO CATEGORY EDIT PAGE

add_action( 'countries_edit_form_fields', '___edit_form_field_countries_feature_image' );

function ___edit_form_field_countries_feature_image( $term ) {

    $value  = ___get_countries_feature_image( $term->term_id );

    if ( ! $value )
        $value = ""; ?>

    <tr class="form-field countries-feature-image-wrap">
        <th scope="row"><label for="countries-feature-image"><?php _e( 'Feature Image', 'text_domain' ); ?></label></th>
        <td>
            <?php wp_nonce_field( basename( __FILE__ ), 'countries_feature_image_nonce' ); ?>
            <input type="hidden" name="countries_feature_image" id="countries-feature-image" value="<?php echo esc_attr( $value ); ?>" class="countries-feature-image-field"  />
            <div class='countries_feature_image_container'>
            <?php
                if($value) {
                    echo "<img src='".$value."' style='width:200px;height:auto;' class='choose-meta-image-button' title='Change Image' /><br />";
                    echo '<input type="button" id="remove-meta-image-button" class="button" value="Remove Image" />';
                }
            ?>
            </div>
            <input type="button" id="meta-image-button" class="button choose-meta-image-button" value="<?php _e( 'Choose or Upload an Image', 'text_domain' )?>" />
        </td>
    </tr>

<?php }


// SAVE TERM META (on term edit & create)

add_action( 'edit_countries',   '___save_countries_feature_image' );
add_action( 'create_countries', '___save_countries_feature_image' );

function ___save_countries_feature_image( $term_id ) {

    // verify the nonce --- remove if you don't care
    if ( ! isset( $_POST['countries_feature_image_nonce'] ) || ! wp_verify_nonce( $_POST['countries_feature_image_nonce'], basename( __FILE__ ) ) )
        return;

    $old_value  = ___get_countries_feature_image( $term_id );
    $new_value = isset( $_POST['countries_feature_image'] ) ? ___sanitize_countries_feature_image ( $_POST['countries_feature_image'] ) : '';


    if ( $old_value && '' === $new_value )
        delete_term_meta( $term_id, 'countries_feature_image' );

    else if ( $old_value !== $new_value )
        update_term_meta( $term_id, 'countries_feature_image', $new_value );
}

// MODIFY COLUMNS (add our meta to the list)

add_filter( 'manage_edit-countries_columns', '___edit_term_columns', 10, 3 );

function ___edit_term_columns( $columns ) {

    $columns['countries_feature_image'] = __( 'Feature Image', 'text_domain' );

    return $columns;
}

// RENDER COLUMNS (render the meta data on a column)

add_filter( 'manage_countries_custom_column', '___manage_term_custom_column', 10, 3 );

function ___manage_term_custom_column( $out, $column, $term_id ) {

    if ( 'countries_feature_image' === $column ) {

        $value  = ___get_countries_feature_image( $term_id );

        if ( ! $value ) {
            $out = "";
        }
        else {
            $out = sprintf( '<img class="countries-feature-image-block" style="width:100%%;height:auto;" src="%s" />', esc_attr( $value ) );
        }
    }

    return $out;
}