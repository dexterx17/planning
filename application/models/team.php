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
	 * Devuelve los IDS de los usuarios de un proyecto
	 *@param integer $user Clave primaria del usuario
	 **/
	public function get_involved_people_ids($proyecto){
		$this->db->select('miembro');
		$this->db->where('proyecto',$proyecto);
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
	 * @param integer $proyecto Clave primaria del proyecto
	 * @param integer $miembro Clave primaria del proyecto
	 *@return boolean Devuelve true o false
	 */
	public function delete($proyecto,$miembro){
		try{
			
			$this->db->where('miembro',$miembro);
			$this->db->where('proyecto',$proyecto);
			return $this->db->delete($this->table_name);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return false;
			} 
	}

	/**
	 * Devuelve una array con el ID y el nombre del usuario
     * @param integer $proyecto Clave primaria del proyecto
	 * @return array Array con todos los elementos 
	 */
	function get_by_proyecto_comboBox($proyecto){
		$this->db->select('U.id,U.username');
		$this->db->from('users U');
		$this->db->join($this->table_name.' T', 'T.miembro=U.id');
		$this->db->where('T.proyecto',$proyecto);
		$this->db->order_by('U.username','desc');
		$res = $this->db->get()->result_array();
        $resultado=array();
        foreach ($res as $key => $value) {
            $resultado[$value['id']]=$value['username'];
        }
        return $resultado;
	}

	/**
	 * Devuelve una array con las personas que trabajaron en una actividad
     * @param integer $actividad Clave primaria de la actividad
	 * @return array Array con todos los elementos 
	 */
	function get_by_actividad($actividad){
		$this->db->select('distinct(U.id),U.username, SUM(T.tiempo_planificado) as tiempo_planificado, SUM(T.tiempo_real) as tiempo_real');
		$this->db->from('users U');
		$this->db->join('tareas T', 'T.responsable=U.id');
		$this->db->join('actividades A', 'A.id=T.actividad');
		$this->db->where('A.ID',$actividad);
		$this->db->group_by('U.id, T.actividad');
		$this->db->order_by('U.username','desc');
		return $this->db->get()->result_array();
	}
}

?>