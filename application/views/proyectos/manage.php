<?php $this -> load -> view('inicio/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Mis proyectos
        <small>En esta sección usted puede crear, editar y monitorear sus proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#"> Proyectos</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
		<section class="seccion">

			<div class="acciones">
				<a class="btn btn-redirected" data-content="proyectillos" href="<?php echo site_url("$controller_name/nuevo"); ?>">
					<i class="fa fa-lg fa-fw fa-plus"></i>
					<span><?php echo lang($controller_name.'_new'); ?></span>
				</a>
			</div>
			<article class="master">
				<div id="proyectillos"></div>
					<ul class="proyectos">
					<?php 
						foreach ($items as $key => $value) {
							$data['info']=(array)$value;
							
							$this -> load -> view('proyectos/block',$data);
						}
					?>
					</ul>
			</article>
		</section>
</section>
<?php $this -> load -> view('inicio/footer'); ?>
