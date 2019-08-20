<?php
/**
 * @package smdre-bibliography
 * @subpackage smdre-bibliography/box
 * @since 0.1
 */


/**
 * Create the metabox 'bibliography' for post page and cpt
 *
 * @param string $post_type type of the post/cutom-post e.g. 'post', 'page', 'chapter'
 * @since    0.1
 */
 function smdre_create_bibliography_box($post_type){

 		x_add_metadata_group(
 			'smdre_bibliography', // id
 			$post_type,
 			array(
 			    'label' 		=>	__('Bibliography', 'simple-metadata-relation')
 	      )
 		);


    x_add_metadata_field(
			'smdre_bibliography_citations',
			$post_type,
			array(
				'group'           => 'smdre_bibliography',
				'label'						=> __('Citations', 'simple-metadata-relation'),
				'description'			=> __('A citation or reference to another publication, web page, scholarly article, etc', 'simple-metadata-relation'),
				'placeholder'			=> 'http://example.com/article',
				'multiple'				=> true
		    )
		 );
}
