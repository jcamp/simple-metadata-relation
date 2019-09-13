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
  function smdre_get_json_ld_translated_from($post_id, $post_meta_type){

    $metadata = [];

    if(get_option('smdre_is_translated_from') && is_plugin_active('pressbooks/pressbooks.php')){
      // The metabox is automatic
      $metadata = smdre_get_automatic_translated_from($post_id, $post_meta_type);
    }
    else{
      $metadata = smdre_get_metabox_translated_from($post_id, $post_meta_type);
    }

    return $metadata;
  }

  /**
   * Get information from pressbook data and add it to the property translationOfWork
   *
   *
   * @param   int $post_id used for post_meta_function
   * @param   string $post_meta_type type of the post e.g.'Chapter', 'Book', 'Page'
   * @return  $metadata
   *
   * @since   1.0.2
   */
  function smdre_get_automatic_translated_from($post_id, $post_meta_type){
    $metadata = [];

    $url = get_post_meta($post_id, 'pb_is_based_on', true);

    if($url){
      $metadata['translationOfWork']  = [
        '@type' =>  $post_meta_type,
        'url'   =>  $url
      ];
    }


    return $metadata;
  }


  /**
   * @param   int $post_id used for post_meta_function
   * @param   string $post_meta_type type of the post e.g.'Chapter', 'Book', 'Page'
   * @return		$metadata
   *
   * @since    1.0.2
   */
  function smdre_get_metabox_translated_from($post_id, $post_meta_type){
    $metadata = [];

    $url = get_post_meta($post_id, 'smdre_translated_from_url', true);
    $language = get_post_meta($post_id, 'smdre_translated_from_language', true );

    if($url){
      $metadata['translationOfWork'] =  [
        '@type'       => $post_meta_type,
        'url'         => $url,
        'inLanguage'  => $language
      ];
    }


    return $metadata;
  }
