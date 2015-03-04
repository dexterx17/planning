<?php

/**
* Permite realizar operaciones DML sobre la tabla "proyectos"
*
* @package planning
* @subpackage models
**/
class Proyecto extends CI_Model{
	
	/**
	* Nombre de la table en la cual se realizaran las operaciones DML
	*@var string Nombre de la Tabla
	**/
	var $table_name = "proyectos";
	
	/**
	 *Determina si determinado elemento existe
	 * 
	 *@param integer $id Clave primaria del proyecto
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
	 * Devuelve un array de IDS de proyectos que cumpla la clausula WHERE 
	 * enviada como parametros
	 *@param array $where
	 *@return Array IDs de proyectos
	 **/
	function get_ids($where){
		$this->db->select('ID');
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$resultado =$this->db->get($this->table_name)->result_array();
		return !empty($resultado) ? array_column($resultado,'ID') : array();
	}

	/**
	 * Devuelve un array con un elemento de la tabla
	 * @param integer $id Clave primaria del elemento
	 */
	function get_info($id){
		$this->db->where('ID',$id);
		$query=  $this->db->get($this->table_name);
		
		if ($query->num_rows() == 1) {
			$res= (array)$query->row();
			$res['team']=$this->team->get_involved_people_ids($res['ID']);
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
		
		return $res->result_array();
	}
	
	/**
	 * Devuelve un array  de 10 elementos
	 * @param array $ids Claves primaria de proyectos
	 * @param integer $skip Número desde el cual se cuentan los 10 elementos
	 */
	public function get_where_in($ids,$skip=0){
			$this->db->where_in('ID',$ids);

			$res = (array)$this->db->get($this->table_name,10,$skip)->result_array();
			$resultado=array();
			foreach ($res as $key => $value) {
				$aux=(array)$value;
				$resultado[$key]=(array)$value;
				$resultado[$key]['team']=$this->team->get_involved_people_ids($aux['ID']);
			}
			return $resultado;
	}

	/**
	 * Devuelve un array  de 10 elementos
	 * @param integer $skip Número desde el cual se cuentan los 10 elementos
	 */
	public function get_with_limits($skip=0){
		return  $this->db->get($this->table_name,10,$skip)->result_array();
	}
	
	/**
	 * Ingresa un elemento en la BDD
	 * @param integer $id Clave primaria del elemento
	 * @param array $data Array con los datos del elemento
	 */
	function save($id,$data){
		if($id==-1 && !$this->exists($id)){
			if($this->db->insert($this->table_name,$data))
				return array('error'=>FALSE,'ID'=>$this->db->insert_id());
			else
				return array('error'=>TRUE,'msg'=>$this->db->_error_message(),'code'=>$this->db->_error_number());
		}
		
		$this->db->where('ID',$id);
		if ($actualizado = $this->db->update($this->table_name,$data))
			return array('error'=>FALSE,'ID'=>$actualizado);
		else
			return array('error'=>TRUE,'msg'=>$this->db->_error_message(),'code'=>$this->db->_error_number());	
	}
	
	/**
	 * Elimina un elemento de la tabla 
	 * 
	 * @param integer $id Clave primaria del elemento
	 * @return boolean Devuelve true o false
	 */
	public function delete($id){
		$this->db->where('ID',$id);
		if($eliminado = $this->db->delete($this->table_name))
			return array('error'=>FALSE,'eliminado'=>$eliminado);
		else
			return array('error'=>TRUE,'msg'=>$this->db->_error_message(),'code'=>$this->db->_error_number());	
	}
}

?>