<tr id="columna<?php echo $info['ID']; ?>">
	<td>
		<a class="btn btn-redirected" data-content="columna<?php echo $info['ID']; ?>" href="<?php echo site_url("kanbans/new_column/".$info['ID'].'/'.$info['proyecto']); ?>">
    		<i class="fa fa-lg fa-fw fa-edit"></i>
    	</a>
	</td>
	<td>
		<?php echo $info['nombre']; ?>
		<small><?php echo $info['descripcion']; ?></small>
	</td>
	<td>
		<?php echo $estados_tarea[$info['estado']]; ?>
	</td>
</tr>