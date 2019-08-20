<?php
/**
 * Print the metatags properties
 *
 * @package smdre-resource
 * @subpackage smdre-resource/output
 * @since 0.1
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

  $html = ",\n\t";
  $html .= '"hasPart":  [';

  //for every key of the metabox resource
  foreach( $resources as $resource => $learningResourceType){

    $meta_values = get_post_meta($post_id, 'smdre_resources_'.$resource );

    if(empty($meta_values)){
      //There isn't post-meta row
      continue;
    }

    foreach($meta_values as $id => $meta_value){
      if(!empty($meta_value)){
        //there is the meta_value for this row

        $html	.=	"}"	==	$html[-1]	?	","	: "";
        $html .=  '
        {
          "type": "CreativeWork",
          "url":  "'.$meta_value.'",
          "learningResourceType": "'.$learningResourceType.'"
        }';
      }
    }
  }

  $html .= "\n\t]";

  //If there aren't work example don't print nothing
  $html = ",\n\t\"hasPart\":  [\n\t]" == $html ? ''	: $html;

  return $html;
}
