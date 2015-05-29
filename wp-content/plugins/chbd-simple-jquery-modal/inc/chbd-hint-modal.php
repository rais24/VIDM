<?php 
function chbd_sjm_shortcode_4($atts) {
	extract( shortcode_atts( array(
		//'id'          => 'chbd_hm_id',
		'text'        => 'Put Your Text',
		'description' => 'Put Your Description',
		'color'       => '#ffffff',
		'bgcolor'     => '#439330',
	), $atts ) );
	
	return '
		<div class="chbd_sjm_Container">
			<div class="chbd_sjm_live">
				<button style="color:'.$color.';background:'.$bgcolor.'; id="notifyModal_ex1" class="hintModal">'.$text.'<div class="hintModal_container">'.$description.'</div>
				</button>
			</div>
		</div>
	';
}
add_shortcode('chbd_modal_4', 'chbd_sjm_shortcode_4');
?>