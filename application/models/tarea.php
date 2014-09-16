<?php

class Tarea extends CI_Model{
	
	var $table_name = "tareas";
	
	/**
	 *Determina si determinado elemento existe
	 *
	 *@return Devuelve una valor boolean EJ: true 
	 */
	function exists($id)
	{
		$this->db->from($this->table_name);	
		$this->db->where('ID',$id);
		$query = $this->db->get();
		
		return ($query->num_rows()>=1);
	}
	
	
	/**
	 * Devuelve un array con un elemento de la tabla
	 * @param id Clave primaria del elemento
	 */
	function get_info($id){
		$this->db->where('ID',$id);
		$query=  $this->db->get($this->table_name);
		
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			//Get empty base parent object, as $item_id is NOT an item
			$info_obj =  array();
			
			$fields = $this->db->list_fields($this->table_name);
			foreach ($fields as $field) {
				$info_obj["$field"] = '';
			}
			return $info_obj;
		}
	}
	
	/**
	 * Devuelve una array con todos los elementos
	 * @return Array con todos los elementos 
	 */
	function get_all(){
		$res = $this->db->query('select * from '.$this->table_name);
		
		return $res;
	}
	
		
	/**
	 * Devuelve un array  de 10 elementos
	 * @param skip Número desde el cual se cuentan los 10 elementos
	 * @param actividad Clave primaria de la actividad
	 */
	function get_with_limits($skip=0,$actividad){
		try{
				$this->db->where('actividad',$actividad);	
				return  $this->db->get($this->table_name,10,$skip)->result();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			} 
	}
	
	/**
	 * Ingresa un elemento en la BDD
	 * @param $id Clave primaria del elemento
	 * @param $data Array con los datos del elemento
	 */
	function save($id,$data){
		try{
			
			if($id==-1 && !$this->exists($id)){
				return $this->db->insert($this->table_name,$data);
			}
			
			$this->db->where('ID',$id);
			return $this->db->update($this->table_name,$data);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return -1;
			} 
	}
	
	/**
	 * Elimina un elemento de la tabla 
	 * 
	 * @param $id Clave primaria del elemento
	 */
	public function delete($id){
		try{
			
			$this->db->where('ID',$id);
			return $this->db->delete($this->$table_name);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return false;
			} 
	}
	
	/**
	 * Devuelve un array con todas las actividades de un proyecto
	 * @param $proyectp Clave primaria del proyecto
	 */
	function get_by_actividad($actividad){
		try{
				$this->db->where('actividad',$actividad);	
				return  $this->db->get($this->table_name)->result_array();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			} 
			
	}
}

?>