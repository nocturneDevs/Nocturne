/*
 * Attaches the image uploader to the input field
 */
jQuery(document).ready(function($){
 
    // Instantiates the variable that holds the media library frame.
    var noc_image_frame;
 
    // Runs when the image button is clicked.
    $('#noc-image-button').click(function(e){
 
        // Prevents the default action from occuring.
        e.preventDefault();
 
        // If the frame already exists, re-open it.
        if ( noc_image_frame ) {
            noc_image_frame.open();
            return;
        }
 
        // Sets up the media library frame
        noc_image_frame = wp.media.frames.noc_image_frame = wp.media({
            title: noc_image.title,
            button: { text:  noc_image.button },
            library: { type: 'image' }
        });
 
        // Runs when an image is selected.
        noc_image_frame.on('select', function(){
 
            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = noc_image_frame.state().get('selection').first().toJSON();
 
            // Sends the attachment URL to our custom image input field.
            $('#noc-image').val(media_attachment.url);
        });
 
        // Opens the media library frame.
        noc_image_frame.open();
    });
});