
<div class="block" id="people<?php echo $info['id']; ?>">
	<div class="box">
				<div class="box-header">
					<h3>
						<span class="col-lg-4">
							<a class="" href="<?php echo site_url("peoples/perfil/".$info['id']); ?> ">
								<img src="<?php echo base_url('uploads/profiles').'/'.$info['imagen']; ?>" class="img-thumbnail people_block_pic">
							</a>	
						</span>
						<span class="col-lg-4">
							<?php echo $info['first_name'].' '.$info['last_name']; ?>
							<small><?php echo $info['email']; ?></small>
						</span>
					</h3>
					<div class="box-tools pull-right">
						<div class="btn-group">
							<button class="btn btn-sm btn-redirected"  data-content="people<?php echo $info['id']; ?>" href="<?php echo site_url("auth/edit_user").'/'.$info['id']; ?> ">
									<i class="fa fa-lg fa-fw fa-edit"></i>
							</button>
							<button type="button" class="btn btn-sm btn-delete" data-content="people<?php echo $info['id']; ?>" href="<?php echo site_url("peoples/delete/".$info['id']); ?>">
							<i class="fa fa-lg fa-fw fa-trash-o"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-6">
							<?php echo lang('comun_nick'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo $info['username']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<?php echo lang('comun_phone'); ?>
						</div>
						<div class="col-sm-3">
							<?php echo $info['phone']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<?php echo lang('comun_cellphone'); ?>
						</div>
						<div class="col-sm-3">
							<?php echo $info['phone']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<?php echo lang('comun_latitude'); ?>
						</div>
						<div class="col-sm-3">
							<?php echo $info['latitud']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<?php echo lang('comun_longitude'); ?>
						</div>
						<div class="col-sm-3">
							<?php echo $info['longitud']; ?>
						</div>
					</div>
				</div>
			
	</div>
</div>