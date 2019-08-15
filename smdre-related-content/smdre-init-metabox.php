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
	}
}
// Hook from the symbiont 'custom-metadata' in simple-metadata
add_action( 'custom_metadata_manager_init_metadata', 'smdre_init_metaboxes' );


/**
 * Create the metabox 'Resources' for post page and cpt
 *
 * @param string $post_type type of the post/cutom-post e.g. 'post', 'page', 'chapter'
 * @since    0.1
 */
function smdre_create_resources_box($post_type){

		x_add_metadata_group(
			'smdre_resources', // id
			$post_type,
			array(
			'label' 		=>	__('Resources', 'simple-metadata-relation')
			)
		);

		x_add_metadata_field(
			'smdre_resources_activities',
			$post_type,
			array(
				'group'           => 'smdre_resources',
				'label'						=> 'Activities',
				'description'			=> 'The URLs of the Activities site about this lesson.',
				'placeholder'			=> 'http://site.com/',
				'multiple'				=> true
					)
				);

		x_add_metadata_field(
			'smdre_resources_exercises',
			$post_type,
			array(
				'group'           => 'smdre_resources',
				'label'           => 'Exercises',
				'description'     => 'The URLs of exercises site about this lesson.',
				'placeholder'	   	=> 'http://site.com/',
				'multiple'				=>	true
			)
		);

		x_add_metadata_field(
			'smdre_resources_audios',
			$post_type,
			array(
				'group'           => 'smdre_resources',
				'label'           => 'Audios',
				'description'     => 'The URLs of a audios about this lesson.',
				'placeholder'	  	=> 'http://site.com/',
				'multiple'				=>	true
					)
		);

		x_add_metadata_field(
			'smdre_resources_videos',
			$post_type,
			array(
				'group'           => 'smdre_resources',
				'label'           => 'Videos',
				'description'     => 'The URLs of a videos about this lesson.',
				'placeholder'	    => 'http://site.com/',
				'multiple'				=>	true
			)
		);
}
