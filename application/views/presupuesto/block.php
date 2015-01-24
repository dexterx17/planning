<tr id="item<?php echo $info['ID']; ?>">
	<td>
		<a class="btn btn-redirected" data-content="item<?php echo $info['ID']; ?>" href="<?php echo site_url("presupuestos/nuevo/".$info['ID'].'/'.$info['proyecto']); ?>">
    		<i class="fa fa-lg fa-fw fa-edit"></i>
    	</a>
    </td>
	<td><?php echo $tipos_transacion[$info['tipo']]; ?></td>
	<td><?php echo $info['descripcion']; ?></td>
	<td><?php echo $info['valor']; ?></td>
	<td><?php echo $info['fecha']; ?></td>
</tr>