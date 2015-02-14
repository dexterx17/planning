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
                    	<a class="btn btn-redirected" data-content="registrillos" href="<?php echo site_url("wiki/nuevo/-1/".$proyecto); ?>">
                    		<i class="fa fa-lg fa-fw fa-plus"></i>
                    		<span><?php echo lang($controller_name.'_new'); ?></span>
                    	</a>
                    </li>
                </ul>
            </div>
    </div>
</div>
<article class="master">
	<table class="table table-hover" id="wiki-content">
        <thead>
            <tr>
                <th width="5%"></th>
                <th width="55%"><?php echo lang($controller_name.'_titulo'); ?></th>
                <th width="30%"><?php echo lang($controller_name.'_creador'); ?></th>
                <th width="10%"><?php echo lang($controller_name.'_fecha'); ?></th>
            </tr>
            <tr id="registrillos">

            </tr>
        </thead>
        <tbody class="tabla-wiki">
    	<?php 
    		foreach ($items as $key => $value) {
    			$data['info']=(array)$value;
    			
    			$this -> load -> view('wiki/block',$data);
    		}
    	?>
        </tbody>
	</table>
</article>


<script type="text/javascript">
$(document).ready(function() {


}); // end document.ready



</script>