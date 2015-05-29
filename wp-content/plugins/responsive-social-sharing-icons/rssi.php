<?php
/*
Plugin Name: Responsive Social Sharing Icons
Plugin URI: http://wptreasure.com
Description: A very attractive social sharing plugin named "Responsive Social Sharing Icons" which gives you a functionality to users to share via their accounts on popular social networks such as Facebook, Google, Twitter, LinkedIn, Pinterest, Email
Author: wptreasure
Version: 1.0.0
Author URI: http://wptreasure.com
*/
/*-------------------------------------------------*/
include_once('rssi-settings.php');
include_once('rssi-calling.php');

//add style and script in head section
add_action('admin_init','rssi_backend_script');
add_action('wp_enqueue_scripts','rssi_frontend_script');

// backend script
function rssi_backend_script()
{
	if(is_admin())
	{
		wp_enqueue_script('jquery');
		wp_enqueue_style('rssi_backend_script',plugins_url('css/rssi-admin.css',__FILE__));
	}
}

// frontend script
function rssi_frontend_script()
{
	if(!is_admin())
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('rssi-modern-minscript', plugins_url('js/modernizr-2.6.2-respond-1.1.0.min.js', __FILE__ ) );
		wp_enqueue_script('rssi-minscript', plugins_url('js/rssi.min.js',__FILE__ ) );
		wp_enqueue_style('rssi-stylesheet', plugins_url('css/rssi.css',__FILE__));
		wp_enqueue_style('font-awesome_style', plugins_url('css/font-awesome.css', __FILE__));
	}
}

// 'ADMIN_MENU' FOR ADDING MENU IN ADMIN SECTION ---------
add_action('admin_menu', 'rssi_plugin_admin_menu');
function rssi_plugin_admin_menu() {
    add_menu_page('Responsive Social Sharing Icons Page', 'RSS Icons','administrator', 'rssi_share', 'rssi_backend_menu',plugins_url('images/rssi-icon.png',__FILE__));
}

// ADD DEFAULT VALUES FOR THE RSSI -----------------------
function rssi_defaults(){

	    $default = array(
		'show_email'   => 1,
		'show_fb'      => 1,
		'show_linkedin'=> 1,
		'show_twitter' => 1,
		'show_google'  => 1,
		'show_piniterest' => 1,
		'rssi_embed'   => 'auto_embed',
		'show_single'  => 1,
		'show_blog'    => 0,
		'show_page'    => 0
    ); 
	return $default;
}

// RUNS WHEN PLUGIN IS ACTIVATED AND ADD OPTION IN wp_option TABLE -
//------------------------------------------------------------------
register_activation_hook(__FILE__,'rssi_plugin_install');
function rssi_plugin_install() {
    add_option('rssi_options', rssi_defaults());
}	

// get rssi version
function rssi_plugin_version(){
	if ( ! function_exists( 'get_plugins' ) )
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}
?>