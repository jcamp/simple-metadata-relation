<?php
/**
 * @package smdre-resource
 * @subpackage smdre-resource/box
 * @since 1.0
 */


/**
 * Create the metabox 'Resources' for post page and cpt
 *
 * @param string $post_type type of the post/cutom-post e.g. 'post', 'page', 'chapter'
 * @since    1.0
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
				'label'						=> __('Activities', 'simple-metadata-relation'),
				'description'			=> __('The URLs of the Activities site about this lesson.', 'simple-metadata-relation'),
				'placeholder'			=> 'http://site.com/',
				'multiple'				=> true
		    )
		);

		x_add_metadata_field(
			'smdre_resources_quizzes',
			$post_type,
			array(
				'group'           => 'smdre_resources',
				'label'           => __('Exercises', 'simple-metadata-relation'),
				'description'     => __('The URLs of exercises site about this lesson.', 'simple-metadata-relation'),
				'placeholder'	   	=> 'http://site.com/',
				'multiple'				=>	true
		    )
		);

		x_add_metadata_field(
			'smdre_resources_audios',
			$post_type,
			array(
				'group'           => 'smdre_resources',
				'label'           => __('Audios', 'simple-metadata-relation'),
				'description'     => __('The URLs of a audios about this lesson.', 'simple-metadata-relation'),
				'placeholder'	  	=> 'http://site.com/',
				'multiple'				=>	true
		    )
		);

		x_add_metadata_field(
			'smdre_resources_videos',
			$post_type,
			array(
				'group'           => 'smdre_resources',
				'label'           => __('Videos', 'simple-metadata-relation'),
				'description'     => __('The URLs of a videos about this lesson.', 'simple-metadata-relation'),
				'placeholder'	    => 'http://site.com/',
				'multiple'				=>	true
	     )
    );
}
