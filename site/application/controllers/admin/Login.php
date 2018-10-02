<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."core/controllers/base.php";

class Login extends Base_Controller {

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
	}
	
	public function index(){
		$this->load->helper(array('form', 'url'));
		$this->load->helper('cookie');
		$this->load->library('form_validation');
		
		// validation
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		// check form
		if ($this->form_validation->run() == FALSE){
			$this->parser->parse('admin/login.tpl', $this->data);
		
		} else {
			
			$email = trim($this->input->post('email'));
			$password = trim($this->input->post('password'));
			$pass = md5($password);
			
			$user = \Managers\UsuarioManager::getInstance()->getAdmin($email, $pass);
			//var_dump($user->id); die();
			if (!empty($user)){
				$this->session->set_userdata('login_admin', 'administrador');
				// aca el usuario es una BackUser
				$this->session->set_userdata('login_administradorId', $user->id);
				//$user = \Managers\BackuserManager::getInstance()->getAdmin($email, $pass);
			}else{
			     $this->session->set_userdata('login_administradorId', 0);
			}
			
			redirect('admin');
		
			//redirect($referer);
		}
	}

	
	public function logout(){
		$this->session->set_userdata('login_administradorId', 0);
		$this->session->set_userdata('login_admin', "");
		redirect("/admin/login");
	}
	
	public function recuperar(){
		$result = array();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		var_dump('hacer!!!');
		die();
		// validation
		$this->form_validation->set_rules('email', 'Email', 'required');
		// check form
		if ($this->form_validation->run() == FALSE){	
				$result["status"] = false;
				$result["message"] = "<h4>Lo sentimos</h4><p>El correo electrónico no es correcto.</p>";
		} else {
			$email = trim($_POST['email']);
			if (!$newUsuario = UsuarioManager::getInstance()->getByEmail($email)){
				$result["status"] = false;
				$result["message"] = "<h4>Lo sentimos</h4><p>El correo electrónico no es correcto.</p>";
			}else{
				$newUsuario->codigo= new \Datetime('now');
				UsuarioManager::getInstance()->save($newUsuario);
				$cod = $newUsuario->codigo->format('m-d-Y');
				$codigo = md5($cod);
				$total = base64_encode($email."|".$codigo);
				$total = urlencode($total);
				$federacion = $this->federacionActual;
				$somedata['federacion'] = $federacion;
				$somedata['base']= $total;
				$somedata["usuario"] = $newUsuario;
				$mailbody = $this->parser->parse('mails/recuperar.tpl',$somedata, true);
				MailManager::getInstance()->sendmail($email, "Solicitud de recuperacion de contraseña", $mailbody);

				
				$result["message"] = "<h4>Hemos recuperado tu contraseña</h4><p>Se ha enviado un correo electrónico a tu cuenta explicándote como seguir.</p>";
				$result["status"] = true;
			}
		}
		echo json_encode($result);
			
	}

	public function test_recuperar(){
		
		$inscripcion = Managers\InscripcionManager::getInstance()->get(746);
		$this->data['inscripcion'] = $inscripcion;

		$federacion = $this->federacionActual;
		$this->data['federacion'] = $federacion;
		$this->data['usuario'] = 'Nombre de Usuario ';	
		$this->data['base'] = 130;			
	
		//$mailbody = $this->parser->parse('mails/contacto.tpl', $this->data, true);
		$mailbody = $this->parser->parse('mails/recuperar.tpl',$this->data, true);	

		echo $mailbody;
	}
	
	public function cambiarpass($data = ""){
		
		$data = strval($data);
		$url=urldecode($data);
		$url=base64_decode($url);
		$email=substr($url,0,strpos($url,'|'));
		$verifica_email=UsuarioManager::getInstance()->getByEmailVerifica($email);
		if ($verifica_email==1){
			$usuario=UsuarioManager::getInstance()->getByEmail($email);
			$newUsuario = UsuarioManager::getInstance()->get($usuario);
			$cod=md5($newUsuario->codigo->format('m-d-Y'));
			$codigo=explode('|',$url);
			//$verifica_fecha=UsuarioManager::getInstance()->getByCodigo($email);
			if ($codigo[1]==$cod){
			$this->data['user']=$newUsuario;
			$this->data['pageTitle'] = "Diego Dap's | Recupere su contraseña";
			$this->parser->parse('admin/cambiarpass.tpl', $this->data );	
			//$this->parser->parse('cambiarpass.tpl');	
			}else{
				redirect("/");	
			}
		}else{
			redirect("/");
		}
		
		}		

	public function restablecer(){
		$error="";
		$email = trim($_POST['email']);
		$email_v = trim($_POST['email_v']);
		$pass = md5(trim($_POST['pass']));
		$pass2 = md5(trim($_POST['pass2']));
		if ($_POST['pass']==""){
			$error = $error."El campo contraseña no puede estar vacio."."\n";
		}
		if ($_POST['pass2']==""){
			$error = $error."El campo Repita Contraseña no puede estar vacio."."\n";
		}
		if ($_POST['email']==""){
			$error = $error."El campo Email no puede estar vacio."."\n";
		}
		if ($_POST['pass'] != $_POST['pass2'] ){
		$error = $error."Las contraseñas deber ser iguales."."\n";
		}
		if (strlen($_POST['pass']) < 5 ){
		$error = $error."La contraseña deber tener al menos 5 caracteres."."\n";
		}
		if (!UsuarioManager::getInstance()->getByEmail($email)){
		$error = $error."El correo es incorrecto."."\n";
		}
		if ($_POST['email'] != $_POST['email_v'] ){
		$error = $error."El correo ingresado es distinto al enviado a su correo electronico."."\n";
		}
		
		
		$result = array();
		
		if ($error == "") {
			$result['status'] = true;
			$result['message'] = '<h4>Felicitaciones!</h4><p>Se ha modificado correctamente su contraseña.</p>';
			
			$newUsuario = UsuarioManager::getInstance()->getByEmail($email);
//			$newUsuario = UsuarioManager::getInstance()->get($usuario);
			$newUsuario->pass = $pass;			
			UsuarioManager::getInstance()->save($newUsuario);
			/*
			$this->doctrine->em->persist($newUsuario);
			$this->doctrine->em->flush();
			*/
			// $this->parser->parse('cambiarpassok.tpl', $this->data );	
		} else {
			$result['status'] = false;
			$result['message'] = "<h4>Lo sentimos!</h4><p>$error</p>";
				//$_SESSION['error'] = $error;
			//$this->data['error']=$error;
			//$this->parser->parse('cambiarpassfail.tpl', $this->data );	
		}
		
		echo json_encode($result);
	}	
	

}