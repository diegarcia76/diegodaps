<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Configuracion extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/configuracion/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'configuracion';
		$this->data['pageSubtitle'] = 'Configuracion';
		//$this->data['accesos'] = $this->session->userdata('permisosLogin');
	}

	public function index(){
		//die();
		$breadcrumb = array();
		$breadcrumb['Dashboard'] = $this->controller_url('admin');
		//$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
		$this->data['breadcrumb'] = $breadcrumb;

		$aConfiguracion = \Managers\ConfiguracionManager::getInstance()->get(1);
		$aHorariosEspeciales = \Managers\HorarioEspecialManager::getInstance()->getAll();

		$this->data['editUser'] = $aConfiguracion;
		$this->data['aHorariosEspeciales'] = $aHorariosEspeciales;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'configuracion.tpl', $this->data);
	}
	
	public function save(){
		$this->load->library('form_validation');
		
		$result = array();
		$result['status'] = false;
		$result['message'] = 'Imposible de guardar la configuración';
		$result['title'] = 'Error en el formulario';
		
//		echo "<pre>", print_r($_FILES), "</pre>"; 
//		echo "<pre>", print_r($_POST), "</pre>"; die();

		if ($this->actualBackuser){
			
			$user_id = intval($this->input->post('user_id'));
			$descuento_efectivo = $this->input->post('descuento_efectivo');
			$comision_productos = $this->input->post('comision_productos');
			$descuento_efectivo_productos = $this->input->post('descuento_efectivo_productos');
			$cancelar_antes = $this->input->post('cancelar_antes');
			$dias_bloqueado = $this->input->post('dias_bloqueado');

			$fecha_desdeS = $this->input->post('fecha_desdeS');
			$fecha_hastaS = $this->input->post('fecha_hastaS');
			$horario_especial_id = $this->input->post('horario_especial_id');
			
			$aConfiguracion = \Managers\ConfiguracionManager::getInstance()->get(1);			

			if(is_null($horario_especial_id)){
				$horario_especial_id = array();
			}

			if ($fecha_desdeS){	
				foreach ($fecha_desdeS as $key => $titulo){

					$aFechaDesde = \DateTime::createFromFormat('Y-m-d', $titulo);
					$aFechaHasta = \DateTime::createFromFormat('Y-m-d', $fecha_hastaS[$key]);
					$aHorarioEspecial = $horario_especial_id[$key];
					
					if($aHorarioEspecial == ''){
						$aSuperpuesto = \Managers\HorarioEspecialManager::getInstance()->getSuperposicion($aFechaDesde, $aFechaHasta);
						//var_dump(count($aSuperpuesto)); die();
						if(count($aSuperpuesto)>0){
							$result['message'] = 'Hay superposición en los rangos de fechas especiales';
							$result['recargar'] = false;
							echo json_encode($result);
							die();
						}
					}

				}
			}

			$aHorariosEspeciales = \Managers\HorarioEspecialManager::getInstance()->getAll();

			$dinamicosPost = array();
			foreach ($horario_especial_id as $key => $aValue){
				if (!empty($aValue)){
					$dinamicosPost[] = $aValue;						
				} 
			}

			$dinamicosActual = array();
			foreach($aHorariosEspeciales as $aCampoDinamico){
				$dinamicosActual[] = $aCampoDinamico->id;
			}

			$dinamicosEliminar = array_diff($dinamicosActual, $dinamicosPost);
			foreach ($dinamicosEliminar as $aCampoDinamicoToDelID){
				$aCampoDinamicoToDel = Managers\HorarioEspecialManager::getInstance()->get($aCampoDinamicoToDelID);
				if(count($aCampoDinamicoToDel->horariosDeAtencionEspecialXCoiffeur)>0){
					/*$result['message'] = 'No puede Borrar una fecha con Horarios asignados';
					$result['recargar'] = true;
					echo json_encode($result);
					die();*/
					$aCampoDinamicoToDel->horariosDeAtencionEspecialXCoiffeur->clear();
				}

				Managers\HorarioEspecialManager::getInstance()->delete($aCampoDinamicoToDel);
			}

			if ($fecha_desdeS){	
				
				foreach ($fecha_desdeS as $key => $titulo){

					$aFechaDesde = $titulo;
					$aFechaHasta = $fecha_hastaS[$key];
					$aHorarioEspecial = $horario_especial_id[$key];

					if($aHorarioEspecial!='')
						$aSub = Managers\HorarioEspecialManager::getInstance()->get($aHorarioEspecial);
					else
						$aSub = Managers\HorarioEspecialManager::getInstance()->create();

					$aSub->fecha_desde = \DateTime::createFromFormat('Y-m-d', $aFechaDesde);
					$aSub->fecha_hasta = \DateTime::createFromFormat('Y-m-d', $aFechaHasta);

					$aSub = Managers\HorarioEspecialManager::getInstance()->save($aSub);
				}

			}

			$aConfiguracion->descuento_efectivo = $descuento_efectivo;
			$aConfiguracion->comision_productos  = $comision_productos;
			$aConfiguracion->descuento_efectivo_productos  = $descuento_efectivo_productos;
			$aConfiguracion->cancelar_antes  = $cancelar_antes;
			$aConfiguracion->dias_bloqueado  = $dias_bloqueado;
			
			$aConfiguracion = Managers\ConfiguracionManager::getInstance()->save($aConfiguracion);
			//var_dump($editUser); die();
			
			$result['title'] = 'Datos guardados correctamente';
			$result['message'] = 'Hemos guardado el Configuracion!';
			$result['status'] = true;
			$result['data'] = $this->input->post();

		}else{
			$result['title'] = 'Error de permisos';
		}
		
		echo json_encode($result);
		
	}	

	public function tieneHorariosAsociados($horario_especial_id = null){

		$aHorarioEspecial = Managers\HorarioEspecialManager::getInstance()->get($horario_especial_id);
		$result['status'] = false;
		if($aHorarioEspecial)
			if(count($aHorarioEspecial->horariosDeAtencionEspecialXCoiffeur) > 0){
				$result['status'] = true;
			}

		echo json_encode($result);

	}

}
