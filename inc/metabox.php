<?php
/**
 * This fucntion is responsible for rendering metaboxes in page area
 *
 * @package Whank
 * @since whank 1.0
 */

function whank_meta_boxes()
{
	// Adding layout meta box for Page
	add_meta_box( 'page-layout', __('Select layout','whank'), 'whank_layout_call', 'page', 'side', 'default' );

	// Adding layout meta box for Post
	add_meta_box( 'page-layout', __('Select layout','whank'), 'whank_layout_call', 'post', 'side', 'default' );
}
add_action('add_meta_boxes','whank_meta_boxes' );
/****************************************************************/
global $whank_page_layout; 
$whank_page_layout = array(
					'default-layout'	=> array(
							'id'	=>	'whank_page_layout',
							'value'	=>	'default_layout',
							'label'	=>	esc_html__( 'Default Layout', 'whank' ),
							),
					'right-sidebar'		=> array(
							'id'	=>	'whank_page_layout',
							'value'	=>	'right_sidebar',
							'label'	=>	esc_html__( 'Right Sidebar', 'whank' ),
							),
					'left-sidebar'		=> array(
							'id'	=>	'whank_page_layout',
							'value'	=>	'left_sidebar',
							'label'	=>	esc_html__( 'Left Sidebar', 'whank' ),
							),
					'no-sidebar-content-center'		=> array(
							'id'	=>	'whank_page_layout',
							'value'	=>	'no_sidebar_content_center',
							'label'	=>	esc_html__( 'No Sidebar Content Center', 'whank' ),
							),
						);
/****************************************************************************/

function whank_layout_call(){
	global $whank_page_layout;
	whank_meta_form( $whank_page_layout );
}

/**
 * Displays metabox to for select layout option
 */
function whank_meta_form( $whank_metabox_fields ){
	global $post;

	//use nonce for verification
	wp_nonce_field( basename(__FILE__),'custom_metabox_nonce' );

	foreach ($whank_metabox_fields as $field ) {
		$layout_meta = get_post_meta( $post->ID, $field['id'], true );

		switch ( $field['id'] ) {
			case 'whank_page_layout':
				if ( empty( $layout_meta ) ) {
					$layout_meta = 'default_layout';
				} ?>
				<input class="post-format" type="radio" name="<?php echo $field['id']; ?>" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $layout_meta ); ?>/>
				<label class="post-format-label"><?php echo $field['label']; ?></label><br>
				<?php
				break;
			
			default:
				echo "No metaboxes available";
				break;
		}
	}

}
/*****************************************************************************/

function whank_save_custom_meta($post_id)
{
	global $whank_page_layout, $post;
	// Verify the nonce before proceeding.
   if ( !isset( $_POST[ 'custom_metabox_nonce' ] ) || !wp_verify_nonce( $_POST[ 'custom_metabox_nonce' ], basename( __FILE__ ) ) )
      return;

  // Stop WP from clearing custom fields on autosave
   if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
      return;
  if ('page' == $_POST['post_type']) {
      if (!current_user_can( 'edit_page', $post_id ) )
         return $post_id;
   }
   elseif (!current_user_can( 'edit_post', $post_id ) ) {
      return $post_id;
   }

   foreach ( $whank_page_layout as $field ) {
		//Execute this saving function
		$old = get_post_meta( $post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // end foreach
}
add_action('save_post', 'whank_save_custom_meta');