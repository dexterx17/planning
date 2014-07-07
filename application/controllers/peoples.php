<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con las personas
 * 
 * @author Jaime Santana
 */
class Peoples extends CI_Controller {

	/**
	 * Muestra una vista con el listado de personas y los botones realizar operaciones CRUD
	 */
	public function index()
	{
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			
			$ultimo = $this->input->post('ultimo_id');
			if($ultimo)
			{
	            $nuevos_datos = $this->people->get_with_limits($ultimo);
	            if($nuevos_datos){      
		            foreach ($nuevos_datos as $fila) {
		            		get_row_people($fila,$data['items']);
			            }
			         }
	      }	else{
			$data['items']=$this->people->get_with_limits(0);
			
			$this->load->view('people/manage',$data);
		  }
		  
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de una persona
	 * 
	 * @param $clave Clave primario de la Persona EJ: 2
	 */
	public function nuevo($clave=-1)
	{
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			$data['info']=$this->people->get_info($clave);
			
			$this->load->view('people/form',$data);
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
			$this->form_validation->set_rules('nick',lang('comun_nick'),'trim|required|min_length[5]|max_length[30]|is_unique[people.nick]'); 
			$this->form_validation->set_rules('nombres',lang('comun_names'),'trim|required|alpha');
			$this->form_validation->set_rules('apellidos',lang('comun_lastnames'),'trim|required|alpha');
			$this->form_validation->set_rules('email',lang('comun_email'),'required|valid_email');
			//$this->form_validation->set_rules('password',lang('comun_password'),'required|matches[repassword]|md5');
			//$this->form_validation->set_rules('repassword',lang('comun_repassword'),'required');
			
			$ID = $this->input->post('ID')==''? -1 :$this->input->post('ID');
		
			if($this->form_validation->run()==TRUE){
				
				$data=array(
					'nick'=>$this->input->post('nick'),
					'nombres'=>$this->input->post('nombres'),
					'apellidos'=>$this->input->post('apellidos'),
					'direccion'=>$this->input->post('direccion'),
					'email'=>$this->input->post('email'),
					'telefono'=>$this->input->post('telefono'),
					'celular'=>$this->input->post('celular')
					);
					
				if($this->people->save($ID,$data)){
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

	/**
	 * envia el ID para eliminar una persona
	 * 
	 * @param $clave Clave primario de la persona EJ: 2
	 */
	public function delete($clave=-1){
		if($this->people->delete($clave)){
				echo json_encode(array('error'=>false,'message'=>'TODO BIEN'));
			}else{
				echo json_encode(array('error'=>true,'message'=>'Error al eliminar'));
			}	
	}
}
