<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sprints extends CI_Controller {

	public function index()
	{
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment(1));
			
			$crud = new grocery_CRUD();
			
			
			$crud->set_subject($this->lang->line($data['controller_name'].'_singular'));
			
			$crud->set_table('sprints');
			$crud->set_relation('proyecto', 'proyectos', 'nombre');
			
			$crud->required_fields('objetivo');


			$crud->callback_column('porcentaje_valido',array($this,'test'));
 			$crud->add_action('Smileys', 'http://www.grocerycrud.com/assets/uploads/general/smiley.png', 'demo/action_smiley');
			
			$data['tabla']= $crud->render();

			$this->load->view('sprints/manage',$data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function test(){
		return anchor('#','Test');
	}
}
