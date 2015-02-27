<div class="box">
	<div class="box-header">
		<h3><?php if($info['ID']==-1 || $info['ID']==""){ echo lang($controller_name.'_new'); }else{ echo lang($controller_name.'_edit'); } ?>
		<small><?php echo lang($controller_name.'_description'); ?></small>
		</h3>
	</div>
	<div id="results" style="display: none">
		<div id="messages">
			
		</div>
	</div>
	<form class="form-horizontal" role="form" action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
		<div id="errors" class="alert-info"></div>
		<?php echo get_row_form(lang('comun_objetive'),'objetivo',$info['objetivo']); ?>
		<?php echo get_row_form(lang('comun_start_date'),'fecha_inicio',$info['fecha_inicio']); ?>
		<?php echo get_row_form(lang('comun_end_date'),'fecha_fin',$info['fecha_fin']); ?>
		<?php echo get_row_form(lang('comun_planned_time'),'horas_planificadas',$info['horas_planificadas']); ?>
		<?php echo get_row_form(lang('comun_valid_percent'),'porcentaje_valido',$info['porcentaje_valido']); ?>
		
		<?php echo form_input(array('type'=>'hidden','name'=>'ID','value'=>$info['ID'],'id'=>'ID')); ?>
		<?php echo form_hidden('proyecto',$proyecto); ?>
		
		<div class="box-footer">
			<div class="btn-group">
				<?php echo form_input(array(
                  'type'=>'button',
                  'name'=>'cancelar',
                  'id'=>'cancelar',
                  'value'=>lang('comun_cancel'),
                  'class'=>'btn'
                  )); ?>
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
	var id_sprint = $('#ID').val();
	var title =$('#objetivo').val();
 $('#<?php echo $controller_name; ?>-form').validate({
  rules: {
   objetivo: {
    required: true
   },
   fecha_inicio:{
   	required:true
   },
   fecha_fin:{
   	required:true
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
       title =$('#objetivo').val();
        $.ajax({
            url : '<?php echo site_url($controller_name);?>/save',
            data : $('#<?php echo $controller_name; ?>-form').serialize(),
            type: "POST",
            dataType: 'json',
            success : function(data){
            if(!data.error){
	             $("#<?php echo $controller_name; ?>-form").parent('.box').fadeOut('slow').remove();
	             if(id_sprint===""){
	                $.get('<?php echo site_url($controller_name);?>/get_row/'+data.sprint_id, function(data) {
	                  $('#sprints-content').prepend($(data));
	                  inicializar_block_sprints();
	                });
	             }else{
	                $('#bodysprint'+id_sprint).load('<?php echo site_url($controller_name);?>/get_detail_row/'+id_sprint, function(data) {
	                	$('#titlesprint'+id_sprint).html(title);  
	                });
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
	$('#fecha_fin').datetimepicker({
	 	theme:'dark',
	 	timepicker:false,
	 	format:'Y/m/d',
		formatDate:'Y/m/d'
	});
	 $('#cancelar').click(function(){
		  if(id_sprint===""){
		    $('#sprintsillos').html('');
		  }else{
		    $('#bodysprint'+id_sprint).load('<?php echo site_url($controller_name);?>/get_detail_row/'+id_sprint, function(data) {
	       	 $('#titlesprint'+id_sprint).html(title);  
	       	 inicializar_block_sprints();
			});
		}
	   });
		
	
}); // end document.ready

</script>