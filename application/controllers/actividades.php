<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con la pila de producto BACKLOG
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Actividades extends MY_Controller {

    var $data;

    function __construct(){
        parent::__construct();
        $this->data['estados_tarea']=$this->configuracion->get_comboBox('estado_tarea');
        $this->data['controller_name'] = 'actividades';
        $this->data['estados_actividad'] = (array)$this->configuracion->get_comboBox('estado_actividades');
    }
    /**
     * Muestra una vista con el listado de actividades o items del BACKLOG y los botones realizar operaciones CRUD
     * @param integer $proyecto Clave primaria del proyecto
     */
    public function index($proyecto) {
        try {

            $this->data['proyecto'] = $proyecto;
            $ultimo = $this->input->post('ultimo_id');
            $this->data['sprints']=$this->sprint->get_by_proyecto($proyecto);
            if ($ultimo) {
                $nuevos_datos = $this->actividad->get_with_limits($ultimo, $proyecto);
                if ($nuevos_datos) {
                    foreach ($nuevos_datos as $fila) {
                        get_row_people($fila, $this->data['items']);
                    }
                }
            } else {
                $this->data['items'] = $this->actividad->get_with_limits(0, $proyecto);
                $this->load->view('backlog/manage', $this->data);
            }
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /**
     * Muestra un row con información de la actividad
     * 
     * @param integer $clave Clave primaria de la actividad EJ: 2
     */
    public function get_row($clave=-1)
    {
        try{
            $this->data['info'] = (array) $this->actividad->get_full_info($clave);
            $this->data['sprints']=$this->sprint->get_by_proyecto($this->data['info']['proyecto']);
            $this->load->view('backlog/block',$this->data);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    /**
     * Retorna un jsonarray con información de la actividad
     * 
     * @param integer $clave Clave primaria de la actividad EJ: 2
     */
    public function get_detail_row($clave=-1)
    {
        try{
            $this->data['info'] = (array) $this->actividad->get_info($clave);
            $this->data['sprints']=$this->sprint->get_by_proyecto($this->data['info']['proyecto']);
            $this->load->view('backlog/block_detail',$this->data);
            
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    /**
     * Muestra un formulario que permite ingresar y modificar los datos de un proyecto
     * 
     * @param integer $clave Clave primaria de la actividad
     * @param integer $proyecto Clave primaria del proyecto a la que pertenece la actividad
     */
    public function nuevo($clave = -1, $proyecto) {
        try {
            $this->data['info'] = (array) $this->actividad->get_info($clave);
            $sprints=$this->sprint->get_by_proyecto_comboBox($proyecto);
            $sprints[""]="";
            $this->data['sprints']=$sprints;
            $this->data['proyecto'] = $proyecto;
            $this->load->view('backlog/form', $this->data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /**
     * Obtiene y valida los datos del formularios para enviarlos a guardar 
     */
    public function save() {
        try {
            $this->form_validation->set_rules('nombre', lang('comun_name'), 'trim|required');
            //$this->form_validation->set_rules('password',lang('comun_password'),'required|matches[repassword]|md5');
            //$this->form_validation->set_rules('repassword',lang('comun_repassword'),'required');

            $ID = $this->input->post('ID') == '' ? -1 : $this->input->post('ID');

            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'tiempo_planificado' => $this->input->post('tiempo_planificado'),
                    'tiempo_real' => $this->input->post('tiempo_real'),
                    'estado' => $this->input->post('estado'),
                    'proyecto' => $this->input->post('proyecto'),
                    'sprint' => $this->input->post('sprint'),
                );

                if ($ID = $this->actividad->save($ID, $data)) {
                    echo json_encode(array('error' => false, 'message' => 'TODO BIEN','actividad_id'=>$ID));
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
     * Es llamado cuando se cambia de posición un elemento del backlog para que actualize el orden 
     * de la pila de producto
     **/
    public function ordenar(){
        $items = $this->input->post('items');
        $res=array();
        $count=0;

        foreach ($items as $key => $value) {
            if($this->actividad->save(extrar_numeros($value),array('orden'=>$key+1)))
                $count++;
        }
        if($count==count($items))
            echo json_encode(array('error' => false, 'message' => 'TODO BIEN'));
        else 
            echo json_encode(array('error' => true, 'message' => 'Error al guardar'));
    }
    
    /**
     * Es llamado cuando se arrastra un item del backlog hacia un sprint
     **/
    public function asignar_a_sprint(){
        $items = $this->input->post('items');
        $sprint = $this->input->post('sprint');
        $res=array();
        $count=0;
        print_r($items);

        foreach ($items as $key => $value) {
            if($this->actividad->save($value,array('sprint'=>$sprint)))
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