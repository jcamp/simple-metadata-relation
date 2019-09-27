<?php

/**
 * Set page content related
 *
 *
 * @link URL
 *
 * @package smdre-admin
 * @subpackage smdre-admin/set-page-metaboxes
 * @since 1.0.2
 *
 */


/**
 * Add subpage 'Relation' and metaboxes
 *
 * @since 1.0.2
 *
 */
add_action ('admin_menu', 'smdre_add_relation_settings', 100);
function smdre_add_relation_settings () {
  if ((1 != get_current_blog_id() || !is_multisite()) && is_plugin_active('pressbooks/pressbooks.php')){
    //adding subapage to page of main plugin
    add_submenu_page('smd_set_page', 'Relation', __('Relation Metadata', 'simple-metadata-relation'), 'manage_options', 'smdre_set_page', 'smdre_render_settings');
		smdre_add_book_type_box();
	}
}


/**
* Function for rendering settings subpage.
*
* @since 1.0.2
*
*/
function smdre_render_settings() {
	if(!current_user_can('manage_options')){
		return;
	}

	wp_enqueue_script('common');
	wp_enqueue_script('wp-lists');
	wp_enqueue_script('postbox');
	?>
    <div class="wrap">
    	<?php if (isset($_GET['settings-updated']) && $_GET['settings-updated']) { ?>
      	<div class="notice notice-success is-dismissible">
    			<p><strong><?php _e('Settings saved', 'simple-metadata-relation') ?></strong></p>
        </div>
      <?php } ?>
			<h2><?php _e('Simple Metadata Relation Settings', 'simple-metadata-relation') ?></h2>
      <div class="metabox-holder">
				<?php
				    do_meta_boxes('smdre_set_page', 'normal','');
				?>
      </div>
    </div>
    <script type="text/javascript">
        //<![CDATA[
        jQuery(document).ready( function($) {
            // close postboxes that should be closed
            $('.if-js-closed').removeClass('if-js-closed').addClass('closed');
            // postboxes setup
            postboxes.add_postbox_toggles('smdre_set_page');
        });
        //]]>
    </script>
		<?php
}

/**
 * Add metabox 'Book type'
 *
 * @since 1.0.2
 *
 */
function smdre_add_book_type_box(){
  add_meta_box('smdre-book-type', __('Book type', 'simple-metadata-relation'), 'smdre_render_book_type_box', 'smdre_set_page', 'normal', 'low');

  add_settings_section( 'smdre_set_page_book_type', '', '', 'smdre_set_page_book_type' );

  register_setting ('smdre_set_page_book_type', 'smdre_is_derivate_work');
  register_setting ('smdre_set_page_book_type', 'smdre_is_translated_from');

  add_settings_field ('smdre_is_derivate_work', __('Derivate work', 'simple-metadata-relation'), 'smdre_render_checkbox_field', 'smdre_set_page_book_type', 'smdre_set_page_book_type',
    array('id'=> 'smdre_is_derivate_work', 'description' => __('The Book has translations. If selected, the "Translations" metabox will be automatic (NOT WORKING)', 'simple-metadata-relation')) );
  add_settings_field ('smdre_is_translated_from', __('Translation', 'simple-metadata-relation'), 'smdre_render_checkbox_field', 'smdre_set_page_book_type', 'smdre_set_page_book_type',
    array('id'=> 'smdre_is_translated_from', 'description' => __('The Book is the translation of another Book. If selected, the metabox "Translated from" will be automatic', 'simple-metadata-relation') ) );
}

/**
 * Render the content for 'Book type' box
 *
 * @since 1.0.2
 */
function smdre_render_book_type_box(){
	?>
	<div class="wrap">
    <span class="description">
       <?php esc_html_e('Choose the type of the book', 'simple-metadata-relation'); ?>
    </span>
    <form method="post" action="options.php">
			<?php
			settings_fields( 'smdre_set_page_book_type' );
			do_settings_sections( 'smdre_set_page_book_type' );
      submit_button();
			?>
		</form>
    <p></p>
  </div>
  <?php
}


/**
 * Render a generic checkbox
 *
 * @param string $args['id'] the id of the field
 * @param string $args['description'] the desction to add to the field
 *
 * @since 1.0.2
 *
 */
function smdre_render_checkbox_field($args){
  ?>
    <label for="<?=$args['id']?>">
      <input type="checkbox" name="<?=$args['id']?>" id="<?=$args['id']?>" value="true"
        <?php checked('true', get_option($args['id'])); ?>
      >
    </label><br>
    <span class="description">
        <?php
          echo $args['description'];
        ?>
    </span>
  <?php
}
