<?php

/**
* Permite realizar operaciones DML sobre la tabla "actividades"
*
* @package planning
* @subpackage models
**/
class Actividad extends CI_Model{
	
	/**
	* Nombre de la table en la cual se realizaran las operaciones DML
	*@var string Nombre de la Tabla
	**/
	var $table_name = "actividades";
	
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
					$resultado[$key]['tareas']=$this->tarea->get_by_actividad($aux['ID']);
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
	 * @param integer $id Clave primaria del elemento
	 *@return boolean Devuelve true o false
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
	 * Devuelve el número de actividades de un proyecto
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	function get_count_by_proyecto($proyecto){
		try{
			$this->db->where('proyecto',$proyecto);	
			return  $this->db->count_all($this->table_name);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			return null;
		} 
	}

	
	/**
	 * Devuelve un array con todas las actividades de un proyecto
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	function get_by_proyecto($proyecto){
		try{
			$this->db->where('proyecto',$proyecto);	
			return  $this->db->get($this->table_name)->result_array();
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			return null;
		} 
	}

	/**
	 * Devuelve un array con todas las actividades de un proyecto
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	function get_by_proyecto_sin_sprint($proyecto){
		try{
			$this->db->where('proyecto',$proyecto);
			$this->db->where('sprint',NULL);		
			$this->db->or_where('sprint',0);
			return  $this->db->get($this->table_name)->result_array();
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			return null;
		} 
	}

	/**
	 * Devuelve un array con todas las actividades de un sprint
	 * @param integer $sprint Clave primaria del sprint
	 */
	function get_by_sprint($sprint){
		try{
			$this->db->where('sprint',$sprint);	
			return  $this->db->get($this->table_name)->result_array();
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			return null;
		} 
	}

	/**
	 * Devuelve un array con las actividades que estan activas
	 * @param integer $proyecto Clave primaria del proyecto
	 */
	function get_pendientes($proyecto){
		try{
			$this->db->where('proyecto',$proyecto);
			$res=  (array)$this->db->get($
				$this->table_name,10,$skip)->result();
			$resultado=array();
			foreach ($res as $key => $value) {
				$aux=(array)$value;
				$resultado[$key]=(array)$value;
				$resultado[$key]['tareas']=$this->tarea->get_pendientes_by_actividad($aux['ID']);
			}
			return $resultado;
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
			return null;
		} 
	}
}

?>