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
								<div class="box box-solid bg-black-gradient">
									<div class="box-header">
										<i class="fa fa-calendar"></i>
										<h3 class="box-title">Calendario de Sprint</h3>
										<!-- tools box -->
	                                    <div class="pull-right box-tools">
	                                        <!-- button with a dropdown -->
	                                        <div class="btn-group">
	                                            <button class="btn btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
	                                            <ul class="dropdown-menu pull-right" role="menu">
	                                                <li><a href="#">Agregar nuevo evento</a></li>
	                                                <li class="divider"></li>
	                                                <li><a href="#">Ver calendario proyecto</a></li>
	                                            </ul>
	                                        </div>
	                                        <button class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                                    </div><!-- /. tools -->
									</div>
									<div class="box-body no-padding">
										<div class="calendario" style="width:100%" data-date-format="yyyy/mm/dd" startDate="<?php echo $info['fecha_inicio']; ?>" endDate="<?php echo $info['fecha_fin']; ?>"></div>
									</div>
									<div class="box-footer text-black">
										<div class="row">
											<div class="col-sm-6">
												<?php echo lang('comun_valid_percent'); ?>
											</div>
											<div class="col-sm-6">
												<?php echo $info['porcentaje_valido']; ?>
											</div>
										</div>
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
									<ul class="todo-list sprint-backlog" sprint="<?php echo $info['ID']; ?>" >
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

