<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Categorias extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/categorias/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'categorias';
		$this->data['pageSubtitle'] = 'Categorias';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		$aProductos = Managers\CategoriaManager::getInstance()->getAll();

		$this->data['aProductos'] = $aProductos;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'listado.tpl', $this->data);
	}


	public function add(){

		if ($this->actualBackuser->perfil->id == 1){
			$breadcrumb = array();
			$breadcrumb['Productos'] = $this->controller_url('');
			$breadcrumb['Agregar nueva Categoria'] = $this->controller_url('add');
			$this->data['breadcrumb'] = $breadcrumb;

			$aMarcas = Managers\CategoriaManager::getInstance()->getAll();
			$this->data['aMarcas'] = $aMarcas;
			$this->data['submenuactive'] = 'add';
			$this->data['pageTitle'] = 'Agregar nueva Categoria';
			$this->parser->parse($this->parsePath.'form.tpl', $this->data);
		}else{
			redirect('admin');
		}

	}

	public function eliminar($producto_id){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar categoria';
		$result['message'] = 'Imposible eliminar la categoria';

		if ($this->actualBackuser->perfil->id == 1){

			if ($aProducto = Managers\CategoriaManager::getInstance()->get($producto_id)){

				
				Managers\ProductoManager::getInstance()->delete($aProducto);
				$result["title"]   = "Categoria eliminada";
				$result["status"]  = true;
				$result["message"] = 'Se ha eliminado la categoría';
				//}
			}
		}else{
			$result['title'] = 'Error de permisos';
		}

		echo json_encode($result);
	}
	
	public function eliminar_todos(){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar categoria';
		$result['message'] = 'Imposible eliminar el producto';

		$lote = $this->input->post('lote');
		
		
		$i =0;
		foreach ($lote as $lot){
			if ($aProducto = Managers\CategoriaManager::getInstance()->get($lot)){
		
				Managers\ProductoManager::getInstance()->delete($aProducto);
				
			
			}
		}
		
			
				$result["title"]   = "Categorias eliminadas";
				$result["status"]  = true;
				$result["message"] = 'Se han eliminado las categorias';	
		

		echo json_encode($result);
	}
	

	public function editar($producto_id){

		if ($this->actualBackuser->perfil->id == 1){

			if ($editUser = Managers\CategoriaManager::getInstance()->get($producto_id)){

				$this->data['editUser'] = $editUser;

				$breadcrumb = array();
				$breadcrumb['Categorias'] = $this->controller_url('');
				$breadcrumb['Editar Categoria'] = $this->controller_url('editar/'.$producto_id);
				$this->data['breadcrumb'] = $breadcrumb;

				
				$this->data['pageTitle'] = 'Editar Categoria';
				$this->parser->parse($this->parsePath.'form.tpl', $this->data);
			} else {
				redirect($this->controller_url());
			}
		}else{
			redirect('admin');
		}

	}

	public function ver($producto_id){

		if ($this->actualBackuser->perfil->id == 1){

			if ($aProducto = Managers\CategoriaManager::getInstance()->get($producto_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					redirect('admin/usuarios');
				}*/

				$breadcrumb = array();
				$breadcrumb['Productos'] = 'admin/categorias/listado';
				$breadcrumb[$aProducto->nombre] = 'admin/categorias/ver/'.$aProducto->id;
				$this->data['breadcrumb'] = $breadcrumb;

				$this->data['contentTitle'] = $aProducto->nombre;
				$this->data['contentSubtitle'] = 'Id '.$aProducto->id;

				$this->data['producto'] = $aProducto;

				$this->parser->parse('admin/categorias/ver.tpl', $this->data);

			} else {
				redirect('admin/categorias');
			}
		}else{
			redirect('admin');
		}
	}

	public function save(){
		$this->load->library('form_validation');

		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar la categoria';
		$result['title'] = 'Error en el formulario';

		if ($this->actualBackuser->perfil->id == 1){

			$user_id = intval($this->input->post('user_id'));
			$nombre = trim($this->input->post('nombre'));

			$descripcion = $this->input->post('color');
			

			/*if (!$activo){
				$activo = 0;
			}*/

			if ($user_id){
				//$url_slug_exists = Managers\ProductoManager::getInstance()->url_slug_exists($url_slug, $user_id);
				if (!$editUser = Managers\CategoriaManager::getInstance()->get($user_id)){
					$result['message'] = 'Error en la llamada';
					echo json_encode($result);
					die();
				}
			} else {
				//$url_slug_exists = Managers\ProductoManager::getInstance()->url_slug_exists($url_slug);
				$editUser = Managers\CategoriaManager::getInstance()->create();

			}

			/*if(count($url_slug_exists) > 0){
				$result['message'] = 'Ya existe un producto con ese url_slug!!';
				echo json_encode($result);
				die();
			}*/

			if (($nombre == '')){
					$result['message'] = 'Error en los datos';
					echo json_encode($result);
					die();
			}

			$editUser->nombre = $nombre;
			$editUser->color  = $descripcion;
			
			$editUser = Managers\ProductoManager::getInstance()->save($editUser);
			//var_dump($editUser); die();

			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado la Categoria!';
			$result['status'] = true;
			$result['data'] = $this->input->post();

		}else{
			$result['title'] = 'Error de permisos';
		}

		echo json_encode($result);

	}


	public function datasource(){
		
		

		$data = \Managers\CategoriaManager::getInstance()->getDatatableDatasource($this->input->post());
		echo $data;
	}

	
	

	

}
