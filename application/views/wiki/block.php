<tr id="wiki<?php echo $info['ID']; ?>">
	<td>
		<a class="btn btn-redirected" data-content="wiki<?php echo $info['ID']; ?>" href="<?php echo site_url("wiki/nuevo/".$info['ID'].'/'.$info['proyecto']); ?>" data-toggle="tooltip" title="<?php echo lang('wiki_edit_page'); ?>">
    		<i class="fa fa-lg fa-fw fa-edit"></i>
    	</a>
    	<a class="btn btn-delete" data-content="wiki<?php echo $info['ID']; ?>" href="<?php echo site_url("wiki/delete/".$info['ID']); ?>" data-toggle="tooltip" title="<?php echo lang('wiki_delete_page'); ?>">
    		<i class="fa fa-lg fa-fw fa-trash-o"></i>
    	</a>
	</td>
	<td><?php echo $info['titulo']; ?></td>
	<td><?php echo user_miniblock($info['creador']); ?></td>
	<td><?php echo $info['fecha']; ?></td>
</tr>