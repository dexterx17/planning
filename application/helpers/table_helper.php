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
										));
	$default_row .= '</div>';
	
	return $default_row;
}

?>