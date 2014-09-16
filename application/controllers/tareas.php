<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con las subtareas de las actividades del BACKLOG
 * 
 * @author Jaime Santana
 */
class Tareas extends CI_Controller {
	
	/**
	 * Muestra una vista con el listado de actividades o items del BACKLOG y los botones realizar operaciones CRUD
	 */
	public function index($proyecto)
	{
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			$data['proyecto']=$proyecto;
			$ultimo = $this->input->post('ultimo_id');
			if($ultimo)
			{
	            $nuevos_datos = $this->actividad->get_with_limits($ultimo,$proyecto);
	            if($nuevos_datos){      
		            foreach ($nuevos_datos as $fila) {
		            		get_row_people($fila,$data['items']);
			            }
			         }
	      }	else{
			$data['items']=$this->actividad->get_with_limits(0,$proyecto);
			$this->load->view('backlog/manage',$data);
		  }
		  
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			
			}
	}
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de un proyecto
	 * 
	 * @param $clave Clave primario de la actividad EJ: 2
	 */
	public function nuevo($clave=-1,$actividad)
	{
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			$data['info']=(array)$this->tarea->get_info($clave);
			$data['actividad']=$actividad;
			$this->load->view('backlog/form_tarea',$data);
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
			$this->form_validation->set_rules('nombre',lang('comun_name'),'trim|required');
			$ID = $this->input->post('ID')==''? -1 :$this->input->post('ID');
		
			if($this->form_validation->run()==TRUE){
				
				$data=array(
					'nombre'=>$this->input->post('nombre'),
					'descripcion'=>$this->input->post('descripcion'),
					'tiempo_planificado'=>$this->input->post('tiempo_planificado'),
					'tiempo_real'=>$this->input->post('tiempo_real'),
					'estado'=>$this->input->post('estado'),
					'actividad'=>$this->input->post('actividad')
					);
					
				if($this->tarea->save($ID,$data)){
					echo json_encode(array('error'=>false,'message'=>'TODO BIEN'));
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
}