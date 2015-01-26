$(document).ready(function() {
	user = $('#usuarsillo').attr('usuario');
	$.ajax({
        url:getBasePath()+'/tareas/get_user_tasks/'+user,
        data: {},
        dataType : 'json',
        cache: false,
        success : function(data){
          var items = data;
          	$('#tareas_pendientes_counter_user').html(items.length);
          	if(items.length>0){
          		$('#tareas_pendientes_title_user').html(items.length+' tareas pendientes');
          	}
			for (var i = 0; i < items.length; i++) {
				var item = items[i];
				$('#tareas_pendientes_user').append(li_task(item));
			};
        }
    });

    function li_task(item){
    	$li = $('<li></li>');
    	$a = $('<a href="#"></a>');
    	$title = $('<h3>'+item.nombre+'</h3>');
    	$tiempo = $('<span class="pull-right"></span>');
    	$testimado = $('<small class="label label-primary" data-toggle="tooltip" title="Tiempo planificado" ><i class="fa fa-clock-o"></i>'+item.tiempo_planificado+'</small>');
    	$treal = $('<small class="label label-info" data-toggle="tooltip" title="Tiempo utilizado" ><i class="fa fa-clock-o"></i>'+item.tiempo_real+'</small>');
    	$tiempo.append($testimado);
    	$tiempo.append($treal);
    	$title.append($tiempo);
    	$a.append($title);
    	$li.append($a);
    	return $li;
    }
});
