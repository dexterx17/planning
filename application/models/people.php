<?php

/**
* Permite realizar operaciones DML sobre la tabla "people"
*
* @package planning
* @subpackage models
**/
class People extends CI_Model{
	
	/**
	* Nombre de la table en la cual se realizaran las operaciones DML
	*@var string Nombre de la Tabla
	**/
	var $table_name = "users";
	
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
		$this->db->select('id, username, email, first_name, last_name, company, phone, imagen');
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
	 */
	public function get_with_limits($skip=0){
		try{
			
				return  $this->db->get($this->table_name,10,$skip)->result();
				
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
	 * @return boolean Devuelve true o false
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
	 * Devuelve los IDS de los proyectos del usuario
	 *@param integer $user Clave primaria del usuario
	 **/
	public function get_involved_projects($user){
		//Obtengo los proyectos que le pertenecen al usuario
		$ids = $this->proyecto->get_ids(array('owner'=>$user));
		//Obtengo los proyectos en los que participa el usuario
		$participando = $this->team->get_proyectos($user);
		$parts=array_column($participando,'proyecto');
		//unifico y mezclo los resultados
		$resultado= array_unique(array_merge($ids,$parts));
		return empty($resultado)?array(-1):$resultado;
	}

	/**
	 * Devuelve el listado de todas las personas menos las que ya estan agregadas
	 * @param integer $skip Número desde el cual se cuentan los 10 elementos
	 */
	public function get_for_project($proyecto=0){
		try{
			$involved_people = $this->team->get_involved_people_ids($proyecto);
			$ids = array_column($involved_people,'miembro');
			if(!empty($ids))
				$this->db->where_not_in('id',$ids);

			return $this->db->get($this->table_name)->result_array();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			} 
	}

	/**
	 * Elimina todos los usuarios
	 * 
	 * @return boolean Devuelve true o false
	 */
	public function delete_all(){
		try{
			$this->db->where('ID != ',0);
			return $this->db->delete($this->table_name);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return false;
			} 
	}
}

?>