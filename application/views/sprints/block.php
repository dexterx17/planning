<div class="block_sprint row" id="sprint<?php echo $info['ID']; ?>">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title" id="titlesprint<?php echo $info['ID']; ?>"><a class="btn-embed" href="<?php echo site_url($controller_name."/view/".$info['ID']); ?>"><?php echo $info['objetivo']; ?></a></h3>
					<div class="box-tools pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-redirected" data-content="bodysprint<?php echo $info['ID']; ?>" href="<?php echo site_url("$controller_name/nuevo/".$info['ID'].'/'.$info['proyecto']); ?> ">
									<i class="fa fa-lg fa-fw fa-edit"></i>
							</button>
							<button type="button" class="btn btn-sm btn-delete" data-content="sprint<?php echo $info['ID']; ?>" href="<?php echo site_url("$controller_name/delete/".$info['ID']); ?>">
							 	<i class="fa fa-lg fa-fw fa-trash-o"></i>
							</button>	
						</div>
					</div>
				</div>
				<div class="box-body">
						<div class="row" id="bodysprint<?php echo $info['ID']; ?>">
							<?php $this->load->view('sprints/block_detail'); ?>
						</div>
						<div class="row">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title"><?php echo lang('actividades_sprint') ?>
										<small><?php echo lang('actividades_sprint_desc'); ?></small>
									</h3>
									<div class="box-tools pull-right">
										<div class="btn-group">
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

