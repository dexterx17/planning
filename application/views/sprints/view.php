<div class="contenido">
	<section class="seccion">
		<hgroup>
			<h2><a href="<?php echo site_url("$controller_name/view/".$info['ID']);  ?>"><?php echo $info['objetivo']; ?></a></h2>
			<small><?php echo $info['objetivo']; ?></small>
			<div class="menu-sec">
				<ul>
					<li>
						<a class="btn" href="<?php echo site_url("actividades/index").'/'.$info['ID']; ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_sprint_backlog'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/people"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_personas'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/burndow"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_burndown'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_kanban'); ?></span>
						</a>
					</li>
				</ul>
			</div>
		</hgroup>
		<article id="contenido2" class="master">
			<div class="row">
				<div class="col-lg-2">
					<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				</div>
			</div>
		</article>
	</section>
</div>