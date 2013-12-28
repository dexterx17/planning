<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Planificación y Seguimiento de Proyectos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="layout" content="main"/>
    
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script src="<?php echo base_url() ?>js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
    <link href="<?php echo base_url() ?>css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />

    <style>
    </style>
</head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="brand"><i class="icon-leaf"></i></a>
                    <div id="app-nav-top-bar" class="nav-collapse">
                        <ul class="nav">
                            
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">PROYECTOS
                                        <b class="caret hidden-phone"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="dashboard.html">Dashboard</a>
                                        </li>
                                    </ul>
                                </li>
                        </ul>
                        <ul class="nav pull-right">
                            <li>
                                <a href="login.html">Logout</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<div class="body-nav body-nav-horizontal body-nav-fixed">
            <div class="container">
                <ul>
                    <li>
                        <a href="<?php echo site_url('proyectos');?>">
                            <i class="icon-dashboard icon-large"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-calendar icon-large"></i> Calendario
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('owners');?>">
                            <i class="icon-user icon-large"></i>Miembros
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('sprints');?>">
                            <i class="icon-tasks icon-large"></i>Sprints
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-cogs icon-large"></i> Settings
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-list-alt icon-large"></i> Forms
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-bar-chart icon-large"></i> Charts
                        </a>
                    </li>
                </ul>
            </div>
        </div>