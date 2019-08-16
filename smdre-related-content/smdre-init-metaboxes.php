<?php

/**
 * Create metaboxes for the plugin
 *
 * @link URL
 *
 * @package smdre-related-content
 * @subpackage smdre-related-content/init-smetabox
 * @since 0.1
 */

defined ("ABSPATH") or die ("No script assholes!");

/**
 * Initialize mtaboxes for this plugin
 *
 * @since    0.1
 */
function smdre_init_metaboxes() {

	//for blog 1 in multisite installation we don't create metaboxes as we don't create settings page
	if (1 != get_current_blog_id() || !is_multisite() ){

		//Retrieve the post id
		$post_id = '';
		if(isset($_GET['post'])){
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])){ // it is used with update options
			$post_id = $_POST['post_ID'];
		}

		$post_type = get_post_type($post_id);

		if(empty($post_type)){
			//Post type not exist return to avoid errors
			return;
		}

		smdre_create_resources_box($post_type);
		smdre_create_bibliography_box($post_type);
	}
}
// Hook from the symbiont 'custom-metadata' in simple-metadata
add_action( 'custom_metadata_manager_init_metadata', 'smdre_init_metaboxes' );
