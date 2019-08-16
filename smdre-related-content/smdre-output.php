<?php

/**
 * Create metaboxes for the plugin
 *
 * @link URL
 *
 * @package smdre-related-content
 * @subpackage smdre-related-content/output
 * @since 0.1
 */

defined ("ABSPATH") or die ("No script assholes!");


/**
 * Print the metadata tags for this plugin
 * Used in simple-metadata to print the tags
 *
 * @see simple-metadata
 * @since 0.1
 */
function smdre_print_tags (){

  //get the id of the current post
  $post_id = get_the_ID();


  $html = "";

  $html .= smdre_print_tags_resources($post_id);
  $html .= smdre_print_tags_bibliography($post_id);

  echo $html;
}




}
