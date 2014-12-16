
<div class="block_sprint row" id="<?php echo $info['ID']; ?>">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><a class="btn-embed" href="<?php echo site_url($controller_name."/view/".$info['ID']); ?>"><?php echo $info['objetivo']; ?></a></h3>
					<div class="box-tools pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-embed" href="<?php echo site_url("$controller_name/nuevo/".$info['ID'].'/'.$info['proyecto']); ?> ">
									<i class="fa fa-lg fa-fw fa-edit"></i>
							</button>
							<button type="button" class="btn btn-sm btn-delete">
							 	<i class="fa fa-lg fa-fw fa-trash-o"></i>
							</button>	
						</div>
					</div>
				</div>
				<div class="box-body">
						<div class="row">
							<div class="row">
								<div class="col-sm-6">
									<?php echo lang('comun_valid_percent'); ?>
								</div>
								<div class="col-sm-6">
									<?php echo $info['porcentaje_valido']; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<?php echo lang('comun_start_date'); ?>
								</div>
								<div class="col-sm-3">
									<?php echo $info['fecha_inicio']; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<?php echo lang('comun_end_date'); ?>
								</div>
								<div class="col-sm-3">
									<?php echo $info['fecha_fin']; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title"><?php echo lang('actividades_sprint') ?>
										<small><?php echo lang('actividades_sprint_desc'); ?></small>
									</h3>
									<div class="box-tools pull-right">
										<div class="btn-group">
											<button type="button" class="btn-redirected" data-content="tareillas<?php echo $info['ID']; ?>"  href="<?php echo site_url("tareas/nuevo/-1/".$info['ID']); ?> ">
													<i class="fa fa-lg fa-fw fa-plus"></i>
											</button>
										</div>
									</div>
									
								</div>
								<div class="box-body">
									<ul class="todo-list">
							            <?php 
											foreach ($info['actividades'] as $key => $value) {
												 $data['info']=$value;
				                                $this->load->view('backlog/block_actividad',$data);
											}
										?>
						        	</ul>
						        </div>
					        </div>
						</div>
					
					
				</div>
			</div>
</div>

