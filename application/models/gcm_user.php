<?php

/**
* Permite realizar operaciones DML sobre la tabla "gcm_user"
*
* @package planning
* @subpackage models
**/
class Gcm_user extends CI_Model{
	
	/**
	* Nombre de la table en la cual se realizaran las operaciones DML
	*@var string Nombre de la Tabla
	**/
	var $table_name = "gcm_users";
	
    /**
     * Envia una notificación al servidor de Google para que notifique a todos los dispositivos
     **/
    public function send_notification($registatoin_ids, $message) {

        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );

        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
        echo $result;
    }

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
		return $this->db->get($this->table_name)->result_array();
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
	 * Devuelve una array con todos los elementos
	 * @return array Array con todos los elementos 
	 */
	function get_all(){
		$res = $this->db->query('select * from '.$this->table_name)->result_array();
		
		return $res;
	}
	
	/**
	 * Devuelve un array  de 10 elementos
	 * @param array $ids Claves primaria de proyectos
	 * @param integer $skip Número desde el cual se cuentan los 10 elementos
	 */
	public function get_where_in($ids,$skip=0){
		try{
				$this->db->where_in('ID',$ids);
				return  $this->db->get($this->table_name,10,$skip)->result_array();
				
			}catch(Exception $e){
				return null;
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
			} 
	}

	/**
	 * Devuelve un array  de 10 elementos
	 * @param integer $skip Número desde el cual se cuentan los 10 elementos
	 */
	public function get_with_limits($skip=0){
		try{
			
				return  $this->db->get($this->table_name,10,$skip)->result_array();
				
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
}

?>