<?php

/**
* Permite realizar operaciones DML sobre la tabla "wiki_page"
*
* @package planning
* @subpackage models
**/
class Wik extends CI_Model{
	
	/**
	* Nombre de la table en la cual se realizaran las operaciones DML
	*@var string Nombre de la Tabla
	**/
	var $table_name = "wiki_page";
	
	/**
	 *Determina si determinado elemento existe
	 * 
	 *@param integer $id Clave primaria de la actividad
	 *@return boolean Devuelve true o false
	 */
	function exists($id)
	{
		$this->db->from($this->table_name);	
		$this->db->where('ID',$id);
		$query = $this->db->get();
		
		return ($query->num_rows()>=1);
	}

	/**
	 * Devuelve el numero de actividades que cumplen con where
	 *@param array $where Array con los filtros de 
	 **/
	function get_count_filtered($where){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		return $this->db->count_all_results($this->table_name);
	}
	
	
	/**
	 * Devuelve un array con un elemento de la tabla
	 * @param integer $id Clave primaria de la actividad
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
	 * @return array Array con todos los elementos 
	 */
	function get_all(){
		$res = $this->db->query('select * from '.$this->table_name);
		
		return $res->result_array();
	}
	
		
	/**
	 * Devuelve un array  de 10 elementos
	 * @param integer $skip Número desde el cual se cuentan los 10 elementos
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	public function get_with_limits($skip=0,$proyecto){
		try{
				$this->db->where('deleted',FALSE);
				$this->db->where('proyecto',$proyecto);	
				$this->db->order_by('fecha','asc');
				$res=  (array)$this->db->get($this->table_name,40,$skip)->result();
				return $res;
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			} 
	}
	
	/**
	 * Ingresa un elemento en la BDD
	 * @param integer $id Clave primaria del elemento
	 * @param array $data Array con los datos del elemento
	 */
	function save($id,$data){
		try{
			
			if($id==-1 && !$this->exists($id)){
				if($this->db->insert($this->table_name,$data))
					return $this->db->insert_id();
			}
			
			$this->db->where('ID',$id);
			return $this->db->update($this->table_name,$data);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return -1;
			} 
	}
	
	/**
	 * Elimina un elemento logicamente de la tabla 
	 * Setea el campo 'deleted' = TRUE
	 * 
	 * @param integer $id Clave primaria del elemento
	 *@return boolean Devuelve true o false
	 */
	public function delete($id){
		try{
			
			$this->db->where('ID',$id);
			return $this->db->update($this->table_name,array('deleted'=>TRUE));
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return false;
			} 
	}

}

?>