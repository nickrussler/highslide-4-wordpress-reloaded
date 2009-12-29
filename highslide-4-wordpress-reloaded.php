<?php
/*
Plugin Name: Highslide for Wordpress *reloaded*
Plugin URI: http://solariz.de/highslide4wordpress/
Description: Add configurable "Highslide JS" Support to your Wordpress Installation, including Auto Image linking.
Version: 1.0
Author: Marco Goetze
Author URI: http://solariz.de/

To-Do:
- localization


Released under a Creative Commons Attribution-NonCommercial 2.5 License.

	This program is distributed WITHOUT ANY WARRANTY

*/

// Versions
    $hs4wp_ver_hs       = 418;
    $hs4wp_ver_plugin   = 1.0;

// fixed set / requires
    $hs4wp_plugin_path = trailingslashit(ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));
    $hs4wp_plugin_uri  = trailingslashit(WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)));
    require_once($hs4wp_plugin_path.'functions.hs4wp.php');
    $hs4wp_img_count = 0;
// WP Actions & Filter
    if(get_option('hs4wp_lic_agreement') == "on") {
      add_filter('the_content', 'hs4wp_auto_set', 60);
      if(get_option('hs4wp_attachment_filter')!="on") add_filter('wp_get_attachment_url', 'hs4wp_auto_set_attachmentURL');
      add_action('wp_head', 'hs4wp_prepare_header');
      add_action('wp_footer', 'hs4wp_prepare_footer');
    }
    add_action('admin_menu', 'hs4wp_config_page');
