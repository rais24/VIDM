<?php
/*
Plugin Name: CHBD Simple jQuery Modal
Plugin URI: http://www.arefin.me/plugins/chbd-simple-jquery-modal
Description: This plugin will help users to show some nice sorts of jquery styles based on popup modal features into their websites.
Author: Morshedul Arefin
Author URI: http://arefin.me
Version: 1.1
*/

/* Calling the Latest jQuery of WordPress */
function chbd_sjm_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'chbd_sjm_latest_jquery');

/* Defining the plugin path */
define('CHBD_SJM_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename ( dirname(__FILE__) ) . '/' );

/* Adding plugin CSS file */
wp_enqueue_style('chbd-sjm-plugin-css-style', CHBD_SJM_PLUGIN_PATH.'css/chbd-simple-jquery-modal.css');

/* Adding plugin JS file */
wp_enqueue_script('chbd-sjm-plugin-js-1', CHBD_SJM_PLUGIN_PATH.'js/chbd-modal.js', array('jquery'));

/* Adding plugin JS file in footer */
function chbd_sjm_jquery_load_in_footer() {    
	wp_enqueue_script('chbd-sjm-plugin-js-2', CHBD_SJM_PLUGIN_PATH.'js/chbd-simple-jquery-modal.js', array('jquery'));
}
add_action('wp_footer', 'chbd_sjm_jquery_load_in_footer');

/* Calling All Shortcodes */
include 'inc/chbd-popup-modal.php';
include 'inc/chbd-notify-modal.php';
include 'inc/chbd-dialog-modal.php';
include 'inc/chbd-hint-modal.php';
include 'inc/chbd-title-modal.php';

?>