<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Clientes extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/clientes/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'clientes';
		$this->data['pageSubtitle'] = 'Clientes';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		// $aClientes = Managers\ClienteManager::getInstance()->getAll();
		
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
		// $this->data['aClientes'] = $aClientes;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'listado.tpl', $this->data);
	}


	public function add(){

		if ($this->actualBackuser->perfil->id){
			$breadcrumb = array();
			$breadcrumb['Clientes'] = $this->controller_url('');
			$breadcrumb['Agregar nuevo Cliente'] = $this->controller_url('add');
			$this->data['breadcrumb'] = $breadcrumb;

			$aConfig = \Managers\ConfiguracionManager::getInstance()->get(1);
			$fechaActual = new \Datetime('now');
			$fecha_desbloqueo = clone($fechaActual);
			$fecha_desbloqueo->modify('+ '.$aConfig->dias_bloqueado.' days');
			$this->data['fecha_desbloqueo'] = $fecha_desbloqueo;
			
			$this->data['submenuactive'] = 'add';
			$this->data['pageTitle'] = 'Agregar nuevo Cliente';
			$this->parser->parse($this->parsePath.'form.tpl', $this->data);
		}else{
			redirect('admin');
		}

	}

	public function eliminar($cliente_id){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar cliente';
		$result['message'] = 'Imposible eliminar el cliente';

		if ($this->actualBackuser->perfil->id){

			if ($aCliente = Managers\ClienteManager::getInstance()->get($cliente_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					$result['message'] = 'El usuario que trata de eliminar no es de esta federación';
				}else{*/
				Managers\ClienteManager::getInstance()->delete($aCliente);
				$result["title"]   = "Cliente eliminado";
				$result["status"]  = true;
				$result["message"] = 'Se ha eliminado al cliente';
				//}
			}
		}else{
			$result['title'] = 'Error de permisos';
		}
		
		echo json_encode($result);
	}
	
	public function editar($cliente_id){

		if ($this->actualBackuser->perfil->id){

			if ($editUser = Managers\ClienteManager::getInstance()->get($cliente_id)){
				
				$this->data['editUser'] = $editUser;

				$breadcrumb = array();
				$breadcrumb['Clientes'] = $this->controller_url('');
				$breadcrumb['Editar Cliente'] = $this->controller_url('editar/'.$cliente_id);
				$this->data['breadcrumb'] = $breadcrumb;

				$aConfig = \Managers\ConfiguracionManager::getInstance()->get(1);
				$fechaActual = new \Datetime('now');
				$fecha_desbloqueo = clone($fechaActual);
				$fecha_desbloqueo->modify('+ '.$aConfig->dias_bloqueado.' days');
				$this->data['fecha_desbloqueo'] = $fecha_desbloqueo;			
		
				$this->data['submenuactive'] = '';
				$this->data['pageTitle'] = 'Editar Cliente';
				$this->parser->parse($this->parsePath.'form.tpl', $this->data);
			} else {
				redirect($this->controller_url());
			}
		}else{
			redirect('admin');
		}

	}

	public function ver($cliente_id){

		if ($this->actualBackuser->perfil->id){

			if ($aCliente = Managers\ClienteManager::getInstance()->get($cliente_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					redirect('admin/usuarios');
				}*/
				
				$breadcrumb = array();
				$breadcrumb['Clientes'] = 'admin/clientes/listado';
				$breadcrumb[$aCliente->nombre] = 'admin/clientes/ver/'.$aCliente->id;
				$this->data['breadcrumb'] = $breadcrumb;

				$this->data['contentTitle'] = $aCliente->nombre;
				$this->data['contentSubtitle'] = 'Id '.$aCliente->id;
				
				$this->data['cliente'] = $aCliente;

				$this->parser->parse('admin/clientes/ver.tpl', $this->data);
				
			} else {
				redirect('admin/clientes');
			}
		}else{
			redirect('admin');
		}
	}
	
	public function save(){
		$this->load->library('form_validation');
		
		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al cliente';
		$result['title'] = 'Error en el formulario';
		
//		echo "<pre>", print_r($_FILES), "</pre>"; 
//		echo "<pre>", print_r($_POST), "</pre>"; die();

		if ($this->actualBackuser->perfil->id){
			
			$user_id = intval($this->input->post('user_id'));
			$nombre = trim($this->input->post('nombre'));
					
			$fecha_nacimiento = $this->input->post('fecha_nacimiento');
			$email = $this->input->post('email');
			$telefono = $this->input->post('telefono');
			$puntos_acumulados = $this->input->post('puntos_acumulados');
			$password = $this->input->post('password');
			$password2 = $this->input->post('password2');

			$borrar_imagen = $this->input->post('borrar_imagen');
			$imagen = $this->input->post('imagen');
			$activo = $this->input->post('activo');
			$bloqueado = $this->input->post('bloqueado');
			
			if (!$activo){
				$activo = 0;
			}
			
			if (!$bloqueado){
				$bloqueado = 0;
			}else{
				$fecha_bloqueo = new \Datetime('now');
				$fecha_desbloqueo =  $this->input->post('fecha_desbloqueo');
			}

			if ($user_id){
				//$url_slug_exists = Managers\ClienteManager::getInstance()->url_slug_exists($url_slug, $user_id);
				if (!$editUser = Managers\ClienteManager::getInstance()->get($user_id)){
					$result['message'] = 'Error en la llamada';
					echo json_encode($result);
					die();
				}
			} else {
				//$url_slug_exists = Managers\ClienteManager::getInstance()->url_slug_exists($url_slug);
				$editUser = Managers\ClienteManager::getInstance()->create();
				if (!$password){
					$result['message'] = 'Debe ingresar una contraseña';
					echo json_encode($result);
					die();
				} 				
			}

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

			if(isset($_FILES['imagen']['tmp_name'])){
				$imagen = $_FILES['imagen']['tmp_name'];
				//var_dump($imagen); die();
				$newImagen = Managers\ImagenManager::getInstance()->create($imagen);
				$newImagen->temporal = false;
				$editUser->foto = $newImagen;
				$newImagen->cliente = $editUser;
			}
			
			if($borrar_imagen==1){
				$editUser->foto = null;
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
					$result['message'] = 'Ya existe un cliente con ese correo';
					echo json_encode($result);
					die();
			}

			$editUser->nombre = $nombre;
			$editUser->email  = $email;
			$editUser->telefono  = $telefono;
			$editUser->activo  = $activo;
			$editUser->bloqueado  = $bloqueado;
			if($bloqueado){
				$editUser->fecha_desbloqueo  = Datetime::createFromFormat('d/m/Y', $fecha_desbloqueo);
				$editUser->fecha_bloqueo  = $fecha_bloqueo;
			}else{
				$editUser->fecha_desbloqueo  = null;
				$editUser->fecha_bloqueo  = null;
			}


			if($fecha_nacimiento!='')
				$editUser->fecha_nacimiento  = Datetime::createFromFormat('d/m/Y', $fecha_nacimiento);
		
			$editUser->fecha_alta  = new DateTime('now');
			$editUser->puntos_acumulados  = $puntos_acumulados;

			if ($password){
				$editUser->pass = md5($password);
			}
			
			$editUser = Managers\ClienteManager::getInstance()->save($editUser);
			//var_dump($editUser); die();
			
			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado el Cliente!';
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
			\Managers\ClienteManager::getInstance()->setJoinDeAdministracion($this->administracionActual);
		}*/

		$data = \Managers\ClienteManager::getInstance()->getDatatableDatasource($this->input->post());
		echo $data;
	}
	public function eliminar_todos(){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar Estilista';
		$result['message'] = 'Imposible eliminar el Estilista';

		$lote = $this->input->post('lote');
		
		
		$i =0;
		foreach ($lote as $lot){
			if ($aCliente = Managers\ClienteManager::getInstance()->get($lot)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					$result['message'] = 'El usuario que trata de eliminar no es de esta federación';
				}else{*/
				Managers\ClienteManager::getInstance()->delete($aCliente);
				
			
			}
		}
		
			
				$result["title"]   = "Estilista eliminado";
				$result["status"]  = true;
				$result["message"] = 'Se han eliminado los Estilistas';	
		

		echo json_encode($result);
	}


}
