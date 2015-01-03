<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?php echo $info['orden'].' '.lang($controller_name.'_new'); ?>
			<small><?php echo lang($controller_name.'_description'); ?></small>
		</h3>
	</div>
	<div id="results" style="display: none">
		<div id="messages">
			
		</div>
	</div>
	<form class="form-horizontal" role="form" action="<?php echo site_url('actividades/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
		<div id="errors" class="alert-info"></div>
		<?php echo get_row_form(lang('comun_name'),'nombre',$info['nombre']); ?>
		<?php echo get_row_form(lang('comun_description'),'descripcion',$info['descripcion']); ?>

		<?php echo get_row_form(lang('comun_planned_time'),'tiempo_planificado',$info['tiempo_planificado']); ?>
    <?php echo get_row_form(lang('comun_real_time'),'tiempo_real',$info['tiempo_real']); ?>
		<?php echo get_row_form(lang('comun_state'),'estado',$info['estado'],$estados_actividad); ?>
		
		<?php echo get_row_form(lang('sprints_singular'),'sprint',$info['sprint'],$sprints); ?>
		<?php echo form_hidden('ID',$info['ID']); ?>
		<?php echo form_hidden('proyecto',$proyecto); ?>
		
		<div class="box-footer">
			<?php echo form_submit(array(
								'name'=>'submit',
								'id'=>'submit',
								'value'=>lang('comun_submit'),
								'class'=>'btn'
								));	?>
		</div>
	</form>
</div>

<script type="text/javascript">
 
  $('#tiempo_planificado').spinner();
  $('#tiempo_real').spinner();

$(document).ready(function() {


 $('#<?php echo $controller_name; ?>-form').validate({
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
             $('#results').show();
             $('#messages').html(data.message);
            }else
             $('#errors').html(data.message);	
            }
        })
        return false;
     }
  
 });  
}); // end document.ready

</script>