<?php $this -> load -> view('inicio/header'); ?>
<div class="contenido">
	<section class="seccion">
		<hgroup>
			<h2><a href="<?php echo site_url("$controller_name/view/".$info['ID']);  ?>"><?php echo $info['nombre']; ?></a></h2>
			<small><?php echo $info['descripcion']; ?></small>
			<div class="menu-sec">
				<ul>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/people"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_personas'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("actividades/index").'/'.$info['ID']; ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_backlog'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("sprints/index").'/'.$info['ID']; ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_sprints'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/burndow"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_burndown'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_kanban'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_impedimentos'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_riesgos'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_wiki'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
							<i class="fa fa-lg fa-fw fa-group"></i>
							<span><?php echo lang('comun_git'); ?></span>
						</a>
					</li>
					<li>
						<a class="btn" href="<?php echo site_url("$controller_name/nuevo"); ?>">
							<i class="fa fa-lg fa-fw fa-calendar"></i>
							<span><?php echo lang('comun_calendario'); ?></span>
						</a>
					</li>
				</ul>
			</div>
		</hgroup>
		<article id="contenido2" class="master">
			<div class="row">
				<div class="col-lg-2">
					<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				</div>
			</div>
		</article>
	</section>
</div>
<script>
$(document).on('click', '.menu-sec a[href!="#"]', function(e) {
	    e.preventDefault();
	    var $this = $(e.currentTarget);
		loadURL($this.attr('href'),$('#contenido2'));
    });
    
	$(function () {
	
    $('#container').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Burndown Sprint'
        },
        subtitle: {
            text: 'Cumplimiento de actividades Vs tiempo'
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: { // don't display the dummy year
                month: '%e. %b',
                year: '%b'
            },
            title: {
                text: 'Date'
            }
        },
        yAxis: {
            title: {
                text: 'Puntos de historia'
            },
            min: 0
        },
        tooltip: {
            headerFormat: '<b>{series.name}</b><br>',
            pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
        },

        series: [{
            name: 'Member Team 1',
            // Define the data points. All series have a dummy year
            // of 1970/71 in order to be compared on the same x axis. Note
            // that in JavaScript, months start at 0 for January, 1 for February etc.
            data: [
                [Date.UTC(1970,  9, 27), 0   ],
                [Date.UTC(1970, 10, 10), 0.6 ],
                [Date.UTC(1970, 10, 18), 0.7 ]
            ]
        }, {
            name: 'Member team 2',
            data: [
                [Date.UTC(1970,  9, 18), 0   ],
                [Date.UTC(1970,  9, 26), 0.2 ],
                [Date.UTC(1970, 11,  1), 0.47]
            ]
        }, {
            name: 'Member team 3',
            data: [
                [Date.UTC(1970,  9,  9), 0   ],
                [Date.UTC(1970,  9, 14), 0.15],
                [Date.UTC(1970, 10, 28), 0.35]
            ]
        }]
    });
});
</script>
<?php $this -> load -> view('inicio/footer'); ?>
