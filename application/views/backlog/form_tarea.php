<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?php echo lang('actividades_task'); ?></h3>
		<small><?php echo lang('actividades_task_desc'); ?></small>
	</div>
	<form class="form-horizontal" action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
		<div id="errors<?php echo $actividad;?>" class="alert alert-info alert-dismissable">
                <i class="fa fa-warning"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span></span>
			</div>
		<?php echo get_row_form(lang('comun_name'),'nombre',$info['nombre']); ?>
		<?php echo get_row_form(lang('comun_description'),'descripcion',$info['descripcion']); ?>
		<?php echo get_row_form(lang('comun_planned_time'),'tiempo_planificado',$info['tiempo_planificado']); ?>
		<?php echo get_row_form(lang('comun_real_time'),'tiempo_real',$info['tiempo_real']); ?>
		<?php echo get_row_form(lang('comun_state'),'estado',$info['estado'],$estados_tarea); ?>
		<?php echo get_row_form(lang('comun_responsable'),'responsable',$info['responsable'],$team); ?>
		
		<?php echo form_input(array('type'=>'hidden','name'=>'ID','value'=>$info['ID'],'id'=>'ID')); ?>
		<?php echo form_input(array('type'=>'hidden','name'=>'actividad','value'=>$actividad,'id'=>'actividad')); ?>
		
		<div class="box-footer">
			<div class="btn-group btn-group-justified" role="group">
				<div class="btn-group">
					<?php echo form_input(array(
									'type'=>'button',
									'name'=>'cancelar',
									'id'=>'cancelar',
									'value'=>lang('comun_cancel'),
									'class'=>'btn bg-verde-gris-claro'
									));	?>
				</div>
				<div class="btn-group">
					<?php echo form_submit(array(
									
									'name'=>'submit',
									'id'=>'submit',
									'value'=>lang('comun_submit'),
									'class'=>'btn bg-verde-gris'
									));	?>
				</div>
			</div>
		</div>
	</form>
</div>


<script type="text/javascript">
$(document).ready(function() {
	$('#errors'+'<?php echo $actividad;?>').hide();
	$('#nombre').focus();
	var id_tarea = $('#ID').val();
	var id_actividad = $('#actividad').val();
	var estado = $('#estado').val();

	  $('#tiempo_planificado, #tiempo_real').ionRangeSlider({
                  type:"single",
                  grid:true,
                  values:[0,1,2,3,5,8,13,21],
                  grid_snap:true,
                  postfix:' horas',
                });

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
   element.closest('.error').remove();
  }, 
  
  submitHandler: function( form ) {
	estado = $('#estado').val();       
        $.ajax({
            url : '<?php echo site_url($controller_name);?>/save',
            data : $('#<?php echo $controller_name; ?>-form').serialize(),
            type: "POST",
            dataType: 'json',
            beforeSend:function(){
            	$('#submit').addClass('disabled');
            	$('#submit').val('Procesando...');
            },
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
				 	$('#actividadbody'+id_actividad).load('<?php echo site_url("actividades");?>/get_detail_row/'+id_actividad);
				 	reload_counter_taks();
				 	$('#actividad'+id_actividad).attr('status',data.estado_actividad); 
				 	reload_status_actividades({ids_especificos:[id_actividad]});
	            }else{
	                $('#errors'+'<?php echo $actividad;?>').fadeIn('slow');
	            	$('#errors'+'<?php echo $actividad;?>'+' span').html(data.message);	
	            	$('#submit').val('Guardar');
	            	$('#submit').removeClass('disabled');
	            }
            },
            error:function(jqXHR,textStatus,errorThrown){
            	$('#errors'+'<?php echo $actividad;?>').fadeIn('slow');
            	$('#errors'+'<?php echo $actividad;?>'+' span').html(jqXHR.status+' '+textStatus);
            }
        })
        return false;
     }
  
 });
 $('#cancelar').click(function(){
 	if(id_tarea===""){
 		$('#tareillas'+'<?php echo $actividad;?>').html('');
 	}else{
 		$.get('<?php echo site_url($controller_name);?>/get_row/'+id_tarea, function(data) {
		    $('#task-'+id_tarea).replaceWith(data);
		});
 	}
 });
  
}); // end document.ready


</script>