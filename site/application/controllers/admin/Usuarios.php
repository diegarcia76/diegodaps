<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Usuarios extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/usuarios/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'usuarios';
		$this->data['pageSubtitle'] = 'Usuarios';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		$aUsuarios = Managers\UsuarioManager::getInstance()->getAll();
		
		/*if(!$this->federacionActual->principal){
			//$aFederacion = \Managers\FederacionManager::getInstance()->get($this->actualUser->federacion);
			\Managers\PaymentManager::getInstance()->setJoinDeFederacion($this->federacionActual);
			$cant_usuarios = count($this->federacionActual->usuarios);
		}else{
			$cant_usuarios = count($aUsuarios);
		}
		//var_dump($cant_usuarios);

		
		$fecha_desde = new DateTime();
		$fecha_desde->modify('-60 days');
		$aRecaudacion = Managers\PaymentManager::getInstance()->getRecaudacionXUltimosDias($fecha_desde);

		$aEventos = Managers\PaymentManager::getInstance()->getMontosUltimosEventos(4);

		$this->data['cantidad_usuarios'] = $cant_usuarios;
		$this->data['aEventos'] = $aEventos;
		$this->data['recaudacion'] = round($aRecaudacion,2);
		$this->data['pageTitle'] = 'Estadísticas '.$this->federacionActual->nombre;*/
		$this->data['aUsuarios'] = $aUsuarios;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'listado.tpl', $this->data);
	}


	public function add(){

		if ($this->actualBackuser->perfil->id){
			$breadcrumb = array();
			$breadcrumb['Usuarios'] = $this->controller_url('');
			$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
			$this->data['breadcrumb'] = $breadcrumb;			
			
			$this->data['aPerfiles'] = \Managers\PerfilManager::getInstance()->getAll();
			$this->data['submenuactive'] = 'add';
			$this->data['pageTitle'] = 'Agregar nuevo Usuario';
			$this->parser->parse($this->parsePath.'form.tpl', $this->data);
		}else{
			redirect('admin');
		}

	}

	public function eliminar($usuario_id){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar usuario';
		$result['message'] = 'Imposible eliminar el usuario';

		if ($this->actualBackuser->perfil->id){

			if ($aUsuario = Managers\UsuarioManager::getInstance()->get($usuario_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					$result['message'] = 'El usuario que trata de eliminar no es de esta federación';
				}else{*/
				Managers\UsuarioManager::getInstance()->delete($aUsuario);
				$result["title"]   = "Usuario eliminado";
				$result["status"]  = true;
				$result["message"] = 'Se ha eliminado al usuario';
				//}
			}
		}else{
			$result['title'] = 'Error de permisos';
		}
		
		echo json_encode($result);
	}
	
	public function editar($usuario_id){

		if ($this->actualBackuser->perfil->id){

			if ($editUser = Managers\UsuarioManager::getInstance()->get($usuario_id)){
				
				$this->data['editAdministrador'] = $editUser;
				$this->data['aPerfiles'] = \Managers\PerfilManager::getInstance()->getAll();
				$breadcrumb = array();
				$breadcrumb['Usuarios'] = $this->controller_url('admin/usuarios');
				$breadcrumb['Editar Usuario'] = $this->controller_url('admin/usuarios/editar/'.$usuario_id);
				$this->data['breadcrumb'] = $breadcrumb;				
		
				$this->data['submenuactive'] = '';
				$this->data['pageTitle'] = 'Editar Usuario';
				$this->parser->parse($this->parsePath.'form.tpl', $this->data);
			} else {
				redirect($this->controller_url());
			}
		}else{
			redirect('admin');
		}

	}

	public function ver($usuario_id){

		if ($this->actualBackuser->perfil->id){

			if ($aUsuario = Managers\UsuarioManager::getInstance()->get($usuario_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					redirect('admin/usuarios');
				}*/			
				$breadcrumb = array();
				$breadcrumb['Usuarios'] =  $this->controller_url('admin/usuarios');
				$breadcrumb[$aUsuario->nombre] =  $this->controller_url('admin/usuarios/ver/'.$aUsuario->id);
				$this->data['breadcrumb'] = $breadcrumb;

				$this->data['contentTitle'] = $aUsuario->nombre;
				$this->data['contentSubtitle'] = 'Id '.$aUsuario->id;
				
				$this->data['usuario'] = $aUsuario;

				$this->parser->parse('admin/usuarios/ver.tpl', $this->data);
				
			} else {
				redirect('admin/usuarios');
			}
		}else{
			redirect('admin');
		}
	}
	
	public function save(){
		$this->load->library('form_validation');
		
		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al usuario';
		$result['title'] = 'Error en el formulario';
		
//		echo "<pre>", print_r($_FILES), "</pre>"; 
//		echo "<pre>", print_r($_POST), "</pre>"; die();

		if ($this->actualBackuser->perfil->id){
			
			$user_id = intval($this->input->post('usuario_id'));
			$perfil_id = intval($this->input->post('perfil'));
			$nombre = trim($this->input->post('nombre'));
								
			$email = $this->input->post('email');

			$password = $this->input->post('password');
			$password2 = $this->input->post('password2');

			/*$borrar_imagen = $this->input->post('borrar_imagen');
			$imagen = $this->input->post('imagen');*/
			$activo = $this->input->post('activo');
			
			if (!$activo){
				$activo = 0;
			}
			
			if ($user_id){
				//$url_slug_exists = Managers\UsuarioManager::getInstance()->url_slug_exists($url_slug, $user_id);
				if (!$editUser = Managers\UsuarioManager::getInstance()->get($user_id)){
					$result['message'] = 'Error en la llamada';
					echo json_encode($result);
					die();
				}
			} else {
				//$url_slug_exists = Managers\UsuarioManager::getInstance()->url_slug_exists($url_slug);
				$editUser = Managers\UsuarioManager::getInstance()->create();
				$editUser->fecha_alta  = new DateTime('now');
				if (!$password){
					$result['message'] = 'Debe ingresar una contraseña';
					echo json_encode($result);
					die();
				} 				
			}

			/*if(count($url_slug_exists) > 0){
				$result['message'] = 'Ya existe un usuario con ese url_slug!!';
				echo json_encode($result);
				die();
			}*/

			if ($password && ($password != $password2)) {
				$result['message'] = 'Error en el password';
				echo json_encode($result);
				die();
			}

			/*if(isset($_FILES['imagen']['tmp_name'])){
				$imagen = $_FILES['imagen']['tmp_name'];
				//var_dump($imagen); die();
				$newImagen = Managers\ImagenManager::getInstance()->create($imagen);
				$newImagen->temporal = false;
				$editUser->foto = $newImagen;
				$newImagen->usuario = $editUser;
			}
			
			if($borrar_imagen==1){
				$editUser->foto = null;
			}*/			
						
			if (($nombre == '') || ($email == '') || ($perfil_id == '')){
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
					$result['message'] = 'Ya existe un usuario con ese correo';
					echo json_encode($result);
					die();
			}

			$aPerfil = \Managers\PerfilManager::getInstance()->get($perfil_id);

			$editUser->nombre = $nombre;
			$editUser->email  = $email;
			$editUser->perfil  = $aPerfil;
			$editUser->activo  = $activo;
			
			if ($password){
				$editUser->pass = md5($password);
			}
			
			$editUser = Managers\UsuarioManager::getInstance()->save($editUser);
			//var_dump($editUser); die();
			
			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado el Usuario!';
			$result['status'] = true;
			$result['data'] = $this->input->post();

		}else{
			$result['title'] = 'Error de permisos';
		}
		
		echo json_encode($result);
		
	}
	

	public function datasource(){
		// Data for Data-Tables

		/*if($this->session->userdata('login_admin')=='administracion'){
			//$aFederacion = \Managers\FederacionManager::getInstance()->get($this->federacionAc->id);
			\Managers\UsuarioManager::getInstance()->setJoinDeAdministracion($this->administracionActual);
		}*/

		$data = \Managers\UsuarioManager::getInstance()->getDatatableDatasource($this->input->post());
		echo $data;
	}


}
