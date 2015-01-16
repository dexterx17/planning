<?php $this -> load -> view('inicio/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Calendario
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Calendario</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-solid bg-black-gradient">
		<div class="box-header">
			<i class="fa fa-calendar"></i>
			<h3 class="box-title">Calendario</h3>
			<!-- tools box -->
            <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                    <button class="btn btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Agregar nuevo evento</a></li>
                    </ul>
                </div>
                <button class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->
		</div>
		<div class="box-body no-padding">
			<div id="calendar" style="width: 100%"></div>
		</div>
		<div class="box-footer text-black">
			<div class="row">

			</div>
		</div>
	</div>
		
</section>
<script type="text/javavscript">
$(document).ready(function() {
    $('#calendar').datepicker({language:"es"});
});
</script>
<?php $this -> load -> view('inicio/footer'); ?>
