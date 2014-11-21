
<div class="contenido">
	<section class="seccion">
		<article class="panel">
			<hgroup>
				<h2><?php echo lang($controller_name.'_new'); ?></h2>
				<small><?php echo lang($controller_name.'_description').$info['nick']; ?></small>
			</hgroup>
			<div id="results" style="display: none">
				<div id="messages">
					
				</div>
				<!-- SI SE QUIEREN AGREGAR MAS BOTENES PARA OPERACIONES DESPUES DE GUARDAR-->
				<div class="acciones">
					<a class="btn" href="<?php echo site_url("$controller_name"); ?>">
						<i class="fa fa-lg fa-fw fa-group"></i>
						<span><?php echo lang('comun_back_to_list'); ?></span>
					</a>
					<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
						<i class="fa fa-lg fa-fw fa-plus"></i>
						<span><?php echo lang($controller_name.'_new'); ?></span>
					</a>
				</div>
			</div>
			<form action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
				<div id="errors" class="alert-info"></div>
				<?php echo get_row_form(lang('comun_nick'),'nick',$info['nick']); ?>
				<?php echo get_row_form(lang('comun_name'),'nombre',$info['nombre']); ?>
				<?php echo get_row_form(lang('comun_description'),'descripcion',$info['descripcion']); ?>
				<?php echo get_row_form(lang('comun_date_start'),'fecha_inicio',$info['fecha_inicio']); ?>
				<?php echo get_row_form(lang('comun_date_end'),'fecha_fin',$info['fecha_fin']); ?>
				<?php echo get_row_form(lang('comun_owner'),'owner',$info['owner']); ?>
				<?php echo get_row_form(lang('comun_presupuesto'),'presupuesto',$info['presupuesto']); ?>
				
				<?php echo form_input(array('type'=>'hidden','name'=>'ID','value'=>$info['ID'],'id'=>'ID')); ?>
				
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
		<aside>
                <div class="panel">
                	<p>Ayuda del formulario actual</p>
                </div>    
        </aside>
	</section>
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
            	if(id_proyecto===""){
            		$('#proyectillos').html();
			 		$.get('<?php echo site_url($controller_name);?>/get_row/'+data.proyecto_id, function(data) {
					    $('.proyectos div.block:last').after(data);
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
