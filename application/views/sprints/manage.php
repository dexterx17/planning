
		<div class="acciones">
			<a class="btn btn-redirected" data-content="sprintsillos" href="<?php echo site_url("$controller_name/nuevo/-1/".$proyecto); ?>">
				<i class="fa fa-lg fa-fw fa-plus"></i>
				<span><?php echo lang($controller_name.'_new'); ?></span>
			</a>
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