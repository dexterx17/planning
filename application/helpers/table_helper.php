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
	$default_row .= '<div class="row control-group">';
	$default_row .= form_label($caption,"$id");
        if(!is_array($opciones)){
            $default_row .= form_input(array(
                                        'name'=>"$id",
                                        'id'=>"$id",
                                        'value'=>$value
                                        ));
        }else{
            $default_row .= form_dropdown("$id",$opciones,$value,'');
        }
	$default_row .= '</div>';
	
	return $default_row;
}

?>