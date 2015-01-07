<div class="acciones">
	<a class="btn btn-embed" href="<?php echo site_url("peoples/nuevo"); ?>">
		<i class="fa fa-lg fa-fw fa-plus"></i>
		<span><?php echo lang($controller_name.'_new'); ?></span>
	</a>
</div>
<article class="master">
    <div class="row">
        <div class="col-lg-8" >
            <div class="box">
                <div class="box-header">
                   <h3 class="box-title">Personas involucradas en el proyecto</h3>
                </div>
                <div class="box-body" id="project-content">
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
         <div class="box">
                <div class="box-header">
                   <h3 class="box-title">Personas registradas</h3>
                </div>
                <div class="box-body" id="people-content">
                     <?php 
                        foreach ($people as $key => $value) {
                            $data['info']=(array)$value;
                            
                            $this -> load -> view('people/dropable',$data);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>


<script type="text/javascript">
$(document).ready(function() {

    $("#people-content").sortable({
        connectWith: "#project-content",
        dropOnEmpty: true,
        update:function(event, ui){
            alert($(this).sortable('toArray'));
           /* $.post('<?php echo site_url("actividades/ordenar"); ?>',
                    {items : $(this).sortable('toArray')},
                    function(data){
                        //Hacer algo 
                    });*/
        }
    });

    $("#project-content").sortable({
        connectWith: "#people-content",
        dropOnEmpty: true,
        update:function(event, ui){
            alert($(this).sortable('toArray'));
           /* $.post('<?php echo site_url("actividades/ordenar"); ?>',
                    {items : $(this).sortable('toArray')},
                    function(data){
                        //Hacer algo 
                    });*/
        }
    });

}); // end document.ready



</script>