<?php	$this->load->view('inicio/header'); ?>
<div class="contenido">
	<section class="seccion">
		<hgroup>
			<h2><?php echo lang($controller_name.'_new'); ?>
				<small><?php echo lang($controller_name.'_description'); ?></small>
			</h2>
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
				<div class="form-group">
					<?php echo form_label(lang('comun_nick'),'nick',array('class'=>'control-label col-sm-2')); ?>
					<div class="col-sm-10">
						<?php echo form_input(array(
									 'name'=>"nick",
	                                'id'=>"nick",
	                                'value'=>$info['nick'],
	                                'class'=>'form-control',
	                                'placeholder'=>lang('comun_nick'),
	                                'autofocus'=>'autofocus',
	                                'required'=>'required'
								)); ?>
					</div>
				</div>
				<?php echo get_row_form(lang('comun_names'),'nombres',$info['nombres']); ?>
				<?php echo get_row_form(lang('comun_lastnames'),'apellidos',$info['apellidos']); ?>
				<div class="form-group">
					<?php echo form_label(lang('comun_email'),'email',array('class'=>'control-label col-sm-2')); ?>
					<div class="col-sm-10">
						<?php echo form_input(array(
									'type'=>'email',
									'name'=>"email",
	                                'id'=>"email",
	                                'value'=>$info['email'],
	                                'class'=>'form-control',
	                                'placeholder'=>lang('comun_email'),
	                                'required'=>'required'
								)); ?>
					</div>
				</div>
				<?php echo get_row_form(lang('comun_address'),'direccion',$info['direccion']); ?>
				<div class="form-group">
					<?php echo form_label(lang('comun_phone'),'telefono',array('class'=>'control-label col-sm-2')); ?>
					<div class="col-sm-10">
						<?php echo form_input(array(
									'type'=>'tel',
									'name'=>"telefono",
	                                'id'=>"telefono",
	                                'value'=>$info['telefono'],
	                                'class'=>'form-control',
	                                'placeholder'=>lang('comun_phone'),
	                                'required'=>'required'
								)); ?>
					</div>
				</div>
				<?php echo get_row_form(lang('comun_cellphone'),'celular',$info['celular']); ?>
				<?php echo get_row_form(lang('comun_latitude'),'latitud',$info['latitud']); ?>
				<?php echo get_row_form(lang('comun_longitude'),'longitud',$info['longitud']); ?>
				
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
		<aside>
                <div class="panel">
                	<div class="row">
		                <div class="acciones">
							<a class="btn" href="#" onclick="geoLocalizacion();">
								<i class="fa fa-lg fa-fw fa-group"></i>
								<span><?php echo lang('comun_geolocalizarme'); ?></span>
							</a>
							<a class="btn" href="#" onclick="clearMarker();">
								<i class="fa fa-lg fa-fw fa-trash-o"></i>
								<span><?php echo lang('comun_remove_marker'); ?></span>
							</a>
						</div>
					</div>
					<div class="row">
                		<?php echo $map['html']; ?>
                	</div>
                </div>    
        </aside>
	</section>
</div>
<?php echo $map['js']; ?>
<script type="text/javascript">
var map;
var marker=null;


 map = new google.maps.Map(document.getElementById('map_canvas'));


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
   $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
  },
  success: function(element) {
   element.closest('.form-group').removeClass('has-error').addClass('has-success');
   element.closest('.error').remove();
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
