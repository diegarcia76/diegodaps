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
			$this->data['categorias'] = Managers\CategoriaManager::getInstance()->getAll();				
			
			$this->data['submenuactive'] = 'add';
			$this->data['pageTitle'] = 'Agregar nuevo Servicio';
			$this->parser->parse($this->parsePath.'form.tpl', $this->data);
		}else{
			redirect('admin');
		}

	}

	public function eliminar_todos(){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar producto';
		$result['message'] = 'Imposible eliminar el producto';

		$lote = $this->input->post('lote');
		
		
		$i =0;
		foreach ($lote as $lot){
			if ($aServicio = Managers\ServicioManager::getInstance()->get($lot)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					$result['message'] = 'El usuario que trata de eliminar no es de esta federación';
				}else{*/
				Managers\ServicioManager::getInstance()->delete($aServicio);
				
			
			}
		}
		
			
				$result["title"]   = "Productos eliminado";
				$result["status"]  = true;
				$result["message"] = 'Se han eliminado los productos';	
		

		echo json_encode($result);
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
				$this->data['categorias'] = Managers\CategoriaManager::getInstance()->getAll();				
		
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
			$intervalo = $this->input->post('intervalo');
			$precio_default = $this->input->post('precio_default');
			$precio_efectivo_default = $this->input->post('precio_efectivo_default');
			$comision_default = $this->input->post('comision_default');
			$servicioEnApp = $this->input->post('servicioEnApp');
			$division_grilla = $this->input->post('division_grilla');
			$activo = $this->input->post('activo');
			$categoria = $this->input->post('categoria');
			
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
			$editUser->intervalo  = $intervalo;
			$editUser->duracion_espera  = $duracion_espera;
			$editUser->precio_default  = $precio_default;
			$editUser->precio_efectivo_default  = $precio_efectivo_default;
			$editUser->comision_default  = $comision_default;
			$editUser->servicioEnApp  = $servicioEnApp;
			$editUser->division_grilla  = $division_grilla;
			$editUser->activo  = $activo;
			$editUser->categoria  = $categoria;

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
	
	public function aumentar(){
		$breadcrumb = array();
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['pageSubtitle'] = 'Aumento de precios de Servicios';

			//$aServicios = Managers\ServicioManager::getInstance()->getAll();
			//$this->data['aServicios'] = $aServicios;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'formAumento.tpl', $this->data);
	}
	
	public function saveAumento(){
		$breadcrumb = array();
			$aumento = intval($this->input->post('aumento'));
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['pageSubtitle'] = 'Aumento de precios de Servicios';

			$aServicios = Managers\ServicioManager::getInstance()->getAll();
			$sub = 0;
			$sub2 = 0;
			
			foreach ($aServicios as $ser){
				set_time_limit(300);
				$precio = $ser->precio_default;
				//echo $precio."<br>";
				$precio2 = $ser->precio_efectivo_default;
				$sub =$precio +  ($precio * $aumento / 100);
				$sub2 =$precio2 +  ($precio2 * $aumento / 100);
				//echo $sub."<br>";
				$sub = round($sub, 0);
				$sub2 = round($sub2, 0);
				//echo "FINAL: ".$sub."<br>";  
				//echo "ULTIMO ".substr($sub,-1,1)."<br>";
				$ultimo = substr($sub,-1,1);
				$ultimo2 = substr($sub2,-1,1);
				if ($ultimo == 0){
					$final = $sub;
				}
				if ($ultimo == 1){
					$final = $sub + 4;
				}
				if ($ultimo == 2){
					$final = $sub + 3;
				}
				if ($ultimo == 3){
					$final = $sub + 2;
				}
				if ($ultimo == 4){
					$final = $sub + 1;
				}
				if ($ultimo == 5){
					$final = $sub ;
				}
				if ($ultimo == 6){
					$final = $sub + 4;
				}
				if ($ultimo == 7){
					$final = $sub + 3;
				}
				if ($ultimo == 8){
					$final = $sub + 2;
				}
				if ($ultimo == 9){
					$final = $sub + 1;
				}
				
				//
				
				if ($ultimo2 == 0){
					$final2 = $sub2;
				}
				if ($ultimo2 == 1){
					$final2 = $sub2 + 4;
				}
				if ($ultimo2 == 2){
					$final2 = $sub2 + 3;
				}
				if ($ultimo2 == 3){
					$final2 = $sub2 + 2;
				}
				if ($ultimo2 == 4){
					$final2 = $sub2 + 1;
				}
				if ($ultimo2 == 5){
					$final2 = $sub2 ;
				}
				if ($ultimo2 == 6){
					$final2 = $sub2 + 4;
				}
				if ($ultimo2 == 7){
					$final2 = $sub2 + 3;
				}
				if ($ultimo2 == 8){
					$final2 = $sub2 + 2;
				}
				if ($ultimo2 == 9){
					$final2 = $sub2 + 1;
				}
				
				$aSer = Managers\ServicioManager::getInstance()->get($ser->id);
				$aSer->precio_default = $final;
				$aSer->precio_efectivo_default = $final2;
				$aSer = Managers\ServicioManager::getInstance()->save($aSer);
				
				//echo "final ".$final."<br>";
				
				
				//round(3.6, 0); 
				
			}
			//die();
			
			//$this->data['aServicios'] = $aServicios;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'formAumentoOk.tpl', $this->data);
	}
	
	public function rebajar(){
		$breadcrumb = array();
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['pageSubtitle'] = 'Rebaja de precios de Servicios';

			//$aServicios = Managers\ServicioManager::getInstance()->getAll();
			//$this->data['aServicios'] = $aServicios;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'formRebaja.tpl', $this->data);
	}
	
	public function saveRebaja(){
		$breadcrumb = array();
			$aumento = intval($this->input->post('aumento'));
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['pageSubtitle'] = 'Rebaja de precios de Servicios';

			$aServicios = Managers\ServicioManager::getInstance()->getAll();
			$sub = 0;
			$sub2 = 0;
			
			foreach ($aServicios as $ser){
			set_time_limit(300);
				$precio = $ser->precio;
				//echo $precio."<br>";
				$precio2 = $ser->precio_efectivo;
				$sub =$precio -  ($precio * $aumento / 100);
				$sub2 =$precio2 -  ($precio2 * $aumento / 100);
				//echo $sub."<br>";
				$sub = round($sub, 0);
				$sub2 = round($sub2, 0);
				//echo "FINAL: ".$sub."<br>";  
				//echo "ULTIMO ".substr($sub,-1,1)."<br>";
				$ultimo = substr($sub,-1,1);
				$ultimo2 = substr($sub2,-1,1);
				if ($ultimo == 0){
					$final = $sub;
				}
				if ($ultimo == 1){
					$final = $sub + 4;
				}
				if ($ultimo == 2){
					$final = $sub + 3;
				}
				if ($ultimo == 3){
					$final = $sub + 2;
				}
				if ($ultimo == 4){
					$final = $sub + 1;
				}
				if ($ultimo == 5){
					$final = $sub ;
				}
				if ($ultimo == 6){
					$final = $sub + 4;
				}
				if ($ultimo == 7){
					$final = $sub + 3;
				}
				if ($ultimo == 8){
					$final = $sub + 2;
				}
				if ($ultimo == 9){
					$final = $sub + 1;
				}
				
				//
				
				if ($ultimo2 == 0){
					$final2 = $sub2;
				}
				if ($ultimo2 == 1){
					$final2 = $sub2 + 4;
				}
				if ($ultimo2 == 2){
					$final2 = $sub2 + 3;
				}
				if ($ultimo2 == 3){
					$final2 = $sub2 + 2;
				}
				if ($ultimo2 == 4){
					$final2 = $sub2 + 1;
				}
				if ($ultimo2 == 5){
					$final2 = $sub2 ;
				}
				if ($ultimo2 == 6){
					$final2 = $sub2 + 4;
				}
				if ($ultimo2 == 7){
					$final2 = $sub2 + 3;
				}
				if ($ultimo2 == 8){
					$final2 = $sub2 + 2;
				}
				if ($ultimo2 == 9){
					$final2 = $sub2 + 1;
				}
				
				$aSer = Managers\ServicioManager::getInstance()->get($ser->id);
				$aSer->precio = $final;
				$aSer->precio_efectivo = $final2;
				$aSer = Managers\ServicioManager::getInstance()->save($aSer);
				
				//echo "final ".$final."<br>";
				
				
				//round(3.6, 0); 
				
			}
			//die();
			
			//$this->data['aServicios'] = $aServicios;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'formAumentoOk.tpl', $this->data);
	}
	
	
	public function aumentarCoiffeurs(){
		$breadcrumb = array();
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['pageSubtitle'] = 'Aumento de precios de Servicios x Coiffeurs';

			//$aServicios = Managers\ServicioManager::getInstance()->getAll();
			//$this->data['aServicios'] = $aServicios;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'formAumentoCoiffeurs.tpl', $this->data);
	}
	
	public function saveAumentoCoiffeurs(){
		$breadcrumb = array();
			$aumento = intval($this->input->post('aumento'));
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['pageSubtitle'] = 'Aumento de precios de Servicios x Coiffeurs';

			$aServicios = Managers\ServicioXCoiffeurManager::getInstance()->getAll();
			$sub = 0;
			$sub2 = 0;
			
			foreach ($aServicios as $ser){
			set_time_limit(300);
				$precio = $ser->precio;
				//echo $precio."<br>";
				$precio2 = $ser->precio_efectivo;
				$sub =$precio +  ($precio * $aumento / 100);
				$sub2 =$precio2 +  ($precio2 * $aumento / 100);
				//echo $sub."<br>";
				$sub = round($sub, 0);
				$sub2 = round($sub2, 0);
				//echo "FINAL: ".$sub."<br>";  
				//echo "ULTIMO ".substr($sub,-1,1)."<br>";
				$ultimo = substr($sub,-1,1);
				$ultimo2 = substr($sub2,-1,1);
				if ($ultimo == 0){
					$final = $sub;
				}
				if ($ultimo == 1){
					$final = $sub + 4;
				}
				if ($ultimo == 2){
					$final = $sub + 3;
				}
				if ($ultimo == 3){
					$final = $sub + 2;
				}
				if ($ultimo == 4){
					$final = $sub + 1;
				}
				if ($ultimo == 5){
					$final = $sub ;
				}
				if ($ultimo == 6){
					$final = $sub + 4;
				}
				if ($ultimo == 7){
					$final = $sub + 3;
				}
				if ($ultimo == 8){
					$final = $sub + 2;
				}
				if ($ultimo == 9){
					$final = $sub + 1;
				}
				
				//
				
				if ($ultimo2 == 0){
					$final2 = $sub2;
				}
				if ($ultimo2 == 1){
					$final2 = $sub2 + 4;
				}
				if ($ultimo2 == 2){
					$final2 = $sub2 + 3;
				}
				if ($ultimo2 == 3){
					$final2 = $sub2 + 2;
				}
				if ($ultimo2 == 4){
					$final2 = $sub2 + 1;
				}
				if ($ultimo2 == 5){
					$final2 = $sub2 ;
				}
				if ($ultimo2 == 6){
					$final2 = $sub2 + 4;
				}
				if ($ultimo2 == 7){
					$final2 = $sub2 + 3;
				}
				if ($ultimo2 == 8){
					$final2 = $sub2 + 2;
				}
				if ($ultimo2 == 9){
					$final2 = $sub2 + 1;
				}
				
				$aSer = Managers\ServicioXCoiffeurManager::getInstance()->get($ser->id);
				$aSer->precio = $final;
				$aSer->precio_efectivo = $final2;
				$aSer = Managers\ServicioXCoiffeurManager::getInstance()->save($aSer);
				
				//echo "final ".$final."<br>";
				
				
				//round(3.6, 0); 
				
			}
			//die();
			
			//$this->data['aServicios'] = $aServicios;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'formAumentoOk.tpl', $this->data);
	}
	public function rebajarCoiffeurs(){
		$breadcrumb = array();
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['pageSubtitle'] = 'Rebaja de precios de Servicios x Coiffeurs';

			//$aServicios = Managers\ServicioManager::getInstance()->getAll();
			//$this->data['aServicios'] = $aServicios;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'formRebajaCoiffeurs.tpl', $this->data);
	}
	
	public function saveRebajaCoiffeurs(){
		$breadcrumb = array();
			$aumento = intval($this->input->post('aumento'));
			$breadcrumb['Dashboard'] = $this->controller_url('admin');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['pageSubtitle'] = 'Rebaja de precios de Servicios x Coiffeurs';

			$aServicios = Managers\ServicioXCoiffeurManager::getInstance()->getAll();
			$sub = 0;
			$sub2 = 0;
			
			foreach ($aServicios as $ser){
			set_time_limit(300);
				$precio = $ser->precio_default;
				//echo $precio."<br>";
				$precio2 = $ser->precio_efectivo_default;
				$sub =$precio -  ($precio * $aumento / 100);
				$sub2 =$precio2 -  ($precio2 * $aumento / 100);
				//echo $sub."<br>";
				$sub = round($sub, 0);
				$sub2 = round($sub2, 0);
				//echo "FINAL: ".$sub."<br>";  
				//echo "ULTIMO ".substr($sub,-1,1)."<br>";
				$ultimo = substr($sub,-1,1);
				$ultimo2 = substr($sub2,-1,1);
				if ($ultimo == 0){
					$final = $sub;
				}
				if ($ultimo == 1){
					$final = $sub + 4;
				}
				if ($ultimo == 2){
					$final = $sub + 3;
				}
				if ($ultimo == 3){
					$final = $sub + 2;
				}
				if ($ultimo == 4){
					$final = $sub + 1;
				}
				if ($ultimo == 5){
					$final = $sub ;
				}
				if ($ultimo == 6){
					$final = $sub + 4;
				}
				if ($ultimo == 7){
					$final = $sub + 3;
				}
				if ($ultimo == 8){
					$final = $sub + 2;
				}
				if ($ultimo == 9){
					$final = $sub + 1;
				}
				
				//
				
				if ($ultimo2 == 0){
					$final2 = $sub2;
				}
				if ($ultimo2 == 1){
					$final2 = $sub2 + 4;
				}
				if ($ultimo2 == 2){
					$final2 = $sub2 + 3;
				}
				if ($ultimo2 == 3){
					$final2 = $sub2 + 2;
				}
				if ($ultimo2 == 4){
					$final2 = $sub2 + 1;
				}
				if ($ultimo2 == 5){
					$final2 = $sub2 ;
				}
				if ($ultimo2 == 6){
					$final2 = $sub2 + 4;
				}
				if ($ultimo2 == 7){
					$final2 = $sub2 + 3;
				}
				if ($ultimo2 == 8){
					$final2 = $sub2 + 2;
				}
				if ($ultimo2 == 9){
					$final2 = $sub2 + 1;
				}
				
				$aSer = Managers\ServicioXCoiffeurManager::getInstance()->get($ser->id);
				$aSer->precio_default = $final;
				$aSer->precio_efectivo_default = $final2;
				$aSer = Managers\ServicioXCoiffeurManager::getInstance()->save($aSer);
				
				//echo "final ".$final."<br>";
				
				
				//round(3.6, 0); 
				
			}
			//die();
			
			//$this->data['aServicios'] = $aServicios;
			$this->data['submenuactive'] = '';
			$this->parser->parse($this->parsePath.'formAumentoOk.tpl', $this->data);
	}
	

}
