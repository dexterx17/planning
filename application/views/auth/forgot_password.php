<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Planificación y Seguimiento de Proyectos</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <meta name="layout" content="main"/>
    <link href="<?php echo base_url() ?>css/normalize.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="<?php echo base_url() ?>css/bootstrap.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="<?php echo base_url() ?>css/jquery-ui.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <!--<link href="<?php echo base_url() ?>css/estilo.min.css" type="text/css" media="screen, projection" rel="stylesheet" />-->
    <link href="<?php echo base_url() ?>css/font-awesome.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <!-- Date Picker -->
    <link href="<?php echo base_url() ?>css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url() ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!--<link href="<?php echo base_url() ?>css/jquery-spinner.min.css" type="text/css" media="screen, projection" rel="stylesheet" />-->
    <link href="<?php echo base_url() ?>css/jquery-datetimepicker.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="<?php echo base_url() ?>css/droparea.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
     <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url() ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap slider -->
    <link href="<?php echo base_url() ?>css/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url() ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <style>
    </style>
</head>
    <body class="bg-black">
      <div class="form-box" id="login-box">
        <div class="header">
            <h1><?php echo lang('forgot_password_heading');?></h1>
        </div>
		<div id="contenido">
    <?php echo form_open("auth/forgot_password",array('method'=>'post','id'=>'auth-form'));?>

	        <div class="body bg-gray">
				<p class="callout callout-info"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
				<div id="infoMessage"><?php echo $message;?></div>
				<div class="form-group">
	      			<?php echo form_input($email);?>
	      		</div>
	      </div>
			 <div class="footer">
	    	  <?php echo form_submit(array('name'=>'submit', 'value'=>lang('forgot_password_submit_btn'),'class'=>'btn bg-olive btn-block')  );?>
	      	</div>

	<?php echo form_close();?>
	</div>
  </div>

    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script src="<?php echo base_url() ?>js/min/jquery-2.0.3.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url() ?>js/src/bootstrap.js" type="text/javascript" ></script>
    <script src="<?php echo base_url() ?>js/min/jquery.validate_es.min.js" type="text/javascript" ></script>
        
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>js/AdminLTE/app.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>js/src/scripts.js" type="text/javascript" ></script>


<script type="text/javascript">
$(document).ready(function() {
 $('#auth-form').validate({
  rules: {
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
  }, 
  
  submitHandler: function( form ) {
        $.ajax({
            url : '<?php echo site_url("auth/forgot_password");?>',
            data : $('#auth-form').serialize(),
            type: "POST",
            dataType: 'json',
            success : function(data){
            if(!data.error){
             $("#auth-form").fadeOut('slow');
             $('#contenido').html(data.message);
             $('#contenido p').append($('<a href="'+'<?php echo site_url("inicio");?>'+'">Regresar</a>'))
            }else
             $('#infoMessage').html(data.message);   
            }
        })
        return false;
     }
  
 });  
}); // end document.ready

</script>
  </body>
</html>