
<div class="contenido">
      <section class="seccion">
            <hgroup>
                  <h2><?php echo lang('edit_user_heading');?></h2>
                  <small><?php echo lang('edit_user_subheading');?></small>
            </hgroup>
            <article class="panel">
                  <div id="results" style="display: none">
                        <div id="messages">
                              
                        </div>
                  </div>

<?php echo form_open(uri_string(),array('method'=>'post','id'=>'auth-form','class'=>'form-horizontal'));?>
<div id="infoMessage"><?php echo $message;?></div>

      <div class="form-group">
            <?php echo form_label(lang('edit_user_fname_label'),"first_name",array('class'=>'control-label col-sm-2'));?> 
            <div class="col-sm-10">
                  <?php echo form_input($first_name);?>
            </div>
      </div>

      <div class="form-group">
            <?php echo form_label(lang('edit_user_lname_label'),"last_name",array('class'=>'control-label col-sm-2'));?> 
            <div class="col-sm-10">
            <?php echo form_input($last_name);?>
            </div>
      </div>

      <div class="form-group">
            <?php echo form_label(lang('edit_user_company_label'),"company",array('class'=>'control-label col-sm-2'));?> 
            <div class="col-sm-10">
            <?php echo form_input($company);?>
            </div>
      </div>

       <div class="form-group">
            <?php echo form_label(lang('edit_user_phone_label'),"phone",array('class'=>'control-label col-sm-2'));?> 
            <div class="col-sm-10">
            <?php echo form_input($phone);?>
            </div>
      </div>

      <div class="form-group">
            <?php echo form_label(lang('edit_user_password_label'),"password",array('class'=>'control-label col-sm-2'));?> 
            <div class="col-sm-10">
            <?php echo form_input($password);?>
            </div>
      </div>

      <div class="form-group">
            <?php echo form_label(lang('edit_user_password_confirm_label'),"password_confirm",array('class'=>'control-label col-sm-2'));?> 
            <div class="col-sm-10">
            <?php echo form_input($password_confirm);?>
            </div>
      </div>
      <div class="form-group">
      <?php if ($this->ion_auth->is_admin()): ?>

           <?php echo form_label(lang('edit_user_groups_heading'),"groups",array('class'=>'control-label col-sm-2'));?> 
          <div class="col-sm-10">
            <ul class="list-unstyled">
            <?php foreach ($groups as $group):?>
              <li>
                <label class="form-control" for="<?php echo $group['id'];?>">
                <?php
                    $gID=$group['id'];
                    $checked = null;
                    $item = null;
                    foreach($currentGroups as $grp) {
                        if ($gID == $grp->id) {
                            $checked= ' checked="checked"';
                        break;
                        }
                    }
                ?>
                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                </label>
               </li>
            <?php endforeach?>
            </ul>
          </div>
      <?php endif ?>
      </div>
      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <div class="footer"><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></div>

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
   phone: {
      required: true,
   },
   company:{
      required: true,
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
            url : '<?php echo site_url(uri_string());?>',
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