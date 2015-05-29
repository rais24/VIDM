<?php 
function chbd_sjm_shortcode_3($atts) {
	extract( shortcode_atts( array(
		'id'          => 'chbd_dm_id',
		'text'        => 'Put Your Text',
		'header'      => 'Put Your Header',
		'description' => 'Put Your Description',
		'color'       => '#ffffff',
		'bgcolor'     => '#439330',
	), $atts ) );
	
	return '
		<div class="chbd_sjm_Container">
			<div class="chbd_sjm_live">
				<button style="color:'.$color.';background:'.$bgcolor.';" id="dialogModal_ex_'.$id.'">'.$text.'</button>
			</div>
		</div>		
		<div id="chbd_dm_content_'.$id.'" class="chbd_dm_content_'.$id.'" style="display:none">
			<div class="dialogModal_header">'.$header.'</div>
			<div class="dialogModal_content">'.$description.'</div>
			<div class="dialogModal_footer">
				<button type="button" data-dialogModalBut="cancel">CLOSE</button>
			</div>
		</div>
		<script>
		$(function(){
			$("#dialogModal_ex_'.$id.'").click(function(){
				$(".chbd_dm_content_'.$id.'").dialogModal({
					onOkBut: function() {},
					onCancelBut: function() {},
					onLoad: function() {},
					onClose: function() {},
				});
			});
		});
		</script>			
	';
}
add_shortcode('chbd_modal_3', 'chbd_sjm_shortcode_3');
?>