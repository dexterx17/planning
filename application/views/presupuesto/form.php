<td colspan="5">
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?php if($info['ID']==-1 || $info['ID']==""){ echo lang($controller_name.'_new'); }else{ echo lang($controller_name.'_edit'); } ?>
			<small><?php echo lang($controller_name.'_description'); ?></small>
		</h3>
	</div>
	<form class="form-horizontal" role="form" action="<?php echo site_url('presupuestos/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
		<div id="errors" class="alert alert-info alert-dismissable">
        <i class="fa fa-warning"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span></span>
    </div>
		<?php echo get_row_form(lang($controller_name.'_valor'),'valor',$info['valor']); ?>
		<?php echo get_row_form(lang('comun_description'),'descripcion',$info['descripcion']); ?>

		<?php echo get_row_form(lang($controller_name.'_fecha'),'fecha',$info['fecha']); ?>
    
		<?php echo get_row_form(lang($controller_name.'_tipo'),'tipo',$info['tipo'],$tipos_transacion); ?>
		
		<?php echo form_input(array('type'=>'hidden','name'=>'ID','value'=>$info['ID'],'id'=>'ID')); ?>
		<?php echo form_hidden('proyecto',$proyecto); ?>
		
		<div class="box-footer">
      <div class="btn-group btn-group-justified" role="group">
              <div class="btn-group">
        <?php echo form_input(array(
                  'type'=>'button',
                  'name'=>'cancelar',
                  'id'=>'cancelar',
                  'value'=>lang('comun_cancel'),
                  'class'=>'btn bg-verde-gris-claro'
                  )); ?>
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
</td>
<script type="text/javascript">
 $(document).ready(function() {
  $('#errors').hide();
  $('#valor').focus();
  var id_transaccion = $('#ID').val();
  $('#fecha').datetimepicker({
    theme:'dark',
    format:'Y/m/d H:m',
    formatDate:'Y/m/d'
  });
 $('#<?php echo $controller_name; ?>-form').validate({
  rules: {
   valor: {
    required: true,
   },
   fecha: {
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
               if(id_transaccion===""){
                  $.get('<?php echo site_url($controller_name);?>/get_row/'+data.presupuesto_id, function(data) {
                    $('#presupuesto-content tbody').prepend($(data));
                  });
               }else{
                  $.get('<?php echo site_url($controller_name);?>/get_row/'+id_transaccion,
                    function(data){
                     $('#item'+id_transaccion).replaceWith(data); 
                   });
               }
              }else{
                $('#errors').fadeIn('slow');
                $('#errors span').html(data.message); 
                $('#submit').val('Guardar');
                $('#submit').removeClass('disabled');
              }
            },
            error:function(jqXHR,textStatus,errorThrown){
              $('#errors').fadeIn('slow');
              $('#errors span').html(jqXHR.status+' '+textStatus);
            }
        })
        return false;
     }
  
 });  
 $('#cancelar').click(function(){
  if(id_transaccion===""){
    $('#registrillos').html('');
  }else{
    $.get('<?php echo site_url($controller_name);?>/get_row/'+id_transaccion,
      function(data){
       $('#item'+id_transaccion).replaceWith(data); 
     }
   );
  }
 });
}); // end document.ready

</script>