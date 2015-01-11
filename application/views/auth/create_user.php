<div class="contenido">
      <section class="seccion">
            <hgroup>
                  <h2><?php echo lang('create_user_heading');?></h2>
                  <small><?php echo lang('create_user_subheading');?></small>
            </hgroup>
            <article class="panel">
                  <div id="results" style="display: none">
                        <div id="messages">
                              
                        </div>
                  </div>
                  <?php echo form_open("auth/create_user",array('method'=>'post','id'=>'auth-form'));?>

                  <div id="infoMessage"><?php echo $message;?></div>
                  <div class="form-group">
                        <?php echo form_label(lang('create_user_fname_label'),"first_name",array('class'=>'control-label col-sm-2'));?> 
                        <div class="col-sm-10">
                              <?php echo form_input($first_name);?>
                        </div>
                  </div>

                  <div class="form-group">
                        <?php echo form_label(lang('create_user_lname_label'),"last_name",array('class'=>'control-label col-sm-2'));?> 
                        <div class="col-sm-10">
                        <?php echo form_input($last_name);?>
                        </div>
                  </div>

                  <div class="form-group">
                        <?php echo form_label(lang('create_user_company_label'),"company",array('class'=>'control-label col-sm-2'));?> 
                        <div class="col-sm-10">
                        <?php echo form_input($company);?>
                        </div>
                  </div>

                  <div class="form-group">
                        <?php echo form_label(lang('create_user_email_label'),"email",array('class'=>'control-label col-sm-2'));?> 
                        <div class="col-sm-10">
                        <?php echo form_input($email);?>
                        </div>
                  </div>

                  <div class="form-group">
                        <?php echo form_label(lang('create_user_phone_label'),"phone",array('class'=>'control-label col-sm-2'));?> 
                        <div class="col-sm-10">
                        <?php echo form_input($phone);?>
                        </div>
                  </div>

                  <div class="form-group">
                        <?php echo form_label(lang('create_user_password_label'),"password",array('class'=>'control-label col-sm-2'));?> 
                        <div class="col-sm-10">
                        <?php echo form_input($password);?>
                        </div>
                  </div>

                  <div class="form-group">
                        <?php echo form_label(lang('create_user_password_confirm_label'),"password_confirm",array('class'=>'control-label col-sm-2'));?> 
                        <div class="col-sm-10">
                        <?php echo form_input($password_confirm);?>
                        </div>
                  </div>


                  <div class="footer"><?php echo form_submit('submit', lang('create_user_submit_btn'));?></div>

                  <?php echo form_close();?>
            </article>
      </section>
</div>


<script type="text/javascript">
$(document).ready(function() {
 $('#auth-form').validate({
  rules: {
   first_name: {
    required: true
   },
   last_name: {
    required: true
   },
   email: {
    required: true,
    email: true
   },
   phone: {
      required: true,
   },
   company:{
      required: true,
   },
   password:{
      required:true,
   },
   password_confirm:{
      required:true
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
            url : '<?php echo site_url("auth/create_user");?>',
            data : $('#auth-form').serialize(),
            type: "POST",
            dataType: 'json',
            success : function(data){
            if(!data.error){
             $("#auth-form").hide('slow');
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

</script>