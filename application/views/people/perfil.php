<?php	$this->load->view('inicio/header'); ?>
<div class="contenido">
	<section class="seccion">
		<hgroup>
			<h2><?php echo lang('comun_mi_perfil'); ?></h2>
		</hgroup>
		<article class="panel">
			<div class="row">
				<input type="file" class="droparea spot" name="userfile" value="<?php echo base_url('uploads/profiles').'/'.$info['imagen']; ?>" data-post="<?php echo site_url("$controller_name/upload_pic/".$info['ID']); ?>"  data-width="100" data-height="100" data-crop="true" data-canvas="false"/>
			</div>
			<div class="row">
				<div class="row">
					<h2><?php echo  $info['nick']; ?></h2>
					<small><?php echo $info['nombres'].' '.$info['apellidos'] ?></small>
				</div>			
				<div class="row">
					<a href="mailto:<?php echo $info['email']; ?>">
						<span class="fa fa-lg fa-fw fa-envelope"></span>
						<?php echo $info['email']; ?>
					</a>
				</div>	
				<div>
					<span class="fa fa-lg fa-fw fa-bolt"></span>
					<?php echo $info['direccion']; ?>
				</div>
				<div>
					<a href="tel://+<?php echo $info['telefono']; ?>">
						<span class="fa fa-lg fa-fw fa-phone"></span>
						<?php echo $info['telefono']; ?>
					</a>
				</div>
				<div>
					<a href="tel://+<?php echo $info['celular']; ?>">
						<span class="fa fa-lg fa-fw fa-mobile"></span>
						<?php echo $info['celular']; ?>
					</a>
				</div>
				<div>
					<span class="fa fa-lg fa-fw fa-arrows-v"></span>
					<?php echo $info['latitud']; ?>
				</div>
				<div>
					<span class="fa fa-lg fa-fw fa-arrows-h"></span>
					<?php echo $info['longitud']; ?>	
				</div>
			</div>
			
		</article>
		<aside>
            <div class="panel">
				<div class="row">
            		<?php echo $map['html']; ?>
            	</div>
            </div>    
        </aside>
	</section>
</div>
<?php echo $map['js']; ?>
<script type="text/javascript">
 map = new google.maps.Map(document.getElementById('map_canvas'));

</script>
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
<?php $this->load->view('inicio/footer'); ?>
