<div class="acciones">
	<a class="btn btn-embed" href="<?php echo site_url("$controller_name/nuevo/-1/".$proyecto); ?>">
		<i class="fa fa-lg fa-fw fa-plus"></i>
		<span><?php echo lang($controller_name.'_new'); ?></span>
	</a>
</div>
<article class="master">
<!--	<?php echo form_input(array(
								'type'=>'button',
								'name'=>'lol',
								'id'=>'lol',
								'value'=>'LOL',
								'class'=>'btn'
								));	?>
-->
	<div class="panel-group" id="accordion">
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

    //jQuery UI sortable for the todo list
    $(".todo-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();
    
        //jQuery UI sortable for the todo list
    $(".block_actividad").sortable({
        placeholder: "sort-highlight",
        connectWith: ".block_actividad",
        handle: ".handl",
        forcePlaceholderSize: true,
        zIndex: 999978
    }).disableSelection();
    ;
}); // end document.ready



</script>