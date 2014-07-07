<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento en los proyectos
 * 
 * @author Jaime Santana
 */
class Proyectos extends CI_Controller {

	/**
	 * Muestra una vista con el listado de proyectos y los botones realizar operaciones CRUD
	 */
	public function index()
	{
		
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			
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
	 */
	public function get_block(){
		$this->load->view('proyectos/block');
	}
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de un proyecto
	 * 
	 * @param $clave Clave primario del Proyecto EJ: 2
	 */
	public function nuevo($clave=-1)
	{
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			$data['info']=$this->proyecto->get_info($clave);
			$this->load->view('proyectos/form',$data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	/**
	 * Muestra un formulario que permite ver toda la informacion de un proyecto
	 * 
	 * @param $clave Clave primario del Proyecto EJ: 2
	 */
	public function view($clave=-1)
	{
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
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
			$this->form_validation->set_rules('nick',lang('comun_nick'),'trim|required|min_length[4]|max_length[50]|is_unique[proyectos.nick]'); 
			$this->form_validation->set_rules('nombre',lang('comun_name'),'trim|required');
			//$this->form_validation->set_rules('password',lang('comun_password'),'required|matches[repassword]|md5');
			//$this->form_validation->set_rules('repassword',lang('comun_repassword'),'required');
			
			$ID = $this->input->post('ID')==''? -1 :$this->input->post('ID');
		
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
					
				if($this->proyecto->save($ID,$data)){
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
