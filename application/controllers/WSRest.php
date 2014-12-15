<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once(APPPATH.'libraries/REST_Controller.php');
/**
 * Permite realizar operaciones de mantenimiento con la pila de producto BACKLOG
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class WSRest extends REST_Controller {

    /**
     * Respond con información de las actividades
     **/
    function actividades_get(){
        if(!$this->get('proyecto'))
        {
            $this->response(NULL,400);
        }

        $actividades = $this->actividad->get_by_proyecto($this->get('proyecto'));

        if($actividades){
            $this->response($actividades,200);
        }else{
            $this->response(NULL,404);
        }
    }

    /**
     * Respond con información de las actividades
     **/
    function actividad_get(){

        if(!$this->get('id'))
        {
            $this->response(NULL,400);
        }

        $actividad = $this->actividad->get_info($this->get('id'));

        if($actividad){
            $this->response($actividad,200);
        }else{
            $this->response(NULL,404);
        }
    }
    /**
     * Crea una nueva actividad y responde con status/error
     **/
    function actividad_post(){

        $ID = $this->post('id')?$this->post('id'):-1;

        $data = array(
            'nombre' => $this->post('nombre'),
            'descripcion' => $this->post('descripcion'),
            'tiempo_planificado' => $this->post('tiempo_planificado'),
            'tiempo_real' => $this->post('tiempo_real'),
            'estado' => $this->post('estado'),
            'proyecto' => $this->post('proyecto')
        );

        if ($this->actividad->save($ID, $data)) {
            $this->response(array('error' => false, 'message' => 'TODO BIEN'));
        } else {
            $this->response(array('error' => true, 'message' => 'Error al guardar'));
        }


    }

    /**
     * Actualiza una actividad y responde con status/error
     **/
    function actividad_put(){
         $ID = $this->post('id') ;

        $data = array(
            'nombre' => $this->post('nombre'),
            'descripcion' => $this->post('descripcion'),
            'tiempo_planificado' => $this->post('tiempo_planificado'),
            'tiempo_real' => $this->post('tiempo_real'),
            'estado' => $this->post('estado'),
            'proyecto' => $this->post('proyecto')
        );

        if ($this->actividad->save($ID, $data)) {
            $this->response(array('error' => false, 'message' => 'TODO BIEN'));
        } else {
            $this->response(array('error' => true, 'message' => 'Error al guardar'));
        }
    }

    /**
     * Elimina un actividad y responde con status/error
     **/
    function actividades_delete(){

    }
}