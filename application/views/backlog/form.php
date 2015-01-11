<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?php if($info['ID']==-1 || $info['ID']==""){ echo lang($controller_name.'_new'); }else{ echo lang($controller_name.'_edit'); } ?>
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
  $('#tiempo_planificado').spinner();
  $('#tiempo_real').spinner();
  var id_actividad = $('#ID').val();
  var title =$('#nombre').val();
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
        title =$('#nombre').val();
        $.ajax({
            url : '<?php echo site_url($controller_name);?>/save',
            data : $('#<?php echo $controller_name; ?>-form').serialize(),
            type: "POST",
            dataType: 'json',
            success : function(data){
            if(!data.error){
             $("#<?php echo $controller_name; ?>-form").parent('.box').fadeOut('slow').remove();
             if(id_actividad===""){
                $.get('<?php echo site_url($controller_name);?>/get_row/'+data.actividad_id, function(data) {
                  $('#backlog-content').prepend($(data));
                });
             }else{
                $('#actividadbody'+id_actividad).load('<?php echo site_url($controller_name);?>/get_detail_row/'+id_actividad, function(data) {
                $('#actividad'+id_actividad+' .activity_title').html(title);  
                });
             }
            }else
             $('#errors').html(data.message);	
            }
        })
        return false;
     }
  
 });  
 $('#cancelar').click(function(){
  if(id_actividad===""){
    $('#actividadsillas').html('');
  }else{
     $('#actividadbody'+id_actividad).load('<?php echo site_url($controller_name);?>/get_detail_row/'+id_actividad, function(data) {
     $('#actividad'+id_actividad+' .activity_title').html(title);  
   });
  }
 });
}); // end document.ready

</script>