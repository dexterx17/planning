<?php

class Proyecto extends CI_Model{
	
	function get_all(){
		$res = $this->db->query('select * from proyectos');
		
		return $res;
	}
}

?>