
<div class="row block_actividad" id="<?php echo $info['ID']; ?>">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><span class="pull-left btn"><i class="fa fa-fw fa-folder handl"></i></span><?php echo $info['nombre']; ?></h3>
					<div class="box-tools pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-embed btn-sm" href="<?php echo site_url("$controller_name/nuevo/".$info['ID'].'/'.$info['proyecto']); ?> ">
									<i class="fa fa-lg fa-fw fa-edit"></i>
							</button>
							<button type="button" class="btn btn-sm">
								<i class="fa fa-lg fa-fw fa-trash-o"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-sm-12">
									<p><?php echo $info['descripcion']; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<?php echo lang('comun_state'); ?>
								</div>
								<div class="col-sm-6">

									<?php echo $info['estado']; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<?php echo lang('comun_planned_time'); ?>
								</div>
								<div class="col-sm-3">
									<?php echo $info['tiempo_planificado']; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<?php echo lang('comun_real_time'); ?>
								</div>
								<div class="col-sm-3">
									<?php echo $info['tiempo_real']; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<?php echo lang('sprints_singular'); ?>
								</div>
								<div class="col-sm-9">
									<?php echo $info['sprint']; ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title"><?php echo lang('actividades_taks_list') ?>
										<small><?php echo lang('actividades_taks_list_desc'); ?></small>
										</h3>
									
									<div class="box-tools pull-right">
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-redirected" data-content="tareillas<?php echo $info['ID']; ?>"  href="<?php echo site_url("tareas/nuevo/-1/".$info['ID']); ?> ">
												<i class="fa fa-lg fa-fw fa-plus"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="box-body">
						        	<div id="tareillas<?php echo $info['ID']; ?>"></div>
									<ul class="todo-list">
							            <?php 
											foreach ($info['tareas'] as $key => $value) {
				                                $data['tarea']=$value;
				                                $this->load->view('backlog/block_tarea',$data);
											}
										?>
						        	</ul>
						        </div>
					        </div>
						</div>
					</div>
					
				</div> <!-- end box-body -->
			</div><!-- end box -->
</div>