
<div class="callout callout-info" id="<?php echo $info['id']; ?>">
	<div class="row">
		<h3>
			<a class="btn" href="<?php echo site_url("$controller_name/perfil/".$info['id']); ?> "><i class="fa fa-lg fa-fw fa-user"></i></a>
			<?php echo $info['first_name'].' '.$info['last_name']; ?>
		</h3>
		<small><?php echo $info['email']; ?></small>
		<div class="">
				<?php echo $info['phone']. $info['username']; ; ?>
			</div>
	</div>
</div>