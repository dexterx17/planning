<td colspan="4">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?php echo lang($controller_name.'_singular'); ?>
				<small><?php echo ''; ?></small>
			</h3>
			
		</div>
		<form role="form" class="form-horizontal" action="<?php echo site_url($controller_name.'/save') ?>" method="post" id="<?php echo $controller_name; ?>-form">
			<div class="box-body">
				<div id="errors" class="alert-info"></div>
				<?php echo get_row_form(lang('wiki_titulo'),'titulo',$info['titulo']); ?>

				<div class="form-group">
					<label for="contenido" class="control-label col-sm-2"><?php echo lang('wiki_contenido'); ?></label>
					<div class="col-sm-10">
						<?php echo form_textarea(
							array(
								'name'=>'contenido',
								'id'=>'contenido',
								'value'=> $info['contenido'],
								'class'=>'form-control',
								'rows'=>5,
							)); 
						?>
						
					</div>
				</div>


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
</td>
<script type="text/javascript">
$(document).ready(function() {
 var id_wiki = $('#ID').val();
 $('#<?php echo $controller_name; ?>-form').validate({
  rules: {
   titulo: {
    required: true,
    minlength:5,
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
            	if(id_wiki===""){
			 		$.get('<?php echo site_url($controller_name);?>/get_row/'+data.wiki_id, function(data) {
					    $('.tabla-wiki').append(data);
					});
			 	}else{
			 		 $.get('<?php echo site_url($controller_name);?>/get_row/'+id_wiki, function(data) {
			              $('#wiki'+id_wiki).replaceWith(data);
			          });
			 	}
            }else
            	$('#errors').html(data.message);	
            }
        })
        return false;
     }
  
 }); 

 $('#contenido').wysihtml5();
 $('#cancelar').click(function(){
 	if(id_wiki===""){
 		$('#registrillos').html('');
 	}else{
 		    $.get('<?php echo site_url($controller_name);?>/get_row/'+id_wiki, function(data) {
              $('#wiki'+id_wiki).replaceWith(data);
          });
 	}
 });

}); // end document.ready

</script>
