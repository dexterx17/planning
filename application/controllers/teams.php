<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con los TEAMs de un proyecto
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Teams extends MY_Controller {

    /**
     * Es llamado cuando se arrastra una persona del listado hacia el proyecto
     **/
    public function asignar_a_team(){
        $items = $this->input->post('items');
        $proyecto = $this->input->post('proyecto');
        $res=array();
        $count=0;

        foreach ($items as $key => $value) {
            if($this->team->save(-1,array('proyecto'=>$proyecto,'miembro'=>$value,'fecha_integracion'=>date("Y-m-d H:i:s"))))
                $count++;
        }
        if($count==count($items))
            echo json_encode(array('error' => false, 'message' => 'TODO BIEN'));
        else 
            echo json_encode(array('error' => true, 'message' => 'Error al guardar'));
    }

    /**
     * Es llamado cuando se arrastra una persona del proyecto hacia el listado
     **/
    public function remover_de_team(){
        $items = $this->input->post('items');
        $proyecto = $this->input->post('proyecto');
        $res=array();
        $count=0;

        foreach ($items as $key => $value) {
            if($this->team->delete($proyecto,$value))
                $count++;
        }
        if($count==count($items))
            echo json_encode(array('error' => false, 'message' => 'TODO BIEN'));
        else 
            echo json_encode(array('error' => true, 'message' => 'Error al guardar'));
    }
}
