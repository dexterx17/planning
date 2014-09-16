
<article class="master">
	<hgroup>
		<h2><?php echo lang('actividades_tasks'); ?></h2>
		<small><?php echo lang('actividades_tasks_desc'); ?></small>
	</hgroup>
	<div id="results<?php echo $actividad; ?>" style="display: none">
	<div id="messages<?php echo $actividad; ?>"></div>
	</div>
	<form action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
		<div id="errors" class="alert-info"></div>
		<?php echo get_row_form(lang('comun_name'),'nombre',$info['nombre']); ?>
		<?php echo get_row_form(lang('comun_description'),'descripcion',$info['descripcion']); ?>
		<?php echo get_row_form(lang('comun_planned_time'),'tiempo_planificado',$info['tiempo_planificado']); ?>
		<?php echo get_row_form(lang('comun_real_time'),'timpo_real',$info['tiempo_real']); ?>
		<?php echo get_row_form(lang('comun_state'),'estado',$info['estado']); ?>
		
		<?php echo form_hidden('ID',$info['ID']); ?>
		<?php echo form_hidden('actividad',$actividad); ?>
		
		<div class="footer">
			<?php echo form_input(array(
								'type'=>'button',
								'name'=>'cancelar',
								'id'=>'cancelar',
								'value'=>lang('comun_cancel'),
								'class'=>'btn'
								));	?>
			<?php echo form_submit(array(
								'name'=>'submit',
								'id'=>'submit',
								'value'=>lang('comun_submit'),
								'class'=>'btn'
								));	?>
		</div>
	</form>
</article>


<script type="text/javascript">
$(document).ready(function() {
 $('form#<?php echo $controller_name; ?>-form').validate({
  rules: {
   nick: {
    required: true,
    minlength:4,
    maxlength:50
   },
   nombre: {
    required: true
   }
  },
  highlight: function(element) {
   $(element).closest('.control-group').removeClass('success').addClass('error');
  },
  success: function(element) {
   element.addClass('valid').closest('.control-group').removeClass('error').addClass('success');
  }, 
  
  submitHandler: function( form ) {
       
        $.ajax({
            url : '<?php echo site_url($controller_name);?>/save',
            data : $('#<?php echo $controller_name; ?>-form').serialize(),
            type: "POST",
            dataType: 'json',
            success : function(data){
            if(!data.error){
             $("#<?php echo $controller_name; ?>-form").hide('slow');
             $('#results'+'<?php echo $actividad;?>').show();
             $('#messages'+'<?php echo $actividad;?>').html(data.message);
            }else
             $('#errors'+'<?php echo $actividad;?>').html(data.message);	
            }
        })
        return false;
     }
  
 });
 $('#cancelar').click(function(){
 	$('#tareillas'+'<?php echo $actividad;?>').html('');
 });
  
}); // end document.ready


</script>