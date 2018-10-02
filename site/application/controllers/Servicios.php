<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base.php";

class Servicios extends Base_Controller {

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
		if(!$this->actualUser){
			redirect('login');
		}
	}


	public function index(){
		/*
		if($this->actualUser){
			$this->parser->parse('turnos/tus-turnos.tpl', $this->data);
		}else{
			redirect('login');
		}
		*/
	}

	public function getCoiffeursXServicio($id_servicio){

		$aServicio = Managers\ServicioManager::getInstance()->get($id_servicio);
		$coiffeurs = array();

		foreach($aServicio->serviciosXCoiffeur as $co){
			if(!$co->coiffeur->borrado)
				$coiffeurs[] = \Managers\ServicioXCoiffeurManager::getInstance()->toArray($co);		
		}				

		$result['coiffeurs'] = $coiffeurs;
		echo json_encode($result);

	}

}
