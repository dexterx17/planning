
<div class="block_proyecto row" id="proyecto<?php echo $info['ID']; ?>">
	
		<div class="col-lg-6">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><?php echo $info['nick']; ?></h3>
					<div class="box-tools pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-redirected" data-content="proyecto<?php echo $info['ID']; ?>" href="<?php echo site_url("$controller_name/nuevo/".$info['ID']); ?>">
								<i class="fa fa-lg fa-fw fa-edit"></i>
							</button>
							<button type="button" class="btn btn-sm btn-delete" data-content="proyecto<?php echo $info['ID']; ?>" href="<?php echo site_url("$controller_name/delete/".$info['ID']); ?>">
								<i class="fa fa-lg fa-fw fa-trash-o"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="box-body">
					<h3><a href="<?php echo site_url($controller_name."/view/".$info['ID']); ?>"> <?php echo $info['nombre']; ?></a> </h3>
					<small><?php echo $info['descripcion']; ?></small>
					<div class="row">
						<div class="col-sm-6">
							<?php echo lang('comun_owner'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo $info['owner']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<?php echo lang('comun_date_start'); ?>
						</div>
						<div class="col-sm-3">
							<?php echo $info['fecha_inicio']; ?>
						</div>
						<div class="col-sm-3">
							<?php echo lang('comun_date_end'); ?>
						</div>
						<div class="col-sm-3">
							<?php echo $info['fecha_fin']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-secondary">
			
		</div>
</div>

