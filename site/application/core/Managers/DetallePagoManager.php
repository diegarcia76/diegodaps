<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class DetallePagoManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\DetallePagoDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		$arrayData["fecha"] = $data->fecha;
		$arrayData["cliente_id"] = ($data->pago->cliente)?$data->pago->cliente->id:0;
		$arrayData["pago_id"] = $data->pago->id;
		$arrayData["cantidad"] = $data->cantidad;
		$arrayData["precio"] = $data->precio;
		$arrayData["tipo"] = $data->tipo;
		$arrayData["descripcion"] = $data->descripcion;
		$arrayData["producto_id"] = ($data->producto)?$data->producto->id:0;
		//$arrayData["servicio_id"] = ($data->servicio)?$data->servicio->id:0;
		$arrayData["servicio_id"] = ($data->servicio)?$data->coiffeur->getServicioXCoiffeur($data->servicio->id):0;		
		$arrayData["coiffeur_id"] = ($data->coiffeur)?$data->coiffeur->id:0;
		
		return $arrayData;
	}
	
	public function create(){
		$aDetallePago = parent::create();
		//$aDetallePago->fecha = new \Datetime('now');
		
		return $aDetallePago;
	}


	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			/*'acciones' => function($aUsuario){
				return MainManager::getInstance()->getParse('admin/usuarios/acciones.tpl',array('edit_user' => $aUsuario));
			},*/
			'pago' => function($aDetallePago){				
				return $aDetallePago->pago->id;
			},
			'fecha' => function($aDetallePago){
				if($aDetallePago->pago->fecha){
					return $aDetallePago->pago->fecha->format('d/m/Y H:i');
				}
				return 'no definido';
			},
			'coiffeur' => function($aDetallePago){
				
				if($aDetallePago->coiffeur){
					return $aDetallePago->coiffeur->nombre;
				}
				return '--';
			},
			'cliente_name' => function($aDetallePago){
				if($aDetallePago->pago->cliente){
					return $aDetallePago->pago->cliente->nombre;
				} else {
					return $aDetallePago->pago->nombre;
				}
				
			},
			'precio' => function($aDetallePago){
				if($aDetallePago->precio){
					return '$ '.number_format((($aDetallePago->precio)*$aDetallePago->cantidad), 2);
				}
				return '$ '.number_format(0, 2);
			},
			'importe' => function($aDetallePago){
				if($aDetallePago->precio){
					if($aDetallePago->tipo != 'descuento'){
						return '$ '.number_format((($aDetallePago->precio-$aDetallePago->descuento)*$aDetallePago->cantidad), 2);
					}
				}
				return '$ '.number_format(0, 2);
			},
			'comision' => function($aDetallePago){
				if($aDetallePago->comision){
					if($aDetallePago->tipo != 'descuento'){
						return '$ '.number_format($aDetallePago->comision, 2);
					}
				}
				return '$ '.number_format(0, 2);
			}
			
		);		
		
		$datasource = \Dataservices\DetallePagoDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\DetallePagoDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}

	public function setJoinDeCoiffeur($aCoiffeur = null){
		return \Dataservices\DetallePagoDs::getInstance()->setJoinDeCoiffeur($aCoiffeur);		
	}
	
	public function setJoinDeServicio($aCoiffeur = null){
		return \Dataservices\DetallePagoDs::getInstance()->setJoinDeServicio($aCoiffeur);		
	}

	public function setJoinDePago($aPago = null){
		return \Dataservices\DetallePagoDs::getInstance()->setJoinDePago($aPago);		
	}
	
	public function setJoinDeFecha($fecha_actual, $fecha_vencimiento){
		return \Dataservices\DetallePagoDs::getInstance()->setJoinDeFecha($fecha_actual, $fecha_vencimiento);		
	}

	public function getTotales(){
		return \Dataservices\DetallePagoDs::getInstance()->getTotales();		
	}

	public function getBalancexFechas($fecha_start = null, $fecha_end = null){
		return \Dataservices\DetallePagoDs::getInstance()->getBalancexFechas($fecha_start, $fecha_end);		
	}
	public function getBalancexFechas2($fecha_start = null, $fecha_end = null){
		return \Dataservices\DetallePagoDs::getInstance()->getBalancexFechas2($fecha_start, $fecha_end);		
	}
	public function getBalancexFechas3($fecha_start = null, $fecha_end = null, $pel){
		return \Dataservices\DetallePagoDs::getInstance()->getBalancexFechas3($fecha_start, $fecha_end, $pel);		
	}

}
?>