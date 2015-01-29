<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con las subtareas de las actividades del BACKLOG
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Tareas extends MY_Controller {

	var $data;

    function __construct(){
        parent::__construct();
        $this->data['estados_tarea']=$this->configuracion->get_comboBox('estado_tarea');
        $this->data['controller_name'] = 'tareas';
    }
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de un proyecto
	 * 
	 * @param $clave Clave primaria de la tarea EJ: 2
	 * @param $actividad Clave primaria de la actividad a la que pertenece la tarea EJ: 10
	 */
	public function nuevo($clave=-1,$actividad)
	{
		try{
			$this->data['info']=(array)$this->tarea->get_info($clave);
			$this->data['actividad']=$actividad;
			$this->data['team']=$this->team->get_by_proyecto_comboBox($this->actividad->get_id_proyecto($actividad));
			$this->data['team'][""]="Sin responsable";//
			$this->load->view('backlog/form_tarea',$this->data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	/**
	 * Muestra un row con información de la tarea
	 * 
	 * @param $clave Clave primario de la tarea EJ: 2
	 */
	public function get_row($clave=-1)
	{
		try{
			$this->data['tarea']=(array)$this->tarea->get_info($clave);
			$this->load->view('backlog/block_tarea',$this->data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	/**
	* Obtiene y valida los datos del formularios para enviarlos a guardar 
	*/
	public function save()
	{
		try{
			$this->form_validation->set_rules('nombre',lang('comun_name'),'trim|required');
			$ID = $this->input->post('ID')==''? -1 :$this->input->post('ID');
		
			if($this->form_validation->run()==TRUE){
				
				$data=array(
					'nombre'=>$this->input->post('nombre'),
					'descripcion'=>$this->input->post('descripcion'),
					'tiempo_planificado'=>$this->input->post('tiempo_planificado'),
					'tiempo_real'=>$this->input->post('tiempo_real'),
					'estado'=>$this->input->post('estado'),
					'actividad'=>$this->input->post('actividad'),
					'responsable'=>$this->input->post('responsable'),
					);
				
				if($ID==-1){
					$data['creador']=$this->user->id;
				}

				if($ID= $this->tarea->save($ID,$data) && $this->actividad->update_status($this->input->post('actividad'))){

					echo json_encode(array('error'=>false,'message'=>'OK','task_id'=>$ID));
				}else{
					echo json_encode(array('error'=>true,'message'=>'Error al guardar'));
				}				
				
			}else{
				$error = validation_errors();
				echo json_encode(array('error'=>true,'message'=> "$error" ) );
			}
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	/**
     * Es llamado cuando se cambia de posición un tarea del backlog para que actualize el orden 
     * de las tareas 
     **/
    public function ordenar(){
        $items = $this->input->post('items');
        $res=array();
        $count=0;

        foreach ($items as $key => $value) {
            if($this->tarea->save(extrar_numeros($value),array('orden'=>$key+1)))
                $count++;
        }
        if($count==count($items))
            echo json_encode(array('error' => false, 'message' => 'TODO BIEN'));
        else 
            echo json_encode(array('error' => true, 'message' => 'Error al guardar'));
    }

    /**
     * Es llamado cuando se cambia de columna una tarea
     **/
    public function asignar_columnas(){
        $items = $this->input->post('items');
        $columna = $this->input->post('columna');
        $estado = $this->input->post('estado');
        $res=array();
        $count=0;

        foreach ($items as $key => $value) {
            if($this->tarea->save(extrar_numeros($value),array('columna'=>$columna, 'estado' => $estado)))
                $count++;
        }
        if($count==count($items))
            echo json_encode(array('error' => false, 'message' => 'TODO BIEN'));
        else 
            echo json_encode(array('error' => true, 'message' => 'Error al guardar'));
    }



	/**
	 * Elimina una tarea
	 *@param integer $tarea_id Clave primaria de la tarea
	 **/
	public function delete($tarea_id){
		if($ID= $this->tarea->delete($tarea_id)){
			echo json_encode(array('error'=>false,'message'=>'TODO BIEN','task_id'=>$tarea_id));
		}else{
			echo json_encode(array('error'=>true,'message'=>'Error al eliminar'));
		}	
	}

	 /**
     * Retorna el listado de tareas pendientes de un usuario
     * @param integer $user Clave primaria del usuario
     */
    public function get_user_tasks($user) {
        echo json_encode($this->tarea->get_by_usuario_estado($user,array(3),true));
    }	
}