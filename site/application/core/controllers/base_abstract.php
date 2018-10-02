<?php

abstract class Base_Abstract_Controller extends CI_Controller {
	protected $data;
	//protected $federacionActual;
	protected $actualUser = null;
	protected $actualBackuser = null;
	protected $pathBaseController;
	protected $modulos_activos = array();
   	

	protected function controller_url($path){
		return site_url($this->pathBaseController.$path);
	}		
	
	/*public function setFederacion($aFederacion){
		//$this->federacionActual = $aFederacion;
		//$this->data['federacionActual'] = $this->federacionActual;
		//$this->parser->set_theme($this->federacionActual->theme);
		//$this->modulos_activos = \Managers\EventoTipoManager::getInstance()->getMisEventos($this->federacionActual);
		//$this->data['evento_activo'] = $this->modulos_activos;
	}
	
	public function getFederacion(){
		return $this->federacionActual;
	}
	*/
	public function getActualUser(){
		return $this->actualUser;
	}
	
	public function getActualBackUser(){
		return $this->actualBackuser;
	}
	

	
}
?>