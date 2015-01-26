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
						<h2 class="box-title">Tareas asignadas</h2>
				</div>
				<div class="box-body">
					<table class="table table-condensed">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th><?php echo lang('actividades_task'); ?></th>
                            <th><?php echo lang('comun_state'); ?></th>
                            <th><?php echo lang('comun_times'); ?></th>
                        </tr>
					<?php 
							foreach ($tareas_pendientes as $key => $value) {
								$tarea=(array)$value;
								?>
								 <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $tarea['nombre']; ?></td>
                                    <td><?php echo $estados_tarea[$tarea['estado']]; ?></td>
                                    <td>
									     <!--Tiempo estimado -->
									    <small class="label label-primary" data-toggle="tooltip" title="<?php echo lang('comun_planned_time'); ?>" ><i class="fa fa-clock-o"></i><?php echo $tarea['tiempo_planificado']; ?></small>
									    <!--Tiempo real -->
									    <small class="label label-info" data-toggle="tooltip" title="<?php echo lang('comun_real_time'); ?>" ><i class="fa fa-clock-o"></i><?php echo $tarea['tiempo_real']; ?></small>
                                    </td>
                                </tr>
					<?php	}	?>	
					</table>
				</div>
			</div>
			<div class="box">
				<div class="box-header">
						<h2 class="box-title">Tareas cumplidas</h2>
				</div>
				<div class="box-body chart-responsive">
				 	<div class="chart" id="line-chart" style="height: 300px;"></div>
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
 // LINE CHART
    var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [
            {y: '2011 Q1', item1: 2666},
            {y: '2011 Q2', item1: 2778},
            {y: '2011 Q3', item1: 4912},
            {y: '2011 Q4', item1: 3767},
            {y: '2012 Q1', item1: 6810},
            {y: '2012 Q2', item1: 5670},
            {y: '2012 Q3', item1: 4820},
            {y: '2012 Q4', item1: 15073},
            {y: '2013 Q1', item1: 10687},
            {y: '2013 Q2', item1: 8432}
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
    });
}); // end document.ready

</script>
