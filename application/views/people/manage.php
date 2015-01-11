<?php	$this->load->view('inicio/header'); ?>
<?php echo $map['js']; ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       <?php echo lang('comun_personas'); ?> 
        <small><?php echo lang('comun_list_personas'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><?php echo lang('comun_personas'); ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<article id="contenido2" class="master">
		<div class="row">
			<div class="col-lg-6">
				<div class="acciones">
					<a class="btn btn-embed" href="<?php echo site_url("auth/create_user"); ?>">
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
			</div>
			<div class="col-lg-6">
	            <div class="panel">
	            	<div class="panel-header">
						<div id="direccion"></div>
	            	</div>
	            	<?php echo $map['html']; ?>
	            </div>    
	        </div>
		</div>
	</article>
</section>

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
