<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sprints extends CI_Controller {

	public function index($proyecto)
	{
		try{
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			$data['proyecto']=$proyecto;
			$ultimo = $this->input->post('ultimo_id');
			if($ultimo)
			{
	            $nuevos_datos = $this->sprint->get_with_limits($ultimo,$proyecto);
	            if($nuevos_datos){      
		            foreach ($nuevos_datos as $fila) {
		            		get_row_sprint($fila,$data['items']);
			            }
			         }
	      }	else{
			$data['items']=$this->sprint->get_with_limits(0,$proyecto);
			$this->load->view('sprints/manage',$data);
		  }
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function test(){
		return anchor('#','Test');
	}
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de un proyecto
	 * 
	 * @param $clave Clave primario del Proyecto EJ: 2
	 */
	public function nuevo($clave=-1,$proyecto)
	{
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			$data['info']=(array)$this->sprint->get_info($clave);
			$data['proyecto']=$proyecto;
			$this->load->view('sprints/form',$data);
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
					
				if($this->sprint->save($ID,$data)){
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
