<?php
require_once APPPATH."core/controllers/base_abstract.php";

abstract class BaseAdmin_Controller extends Base_Abstract_Controller {

	protected $actualAdministrador;
	protected $pathBaseController;
   	
	public function __construct(){
		
		parent::__construct();
		

		$session_name = session_name();
		if (isset($_POST[$session_name])) {
			$oldUserData = unserialize($_POST['userdata']);
			$this->session->set_userdata( $oldUserData );
		}		

		setlocale(LC_ALL,"es_ES");
		$loginOk = false;

		//$this->data['tiposEventos']	= \Managers\EventoTipoManager::getInstance()->getAll();

		if ($this->session->userdata('login_admin') == 'administrador'){

			if (!\Managers\UsuarioManager::getInstance()->getLogin()){
				$this->data["login_admin_ok"] = false;
				redirect("admin/login");
			} else {
				$loginOk = true;
				$this->actualBackuser = \Managers\UsuarioManager::getInstance()->getLogin();
				/*$this->data['federacionActual'] = $this->federacionActual = \Managers\FederacionManager::getInstance()->getLogged();

				if ($this->actualBackuser->federacion){

					$this->data['federacion'] = "SI";
				}else{
					$this->data['federacion'] = "NO";
				}*/
			}


		}
		//var_dump($this->actualBackuser);
		//die();
		
		
		if ($loginOk == true){
			$fechaActual = new Datetime('now');
			$this->data['fechaActual'] = \Managers\MainManager::getInstance()->fechaFormateada($fechaActual);
			$this->data['actualBackuser'] = $this->actualBackuser;
			$this->data['notificaciones'] = \Managers\NotificacionManager::getInstance()->getAllNoti(true);
			/*$this->data['permisos'] =  \Managers\Userback_permissionManager::getInstance()->getPermisos();
			$this->data['perfiles'] =  \Managers\Userback_profileManager::getInstance()->getPerfiles();
			
			$this->data['accesos'] = $this->session->userdata('permisosLogin');

			$this->setFederacion($this->federacionActual);*/
			$this->smarty->registerClass('ImagenManager','\Managers\ImagenManager');
			//$this->smarty->registerClass('EventoSubcategoriaManager','\Managers\EventoSubcategoriaManager');
		} else {
				$this->data["login_admin_ok"] = false;
				redirect("admin/login");
		}

   	}
	
	protected function controller_url($path){
		return site_url($this->pathBaseController.$path);
	}

  
  	public function getActualUser(){
		return null;
	}
	
	public function getActualBackuser(){
		return $this->actualBackuser;
	}
	
}
?>