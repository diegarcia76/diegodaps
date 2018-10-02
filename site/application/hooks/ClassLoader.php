<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClassLoader
 *
 * @author aolideas
 */
class ClassLoader {

    function __autoload($class) {
        
    }
/*	
	public function pre_controller_constructor(){
		$CI = &get_instance();
		$actual_domain = preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/","$1", $CI->config->slash_item('base_url'));
		if (!$actual_federation = \Managers\FederacionManager::getInstance()->getByDominio($actual_domain)){
			 throw new Exception('El dominio <strong>'.$actual_domain.'</strong> no se encuentra registrado.'); 
			die();
		}
		echo '01 / ';
		$CI->setFederacion($actual_federation);
		
	}
*/	
	public function post_controller_constructor(){
		/*
		$CI = &get_instance();
		$actual_domain = preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/","$1", $CI->config->slash_item('base_url'));
		if (!$actual_federation = \Managers\FederacionManager::getInstance()->getByDominio($actual_domain)){
			 throw new Exception('El dominio <strong>'.$actual_domain.'</strong> no se encuentra registrado.'); 
			die();
		}

		if (!$CI->getActualBackuser()){
			$CI->setFederacion($actual_federation);
			$CI->session->set_userdata('federacion_actual_admin', $actual_federation->id);
		} else {
			$actual_federation = \Managers\FederacionManager::getInstance()->getLogged();
			$CI->setFederacion($actual_federation);
		}
		*/
	}
}