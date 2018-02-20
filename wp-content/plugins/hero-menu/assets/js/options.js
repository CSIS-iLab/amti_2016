/*
* Attaches the image uploader to the input field
*/
jQuery(document).ready(function($){

    // Instantiates the variable that holds the media library frame.
    var meta_image_frame;
    var buttonID, target;

    // Runs when the image button is clicked.
    $(document).on("click", '.choose-meta-image-button', function(e){

        var self = this;
        console.log(self);

        // Get the data target (ID of the image input field)
        buttonID = $(this).attr('id');
        console.log("buttonID: "+buttonID);
        target = $('#'+buttonID).attr("data-target");
        console.log("Target: "+target);

        // target = $(self).attr("data-target");
        // console.log("Target: "+target);

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

            console.log(self);

            console.log("Target2: "+target);

            // Sends the attachment URL to our custom image input field.
            $('#'+target).val(image_value);

            // Show image & remove image button
            $("#image-container-"+target).html("<img src='"+image_value+"' style='width:200px;height:auto;cursor:pointer;' class='choose-meta-image-button' title='Change Image' data-target='"+target+"' id='"+target+"' /><br /><input type='button' id='remove-meta-image-button' class='button' value='Remove Image' data-target='"+target+"' />");
            // $("#image-container-"+target).html("Target: "+target);
        });

        // Opens the media library frame.
        meta_image_frame.open();
    });

    $(document).on("click", '#remove-meta-image-button', function(e){
        var self = this;

        // Prevents the default action from occuring.
        e.preventDefault();

        console.log("remove");

        // Get the data target (ID of the image input field)
        target = $(self).attr("data-target");

        // Remove value of the custom field
        $('#'+target).val('');

        // Destroy the image
        $("#image-container-"+target).empty();
    });

    // Color Picker for Options
    $('.color-field').each(function(){
        $(this).wpColorPicker();
    });

});