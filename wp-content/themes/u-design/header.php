<?php 
/**
 * @package WordPress
 * @subpackage U-Design
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $udesign_options, $style, $current_slider, $udesign_responsive;
// get the current color scheme subdirectory
$style = ( $udesign_options['color_scheme'] ) ? "style{$udesign_options['color_scheme']}": "style1";
$current_slider = $udesign_options['current_slider'];
$udesign_responsive = $udesign_options['enable_responsive'];
$udesign_responsive_body_class = ( $udesign_responsive ) ? 'u-design-responsive-on' : '';
$udesign_menu_auto_arrows = ( $udesign_options['show_menu_auto_arrows'] ) ? 'u-design-menu-auto-arrows-on' : '';
$udesign_menu_drop_shadows = ( $udesign_options['show_menu_drop_shadows'] ) ? 'u-design-menu-drop-shadows-on' : '';
$udesign_fixed_main_menu = ( $udesign_options['fixed_main_menu'] ) ? 'u-design-fixed-menu-on' : '';
$udesign_responsive_pinch_to_zoom = ( $udesign_options['responsive_pinch_to_zoom'] ) ? '' : ', maximum-scale=1.0';

?>
<?php udesign_html_before(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<?php udesign_head_top(); ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php // add 'viewport' meta
if ( $udesign_responsive ) echo '<meta name="viewport" content="width=device-width, initial-scale=1.0'.$udesign_responsive_pinch_to_zoom.'" />'; ?>

<?php // The HTML <title> Element:
ob_start(); ?>
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php
echo apply_filters( 'udesign_head_title_element', ob_get_clean() );  ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<!--[if IE 6]>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/DD_belatedPNG_0.0.8a-min.js"></script>
    <script type="text/javascript">
    // <![CDATA[
	DD_belatedPNG.fix('.pngfix, img, #home-page-content li, #page-content li, #bottom li, #footer li, #recentcomments li span');
    // ]]>
    </script>
<![endif]-->

<?php wp_head(); ?>

<!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie-all.css" media="screen" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie6-7.css" media="screen" type="text/css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie6.css" media="screen" type="text/css" />
    <style type="text/css">
	body{ behavior: url("<?php bloginfo('template_directory'); ?>/scripts/csshover3.htc"); }
    </style>
<![endif]-->
<!--[if lt IE 9]>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/respond.min.js"></script>
<![endif]-->
<?php echo $udesign_options['google_analytics']; ?>
<?php udesign_head_bottom(); ?>
</head>
<body  <?php udesign_inside_body_tag(); ?> <?php body_class( array ($udesign_options['enable_cufon'], $udesign_responsive_body_class, $udesign_menu_auto_arrows, $udesign_menu_drop_shadows, $udesign_fixed_main_menu) ); ?>>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57187118-1', 'auto');
  ga('send', 'pageview');
  
  var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-57187118-1']);
_gaq.push(['_trackPageview']);

</script>

<?php	if( is_front_page() || is_page('courses') ){ ?>
<script>

jQuery(window).load(function(){
jQuery('#eModal-2').emodal('open');
});

</script>
<?php } ?>


<div style="background-color:#121416;" align="center">
<div style="max-width:950px; min-height:47px; background-color:#121416; color:#a6a6a6;">
<div class="top-contact">Call Us: Ph: <span onClick="ga('send', 'event', 'category', 'action','Call','9643350320');">+91- 9643350320</span>, <span onClick="ga('send', 'event', 'category', 'action','Call','9643330589');">+91- 9643330589</span> | </div>  <div class="top-contact_email">Email : <a onClick="ga('send', 'event', 'category', 'action','email','email');" href="mailto:admissions@vidm.in" style="color:#ef5e0d">admissions@vidm.in</a></div>
<div class="top-right-mail"><a href="http://vidm.in/admission/" style="color:#ef5e0d; font-size:14px;">Online Payment</a></div>
</div>
</div>

<?php udesign_body_top(); ?>
    
    <div id="wrapper-1" class="pngfix">
<?php   udesign_top_wrapper_before(); ?>
	<div id="top-wrapper">
<?php       udesign_top_wrapper_top(); ?>
            <div id="top-elements" class="container_24">
<?php           udesign_top_elements_inside( is_front_page() ); ?>
	    </div>
	    <!-- end top-elements -->
<?php       udesign_top_wrapper_bottom( is_front_page() ); ?>
	</div>
	<!-- end top-wrapper -->
        
	<div class="clear"></div>
        
<?php   udesign_top_wrapper_after( is_front_page() ); ?>

<?php	if( is_front_page() ) : 
    
            udesign_front_page_slider_before();

	    if( $current_slider == '1' ) :
		include( 'sliders/flashmo/grid_slider/grid_slider_display.php' );
	    elseif( $current_slider == '2' ) :
		include( 'sliders/piecemaker/piecemaker_display.php' );
	    elseif( $current_slider == '3' ) :
		include( 'sliders/piecemaker_2/piecemaker_display.php' );
	    elseif ( $current_slider == '4' ) :
		include( 'sliders/cycle/cycle1/cycle1_display.php' );
	    elseif ( $current_slider == '5' ) :
		include( 'sliders/cycle/cycle2/cycle2_display.php' );
	    elseif ( $current_slider == '6' ) :
		include( 'sliders/cycle/cycle3/cycle3_display.php' );
	    elseif ( $current_slider == '8' ) : ?>
		<div id="rev-slider-header">
<?php               // Load Revolution slider
                    if ( class_exists('RevSliderFront') && $udesign_options['rev_slider_shortcode'] ) {
                        $rvslider = new RevSlider();
                        $arrSliders = $rvslider->getArrSliders();
                        if( !empty( $arrSliders ) ) {
                            echo do_shortcode( $udesign_options['rev_slider_shortcode'] );
                        }
                    } ?>
                    
                    
                    <div style="float:left; position:absolute;" id="slider_right">
                    	<div style="height:71px; overflow:hidden;"><a href="http://vidm.in/admission/" >
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/admission_open-btn.jpg" onmouseover="jQuery(this).hide(); jQuery(this).next('img').show();"  />
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/admission_open-btn_h.jpg" style="display:none;" onmouseout="jQuery(this).hide(); jQuery(this).prev('img').show();" />
                    	</a>
                    	</div>
                    	<div id="right1" style="height:71px; overflow:hidden;"><a href="http://vidm.in/fashion-designing/">
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/icon_fashion1.jpg" onmouseover="jQuery(this).hide(); jQuery(this).next('img').show();" />
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/icon_fashion_h.jpg" style="display:none;" onmouseout="jQuery(this).hide(); jQuery(this).prev('img').show();" />
                    	</a>
                    	</div>
                    	<div id="right2" style="height:71px; overflow:hidden;"><a href="http://vidm.in/interior-design/">
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/icon_interior1.jpg" onmouseover="jQuery(this).hide(); jQuery(this).next('img').show();" />
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/icon_interior_h.jpg" style="display:none;" onmouseout="jQuery(this).hide(); jQuery(this).prev('img').show();" />
                    	</a>
                    	</div>
                    	<div id="right3" style="height:72px; overflow:hidden;"><a href="#">
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/icon_fashion_management1.jpg" onmouseover="jQuery(this).hide(); jQuery(this).next('img').show();" />
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/icon_fashion_management_h.jpg" style="display:none;" onmouseout="jQuery(this).hide(); jQuery(this).prev('img').show();" />
                    	</a>
                    	</div>
                    	<div id="right4" style="height:65px; overflow:hidden;"><a href="http://vidm.in/short-term-courses/">
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/icon_short1.jpg" onmouseover="jQuery(this).hide(); jQuery(this).next('img').show();" />
                    	<img src="http://vidm.in/website/wp-content/uploads/2014/11/icon_short_h.jpg" style="display:none;" onmouseout="jQuery(this).hide(); jQuery(this).prev('img').show();" />
                    	</a>
                    	</div>
                    </div>
                    
		</div>
		<!-- end rev-slider-header -->
<?php	    elseif ( $current_slider == '7' ) : // no slider ?>
		<div id="page-content-title">
		    <div id="page-content-header" class="container_24">
			<div id="page-title">
<?php                       if ( $udesign_options['no_slider_text'] ) echo '<h2>' . $udesign_options['no_slider_text'] . '</h2>'; ?>
			</div>
		    </div>
		    <!-- end page-content-header -->
		</div>
		<!-- end page-content-title -->
<?php	    endif; ?>
                
<?php       udesign_front_page_slider_after(); ?>

	    <div class="clear"></div>
<?php


            // home-page-before-content Widget Area
            $before_cont_1_is_active = sidebar_exist_and_active('home-page-before-content');
            if ( $before_cont_1_is_active  ) : // hide this area if no widgets are active...
?>
                <div id="before-content">
                    <div id="before-content-column" class="container_24">
                        <div class="home-page-divider pngfix"></div>
<?php
                        if ( $before_cont_1_is_active ) {
                            echo get_dynamic_column( 'before-cont-box-1', 'column_3_of_3 home-cont-box', 'home-page-before-content' );
                        } ?>
                        <div class="home-page-divider pngfix"></div>
                    </div>
                    <!-- end before-content-column -->
                </div>
                <!-- end before-content -->

		<div class="clear"></div>

<?php	    endif; ?>

<?php       udesign_home_page_content_before(); ?>
	    <div id="home-page-content">
<?php           udesign_home_page_content_top(); ?>

<?php	else : // NOT front page ?>

<?php       udesign_page_content_before(); ?>
	    <div id="page-content">
<?php           udesign_page_content_top(); // this hook is used to insert the breadcrumbs ?>

<?php	endif;