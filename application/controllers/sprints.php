<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con los SPRINTS de un proyecto
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Sprints extends MY_Controller {

	var $data;

	function __construct(){
		parent::__construct();
		$this->data['controller_name']="sprints";
	}

	 /**
     * Muestra una vista con el listado de sprints de un proyecto y los botones realizar operaciones CRUD
     * @param integer $proyecto Clave primaria del proyecto a los que pertenecen los sprints
     */
	public function index($proyecto)
	{
		try{
			$this->data['proyecto']=$proyecto;
			$ultimo = $this->input->post('ultimo_id');
			$this->data['estados_tarea'] = $this->configuracion->get_comboBox('estado_tarea');
			$this->data['actividades']= $this->actividad->get_by_proyecto_sin_sprint($proyecto);

			if($ultimo)
			{
	            $nuevos_datos = $this->sprint->get_with_limits($ultimo,$proyecto);
	            if($nuevos_datos){      
		            foreach ($nuevos_datos as $fila) {
		            		$fila['actividades']=$this->actividad->get_by_sprint($fila['ID']);
		            		get_row_sprint($fila,$this->data['items']);
			            }
			         }
	      }	else{
			$this->data['items']=$this->sprint->get_with_limits(0,$proyecto);
			$this->load->view('sprints/manage',$this->data);
		  }
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

    /**
     * Muestra un row con información del sprint
     * 
     * @param integer $clave Clave primaria del sprint EJ: 2
     */
    public function get_row($clave=-1)
    {
        try{
            $this->data['info'] = (array) $this->sprint->get_full_info($clave);
            $this->load->view('sprints/block',$this->data);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    /**
     * Retorna un bloque html con información del sprint
     * 
     * @param integer $clave Clave primaria del sprint EJ: 2
     */
    public function get_detail_row($clave=-1)
    {
        try{
            $this->data['info'] = (array) $this->sprint->get_info($clave);
            $this->load->view('sprints/block_detail',$this->data);
            
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

	/**
	 * Muestra la vista principal de un sprint
	 * 
	 * @param integer $sprint_id Clave primaria del sprint
	 **/
	function view($sprint_id){
		$this->data['info']=(array)$this->sprint->get_info($sprint_id);
		$this->load->view('sprints/view',$this->data);
	}
	/**
	 * Ok
	 * 
	 * @ignore
	 **/
	function test(){
		return anchor('#','Test');
	}
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de un sprint
	 * 
	 * @param integer $clave Clave primaria del Sprint
	 * @param integer $proyecto Clave primaria del Proyecto
	 */
	public function nuevo($clave=-1,$proyecto)
	{
		try{
			$this->data['info']=(array)$this->sprint->get_info($clave);
			$this->data['proyecto']=$proyecto;
			$this->load->view('sprints/form',$this->data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	/**
	* Obtiene y valida los datos del formularios para enviarlos a guardar 
	*/
	public function save()
	{
		try{
			$this->form_validation->set_rules('objetivo',lang('comun_objetive'),'trim|required');
			//$this->form_validation->set_rules('password',lang('comun_password'),'required|matches[repassword]|md5');
			//$this->form_validation->set_rules('repassword',lang('comun_repassword'),'required');
			
			$ID = $this->input->post('ID')==''? -1 :$this->input->post('ID');
		
			if($this->form_validation->run()==TRUE){
				
				$data=array(
					'objetivo'=>$this->input->post('objetivo'),
					'fecha_inicio'=>$this->input->post('fecha_inicio'),
					'fecha_fin'=>$this->input->post('fecha_fin'),
					'horas_planificadas'=>$this->input->post('horas_planificadas'),
					'porcentaje_valido'=>$this->input->post('porcentaje_valido'),
					'proyecto'=>$this->input->post('proyecto')
					);
					
				if($ID = $this->sprint->save($ID,$data)){
					echo json_encode(array('error'=>false,'message'=>'TODO BIEN','sprint_id'=>$ID));
				}else{
					echo json_encode(array('error'=>true,'message'=>'Error al guardar'));
				}				
				
			}else{
				$error = validation_errors();
				echo json_encode(array('error'=>true,'message'=> "$error" ) );
			}
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	/**
     * Elimina una sprint 
     *@param integer $sprint_id Clave primaria de la sprint
     **/
    public function delete($sprint_id){
        if($ID= $this->sprint->delete($sprint_id)){
            echo json_encode(array('error'=>false,'message'=>'TODO BIEN','sprint_id'=>$sprint_id));
        }else{
            echo json_encode(array('error'=>true,'message'=>'Error al eliminar'));
        }
    }
}
