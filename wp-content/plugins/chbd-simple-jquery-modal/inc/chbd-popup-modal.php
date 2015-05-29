<?php 
function chbd_sjm_shortcode_1($atts) {
	extract( shortcode_atts( array(
		'id'          => 'chbd_pum_id',
		'text'        => 'Put Your Text',
		'description' => 'Put Your Description',
		'color'       => '#ffffff',
		'bgcolor'     => '#439330',
		'place'       => 'bottomLeft',
	), $atts ) );
	
	return '
		<div class="chbd_sjm_Container">
			<div class="chbd_sjm_live">
				<button style="color:'.$color.';background:'.$bgcolor.';" id="popModal_ex_'.$id.'">'.$text.'</button>
			</div>
		</div>	
		<div style="display:none">
			<div id="chbd_pum_content_'.$id.'">'.$description.'<div class="popModal_footer">
					<button type="button" data-popModalBut="cancel">CLOSE</button>
				</div>
			</div>
		</div>
		<script>
		$(function(){
			$("#popModal_ex_'.$id.'").click(function(){
				$("#popModal_ex_'.$id.'").popModal({
					html : $("#chbd_pum_content_'.$id.'"),
					placement : "'.$place.'",
					showCloseBut : true,
					onDocumentClickClose : true,
					onOkBut : function(){},
					onCancelBut : function(){},
					onLoad : function(){},
					onClose : function(){},
				});
			});
		});
		</script>
	';
}
add_shortcode('chbd_modal_1', 'chbd_sjm_shortcode_1');
?>