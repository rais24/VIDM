<?php
// RSSI ADMIN SETTING OPTIONS ---------------------------
//-------------------------------------------------------
function rssi_backend_menu()
{
?>
<div id="rssi-admin-wrap">

	<div class="wrap">
	<div id="icon-themes" class="icon32"></div>
	<h2><?php _e('Responsive Social Sharing Icons '.rssi_plugin_version().' Setting\'s','rssi'); ?></h2>
	</div>
	<div id="poststuff" style="position:relative;">
		<div class="postbox" id="rssi_admin">
			<div class="handlediv" title="Click to toggle"><br/></div>
			<h3 class="hndle"><span><?php _e("Share Button Settings",'rssi'); ?></span></h3>
			<div class="inside" style="padding: 15px;margin: 0;">
				<form method="post" action="options.php">
					<?php
						wp_nonce_field('update-options');
						$options = get_option('rssi_options');	
					?>
					<table>
						<tr>
							<td><?php _e("Email",'rssi'); ?> :</td>
							<td>
								<select name="rssi_options[show_email]">
									<option value="1" <?php selected('1', $options['show_email']); ?>><?php _e('Enable','rssi'); ?></option>
									<option value="0" <?php selected('0', $options['show_email']); ?>><?php _e('Disable','rssi'); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e("Facebook",'rssi'); ?> :</td>
							<td>
								<select name="rssi_options[show_fb]">
									<option value="1" <?php selected('1', $options['show_fb']); ?>><?php _e('Enable','rssi'); ?></option>
									<option value="0" <?php selected('0', $options['show_fb']); ?>><?php _e('Disable','rssi'); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e("Linkedin",'rssi'); ?> :</td>
							<td>
								<select name="rssi_options[show_linkedin]">
									<option value="1" <?php selected('1', $options['show_linkedin']); ?>><?php _e('Enable','rssi'); ?></option>
									<option value="0" <?php selected('0', $options['show_linkedin']); ?>><?php _e('Disable','rssi'); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e("Twitter",'rssi'); ?> :</td>
							<td>
								<select name="rssi_options[show_twitter]">
									<option value="1" <?php selected('1', $options['show_twitter']); ?>><?php _e('Enable','rssi'); ?></option>
									<option value="0" <?php selected('0', $options['show_twitter']); ?>><?php _e('Disable','rssi'); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e("Google",'rssi'); ?> :</td>
							<td>
								<select name="rssi_options[show_google]">
									<option value="1" <?php selected('1', $options['show_google']); ?>><?php _e('Enable','rssi'); ?></option>
									<option value="0" <?php selected('0', $options['show_google']); ?>><?php _e('Disable','rssi'); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><?php _e("Pinterest",'rssi'); ?> :</td>
							<td>
								<select name="rssi_options[show_piniterest]">
									<option value="1" <?php selected('1', $options['show_piniterest']); ?>><?php _e('Enable','rssi'); ?></option>
									<option value="0" <?php selected('0', $options['show_piniterest']); ?>><?php _e('Disable','rssi'); ?></option>
								</select>
							</td>
						</tr>
					</table>
					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="rssi_options" />					
					<p class="button-controls"><input type="submit" value="<?php _e('Save Settings','rssilider'); ?>" class="button-primary" id="rssi_update" name="rssi_update"></p>
			</div>
		</div>
	</div>
	<div id="poststuff" style="position:relative;">
		<div class="postbox" id="rssi_admin">
			<div class="handlediv" title="Click to toggle"><br/></div>
			<h3 class="hndle"><span><?php _e("Social Share Button Embedded Setting's",'rssi'); ?></span></h3>
			<div class="inside" style="padding: 15px;margin: 0;">
					<table>			
						<!-- Share Button Embedded Code Start -->
							<tr>
							<td><?php _e("Embedded Type",'rssi'); ?> :</td>
							<td>
								<select id="rssi_embeded" class="share_button" name="rssi_options[rssi_embed]">
									<option value="auto_embed" <?php selected('auto_embed', $options['rssi_embed']); ?>><?php _e('Auto Embedded','rssi'); ?></option>
									<option value="template_code" <?php selected('template_code', $options['rssi_embed']); ?>><?php _e('Template code','rssi'); ?></option>
								</select>
							</td>
						</tr>
						<!-- Share Button Embedded Code Ends -->
					</table>
					<table id="rssi_place_type" style="<?php if($options['rssi_embed'] === "template_code"){?>display:none<?php } ?>">			
						<!-- Share Button Embedded Code Start -->
						
							<td>
									<?php _e('Pages:','rssi'); ?>
								</td>
								<td>
									<select name="rssi_options[show_page]">
										<option value="1" <?php selected('1', $options['show_page']); ?>><?php _e('Enable','rssi'); ?></option>
										<option value="0" <?php selected('0', $options['show_page']); ?>><?php _e('Disable','rssi'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<?php _e('Posts:','rssi'); ?>
								</td>
								<td>
									<select name="rssi_options[show_single]">
										<option value="1" <?php selected('1', $options['show_single']); ?>><?php _e('Enable','rssi'); ?></option>
										<option value="0" <?php selected('0', $options['show_single']); ?>><?php _e('Disable','rssi'); ?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<?php _e('Blog Page:','rssi'); ?>
								</td>
								<td>
									<select name="rssi_options[show_blog]">
										<option value="1" <?php selected('1', $options['show_blog']); ?>><?php _e('Enable','rssi'); ?></option>
										<option value="0" <?php selected('0', $options['show_blog']); ?>><?php _e('Disable','rssi'); ?></option>
									</select>
								</td>
							</tr>
							<tr>

						<!-- Share Button Embedded Code Ends -->
					</table>
					<div id="rssi_template_code" style="<?php if($options['rssi_embed'] === "auto_embed"){?>display:none<?php } ?>">
					
						<?php _e('Use Shortcode (inside post/page editor)','rssi'); ?><br>
						<h4>[rssi_social_icons]</h4>
						<div class="rssi_or"><?php _e('"OR"','rssi'); ?></div>
						<?php _e('Use Template Code (inside the post loop)','rssi'); ?><br>
						<h4>&lt;?php if(function_exists('rssi_social_icons')){ echo rssi_social_icons(); } ?&gt;</h4>

					</div>
					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="rssi_options" />		
					<p class="button-controls"><input type="submit" value="<?php _e('Save Settings','rssi'); ?>" class="button-primary" id="rssi_update" name="rssi_update"></p>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
jQuery('#rssi_embeded').change(function(e) { 
	if(this.value==='template_code'){
		jQuery('#rssi_template_code').fadeIn();
		jQuery('#rssi_place_type').fadeOut();
	}
	else{
		jQuery('#rssi_place_type').fadeIn();
		jQuery('#rssi_template_code').fadeOut();
	}
});
</script>
<?php
}