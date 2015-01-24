<?php

/**
* Permite realizar operaciones DML sobre la tabla "prespuesto"
*
* @package planning
* @subpackage models
**/
class Presupuesto extends CI_Model{
	
	/**
	* Nombre de la table en la cual se realizaran las operaciones DML
	*@var string Nombre de la Tabla
	**/
	var $table_name = "presupuesto";
	
	/**
	 *Determina si determinado elemento existe
	 * 
	 *@param integer $id Clave primaria del elemento
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
	 * Devuelve un array con un elemento de la tabla
	 * @param integer $id Clave primaria del elemento
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
	 * Devuelve un array  de 10 elementos
	 * @param integer $skip Número desde el cual se cuentan los 10 elementos
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	public function get_with_limits($skip=0,$proyecto){
		try{
				$this->db->where('proyecto',$proyecto);	
				$this->db->order_by('fecha','asc');
				$res=  (array)$this->db->get($this->table_name,20,$skip)->result();
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
	 * Elimina un elemento de la tabla 
	 * 
	 * @param integer $id Clave primaria del elemento
	 *@return boolean Devuelve true o false
	 */
	public function delete($id){
		try{
			
			$this->db->where('ID',$id);
			return $this->db->delete($this->table_name);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return false;
			} 
	}

	/**
	 * Devuelve el número de transacciones de un proyecto
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	function get_count_by_proyecto($proyecto){
		try{
			$this->db->where('proyecto',$proyecto);	
			return  $this->db->count_all_results($this->table_name);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			return null;
		} 
	}

	/**
	 * Devuelve un array con todas las transacciones de un proyecto
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	function get_by_proyecto($proyecto){
		try{
			$this->db->where('proyecto',$proyecto);	
			$this->db->order_by('fecha','desc');
			return  $this->db->get($this->table_name)->result_array();
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			return null;
		} 
	}

	/**
	 * Devuelve el total de un tipo de transacciones de un proyecto
	 * @param integer $proyecto Clave primaria del proyecto
	 * @param array $tipo Tipo de la transacción
	 */
	function get_total_by_proyecto_tipo($proyecto,$tipo=null){
		try{
			$this->db->select('SUM(valor) as total');
			$this->db->where('proyecto',$proyecto);	
			if($tipo!=null){
				if(is_array($tipo))
					$this->db->where_in('tipo',$tipo);	
				else
					$this->db->where('tipo',$tipo);	
			}
			$this->db->group_by('proyecto');
			return  $this->db->get($this->table_name)->result_array();
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			return null;
		} 
	}

	

}

?>