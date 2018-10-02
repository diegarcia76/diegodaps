<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Broadcast extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/broadcast/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'broadcast';
		$this->data['pageSubtitle'] = 'Broadcast';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		$aUser = $this->actualBackuser;

		$this->data['editUser'] = $aUser;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'form.tpl', $this->data);
	}
	
	public function save(){
		$this->load->library('form_validation');
		
		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al cliente';
		$result['title'] = 'Error en el formulario';
		
//		echo "<pre>", print_r($_FILES), "</pre>"; 
//		echo "<pre>", print_r($_POST), "</pre>"; die();

		if ($this->actualBackuser){
			
			$user_id = intval($this->input->post('user_id'));
			$titulo = trim($this->input->post('titulo'));					
			$descripcion = $this->input->post('descripcion');
			
			$editUser = $this->actualBackuser;

			$response = \Managers\NotificacionManager::getInstance()->sendMessage($titulo, $descripcion);
			$result["allresponses"] = $response;			
						
			$result['title'] = 'Broadcast';
			$result['message'] = 'Broadcast realizado a todos los dispositivos!';
			$result['status'] = true;
			$result['data'] = $this->input->post();

		}else{
			$result['title'] = 'Error de permisos';
		}
		
		echo json_encode($result);
		
	}	

	public function enviarPrueba(){
		$this->load->library('form_validation');
		
		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al cliente';
		$result['title'] = 'Error en el formulario';
		
//		echo "<pre>", print_r($_FILES), "</pre>"; 
//		echo "<pre>", print_r($_POST), "</pre>"; die();

		if ($this->actualBackuser){
			
			//$user_id = intval($this->input->post('user_id'));
			$titulo = 'Titulo de Prueba';					
			$descripcion = 'Descripcion de prueba';
			
			$editUser = $this->actualBackuser;

			$response = \Managers\NotificacionManager::getInstance()->sendMessage($titulo, $descripcion, 'a8e246d6-a4cd-4780-834e-c291caf75d8a');
			$result["allresponses"] = $response;			
						
			$result['title'] = 'Broadcast';
			$result['message'] = 'Broadcast realizado a todos los dispositivos!';
			$result['status'] = true;
			$result['data'] = $this->input->post();

		}else{
			$result['title'] = 'Error de permisos';
		}
		
		echo json_encode($result);
		
	}

/*
	public function sendMessage($titulo, $descripcion){
		$content = array(
			"en" => $descripcion,
			"es" => $descripcion
			);

		$headings = array(
			"en" => $titulo,
			"es" => $titulo
			);
		
		$fields = array(
			'app_id' => "b66208c3-187a-44a8-8be2-7a6b7eb15aed",
			'included_segments' => array('All'),
      		'data' => array("foo" => "bar"),
			'contents' => $content,
			'headings' => $headings
		);
		
		$fields = json_encode($fields);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic ZGRlNWE3MDItMjA5MC00ZTI3LTkwZTAtYmVlMjg1NjU5NTJi'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
*/
}
