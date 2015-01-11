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
}
