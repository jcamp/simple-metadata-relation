<?php
/**
 * @package smdre-metaboxes
 * @subpackage smdre-metaboxes/smdre-resource-box
 * @since 0.1
 */


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
