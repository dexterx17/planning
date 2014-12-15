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
				<?php echo get_row_form(lang('comun_objetive'),'objetivo',$info['objetivo']); ?>
				<?php echo get_row_form(lang('comun_start_date'),'fecha_inicio',$info['fecha_inicio']); ?>
				<?php echo get_row_form(lang('comun_end_date'),'fecha_fin',$info['fecha_fin']); ?>
				<?php echo get_row_form(lang('comun_planned_time'),'horas_planificadas',$info['horas_planificadas']); ?>
				<?php echo get_row_form(lang('comun_valid_percent'),'porcentaje_valido',$info['porcentaje_valido']); ?>
				
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
   objetivo: {
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
}); // end document.ready

</script>