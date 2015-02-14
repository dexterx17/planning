<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar tareas generales en el index
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Inicio extends MY_Controller {

	/**
	 * Muestra la pagina de inicio
	 **/
	public function index()
	{
		$this->load->view('inicio/index');
	}

	/**
	 * Genera el scrtip SQL completo de la BDD en un archivo comprimido .zip
	 **/
	public function backup(){
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}else{
			$this->load->dbutil();
			$prefs = array(     
	                'format'      => 'zip',             
	                'filename'    => 'planigicacion.sql'
	              );


	        $backup =& $this->dbutil->backup($prefs); 

	        $db_name = 'backup-'. date("Y-m-d-H-i-s") .'.zip';
	        $save = 'uploads/'.$db_name;

	        $this->load->helper('file');
	        write_file($save, $backup); 


	        $this->load->helper('download');
	        force_download($db_name, $backup); 
	    }
	}
}
