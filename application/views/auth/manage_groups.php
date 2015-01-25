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
<div class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-backlog">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo lang('index_groups_th'); ?></a>
        </div>
          <div class="collapse navbar-collapse" id="bs-backlog">
                <ul class="nav navbar-nav">
                    <li>
						<a class="btn btn-redirected" data-content="grupillo" href="<?php echo site_url('auth/create_group'); ?>" data-toggle="tooltip" title="<?php echo lang('index_create_group_link'); ?>">
							<i class="fa fa-lg fa-fw fa-plus"></i>
							<span><?php echo lang('index_create_group_link'); ?></span>
						</a>
					 </li>
                </ul>
            </div>
    </div>
</div>
		<article class="master">

			<div id="infoMessage"></div>
			<table class="table table-hover table-bordered" id="grupos-content">
				<thead>
					<tr>
						<th><?php echo lang('index_group_th');?></th>
						<th><?php echo lang('index_grupos_desc_th');?></th>
						<th><?php echo lang('index_action_th');?></th>
					</tr>
				</thead>
				<tbody>
					<tr id="grupillo" ></tr>
				<?php foreach ($grupos as $grupo):?>
					<tr id="grupo<?php echo $grupo['id']; ?>">
			            <td><?php echo htmlspecialchars($grupo['name'],ENT_QUOTES,'UTF-8');?></td>
			            <td><?php echo htmlspecialchars($grupo['description'],ENT_QUOTES,'UTF-8');?></td>
						<td><?php echo anchor("auth/edit_group/".$grupo['id'], '<i class="fa fa-lg fa-fw fa-edit"></i>',array('class'=>'btn btn-redirected','data-content'=>'grupo'.$grupo['id'],'data-toggle'=>'tooltip', 'title'=> lang('comun_edit'). ' '. htmlspecialchars($grupo['name'],ENT_QUOTES,'UTF-8'))) ;?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</article>
	</section>
</section>

<?php $this -> load -> view('inicio/footer'); ?>