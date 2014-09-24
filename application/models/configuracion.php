<?php

class Configuracion extends CI_Model{
	
	/**
	 *Determina si determinado elemento existe
	 *
         * @param table_name Nombre de la tabla
	 * @return Devuelve una valor boolean EJ: true 
	 */
	function exists($table_name,$id)
	{
		$this->db->from($table_name);	
		$this->db->where('ID',$id);
		$query = $this->db->get();
		
		return ($query->num_rows()>=1);
	}
	
	
	/**
	 * Devuelve un array con un elemento de la tabla
         * @param table_name Nombre de la tabla
	 * @param id Clave primaria del elemento
	 */
	function get_info($table_name,$id){
		$this->db->where('ID',$id);
		$query=  $this->db->get($table_name);
		
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			//Get empty base parent object, as $item_id is NOT an item
			$info_obj =  array();
			
			$fields = $this->db->list_fields($table_name);
			foreach ($fields as $field) {
				$info_obj["$field"] = '';
			}
			return $info_obj;
		}
	}
	
	/**
	 * Devuelve una array con todos los elementos
         * @param table_name Nombre de la tabla
	 * @return Array con todos los elementos 
	 */
	function get_all($table_name){
		$res = $this->db->query('select * from '.$table_name);
		
		return $res->result_array();
	}
	
        /**
	 * Devuelve una array con el ID y el nombre del elemento
         * @param table_name Nombre de la tabla
	 * @return Array con todos los elementos 
	 */
	function get_comboBox($table_name){
		$res = $this->db->query('select * from '.$table_name)->result_array();
                $resultado=array();
                foreach ($res as $key => $value) {
                    $resultado[$value['ID']]=$value['nombre'];
                }
                return $resultado;
	}
		
	/**
	 * Devuelve un array  de 10 elementos
         * @param table_name Nombre de la tabla
	 * @param skip Número desde el cual se cuentan los 10 elementos
	 */
	public function get_with_limits($table_name,$skip=0){
		try{
			
				return  $this->db->get($table_name,10,$skip)->result();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			} 
	}
	
	/**
	 * Ingresa un elemento en la BDD
         * @param table_name Nombre de la tabla
	 * @param $id Clave primaria del elemento
	 * @param $data Array con los datos del elemento
	 */
	function save($table_name,$id,$data){
		try{
			
			if($id==-1 && !$this->exists($id)){
				return $this->db->insert($table_name,$data);
			}
			
			$this->db->where('ID',$id);
			return $this->db->update($table_name,$data);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return -1;
			} 
	}
	
	/**
	 * Elimina un elemento de la tabla 
	 * @param table_name Nombre de la tabla
	 * @param $id Clave primaria del elemento
	 */
	public function delete($table_name,$id){
		try{
			
			$this->db->where('ID',$id);
			return $this->db->delete($table_name);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return false;
			} 
	}
}

?>