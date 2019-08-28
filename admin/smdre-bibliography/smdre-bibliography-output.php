<?php
/**
	* Print the metatags properties
	*
	* @package smdre-bibliography
	* @subpackage smdre-bibliography/output
	* @since 0.1
	*/


 /**
	*
	* @param 		$post_id used to get the values for this post in the table 'postmeta'
	* @return		$metadata
	* @since    0.1
	*/
function smdre_print_tags_bibliography($post_id){

	$metadata = [];
	$citations_metadata = [];

	$meta_values = get_post_meta($post_id, 'smdre_bibliography_citations' );

	if(empty($meta_values)){
		//There isn't post-meta row
		return $metadata;
	}

	foreach($meta_values as $id => $meta_value){
		if(!empty($meta_value)){
			$citation_metadata	=	[[
				'@type'	=>	'CreativeWork',
				'url'		=>	$meta_value
				]];

			$citations_metadata =	array_merge($citations_metadata, $citation_metadata);
		}
	}

	if(!empty($citations_metadata)){
		$metadata['citation']	=	$citations_metadata;
	}

  return $metadata;
 }
