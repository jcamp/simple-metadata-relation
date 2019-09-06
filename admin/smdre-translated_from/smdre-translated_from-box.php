<?php
/**
 * @package smdre-trasnlated_from
 * @subpackage smdre-trasnlated_from/box
 * @since 1.0.1
 */


 /**
  * Create the metabox 'Trasnlated from' for post page and cpt
  *
  * @param string $post_type type of the post/cutom-post e.g. 'post', 'page', 'chapter'
  * @since    1.0.1
  */
  function smdre_create_translated_from_box($post_type){
    //for blog 1 in multisite installation we don't create metaboxes as we don't create settings page
    x_add_metadata_group(
      'smdre_translated_from', // id
      $post_type,
      array(
        'label' 			=>	__('Traslated from', 'simple-metadata-relation'),
        'description'	=>  __('The site that this site is translated from. These fields will be added to the front page metadata.', 'simple-metadata-relation')
      )
    );

    x_add_metadata_field(
      'smdre_translated_from_url',
      $post_type,
      array(
        'group'           => 'smdre_translated_from',
        'label'						=> __('Url', 'simple-metadata-relation'),
        'placeholder'			=> 'http://example.com/article'
      )
    );

    x_add_metadata_field(
      'smdre_translated_from_language',
      $post_type,
      array(
        'group'           => 'smdre_translated_from',
        'field_type'			=> 'select',
        'values'					=> smd_supported_languages(),
        'label'						=> __('Language', 'simple-metadata-relation'),
        'placeholder'			=> 'http://example.com/article'
      )
    );
  }
