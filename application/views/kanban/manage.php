<div class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-backlog">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo lang('comun_kanban'); ?></a>
        </div>
          <div class="collapse navbar-collapse" id="bs-backlog">
                <ul class="nav navbar-nav">
                    <?php if($this->ion_auth->is_admin()){ ?>
                    <li>
                        <a class="btn btn-redirected" data-content="kanban-configuraciones" href="<?php echo site_url("kanbans/admin/".$proyecto); ?>">
                            <i class="fa fa-lg fa-fw fa-gears"></i>
                            <span><?php echo lang('kanban_personalizar'); ?></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <form class="navbar-form navbar-left" role="form">
                    <div class="form-group">
                        <?php echo form_label(lang('sprints_singular'),"sprint",array('class'=>'control-label')); ?>
                        
                        <?php echo form_dropdown("sprint",$sprints,$sprint,'id="sprint" class="form-control"');?>
                    
                    </div>
                </form>
                 <form class="navbar-form navbar-right" role="form">
                  <div class="form-group" proyecto="<?php echo $proyecto; ?>">
                    <?php 
                         foreach ($people as $key => $value) { 
                            ?>
                            <button type="button" class="btn bg-black backlog-user" data-toggle="tooltip" title="<?php echo $value; ?>" >
                                <?php   echo user_miniblock($key); ?>
                            </button>
                     <?php   }  ?>
                    </div>
                    <span class="form-group" style="width:25px;"></span>
                    <div class="form-group contador-tareas" proyecto="<?php echo $proyecto; ?>" sprint="<?php echo $sprint;?>" >
                        <button type="button" class="btn bg-green-gradient" status="3" data-toggle="tooltip" title="<?php echo lang('actividades_tasks_done'); ?>" >0</button>
                        <button type="button" class="btn bg-yellow-gradient" status="2" data-toggle="tooltip" title="<?php echo lang('actividades_tasks_doing'); ?>">0</button>
                        <button type="button" class="btn bg-red-gradient" status="1" data-toggle="tooltip" title="<?php echo lang('actividades_tasks_todo'); ?>">0</button>
                    </div>
                  </form>
            </div>
    </div>
</div>
<article class="master">
    <div id="kanban-configuraciones"></div>
    <?php if (count($columnas)>0){ ?>
    	<?php $col_width=(int)12/(count($columnas)); ?>
        <div id="tablero-kanban" > 
         <div class="row">
            <?php 
                foreach ($columnas as $key => $value) {
                    $columna=(array)$value;
                    ?>
                    <div class="col-lg-<?php echo $col_width; ?>">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title text-center"><?php echo $columna['nombre']; ?>
                                  <small class="text-muted"><?php echo $columna['descripcion']; ?></small>
                                </h4>
                            </div>
                            <div class="box-body" column="<?php echo $columna['estado']; ?>">

                            </div>
                        </div>
                    </div>
                <?php   }   ?>

            </div>
             <?php 
                if(isset($actividades)){
                    foreach ($actividades as $key => $actividad) {
                        $activ=(array)$actividad;
                        ?>
                        <div class="row">
                             <?php 
                            foreach ($columnas as $key => $value) {
                                $columna=(array)$value;
                                ?>
                                <div class="col-lg-<?php echo $col_width; ?>">
                                    <div class="box" status="<?php echo $activ["estado"] ?>" id="actividad<?php echo $activ['ID']; ?>" >
                                        <div class="box-header">
                                            <h3 class="box-title"><?php echo $activ['nombre']; ?></h3>
                                        </div>
                                        <div class="box-body">
                                            <ul class="todo-list" style="min-height:25px" columna="<?php echo $columna["ID"] ?>" status="<?php echo $columna["estado"] ?>" actividad="<?php echo $activ["ID"] ?>">
                                                 <?php 
                                                     if(isset($activ['tareas'])){
                                                        foreach ($activ['tareas'] as $key => $tarea) {
                                                            $tar=(array)$tarea;
                                                            if($tar['estado']==$columna['estado']){
                                                            ?>
                                                            <li id="task-<?php echo $tar['ID']; ?>" status="<?php echo $tar["estado"] ?>">
                                                            <!--Boton de DRAG and DROP-->
                                                                <span class="handle">
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                </span>
                                                                <?php echo user_miniblock($tarea['responsable']); ?>
                                                                <span class="text"><?php echo $tar['nombre']; ?></span>
                                                             </li>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php   }   ?>

                        </div>
                    <?php    } }}  ?> 
            </div>
        </div>        
</article>


<script type="text/javascript">
$(document).ready(function() {

    $(".todo-list").sortable({
        handle: ".handle",
        connectWith: ".todo-list",
        update:function(event, ui){
            $.post('<?php echo site_url("tareas/asignar_columnas"); ?>',
                    {   columna :$(this).attr('columna'),
                        items : $(this).sortable('toArray'),
                        estado :$(this).attr('status'),
                        actividad : $(this).attr('actividad') },
                    function(data){
                       reload_counter_taks();
                       $(".todo-list").todolist();
                    });
        }
    });

    $('#sprint').change(function(){
        loadURL('<?php echo site_url("kanbans/index")."/".$proyecto; ?>?sprint='+$(this).val(),$('#contenido2'));
    })
    $(".todo-list").todolist();
    reload_counter_taks();
    reload_status_actividades([]);
}); // end document.ready



</script>