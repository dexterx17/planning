<div class="box" id="actividad<?php echo $info['ID']; ?>" status="<?php echo $info['estado']; ?>">
	<div class="box-header">
		<span class="pull-left"><i class="btn fa fa-fw fa-arrows handl"></i></span>
		<h3 class="box-title activity_title"><?php echo $info['nombre']; ?></h3>
		<div class="box-tools pull-right">
			<div class="btn-group">
				<button type="button" class="btn btn-redirected btn-sm" data-content="actividadbody<?php echo $info['ID']; ?>" href="<?php echo site_url("actividades/nuevo/".$info['ID'].'/'.$info['proyecto']); ?> ">
						<i class="fa fa-lg fa-fw fa-edit"></i>
				</button>
				<button type="button" class="btn btn-sm btn-delete" data-content="actividad<?php echo $info['ID']; ?>" href="<?php echo site_url("actividades/delete/".$info['ID']); ?>">
					<i class="fa fa-lg fa-fw fa-trash-o"></i>
				</button>
			</div>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-lg-6" id="actividadbody<?php echo $info['ID'];?>">
			<?php $this->load->view('backlog/block_detail'); ?>
			</div>
			<div class="col-lg-6">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?php echo lang('actividades_tasks_list') ?>
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
