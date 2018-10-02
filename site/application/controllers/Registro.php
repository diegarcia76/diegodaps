<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base.php";

class Registro extends Base_Controller {

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

	private $usaSDK;

	public function __construct(){
		parent::__construct();

        /*$this->load->config('payu');
        $this->usaSDK = config_item("payu_usa_sdk");

		$this->data['menuitem'] = 'registro';
		$this->data['usaSDK'] = $this->usaSDK;


		$this->smarty->registerClass('PayUManager','\Managers\PayUManager');		*/

		$this->data['menuitem'] = 'registro';
	}


	public function index(){
		//$usuario = \Managers\UsuarioManager::getInstance()->get(1);
		//$this->step1();
		$this->data['profesiones'] = \Managers\ProfesionManager::getInstance()->getAll();
		$this->data['hideSidebar'] = true;
		$this->parser->parse('registro.tpl', $this->data);
	}

	public function mails(){

		$aUsuario = \Managers\UsuarioManager::getInstance()->get(1);
		$userDataMin['id'] = $aUsuario->id;
		$userDataMin['hash'] = \Managers\UsuarioManager::getInstance()->doHash($aUsuario);

		$userData = base64_encode(json_encode($userDataMin));

		$somedata['verificar_link'] = site_url().'registro/verificar/'.$userData;
		$somedata['usuario'] = $aUsuario->nombre;

		/*echo "MAIL DE OLVIDO PASS: <br/>";
		$mailbody = $this->parser->parse('mails/olvidopass.tpl',$somedata, true);
		echo $mailbody.'<hr/>';

		echo "MAIL DE VALIDAR: <br/>";
		$mailbody = $this->parser->parse('mails/validar.tpl',$somedata, true);
		echo $mailbody.'<hr/>';
		*/
		echo "MAIL DE GRACIAS: <br/>";
		$mailbody = $this->parser->parse('mails/gracias.tpl',$somedata, true);
		echo $mailbody.'<hr/>';

		die();

	}

	public function validate_document()
	{
	   if (isset($_POST["documentNumber"])){
			$result=\Managers\UsuarioManager::getInstance()->getByDocument($_POST["documentNumber"]);
	    	if($result){
	 			switch ($result->status){
	 				case 0:
						echo 2;
	 				break;
	 				case 1:
	 					echo 0;
	 				break;
	 				default:
	 					echo 0;
	 				break;
	 			}
	 		}else{
	 			echo 1;
	 		}
		}

	}


	public function email_valid(){
		if (isset($_POST["email"])){
			$result=\Managers\UsuarioManager::getInstance()->getByEmail($_POST["email"]);
			if($result){
				switch ($result->status){
					case 0:
						echo 2;
					break;
					case 1:
						echo 0;
					break;
					default:
						echo 0;
					break;
				}

			}else{
				echo 1;
			}
		}
	}



	public function registrar(){
		//if ($this->input->post()){


			$this->load->helper(array('form', 'url'));
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->database();

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');

			// check form
			$result = array();
			$result['status']  = false;

			$password     		= $this->input->post("password");
			$cpassword    		= $this->input->post("password2");
			$email    	  		= $this->input->post('email');
			$nombre    	  		= $this->input->post('nombre');
			$telefono     		= $this->input->post('telefono');
			$fecha_nacimiento	= $this->input->post('fecha_nacimiento');
			$sexo				= $this->input->post('sexo');
			$profesion 			= $this->input->post('profesion');

			if ($this->form_validation->run() == TRUE){

				if(!$aUser=\Managers\ClienteManager::getInstance()->getByEmail($email)){

					if($password == $cpassword){

						$aUsuario = \Managers\ClienteManager::getInstance()->create();
						$aUsuario->nombre = $nombre;
						$aUsuario->email = $email;
						if($telefono!='')
							$aUsuario->telefono = $telefono;
						$aUsuario->fecha_alta = new Datetime('now');
						$aUsuario->puntos_acumulados = 0;
						if($sexo!='')
							$aUsuario->sexo = $sexo;

						if($profesion>0){
							$aProfesion = \Managers\ProfesionManager::getInstance()->get($profesion);
							$aUsuario->profesion = $aProfesion;
						}

						if($fecha_nacimiento!='')
							$aUsuario->fecha_nacimiento  = Datetime::createFromFormat('d-m-Y', $fecha_nacimiento);

						$aUsuario->activo = false;
						$aUsuario->pass = md5($password);

						$aUsuario = \Managers\ClienteManager::getInstance()->save($aUsuario);

						$userDataMin['id'] = $aUsuario->id;
						$userDataMin['hash'] = \Managers\ClienteManager::getInstance()->doHash($aUsuario);

						$userData = base64_encode(json_encode($userDataMin));

						$somedata['verificar_link'] = site_url().'registro/verificar/'.$userData;
						$contenido = $this->parser->parse('mails/validar.tpl', $somedata, true);

						/*if($aUsuario = \Managers\UsuarioManager::getInstance()->get($aUsuario->id)){
							$aUsuario->codigo = MD5($email.'-'.$aUsuario->id);
							$aUsuario = \Managers\UsuarioManager::getInstance()->save($aUsuario);
						}*/

						if(\Managers\MailManager::getInstance()->sendMail($email, 'Valida tu correo', $contenido)){

							$result['message'] = 'Te enviamos un email a tu correo con las instrucciones para activar tu cuenta.';
							$result['title'] = '¡Gracias por registrarte!';
							$result['status']  = true;
						}else{
							$result['message'] = 'Por favor, intentá nuevamente más tarde';
							$result["status"] = false;
							$result['title'] = 'Ups! parece que hubo un problema en el registro';
						}

					}else{

						$result['message'] = 'Revisalas, por favor';
						$result['title'] = 'Las contraseñas no coinciden';
						$result['status']  = false;
					}

				}else{

					$result['message'] = 'Parece que alguien ya está registrado con ese email. ¿Sos vos?';
					$result['title'] = '¿Nos conocemos?';
					$result['status']  = false;
				}


			} else {
				$result['status']  = false;
				//$result['message'] = $this->form_validation->error_array();
				$result['message'] = 'Intentá nuevamente más tarde';
				$result['title'] = 'Parece que hubo un error en el fomrmulario';
			}

			echo json_encode($result);


	}


	public function verificar($hasdata = null){

		if (!empty($hasdata)){
			$decodeHash = base64_decode($hasdata);
			$userData = json_decode($decodeHash);

			if ($aUser = \Managers\ClienteManager::getInstance()->get($userData->id)){
				$actualHash = \Managers\ClienteManager::getInstance()->doHash($aUser);
				if ($actualHash == $userData->hash){
					$aUser->activo = true;
					$aUser = \Managers\ClienteManager::getInstance()->save($aUser);
					//$this->data['validado']=1;
					$this->parser->parse('verificar.tpl', $this->data);

				} else {
					redirect('/');
				}
			} else {
				redirect('/');
			}
		} else {
			redirect('/');
		}
	}


	public function pagoexitoso(){
		$this->parser->parse('registro/step4.tpl',$this->data);
	}

	public function pagogratis(){
		$this->parser->parse('registro/stepgratis.tpl',$this->data);
	}

	public function gratis(){
		$this->parser->parse('registro/gratis.tpl',$this->data);
	}

	public function errorgratis(){
		$this->parser->parse('registro/errorgratis.tpl',$this->data);
	}

	public function pagoerror($message = null){
		$this->load->library('encrypt');
		$decrypted_string = $this->encrypt->decode( base64_decode($message) );
		$this->data['error_message'] = $decrypted_string;
		$this->parser->parse('registro/error.tpl',$this->data);
	}


	public function checklogin(){


		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible realizar el login.';

		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$recordar = $this->input->post('recordar');
		$pass = md5($pass);

		$this->session->unset_userdata('login_id');

		if ($username) {
			if ($pass){
				if ($aUser = \Managers\ClienteManager::getInstance()->getLogin($username, $pass)){
					$this->session->set_userdata('login_id', $aUser->id);

					if($recordar){
						$cookie = array(
							'name'   => 'usuario',
							'value'  => $username,
							'expire' => '86500',
							'secure' => TRUE
						);
						$this->input->set_cookie($cookie);
						$cookie = array(
							'name'   => 'clave',
							'value'  => $pass,
							'expire' => '86500',
							'secure' => TRUE
						);
						$this->input->set_cookie($cookie);
					}

					$result['calendario'] = false;

					if($this->session->userdata('startEvento')){
						$result['calendario'] = true;
						$result['startEvento'] = $this->session->userdata('startEvento');
						$result['servicio_id'] = $this->session->userdata('servicio_id');
					}

					$result['status'] = true;
				} else {
						$result['message'] = 'Usuario o clave incorrectos.';
				}
			} else {
				$result['message'] = 'Por favor, ingresá una clave.';
			}
		} else {
			$result['message'] = 'Por favor, ingresá un correo electrónico válido.';
		}

		echo json_encode($result);
	}

	public function logout(){
		$this->session->unset_userdata('login_id');
		redirect('/');
	}

	public function correo(){

			$somedata['name'] = 'nacho albano';
			$somedata['mensaje'] = "Bienvenido";

			$inscripcion_id = 1;

			if ($aInscripcion = \Managers\InscripcionManager::getInstance()->get($inscripcion_id)){
				$pdf = \Managers\PdfManager::getInstance()->generarCuponInscripcion($aInscripcion, 'S');

				$arr_arr[0]['archivoStr'] = $pdf;
				$arr_arr[0]['filename'] = 'cupon.pdf';

				$mailbody = $this->parser->parse('mails/bienvenida.tpl',$somedata, true);
				//\Managers\MailManager::getInstance()->sendmail('ighirlanda@gmail.com',"Bievenida", $mailbody, $arr_arr);
				echo $mailbody;

			}




	}


	public function olvidopass(){
		if ($this->input->post()){
			$result = array();
			$result['status']  = false;
			$result['message'] = '';

			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run() == TRUE){
				$email = trim($this->input->post('email'));
				if (!$newUsuario = \Managers\ClienteManager::getInstance()->getByEmail($email)){
					$result["status"] = false;
					$result["message"] = 'Eso no parece una cuenta de correo. Revisalo. ';
				} else {
					/*$newUsuario->codigo= new \Datetime('now');
					\Managers\UsuarioManager::getInstance()->save($newUsuario);
					$cod = $newUsuario->codigo->format('m-d-Y h:i:s');
					$codigo = md5($cod);
					$total = base64_encode($email."|".$codigo);
					$total = urlencode($total);
					$somedata['base']= $total;
					$somedata["usuario"] = $newUsuario->nombre;*/

					$userDataMin['id'] = $newUsuario->id;
					$userDataMin['hash'] = \Managers\ClienteManager::getInstance()->doHash($newUsuario);

					$userData = base64_encode(json_encode($userDataMin));

					$somedata['verificar_link'] = site_url().'registro/resetPassword/'.$userData;
					//$contenido = $this->parser->parse('mails/validar.tpl', $somedata, true);

					if($aUsuario = \Managers\ClienteManager::getInstance()->get($newUsuario->id)){
						//$aUsuario->codigo = MD5($email.'-'.$aUsuario->id);
						//$aUsuario = \Managers\ClienteManager::getInstance()->save($aUsuario);
						$somedata['usuario'] = $aUsuario->nombre;
					}

					$mailbody = $this->parser->parse('mails/olvido.tpl',$somedata, true);
					\Managers\MailManager::getInstance()->sendmail($email, 'Recuperar tu contraseña', $mailbody);

					$result["message"] = '¡Todo listo! ya recuperaste tu contraseña. Te enviamos un correo electrónico explicándote como seguir.';
					$result["status"] = true;

				}

			} else {
				$result["status"] = false;
				$result["message"] = 'Eso no parece una cuenta de correo. Revisalo.';

			}

			echo json_encode($result);

		} else {
			$this->data['hideSidebar'] = true;
			$this->parser->parse('olvidopass.tpl',$this->data);
		}

	}


	public function resetPassword($hasdata = null){

		/*$data = strval($data);
		$url=urldecode($data);
		$url=base64_decode($url);
		$email=substr($url,0,strpos($url,'|'));

		$verifica_email=\Managers\UsuarioManager::getInstance()->getByEmailVerifica($email);
		if ($verifica_email==1){
			$newUsuario=\Managers\UsuarioManager::getInstance()->getUserByEmail($email);
			if($newUsuario->codigo!=NULL){
				$cod=md5($newUsuario->codigo->format('m-d-Y h:i:s'));
				$codigo=explode('|',$url);
				if ($codigo[1]==$cod){*/

		if (!empty($hasdata)){
			$decodeHash = base64_decode($hasdata);
			$userData = json_decode($decodeHash);

			if ($aUser = \Managers\ClienteManager::getInstance()->get($userData->id)){
				$actualHash = \Managers\ClienteManager::getInstance()->doHash($aUser);
				if ($actualHash == $userData->hash){
					$this->data['user']=$aUser;
					$this->data['hideSidebar'] = true;
					$this->parser->parse('recuperar.tpl', $this->data );
				}else{
					redirect("/");
				}
			}else{
				redirect("/");
			}

		}else{
			redirect("/");
		}
	}


	public function valorarServicio($hasdata = null){

		/*$data = strval($data);
		$url=urldecode($data);
		$url=base64_decode($url);
		$email=substr($url,0,strpos($url,'|'));

		$verifica_email=\Managers\UsuarioManager::getInstance()->getByEmailVerifica($email);
		if ($verifica_email==1){
			$newUsuario=\Managers\UsuarioManager::getInstance()->getUserByEmail($email);
			if($newUsuario->codigo!=NULL){
				$cod=md5($newUsuario->codigo->format('m-d-Y h:i:s'));
				$codigo=explode('|',$url);
				if ($codigo[1]==$cod){*/

		if (!empty($hasdata)){
			$decodeHash = base64_decode($hasdata);
			$userData = json_decode($decodeHash);

			if ($aUser = \Managers\ClienteManager::getInstance()->get($userData->id)){
				$actualHash = \Managers\ClienteManager::getInstance()->doHash($aUser);
				if ($actualHash == $userData->hash){

					$this->data['turnoid']=$userData->turnoid;
					$aTurno = \Managers\TurnoManager::getInstance()->get($userData->turnoid);
					$this->data['servicio'] = $aTurno->servicio->nombre;

					$this->data['user']=$aUser;
					$this->data['hideSidebar'] = true;

					$this->parser->parse('valorarServicio.tpl', $this->data );
				}else{
					redirect("/");
				}
			}else{
				redirect("/");
			}

		}else{
			redirect("/");
		}
	}

	public function valorar_sitio(){

		$result["title"]   = "Agregar Comentario";
		$result["status"]  = false;
		$result["message"] = 'Error al agregar comentario';

		

		$valoracion = $this->input->post('valoracion');
		$comentario = $this->input->post('comentario');
		$turnoid = intval($this->input->post('turnoid'));
		$aTurno = \Managers\TurnoManager::getInstance()->get($turnoid);

		if ((intval($valoracion)>0) && ($comentario!='') && ($aTurno)){			

			if(!$aValoracion = \Managers\ValoracionManager::getInstance()->getByTurno($aTurno)){

				$aValoracion = \Managers\ValoracionManager::getInstance()->create();

				$aValoracion->turno = $aTurno;
				$aValoracion->fecha = new \Datetime('now');
				$aValoracion->estrellas = intval($valoracion);
				$aValoracion->comentario = $comentario;				

				\Managers\ValoracionManager::getInstance()->save($aValoracion);

				if ($aTurno->cliente){

                    $nombreCliente = ($aTurno->cliente)?$aTurno->cliente->nombre:$aTurno->nombre;
                    $titulo = "Gracias por dejas tu comentario en Diego Dap's";
                    $descripcion = 'Hola '.$nombreCliente.', gracias por dejas tu comentario y te esperamos nuevamente!';

                    if(intval($valoracion) > 4){
                    	$descripcion .= 'Ingresa a nuestra FanPage, y valoranos!!!';
                    }
                    //var_dump($descripcion); die();
                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();
                    $aNotificacion->titulo = $titulo;
                    $aNotificacion->descripcion = $descripcion;
                    $aNotificacion->visto = false;
                    $aNotificacion->tipo = true;
                    $aNotificacion->cliente = ($aTurno->cliente)?$aTurno->cliente:null;
                    $aNotificacion->fecha = new \DateTime('now');
					
					if(intval($valoracion) > 4){
                    	$aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion, 'https://www.facebook.com/DiegoDapss/');	
                    }else{
                    	$aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);
                    }
                    
                    $somedata['usuario'] = $nombreCliente;
                    $contenido = $this->parser->parse('mails/gracias.tpl', $somedata, true);

                    \Managers\MailManager::getInstance()->sendMail($aTurno->cliente->email, "Gracias por dejas tu comentario en Diego Dap's", $contenido);
                    
                }
				
				$result["title"]   = "Valoración agregada.";
				$result["status"]  = true;
				$result["message"] = 'Se ha Agregado la Valoración';

			}else{
				$result["title"]   = "Error";
				$result["message"] = 'Ya realizó la valoración!';
			}
			
		}else{
			$result["title"]   = "Error";
			$result["message"] = 'Algún dato no está completado!';
		}

	
		echo json_encode($result);

	}

	public function restablecer(){
		$error="";
		//$email = trim($_POST['email_reset']);
		$email_v = trim($_POST['email_v']);
		$pass = md5(trim($_POST['pass']));
		$pass2 = md5(trim($_POST['pass2']));
		if ($_POST['pass']==""){
			$error = $error.'El campo contraseña no puede estar vacio.'."<br>";
		}
		if ($_POST['pass2']==""){
			$error = $error.'El campo Repita Contraseña no puede estar vacio.'."<br>";
		}
		if ($_POST['pass'] != $_POST['pass2'] ){
			$error = $error.'Las contraseñas deber ser iguales.'."<br>";
		}
		if (strlen($_POST['pass']) < 5 ){
			$error = $error.'La contraseña deber tener al menos 5 caracteres.'."<br>";
		}
		if (!\Managers\ClienteManager::getInstance()->getByEmail($email_v)){
			$error = $error.'El correo es incorrecto.'."<br>";
		}

		$result = array();

		if ($error == "") {
			$result['status'] = true;
			$result['title'] = 'Felicitaciones!';
			$result['message'] = '<p>'.'Se ha modificado correctamente su contraseña.'.'</p>';

			$newUsuario = \Managers\ClienteManager::getInstance()->getByEmail($email_v);
			$newUsuario->pass = $pass;
			//$newUsuario->codigo =null;
			\Managers\ClienteManager::getInstance()->save($newUsuario);
		}else{
			$result['status'] = false;
			$result['message'] = "<h4>".'Lo sentimos!'."</h4><p>$error</p>";
		}

		echo json_encode($result);
	}






}
