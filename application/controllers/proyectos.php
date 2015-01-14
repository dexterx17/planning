<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento en los proyectos
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Proyectos extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->config('parametros', TRUE);
	}

	/**
	 * Muestra una vista con el listado de proyectos en los que esta participando el usuario
	 * Se verifica la participación en la tabla "proyectos" y equipo_proyecto
	 */
	public function index()
	{
		
		try{
			
			$data['controller_name'] = "proyectos";
			
			$ultimo = $this->input->post('ultimo_id');
			if($ultimo)
			{
	            $nuevos_datos = $this->proyecto->get_with_limits($ultimo);
	            if($nuevos_datos){      
		            foreach ($nuevos_datos as $fila) {
		            		$this->get_block();
		            		//get_row_proyecto($fila,$data['items']);
			            }
			         }
		    }	else{
				$ids = $this->people->get_involved_projects($this->user->id);
				$data['items']=$this->proyecto->get_where_in($ids,0);
				$this->load->view('proyectos/manage',$data);
			}
		  
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	/**
	 * Devuelve un bloque HTML con la info de un proyecto
	 * @param integer $clave Clave primaria del proyecto EJ: 2
	 */
	public function get_row($clave=-1)
	{
		try{
			$data['controller_name'] = "proyectos";
			$data['info']=(array)$this->proyecto->get_info($clave);
			$this->load->view('proyectos/block',$data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de un proyecto
	 * 
	 * @param integer $clave Clave primario del Proyecto EJ: 2
	 */
	public function nuevo($clave=-1)
	{
		try{
			$data['controller_name'] = "proyectos";
			$data['info']=(array)$this->proyecto->get_info($clave);
			$this->load->view('proyectos/form',$data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	/**
	 * Muestra un formulario que permite ver toda la informacion de un proyecto
	 * 
	 * @param integer $clave Clave primario del Proyecto EJ: 2
	 */
	public function view($clave=-1)
	{
		try{
			$data['controller_name'] = "proyectos";
			$data['info']=(array)$this->proyecto->get_info($clave);
			$this->load->view('proyectos/view',$data);
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
			$ID = $this->input->post('ID')==''? -1 :$this->input->post('ID');
			$this->form_validation->set_rules('nombre',lang('comun_name'),'trim|required');
			if($ID==-1){
				$this->form_validation->set_rules('nick',lang('comun_nick'),'trim|required|min_length[4]|max_length[50]|is_unique[proyectos.nick]'); 
			}else{
				$this->form_validation->set_rules('nick',lang('comun_nick'),'trim|required|min_length[4]|max_length[50]'); 
			}
			if($this->form_validation->run()==TRUE){
				
				$data=array(
					'nick'=>$this->input->post('nick'),
					'nombre'=>$this->input->post('nombre'),
					'descripcion'=>$this->input->post('descripcion'),
					'fecha_inicio'=>$this->input->post('fecha_inicio'),
					'fecha_fin'=>$this->input->post('fecha_fin'),
					'presupuesto'=>$this->input->post('presupuesto'),
					'visibilidad'=>$this->input->post('visibilidad')
					);
				//Si recien creo el proyecto le agrego el ID del usuario creador
				if($ID==-1){
					$data['owner']=$this->user->id;
				}
					
				if($ID= $this->proyecto->save($ID,$data)){
					echo json_encode(array('error'=>false,'message'=>'TODO BIEN','proyecto_id'=>$ID));
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
	 * Elimina un proyecto
	 *@param integer $proyecto_id Clave primaria del proyecto
	 **/
	public function delete($proyecto_id){
		if($ID= $this->proyecto->delete($proyecto_id)){
			echo json_encode(array('error'=>false,'message'=>'TODO BIEN','proyecto_id'=>$proyecto_id));
		}else{
			echo json_encode(array('error'=>true,'message'=>'Error al eliminar'));
		}	
	}

	/**
	 * Devuelve un array de variables del proyecto
	 *@param integer $proyecto_id Clave primaria del proyecto
	 *@param string $tipo "tasks"|"actividades"
	 **/
	public function get_status($proyecto_id,$tipo='tasks'){
		$resultado = array();
		switch ($tipo) {
			case 'tasks':
				$resultado[1]=$this->tarea->get_count_by_proyecto_estado($proyecto_id,1);
				$resultado[2]=$this->tarea->get_count_by_proyecto_estado($proyecto_id,2);
				$resultado[3]=$this->tarea->get_count_by_proyecto_estado($proyecto_id,3);
				break;
			
			default:
				# code...
				break;
		}

        echo json_encode($resultado);
    }
}
