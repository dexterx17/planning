<td colspan="3">
      <div class="box">
            <div class="box-header">
             <h3 class="box-title"><?php echo lang('create_group_heading');?>
                  <small><?php echo lang('create_group_subheading');?></small>
                  </h3>
            </div>
            <div class="bpx-doby">
                  <div id="results" style="display: none">
                        <div id="messages">
                              
                        </div>
                  </div>
					<?php echo form_open("auth/edit_group/".$group->id,array('method'=>'post','id'=>'grupo-form','class'=>'form-horizontal','role'=>'form'));?>
					<div id="infoMessage"><?php echo $message;?></div>

					        <div class="form-group">
					      		<?php echo form_label(lang('create_group_name_label'),"group_name",array('class'=>'control-label col-sm-2'));?> 
					            <div class="col-sm-10">
					            <?php echo form_input($group_name);?>
					       		</div>
					        </div>

					      <div class="form-group">
					      <?php echo form_label(lang('create_group_desc_label'),"description",array('class'=>'control-label col-sm-2'));?> 
					            <div class="col-sm-10">
					            <?php echo form_input($description);?>
					       		</div>
					        </div>
    <?php echo form_input($id_grupo); ?>
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
                      'value'=>lang('create_group_submit_btn'),
                      'class'=>'btn'
                      )); ?>
    					      </div>
                  </div>

					<?php echo form_close();?>
					</div>
				</div>
			</td>

			<script type="text/javascript">
$(document).ready(function() {
  var id_grupo = $('#ID').val();
 $('#grupo-form').validate({
  rules: {
   group_name: {
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
            url : $('#grupo-form').attr('action'),
            data : $('#grupo-form').serialize(),
            type: "POST",
            dataType: 'json',
            success : function(data){
            if(!data.error){
               $("#grupo-form").parent('.box').fadeOut('slow').remove();
               if(id_grupo===""){
                  $.get('<?php echo site_url("peoples");?>/get_row_grupo/'+data.grupo_id, function(data) {
                    $('#grupos-content').prepend($(data));
                  });
               }else{
                  $.get('<?php echo site_url("peoples");?>/get_row_grupo/'+id_grupo,function(data){
                     $('#grupo'+id_grupo).replaceWith(data); 
                   });
               }
            }else
             $('#infoMessage').html(data.message);   
            }
        })
        return false;
     }
  
 });  

 $('#cancelar').click(function(){
  if(id_grupo===""){
    $('#grupillo').html('');
  }else{
    $.get('<?php echo site_url("peoples");?>/get_row_grupo/'+id_grupo,
      function(data){
       $('#grupo'+id_grupo).replaceWith(data); 
     }
   );
  }
 });

}); // end document.ready