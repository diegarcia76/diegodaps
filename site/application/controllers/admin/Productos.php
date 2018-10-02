<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Productos extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/productos/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'productos';
		$this->data['pageSubtitle'] = 'Productos';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		$aProductos = Managers\ProductoManager::getInstance()->getAll();

		$this->data['aProductos'] = $aProductos;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'listado.tpl', $this->data);
	}


	public function add(){

		if ($this->actualBackuser->perfil->id == 1){
			$breadcrumb = array();
			$breadcrumb['Productos'] = $this->controller_url('');
			$breadcrumb['Agregar nuevo Producto'] = $this->controller_url('add');
			$this->data['breadcrumb'] = $breadcrumb;

			$aMarcas = Managers\MarcaManager::getInstance()->getAll();
			$this->data['aMarcas'] = $aMarcas;
			$this->data['submenuactive'] = 'add';
			$this->data['pageTitle'] = 'Agregar nuevo Producto';
			$this->parser->parse($this->parsePath.'form.tpl', $this->data);
		}else{
			redirect('admin');
		}

	}

	public function eliminar($producto_id){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar producto';
		$result['message'] = 'Imposible eliminar el producto';

		if ($this->actualBackuser->perfil->id == 1){

			if ($aProducto = Managers\ProductoManager::getInstance()->get($producto_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					$result['message'] = 'El usuario que trata de eliminar no es de esta federación';
				}else{*/
				Managers\ProductoManager::getInstance()->delete($aProducto);
				$result["title"]   = "Producto eliminado";
				$result["status"]  = true;
				$result["message"] = 'Se ha eliminado al producto';
				//}
			}
		}else{
			$result['title'] = 'Error de permisos';
		}

		echo json_encode($result);
	}

	public function editar($producto_id){

		if ($this->actualBackuser->perfil->id == 1){

			if ($editUser = Managers\ProductoManager::getInstance()->get($producto_id)){

				$this->data['editUser'] = $editUser;

				$breadcrumb = array();
				$breadcrumb['Productos'] = $this->controller_url('');
				$breadcrumb['Editar Producto'] = $this->controller_url('editar/'.$producto_id);
				$this->data['breadcrumb'] = $breadcrumb;

				$aMarcas = Managers\MarcaManager::getInstance()->getAll();
				$this->data['aMarcas'] = $aMarcas;
				$this->data['submenuactive'] = '';
				$this->data['pageTitle'] = 'Editar Producto';
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

			if ($aProducto = Managers\ProductoManager::getInstance()->get($producto_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					redirect('admin/usuarios');
				}*/

				$breadcrumb = array();
				$breadcrumb['Productos'] = 'admin/productos/listado';
				$breadcrumb[$aProducto->nombre] = 'admin/productos/ver/'.$aProducto->id;
				$this->data['breadcrumb'] = $breadcrumb;

				$this->data['contentTitle'] = $aProducto->nombre;
				$this->data['contentSubtitle'] = 'Id '.$aProducto->id;

				$this->data['producto'] = $aProducto;

				$this->parser->parse('admin/productos/ver.tpl', $this->data);

			} else {
				redirect('admin/productos');
			}
		}else{
			redirect('admin');
		}
	}

	public function save(){
		$this->load->library('form_validation');

		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al producto';
		$result['title'] = 'Error en el formulario';

		if ($this->actualBackuser->perfil->id == 1){

			$user_id = intval($this->input->post('user_id'));
			$nombre = trim($this->input->post('nombre'));

			$descripcion = $this->input->post('descripcion');
			$codigo = $this->input->post('codigo');
			$precio = $this->input->post('precio');
			$precio_efectivo = $this->input->post('precio_efectivo');
			$marca_id = $this->input->post('filtro-marca');

			/*if (!$activo){
				$activo = 0;
			}*/

			if ($user_id){
				//$url_slug_exists = Managers\ProductoManager::getInstance()->url_slug_exists($url_slug, $user_id);
				if (!$editUser = Managers\ProductoManager::getInstance()->get($user_id)){
					$result['message'] = 'Error en la llamada';
					echo json_encode($result);
					die();
				}
			} else {
				//$url_slug_exists = Managers\ProductoManager::getInstance()->url_slug_exists($url_slug);
				$editUser = Managers\ProductoManager::getInstance()->create();

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
			$editUser->descripcion  = $descripcion;
			$editUser->codigo  = $codigo;
			$editUser->precio  = $precio;
			$editUser->precio_efectivo  = $precio_efectivo;

			if($aMarca = \Managers\MarcaManager::getInstance()->get($marca_id)){
				$editUser->marca  = $aMarca;
			}

			$editUser = Managers\ProductoManager::getInstance()->save($editUser);
			//var_dump($editUser); die();

			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado el Producto!';
			$result['status'] = true;
			$result['data'] = $this->input->post();

		}else{
			$result['title'] = 'Error de permisos';
		}

		echo json_encode($result);

	}


	public function datasource(){
		// Data for Data-Tables

		/*if($this->session->userdata('login_admin')=='administracion'){
			//$aFederacion = \Managers\FederacionManager::getInstance()->get($this->federacionAc->id);
			\Managers\ProductoManager::getInstance()->setJoinDeAdministracion($this->administracionActual);
		}*/

		\Managers\ProductoManager::getInstance()->setJoinDeMarcas();

		$data = \Managers\ProductoManager::getInstance()->getDatatableDatasource($this->input->post());
		echo $data;
	}

	public function precios($marca_id = null){

		if ($this->actualBackuser->perfil->id == 1){

			$breadcrumb = array();
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;


			$this->data['pageSubtitle'] = 'Listado de precios de Productos';

			if($aMarca = \Managers\MarcaManager::getInstance()->get($marca_id)){
				$aProductos = Managers\ProductoManager::getInstance()->getByMarca($aMarca);
			}else{
				$aProductos = Managers\ProductoManager::getInstance()->getAll();
			}

			$aMarcas = Managers\MarcaManager::getInstance()->getAll();
			$this->data['aMarcas'] = $aMarcas;
			$this->data['marca_id'] = $marca_id;

			$this->data['aProductos'] = $aProductos;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'precios.tpl', $this->data);

		} else {
			redirect('admin');
		}


	}

	public function cambiarPrecio(){

		$producto_id = intval($this->input->post('producto_id'));
		$marca_id = intval($this->input->post('marca'));
		$submarca_id = intval($this->input->post('submarca'));
		$precio_default = floatval($this->input->post('producto_precio'));
		$precio_efectivo_default = floatval($this->input->post('producto_precio_efectivo'));


		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al producto';
		$result['title'] = 'Cambio de precios';


		if ($this->actualBackuser->perfil->id == 1){
			if ($aProducto = \Managers\ProductoManager::getInstance()->get($producto_id)){

				if($aMarca = \Managers\MarcaManager::getInstance()->get($marca_id)){
					$aProducto->marca = $aMarca;	
				}
				
				if($aLinea = \Managers\MarcaManager::getInstance()->get($submarca_id)){
					$aProducto->linea = $aLinea;	
				}

				$aProducto->precio = $precio_default;
				$aProducto->precio_efectivo = $precio_efectivo_default;				
				
				$aProducto = Managers\ProductoManager::getInstance()->save($aProducto);

				$result['status'] = true;
				$result['message'] = 'Se ha cambiado el precio del producto';

			}
		}

		echo json_encode($result);
	}

	public function listar_marcas(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		//$aMarcas = Managers\MarcaManager::getInstance()->getAll();

		//$this->data['aMarcas'] = $aMarcas;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'listado_marcas.tpl', $this->data);
	}

	public function add_marca(){

		if ($this->actualBackuser->perfil->id == 1){
			$breadcrumb = array();
			$breadcrumb['Marcas'] = $this->controller_url('');
			$breadcrumb['Agregar nueva Marca'] = $this->controller_url('add');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['submenuactive'] = 'add';
			$this->data['pageTitle'] = 'Agregar nueva Marca';
			$this->parser->parse($this->parsePath.'form_marcas.tpl', $this->data);
		}else{
			redirect('admin');
		}

	}

	public function eliminar_marca($marca_id){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar marca';
		$result['message'] = 'Imposible eliminar el marca';

		if ($this->actualBackuser->perfil->id == 1){

			if ($aMarca = Managers\MarcaManager::getInstance()->get($marca_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					$result['message'] = 'El usuario que trata de eliminar no es de esta federación';
				}else{*/
				Managers\MarcaManager::getInstance()->delete($aMarca);
				$result["title"]   = "Marca eliminada";
				$result["status"]  = true;
				$result["message"] = 'Se ha eliminado la marca';
				//}
			}
		}else{
			$result['title'] = 'Error de permisos';
		}

		echo json_encode($result);
	}

	public function editar_marca($marca_id){

		if ($this->actualBackuser->perfil->id == 1){

			if ($editUser = Managers\MarcaManager::getInstance()->get($marca_id)){

				$this->data['editUser'] = $editUser;

				$breadcrumb = array();
				$breadcrumb['Marcas'] = $this->controller_url('');
				$breadcrumb['Editar Marca'] = $this->controller_url('editar/'.$marca_id);
				$this->data['breadcrumb'] = $breadcrumb;

				$this->data['submenuactive'] = '';
				$this->data['pageTitle'] = 'Editar Marca';
				$this->parser->parse($this->parsePath.'form_marcas.tpl', $this->data);
			} else {
				redirect($this->controller_url());
			}
		}else{
			redirect('admin');
		}

	}

	public function save_marca(){
		$this->load->library('form_validation');

		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar la marca';
		$result['title'] = 'Error en el formulario';

		if ($this->actualBackuser->perfil->id == 1){

			$marca_id = intval($this->input->post('marca_id'));
			$nombre = trim($this->input->post('nombre'));
			$descripcion = $this->input->post('descripcion');

			$nombreS = $this->input->post('nombreS');
			$descripcionS = $this->input->post('descripcionS');
			$submarca_id = $this->input->post('submarca_id');

			/*if (!$activo){
				$activo = 0;
			}*/

			if ($marca_id){
				//$url_slug_exists = Managers\ProductoManager::getInstance()->url_slug_exists($url_slug, $user_id);
				if (!$editUser = Managers\MarcaManager::getInstance()->get($marca_id)){
					$result['message'] = 'Error en la llamada';
					echo json_encode($result);
					die();
				}
			} else {
				//$url_slug_exists = Managers\ProductoManager::getInstance()->url_slug_exists($url_slug);
				$editUser = Managers\MarcaManager::getInstance()->create();

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

			if(is_null($submarca_id)){
				$submarca_id = array();
			}

			if($editUser->submarcas){
				foreach ($editUser->submarcas as $sub) {
					if (!in_array($sub->id, $submarca_id)) {
						$editUser->submarcas->removeElement($sub);
					}
				}
			}

			$editUser->nombre = $nombre;
			$editUser->descripcion  = $descripcion;

			if ($nombreS){	
				
					foreach ($nombreS as $key => $titulo){

						$aTitlo = $titulo;
						$aDescription = $descripcionS[$key];
						$aSubmarca = $submarca_id[$key];

						if($aSubmarca!='')
							$aSub = Managers\MarcaManager::getInstance()->get($aSubmarca);
						else
							$aSub = Managers\MarcaManager::getInstance()->create();

						$aSub->nombre = $aTitlo;
						$aSub->descripcion = $aDescription;						
						$aSub->parent = $editUser;
						$editUser->submarcas->add($aSub);
					}

			}

			$editUser = Managers\MarcaManager::getInstance()->save($editUser);
			//var_dump($editUser); die();

			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado la Marca!';
			$result['status'] = true;
			$result['data'] = $this->input->post();

		}else{
			$result['title'] = 'Error de permisos';
		}

		echo json_encode($result);

	}


	public function datasource_marca(){
		// Data for Data-Tables

		/*if($this->session->userdata('login_admin')=='administracion'){
			//$aFederacion = \Managers\FederacionManager::getInstance()->get($this->federacionAc->id);
			\Managers\ProductoManager::getInstance()->setJoinDeAdministracion($this->administracionActual);
		}*/

		$data = \Managers\MarcaManager::getInstance()->getDatatableDatasource($this->input->post());
		echo $data;
	}


	public function submarcas_x_marcas(){
		$marca_id = $this->input->post('marcaId');		
		$aMarca = Managers\MarcaManager::getInstance()->get($marca_id);

		//var_dump($aRubro->nombre);
		$aLineas = $aMarca->submarcas;
		//var_dump($aProvincias->nombre);
		//$servicios = array();

		$lineas = array();
		//var_dump($aProvincias->nombre);
		foreach($aLineas as $aLin){
		//	var_dump($provincia);
				$lineas[] = Managers\MarcaManager::getInstance()->toArray($aLin);		
		}

		//var_dump($provincias);
		$result['submarcas'] = $lineas;
		$result['status'] = true;
		$result['message'] = 'ok';

		echo json_encode($result);
	}

	public function imprimir($marca_id = ''){

		$marcas_ids = @$_POST['filtro-marca'];

		if (!is_array($marcas_ids)){
			$marcas_ids = array();

			$marca_id = intval($marcas_ids);			
			if ($marca_id)
				$marcas_ids[] = $marca_id;
		}


		$pdf = \Managers\PdfManager::getInstance()->generarListadoPrecios($marcas_ids);


	}

}
