<?php

/**
* Permite realizar operaciones DML sobre la tabla "actividades"
*
* @package planning
* @subpackage models
**/
class Team extends CI_Model{
	
	/**
	* Nombre de la table en la cual se realizaran las operaciones DML
	*@var string Nombre de la Tabla
	**/
	var $table_name = "equipo_proyecto";
	
	/**
	 *Determina si determinado elemento existe
	 * 
	 *@param integer $miembro Clave primaria de la persona
	 *@param integer @proyecto Clave primaria del proyecto
	 *@return boolean Devuelve true o false
	 */
	function exists($miembro,$proyecto)
	{
		$this->db->from($this->table_name);	
		$this->db->where('miembro',$miembro);
		$this->db->where('proyecto',$proyecto);
		$query = $this->db->get();
		
		return ($query->num_rows()>=1);
	}
	
	/**
	 * Devuelve un array de IDS de proyectos en los que este participando el usuario
	 *@param int $user Clave primaria del participante
	 *@return Array IDs de proyectos
	 **/
	function get_proyectos($user){
		$this->db->select('proyecto');
		$this->db->where('miembro',$user);
		return $this->db->get($this->table_name)->result_array();
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
				return $this->db->get($this->table_name,20,$skip)->result_array();
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
			
			if($id==-1 && !$this->exists($data['miembro'],$data['proyecto'])){
				return $this->db->insert($this->table_name,$data);
			}
			unset($data['fecha_integracion']);
			$this->db->where('miembro',$data['miembro']);
			$this->db->where('proyecto',$data['proyecto']);
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
}

?>