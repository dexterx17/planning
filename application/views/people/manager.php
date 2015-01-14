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
            <a class="navbar-brand" href="#"><?php echo lang('comun_personas'); ?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-backlog">
            <ul class="nav navbar-nav">
                <li>
                	<a class="btn btn-embed" href="<?php echo site_url("auth/create_user"); ?>">
                		<i class="fa fa-lg fa-fw fa-plus"></i>
                		<span><?php echo lang($controller_name.'_new'); ?></span>
                	</a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="PERSONAS">
                </div>
            </form>
        </div>
    </div>
</div>

<article class="master">
    <div class="row">
        <div class="col-lg-8" >
            <div class="box">
                <div class="box-header">
                   <h3 class="box-title">Personas involucradas en el proyecto</h3>
                </div>
                <div class="box-body" id="project-content">
                    <?php 
                        foreach ($team as $key => $value) {

                            $data['info']=(array)$value;
                            
                            $this -> load -> view('people/dropable',$data);
                        }
                    ?>
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
          //  alert($(this).sortable('toArray'));
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
            $.post('<?php echo site_url("teams/asignar_a_team"); ?>',
                    {   proyecto : '<?php echo $proyecto; ?>',
                        items : $(this).sortable('toArray')},
                    function(data){
                        //Hacer algo 
                    });
        }
    });

}); // end document.ready



</script>