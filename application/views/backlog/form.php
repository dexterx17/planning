<div class="contenido">
	<section class="seccion">
		<article class="panel">
			<hgroup>
				<h2><?php echo lang($controller_name.'_new'); ?></h2>
				<small><?php echo lang($controller_name.'_description'); ?></small>
			</hgroup>
			<div id="results" style="display: none">
				<div id="messages">
					
				</div>
				<!-- SI SE QUIEREN AGREGAR MAS BOTENES PARA OPERACIONES DESPUES DE GUARDAR-->
				<div class="acciones">
					<a class="btn btn-embed" href="<?php echo site_url("$controller_name/view/".$proyecto); ?>">
						<i class="fa fa-lg fa-fw fa-group"></i>
						<span><?php echo lang('comun_back_to_list'); ?></span>
					</a>
					<a class="btn btn-embed" href="<?php echo site_url("$controller_name/nuevo/-1/".$proyecto); ?>">
						<i class="fa fa-lg fa-fw fa-plus"></i>
						<span><?php echo lang($controller_name.'_new'); ?></span>
					</a>
				</div>
			</div>
			<form action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
				<div id="errors" class="alert-info"></div>
				<?php echo get_row_form(lang('comun_name'),'nombre',$info['nombre']); ?>
				<?php echo get_row_form(lang('comun_description'),'descripcion',$info['descripcion']); ?>
				<?php echo get_row_form(lang('comun_planned_time'),'tiempo_planificado',$info['tiempo_planificado']); ?>
				<?php echo get_row_form(lang('comun_real_time'),'timpo_real',$info['tiempo_real']); ?>
				<?php echo get_row_form(lang('comun_state'),'estado',$info['estado'],$estados_actividad); ?>
				
				<?php echo get_row_form(lang('sprints_singular'),'sprint',$info['sprint'],$sprints); ?>

				<?php echo form_hidden('ID',$info['ID']); ?>
				<?php echo form_hidden('proyecto',$proyecto); ?>
				
				<div class="footer">
					<?php echo form_submit(array(
										'name'=>'submit',
										'id'=>'submit',
										'value'=>lang('comun_submit')
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