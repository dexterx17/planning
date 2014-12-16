
<li class="block_actividad_sprint row" id="<?php echo $info['ID']; ?>">
   <!--Boton de DRAG and DROP-->
    <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
    </span>
    <!-- Dropdown para Estado de Actividad -->
    <?php echo $estados_tarea[$info["estado"]]; ?>
    <!--Descripcion de la actividad-->
    <span class="text"><?php echo $info['nombre']; ?></span>
    <!--Tiempo estimado -->
    <small class="label label-danger"><i class="fa fa-clock-o"></i><?php echo $info['tiempo_planificado']; ?></small>
    <!--Tiempo real -->
    <small class="label label-info"><i class="fa fa-clock-o"></i><?php echo $info['tiempo_real']; ?></small>
   
    <div class="tools">
        <a class="fa fa-edit btn-redirected" data-content="task-<?php echo $info['ID'];?>" href='<?php echo site_url("$controller_name/nuevo/".$info['ID']."/".$info["proyecto"]); ?>'></a>
        <a class="fa fa-trash-o btn-delete" data-content="task-<?php echo $info['ID'];?>" href="<?php echo site_url("$controller_name/delete/".$info['ID']);?>"></a>
    </div>
</li>