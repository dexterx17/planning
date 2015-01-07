
<div class="callout callout-info" id="<?php echo $info['ID']; ?>">
	<div class="row">
		<h3>
			<a class="btn" href="<?php echo site_url("$controller_name/perfil/".$info['ID']); ?> "><i class="fa fa-lg fa-fw fa-user"></i></a>
			<?php echo $info['nombres'].' '.$info['apellidos']; ?>
		</h3>
		<small><?php echo $info['email']; ?></small>
		<div class="">
				<?php echo $info['telefono']. $info['nick']; ; ?>
			</div>
	</div>
</div>