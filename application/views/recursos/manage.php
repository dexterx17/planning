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
            <a class="navbar-brand" href="#"><?php echo lang($controller_name.'_plural'); ?></a>
        </div>
          <div class="collapse navbar-collapse" id="bs-backlog">
                <ul class="nav navbar-nav">
                    <li>
                    	<a class="btn btn-redirected" data-content="registrillos" href="<?php echo site_url("recursos/nuevo/-1/".$proyecto); ?>">
                    		<i class="fa fa-lg fa-fw fa-plus"></i>
                    		<span><?php echo lang($controller_name.'_new'); ?></span>
                    	</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right"  role="form">
                    <div class="form-group totales-recursos" proyecto="<?php echo $proyecto; ?>">
                        <button type="button" class="btn bg-yellow-gradient" tipo="E" data-toggle="tooltip" title="<?php echo lang($controller_name.'_costo'); ?>"><i class="fa fa-arrow-circle-down"></i><span>0</span></button>
                    </div>
                <form>
            </div>
    </div>
</div>
<article class="master">
	<table class="table table-hover" id="recursos-content">
        <thead>
            <tr>
                <th></th>
                <th><?php echo lang('comun_status'); ?></th>
                <th><?php echo lang($controller_name.'_singular'); ?></th>
                <th><?php echo lang('comun_description'); ?></th>
                <th><?php echo lang($controller_name.'_costo'); ?></th>
            </tr>
            <tr id="registrillos">

            </tr>
        </thead>
        <tbody>
    	<?php 
    		foreach ($items as $key => $value) {
    			$data['info']=(array)$value;
    			
    			$this -> load -> view('recursos/block',$data);
    		}
    	?>
        </tbody>
	</table>
</article>


<script type="text/javascript">
$(document).ready(function() {


}); // end document.ready



</script>