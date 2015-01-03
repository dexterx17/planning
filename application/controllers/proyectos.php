<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento en los proyectos
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Proyectos extends CI_Controller {

	/**
	 * Muestra una vista con el listado de proyectos y los botones realizar operaciones CRUD
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
				$data['items']=$this->proyecto->get_with_limits(0);
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
					'owner'=>$this->input->post('owner'),
					'presupuesto'=>$this->input->post('presupuesto')
					);
					
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
}
