<?php	$this->load->view('inicio/header'); ?>
<div class="contenido">
	<section class="seccion">
		<hgroup>
			<h2><?php echo lang($controller_name.'_new'); ?></h2>
			<small><?php echo lang($controller_name.'_description'); ?></small>
		</hgroup>
		<article class="panel">
			<div id="results" style="display: none">
				<div id="messages">
					
				</div>
				<!-- SI SE QUIEREN AGREGAR MAS BOTENES PARA OPERACIONES DESPUES DE GUARDAR -->
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
			
			<form action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form" >
				<div id="errors" class="alert-info"></div>
				<?php echo get_row_form(lang('comun_nick'),'nick', $info['nick']); ?>
				<?php echo get_row_form(lang('comun_names'),'nombres',$info['nombres']); ?>
				<?php echo get_row_form(lang('comun_lastnames'),'apellidos',$info['apellidos']); ?>
				<?php echo get_row_form(lang('comun_email'),'email','email',$info['email']); ?>
				<?php echo get_row_form(lang('comun_address'),'direccion',$info['direccion']); ?>
				<?php echo get_row_form(lang('comun_phone'),'telefono',$info['telefono']); ?>
				<?php echo get_row_form(lang('comun_cellphone'),'celular',$info['celular']); ?>
				
				<?php echo form_hidden('ID',$info['ID']); ?>
				<div class="footer">
					<?php echo form_submit(array(
										'name'=>'submit',
										'id'=>'submit',
										'value'=>lang('comun_submit')
										));	?>
				</div>
			</form>
		</article>
	</section>
</div>
<script type="text/javascript">
$(document).ready(function() {
 $('#<?php echo $controller_name; ?>-form').validate({
  rules: {
   nick: {
    required: true,
    minlength:5,
    maxlength:30
   },
   nombres: {
    required: true
   },
   apellidos: {
    required: true
   },
   email: {
    required: true,
    email: true
   }
  },
  highlight: function(element) {
   $(element).closest('.control-group').removeClass('success').addClass('error');
  },
  success: function(element) {
   element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
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
<?php $this->load->view('inicio/footer'); ?>
