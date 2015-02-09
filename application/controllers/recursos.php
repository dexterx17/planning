<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con los recursos de un proyecto
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Recursos extends MY_Controller {

	var $data;

	function __construct(){
		parent::__construct();
		$this->data['controller_name']="recursos";
		$this->data['tipos_transacion'] = $this->configuracion->get_comboBox('estado_tarea');
	}

	 /**
     * Muestra una vista con el listado de los recursos asignados a un proyecto
     * @param integer $proyecto Clave primaria del proyecto a la que pertenece la información
     */
	public function index($proyecto)
	{
		try{
			$this->data['proyecto']=$proyecto;
			$ultimo = $this->input->post('ultimo_id');
			$this->data['items']=$this->recurso->get_by_proyecto($proyecto);
			
			$this->load->view('recursos/manage',$this->data);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	/**
     * Muestra un row con información de un registro
     * 
     * @param integer $clave Clave primaria del recurso EJ: 2
     */
    public function get_row($clave=-1)
    {
        try{
            $this->data['info'] = (array) $this->recurso->get_info($clave);
            $this->load->view('recursos/block',$this->data);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

	 /**
     * Muestra un formulario que permite ingresar y modificar los datos de un recurso
     * 
     * @param integer $clave Clave primaria del recurso
     * @param integer $proyecto Clave primaria del proyecto a la que pertenece el recurso
     */
    public function nuevo($clave = -1, $proyecto) {
        try {
            $this->data['info'] = (array) $this->recurso->get_info($clave);
            $this->data['proyecto'] = $proyecto;
            $this->load->view('recursos/form', $this->data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /**
     * Obtiene y valida los datos del formularios para enviarlos a guardar 
     */
    public function save() {
        try {
            $this->form_validation->set_rules('recurso', lang('recursos_singular'), 'required');

            $ID = $this->input->post('ID') == '' ? -1 : $this->input->post('ID');

            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'recurso' => $this->input->post('recurso'),
                    'descripcion' => $this->input->post('descripcion'),
                    'fecha' => date('Y-m-d H:i:s'),
                    'estado' => $this->input->post('estado'),
                    'costo' => $this->input->post('costo'),
                    'proyecto' => $this->input->post('proyecto'),
                );

                if ($ID = $this->recurso->save($ID, $data)) {
                    echo json_encode(array('error' => false, 'message' => 'TODO BIEN','recurso_id'=>$ID));
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
     * Elimina un recurso
     *@param integer $recurso_id Clave primaria del recurso
     **/
    public function delete($recurso_id){
        if($ID= $this->recurso->delete($recurso_id)){
            echo json_encode(array('error'=>false,'message'=>'TODO BIEN','recurso_id'=>$recurso_id));
        }else{
            echo json_encode(array('error'=>true,'message'=>'Error al eliminar'));
        }
    }
}
