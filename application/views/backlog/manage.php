<div class="acciones">
	<a class="btn btn-redirected" data-content="actividadsillas" href="<?php echo site_url("actividades/nuevo/-1/".$proyecto); ?>">
		<i class="fa fa-lg fa-fw fa-plus"></i>
		<span><?php echo lang($controller_name.'_new'); ?></span>
	</a>
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
}); // end document.ready



</script>