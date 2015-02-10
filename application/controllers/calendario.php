<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento en el calendario de eventos
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Calendario extends MY_Controller {

    /**
     * Muestra una vista con el listado de actividades o items del BACKLOG y los botones realizar operaciones CRUD
     * @param integer $proyecto Clave primaria del proyecto
     */
    public function index() {
        try {

            $data['controller_name'] = 'calendario';

            $this->load->view('calendario/calendario', $data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
}