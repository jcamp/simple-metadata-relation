<?php
/**
 * Print the metatags properties
 *
 * @package smdre-trasnlated_from
 * @subpackage smdre-trasnlated_from/output
 * @since 1.0.1
 */


 /**
  *
  * @param 		$post_id used to get the values for this post in the table 'postmeta'
  * @return		$metadata
  * @since    1.0.1
  */
  function smdre_print_tags_translated_from($post_id){

    $metadata = [];

    $url = get_post_meta($post_id, 'smdre_translated_from_url', true);
    $language = get_post_meta($post_id, 'smdre_translated_from_language', true );

    $metadata['translationOfWork'] =  [
      'id'          => $url,
      'inLanguage'  => $language
    ];

    return $metadata;
  }
