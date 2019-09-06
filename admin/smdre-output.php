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


/**
 * Print the metadata tags for this plugin
 * Used in simple-metadata to print the tags
 *
 * @return $metadata
 * @see simple-metadata
 * @since 1.0
 */
function smdre_print_tags (){

  //get the id of the current post
  $post_id = get_the_ID();

  if(is_front_page()){
    // in this case get_the_ID doesn't return the correct ID for the front-page
    $post_id = smdre_get_site_meta_id();
  }

  $metadata = [];

  $metadata = array_merge($metadata, smdre_print_tags_resources($post_id));
  $metadata = array_merge($metadata, smdre_print_tags_bibliography($post_id));
  $metadata = array_merge($metadata, smdre_print_tags_translated_from($post_id));

  return $metadata;
}



/**
 * A function that returns all the metadata from the site_meta cpt
 * This is like when we use pressbooks to gather all data from Book Info
 * We are always working on a single post -- automatic
 * This function will be mostly used when the plugin is on wordpress mode and not on pressbooks mode.
 */
function smdre_get_site_meta_id(){
  $post_type = is_plugin_active ('pressbooks/pressbooks.php') ? 'metadata' : 'site-meta';
  $args = array(
    'post_type'      => $post_type,
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'orderby'        => 'modified',
    'no_found_rows'  => true,
    'cache_results'  => true,
  );

  $db = new \WP_Query();
  $results = $db->query( $args );

  if ( empty( $results ) ) {
    return false;
  }

  return $results[0]->ID;
}
