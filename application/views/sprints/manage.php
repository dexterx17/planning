<!-- Main content -->
<section class="content">
	<section class="seccion">
		<div class="acciones">
			<a class="btn btn-embed" href="<?php echo site_url("$controller_name/nuevo/-1/".$proyecto); ?>">
				<i class="fa fa-lg fa-fw fa-plus"></i>
				<span><?php echo lang($controller_name.'_new'); ?></span>
			</a>
		</div>
		<article class="master">
			<div class="row">
				<div class="col-lg-6">
				<?php 
					foreach ($items as $key => $value) {
						$data['info']=(array)$value;
						
						$this -> load -> view('sprints/block',$data);
					}
				?>
				</div>
				<div class="col-lg-6">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><?php echo lang('comun_backlog') ?>
								<small><?php echo lang('comun_backlog_desc'); ?></small>
							</h3>
							<div class="box-tools pull-right">
								<div class="btn-group">
								</div>
							</div>
							
						</div>
						<div class="box-body">
							<ul class="todo-list">
					            <?php 
									foreach ($actividades as $key => $value) {
										 $data['info']=$value;
		                                $this->load->view('backlog/block_actividad',$data);
									}
								?>
				        	</ul>
				        </div>
			        </div>
				</div>
			</div>
		</article>



	</section>
</section>
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
    
    $("div.calendario").each(function(){
    	$item = $(this);
    	$item.datepicker({startDate:$item.attr('startDate'),
    					endDate:$item.attr('endDate'),
    					language:"es"});

    });
}); // end document.ready