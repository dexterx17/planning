<div class="row">
	<div class="col-sm-12">
		<p><?php echo $info['descripcion']; ?></p>
	</div>
</div>
<div class="">
	<div class="col-sm-6 text-right">
		<?php echo lang('comun_state'); ?>
	</div>
	<div class="col-sm-6">

		<?php echo $estados_tarea[$info['estado']]; ?>
	</div>
</div>
<div class="">
	<div class="col-sm-4">
		<?php echo lang('comun_planned_time'); ?>
	</div>
	<div class="col-sm-2">
		<i class="fa fa-clock-o"></i>
		<?php echo $info['tiempo_planificado']; ?>
	</div>
	<div class="col-sm-4">
		<?php echo lang('comun_real_time'); ?>
	</div>
	<div class="col-sm-2">
		<i class="fa fa-clock-o"></i>
		<?php echo $info['tiempo_real']; ?>
	</div>
</div>
<div class="">
	<div class="col-sm-3">
		<?php echo lang('sprints_singular'); ?>
	</div>
	<div class="col-sm-9">
		<?php 
		foreach ($sprints as $key => $sprint) {
			if($sprint['ID']==$info['sprint'])
				echo $sprint['num'].') '.$sprint['objetivo'];
		}
		?>
	</div>
</div>