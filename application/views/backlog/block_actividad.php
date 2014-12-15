
<div class="block" id="<?php echo $info['ID']; ?>">
	<div class="row">
		<div class="col-main">
			<div class="panel panel-collapse">
				<div class="panel-header">
					<div class="menu-operaciones">
						<ul>
							<li><a class="btn-embed" href="<?php echo site_url("$controller_name/nuevo/".$info['ID'].'/'.$info['proyecto']); ?> ">
									<i class="fa fa-lg fa-fw fa-edit"></i>
									<span><?php echo lang('comun_edit'); ?></span>
								</a>
							</li>
							<li><i class="fa fa-lg fa-fw fa-trash-o"></i>
								<span><?php echo lang('comun_delete'); ?></span>
							</li>
						</ul>
					</div>
					<h3><?php echo $info['nombre']; ?></h3>
					<small><?php echo $info['descripcion']; ?></small>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-6">
							<?php echo lang('comun_estado'); ?>
						</div>
						<div class="col-6">
							<?php echo $info['estado']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<?php echo lang('comun_planned_time'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['tiempo_planificado']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<?php echo lang('comun_real_time'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['tiempo_real']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>