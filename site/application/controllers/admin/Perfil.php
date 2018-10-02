<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Perfil extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/perfil/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'perfil';
		$this->data['pageSubtitle'] = 'Perfil';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		$aUser = $this->actualBackuser;

		$this->data['editUser'] = $aUser;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'form.tpl', $this->data);
	}
	
	public function save(){
		$this->load->library('form_validation');
		
		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al cliente';
		$result['title'] = 'Error en el formulario';
		
//		echo "<pre>", print_r($_FILES), "</pre>"; 
//		echo "<pre>", print_r($_POST), "</pre>"; die();

		if ($this->actualBackuser){
			
			$user_id = intval($this->input->post('user_id'));
			$nombre = trim($this->input->post('nombre'));					
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$password2 = $this->input->post('password2');
						
			$editUser = $this->actualBackuser;
			/*if(count($url_slug_exists) > 0){
				$result['message'] = 'Ya existe un cliente con ese url_slug!!';
				echo json_encode($result);
				die();
			}*/

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
			
			if (!Managers\UsuarioManager::getInstance()->esUnicoEmail($email, $user_id)){
					$result['message'] = 'Ya existe un cliente con ese correo';
					echo json_encode($result);
					die();
			}

			$editUser->nombre = $nombre;
			$editUser->email  = $email;
			
			if ($password){
				$editUser->pass = md5($password);
			}
			
			$editUser = Managers\UsuarioManager::getInstance()->save($editUser);
			//var_dump($editUser); die();
			
			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado el Perfil!';
			$result['status'] = true;
			$result['data'] = $this->input->post();

		}else{
			$result['title'] = 'Error de permisos';
		}
		
		echo json_encode($result);
		
	}	

}
