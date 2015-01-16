
<div class="user-panel box" id="<?php echo $info['id']; ?>">
	<div class="col-md-3 image">
		<img src="<?php echo base_url('uploads/profiles').'/'.$info['imagen']; ?>" alt="<?php echo $info['username']; ?>" class="img-responsive img-thumbnail">
	</div>
	<div class="col-md-9">
			<a class="" href="<?php echo site_url("$controller_name/perfil/".$info['id']); ?> ">
				<i class="fa fa-md fa-fw fa-user"></i> <?php echo $info['first_name'].' '.$info['last_name']; ?>
			</a>	
			<p><i class="fa fa-md fa-fw fa-envelope"></i><?php echo $info['email']; ?></p>
			<p><i class="fa fa-md fa-fw fa-mobile"></i><?php echo $info['phone']; ?></p>
	</div>
</div>