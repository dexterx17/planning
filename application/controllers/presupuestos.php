<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con el presupuesto de un proyecto
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Presupuestos extends MY_Controller {

	var $data;

	function __construct(){
		parent::__construct();
		$this->data['controller_name']="presupuestos";
		$this->data['tipos_transacion'] = array('I'=>$this->lang->line('presupuestos_ingreso'),'E'=>$this->lang->line('presupuestos_egreso'));
	}

	 /**
     * Muestra una vista con el listado de transacciones monetarias registradas en un proyecto
     * @param integer $proyecto Clave primaria del proyecto a la que pertenece la información
     */
	public function index($proyecto)
	{
		try{
			$this->data['proyecto']=$proyecto;
			$ultimo = $this->input->post('ultimo_id');
			$this->data['items']=$this->presupuesto->get_by_proyecto($proyecto);
			
			$this->load->view('presupuesto/manage',$this->data);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	/**
     * Muestra un row con información de un registro
     * 
     * @param integer $clave Clave primaria de la transacción EJ: 2
     */
    public function get_row($clave=-1)
    {
        try{
            $this->data['info'] = (array) $this->presupuesto->get_info($clave);
            $this->load->view('presupuesto/block',$this->data);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

	 /**
     * Muestra un formulario que permite ingresar y modificar los datos de un ingreso/egreso
     * 
     * @param integer $clave Clave primaria del ingreso/egreso
     * @param integer $proyecto Clave primaria del proyecto a la que pertenece la transacción
     */
    public function nuevo($clave = -1, $proyecto) {
        try {
            $this->data['info'] = (array) $this->presupuesto->get_info($clave);
            $this->data['proyecto'] = $proyecto;
            $this->load->view('presupuesto/form', $this->data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    /**
     * Obtiene y valida los datos del formularios para enviarlos a guardar 
     */
    public function save() {
        try {
            $this->form_validation->set_rules('valor', lang('presupuestos_valor'), 'required|numeric');

            $ID = $this->input->post('ID') == '' ? -1 : $this->input->post('ID');

            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'valor' => $this->input->post('valor'),
                    'descripcion' => $this->input->post('descripcion'),
                    'fecha' => $this->input->post('fecha'),
                    'tipo' => $this->input->post('tipo'),
                    'proyecto' => $this->input->post('proyecto'),
                );

                if ($ID = $this->presupuesto->save($ID, $data)) {
                    echo json_encode(array('error' => false, 'message' => 'TODO BIEN','presupuesto_id'=>$ID));
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
     * Elimina una transacción
     *@param integer $transaccion_id Clave primaria de la actividad
     **/
    public function delete($transaccion_id){
        if($ID= $this->presupuesto->delete($transaccion_id)){
            echo json_encode(array('error'=>false,'message'=>'TODO BIEN','transaccion_id'=>$transaccion_id));
        }else{
            echo json_encode(array('error'=>true,'message'=>'Error al eliminar'));
        }
    }
}
