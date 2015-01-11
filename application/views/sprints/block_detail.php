<div class="box box-solid bg-black-gradient" >
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