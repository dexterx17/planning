<?php	$this->load->view('inicio/header'); ?>
<div class="contenido">
	<section class="seccion">
		<hgroup>
			<h2>Personas</h2>
			<small>En esta sección usted puede ver a todas las personas involucradas en el proyecto</small>
		</hgroup>
		<div class="acciones">
			<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
				<i class="fa fa-lg fa-fw fa-plus"></i>
				<span><?php echo lang($controller_name.'_new'); ?></span>
			</a>
		</div>
		<article>
			<?php print_r($items); ?>
		</article>
	</section>

</div>


<?php $this->load->view('inicio/footer'); ?>
