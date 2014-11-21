
<div class="block" id="<?php echo $info['ID']; ?>">
	<div class="row">
		<div class="col-main">
			<div class="panel panel-collapse">
				<div class="panel-header">
					<div class="menu-operaciones">
						<ul>
							<li><a class="" href="<?php echo site_url("$controller_name/nuevo/".$info['ID']); ?> ">
									<i class="fa fa-lg fa-fw fa-edit"></i>
									<span><?php echo lang('comun_edit'); ?></span>
								</a>
							</li>
							<li><i class="fa fa-lg fa-fw fa-trash-o"></i>
								<span><?php echo lang('comun_delete'); ?></span>
							</li>
						</ul>
					</div>
					<h3>
						<a class="btn" href="<?php echo site_url("$controller_name/perfil/".$info['ID']); ?> "><i class="fa fa-lg fa-fw fa-user"></i></a>
						<?php echo $info['nombres'].' '.$info['apellidos']; ?>
					</h3>
					<small><?php echo $info['email']; ?></small>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-6">
							<?php echo lang('comun_nick'); ?>
						</div>
						<div class="col-6">
							<?php echo $info['nick']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<?php echo lang('comun_phone'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['telefono']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<?php echo lang('comun_cellphone'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['celular']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<?php echo lang('comun_latitude'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['latitud']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<?php echo lang('comun_longitude'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['longitud']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-secondary">
			<div class="panel">
				<div class="panel-header">
					<div class="menu-operaciones">
						<ul>
							<li><a class="btn-redirected" data-content="tareillas<?php echo $info['ID']; ?>"  href="<?php echo site_url("tareas/nuevo/-1/".$info['ID']); ?> ">
									<i class="fa fa-lg fa-fw fa-plus"></i>
									<span><?php echo lang('comun_new'); ?></span>
								</a>
							</li>
						</ul>
					</div>
					<h3><?php echo lang('actividades_taks_list') ?></h3>
					<small><?php echo lang('actividades_taks_list_desc'); ?></small>
				</div>
				<div class="panel-body">
					<ul class="todo-list">
			            <?php 
						/*	foreach ($info['tareas'] as $key => $value) {
                                                            $data['tarea']=$value;
                                                            $this->load->view('backlog/block_tarea',$data);
							}*/
						?>
		        	</ul>
		        	<div id="tareillas<?php echo $info['ID']; ?>"></div>
		        </div>
	        </div>
		</div>
	</div>
</div>