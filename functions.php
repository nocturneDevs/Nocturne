<?php
//
function custom_post_project() {
	
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name' ),
		'singular_name'      => _x( 'Project', 'post type singular name' ),
		'add_new_item'       => __( 'Add New Project' ),
		'edit_item'          => __( 'Edit Project' ),
		'new_item'           => __( 'New Project' ),
		'all_items'          => __( 'All Projects' ),
		'view_item'          => __( 'View Project' ),
		'search_items'       => __( 'Search Projects' ),
		'not_found'          => __( 'No Projects found' ),
		'not_found_in_trash' => __( 'No Projects found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Projects'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds details of the projects in the company portfolio',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'has_archive'   => true,
	);

	register_post_type( 'project', $args );
}
add_action( 'init', 'custom_post_project');

//Update all WP messages for projects
function updated_project_messages( $messages ) {
	global $post, $post_ID;
	$messages['project'] = array(
		0 => '', 
		1 => sprintf( __('Project updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.'),
		3 => __('Custom field deleted.'),
		4 => __('Project updated.'),
		5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Project published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Project saved.'),
		8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'updated_project_messages' );


// Fire our meta box setup function on the post editor screen.
add_action( 'load-post.php', 'noc_project_meta_boxes_setup' );
add_action( 'load-post-new.php', 'noc_project_meta_boxes_setup' );

/* Meta box setup function. */
function noc_project_meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'noc_project_meta_boxes' );

	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'noc_project_screenshot_save', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function noc_project_meta_boxes() {

	add_meta_box(
		'noc-project-screenshot',				// Unique ID
		esc_html__( 'Project Screenshot'),		// Title
		'noc_project_screenshot_meta_box',			// Callback function
		'project',								// Admin page (or post type)
		'side',									// Context
		'default'								// Priority
	);
}

/* Display the post meta box. */
function noc_project_screenshot_meta_box( $object, $box ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'noc_project_screenshot_nonce' );
	$noc_stored_meta = get_post_meta( $post->ID ); ?>
	<p>
		<label for="noc-project-screenshot"><?php _e( "Add a project screenshot"); ?></label>
		<br />
		<input class="widefat" type="text" name="noc-project-screenshot" id="noc-image" value="<?php echo $noc_stored_meta['noc-image'][0]; ?>" size="30" />
		<input type="button" id="noc-image-button" class="button" value="Choose or Upload an Image" />
	</p>
<?php }

/**
 * Loads the image management javascript
 */
function noc_image_enqueue() {
    global $typenow;
    if( $typenow == 'project' ) {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'noc-image', get_stylesheet_directory_uri() . '/js/noc-image.js', array( 'jquery' ) );
        wp_localize_script( 'noc-image', 'noc_image',
            array(
                'title' => 'Choose or Upload an Image',
                'button' => 'Use this image',
            )
        );
        wp_enqueue_script( 'noc-image' );
    } // End if
} // End example_image_enqueue()
add_action( 'admin_enqueue_scripts', 'noc_image_enqueue' );


/**
 * Saves the project screenshot input
 */
function noc_project_screenshot_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'noc_project_screenshot_nonce' ] ) && wp_verify_nonce( $_POST[ 'noc_project_screenshot_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and saves if needed
	if( isset( $_POST[ 'noc-image' ] ) ) {
    	update_post_meta( $post_id, 'noc-image', $_POST[ 'noc-image' ] );
	}
 
} // end noc_project_screenshot_save()
add_action( 'save_post', 'noc_project_screenshot_save' );

?>