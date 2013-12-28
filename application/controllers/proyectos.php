<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	public function index()
	{
		
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment(1));
			
			$crud = new grocery_CRUD();
			
			$crud->set_subject($this->lang->line($data['controller_name'].'_singular'));
			
			$crud->set_table('proyectos');
			$crud->set_relation('owner','owners','nombres');
			
			$crud->required_fields('nombre');

			$data['tabla']= $crud->render();

			$this->load->view('proyectos/manage',$data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
