<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Admin extends BaseAdmin_Controller {

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
	private $parsePath = 'admin/dashboard/';

	public function __construct(){
		parent::__construct();
		$this->data['menuactive'] = 'Dashboard';
		$this->data['pageSubtitle'] = 'Turnos';
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
		
		$turnosHoy = \Managers\TurnoManager::getInstance()->getTurnosDashboard($diaActual);

		$this->data['turnosHoy'] = $turnosHoy;
		$this->data['submenuactive'] = '';
		$this->parser->parse($this->parsePath.'home.tpl', $this->data);
	}

	public function cambiar_estado($turno_id, $estado_a_cambiar = null){

		if ($aTurno = Managers\TurnoManager::getInstance()->get($turno_id)){			
			
			if($estado_a_cambiar){
				$aEstadoTurno = Managers\EstadoTurnoManager::getInstance()->get($estado_a_cambiar);
			}else{
				$aEstadoTurno = $aTurno->estadoTurno->accion_siguiente;		
			}
			$aTurno->estadoTurno = $aEstadoTurno;
			
			if ($aEstadoTurno->className == 'enservicio'){
				// tenemos que revisar si hay pagos pendientes... en todo casa
				if($aTurno->cliente){
					$aPago = Managers\PagoManager::getInstance()->getPagoCliente($aTurno->cliente);					
				}else{
					$aPago = Managers\PagoManager::getInstance()->create();
					$aPago->nombre = $aTurno->nombre;
				}
				
				$aPago = $aPago->addTurno($aTurno);
				$aPago = Managers\PagoManager::getInstance()->save($aPago);
				
			}
			//var_dump($aEstadoTurno->id);
			if($aEstadoTurno->id == 7){

				$userDataMin['id'] = $aTurno->cliente->id;
				$userDataMin['turnoid'] = $aTurno->id;
				$userDataMin['hash'] = \Managers\ClienteManager::getInstance()->doHash($aTurno->cliente);

				$userData = base64_encode(json_encode($userDataMin));

				$somedata['verificar_link'] = site_url().'registro/valorarServicio/'.$userData;

				$somedata['nombre'] =$aTurno->cliente->nombre;				
				$mailbody = $this->parser->parse('mails/valorar.tpl',$somedata, true);
				\Managers\MailManager::getInstance()->sendmail($aTurno->cliente->email,"Diego Dap's", $mailbody);

				$titulo = 'Valora nuestro servicio' ;
		        $descripcion = 'Ingresa al siguiente link: '.$somedata['verificar_link'];
		        $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();
		        $aNotificacion->titulo = $titulo;
		        $aNotificacion->descripcion = $descripcion;
		        $aNotificacion->visto = false;
		        $aNotificacion->tipo = true;
		        $aNotificacion->cliente = $aTurno->cliente;
		        $aNotificacion->fecha = new \DateTime('now');
		        $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion, $somedata['verificar_link']);

			}

			$diaActual = new DateTime('now');

			if($aEstadoTurno->id == 8 ) { // Turno ausente con bloqueo de usuario dependiendo los minutos anteriores 
										  // de la configuración	

				$aConfig = \Managers\ConfiguracionManager::getInstance()->get(1);
                $horaLimite = clone $aTurno->fecha_hora;
                $horaLimite->modify('- '.$aConfig->cancelar_antes.' minutes');
                //var_dump($horaLimite); die();
                $fecha_desbloqueo = clone $diaActual;
                $fecha_desbloqueo->modify('+ '.$aConfig->dias_bloqueado.' days');
                                
                //$aConfig->dias_bloqueado;
                $aEstado = Managers\EstadoTurnoManager::getInstance()->get(ESTADO_TURNO_AUSENCIA); //Estado Cancelado
                if($aTurno->cliente){
                    $aTurno->cliente->bloqueado = true;
                    $aTurno->cliente->fecha_bloqueo = $diaActual;
                    $aTurno->cliente->fecha_desbloqueo = $fecha_desbloqueo;
                }
            
			}

			$aTurno = Managers\TurnoManager::getInstance()->save($aTurno);

			//devoler todos los turnos de hoy actualizados			
			$turnosHoy = \Managers\TurnoManager::getInstance()->getTurnosDashboard($diaActual);
			$result2 = '';

			foreach ($turnosHoy as $th) {
				$somedata['th'] = $th;
				$result2 .= $this->parser->parse($this->parsePath.'item-turno-dashboard.tpl',$somedata, true);
			}

			//var_dump($result); die();

			$result['turnosHoy'] = $result2;

			$result["title"]   = "Estado Cambiado";
			$result["status"]  = true;
			$result["message"] = 'Se ha cambiado el estado del turno';

		}else{
			$result["title"]   = "Error";
			$result["status"]  = false;
			$result["message"] = 'No se ha podido cambiado el estado del turno';
		}

		echo json_encode($result);
		
	}

	public function ver_turnos_cliente($turno_id){

		if ($aTurno = Managers\TurnoManager::getInstance()->get($turno_id)){

			$comentario = $this->input->post('comentario');

			$diaActual = new DateTime('now');
			if ($aTurno->cliente){
				$aTurnosCliente = Managers\TurnoManager::getInstance()->getTurnosDashboard($diaActual, $aTurno->cliente, 1); //1 = que esté en estado reservado
				$aPago = \Managers\PagoManager::getInstance()->getPagoCliente($aTurno->cliente);
			} else {				
				$aPago = $aTurno->pago;
				$aTurnosCliente = array($aTurno);
			}

			if($comentario!=''){
				if ($aTurno->cliente){
					$aComentario = \Managers\ComentarioManager::getInstance()->create();
	
					
					$aComentario->fecha = new \Datetime('now');
					$aComentario->usuario = $aTurno->cliente;
					$aComentario->comentario = $comentario;				
	
					\Managers\ComentarioManager::getInstance()->save($aComentario);
				}
				
				$aPago->comentario = $comentario;
				$aPago = \Managers\PagoManager::getInstance()->save($aPago);
			}

			if(count($aTurnosCliente)>1){

				$turnos = array();
				//var_dump($aProvincias->nombre);
				foreach($aTurnosCliente as $tc){
				//	var_dump($provincia);
						$turnos[] = Managers\TurnoManager::getInstance()->toArray($tc);		
				}
				
				$result["title"]   = "Estado Cambiado";
				$result["turnos"]  = $turnos;
				$result["status"]  = true;
				$result["message"] = 'Tiene mas de un turno este día, desea recepcionar todos?';
			}else{
				$result["title"]   = "Error";
				$result["status"]  = false;
				$result["message"] = 'No se ha podido cambiado el estado del turno';
			}
			
		}else{
			$result["title"]   = "Error";
			$result["status"]  = false;
			$result["message"] = 'No se ha podido cambiado el estado del turno';
		}

		echo json_encode($result);

	}

	public function notificaciones(){

		$this->data['menuactive'] = 'notificaciones';
		$this->data['pageSubtitle'] = 'Notificaciones';

		$aNotificaciones = \Managers\NotificacionXUsuarioManager::getInstance()->getByUser($this->actualBackuser,false);

		if(count($aNotificaciones)<30){
			$limit = 30;
		}else{
			$limit = count($aNotificaciones);
		}

		$this->data['notificacionesTodos'] = \Managers\NotificacionXUsuarioManager::getInstance()->getAllNoti($this->actualBackuser, $limit);

		$this->parser->parse('admin/notificaciones/notificacion.tpl', $this->data);	

	}


	public function cambiarAVistaNotificaciones(){

		$aNotificaciones = \Managers\NotificacionXUsuarioManager::getInstance()->getByUser($this->actualBackuser,false);					

		if($aNotificaciones){
			$notificaciones = array();
			foreach ($aNotificaciones as $noti) {
				$notificaciones[] = \Managers\NotificacionManager::getInstance()->toArray($noti->notificacion);
			}
			$aNotificaciones = \Managers\NotificacionXUsuarioManager::getInstance()->setVistasByUser($this->actualBackuser);
			$result['notificaciones'] = $notificaciones;
			$result['cantidad'] = count($aNotificaciones);
			$result['status'] = true;
		}
		else{
			$result['cantidad'] = 0;
			$result['status'] = false;	
		}

		echo json_encode($result);

	}

	public function checkNotificaciones(){

		//$aNotificaciones = \Managers\NotificacionManager::getInstance()->getByUser($this->actualUser, false);		
		$aNotificaciones = \Managers\NotificacionXUsuarioManager::getInstance()->getByUser($this->actualBackuser,false);	

		if($aNotificaciones){				
			$result['status'] = true;
			$result['cantidad'] = count($aNotificaciones);
		}
		else{
			$result['status'] = false;
			$result['cantidad'] = 0;	
		}

		echo json_encode($result);

	}


	/*public function testNoti(){

		$aTurno = \Managers\TurnoManager::getInstance()->get(6160);

		$userDataMin['id'] = $aTurno->cliente->id;
		$userDataMin['turnoid'] = $aTurno->id;
		$userDataMin['hash'] = \Managers\ClienteManager::getInstance()->doHash($aTurno->cliente);

		$userData = base64_encode(json_encode($userDataMin));

		$somedata['verificar_link'] = site_url().'registro/valorarServicio/'.$userData;

		$somedata['nombre'] =$aTurno->cliente->nombre;				
		$mailbody = $this->parser->parse('mails/valorar.tpl',$somedata, true);
		\Managers\MailManager::getInstance()->sendmail($aTurno->cliente->email,"Diego Dap's", $mailbody);


		$titulo = 'Valora nuestro servicio' ;
        $descripcion = 'Ingresa al siguiente link: '.$somedata['verificar_link'];
        $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();
        $aNotificacion->titulo = $titulo;
        $aNotificacion->descripcion = $descripcion;
        $aNotificacion->visto = false;
        $aNotificacion->tipo = true;
        $aNotificacion->cliente = $aTurno->cliente;
        $aNotificacion->fecha = new \DateTime('now');
        $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion, $somedata['verificar_link']);

	}*/


}
