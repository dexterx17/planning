<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Permite realizar operaciones de mantenimiento con las personas
 * 
 * @author Jaime Santana
 * @package planning
 * @subpackage controllers
 */
class Peoples extends CI_Controller {

    /**
     * Muestra una vista con el listado de personas involucradas en el proyecto
     * @param integer $proyecto Clave primaria del proyecto
     */
    public function index($proyecto) {
        try {

            $data['controller_name'] = 'peoples';
            $data['proyecto'] = $proyecto;
            $ultimo = $this->input->post('ultimo_id');

            if ($ultimo) {
                $nuevos_datos = $this->people->get_with_limits(0);
                if ($nuevos_datos) {
                    foreach ($nuevos_datos as $fila) {
                        get_row_people($fila, $data['items']);
                    }
                }
            } else {
                $data['people']=$this->people->get_with_limits(0);
                $this->load->view('people/manager', $data);
            }
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

	/**
	 * Muestra una vista con el listado de personas y los botones realizar operaciones CRUD
	 */
	public function admin()
	{
		try{
			
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));

			//LATITUD - LONGITUD 
			$config['center'] = '-1.2403298, -78.6285244';
			//$config['backgroundColor']="red";
			// valid types are hybrid, satellite, terrain, map
			//$config['setMapType']="map";
			$config['directionsDivID']="direccion";
			$config['clickable']="TRUE";
			//$config['onclick']="return clicksillo;";
			//$config['onclick'] = 'createMarker({ map: map, position:event.LatLng });';
			$config['onclick'] = 'createMarker(map,event.latLng);';
			//$config['jsfile']=site_url('js/maps.js');

			//Para produccion
			$config['minifyJS'] = TRUE;
			//Para activar CACHE y se guardar en la BDD las localizaciones
			//$config['geocodeCaching'] = TRUE;
			//$config['zoom'] = 'auto';
			$this->googlemaps->initialize($config);

			$ultimo = $this->input->post('ultimo_id');
			if($ultimo)
			{
	            $nuevos_datos = $this->people->get_with_limits($ultimo);
	            if($nuevos_datos){      
		            foreach ($nuevos_datos as $fila) {
		            		get_row_people($fila,$data['items']);
			            }
			         }
	      }	else{
			$data['items']=$this->people->get_with_limits(0);
			foreach ($data['items'] as $key => $value) {
				$marker = array();
				$marker['position'] = $value->latitud.','.$value->longitud;
				$marker['title'] = $value->nick;
				$marker['infowindow_content'] = '<div class="panel"><div class="panel-body">'.$value->latitud.','.$value->longitud.'</div></div>';
				$this->googlemaps->add_marker($marker);
			}
			
			$data['map'] = $this->googlemaps->create_map();
			$this->load->view('people/manage',$data);
		  }
		  
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de una persona
	 * 
	 * @param integer $clave Clave primario de la Persona EJ: 2
	 */
	public function nuevo($clave=-1)
	{
		try{
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			//LATITUD - LONGITUD 
			$config['center'] = '-1.2403298, -78.6285244';
			$info=(array)$this->people->get_info($clave);
			$data['info']=$info;
			if(!empty($info['latitud'])&&!empty($info['longitud'])){
				$marker = array();
				$marker['position'] = $info['latitud'].','.$info['longitud'];
				$marker['title'] = $info['nick'];
				$marker['infowindow_content'] = '<div class="panel"><div class="panel-body">'.$info['latitud'].','.$info['longitud'].'</div></div>';
				$config['clickable']="TRUE";
				$marker['draggable'] = true;
				$marker['ondragend'] = 'onDragMarker(event);';
				$this->googlemaps->add_marker($marker);
			}else{
				$config['onclick'] = 'createMarker(map,event.latLng);';
			}
			$this->googlemaps->initialize($config);
			$data['map'] = $this->googlemaps->create_map();
			$this->load->view('people/form',$data);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	/**
	 * Muestra un formulario que permite ingresar y modificar los datos de una persona
	 * 
	 * @param integer $clave Clave primario de la Persona EJ: 2
	 */
	public function perfil($clave=-1)
	{
		try{
			$data['controller_name'] = strtolower($this->uri->segment($this->config->item('index_seg_controller')));
			//LATITUD - LONGITUD 
			$config['center'] = '-1.2403298, -78.6285244';
			$info=(array)$this->people->get_info($clave);
			$data['info']=$info;
			if(!empty($info['latitud'])&&!empty($info['longitud'])){
				$marker = array();
				$marker['position'] = $info['latitud'].','.$info['longitud'];
				$marker['title'] = $info['nick'];
				$marker['infowindow_content'] = '<div class="panel"><div class="panel-body">'.$info['latitud'].','.$info['longitud'].'</div></div>';
				$config['clickable']="TRUE";
				$marker['draggable'] = true;
				$marker['ondragend'] = 'onDragMarker(event);';
				$this->googlemaps->add_marker($marker);
			}else{
				$config['onclick'] = 'createMarker(map,event.latLng);';
			}
			$this->googlemaps->initialize($config);
			$data['map'] = $this->googlemaps->create_map();
			$this->load->view('people/perfil',$data);
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
			$ID = $this->input->post('ID')==''? -1 :$this->input->post('ID');
			if($ID==-1){
				$this->form_validation->set_rules('nick',lang('comun_nick'),'trim|required|min_length[5]|max_length[30]|is_unique[people.nick]'); 
			}else{
				$this->form_validation->set_rules('nick',lang('comun_nick'),'trim|required|min_length[5]|max_length[30]'); 
			}
			$this->form_validation->set_rules('nombres',lang('comun_names'),'trim|required|alpha');
			$this->form_validation->set_rules('apellidos',lang('comun_lastnames'),'trim|required|alpha');
			$this->form_validation->set_rules('email',lang('comun_email'),'required|valid_email');
			//$this->form_validation->set_rules('password',lang('comun_password'),'required|matches[repassword]|md5');
			//$this->form_validation->set_rules('repassword',lang('comun_repassword'),'required');
			
			
		
			if($this->form_validation->run()==TRUE){
				
				$data=array(
					'nick'=>$this->input->post('nick'),
					'nombres'=>$this->input->post('nombres'),
					'apellidos'=>$this->input->post('apellidos'),
					'direccion'=>$this->input->post('direccion'),
					'email'=>$this->input->post('email'),
					'telefono'=>$this->input->post('telefono'),
					'celular'=>$this->input->post('celular'),
					'latitud'=>$this->input->post('latitud'),
					'longitud'=>$this->input->post('longitud'),
					);
					
				if($this->people->save($ID,$data)){
					echo json_encode(array('error'=>false,'message'=>'TODO BIEN'));
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
	 * Sube la imagen de perfil del usuario
	 *@param integer $documento_id 
	 **/
	public function upload_pic($user_id){
		header('Content-Type: application/json');
		$info=(array)$this->people->get_info($user_id);
		//$data['pmp'] = $modulo_id;
		if ($_FILES['userfile']['error'] !== 0) {
			echo json_encode(array('error' => false, 'message' => 'Error al guardar archivo. Código de error ' . $_FILES['userfile']['error']));
			break;
		}else{
			$tld = explode('.', $_FILES['userfile']['name']);
		    $tld = $tld[count($tld) - 1];

			$config['upload_path']   =   "uploads/profiles/";
		   $config['allowed_types'] =   "gif|jpg|jpeg|png";
		   $config['max_size']      =   "1024";
		   $config['max_width']     =   "1907";
		   $config['max_height']    =   "1280";
		   $config['overwrite']     =   true;
		   $config['remove_spaces'] =   true;
		   $config['file_name']    =   sha1($user_id);


	       $this->load->library('upload',$config);
	       if(!$this->upload->do_upload())
	       {
	       		echo json_encode(array('error'=>true,'message'=>$this->upload->display_errors()));
	       }
	       else
	       {
	       	   $finfo=$this->upload->data();
			   $this->people->save($user_id,array('imagen'=>$finfo['file_name']));
			   echo json_encode(array('error'=>false,'message'=>'Imagen guardada correctamente','filename'=>$finfo['file_name']));
      		}
		}
	}

	/**
	 * envia el ID para eliminar una persona
	 * 
	 * @param integer $clave Clave primario de la persona EJ: 2
	 */
	public function delete($clave=-1){
		if($this->people->delete($clave)){
				echo json_encode(array('error'=>false,'message'=>'TODO BIEN'));
			}else{
				echo json_encode(array('error'=>true,'message'=>'Error al eliminar'));
			}	
	}

	
// Image resize function with php + gd2 lib
function imageresize($source, $destination, $width = 0, $height = 0, $crop = false, $quality = 80) {
    $quality = $quality ? $quality : 80;
    $image = imagecreatefromstring($source);
    if ($image) {
        // Get dimensions
        $w = imagesx($image);
        $h = imagesy($image);
        if (($width && $w > $width) || ($height && $h > $height)) {
            $ratio = $w / $h;
            if (($ratio >= 1 || $height == 0) && $width && !$crop) {
                $new_height = $width / $ratio;
                $new_width = $width;
            } elseif ($crop && $ratio <= ($width / $height)) {
                $new_height = $width / $ratio;
                $new_width = $width;
            } else {
                $new_width = $height * $ratio;
                $new_height = $height;
            }
        } else {
            $new_width = $w;
            $new_height = $h;
        }
        $x_mid = $new_width * .5;  //horizontal middle
        $y_mid = $new_height * .5; //vertical middle
        // Resample
        error_log('height: ' . $new_height . ' - width: ' . $new_width);
        $new = imagecreatetruecolor(round($new_width), round($new_height));
        imagecopyresampled($new, $image, 0, 0, 0, 0, $new_width, $new_height, $w, $h);
        // Crop
        if ($crop) {
            $crop = imagecreatetruecolor($width ? $width : $new_width, $height ? $height : $new_height);
            imagecopyresampled($crop, $new, 0, 0, ($x_mid - ($width * .5)), 0, $width, $height, $width, $height);
            //($y_mid - ($height * .5))
        }
        // Output
        // Enable interlancing [for progressive JPEG]
        imageinterlace($crop ? $crop : $new, true);

        $dext = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
        if ($dext == '') {
            $dext = $ext;
            $destination .= '.' . $ext;
        }
        switch ($dext) {
            case 'jpeg':
            case 'jpg':
                imagejpeg($crop ? $crop : $new, $destination, $quality);
                break;
            case 'png':
                $pngQuality = ($quality - 100) / 11.111111;
                $pngQuality = round(abs($pngQuality));
                imagepng($crop ? $crop : $new, $destination, $pngQuality);
                break;
            case 'gif':
                imagegif($crop ? $crop : $new, $destination);
                break;
        }
        @imagedestroy($image);
        @imagedestroy($new);
        @imagedestroy($crop);
    }
}
}
