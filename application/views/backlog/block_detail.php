
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?php echo $info['descripcion']; ?>
		</h3>
		<div class="box-tools pull-right">
            <div class="label label-default"><?php echo $estados_tarea[$info['estado']]; ?></div>
        </div>
	</div>
	<div class="box-dody">
		<div class="row ">
			<div class="col-sm-4">
				<?php echo lang('comun_planned_time'); ?>
			</div>
			<div class="col-sm-2">
				<span class="label bg-blue ">
					<i class="fa fa-clock-o"></i>
					<?php echo $info['tiempo_planificado']; ?>
				</span>
			</div>
			<div class="col-sm-4">
				<?php echo lang('comun_real_time'); ?>
			</div>
			<div class="col-sm-2">
				<span class="label bg-aqua ">
					<i class="fa fa-clock-o"></i>
					<?php echo $info['tiempo_real']; ?>
				</span>
			</div>
		</div>
		<div class="row">
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
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><?php echo lang('comun_responsables'); ?></h3>
			</div>
			<div class="box-body">
			<?php 
				foreach ($info['responsables'] as $key => $value) {
					$responsable=(array)$value;
			?>
				<a class="btn btn-app">
					<span class="badge badge-right bg-aqua pull-left"><?php echo $responsable['tiempo_real']; ?></span>
				    <?php echo user_miniblock($responsable['id']); ?>
				     <?php echo $responsable['username']; ?>
				    <span class="badge badge-left bg-blue pull-right"><?php echo $responsable['tiempo_planificado']; ?></span>
				</a>

			<?php } ?>

			</div>
		</div>

	</div>
</div>