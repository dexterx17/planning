<?php	$this->load->view('inicio/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       <a href="#">Dashboard</a>
        <small>Actividades</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="seccion">
	<div class="row">
		<div class="col-lg-6">
			<div class="box">
				<div class="box-header">
						<h2 class="box-title">Tareas en progreso</h2>
				</div>
				<div class="box-body">
				
				</div>
			</div>
			<div class="box">
				<div class="box-header">
						<h2 class="box-title">Tareas asignadas</h2>
				</div>
				<div class="box-body">
				
				</div>
			</div>
		</div>
		<div class="col-lg-6">
	            <div class="box">
	            	<div class="box-header">
	            		<h2 class="box-title">Historial de mi Actividad</h2>
	            	</div>
					<div class="box-body">
	            		
	            	</div>
	            </div>    
		</div>
	</div>
</section>

<?php $this->load->view('inicio/footer'); ?>

<script type="text/javascript">
$(document).ready(function() {

}); // end document.ready

</script>
