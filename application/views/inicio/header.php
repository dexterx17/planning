<!DOCTYPE html>
<html lang="en" manifest="<?php echo base_url('manifiesto.cache');?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Planificación y Seguimiento de Proyectos</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <meta name="layout" content="main"/>
    <link href="<?php echo base_url() ?>css/normalize.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="<?php echo base_url() ?>css/bootstrap.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="<?php echo base_url() ?>css/jquery-ui.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <!--<link href="<?php echo base_url() ?>css/estilo.min.css" type="text/css" media="screen, projection" rel="stylesheet" />-->
    <link href="<?php echo base_url() ?>css/font-awesome.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <!-- Date Picker -->
    <link href="<?php echo base_url() ?>css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url() ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!--<link href="<?php echo base_url() ?>css/jquery-spinner.min.css" type="text/css" media="screen, projection" rel="stylesheet" />-->
    <link href="<?php echo base_url() ?>css/jquery-datetimepicker.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="<?php echo base_url() ?>css/droparea.min.css" type="text/css" media="screen, projection" rel="stylesheet" />
     <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url() ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap slider -->
    <link href="<?php echo base_url() ?>css/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url() ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <style>
    </style>
</head>
    <body class="skin-black">
    	<header class="header">
    		<a href="<?php echo base_url(''); ?>" class="logo">
    			PLANNING 
    		</a>
    		<nav class="navbar navbar-static-top" role="navigation">
    			 <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                	<ul class="nav navbar-nav">
                		   <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">1</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Tienes 1 mensaje nuevo</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="#" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Admin
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Bienvenido ...</p>
                                            </a>
                                        </li><!-- end message -->
                                       <!-- ..message.. -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Ver todos los mensajes</a></li>
                            </ul>
                        </li>
                         <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">0</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">No tienes notificaciones</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <!--<li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>-->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Ver todas</a></li>
                            </ul>
                        </li>
                         <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">0</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">No tienes tareas pendientes</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <!-- Task item <li>
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li> end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">Ver todas las tareas</a>
                                </li>
                            </ul>
                        </li>
                          <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->user->username; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-black-gradient">
                                    <img src="<?php echo base_url('uploads/profiles').'/'.$this->user->imagen; ?>" class="img-circle" alt="<?php echo $this->user->username; ?>" />
                                    <p>
                                        <?php echo $this->user->first_name.' '. $this->user->last_name; ?>
                                        <small>Miembro desde <?php echo date('d/m/Y',$this->user->created_on); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-6 text-center">
                                        <a href="<?php echo site_url('proyectos'); ?>">Proyectos</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="<?php echo site_url("peoples/dashboard"); ?>">Dashboard</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url("peoples/perfil"); ?>" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url("auth/logout"); ?>" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                	</ul>
                </div>
    		</nav>
    	</header>

		 <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
              <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
            	<!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url('uploads/profiles').'/'.$this->user->imagen; ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hi, <?php echo $this->user->username; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
						<ul class="sidebar-menu">
							<li class="active">
								<a href="<?php echo base_url() ?>">
									<i class="fa fa-lg fa-fw fa-inbox"></i>
									<span>Inicio</span>
								</a>
							</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-suitcase"></i>
									<span>Proyectos</span>
                                    <i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
                                <?php foreach (get_proyectos($this->user->id) as $key => $proyecto) { ?>
									<li>
										<a href="<?php echo site_url('proyectos/view')."/".$proyecto['ID']; ?>"><i class="fa fa-lg fa-fw fa-suitcase"></i><?php echo $proyecto['nick']; ?></a>
									</li>
                                    <?php } ?>
								</ul>
							</li>
							<?php if($this->ion_auth->is_admin()){ ?>
                            <li class="treeview">
								<a href="#">
									<i class="fa fa-lg fa-fw fa-group"></i>
									<span>Personas</span>
                                    <i class="fa fa-angle-left pull-right"></i>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="<?php echo site_url('peoples/admin') ?>"><i class="fa fa-lg fa-fw fa-suitcase"></i>Personas</a>
									</li>
                                    <li>
                                        <a href="<?php echo site_url('peoples/grupos') ?>"><i class="fa fa-lg fa-fw fa-suitcase"></i>Grupos</a>
                                    </li>
								</ul>
							</li>
                            <?php } ?>
							<li>
								<a href="http://127.0.0.1/planning/calendario">
									<i class="fa fa-lg fa-fw fa-calendar"></i>
									<span><?php echo lang('comun_calendario'); ?></span>
								</a>
							</li>
						</ul>
						</section>
						<!-- / .sidebar -->
					</aside>
				<?php $this->load->view('inicio/modal'); ?>
					  <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">