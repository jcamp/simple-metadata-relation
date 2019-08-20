<?php
/**
 * Print the metatags properties
 *
 * @package smdre-bibliography
 * @subpackage smdre-bibliography/output
 * @since 0.1
 */

function smdre_print_tags_bibliography($post_id){
  $html = ",\n\t";
  $html .= '"citation":  [';

  $meta_values = get_post_meta($post_id, 'smdre_bibliography_citations' );

  if(empty($meta_values)){
   //There isn't post-meta row
   return;
  }

   foreach($meta_values as $id => $meta_value){
     if(!empty($meta_value)){
       $html	.=	"}"	==	$html[-1]	?	","	: "";
       $html .=  '
       {
         "type": "CreativeWork",
         "url":  "'.$meta_value.'"
       }';
     }
   }

   $html .= "\n\t]";

   //If there aren't work example don't print nothing
   $html = ",\n\t\"citation\":  [\n\t]" == $html ? ''	: $html;

   return $html;
 }
