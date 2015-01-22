<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con el tablero KANBAN de un proyecto
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Kanbans extends MY_Controller {

	var $data;

	function __construct(){
		parent::__construct();
		$this->data['controller_name']="kanbans";
		$this->data['estados_tarea'] = $this->configuracion->get_comboBox('estado_tarea');
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
			$this->data['sprints']=$this->sprint->get_by_proyecto_comboBox($proyecto);
			
			$sprint=$this->input->get('sprint');

			if($sprint){
				$this->data['actividades']= $this->actividad->get_full_by_sprint($sprint);
				$this->data['sprint']=$sprint;
			}else{
				//Valor por defecto para combobox
				foreach ($this->data['sprints'] as $key => $value) {
					$this->data['sprint']=$key;
				}
				$this->data['actividades']= $this->actividad->get_full_by_sprint($this->data['sprint']);
			}


			$this->data['columnas']=$this->columna->get_by_proyecto($proyecto);
			$this->load->view('kanban/manage',$this->data);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}



    /**
     * Muestra un row con información del sprint
     * 
     * @param integer $clave Clave primaria del sprint EJ: 2
     */
    public function get_column_row($clave=-1)
    {
        try{
            $this->data['info'] = (array) $this->columna->get_info($clave);
            $this->load->view('kanban/column_tr',$this->data);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de un sprint
	 * 
	 * @param integer $proyecto Clave primaria del Proyecto
	 */
	public function admin($proyecto)
	{
		try{
			$this->data['info']=(array)$this->proyecto->get_info($proyecto);
			$this->data['proyecto']=$proyecto;
			$this->data['items'] =(array)$this->columna->get_by_proyecto($proyecto);
			$this->load->view('kanban/manager',$this->data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	 /**
     * Muestra un formulario que permite ingresar y modificar los datos de una columna del tablero
     * 
     * @param integer $clave Clave primaria de la columna
     * @param integer $proyecto Clave primaria del proyecto a la que pertenece la columna
     */
	public function new_column($clave = -1,$proyecto)
	{
		try{
			$this->data['info']=(array)$this->columna->get_info($clave);
			$this->data['proyecto']=$proyecto;
			$this->load->view('kanban/column_form',$this->data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	/**
	* Obtiene y valida los datos del formularios para enviarlos a guardar 
	*/
	public function save_column()
	{
		try{
			$this->form_validation->set_rules('nombre',lang('comun_nombre'),'trim|required');
			
			$ID = $this->input->post('ID')==''? -1 :$this->input->post('ID');
		
			if($this->form_validation->run()==TRUE){
				
				$data=array(
					'nombre'=>$this->input->post('nombre'),
					'descripcion'=>$this->input->post('descripcion'),
					'estado'=>$this->input->post('estado'),
					'proyecto'=>$this->input->post('proyecto')
					);
					
				if($ID = $this->columna->save($ID,$data)){
					echo json_encode(array('error'=>false,'message'=>'TODO BIEN','columna_id'=>$ID));
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
