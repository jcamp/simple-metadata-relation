<?php
/**
 * Print the metatags properties
 *
 * @package smdre-resource
 * @subpackage smdre-resource/output
 * @since 0.1
 */


/**
  *
  *	@param 		$post_id used to get the values for this post in the table 'postmeta'
  *	@return		$metadata
  *	@since    0.1
  */
function smdre_print_tags_resources($post_id){

  // all keys of the metabox Resource
  // resource name => corresponding learning resource type
  $resources = array(
    'activities'=> 'Activity',
    'videos'    => 'Video',
    'audios'    => 'Audio',
    'quizzes'   => 'Quiz'
  );

  $metadata	=	[];
  $resources_metadata	=	[];

  //for every key of the metabox resource
  foreach( $resources as $resource => $learningResourceType){

    $meta_values = get_post_meta($post_id, 'smdre_resources_'.$resource );

    if(empty($meta_values)){
      //There isn't post-meta row
      continue;
    }

    // Fills the resources metadata with all the values from post_meta
    foreach($meta_values as $id => $meta_value){
      if(!empty($meta_value)){
        // There is the meta_value for this row

        // The object for the current resource
        $resorce_metadata = [[
        'type'	=> 'CreativeWork',
        'url'		=>  $meta_value,
        'learningResourceType'	=>	$learningResourceType
        ]];

        // Add the resource to the resources array
        $resources_metadata	=	array_merge($resources_metadata, $resorce_metadata);
      }
    }
  }

  if(!empty($resources_metadata)){
  	$metadata['hasPart']  = $resources_metadata;
  }

  return $metadata;
}
