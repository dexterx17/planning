<?php

/**
* Permite realizar operaciones DML sobre la tabla "sprints"
*
* @package planning
* @subpackage models
**/
class Sprint extends CI_Model{
	
	/**
	* Nombre de la table en la cual se realizaran las operaciones DML
	*@var string Nombre de la Tabla
	**/
	var $table_name = "sprints";
	
	/**
	 *Determina si determinado elemento existe
	 *
	 *@param integer $id Clave primaria de la persona
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
	 * Devuelve un array con un sprint con sus actividades asignadas
	 * @param integer $id Clave primaria del elemento
	 */
	function get_full_info($id){
		$this->db->where('ID',$id);
		$query=  $this->db->get($this->table_name);
		
		if ($query->num_rows() == 1) {
			$res= (array) $query->row();
			$res['actividades']=$this->actividad->get_by_sprint($res['ID']);
			return $res;
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
		
		return $res;
	}
	
		
	/**
	 * Devuelve un array  de 10 elementos
	 * @param integer $skip Número desde el cual se cuentan los 10 elementos
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	public function get_with_limits($skip=0,$proyecto){
		try{
				$this->db->where('proyecto',$proyecto);	
				$res=  (array)$this->db->get($this->table_name,10,$skip)->result();
				$resultado=array();
				foreach ($res as $key => $value) {
					$aux=(array)$value;
					$resultado[$key]=(array)$value;
					$resultado[$key]['actividades']=$this->actividad->get_by_sprint($aux['ID']);
				}
				return $resultado;
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
	 * @return boolean Devuelve true o false
	 */
	public function delete($id){
		try{
			
			//Si el sprint tiene actividades asignadas no se puede eliminar
			if($this->actividad->get_count_filtered(array('sprint'=>$id))>0)
				return false;

			$this->db->where('ID',$id);
			return $this->db->delete($this->table_name);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return false;
			} 
	}
	
	/**
	 * Devuelve un array con todos los sprints de un proyecto
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	function get_by_proyecto($proyecto){
		$this->db->where('proyecto',$proyecto);
		return $this->db->get($this->table_name)->result_array();
	}

	/**
	 * Devuelve una array con el ID y el nombre del elemento
     * @param integer $proyecto Clave primaria del proyecto
	 * @return array Array con todos los elementos 
	 */
	function get_by_proyecto_comboBox($proyecto){
		$this->db->select('ID,num');
		$this->db->where('proyecto',$proyecto);
		$this->db->order_by('fecha_inicio','desc');
		$res = $this->db->get($this->table_name)->result_array();
        $resultado=array();
        foreach ($res as $key => $value) {
            $resultado[$value['ID']]=$value['num'];
        }
        return $resultado;
	}

	/**
	 * Devuelve el siguiente número secuencial de sprint que se debe asignar 
	 * @param integer $proyecto Clave primaria del proyecto
	 **/
	function get_next_orden($proyecto){
		try {
			$this->db->select_max('num');
			$this->db->where('proyecto',$proyecto);
			return $this->db->get($this->table_name)->result_array();
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			return null;	
		}
	}
}

?>