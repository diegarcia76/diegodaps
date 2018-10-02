<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base.php";

class Profile extends Base_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		if(!$this->actualUser){
			redirect('login');
		}
	}

	public function index(){
		$this->data['editionInSidebar'] = true;
		$this->data['aProfesiones'] = \Managers\ProfesionManager::getInstance()->getAll();
		$this->parser->parse('profile/form.tpl', $this->data);
	}


	public function historial(){
		// TODO: Reemplazar por las verdaderas historias de la base de datos...
		$diaActual = new DateTime('now');		
		$this->data['turnosVencidos'] = \Managers\TurnoManager::getInstance()->getByClienteVencidos($this->actualUser, $diaActual);
		$this->parser->parse('profile/historial.tpl', $this->data);
	}


	public function ficha_historia($historia_id){
		$this->data['hideSidebar'] = true;
		$this->parser->parse('profile/historia-ficha.tpl', $this->data);
	}

	public function save(){
		$this->load->library('form_validation');
		
		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al perfil';
		$result['title'] = 'Error en el formulario';

		if($this->actualUser){
		
			$user_id = intval($this->input->post('user_id'));
			$email = trim($this->input->post('email'));
			$telefono = $this->input->post('telefono');
			$nombre = $this->input->post('nombre');
			$fecha_nacimiento = $this->input->post('fecha_nacimiento');		
			$profesion_id = $this->input->post('profesion');
			$whatsapp = $this->input->post('whatsapp');
			$facebook = $this->input->post('facebook');
			$twitter = $this->input->post('twitter');			
			$password = $this->input->post('password');
			$password2 = $this->input->post('password2');
			
			if ($user_id){
				if (!$editBackuser = Managers\ClienteManager::getInstance()->get($user_id)){
					$result['message'] = 'Error en la llamada';
					echo json_encode($result);
					die();
				}
			}

			if ($password && ($password != $password2)) {
				$result['message'] = 'Error en el password';
				echo json_encode($result);
				die();
			}
						
			if (($nombre == '') || ($email == '')){
					$result['message'] = 'Error en los datos';
					echo json_encode($result);
					die();
			}
			
			if (!$this->form_validation->valid_email($email)){
					$result['message'] = 'El email no es válido';
					echo json_encode($result);
					die();
			}
			
			if (!Managers\ClienteManager::getInstance()->esUnicoEmail($email, $user_id)){
					$result['message'] = 'Ya existe un Cliente con ese correo';
					echo json_encode($result);
					die();
			}

			$aProfesion = Managers\ProfesionManager::getInstance()->get($profesion_id);			
			
			$editBackuser->nombre = $nombre;
			$editBackuser->facebook = $facebook;
			$editBackuser->telefono = $telefono;
			if($fecha_nacimiento != '')
				$editBackuser->fecha_nacimiento = Datetime::createFromFormat('d-m-Y', $fecha_nacimiento);
			else
				$editBackuser->fecha_nacimiento = null;
			$editBackuser->email  = $email;
			$editBackuser->profesion = $aProfesion;
			$editBackuser->whatsapp = $whatsapp;
			$editBackuser->twitter = $twitter;	

			if ($password){
				$editBackuser->pass = md5($password);
			}		
			
			$editBackuser = Managers\ClienteManager::getInstance()->save($editBackuser);
			
			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado al perfil!';
			$result['status'] = true;
			$result['data'] = $this->input->post();
		
		}else{
			$result['title'] = 'Error de permisos';
		}

		echo json_encode($result);
	}


	public function guardar_imagen(){

		if($this->actualUser){

			$user_id = $this->input->post('user_id');
			$editUser = Managers\ClienteManager::getInstance()->get($user_id);
					
			if(isset($_FILES['upload']['tmp_name'])){
				$imagen = $_FILES['upload']['tmp_name'];
				//var_dump($imagen); die();
				$newImagen = Managers\ImagenManager::getInstance()->create($imagen,'jpg', null, null, null, false);
				$newImagen->temporal = false;
				$editUser->foto = $newImagen;
				$newImagen->cliente = $editUser;
			}

			$editUser = Managers\ClienteManager::getInstance()->save($editUser);
			//var_dump($editUser); die();
			
			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado la foto!';
			$result['status'] = true;
			$result['data'] = $this->input->post();

			echo json_encode($result);
		}


	}


}
