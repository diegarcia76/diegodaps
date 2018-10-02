<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Comentarios extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/comentarios/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'comentarios';
		$this->data['pageSubtitle'] = 'Reporte de Comentarios';
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
		//$this->data['pagos'] = \Managers\DetallePagoManager::getInstance()->getAll();

		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'listado.tpl', $this->data);
	}
	
	
	public function datasource(){
		// Data for Data-Tables
		$data = $this->input->post('columns');
		$fechaActualDesde = trim($data[7]['search']['value']);
		$fechaActualHasta = trim($data[8]['search']['value']);

		$fechaActualDesde = DateTime::createFromFormat('d/m/Y', $fechaActualDesde);
		$fechaActualHasta = DateTime::createFromFormat('d/m/Y', $fechaActualHasta);

		\Managers\ValoracionManager::getInstance()->setJoinDeCoiffeur();
		\Managers\ValoracionManager::getInstance()->setJoinDeFecha($fechaActualDesde,$fechaActualHasta);

		$data = \Managers\ValoracionManager::getInstance()->getDatatableDatasource($this->input->post());
		echo $data;
	}
	


}
