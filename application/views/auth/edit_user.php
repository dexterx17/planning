
<div class="box">
  <div class="box-header">
        <h3><?php echo lang('edit_user_heading');?>
          <small><?php echo lang('edit_user_subheading');?></small>
        </h3>
  </div>

<?php echo form_open(uri_string(),array('method'=>'post','id'=>'auth-form','class'=>'form-horizontal'));?>
  <div  class="box-dody">
  
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
            <?php echo form_label(lang('comun_latitude'),"latitud",array('class'=>'control-label col-sm-2'));?> 
            <div class="col-sm-10">
            <?php echo form_input($latitud);?>
            </div>
      </div>
      <div class="form-group">
            <?php echo form_label(lang('comun_longitude'),"longitud",array('class'=>'control-label col-sm-2'));?> 
            <div class="col-sm-10">
            <?php echo form_input($longitud);?>
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
      <?php echo form_input(array('type'=>'hidden','name'=>'id','value'=>$user->id,'id'=>'id')); ?>
      <?php echo form_hidden($csrf); ?>

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
                  'value'=>lang('edit_user_submit_btn'),
                  'class'=>'btn'
                  )); ?>
          </div>
      </div>

    <?php echo form_close();?>

  </div>
</div>

<script type="text/javascript">
var marker=null;

function createMarker(map,location){
  if(this.marker==null){  
     var marker = new google.maps.Marker({
        position: location,
        map: map,
        draggable:true,
     });

    google.maps.event.addListener(marker, 'dragend', onDragMarker);
    this.marker=marker;
  }
}

function onDragMarker(event){ 
  $('#latitud').val(event.latLng.lat());
  $('#longitud').val(event.latLng.lng());
}

function clearMarker() {
  if(this.marker!=null){
    this.marker.setMap(null);
    $('#latitud,#longitud').val('');
    this.marker=null;
  }else{
    if(typeof marker_0!= 'undefined'){
      this.marker=marker_0;
      clearMarker();
    }
  }
}


</script>
<script type="text/javascript">
$(document).ready(function() {
  var id_people = $('#id').val();
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
              $("#auth-form").parent('.box').fadeOut('slow').remove();
              if(id_people===""){
                  $.get('<?php echo site_url("peoples/get_row");?>/'+data.id_people, function(data) {
                    $('#peoplesilla').after($(data));
                  });
               }else{
                  $('#people'+id_people).load('<?php echo site_url("peoples/get_row");?>/'+id_people, function(data) {
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
  if(id_people===""){
    $('#peoplesilla').html('');
  }else{
     $('#people'+id_people).load('<?php echo site_url("peoples/get_row");?>/'+id_people, function(data) {

   });
  }
 });  
}); // end document.ready

</script>