<tr id="item<?php echo $info['ID']; ?>">
	<td>
		<a class="btn btn-redirected" data-content="item<?php echo $info['ID']; ?>" href="<?php echo site_url("presupuestos/nuevo/".$info['ID'].'/'.$info['proyecto']); ?>" data-toggle="tooltip" title="<?php echo lang('presupuestos_edit'); ?>">
    		<i class="fa fa-lg fa-fw fa-edit"></i>
    	</a>
    	<a class="btn btn-delete" data-content="item<?php echo $info['ID']; ?>" href="<?php echo site_url("presupuestos/delete/".$info['ID']); ?>" data-toggle="tooltip" title="<?php echo lang('presupuestos_delete'); ?>">
    		<i class="fa fa-lg fa-fw fa-trash-o"></i>
    	</a>
    </td>
	<td><?php echo $tipos_transacion[$info['tipo']]; ?></td>
	<td><?php echo $info['descripcion']; ?></td>
	<td><?php echo $info['valor']; ?></td>
	<td><?php echo $info['fecha']; ?></td>
</tr>