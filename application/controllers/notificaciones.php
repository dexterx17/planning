<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento  con las notificaciones
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Notificaciones extends MY_Controller {

    var $data;

    function __construct(){
        parent::__construct();
        $this->data['controller_name'] = 'notificaciones';
    }

    /**
     * Muestra una vista con el listado de usuarios GCM
     */
    public function index() {
        try{
            $this->data['usuarios']=$this->gcm_user->get_all();
            $this->load->view('chat/notificaciones', $this->data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

     /**
     * Obtiene y valida los datos del formularios para enviarlos a guardar 
     */
    public function save() {
        try {
            $this->form_validation->set_rules('regId', 'RedID', 'trim|required');
            $this->form_validation->set_rules('message', 'Mensaje', 'trim|required');


            if ($this->form_validation->run() == TRUE) {

                $regId = $this->input->post('regId');
                $message = $this->input->post('message');

                if(!is_array($regId)){
                    $regId=array($regId);
                }

                if ($ID = $this->gcm_user->send_notification($regId, $message)) {
                    echo json_encode(array('error' => false, 'message' => 'TODO BIEN con la notificacion'));
                } else {
                    echo json_encode(array('error' => true, 'message' => 'Error al enviar notificacion'));
                }
            } else {
                $error = validation_errors();
                echo json_encode(array('error' => true, 'message' => "$error"));
            }
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }


}