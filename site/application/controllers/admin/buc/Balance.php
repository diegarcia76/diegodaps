<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Balance extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/balance/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'balance';
		$this->data['pageSubtitle'] = 'Reporte de Balance';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		//$aUsuarios = Managers\UsuarioManager::getInstance()->getAll();

		$diaActual = new DateTime('now');

		$this->data['coiffeurs'] = \Managers\CoiffeurManager::getInstance()->getAll();
		$this->data['servicios'] = Managers\ServicioManager::getInstance()->getAll();
//		$this->data['pagos'] = \Managers\DetallePagoManager::getInstance()->getAll();

		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'listado.tpl', $this->data);
	}
	
	public function datasource(){
		// Data for Data-Tables
		$data = $this->input->post('columns');

		if($data[9]['search']['value'] != '' && $data[10]['search']['value'] != ''){
			$fechaActualDesde = trim($data[9]['search']['value']);
			$fechaActualHasta = trim($data[10]['search']['value']);
		 } else {
		 	$fechaActualDesde = date('d/m/Y');
		 	$fechaActualHasta = date('d/m/Y');
		 }

		$fechaActualDesde = DateTime::createFromFormat('d/m/Y', $fechaActualDesde);
		$fechaActualHasta = DateTime::createFromFormat('d/m/Y', $fechaActualHasta);	

		\Managers\DetallePagoManager::getInstance()->setJoinDeCoiffeur();
		\Managers\DetallePagoManager::getInstance()->setJoinDeServicio();
		\Managers\DetallePagoManager::getInstance()->setJoinDePago();
		\Managers\DetallePagoManager::getInstance()->setJoinDeFecha($fechaActualDesde,$fechaActualHasta);

		$data = \Managers\DetallePagoManager::getInstance()->getDatatableDatasource($this->input->post());
		echo $data;
	}


	public function getTotales(){

		$aTotales = Managers\DetallePagoManager::getInstance()->getTotales();
		//var_dump($aTotales);

		$result['total'] = $aTotales[0]['precio'];
		$result['totalComision'] = $aTotales[0]['comision'];

		echo json_encode($result);

	}


	public function imprimir(){
		
		$fechas = explode(' - ', $this->input->post('input-fecha'));
		
		$fechas_start = DateTime::createFromFormat('d/m/Y', $fechas[0]);
		$fechas_end = DateTime::createFromFormat('d/m/Y', $fechas[1]);

		$aBalance = \Managers\DetallePagoManager::getInstance()->getBalancexFechas($fechas_start, $fechas_end);
		
		$aBalance2 = \Managers\DetallePagoManager::getInstance()->getBalancexFechas2($fechas_start, $fechas_end);
		
		$aPeluquero = \Managers\CoiffeurManager::getInstance()->getAll();
		/*echo "<pre>";
		print_r($aBalance2);
		echo "</pre>";
		var_dump($aPeluquero);
		
		foreach ($aPeluquero as $pel){
		echo $pel->id."<br>";
		}
		die();*/
		
		
		$this->data['aBalance'] = $aBalance;
		$this->data['aBalance2'] = $aBalance2;
		$this->data['aPeluquero'] = $aPeluquero;
		$this->data['fechas_start'] = $fechas[0];
		$this->data['fechas_end'] = $fechas[1];
		
		$this->parser->parse($this->parsePath.'imprimir.tpl', $this->data);

	}


}
