/*
* Attaches the image uploader to the input field
*/
jQuery(document).ready(function($){

    // Instantiates the variable that holds the media library frame.
    var meta_image_frame;

    // Runs when the image button is clicked.
    $(document).on("click", '.choose-meta-image-button', function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( meta_image_frame ) {
            meta_image_frame.open();
            return;
        }

        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: 'Choose feature image',
            button: { text:  'Choose Image' },
            library: { type: 'image' },
            multiple:false
        });

        // Runs when an image is selected.
        meta_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

            var image_value = "/"+media_attachment.url.replace(/^(?:\/\/|[^\/]+)*\//, "");

            // Sends the attachment URL to our custom image input field.
            $('#countries-feature-image').val(image_value);

            // Show image & remove image button
            $('.countries_feature_image_container').html("<img src='"+image_value+"' style='width:200px;height:auto;' class='choose-meta-image-button' title='Change Image' /><br /><input type='button' id='remove-meta-image-button' class='button' value='Remove Image' />");
        });

        // Opens the media library frame.
        meta_image_frame.open();
    });

    $(document).on("click", '#remove-meta-image-button', function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        console.log("remove");

        // Remove value of the custom field
        $('#countries-feature-image').val('');

        // Destroy the image
        $('.countries_feature_image_container').empty();
    });
});