<?php

/**
* Permite realizar operaciones DML sobre la tabla "tareas"
*
* @package planning
* @subpackage models
**/
class Tarea extends CI_Model{
	
	/**
	* Nombre de la table en la cual se realizaran las operaciones DML
	*@var string Nombre de la Tabla
	**/
	var $table_name = "tareas";
	
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
	 * @param integer $id Clave primaria del 	elemento
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
	 * @param integer $actividad Clave primaria de la actividad
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
			
			$this->db->where('ID',$id);
			return $this->db->delete($this->table_name);
			
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return false;
			} 
	}
	
	/**
	 * Devuelve un array con todas las tareas de una actividad
	 * @param integer $actividad Clave primaria de la actividad a la que pertenecen las tareas
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

	/**
	 * Devuelve un array con todas las tareas en determinado estado de una actividad
	 * @param integer $actividad Clave primaria de la actividad a la que pertenecen las tareas
	 * @param integer $estado Estado de las tareas que se quiere obtener
	 * @param boolean $not Si es true se buscar las tareas que no tengan el estado especificado
	 */
	function get_by_actividad_estado($actividad, $estado = 0,$not=false){
		try{
				if($not)
					$this->db->where_not_in('estado',$estado);
				else	
					$this->db->where('estado',$estado);
						
				$this->db->where('actividad',$actividad);	
				return  $this->db->get($this->table_name)->result_array();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			}
	}

	/**
	 * Devuelve un array con todas las tareas en determinado estado de un responsable
	 * @param integer $usuario Clave primaria del responsable a la que pertenecen las tareas
	 * @param integer $estado Estado de las tareas que se quiere obtener
	 * @param boolean $not Si es true se buscar las tareas que no tengan el estado especificado
	 */
	function get_by_usuario_estado($usuario, $estado = 0,$not=false){
		try{
				if($not)
					$this->db->where_not_in('estado',$estado);
				else	
					$this->db->where('estado',$estado);
						
				$this->db->where('responsable',$usuario);	
				return  $this->db->get($this->table_name)->result_array();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			}
	}

	/**
	 * Devuelve un array con todas las tareas en determinado estado de una actividad
	 * @param integer $actividad Clave primaria de la actividad a la que pertenecen las tareas
	 * @param integer $estado Estado de las tareas que se quiere obtener
	 * @param boolean $not Si es true se buscar las tareas que no tengan el estado especificado
	 */
	function get_count_by_actividad_estado($actividad, $estado = 0,$not=false){
		try{
				if($not)
					$this->db->where_not_in('estado',$estado);
				else	
					$this->db->where('estado',$estado);
						
				$this->db->where('actividad',$actividad);	
				return  $this->db->get($this->table_name)->num_rows();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			}
	}

	/**
	 * Devuelve un array con todas las tareas en determinado estado de un proyecto
	 * @param integer $proyecto Clave primaria de la proyecto a la que pertenecen las tareas
	 * @param integer $estado Estado de las tareas que se quiere obtener
	 * @param boolean $not Si es true se busca las tareas que no tengan el estado especificado
	 */
	function get_count_by_proyecto_estado($proyecto, $estado = 0,$not=false){
		try{
				$this->db->from($this->table_name.' T');
				$this->db->join('actividades A', 'A.ID=T.actividad');
				if($not)
					$this->db->where_not_in('T.estado',$estado);
				else	
					$this->db->where('T.estado',$estado);
						
				$this->db->where('A.proyecto',$proyecto);

				return  $this->db->get()->num_rows();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			}
	}

	/**
	 * Devuelve un array con todas las tareas en determinado estado de un sprint
	 * @param integer $sprint Clave primaria de la sprint a la que pertenecen las tareas
	 * @param integer $estado Estado de las tareas que se quiere obtener
	 * @param boolean $not Si es true se busca las tareas que no tengan el estado especificado
	 */
	function get_count_by_sprint_estado($sprint, $estado = 0,$not=false){
		try{
				$this->db->from($this->table_name.' T');
				$this->db->join('actividades A', 'A.ID=T.actividad');
				if($not)
					$this->db->where_not_in('T.estado',$estado);
				else	
					$this->db->where('T.estado',$estado);
						
				$this->db->where('A.sprint',$sprint);

				return  $this->db->get()->num_rows();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			}
	}

	/**
	 * Devuelve el valor del estado de la tarea con menor valor (menor progreso) de entre todas las tareas de la actividad
	 * @param integer $actividad Clave primaria de la actividad a la que pertenecen las tareas
	 */
	function get_by_actividad_min_estado($actividad){
		try{
				$this->db->select_min('estado');
				$this->db->where('actividad',$actividad);	
				return  $this->db->get($this->table_name)->result_array();
				
			}catch(Exception $e){
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
				return null;
			} 
			
	}

}

?>