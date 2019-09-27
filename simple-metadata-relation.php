<?php

/**
 * Simple Metadata - Relation
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/my-language-skills/simple-metadata-relation
 * @since             1.0
 * @package           simple-metadata-relation
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Metadata - Relation
 * Plugin URI:        https://github.com/my-language-skills/simple-metadata-relation
 * Description:       Simple Metadata add-on for relation inforamtion of web-site content.
 * Version:           1.0.3
 * Author:            My Language Skills team
 * Author URI:        https://github.com/my-language-skills/
 * License:           GPL 3.0
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       simple-metadata-relation
 * Domain Path:       /languages
 */

	defined ("ABSPATH") or die ("No script assholes!");

	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

	if(is_plugin_active('simple-metadata/simple-metadata.php')){
		//simple metadata is activated

		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-output.php";
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-init-metaboxes.php";

		//Load Resource
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-resources/smdre-resources-box.php";
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-resources/smdre-resources-output.php";

		//Load Bibliography
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-bibliography/smdre-bibliography-box.php";
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-bibliography/smdre-bibliography-output.php";

		//Load Translated from
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-translated_from/smdre-translated_from-box.php";
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-translated_from/smdre-translated_from-output.php";

		//Load Translations
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-translations/smdre-translations-box.php";
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-translations/smdre-translations-output.php";

		//Load settings related content
		include_once plugin_dir_path( __FILE__ ) . "admin/smdre-admin-settings.php";

		//Load Relation print
		include_once plugin_dir_path( __FILE__ ) . "simple-metadata-relation-print.php";

	}else{
		if(is_multisite()){
			add_action( 'network_admin_notices', 'smdre_show_error');
		}else {
			add_action( 'admin_notices', 'smdre_show_error');
		}
	}

	/**
   * Internalization
   * Loads the MO file for plugin's translation.
   *
   * @since 1.0
   *
   */
	function smdre_show_error() {
		?>
			<div class="notice notice-info is-dismissible">
					<p>
						<strong>'Simple Metadata Relation'</strong>
						<?php esc_html_e('functionality is deprecated due to the following reason:', 'simple-metadata-relation'); ?>
						<strong>'Simple Metadata'</strong>
						<?php esc_html_e('plugin is not installed or not activated. Please, install', 'simple-metadata-relation'); ?>
						<strong>'Simple Metadata'</strong>
						<?php esc_html_e('in order to fix the problem.', 'simple-metadata-relation'); ?>
					</p>
			</div>
		<?php
	}

 /**
  * Internalization
  * Loads the MO file for plugin's translation.
  *
  * @since 1.0
  *
  */
 function smdre_load_plugin_textdomain() {
     load_plugin_textdomain( 'simple-metadata-relation', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
 }

 /**
  * The activated plugin has been loaded
  */
 add_action( 'plugins_loaded', 'smdre_load_plugin_textdomain' );
