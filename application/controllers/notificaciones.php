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

    public function notificar(){
        $regId=array();
        $message = array('msg'=>array(array('COUNT'=>5,'OBJETO'=>'producto','EVENTO'=>'insert'),
                                      array('COUNT'=>2,'OBJETO'=>'cliente','EVENTO'=>'insert'),
                                      array('COUNT'=>2,'OBJETO'=>'cliente','EVENTO'=>'update')));

        switch ($this->user->id) {
            case '1':
                 $regId = array('APA91bEPQ33KoRCj_Wxu0BaxbbgaXoXd6u9dyym-xiw04U5AAw2vryHZP0fUih7AjjIf38XZ9Bu4PX86iLOVUeC95bCdEdNRlAWB37K7MIz-3I3ppP-rhHSp2k1fEhZLWfy65rnzKSza3Cf_t_A9STTXqV-b6qYeMA',
                                'APA91bEJ9sbTsdrhVpkjcd2K-Og0s1nTvSb1LrjLsi3kd03zuU8SzHUfJmSY9Z7kk5rOABDxz4ZlkV5H-0ex8Dyo1H_w2CtGw2R7wTH5lq7naCYNBpncsxK_ra3BM7UE3sMd_hAt50LHyKu1xUdQwK_6Ee3_MU_vbA');
                break;
            case '8':
                //danilo
                 $regId = array('APA91bEPQ33KoRCj_Wxu0BaxbbgaXoXd6u9dyym-xiw04U5AAw2vryHZP0fUih7AjjIf38XZ9Bu4PX86iLOVUeC95bCdEdNRlAWB37K7MIz-3I3ppP-rhHSp2k1fEhZLWfy65rnzKSza3Cf_t_A9STTXqV-b6qYeMA');
                break;
            case '7':
                //jaime
                 $regId = array('APA91bEJ9sbTsdrhVpkjcd2K-Og0s1nTvSb1LrjLsi3kd03zuU8SzHUfJmSY9Z7kk5rOABDxz4ZlkV5H-0ex8Dyo1H_w2CtGw2R7wTH5lq7naCYNBpncsxK_ra3BM7UE3sMd_hAt50LHyKu1xUdQwK_6Ee3_MU_vbA');
                break;
            default:
                # code...
                break;
        }
        echo $this->gcm_user->send_notification($regId, $message);
    }

}