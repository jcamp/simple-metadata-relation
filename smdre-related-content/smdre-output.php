<?php

/**
 * Create metaboxes for the plugin
 *
 * @link URL
 *
 * @package smdre-related-content
 * @subpackage smdre-related-content/output
 * @since 1.0
 */

defined ("ABSPATH") or die ("No script assholes!");

// all keys of the metabox Resource
// resource name => corresponding learning resource type see
define ('RESOURCES', [
  'activities'=> 'Activity',
  'videos'    => 'Video',
  'audios'    => 'Audio',
  'exercises' => 'Exercise' //Assestment, Quiz, or Test
]);

/**
 * Print the metadata tags for this plugin
 * Used in simple-metadata to print the tags
 *
 * @see simple-metadata
 * @since 0.1
 */
function smdre_print_tags (){

  $html = ",\n\t";
  $html .= '"hasPart":  [';

  //get the id of the current post
  $post_id = get_the_ID();

  //for every key of the metabox resource
  foreach( RESOURCES as $resource => $learningResourceType){

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
  $html = ",\n\t\"workExample\":  [\n\t]" == $html ? ''	: $html;
  echo $html;
}
