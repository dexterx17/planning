<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?php echo lang($controller_name.'_singular'); ?>
			<small><?php echo lang('tareas_description').$info['nick']; ?></small>
		</h3>
		
	</div>
	<form role="form" class="form-horizontal" action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
		<div class="box-body">
			<div id="errors" class="alert-info"></div>
			<?php echo get_row_form(lang('comun_nick'),'nick',$info['nick']); ?>
			<?php echo get_row_form(lang('comun_name'),'nombre',$info['nombre']); ?>
			<?php echo get_row_form(lang('comun_description'),'descripcion',$info['descripcion']); ?>
			<?php echo get_row_form(lang('comun_date_start'),'fecha_inicio',$info['fecha_inicio']); ?>
			<?php echo get_row_form(lang('comun_date_end'),'fecha_fin',$info['fecha_fin']); ?>
			<?php echo get_row_form(lang('comun_presupuesto'),'presupuesto',$info['presupuesto']); ?>
			<?php echo get_row_form(lang('comun_visibilidad'),'visibilidad',$info['visibilidad'],$this->config->item('projects_visivility','parametros')); ?>
			<?php echo form_input(array('type'=>'hidden','name'=>'ID','value'=>$info['ID'],'id'=>'ID')); ?>
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
		</div>
	</form>
</div>

<script type="text/javascript">
$(document).ready(function() {
 var id_proyecto = $('#ID').val();
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
   $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
  },
  success: function(element) {
   element.closest('.form-group').removeClass('has-error').addClass('has-success');
  }, 
  
  submitHandler: function( form ) {
       
        $.ajax({
            url : '<?php echo site_url($controller_name);?>/save',
            data : $('#<?php echo $controller_name; ?>-form').serialize(),
            type: "POST",
            dataType: 'json',
            success : function(data){
            if(!data.error){
             $("#<?php echo $controller_name; ?>-form").parent('.box').fadeOut('slow').remove();
            	if(id_proyecto===""){
			 		$.get('<?php echo site_url($controller_name);?>/get_row/'+data.proyecto_id, function(data) {
					    $('#proyectillos+ ul.proyectos').prepend(data);
					});
			 	}else{
			 		$('#proyecto'+id_proyecto).load('<?php echo site_url($controller_name);?>/get_row/'+id_proyecto);
			 	}
            }else
            	$('#errors').html(data.message);	
            }
        })
        return false;
     }
  
 });  
 	$('#fecha_inicio').datetimepicker({
	 	theme:'dark',
	 	timepicker:false,
	 	format:'Y/m/d',
		formatDate:'Y/m/d'
	});
	//$("#fecha_inicio").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	$('#fecha_fin').datetimepicker({
	 	theme:'dark',
	 	timepicker:false,
	 	format:'Y/m/d',
		formatDate:'Y/m/d'
	});

 $('#cancelar').click(function(){
 	if(id_proyecto===""){
 		$('#proyectillos').html('');
 	}else{
 		$('#proyecto'+id_proyecto).load('<?php echo site_url($controller_name);?>/get_row/'+id_proyecto);
 	}
 });

}); // end document.ready

</script>
