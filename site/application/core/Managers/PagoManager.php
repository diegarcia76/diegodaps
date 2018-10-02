<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class PagoManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\PagoDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		$arrayData["fecha"] = $data->fecha;
		
		return $arrayData;
	}


	public function getPagoCliente($aCliente){
		if (!$aPago = \Dataservices\PagoDs::getInstance()->getPagoCliente($aCliente)){
			$aPago = $this->create();
			$aPago->cliente = $aCliente;
		}
		
		return $aPago;
		
	}
	
	public function create(){
		$aPago = parent::create();
		$aPago->fecha = new \Datetime('now');
	
		return $aPago;
	}
	
	public function getPendientes(){
		return \Dataservices\PagoDs::getInstance()->getPendientes();
	}
	

	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			/*'acciones' => function($aUsuario){
				return MainManager::getInstance()->getParse('admin/usuarios/acciones.tpl',array('edit_user' => $aUsuario));
			},*/
			'fecha' => function($aPago){
				if($aPago->fecha){
					return $aPago->fecha->format('d/m/Y H:i');
				}
				return 'no definido';
			},
			'Cliente' => function($aPago){
				if($aPago->cliente)
					return $aPago->cliente->nombre;
				else
					return $aPago->nombre;
			},
			'Total' => function($aPago){
				if($aPago->total){
					return '$ '.number_format($aPago->total, 2);
				}
				return '$ '.number_format(0, 2);;
			},

			'Estado' => function($aPago){
				return ($aPago->cobrado == true)?'COBRADO':'PENDIENTE';
			},
			
			'acciones' => function($aPago){
				return MainManager::getInstance()->getParse('admin/tickets/acciones.tpl',array('aPago' => $aPago));
			},
		);		
		
		$datasource = \Dataservices\PagoDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\PagoDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}


}
