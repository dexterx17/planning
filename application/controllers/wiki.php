<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento en la WIKI
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Wiki extends MY_Controller {

    var $data;

    function __construct(){
        parent::__construct();
        $this->data['controller_name'] = 'wiki';
        $this->lang->load('wiki');  
    }
    /**
     * Muestra una vista con el listado de páginas de WIKI almacenadas
     * @param integer $proyecto Clave primaria del proyecto
     */
    public function index($proyecto) {
        try {

            $this->data['proyecto'] = $proyecto;
            $ultimo = $this->input->post('ultimo_id');

            $this->data['items'] = $this->wik->get_with_limits(0, $proyecto);
            $this->load->view('wiki/manage', $this->data);

        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /**
     * Muestra un row con información de la una fila
     * 
     * @param integer $clave Clave primaria de la página EJ: 2
     */
    public function get_row($clave=-1)
    {
        try{
            $this->data['info'] = (array) $this->wik->get_info($clave);
            $this->load->view('wiki/block',$this->data);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    /**
     * Muestra un formulario que permite ingresar y modificar los datos de una página de la wiki
     * 
     * @param integer $clave Clave primaria de la página
     * @param integer $proyecto Clave primaria del proyecto a la que pertenece la wiki
     */
    public function nuevo($clave = -1, $proyecto) {
        try {
            $this->data['info'] = (array) $this->wik->get_info($clave);
            $this->data['proyecto'] = $proyecto;
            $this->load->view('wiki/form', $this->data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /**
     * Obtiene y valida los datos del formularios para enviarlos a guardar 
     */
    public function save() {
        try {
            $this->form_validation->set_rules('titulo', lang('comun_titulo'), 'trim|required');

            $ID = $this->input->post('ID') == '' ? -1 : $this->input->post('ID');

            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'titulo' => $this->input->post('titulo'),
                    'contenido' => $this->input->post('contenido'),
                    'fecha' => date('Y-m-d H:i:s'),
                );
                if($this->input->post('proyecto')!=""){
                    $data['proyecto'] = $this->input->post('proyecto');
                }

                if($ID==-1){
                    $data['creador']=$this->user->id;
                }

                if ($ID = $this->wik->save($ID, $data)) {
                    echo json_encode(array('error' => false, 'message' => 'TODO BIEN','wiki_id'=>$ID));
                } else {
                    echo json_encode(array('error' => true, 'message' => 'Error al guardar'));
                }
            } else {
                $error = validation_errors();
                echo json_encode(array('error' => true, 'message' => "$error"));
            }
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /**
     * Es llamado cuando se cambia de posición un elemento del wiki para que actualize el orden 
     * de la pila de producto
     **/
    public function ordenar(){
        $items = $this->input->post('items');
        $res=array();
        $count=0;

        foreach ($items as $key => $value) {
            if($this->wik->save(extrar_numeros($value),array('orden'=>$key+1)))
                $count++;
        }
        if($count==count($items))
            echo json_encode(array('error' => false, 'message' => 'TODO BIEN'));
        else 
            echo json_encode(array('error' => true, 'message' => 'Error al guardar'));
    }

    /**
     * Elimina una actividad 
     *@param integer $actividad_id Clave primaria de la actividad
     **/
    public function delete($actividad_id){
        if($ID= $this->actividad->delete($actividad_id)){
            echo json_encode(array('error'=>false,'message'=>'TODO BIEN','actividad_id'=>$actividad_id));
        }else{
            echo json_encode(array('error'=>true,'message'=>'Error al eliminar'));
        }
    }
}