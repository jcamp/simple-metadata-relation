<?php
/**
 * Print the metatags properties
 *
 * @package smdre-trasnlations
 * @subpackage smdre-trasnlations/output
 * @since 1.0.1
 */


 /**
  *
  * @param 		$post_id used to get the values for this post in the table 'postmeta'
  * @return		$metadata
	*
  * @since    1.0.1
  */
  function smdre_get_json_ld_translations($post_id){

    $metadata = [];
    $translations_metadata = [];

    // Adding the metadata for all the pairs url-language
    for($key=1; $key<=6; $key++){
      $url = get_post_meta($post_id, 'smdre_translations_url_' . $key, true);
      $language = get_post_meta($post_id, 'smdre_translations_language_' . $key, true );

      $translation_metadata = [[
        'id'          =>  $url,
        'inLanguage'  =>  $language
      ]];
      $translations_metadata = array_merge($translations_metadata, $translation_metadata);
    }

    // add translations to the metadata array
    if(!empty($translations_metadata)){
    $metadata['workTranslation'] = $translations_metadata;
    }

    return $metadata;
  }
