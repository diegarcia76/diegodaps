<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Tarjetas extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/tarjetas/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'tarjetas';
		$this->data['pageSubtitle'] = 'Tarjetas';
		
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		$aProductos = Managers\tarjetaManager::getInstance()->get(1);

		$this->data['aTarjetas'] = $aProductos;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'form.tpl', $this->data);
	}


	
	

	

	

	public function save(){
		

	

			
			
			$c1 = $this->input->post('c1');
			$c2 = $this->input->post('c2');
			$c3 = $this->input->post('c3');
			$c4 = $this->input->post('c4');
			$c5 = $this->input->post('c5');
			$c6 = $this->input->post('c6');
			$c7 = $this->input->post('c7');
			$c8 = $this->input->post('c8');
			$c9 = $this->input->post('c9');
			$c10 = $this->input->post('c10');
			$c11 = $this->input->post('c11');
			$c12 = $this->input->post('c12');
			
			
				$tarj = Managers\TarjetaManager::getInstance()->get(1);
				$tarj->cuota1 = $c1;
				$tarj->cuota2 = $c2;
				$tarj->cuota3 = $c3;
				$tarj->cuota4 = $c4;
				$tarj->cuota5 = $c5;
				$tarj->cuota6 = $c6;
				$tarj->cuota7 = $c7;
				$tarj->cuota8 = $c8;
				$tarj->cuota9 = $c9;
				$tarj->cuota10 = $c10;
				$tarj->cuota11 = $c11;
				$tarj->cuota12 = $c12;
				Managers\TarjetaManager::getInstance()->save($tarj);
				
				redirect('admin/tarjetas');
		
		

	}


	
	
	
}
