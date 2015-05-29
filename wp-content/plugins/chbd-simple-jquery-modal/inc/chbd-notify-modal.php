<?php 
function chbd_sjm_shortcode_2($atts) {
	extract( shortcode_atts( array(
		'id'          => 'chbd_nm_id',
		'text'        => 'Put Your Text',
		'description' => 'Put Your Description',
		'color'       => '#ffffff',
		'bgcolor'     => '#439330',
		'place'       => 'center',
		'time'        => '2500',
	), $atts ) );
	
	return '
		<div class="chbd_sjm_Container">
			<div class="chbd_sjm_live">
				<button style="color:'.$color.';background:'.$bgcolor.';" id="notifyModal_ex_'.$id.'">Example</button>
			</div>
		</div>
		<div id="chbd_nm_content_'.$id.'" style="display:none">'.$description.'</div>
		<script>
		$(function(){	
			$("#notifyModal_ex_'.$id.'").click(function(){
				$("#chbd_nm_content_'.$id.'").notifyModal({
					duration : '.$time.',
					placement : "'.$place.'",
					overlay : true
				});
			});		
		});
		</script>		
	';
}
add_shortcode('chbd_modal_2', 'chbd_sjm_shortcode_2');
?>