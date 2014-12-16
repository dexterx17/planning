<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?php echo lang($controller_name.'_new'); ?>
			<small><?php echo lang($controller_name.'_description'); ?></small>
		</h3>
	</div>
	<div id="results" style="display: none">
		<div id="messages">
			
		</div>
	</div>
	<form class="form-horizontal" role="form" action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
		<div id="errors" class="alert-info"></div>
		<?php echo get_row_form(lang('comun_name'),'nombre',$info['nombre']); ?>
		<?php echo get_row_form(lang('comun_description'),'descripcion',$info['descripcion']); ?>
		<div class="form-group">
			<?php echo form_label(lang('comun_planned_time'),'tiempo_planificado',array('class'=>'control-label col-sm-2')); ?>
			<div class="col-sm-10">
				<?php echo form_input(array(
                                        'name'=>"tiempo_planificado",
                                        'id'=>"red",
                                        'value'=>$info['tiempo_planificado'],
                                        'class'=>'form-control slider',
                                        ));
                ?>
			</div>
		</div>

<input type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="[0, 20]" data-slider-orientation="vertical" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
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
 $(function() {
 	$('.slider').slider();	
 });

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