<?php $this -> load -> view('inicio/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo lang('index_groups_th');?>
        <small><?php echo lang('index_groups_list');?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><?php echo lang('index_groups_th');?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<section class="seccion">

		<div class="acciones">
			<a class="btn btn-redirected" data-content="proyectillos" href="<?php echo site_url('auth/create_group'); ?>" data-toggle="tooltip" title="<?php echo lang('index_create_group_link'); ?>">
				<i class="fa fa-lg fa-fw fa-plus"></i>
				<span><?php echo lang('index_create_group_link'); ?></span>
			</a>
		</div>
		<article class="master">

			<div id="infoMessage"></div>
			<div id="proyectillos"></div>
			<table class="table table-hover table-bordered">
				<tr>
					<th><?php echo lang('index_group_th');?></th>
					<th><?php echo lang('index_grupos_desc_th');?></th>
					<th><?php echo lang('index_action_th');?></th>
				</tr>
				<?php foreach ($grupos as $grupo):?>
					<tr>
			            <td><?php echo htmlspecialchars($grupo['name'],ENT_QUOTES,'UTF-8');?></td>
			            <td><?php echo htmlspecialchars($grupo['description'],ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo anchor("auth/edit_group/".$grupo['id'], htmlspecialchars($grupo['name'],ENT_QUOTES,'UTF-8')) ;?></td>
					</tr>
				<?php endforeach;?>
			</table>
		</article>
	</section>
</section>

<?php $this -> load -> view('inicio/footer'); ?>