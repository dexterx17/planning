<?php $this -> load -> view('inicio/header'); ?>
<div class="contenido">
	<section class="seccion">
		<hgroup>
			<h2>Mis proyectos</h2>
			<small>En esta sección usted puede crear, editar y monitorear sus proyectos</small>
		</hgroup>
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

</div>

<?php $this -> load -> view('inicio/footer'); ?>
