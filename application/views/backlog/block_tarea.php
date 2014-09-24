<li id="task-<?php echo $tarea['ID']; ?>">
   <!--Boton de DRAG and DROP-->
    <span class="handle">
        <i class="fa fa-ellipsis-v"></i>
        <i class="fa fa-ellipsis-v"></i>
    </span>
    <!-- Dropdown para Estado de tarea -->
    <?php echo form_dropdown('estado',$estados_tarea,$tarea['estado']); ?>
    <!--Descripcion de la tarea-->
    <span class="text"><?php echo $tarea['nombre']; ?></span>
    <!--Tiempo estimado -->
    <small class="label label-danger"><i class="fa fa-clock-o"></i><?php echo $tarea['tiempo_real']; ?></small>
    <div class="tools">
        <a class="fa fa-edit btn-redirected" data-content="task-<?php echo $tarea['ID'];?>" href='<?php echo site_url("tareas/nuevo/".$tarea['ID']."/".$tarea["actividad"]); ?>'></a>
        <a class="fa fa-trash-o" href="<?php echo site_url("tareas/delete/".$tarea['ID']);?>"></a>
    </div>
</li>