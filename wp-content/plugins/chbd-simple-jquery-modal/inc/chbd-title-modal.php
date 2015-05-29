<?php 
function chbd_sjm_shortcode_5($atts) {
	extract( shortcode_atts( array(
		'id'          => 'chbd_ttm_id',
		'text'        => 'Put Your Text',
		'description' => 'Put Your Description',
		'color'       => '#ffffff',
		'bgcolor'     => '#439330',
	), $atts ) );
	
	return '		
		<div class="chbd_sjm_Container">
			<div class="chbd_sjm_live">
				<button style="color:'.$color.';background:'.$bgcolor.'; id="titleModal_ex_'.$id.'" title="'.$description.'" data-titleModal="init">'.$text.'</button>
			</div>			
		</div>		
	';
}
add_shortcode('chbd_modal_5', 'chbd_sjm_shortcode_5');
?>