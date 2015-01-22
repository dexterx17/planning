<div class="box">
	<div class="box-header">
		<h2></h2>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-6">

				<table class="table table-hover">
					<caption>Columnas de Tablero</caption>
					<thead>
						<tr>
							<th>
								<a class="btn btn-redirected" data-content="columnillas" href="<?php echo site_url("kanbans/new_column/-1/".$proyecto); ?>">
		                    		<i class="fa fa-lg fa-fw fa-plus"></i>
		                    		<span><?php echo lang($controller_name.'_new'); ?></span>
		                    	</a>
							</th>
							<th>Columna</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody class="tabla-columnas">	
						<tr id="columnillas">
						</tr>
						<?php 
							foreach ($items as $key => $value) {
								$data['info']=(array)$value;
								$this -> load -> view('kanban/column_tr',$data);
							}
						?>			
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<div class="box">
				 <?php if (count($items)>0){ ?>

					<?php $col_width=12/count($items);	?>
					<div id="tablerillo" class="row" >
						<?php 
							foreach ($items as $key => $value) {
								$columna=(array)$value;
								?>
								<div class="col-lg-<?php echo $col_width; ?>">
									<div>
										<h4 class="text-center"><?php echo $columna['nombre']; ?></h4>
										<p class="lead"><?php echo $estados_tarea[$columna['estado']]; ?></p>
										<p class="text-muted"><?php echo $columna['descripcion']; ?></p>

									</div>
								</div>
						<?php
							}
						?>	
					</div>	
					<?php } ?>		
				</div>	
			</div>
		</div>
	</div>
</div>