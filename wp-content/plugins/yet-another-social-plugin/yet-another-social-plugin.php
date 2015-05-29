<?php

/*
Plugin Name: Yet Another Social Plugin
Version: 1.3
Description: Add social networking share buttons above or below each posts. Easy customization and positioning of the buttons in the Options page.
Author: Marvie Pons
Author URI: http://tutskid.com/
Donate URI: http://tutskid.com/
Plugin URI: http://tutskid.com/yet-another-social-plugin/
  
Copyright 2012  Marvie Pons (email: celebritybanderas@gmail.com)

Released under GPL License.
*/

define('YASP_VERSION', '1.3');

// REQUIRE MINIMUM VERSION OF WORDPRESS:
function yasp_requires_wordpress_version() {
	global $wp_version;
	$plugin = plugin_basename( __FILE__ );
	$plugin_data = get_plugin_data( __FILE__, false );

	if ( version_compare($wp_version, "3.0", "<" ) ) {
		if( is_plugin_active($plugin) ) {
			deactivate_plugins( $plugin );
			wp_die( "'".$plugin_data['Name']."' requires WordPress 3.0 or higher, and has been deactivated! Please upgrade WordPress and try again.<br /><br />Back to <a href='".admin_url()."'>WordPress admin</a>." );
		}
	}
}
add_action( 'admin_init', 'yasp_requires_wordpress_version' );

// Set-up Action and Filter Hooks
register_activation_hook(__FILE__, 'yasp_add_defaults');
register_uninstall_hook(__FILE__, 'yasp_delete_plugin_options');
add_action('admin_init', 'yasp_init' );
add_action('admin_menu', 'yasp_add_options_page');
add_filter( 'plugin_action_links', 'yasp_plugin_action_links', 10, 2 );

// Delete options table entries ONLY when plugin deactivated AND deleted
function yasp_delete_plugin_options() {
	delete_option('yasp_options');
}

// Define default option settings
function yasp_add_defaults() {
	$tmp = get_option('yasp_options');
    if(($tmp['chk_default_options_db']=='1')||(!is_array($tmp))) {
		delete_option('yasp_options'); // so we don't have to reset all the 'off' checkboxes too! (don't think this is needed but leave for now)
		$arr = array(	"chek_button1" => "",
						"chk_default_options_db" => "",
						"chk_button2" => "",
						"chk_button1" => "",
						"hide_button" => ""
		);
		update_option('yasp_options', $arr);
	}
}

// Init plugin options to white list our options
function yasp_init(){
	register_setting( 'yasp_plugin_options', 'yasp_options','yasp_validate_options' );
}

// Add menu page
function yasp_add_options_page() {
	add_options_page('Yet Another Social Plugin', 'YASP', 'manage_options', 'yasp', 'yasp_render_form');
}

// Render the Plugin options form
function yasp_render_form() {
	?>
	<div class="wrap">
		
		<!-- Display Plugin Icon, Header, and Description -->
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Yet Another Social Plugin v<?php echo YASP_VERSION; ?></h2>
		<p>To easily customize <strong>Yet Another Social Plugin</strong>, use the options below.</p>
	

		
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="post-body-content">

			<div class="postbox">
				<div class="inside">

		<!-- Beginning of the Plugin Options Form -->
		<form method="post" action="options.php">
			<?php settings_fields('yasp_plugin_options'); ?>
			<?php $options = get_option('yasp_options'); ?>

			<!-- Table Structure Containing Form Controls -->
			<!-- Each Plugin Option Defined on a New Table Row -->
			<table class="form-table">

				<!-- Checkbox Buttons -->
				<tr valign="top">
					<th scope="row">General Options</th>
					<td>
						<!-- First checkbox button -->
						<label><input name="yasp_options[chek_button1]" type="checkbox" value="1" <?php if (isset($options['chek_button1'])) { checked('1', $options['chek_button1']); } ?> /> Check this box to show the buttons before the post</label><br />

						<!-- Second checkbox button -->
						<label><input name="yasp_options[chk_button1]" type="checkbox" value="1" <?php if (isset($options['chk_button1'])) { checked('1', $options['chk_button1']); } ?> /> Check this box to show box type buttons</label><br />
						
					</td>
				</tr>

				<!-- Textbox Control -->
				
				<tr>
					<th scope="row">Hide Buttons in Page/Pages</th>
					<td>
						<input type="text" size="57" name="yasp_options[hide_button]" value="<?php echo $options['hide_button']; ?>" /><span style="color:#666666;margin-left:2px;"><br />Enter the Page IDs, separated by commas</span>
					</td>
				</tr>
				
				<tr>
					<th scope="row">Default Image URL</th>
					<td>
						<input type="text" size="57" name="yasp_options[txt_one]" value="<?php echo $options['txt_one']; ?>" /><span style="color:#666666;margin-left:2px;"><br />Enter full URL including http:// in this box. This image will be pinned if there's not an image in the post.</span>
					</td>
				</tr>
				
				<!-- Checkbox Button -->
				<tr valign="top">
					<th scope="row">Show Your Support</th>
					<td>
						<label><input name="yasp_options[chk_button2]" type="checkbox" value="1" <?php if (isset($options['chk_button2'])) { checked('1', $options['chk_button2']); } ?> /> Support this free plug-in with a small powered by link at your page footer. Thank you!</label>										
					</td>
				</tr>	

				<tr><td colspan="2"><div style="margin-top:10px;"></div></td></tr>
				<tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row">Database Options</th>
					<td>
						<label><input name="yasp_options[chk_default_options_db]" type="checkbox" value="1" <?php if (isset($options['chk_default_options_db'])) { checked('1', $options['chk_default_options_db']); } ?> /> Restore defaults upon plugin deactivation/reactivation</label>
						<br /><span style="color:#666666;margin-left:2px;">Only check this if you want to reset plugin settings upon Plugin reactivation</span>
					</td>
				</tr>
			</table>

			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />

		</form>
				
				</div><!-- .inside -->
			</div><!-- .postbox -->
			</div> <!-- #post-body-content -->
		
<div id="postbox-container-1" class="postbox-container">
				<div id="side-sortables" class="meta-box-sortables">
				
					<div id="about" class="postbox">
					<div class="handlediv" title="Click to toggle"><br /></div>
						<h3 class="hndle"><span>About the Plugin:</span></h3>
						<div class="inside">
								<p>You are using <a href="http://tutskid.com/yet-another-social-plugin/" target="_blank" style="color:#72a1c6;"><strong>Yet Another Social Plugin</strong></a> v<?php echo YASP_VERSION; ?></p>
						</div><!-- .inside -->
					</div><!-- #about.postbox -->
			
					<div id="about" class="postbox">
					<div class="handlediv" title="Click to toggle"><br /></div>
						<h3 class="hndle"><span>Enjoy the plugin?</span></h3>
						<div class="inside">		
							Why not consider <a href="http://wordpress.org/extend/plugins/yet-another-social-plugin/" target="_blank">giving it a good rating on WordPress.org</a> or <a href="http://twitter.com/?status=Yet Another Social Plugin for WordPress - check it out! http://tutskid.com/yet-another-social-plugin/" target="_blank">Tweet about it</a>. Thanks.</p>
							<span><a href="http://www.facebook.com/Tutskidcom" title="Our Facebook page" target="_blank"><img style="border:1px #ccc solid;" src="<?php echo plugins_url(); ?>/yet-another-social-plugin/images/facebook-icon.png" /></a></span>
							&nbsp;&nbsp;<span><a href="http://twitter.com/tutskid" title="Follow on Twitter" target="_blank"><img style="border:1px #ccc solid;" src="<?php echo plugins_url(); ?>/yet-another-social-plugin/images/twitter-icon.png" /></a></span>
							&nbsp;&nbsp;<span><a href="http://tutskid.com/" title="TutsKid.com" target="_blank"><img style="border:1px #ccc solid;" src="<?php echo plugins_url(); ?>/yet-another-social-plugin/images/pc-icon.png" /></a></span>
						</div><!-- .inside -->
					</div><!-- #about.postbox -->

					<div id="about" class="postbox">
					<div class="handlediv" title="Click to toggle"><br /></div>
						<h3 class="hndle"><span>Donate:</span></h3>
						<div class="inside">
							<p>If you have found this plugin at all useful, please consider buying me a cup of coffee. Thank you!<br />
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="AFRAKJBTHCPYS">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form></p>
						</div><!-- .inside -->
					</div><!-- #about.postbox -->

				</div><!-- #side-sortables.meta-box-sortables -->
			</div><!-- .postbox-container -->

		</div> <!-- #post-body -->
	</div> <!-- #poststuff -->
	
</div>
	<?php	
}

// Sanitize and validate input
function yasp_validate_options($input) {
	if ( ! isset( $input['chk_button1'] ) )
		$input['chk_button1'] = null;
	$input['chk_button1'] = ( $input['chk_button1'] == 1 ? 1 : 0 );
	
	if ( ! isset( $input['chek_button1'] ) )
		$input['chek_button1'] = null;
	$input['chek_button1'] = ( $input['chek_button1'] == 1 ? 1 : 0 );
	
	if ( ! isset( $input['chk_button2'] ) )
		$input['chk_button2'] = null;
	$input['chk_button2'] = ( $input['chk_button2'] == 1 ? 1 : 0 );
	
	$input['txt_one'] =  wp_filter_nohtml_kses($input['txt_one']);
	
	$input['hide_button'] =  wp_filter_nohtml_kses($input['hide_button']);
	
	return $input;
}

// Display a Settings link on the main Plugins page
function yasp_plugin_action_links( $links, $file ) {

	if ( $file == plugin_basename( __FILE__ ) ) {
		$yasp_links = '<a href="'.get_admin_url().'options-general.php?page=yasp">'.__('Settings').'</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $yasp_links );
	}

	return $links;
}

// ------------------------------------------------------------------------------
// YASP PLUGIN FUNCTIONS:
// ------------------------------------------------------------------------------


add_filter('the_content', 'yasp_buttons');

function yasp_buttons($content) {
	
	global $post;
	$options = get_option('yasp_options');

	// single posts or pages
	if(is_single() || is_page()){
		
		// get image
		if(function_exists('get_post_thumbnail_id')){
			$catch_thumbs = wp_get_attachment_image_src(get_post_thumbnail_id($post->id), 'large');
			$catch_thumb = $catch_thumbs[0];
		}

		// If there is no featured image or any image, search post for images and display first one. If none exist, display default image
		if($catch_thumb[0] == ''){
				$out = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $match);
				if ( $out > 0 ){
					$catch_thumb = $match[1][0];
				} else {
			$options = get_option('yasp_options');
			$catch_thumb = $options['txt_one'];
			}
		}	
	}

	$yasptitle = get_the_title();
	$yasplink = get_permalink();
	$exclude_pages = $options['hide_button'];
	$exclude_pages = explode(',', $exclude_pages);
	
	$yaspvert = '
	<div class="fb-button" style="width: 75px; float: left;">
	<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="'.get_permalink($post->id).'" layout="box_count"></fb:like>
	</div>
	<div class="plusone" style="width: 75px; float: left;"><g:plusone size="tall" annotation="bubble" href="'.get_permalink().'"></g:plusone></div>
	<div id="tweet-button" style="width: 90px; float: left;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a></div>
	<div id="pinterest-wrapper" style="width: 70px; margin-top: 40px!important; float: left;"><a href="http://pinterest.com/pin/create/button/?url='.get_permalink($post->id).'&media='. $catch_thumb.'&description=' . $yasptitle . ' on ' . $yasplink . '" class="pin-it-button" count-layout="vertical">Pin It</a></div>
	<div id="linkedin-wrapper"><script type="in/share" data-url="'.get_permalink($post->id).'" data-counter="top"></script></div>
	';
	
	$yasphor = '
	<div class="fb-button" style="width: 85px; float: left;">
	<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="'.get_permalink($post->id).'" layout="button_count"></fb:like>
	</div>
	<div class="plusone" style="width: 75px; float: left;"><g:plusone size="medium" annotation="bubble" href="'.get_permalink().'"></g:plusone></div>
	<div id="tweet-button" style="width: 90px; float: left;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a></div>
	<div id="pinterest-wrapper" style="width: 70px; float: left;"><a href="http://pinterest.com/pin/create/button/?url='.get_permalink($post->id).'&media='. $catch_thumb.'&description=' . $yasptitle . ' on ' . $yasplink . '" class="pin-it-button" count-layout="horizontal">Pin It</a></div>
	<div id="linkedin-wrapper"><script type="in/share" data-url="'.get_permalink($post->id).'" data-counter="right"></script></div>
	';
	
	$clearfix = '<div class="yaspclearfix" style="clear: both;"></div>';

	
if(!is_feed() && !is_home() && !is_archive() && !is_page( $exclude_pages )) if ( isset($options['chek_button1']) && ($options['chek_button1']!="") ) 
	{ if ( isset($options['chk_button1']) && ($options['chk_button1']!="") ) {
	$content = $yaspvert.$clearfix.$content;
	}
	else {
	$content = $yasphor.$clearfix.$content;
	}	
} else { if ( isset($options['chk_button1']) && ($options['chk_button1']!="") ) {
	$content = $content.$clearfix.$yaspvert;
	}
	else {
	$content = $content.$clearfix.$yasphor;
	}
}
	return $content;
}

add_action ('wp_enqueue_scripts','yasp_enqueue_script');

function yasp_enqueue_script() {
	wp_enqueue_script('google-plusone', 'https://apis.google.com/js/plusone.js', array(), null, true);
	wp_enqueue_script('linkedin', 'http://platform.linkedin.com/in.js', array(), null, true);
	wp_enqueue_script('pinterest', 'http://assets.pinterest.com/js/pinit.js', array(), null, true);
	wp_enqueue_script('twitter', 'http://platform.twitter.com/widgets.js', array(), null, true);
}

add_action('wp_footer', 'yasp_footer');

function yasp_footer() {
	$options = get_option('yasp_options');

if ( isset($options['chk_button2']) && ($options['chk_button2']!="") ) { 

		print('<p style="text-align:center;font-size:x-small;color:#666;"><a style="font-weight:normal;color:#666" href="http://tutskid.com/yet-another-social-plugin/" title="Yet Another Social Plugin" target="_blank">Yet Another Social Plugin</a> powered by <a style="font-weight:normal;color:#666" href="http://tutskid.com/" title="Web Tutorials | How-To Guides | TutsKid" target="_blank">TutsKid.com</a>.</p>');
	}
}