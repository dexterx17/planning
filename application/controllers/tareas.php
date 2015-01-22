<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con las subtareas de las actividades del BACKLOG
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Tareas extends MY_Controller {
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de un proyecto
	 * 
	 * @param $clave Clave primaria de la tarea EJ: 2
	 * @param $actividad Clave primaria de la actividad a la que pertenece la tarea EJ: 10
	 */
	public function nuevo($clave=-1,$actividad)
	{
		try{
			
			$data['controller_name'] = "tareas";
			$data['info']=(array)$this->tarea->get_info($clave);
			$data['actividad']=$actividad;
            $data['estados_tarea'] = $this->configuracion->get_comboBox('estado_tarea');
			$this->load->view('backlog/form_tarea',$data);
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
			
			$data['controller_name'] = "tareas";
			$data['tarea']=(array)$this->tarea->get_info($clave);
			//$data['actividad']=$actividad;
            $data['estados_tarea'] = $this->configuracion->get_comboBox('estado_tarea');
			$this->load->view('backlog/block_tarea',$data);
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
					'actividad'=>$this->input->post('actividad')
					);
				
				if($ID==-1){
					$data['creador']=$this->user->id;
				}

				if($ID= $this->tarea->save($ID,$data)){
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
}