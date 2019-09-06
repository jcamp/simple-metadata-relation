<?php
/**
 * @package smdre-translations
 * @subpackage smdre-translations/box
 * @since 1.0.1
 */

 	/**
 	 * Create the metabox 'translations' for post page and cpt
 	 *
 	 * @param string $post_type type of the post/cutom-post e.g. 'post', 'page', 'chapter'
 	 * @since    1.0.1
 	 */
	function smdre_create_translations_box($post_type){
		x_add_metadata_group(
			'smdre_translations', // id
			$post_type,
			array(
				'label' 			=>	__('Translations', 'simple-metadata-relation'),
				'description'	=>  __('Translations of this site. These fields will be added to the front page metadata.', 'simple-metadata-relations')
			)
		);

		// Creating 6 pairs of url and languages
		for($key=1; $key<= 6; $key++){
			x_add_metadata_field(
				'smdre_translations_url_' . $key,
				$post_type,
				array(
				'group'           => 'smdre_translations',
				'label'						=> sprintf(__('%s Url', 'simple-metadata-relations'), $key),
				'placeholder'			=> 'http://example.com/article'
				)
			);

			x_add_metadata_field(
				'smdre_translations_language_' . $key,
				$post_type,
				array(
				'group'           => 'smdre_translations',
				'field_type'			=> 'select',
				'values'					=> smd_supported_languages(),
				'label'						=> sprintf(__('%s Language', 'simple-metadata-relations'), $key),
				'placeholder'			=> 'http://example.com/article'
				)
			);
		}
	}
