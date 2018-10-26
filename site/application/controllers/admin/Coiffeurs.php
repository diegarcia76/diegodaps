<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Coiffeurs extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/coiffeurs/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'coiffeurs';
		$this->data['pageSubtitle'] = 'Coiffeurs';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		$aCoiffeurs = Managers\CoiffeurManager::getInstance()->getAll();

//		$aHorariosEspeciales = Managers\HorarioEspecialManager::getInstance()->getAll();
		
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
		$this->data['aCoiffeurs'] = $aCoiffeurs;
//		$this->data['aHorariosEspeciales'] = $aHorariosEspeciales;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'listado.tpl', $this->data);
	}


	public function add(){

		if ($this->actualBackuser->perfil->id == 1){
			$breadcrumb = array();
			$breadcrumb['Coiffeurs'] = $this->controller_url('');
			$breadcrumb['Agregar nuevo Coiffeur'] = $this->controller_url('add');
			$this->data['breadcrumb'] = $breadcrumb;			
			
			$this->data['submenuactive'] = 'add';
			$this->data['servicios'] = Managers\ServicioManager::getInstance()->getAll();
			$this->data['pageTitle'] = 'Agregar nuevo Coiffeur';
			$this->parser->parse($this->parsePath.'form.tpl', $this->data);
		}else{
			redirect('admin');
		}

	}

	public function eliminar($coiffeur_id){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar coiffeur';
		$result['message'] = 'Imposible eliminar el coiffeur';

		if ($this->actualBackuser->perfil->id == 1){

			if ($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					$result['message'] = 'El usuario que trata de eliminar no es de esta federación';
				}else{*/
				\Managers\CoiffeurManager::getInstance()->delete($aCoiffeur);
				$result["title"]   = "Coiffeur eliminado";
				$result["status"]  = true;
				$result["message"] = 'Se ha eliminado al coiffeur';
				//}
			}
		}else{
			$result['title'] = 'Error de permisos';
		}
		
		echo json_encode($result);
	}
	
	public function editar($coiffeur_id){

		if ($this->actualBackuser->perfil->id == 1){

			if ($editUser = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){
				
				$this->data['editUser'] = $editUser;

				$breadcrumb = array();
				$breadcrumb['Coiffeurs'] = $this->controller_url('');
				$breadcrumb['Editar Coiffeur'] = $this->controller_url('editar/'.$coiffeur_id);
				$this->data['breadcrumb'] = $breadcrumb;				
		
				$this->data['submenuactive'] = '';
				$this->data['pageTitle'] = 'Editar Coiffeur';
				$this->parser->parse($this->parsePath.'form.tpl', $this->data);
			} else {
				redirect($this->controller_url());
			}
		}else{
			redirect('admin');
		}

	}

	public function ver($coiffeur_id){

		if ($this->actualBackuser->perfil->id == 1){

			if ($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){

				/*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
					redirect('admin/usuarios');
				}*/
				
				$breadcrumb = array();
				$breadcrumb['Coiffeurs'] = 'admin/coiffeurs/listado';
				$breadcrumb[$aCoiffeur->nombre] = 'admin/coiffeurs/ver/'.$aCoiffeur->id;
				$this->data['breadcrumb'] = $breadcrumb;

				$this->data['contentTitle'] = $aCoiffeur->nombre;
				$this->data['contentSubtitle'] = 'Id '.$aCoiffeur->id;
				
				$this->data['coiffeur'] = $aCoiffeur;

				$this->parser->parse('admin/coiffeurs/ver.tpl', $this->data);
				
			} else {
				redirect('admin/coiffeurs');
			}
		}else{
			redirect('admin');
		}
	}
	
	public function save(){
		$this->load->library('form_validation');
		
		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar al coiffeur';
		$result['title'] = 'Error en el formulario';

		if ($this->actualBackuser->perfil->id == 1){
			
			$user_id = intval($this->input->post('user_id'));
			$nombre = trim($this->input->post('nombre'));
					
			$descripcion = $this->input->post('descripcion');
			$borrar_imagen = $this->input->post('borrar_imagen');
			$imagen = $this->input->post('imagen');
			$activo = $this->input->post('activo');
			$servicios = $this->input->post('servicios');

			//var_dump($servicios); die();
			//$activo = $this->input->post('activo');
			
			/*if (!$activo){
				$activo = 0;
			}*/
			
			if ($user_id){
				//$url_slug_exists = Managers\CoiffeurManager::getInstance()->url_slug_exists($url_slug, $user_id);
				if (!$editUser = Managers\CoiffeurManager::getInstance()->get($user_id)){
					$result['message'] = 'Error en la llamada';
					echo json_encode($result);
					die();
				}
			} else {
				//$url_slug_exists = Managers\CoiffeurManager::getInstance()->url_slug_exists($url_slug);
				$editUser = Managers\CoiffeurManager::getInstance()->create();
							
			}

			/*if(count($url_slug_exists) > 0){
				$result['message'] = 'Ya existe un coiffeur con ese url_slug!!';
				echo json_encode($result);
				die();
			}*/
			if(isset($_FILES['imagen']['tmp_name'])){
				$imagen = $_FILES['imagen']['tmp_name'];
				//var_dump($imagen); die();
				$newImagen = Managers\ImagenManager::getInstance()->create($imagen);
				$newImagen->temporal = false;
				$editUser->foto = $newImagen;
				$newImagen->coiffeur = $editUser;
			}
			
			if($borrar_imagen==1){
				$editUser->foto = null;
			}		
						
			if ($nombre == ''){
					$result['message'] = 'Error en los datos';
					echo json_encode($result);
					die();
			}

			$editUser->nombre = $nombre;
			$editUser->descripcion  = $descripcion;	
			$editUser->activo  = $activo;			
			//var_dump($editUser); die();

			if(count($servicios)>0)
				foreach ($servicios as $aServ){
					$aServicio = \Managers\ServicioManager::getInstance()->get(intval($aServ));

					$aServicioXCouffeur = \Managers\ServicioXCoiffeurManager::getInstance()->create();
					
					$aServicioXCouffeur->servicio = $aServicio;
					$aServicioXCouffeur->precio = $aServicio->precio_default;
					$aServicioXCouffeur->precio_efectivo = $aServicio->precio_efectivo_default;
					$aServicioXCouffeur->comision = $aServicio->comision_default;
					$aServicioXCouffeur->coiffeur = $editUser;

					$editUser->serviciosXCoiffeur->add($aServicioXCouffeur);

				}

			$editUser = Managers\CoiffeurManager::getInstance()->save($editUser);
			
			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado el Coiffeur!';
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
			\Managers\CoiffeurManager::getInstance()->setJoinDeAdministracion($this->administracionActual);
		}*/

		$data = \Managers\CoiffeurManager::getInstance()->getDatatableDatasource($this->input->post());
		echo $data;
	}


	public function administrar_precios($coiffeur_id){

		if ($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){	
			$breadcrumb = array();
			$breadcrumb['Coiffeurs'] = $this->controller_url('');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['servicios'] = Managers\ServicioManager::getInstance()->getAll();
			$this->data['coiffeur'] = $aCoiffeur;

			$this->data['submenuactive'] = 'listado';
			$this->data['pageTitle'] = 'Precios X Servicio: '.$aCoiffeur->nombre;
			$this->parser->parse('admin/coiffeurs/listadoPrecios.tpl', $this->data);
		} else {
			redirect('admin');
		}

	}

	public function administrar_horarios($coiffeur_id){

		if ($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){	
			$breadcrumb = array();
			$breadcrumb['Coiffeurs'] = $this->controller_url('');
			$this->data['breadcrumb'] = $breadcrumb;

			$this->data['dias'] = Managers\DiaSemanaManager::getInstance()->getAll();
			$this->data['coiffeur'] = $aCoiffeur;

			$this->data['submenuactive'] = 'listado';
			$this->data['pageTitle'] = 'Horarios X Coiffeur: '.$aCoiffeur->nombre;
			$this->parser->parse('admin/coiffeurs/listadoHorarios.tpl', $this->data);
		} else {
			redirect('admin');
		}

	}


	public function save_precios(){

		ini_set('memory_limit', '-1');
		$coiffeur_id = $_POST['coiffeur_id'];
		$precio = $_POST['precio'];
		$precio_efectivo = $_POST['precio_efectivo'];
		$comision = $_POST['comision'];
		$servicio = $_POST['servicio'];
		$especial = $_POST['especial'];
		//var_dump($especial); die();
	
		$result['status'] = false;
		$result['message'] = 'Error en la llamada';
		
		try{
			if($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){
			
				$aCoiffeur->serviciosXCoiffeur->clear();
				
				foreach ($precio as $key => $hd){
					
					$aPrecio = $hd;
					$aPrecioEfectivo = $precio_efectivo[$key];
					$aComision = $comision[$key];
					$aServicio = $servicio[$key];
					$aEspecial = $especial[$key];

					//$aPuesto = intval($key) + 1;

					$aServicio = Managers\ServicioManager::getInstance()->get($aServicio);
					//var_dump($aHoraDesde->format('H:i:s'));
					$aServicioXCoiffeur = Managers\ServicioXCoiffeurManager::getInstance()->create();
					$aServicioXCoiffeur->servicio = $aServicio;
					$aServicioXCoiffeur->precio = $aPrecio;
					$aServicioXCoiffeur->precio_efectivo = $aPrecioEfectivo;
					$aServicioXCoiffeur->comision = $aComision;
					if($aEspecial==1)
						$aServicioXCoiffeur->especial = true;
					else
						$aServicioXCoiffeur->especial = false;
					
					$aServicioXCoiffeur->coiffeur = $aCoiffeur;
					//$aHorario = Managers\HorarioDeAtencionManager::getInstance()->save($aHorario);
					
					$aCoiffeur->serviciosXCoiffeur->add($aServicioXCoiffeur);
				}
				
				Managers\CoiffeurManager::getInstance()->save($aCoiffeur);
				$result['status'] = true;
				$result['coiffeur_id'] = $aCoiffeur->id;
				$result['message'] = 'Se guardaron los Precios X Servicio de <strong>'.$aCoiffeur->nombre.'</strong>';
			
			}
		}catch(Exception $e) {
		    var_dump($e->getMessage());
		}

		echo json_encode($result);

		
	}


	public function save_horarios(){

		ini_set('memory_limit', '-1');
		$coiffeur_id = $_POST['coiffeur_id'];
		$horaDesde = $_POST['horaDesde'];
		$horaHasta = $_POST['horaHasta'];
		$dia = $_POST['dia'];
	
		$result['status'] = false;
		$result['message'] = 'Error en la llamada';
		
		try{
			if($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){
			
				$aCoiffeur->horariosDeAtencionXCoiffeur->clear();

				foreach ($horaDesde as $key => $hd){
						
					$aHoraDesde = Datetime::createFromFormat('H:i',$hd);
					//var_dump($aHoraDesde->format('H:i:s'));
					$aHoraHasta = Datetime::createFromFormat('H:i',$horaHasta[$key]);
					$aDia = $dia[$key];						

					//$aPuesto = intval($key) + 1;

					$aDia = Managers\DiaSemanaManager::getInstance()->get($aDia);
					//var_dump($aDia->nombre);
					$aHorario = Managers\HorarioDeAtencionXCoiffeurManager::getInstance()->create();
					$aHorario->diaSemana = $aDia;
					$aHorario->horaDesde = $aHoraDesde;
					$aHorario->horaHasta = $aHoraHasta;
					$aHorario->coiffeur = $aCoiffeur;
					//$aHorario = Managers\HorarioDeAtencionManager::getInstance()->save($aHorario);
					
					$aCoiffeur->horariosDeAtencionXCoiffeur->add($aHorario);
				}				
				
				Managers\CoiffeurManager::getInstance()->save($aCoiffeur);
				$result['status'] = true;
				$result['coiffeur_id'] = $aCoiffeur->id;
				$result['url'] = 'administrar_horarios/'.$aCoiffeur->id;
				$result['message'] = 'Se guardaron los Horarios de atención de <strong>'.$aCoiffeur->nombre.'</strong>';
			
			}
		}catch(Exception $e) {
		    var_dump($e->getMessage());
		}

		echo json_encode($result);

		
	}


	public function save_ausencias(){

		ini_set('memory_limit', '-1');
		$coiffeur_id = $this->input->post('coiffeur_id');
		$fechas_inicio = $this->input->post('fecha_inicio');
		$fechas_fin = $this->input->post('fecha_fin');
		$motivos = $this->input->post('motivo');

	
		$result['status'] = false;
		$result['message'] = 'Error en la llamada';
		$result['post'] = $_POST;
		
		try{
			if($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){
			
				$aCoiffeur->ausencias->clear();

				foreach ($fechas_inicio as $key => $fechaIni){
						
					$fecha_inicio = Datetime::createFromFormat('Y-m-d',$fechaIni);
					$fecha_fin = Datetime::createFromFormat('Y-m-d',$fechas_fin[$key]);
					$motivo = $motivos[$key];

					$aAusencia = Managers\AusenciaManager::getInstance()->create();

					$aAusencia->fecha_inicio = $fecha_inicio;
					$aAusencia->fecha_fin = $fecha_fin;
					$aAusencia->motivo = $motivo;
					$aAusencia->coiffeur = $aCoiffeur;
					//$aHorario = Managers\HorarioDeAtencionManager::getInstance()->save($aHorario);
					
					$aCoiffeur->ausencias->add($aAusencia);
				}				
				
				Managers\CoiffeurManager::getInstance()->save($aCoiffeur);
				$result['status'] = true;
				$result['coiffeur_id'] = $aCoiffeur->id;
				$result['url'] = 'administrar_horarios/'.$aCoiffeur->id;
				$result['message'] = 'Se guardaron las Ausencias de <strong>'.$aCoiffeur->nombre.'</strong>';
			
			}

		}catch(Exception $e) {
		    var_dump($e->getMessage());
		}
		
		echo json_encode($result);

		
	}


	public function getServiciosXCoiffeur2($id_coiffeur){

		$aCoiffeur = Managers\CoiffeurManager::getInstance()->get($id_coiffeur);
		$servicios = array();

		foreach($aCoiffeur->serviciosXCoiffeur as $se){
			$servicios[] = \Managers\ServicioXCoiffeurManager::getInstance()->toArray($se);		
		}				

		$result['servicios'] = $servicios;
		echo json_encode($result);

	}
	
	public function getServiciosXCoiffeur($id_coiffeur){

		$aCoiffeur = Managers\CoiffeurManager::getInstance()->get($id_coiffeur);
		$servicios = array();
		$servicios1 = array();
		$servicios2 = array();
		$servicios3 = array();
		$servicios_temp = array();
		
		if ($id_coiffeur == 8){
			$aServ = Managers\ServicioManager::getInstance()->getAllDiego();
				foreach($aServ as $se){
					$servicios1[] = \Managers\ServicioManager::getInstance()->toArray2($se);		
				}
				foreach($aCoiffeur->serviciosXCoiffeur as $se){
					$servicios_temp[] = \Managers\ServicioXCoiffeurManager::getInstance()->toArray($se);		
				}
			
			$servicios2 = array_merge($servicios1, $servicios_temp);
			//var_dump($servicios2);
		//	$servicios3 = sort($servicios2[], SORT_REGULAR);
			//var_dump($servicios2); die();
				$result['servicios'] = $servicios2;
				echo json_encode($result);
		}else{
		
			foreach($aCoiffeur->serviciosXCoiffeur as $se){
				$servicios[] = \Managers\ServicioXCoiffeurManager::getInstance()->toArray($se);		
			}
				$result['servicios'] = $servicios;
				echo json_encode($result);
		
		
		}	
				
		
		
					

	

	}


	public function administrar_horarios_especiales($horario_especial_id, $coiffeur_id = null){


		if ($this->actualBackuser->perfil->id == 1){

				if (!$aHorarioEspecial = Managers\HorarioEspecialManager::getInstance()->get($horario_especial_id)){
					$horariosEspeciales = Managers\HorarioEspecialManager::getInstance()->getAll();
					$aHorarioEspecial = current($horariosEspeciales);
				}
				

				$this->data['mostrar'] = '';
				if (!$aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){	
					$aCoiffeur = null;
					$this->data['mostrar'] = 'hidden';
				}

				$breadcrumb = array();

				$breadcrumb['Coiffeurs'] = $this->controller_url('');
				$this->data['breadcrumb'] = $breadcrumb;

				$this->data['dias'] = \Managers\DiaSemanaManager::getInstance()->getAll();
				$this->data['aCoiffeurs'] = \Managers\CoiffeurManager::getInstance()->getAll();
				$this->data['aHorariosEspeciales'] = \Managers\HorarioEspecialManager::getInstance()->getAll();

				$this->data['coiffeur'] = $aCoiffeur;
				$this->data['aHorarioEspecial'] = $aHorarioEspecial;

				$this->data['submenuactive'] = 'listado';
				$this->data['pageTitle'] = 'Horarios Especiales X Coiffeur ';
				$this->parser->parse('admin/coiffeurs/listadoHorariosEspeciales.tpl', $this->data);


		} else {
			redirect('admin');
		}

	}


	public function save_horarios_especiales(){

		ini_set('memory_limit', '-1');
		$coiffeur_id = $_POST['coiffeur_id'];
		$horario_especial_id = $_POST['horario_especial_id'];
		$horaDesde = isset($_POST['horaDesde'])?$_POST['horaDesde']:'';
		$horaHasta = isset($_POST['horaHasta'])?$_POST['horaHasta']:'';
		$dia = isset($_POST['dia'])?$_POST['dia']:'';
	
		$result['status'] = false;
		$result['message'] = 'Error en la llamada';
		
		try{
			if($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id)){
			
				$aCoiffeur->horariosDeAtencionEspecialXCoiffeur->clear();

				if($horaDesde!='')
					foreach ($horaDesde as $key => $hd){
							
						$aHoraDesde = Datetime::createFromFormat('H:i',$hd);
						//var_dump($aHoraDesde->format('H:i:s'));
						$aHoraHasta = Datetime::createFromFormat('H:i',$horaHasta[$key]);
						$aDia = $dia[$key];						

						//$aPuesto = intval($key) + 1;

						$aDia = Managers\DiaSemanaManager::getInstance()->get($aDia);
						$aHorarioEspecial = Managers\HorarioEspecialManager::getInstance()->get($horario_especial_id);
						//var_dump($aDia->nombre);
						$aHorario = Managers\HorarioDeAtencionEspecialXCoiffeurManager::getInstance()->create();
						$aHorario->diaSemana = $aDia;
						$aHorario->horarioEspecial = $aHorarioEspecial;
						$aHorario->horaDesde = $aHoraDesde;
						$aHorario->horaHasta = $aHoraHasta;
						$aHorario->coiffeur = $aCoiffeur;
						//$aHorario = Managers\HorarioDeAtencionManager::getInstance()->save($aHorario);
						
						$aCoiffeur->horariosDeAtencionEspecialXCoiffeur->add($aHorario);
					}				
					
				Managers\CoiffeurManager::getInstance()->save($aCoiffeur);
				$result['status'] = true;
				$result['coiffeur_id'] = $aCoiffeur->id;
				$result['url'] = 'administrar_horarios_especiales/'.$horario_especial_id.'/'.$aCoiffeur->id;
				$result['message'] = 'Se guardaron los Horarios de atención especial de <strong>'.$aCoiffeur->nombre.'</strong>';
			
			}
		}catch(Exception $e) {
		    var_dump($e->getMessage());
		}

		echo json_encode($result);

		
	}
	
	
	public function eliminar_todos(){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar Estilista';
		$result['message'] = 'Imposible eliminar el Estilista';

		$lote = $this->input->post('lote');
		
		
		$i =0;
		foreach ($lote as $lot){
			if ($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($lot)){

				
				\Managers\CoiffeurManager::getInstance()->delete($aCoiffeur);
				
			
			}
		}
		
			
				$result["title"]   = "Estilista eliminado";
				$result["status"]  = true;
				$result["message"] = 'Se han eliminado los Estilistas';	
		

		echo json_encode($result);
	}


}
