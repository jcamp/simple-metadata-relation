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
function smdre_init_metaboxes($post_type) {
	//for blog 1 in multisite installation we don't create metaboxes as we don't create settings page
	if (1 != get_current_blog_id() || !is_multisite() ){

		smdre_create_resources_box($post_type);
		smdre_create_bibliography_box($post_type);
	}
}
// Hook from the symbiont 'custom-metadata' in simple-metadata
add_action( 'custom_metadata_manager_init_metadata', 'smdre_init_metaboxes' );
