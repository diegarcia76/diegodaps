<?php
require_once APPPATH."core/controllers/base_abstract.php";

abstract class Base_Controller extends Base_Abstract_Controller {

   	
	public function __construct()
   	{
		parent::__construct();

		$session_name = session_name();
		if (isset($_POST[$session_name])) {
			$oldUserData = unserialize($_POST['userdata']);
			$this->session->set_userdata( $oldUserData );
		}		

		setlocale(LC_ALL,"es_ES.utf8");

		$fechaActual = new Datetime('now');
		$this->actualUser = \Managers\ClienteManager::getInstance()->getLoginFront();
		
		$this->data['fechaActual'] = \Managers\MainManager::getInstance()->fechaFormateada($fechaActual);
		$this->data['notificaciones'] = \Managers\NotificacionManager::getInstance()->getByUser($this->actualUser);
		$this->data['usuarioActual'] = $this->actualUser;
		$this->smarty->registerClass('ImagenManager','\Managers\ImagenManager');
		$this->smarty->registerClass('MainManager','\Managers\MainManager');

		$this->data['mainSecctionId'] = 'main';
		$this->data['hideSidebar'] = false;
		$this->data['editionInSidebar'] = false;
		
		//$this->data['facebool_login_url'] = \Managers\AuthManager::getInstance()->facebook_getLoginUrl();
		$this->data['facebool_login_url'] = \Managers\AuthManager::getInstance()->getLoginUrlFacebook();
		
   	}

	
}
?>