<?php	$this->load->view('inicio/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       <a href="#">Mi Perfil</a>
        <small>Acerca de mi...</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Mi Perfil</li>
    </ol>
</section>
<section class="seccion">
	<div class="row">
		<div class="col-lg-6">
			<div class="box">
				<div class="box-header">
						<h2 class="box-title"><?php echo  lang('peoples_datos_personales'); ?></h2>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-4">
							<input type="file" class="droparea spot" name="userfile" value="<?php echo base_url('uploads/profiles').'/'.$info['imagen']; ?>" data-post="<?php echo site_url("$controller_name/upload_pic/".$info['id']); ?>"  data-width="100" data-height="100" data-crop="true" data-canvas="false"/>
						</div>
						<div class="col-md-8">
							<table>
								<tr>
									<td>
										<a href="mailto:<?php echo $info['email']; ?>">
											<span class="fa fa-lg fa-fw fa-envelope"></span>
											<?php echo $info['email']; ?>
										</a>
									</td>
								</tr>
								<tr>
									<td>
										<span class="fa fa-lg fa-fw fa-bolt"></span>
										<?php echo $info['company']; ?>
									</td>
								</tr>
								<tr>
									<td>
										<a href="tel://+<?php echo $info['phone']; ?>">
											<span class="fa fa-lg fa-fw fa-phone"></span>
											<?php echo $info['phone']; ?>
										</a>
									</td>
								</tr>
								<tr>
									<td>
										<a href="tel://+<?php echo $info['phone']; ?>">
											<span class="fa fa-lg fa-fw fa-mobile"></span>
											<?php echo $info['phone']; ?>
										</a>
									</td>
								</tr>
								<tr>
									<td>
										<span class="fa fa-lg fa-fw fa-arrows-v"></span>
										<?php echo $info['latitud']; ?>
									</td>
								</tr>
								<tr>
									<td>
										<span class="fa fa-lg fa-fw fa-arrows-h"></span>
										<?php echo $info['longitud']; ?>	
									</td>
								</tr>
							</table>
						</div>
					</div>		
				</div>
			</div>
		</div>
		<div class="col-lg-6">
	            <div class="box">
					<div class="box-body">
	            		<?php echo $map['html']; ?>
	            	</div>
	            </div>    
		</div>
	</div>
</section>
<?php echo $map['js']; ?>
<script type="text/javascript">
 map = new google.maps.Map(document.getElementById('map_canvas'));

</script>
<?php $this->load->view('inicio/footer'); ?>

<script type="text/javascript">
$(document).ready(function() {
	// Calling jQuery "droparea" plugin
    $('.droparea').droparea({
        'start' : function(area){
            area.find('.error').remove(); 
        },
        'error' : function(result, input, area){
            $('<div class="error">').html(result.error).prependTo(area); 
            return 0;
            //console.log('custom error',result.error);
        },
        'complete' : function(result, file, input, area){
            if((/image/i).test(file.type)){
                area.find('img').remove();
                //area.data('value',result.filename);
                area.append($('<img>',{'src': '<?php echo base_url("uploads/profiles"); ?>/'+result.filename + '?' + Math.random()}));
            } 
            //console.log('custom complete',result);
        }
    });
}); // end document.ready

</script>
