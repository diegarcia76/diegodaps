<?php
abstract class Base_Nologinredirect_Controller extends CI_Controller {
	protected $data;
   	
	
	protected $federacionActual;
	protected $actualUser;
	protected $pathBaseController;
   	

	protected function controller_url($path){
		return site_url($this->pathBaseController.$path);
	}		
	
	public function setFederacion($aFederacion){
		$this->federacionActual = $aFederacion;
		$this->data['federacionActual'] = $this->federacionActual;
		$this->parser->set_theme($this->federacionActual->theme);

	}
	
	public function getFederacion(){
		return $this->federacionActual;
	}

	public function getActualUser(){
		return $this->actualUser;
	}
}
?>