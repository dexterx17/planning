<?php	$this->load->view('inicio/header'); ?>
<?php echo $map['js']; ?>

<div class="contenido">
	<section class="seccion">
		<hgroup>
			<h2>Personas</h2>
			<small>En esta sección usted puede ver a todas las personas involucradas en el proyecto</small>
		</hgroup>
		<div class="acciones">
			<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
				<i class="fa fa-lg fa-fw fa-plus"></i>
				<span><?php echo lang($controller_name.'_new'); ?></span>
			</a>
		</div>
		<article>
		<div class="panel-group">
			<?php 
				foreach ($items as $key => $value) {
					$data['info']=(array)$value;
					
					$this -> load -> view('people/block',$data);
				}
			?>
		</div>
		</article>
		<aside>
            <div class="panel">
            	<div class="panel-header">
					<div id="direccion"></div>
            	</div>
            	<?php echo $map['html']; ?>
            </div>    
        </aside>
	</section>

</div>
<script type="text/javascript">

function createMarker(map,location){	
	 var marker = new google.maps.Marker({
      position: location,
      map: map
  });

}
function onDragMarker(map,location){	
	 var marker = new google.maps.Marker({
      position: location,
      map: map
  });
	 
}
</script>

<?php $this->load->view('inicio/footer'); ?>
