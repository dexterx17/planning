<tr id="wiki<?php echo $info['ID']; ?>">
	<td>
		<a class="btn btn-redirected" data-content="wiki<?php echo $info['ID']; ?>" href="<?php echo site_url("wiki/nuevo/".$info['ID'].'/'.$info['proyecto']); ?>">
    		<i class="fa fa-lg fa-fw fa-edit"></i>
    	</a>
	</td>
	<td><?php echo $info['titulo']; ?></td>
	<td><?php echo user_miniblock($info['creador']); ?></td>
	<td><?php echo $info['fecha']; ?></td>
</tr>