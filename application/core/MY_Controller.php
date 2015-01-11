<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador principal que verifica si los usuarios estan logeados
 **/
class MY_Controller extends CI_Controller {

	var $user;

	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}else{
			$this->user=$this->ion_auth->user()->row();
		}
	}

}