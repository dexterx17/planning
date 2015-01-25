<tr id="grupo<?php echo $grupo['id']; ?>">
    <td><?php echo htmlspecialchars($grupo['name'],ENT_QUOTES,'UTF-8');?></td>
    <td><?php echo htmlspecialchars($grupo['description'],ENT_QUOTES,'UTF-8');?></td>
	<td><?php echo anchor("auth/edit_group/".$grupo['id'], '<i class="fa fa-lg fa-fw fa-edit"></i>',array('class'=>'btn btn-redirected','data-content'=>'grupo'.$grupo['id'],'data-toggle'=>'tooltip', 'title'=> lang('comun_edit'). ' '. htmlspecialchars($grupo['name'],ENT_QUOTES,'UTF-8'))) ;?></td>
</tr>