<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Planificación y Seguimiento de Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="layout" content="main"/>
    
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script src="<?php echo base_url() ?>js/jquery-2.0.3.min.js" type="text/javascript" ></script>
    <link href="<?php echo base_url() ?>css/style.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="<?php echo base_url() ?>css/font-awesome.css" type="text/css" media="screen, projection" rel="stylesheet" />

    <style>
    </style>
</head>
    <body>
		<div class="contenedor-main">
		<header class="cabecera">
			<div class="title">
				<hgroup>
					<h1>Titulo</h1>
					<h2>Un toque de Descripcion por Aqui</h2>
				</hgroup>
			</div>
			<div class="tooltips">
				<div class="panel">
					<div class="panel-header">
						TITULO TOOLTIP
					</div>
					<div class="panel-body">
						sugerencia
					</div>
				</div>
			</div>
		</header>
			<div class="contenedor">
				<div style="min-height: 500px;" class="contenedor-left">
					<nav class="menu">
						<ul class="">
							<li>
								<a href="<?php echo base_url() ?>">
									<i class="fa fa-lg fa-fw fa-inbox"></i>
									<span>Inicio</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-lg fa-fw fa-suitcase"></i>
									<span>Proyectos</span>
									<b class="collapse-sign">
									    <em class="fa fa-plus-square-o"></em>
									</b>
								</a>
								<ul>
									<li>
										<a href="http://127.0.0.1/planning/es/proyectos"><i class="fa fa-lg fa-fw fa-suitcase"></i>Proyectos</a>
									</li>
									<li>
										<a href="#">Proyecto 1</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="http://127.0.0.1/planning/es/owners">
									<i class="fa fa-lg fa-fw fa-group"></i>
									<span>Owners</span>
									<b class="collapse-sign">
									    <em class="fa fa-plus-square-o"></em>
									</b>
								</a>
							</li>
							<li>
								<a href="http://127.0.0.1/planning/es/sprints">
									<i class="fa fa-lg fa-fw fa-calendar"></i>
									<span>Caldenario</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-lg fa-fw fa-inbox"></i>
									<span>Item 1</span>
									<b class="collapse-sign">
									    <em class="fa fa-plus-square-o"></em>
									</b>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-lg fa-fw fa-inbox"></i>
									<span>Main-item</span>
									<b class="collapse-sign">
									    <em class="fa fa-plus-square-o"></em>
									</b>
								</a>
								<ul>
									<li>
										<a href="#">SUBItem 1</a>
									</li>
									<li>
										<a href="#">SUBItem 2</a>
									</li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
					<div class="contenedor-right" style="min-height: 500px;">