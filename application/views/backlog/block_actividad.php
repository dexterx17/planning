
<li class="block_actividad_sprint row" id="<?php echo $info['ID']; ?>">
   <!--Boton de DRAG and DROP-->
    <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
    </span>
    <!-- Dropdown para Estado de Actividad -->
    <?php echo $estados_tarea[$info["estado"]]; ?>
    <!-- # de tareas cumplidas -->
    <small class="label label-success" data-toggle="tooltip" title="Tareas completas"><?php echo $info['done']; ?></small>
    <!-- # de tareas por cumplir -->
    <small class="label label-warning" data-toggle="tooltip" title="Tareas por cumplir"><?php echo $info['todo']; ?></small>
    <!--Descripcion de la actividad-->
    <span class="text"><?php echo $info['nombre']; ?></span>

    <!--Tiempo estimado -->
    <small class="label label-primary pull-right" data-toggle="tooltip" title="<?php echo lang('comun_planned_time'); ?>"><i class="fa fa-clock-o"></i><?php echo $info['tiempo_planificado']; ?></small>
    <!--Tiempo real -->
    <small class="label label-info pull-right" data-toggle="tooltip" title="<?php echo lang('comun_real_time'); ?>"><i class="fa fa-clock-o"></i><?php echo $info['tiempo_real']; ?></small>
   
    <div class="tools">
        <a class="fa fa-edit btn-redirected" data-content="task-<?php echo $info['ID'];?>" href='<?php echo site_url("$controller_name/nuevo/".$info['ID']."/".$info["proyecto"]); ?>'></a>
        <a class="fa fa-trash-o btn-delete" data-content="task-<?php echo $info['ID'];?>" href="<?php echo site_url("$controller_name/delete/".$info['ID']);?>"></a>
    </div>
</li>