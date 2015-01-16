<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?php echo lang('actividades_task'); ?></h3>
		<small><?php echo lang('actividades_task_desc'); ?></small>
	</div>
	<form class="form-horizontal" action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
		<div id="errors" class="alert-info"></div>
		<?php echo get_row_form(lang('comun_name'),'nombre',$info['nombre']); ?>
		<?php echo get_row_form(lang('comun_description'),'descripcion',$info['descripcion']); ?>
		<?php echo get_row_form(lang('comun_planned_time'),'tiempo_planificado',$info['tiempo_planificado']); ?>
		<?php echo get_row_form(lang('comun_real_time'),'tiempo_real',$info['tiempo_real']); ?>
		<?php echo get_row_form(lang('comun_state'),'estado',$info['estado'],$estados_tarea); ?>
		
		
		<?php echo form_input(array('type'=>'hidden','name'=>'ID','value'=>$info['ID'],'id'=>'ID')); ?>
		<?php echo form_hidden('actividad',$actividad); ?>
		
		<div class="box-footer">
			<div class="btn-group">
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
		</div>
	</form>
</div>


<script type="text/javascript">
$(document).ready(function() {

	var id_tarea = $('#ID').val();
	var estado = $('#estado').val();

	$('#tiempo_planificado').spinner();
	$('#tiempo_real').spinner();

 $('form#<?php echo $controller_name; ?>-form').validate({
  rules: {
   nombre: {
    required: true
   }
  },
  highlight: function(element) {
   $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
  },
  success: function(element) {
   element.closest('.form-group').removeClass('has-error').addClass('has-success');
  }, 
  
  submitHandler: function( form ) {
	estado = $('#estado').val();       
        $.ajax({
            url : '<?php echo site_url($controller_name);?>/save',
            data : $('#<?php echo $controller_name; ?>-form').serialize(),
            type: "POST",
            dataType: 'json',
            success : function(data){
            if(!data.error){
                $("#<?php echo $controller_name; ?>-form").parent('.box').fadeOut('slow').remove();
                if(id_tarea===""){
                	$.get('<?php echo site_url($controller_name);?>/get_row/'+data.task_id, function(data) {
					    $('#tareillas<?php echo $actividad; ?>+ul.todo-list').prepend($(data));
					    $('#tareillas<?php echo $actividad; ?>+ul.todo-list').todolist();
					});
			 	}else{
			 		$.get('<?php echo site_url($controller_name);?>/get_row/'+id_tarea, function(data) {
					    $('#task-'+id_tarea).replaceWith(data);
			 			$('#task-'+id_tarea).parent('ul').todolist();
					});
			 	}
			 	 reload_counter_taks();
            }else
             $('#errors'+'<?php echo $actividad;?>').html(data.message);	
            }
        })
        return false;
     }
  
 });
 $('#cancelar').click(function(){
 	if(id_tarea===""){
 		$('#tareillas'+'<?php echo $actividad;?>').html('');
 	}else{
 		$('#task-'+id_tarea).load('<?php echo site_url($controller_name);?>/get_row/'+id_tarea);
 	}
 });
  
}); // end document.ready


</script>