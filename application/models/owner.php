<?php

class Owner extends CI_Model{
	
	var $entidad = "owners";
	
	function get_all(){
		$res = $this->db->query('select * from '.$this->entidad);
		
		return $res;
	}
	
	function insert(){
		
	}
}

?>