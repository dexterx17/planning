<?php

/**
 * Devuelve una estructura HTML con una tabla
 * @return string Bloque HTML
 **/
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

/**
 * Devuelve un row con un input creado con los parametros recibidos
 * 
 * @param string $caption Label que figura
 * @param string $id ID que se le dara al input
 * @param string $value Valor que tiene el input
 * @param array $opciones Array con opciones para un combobox
 **/
function get_row_form($caption,$id,$value,$opciones="") {
	
	$default_row = '';
	$default_row .= '<div class="form-group">';
	$default_row .= form_label($caption,"$id",array('class'=>'control-label col-sm-2'));
    $default_row .= '<div class="col-sm-10">';
        if(!is_array($opciones)){
            $default_row .= form_input(array(
                                        'name'=>"$id",
                                        'id'=>"$id",
                                        'value'=>$value,
                                        'class'=>'form-control',
                                        'placeholder'=>$caption
                                        ));
        }else{
            $default_row .= form_dropdown("$id",$opciones,$value,'');
        }
    $default_row .= '</div>';    
	$default_row .= '</div>';
	
	return $default_row;
}

/**
 * Retorna un array con los proyectos 
 **/
function get_proyectos(){
    $CI =& get_instance();
    return $CI->proyecto->get_with_limits(0);
}

/**
 * Retorn el número de actividades que tiene un proyecto
 *@param integer $proyecto_id Clave primaria del proyecto
 **/
function get_count_actividades($proyecto_id){
    $CI =& get_instance();
    return $CI->actividad->get_count_by_proyecto($proyecto_id);
}

/**
 * Devuelve solos los digitos de una cadena
 * TODO: optimizar
 *@param string Cadena de texto de la que se quiere obtener un digito
 **/
function extrar_numeros($cadena){
    $resultado="";
    for ($i=0; $i < strlen($cadena); $i++) { 
        if(is_numeric($cadena[$i]))
            $resultado.=$cadena[$i];
    }
    return $resultado;
}

?>