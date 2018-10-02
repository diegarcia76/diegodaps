<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Servicios extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/servicios/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'servicios';
		$this->data['pageSubtitle'] = 'Servicios';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		$aServicios = Managers\ServicioManager::getInstance()->getAll();
		
		/*if(!$this->federacionActual->principal){
			//$aFederacion = \Managers\FederacionManager::getInstance()->get($this->actualUser->federacion);
			\Managers\PaymentManager::getInstance()->setJoinDeFederacion($this->federacionActual);
			$cant_usuarios = count($this->federacionActual->usuarios);
		}else{
			$cant_usuarios = count($aUsuarios);
		}
		//var_dump($cant_usuarios);

		
		$fecha_desde = new DateTime();
		$fecha_desde->modify('-60 days');
		$aRecaudacion = Managers\PaymentManager::getInstance()->getRecaudacionXUltimosDias($fecha_desde);

		$aEventos = Managers\PaymentManager::getInstance()->getMontosUltimosEventos(4);

		$this->data['cantidad_usuarios'] = $cant_usuarios;
		$this->data['aEventos'] = $aEventos;
		$this->data['recaudacion'] = round($aRecaudacion,2);
		$this->data['pageTitle'] = 'Estadísticas '.$this->federacionActual->nombre;*/
		$this->data['aServicios'] = $aServicios;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'listado.tpl', $this->data);
	}


	public function add(){

		if ($this->actualBackuser->perfil->id == 1){
			$breadcrumb = array();
			$breadcrumb['Servicios'] = $this->controller_url('');
			$breadcrumb['Agregar nuevo Servicio'] = $this->controller_url('add');
			$this->data['breadcrumb'] = $breadcrumb;			
			
			$this->data['submenuactive'] = 'add';
			$this->data['pageTitle'] = 'Agregar nuevo Servicio';
			$this->parser->parse($this->parsePath.'form.tpl', $this->data);
		}else{
			redirect('admin');
		}

	}

	public function eliminar($servicio_id){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar servicio';
		$result['message'] = 'Imposible eliminar el servicio';

		if ($this->actualBackuser->perfil->id == 1){

			if ($aServicio = Managers\ServicioManager::getInstance()->get($servicio_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					$result['message'] = 'El usuario que trata de eliminar no es de esta federación';
				}else{*/
				Managers\ServicioManager::getInstance()->delete($aServicio);
				$result["title"]   = "Servicio eliminado";
				$result["status"]  = true;
				$result["message"] = 'Se ha eliminado al servicio';
				//}
			}
		}else{
			$result['title'] = 'Error de permisos';
		}
		
		echo json_encode($result);
	}
	
	public function editar($servicio_id){

		if ($this->actualBackuser->perfil->id == 1){

			if ($editUser = Managers\ServicioManager::getInstance()->get($servicio_id)){
				
				$this->data['editUser'] = $editUser;

				$breadcrumb = array();
				$breadcrumb['Servicios'] = $this->controller_url('');
				$breadcrumb['Editar Servicio'] = $this->controller_url('editar/'.$servicio_id);
				$this->data['breadcrumb'] = $breadcrumb;				
		
				$this->data['submenuactive'] = '';
				$this->data['pageTitle'] = 'Editar Servicio';
				$this->parser->parse($this->parsePath.'form.tpl', $this->data);
			} else {
				redirect($this->controller_url());
			}
		}else{
			redirect('admin');
		}

	}

	public function ver($servicio_id){

		if ($this->actualBackuser->perfil->id == 1){

			if ($aServicio = Managers\ServicioManager::getInstance()->get($servicio_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					redirect('admin/usuarios');
				}*/
				
				$breadcrumb = array();
				$breadcrumb['Servicios'] = 'admin/servicios/listado';
				$breadcrumb[$aServicio->nombre] = 'admin/servicios/ver/'.$aServicio->id;
				$this->data['breadcrumb'] = $breadcrumb;

				$this->data['contentTitle'] = $aServicio->nombre;
				$this->data['contentSubtitle'] = 'Id '.$aServicio->id;
				
				$this->data['servicio'] = $aServicio;

				$this->parser->parse('admin/servicios/ver.tpl', $this->data);
				
			} else {
				redirect('admin/servicios');
			}
		}else{
			redirect('admin');
		}
	}
	
	public function save(){
		$this->load->library('form_validation');
		
		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al servicio';
		$result['title'] = 'Error en el formulario';

		if ($this->actualBackuser->perfil->id == 1){
			
			$user_id = intval($this->input->post('user_id'));
			$nombre = trim($this->input->post('nombre'));
					
			$precio_puntos = $this->input->post('precio_puntos');
			$puntos_premio = $this->input->post('puntos_premio');
			$duracion = $this->input->post('duracion');
			$duracion_espera = $this->input->post('duracion_espera');
			$precio_default = $this->input->post('precio_default');
			$precio_efectivo_default = $this->input->post('precio_efectivo_default');
			$comision_default = $this->input->post('comision_default');
			$servicioEnApp = $this->input->post('servicioEnApp');
			$division_grilla = $this->input->post('division_grilla');
			$activo = $this->input->post('activo');
			
			if (!$activo){
				$activo = 0;
			}
			
			if (!$servicioEnApp){
				$servicioEnApp = 0;
			}

			if ($user_id){
				//$url_slug_exists = Managers\ServicioManager::getInstance()->url_slug_exists($url_slug, $user_id);
				if (!$editUser = Managers\ServicioManager::getInstance()->get($user_id)){
					$result['message'] = 'Error en la llamada';
					echo json_encode($result);
					die();
				}
			} else {
				//$url_slug_exists = Managers\ServicioManager::getInstance()->url_slug_exists($url_slug);
				$editUser = Managers\ServicioManager::getInstance()->create();
							
			}

			/*if(count($url_slug_exists) > 0){
				$result['message'] = 'Ya existe un servicio con ese url_slug!!';
				echo json_encode($result);
				die();
			}*/
						
			if ($nombre == ''){
					$result['message'] = 'Error en los datos';
					echo json_encode($result);
					die();
			}

			$editUser->nombre = $nombre;
			$editUser->precio_puntos  = $precio_puntos;
			$editUser->puntos_premio  = $puntos_premio;
			$editUser->duracion  = $duracion;
			$editUser->duracion_espera  = $duracion_espera;
			$editUser->precio_default  = $precio_default;
			$editUser->precio_efectivo_default  = $precio_efectivo_default;
			$editUser->comision_default  = $comision_default;
			$editUser->servicioEnApp  = $servicioEnApp;
			$editUser->division_grilla  = $division_grilla;
			$editUser->activo  = $activo;

			foreach ($editUser->serviciosXCoiffeur as $serv) {
				if(!$serv->especial){
					$serv->precio = $precio_default;
					$serv->precio_efectivo = $precio_efectivo_default;
					$serv->comision = $comision_default;
				}
			}
			
			$editUser = Managers\ServicioManager::getInstance()->save($editUser);
			//var_dump($editUser); die();
			
			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado el Servicio!';
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
			\Managers\ServicioManager::getInstance()->setJoinDeAdministracion($this->administracionActual);
		}*/

		$data = \Managers\ServicioManager::getInstance()->getDatatableDatasource($this->input->post());
		echo $data;
	}


	public function getCoiffeursXServicio($id_servicio){

		$aServicio = Managers\ServicioManager::getInstance()->get($id_servicio);
		$coiffeurs = array();

		foreach($aServicio->serviciosXCoiffeur as $co){
			$coiffeurs[] = \Managers\ServicioXCoiffeurManager::getInstance()->toArray($co);		
		}				

		$result['coiffeurs'] = $coiffeurs;
		echo json_encode($result);

	}


	public function listadeprecios(){
		if ($this->actualBackuser->perfil->id == 1){

			$breadcrumb = array();
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['pageSubtitle'] = 'Listado de precios de Servicios';

			$aServicios = Managers\ServicioManager::getInstance()->getAll();
			$this->data['aServicios'] = $aServicios;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'precios.tpl', $this->data);

		} else {
			redirect('admin');
		}
	}

	public function cambiarPrecio(){

		$servicio_id = intval($this->input->post('servicio_id'));
		$precio_default = floatval($this->input->post('servicio_precio_default'));
		$precio_efectivo_default = floatval($this->input->post('servicio_precio_efectivo_default'));


		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al servicio';
		$result['title'] = 'Cambio de precios';


		if ($this->actualBackuser->perfil->id == 1){
			if ($aServicio = \Managers\ServicioManager::getInstance()->get($servicio_id)){

				$aServicio->precio_default = $precio_default;
				$aServicio->precio_efectivo_default = $precio_efectivo_default;

				// aca solo se cambian los valores de los servicios
				foreach ($aServicio->serviciosXCoiffeur as $serv) {
					if(!$serv->especial){
						$serv->precio = $precio_default;
						$serv->precio_efectivo = $precio_efectivo_default;
					}
				}
				
				$aServicio = Managers\ServicioManager::getInstance()->save($aServicio);

				$result['status'] = true;
				$result['message'] = 'Se ha cambiado el precio del servicio';


			}
		}

		echo json_encode($result);
	}

	public function imprimir(){
		$pdf = \Managers\PdfManager::getInstance()->generarListadoPreciosServicios();
	}

}
