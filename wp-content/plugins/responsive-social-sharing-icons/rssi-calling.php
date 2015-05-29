<?phpfunction rssi_social_sharing_icons(){	$options = get_option('rssi_options');		global $post;		/*	 * Edit below to reorder the buttons.	 * NOTE: Lines prefixed with `//` are ignored.	 *	 **/   $rssi_content .= '<ul class="rssi-icons clearfix">';  	if($options['show_email']) {		$rssi_content .= '<li class="email">						<a href="mailto:?subject='.urlencode(get_the_title()) .'&body=' .urlencode(get_permalink()). '">							<span class="icon-envelope icon">															</span>							<span class="text">email</span>						</a>					</li>';	}		if($options['show_fb']) {		$rssi_content .= '<li class="facebook">						<a href="https://www.facebook.com/sharer/sharer.php?u=' .urlencode(get_permalink() ) . ' ">							<span class="icon-facebook icon"></span>							<span class="text">facebook</span>						</a>					</li>';	}		if($options['show_linkedin']) {				$rssi_content .= '<li class="linkedin">					<a href="http://www.linkedin.com/shareArticle?mini=true&url=' .  urlencode(get_permalink()) . '&title=' . urlencode(get_the_title() ) . '" >						<span class="icon-linkedin icon">						</span>						<span class="text">linkedin</span>					</a>				</li>';	}		if($options['show_twitter']) {					$rssi_content .= '<li class="twitter">					<a href="http://twitter.com/home?status=' . urlencode(get_the_title() )  . ' - ' . urlencode(wp_get_shortlink() ). '">						<span class="icon-twitter icon"></span>						<span class="text">twitter</span>					</a>				</li>';	}		if($options['show_google']) { 				$rssi_content .= '<li class="googleplus">					<a href="https://plus.google.com/share?url=' . urlencode(get_the_title() ) . ' - ' . urlencode( get_permalink() ) .'" >						<span class="icon-google-plus icon">						</span>						<span class="text">google+</span>					</a>				</li>';	}		if($options['show_piniterest']) {					$rssi_content .= '<li class="pinterest">					<a href="http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink() ) . '">						<span class="icon-pinterest icon">						</span>						<span class="text">pinterest</span>					</a>				</li>';	}	$rssi_content .= '</ul>';        return $rssi_content;}add_filter('the_content', 'rssi_check_conditions');function rssi_check_conditions($content){	$options = get_option('rssi_options');		if($options['rssi_embed'] === "auto_embed") 	{		if($options['show_single'] && is_single()) {			return $content.rssi_social_sharing_icons();		}		elseif($options['show_blog'] && is_home()) {			return $content.rssi_social_sharing_icons();		}		elseif($options['show_page'] && is_page()) {			return $content.rssi_social_sharing_icons();		}		return $content;	}else{		return $content;	}	}function rssi_social_icons(){	$options = get_option('rssi_options');	if($options['rssi_embed'] === "template_code") {		return rssi_social_sharing_icons();	}}// short code to put sharing iconsadd_shortcode('rssi_social_icons', 'rssi_social_icons');?>