<div class="contenido">
      <section class="seccion">
            <hgroup>
                  <h2><?php echo lang('create_group_heading');?></h2>
                  <small><?php echo lang('create_group_subheading');?></small>
            </hgroup>
            <article class="panel">
                  <div id="results" style="display: none">
                        <div id="messages">
                              
                        </div>
                  </div>
					<?php echo form_open("auth/create_group",array('method'=>'post','id'=>'grupo-form'));?>
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

					      <div class="footer">
					      <?php echo form_submit('submit', lang('create_group_submit_btn'));?>
					      </div>

					<?php echo form_close();?>
					</article>
				</section>
			</div>

			<script type="text/javascript">
$(document).ready(function() {
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
            url : '<?php echo site_url("auth/create_group");?>',
            data : $('#grupo-form').serialize(),
            type: "POST",
            dataType: 'json',
            success : function(data){
            if(!data.error){
             $("#grupo-form").hide('slow');
             $('#results').show();
             $('#messages').html(data.message);
            }else
             $('#infoMessage').html(data.message);   
            }
        })
        return false;
     }
  
 });  
}); // end document.ready