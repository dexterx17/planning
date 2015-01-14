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
            <a class="navbar-brand" href="#"><?php echo lang('comun_sprints'); ?></a>
        </div>
          <div class="collapse navbar-collapse" id="bs-backlog">
                <ul class="nav navbar-nav">
                    <li>
            			<a class="btn btn-redirected" data-content="sprintsillos" href="<?php echo site_url("$controller_name/nuevo/-1/".$proyecto); ?>">
            				<i class="fa fa-lg fa-fw fa-plus"></i>
            				<span><?php echo lang($controller_name.'_new'); ?></span>
            			</a>
                    </li>
                </ul>
                 <form class="navbar-form navbar-right" role="form">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="TAREAS MOSTRADAS">
                    </div>
                  </form>
            </div>
    </div>
</div>
<article class="master">
	<div class="row">
		<div class="col-lg-6">
            <div id="sprintsillos"> </div>
            <div id="sprints-content">
				<?php 
					foreach ($items as $key => $value) {
						$data['info']=(array)$value;
						
						$this -> load -> view('sprints/block',$data);
					}
				?>
            </div>
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
					<ul class="todo-list" id="backlog-content">
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

<script type="text/javascript">
    function inicializar_block_sprints(){
        $(".sprint-backlog").sortable({
        	connectWith:"#backlog-content",
            handle: ".handle",
            helper:'clone',
            update:function(event, ui){
                $.post('<?php echo site_url("actividades/asignar_a_sprint"); ?>',
                        {	sprint:$(this).attr('sprint'),
                        	items : $(this).sortable('toArray')},
                        function(data){
                            //Hacer algo 
                        });
            }
        });
        
        $("#backlog-content").sortable({
            connectWith: ".sprint-backlog",
            handle: ".handle",
            update:function(event, ui){
                $.post('<?php echo site_url("actividades/asignar_a_sprint"); ?>',
                        {	sprint:$(this).attr('sprint'),
                        	items : $(this).sortable('toArray')},
                        function(data){
                            //Hacer algo 
                        });
            }
        });
        
        $("div.calendario").each(function(){
        	$item = $(this);
        	$item.datepicker({startDate:$item.attr('startDate'),
        					endDate:$item.attr('endDate'),
        					language:"es"});

        });

        $("[data-widget='collapse']").click(function() {
            //Find the box parent        
            var box = $(this).parents(".box").first();
            //Find the body and the footer
            var bf = box.find(".box-body, .box-footer");
            if (!box.hasClass("collapsed-box")) {
                box.addClass("collapsed-box");
                //Convert minus into plus
                $(this).children(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
                bf.slideUp();
            } else {
                box.removeClass("collapsed-box");
                //Convert plus into minus
                $(this).children(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
                bf.slideDown();
            }
        });
    }
$(document).ready(function() {
    inicializar_block_sprints();
}); // end document.ready