
<div class="block" id="proyecto<?php echo $info['ID']; ?>">
	<div class="row">
		<div class="col-main">
			<div class="panel">
				<div class="panel-header">
					<div class="menu-operaciones">
						<ul>
							<li><a class="btn-redirected" data-content="proyecto<?php echo $info['ID']; ?>" href="<?php echo site_url("$controller_name/nuevo/".$info['ID']); ?>">
									<i class="fa fa-lg fa-fw fa-edit"></i>
									<span><?php echo lang('comun_edit'); ?></span>
								</a>
							</li>
							<li>
								<a class="btn btn-delete" data-content="proyecto<?php echo $info['ID']; ?>" href="<?php echo site_url("$controller_name/delete/".$info['ID']); ?>">
									<i class="fa fa-lg fa-fw fa-trash-o"></i>
									<span><?php echo lang('comun_delete'); ?></span>
								</a>
							</li>
						</ul>
					</div>
					<h2><a href="<?php echo site_url($controller_name."/view/".$info['ID']); ?>"> <?php echo $info['nick']; ?></a> </h2>
					<h3><?php echo $info['nombre']; ?></h3>
					<small><?php echo $info['descripcion']; ?></small>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-6">
							<?php echo lang('comun_owner'); ?>
						</div>
						<div class="col-6">
							<?php echo $info['owner']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<?php echo lang('comun_date_start'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['fecha_inicio']; ?>
						</div>
						<div class="col-3">
							<?php echo lang('comun_date_end'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['fecha_fin']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-secondary">
			
		</div>
	</div>
</div>

