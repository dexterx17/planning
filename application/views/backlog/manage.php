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
            <a class="navbar-brand" href="#"><?php echo lang('comun_backlog'); ?></a>
        </div>
          <div class="collapse navbar-collapse" id="bs-backlog">
                <ul class="nav navbar-nav">
                    <li>
                    	<a class="btn btn-redirected" data-content="actividadsillas" href="<?php echo site_url("actividades/nuevo/-1/".$proyecto); ?>">
                    		<i class="fa fa-lg fa-fw fa-plus"></i>
                    		<span><?php echo lang($controller_name.'_new'); ?></span>
                    	</a>
                    </li>
                </ul>
                 <form class="navbar-form navbar-right" role="form">
                    <div class="form-group contador-tareas" proyecto="<?php echo $proyecto; ?>">
                        <button type="button" class="btn bg-green-gradient" status="3" data-toggle="tooltip" title="<?php echo lang('actividades_tasks_done'); ?>" >0</button>
                        <button type="button" class="btn bg-yellow-gradient" status="2" data-toggle="tooltip" title="<?php echo lang('actividades_tasks_doing'); ?>">0</button>
                        <button type="button" class="btn bg-red-gradient" status="1" data-toggle="tooltip" title="<?php echo lang('actividades_tasks_todo'); ?>">0</button>
                    </div>
                  </form>
            </div>
    </div>
</div>
<article class="master">
    <div id="actividadsillas"></div>
	<div class="panel-group" id="backlog-content">
	<?php 
		foreach ($items as $key => $value) {
			$data['info']=(array)$value;
			
			$this -> load -> view('backlog/block',$data);
		}
	?>
	</div>
</article>


<script type="text/javascript">
$(document).ready(function() {

    $("#backlog-content").sortable({
        handle: ".handl",
        update:function(event, ui){
            $.post('<?php echo site_url("actividades/ordenar"); ?>',
                    {items : $(this).sortable('toArray')},
                    function(data){
                        //Hacer algo 
                    });
        }
    });

    $(".todo-list").sortable({
        handle: ".handle",
        update:function(event, ui){
            $.post('<?php echo site_url("tareas/ordenar"); ?>',
                    {items : $(this).sortable('toArray')},
                    function(data){
                        //Hacer algo 
                    });
        }
    });
    $(".todo-list").todolist();

    reload_counter_taks();
    reload_status_actividades([]);

}); // end document.ready



</script>