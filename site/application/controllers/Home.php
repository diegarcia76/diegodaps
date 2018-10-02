<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."core/controllers/base.php";

class Home extends Base_Controller {

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

	public function __construct(){
		parent::__construct();		
	}

		 
	public function index(){
		
		if($this->actualUser){

			$diaActual = new DateTime('now');
			$this->data['turnosProximos'] = \Managers\TurnoManager::getInstance()->getByClienteProximos($this->actualUser, $diaActual, 5);
			$this->data['turnosVencidos'] = \Managers\TurnoManager::getInstance()->getByClienteVencidos($this->actualUser, $diaActual, 5);

			$this->parser->parse('home.tpl', $this->data);	
		}else{
			redirect('login');
		}

	}

	public function login(){

		$this->data['hideSidebar'] = true;
		$this->parser->parse('login.tpl', $this->data);
		

	}
	
	public function mantenimiento(){
		$this->parser->parse('mantenimiento.tpl', $this->data);
	}

	public function cssEstados(){

		$this->data['estados'] = \Managers\EstadoTurnoManager::getInstance()->getAll();
		header("Content-type: text/css; charset: UTF-8");
		$this->parser->parse('turnos/estadoscss.tpl', $this->data);

	}

	public function notificaciones(){

		if($this->actualUser){
			
			$this->data['notificacionesTodas'] = \Managers\NotificacionManager::getInstance()->getByUser($this->actualUser, true);

			$this->parser->parse('notificacion.tpl', $this->data);	
			
		}else{
			redirect('login');
		}

	}

	public function cambiarAVistaNotificaciones(){

		if($this->actualUser){
			
			
			$aNotificaciones = \Managers\NotificacionManager::getInstance()->getByUser($this->actualUser, false);						

			if($aNotificaciones){
				$notificaciones = array();
				foreach ($aNotificaciones as $noti) {
					$notificaciones[] = \Managers\NotificacionManager::getInstance()->toArray($noti);
				}
				$aNotificaciones = \Managers\NotificacionManager::getInstance()->setVistasByUser($this->actualUser,1);
				$result['notificaciones'] = $notificaciones;
				$result['status'] = true;
			}
			else{
				$result['status'] = false;	
			}


			echo json_encode($result);
			
		}else{
			redirect('login');
		}

	}


	public function checkNotificaciones(){

		if($this->actualUser){
			
			$aNotificaciones = \Managers\NotificacionManager::getInstance()->getByUser($this->actualUser, false);		

			if($aNotificaciones){				
				$result['status'] = true;
			}
			else{
				$result['status'] = false;	
			}


			echo json_encode($result);
			
		}else{
			redirect('login');
		}

	}


	public function cumples(){
		$aClientes = \Managers\ClienteManager::getInstance()->getCumpleanos();
		foreach ($aClientes as $aCliente){
			echo $aCliente->id.' - '.$aCliente->nombre.' - '.$aCliente->fecha_nacimiento->format('Y-m-d').'<br/>';
		}
	}	
	

}
