
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
					<h3><a class="btn-embed" href="<?php echo site_url($controller_name."/view/".$info['ID']); ?>"><?php echo $info['objetivo']; ?></a></h3>
					<small><?php echo $info['horas_planificadas']; ?></small>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-6">
							<?php echo lang('comun_valid_percent'); ?>
						</div>
						<div class="col-6">
							<?php echo $info['porcentaje_valido']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<?php echo lang('comun_start_date'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['fecha_inicio']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<?php echo lang('comun_end_date'); ?>
						</div>
						<div class="col-3">
							<?php echo $info['fecha_fin']; ?>
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
							foreach ($info['actividades'] as $key => $value) {
								 $data['info']=$value;
                                $this->load->view('backlog/block_actividad',$data);
							}
						?>
		        	</ul>
		        	<div id="tareillas<?php echo $info['ID']; ?>"></div>
		        </div>
	        </div>
		</div>
	</div>
</div>

