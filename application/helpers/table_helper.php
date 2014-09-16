<?php

function get_default_table() {
		
	$default_table = array (
                    'table_open'          => '<table class="table table-hover tablesorter">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

	return $default_table;
}

function get_row_form($caption,$id,$value) {
	
	$default_row = '';
	$default_row .= '<div class="row control-group">';
	$default_row .= form_label($caption,"$id");
	$default_row .= form_input(array(
										'name'=>"$id",
										'id'=>"$id",
										'value'=>$value
										));
	$default_row .= '</div>';
	
	return $default_row;
}


function get_li_todo_list($caption,$tarea) {
	
	$default_row = '';
	$default_row .= '<li>';
	//Boton de DRAG and DROP
	$default_row .= ' <span class="handle">
	                  <i class="fa fa-ellipsis-v"></i>
	                  <i class="fa fa-ellipsis-v"></i>
	                  </span>';
	//Checkbox para marcar uno o varios
	$default_row .= form_checkbox($caption,$tarea['ID']);
	//Descripcion de la tarea
	$default_row .= '<span class="text">'.$tarea['nombre'].'</span>';
	//Tiempo estimado				  
	$default_row .= '<small class="label label-danger"><i class="fa fa-clock-o"></i>'.$tarea['tiempo_real'].'</small>';
	$default_row .= '<div class="tools">
	                    <a class="fa fa-edit btn-redirected" data-content="tareillas'.$tarea['actividad'].'" href="'.site_url("tareas/nuevo/".$tarea['ID'].'/'.$tarea['actividad']).'"></a>
	                    <a class="fa fa-trash-o" href="'.site_url("tareas/delete/".$tarea['ID']).'"></a>
	                </div>';

	$default_row .= '</li>';
	
	return $default_row;
}

?>