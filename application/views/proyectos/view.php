<?php $this -> load -> view('inicio/header'); ?>
<div class="contenido">
	<section class="seccion">
		<hgroup>
			<h2><?php echo $info['nombre']; ?></h2>
			<small><?php echo $info['descripcion']; ?></small>
		</hgroup>
		<div class="acciones">
			<a class="btn" href="<?php echo site_url("$controller_name"); ?>">
				<i class="fa fa-lg fa-fw fa-group"></i>
				<span><?php echo lang('comun_back_to_list'); ?></span>
			</a>
			<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
				<i class="fa fa-lg fa-fw fa-plus"></i>
				<span><?php echo lang('sprint_new'); ?></span>
			</a>
		</div>
		<article>
		</article>
	</section>

</div>

<?php $this -> load -> view('inicio/footer'); ?>
