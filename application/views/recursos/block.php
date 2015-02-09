<tr id="item<?php echo $info['ID']; ?>">
	<td>
		<a class="btn btn-redirected" data-content="item<?php echo $info['ID']; ?>" href="<?php echo site_url("recursos/nuevo/".$info['ID'].'/'.$info['proyecto']); ?>" data-toggle="tooltip" title="<?php echo lang('recursos_edit'); ?>">
    		<i class="fa fa-lg fa-fw fa-edit"></i>
    	</a>
    	<a class="btn btn-delete" data-content="item<?php echo $info['ID']; ?>" href="<?php echo site_url("recursos/delete/".$info['ID']); ?>" data-toggle="tooltip" title="<?php echo lang('recursos_delete'); ?>">
    		<i class="fa fa-lg fa-fw fa-trash-o"></i>
    	</a>
    </td>
	<td><?php echo $tipos_transacion[$info['estado']]; ?></td>
	<td><?php echo $info['recurso']; ?></td>
	<td><?php echo $info['descripcion']; ?></td>
	<td><?php echo $info['costo']; ?></td>
</tr>