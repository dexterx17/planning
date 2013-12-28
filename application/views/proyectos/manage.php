<?php	$this->load->view('inicio/header'); ?>
<?php 
foreach($tabla->css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($tabla->js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

        <div id="body-container">
            <div id="body-content">
			        <section class="nav nav-page">
			        <div class="container">
			            <div class="row">
			                <div class="span7">
			                    <header class="page-header">
			                        <h3><?php echo $this->lang->line($controller_name.'_plural'); ?><br/>
			                            <small><?php echo $this->lang->line($controller_name.'_list').$this->lang->line($controller_name.'_plural')?></small>
			                        </h3>
			                    </header>
			                </div>
			                <div class="page-nav-options">
			                    <div class="span9">
			                        <ul class="nav nav-pills">
			                            <li>
			                                <a href="<?php echo site_url($controller_name) ?>/index/add" title="<?php echo $this->lang->line($controller_name.'_new'); ?>" ><i class="icon-group icon-large"></i></a>
			                            </li>
			                        </ul>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </section>
			    <section class="page container">
		            <div class="row">
		           
						        <div class="box-content box-table">
						        	<?php echo($tabla->output); ?>
				        		</div>
				       	
				    </div>
			    </section>
            </div>
        </div>

                    
        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div>
	<script type="text/javascript">
        $(function(){
            $('table').tablesorter();
            $("[rel=tooltip]").tooltip();
        });
    </script>
    
<?php $this->load->view('inicio/footer'); ?>
