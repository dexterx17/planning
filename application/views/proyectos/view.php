<?php $this -> load -> view('inicio/header'); ?>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       <a href="<?php echo site_url("$controller_name/view/".$info['ID']);  ?>"><?php echo $info['nombre']; ?></a>
                        <small><?php echo lang('comun_dashboard'); ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li><a href="<?php echo site_url('proyectos'); ?>"><i class="fa fa-dashboard"></i> Proyectos</a></li>
                        <li class="active"><?php echo $info['nombre']; ?></li>
                    </ol>
                </section>
 		 <!-- Main content -->
                <section class="content">

	<section class="seccion">

			
			<div class="navbar navbar-default">
                <div class="container-fluid">
                 <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-project">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo site_url("$controller_name/view/".$info['ID']);  ?>"><i class="fa fa-lg fa-fw fa-folder"></i></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-project">
    					<ul class="nav nav-pills nav-justified menu-sec">
    						<li>
    							<a class="btn" href="<?php echo site_url("peoples/index").'/'.$info['ID']; ?>">
    								<i class="fa fa-lg fa-fw fa-group"></i>
    								<span><?php echo lang('comun_personas'); ?></span>
    							</a>
    						</li>
    						<li>
    							<a class="btn" href="<?php echo site_url("actividades/index").'/'.$info['ID']; ?>">
    								<i class="fa fa-lg fa-fw fa-group"></i>
    								<span><?php echo lang('comun_backlog'); ?></span>
    							</a>
    						</li>
    						<li>
    							<a class="btn" href="<?php echo site_url("sprints/index").'/'.$info['ID']; ?>">
    								<i class="fa fa-lg fa-fw fa-group"></i>
    								<span><?php echo lang('comun_sprints'); ?></span>
    							</a>
    						</li>
    						<li>
    							<a class="btn" href="<?php echo site_url("kanbans/index").'/'.$info['ID']; ?>">
    								<i class="fa fa-lg fa-fw fa-group"></i>
    								<span><?php echo lang('comun_kanban'); ?></span>
    							</a>
    						</li>
    						<li>
    							<a class="btn disabled" href="<?php echo site_url("$controller_name/nuevo"); ?>">
    								<i class="fa fa-lg fa-fw fa-group"></i>
    								<span><?php echo lang('comun_wiki'); ?></span>
    							</a>
    						</li>
    						<li>
    							<a class="btn disabled" href="<?php echo site_url("$controller_name/nuevo"); ?>">
    								<i class="fa fa-lg fa-fw fa-group"></i>
    								<span><?php echo lang('comun_git'); ?></span>
    							</a>
    						</li>
    						<li>
    							<a class="btn disabled" href="<?php echo site_url("$controller_name/nuevo"); ?>">
    								<i class="fa fa-lg fa-fw fa-calendar"></i>
    								<span><?php echo lang('comun_calendario'); ?></span>
    							</a>
    						</li>
    					</ul>
                    </div>
				</div>
            </div>
			
		<article id="contenido2" class="master">
	                                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo get_count_actividades($info['ID']); ?>
                                    </h3>
                                    <p>
                                        Tareas totales
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo site_url("actividades/index").'/'.$info['ID']; ?>" class="small-box-footer btn-embed">
                                    <?php echo lang('comun_more_info'); ?><i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                         <?php echo get_count_actividades($info['ID'],array(6,7)); ?>
                                    </h3>
                                    <p>
                                        Tareas completadas
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <?php echo lang('comun_more_info'); ?> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo get_count_actividades($info['ID'],5); ?>
                                    </h3>
                                    <p>
                                        Tareas en progreso
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <?php echo lang('comun_more_info'); ?><i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo get_count_actividades($info['ID'],4); ?>
                                    </h3>
                                    <p>
                                        Tareas por completar
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    <?php echo lang('comun_more_info'); ?><i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
			<div class="row">
				<div class="col-lg-2">
					<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				</div>
			</div>
		</article>
	</section>

</section>
<?php $this -> load -> view('inicio/footer'); ?>
