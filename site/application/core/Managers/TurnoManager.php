<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */


 
class TurnoManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\TurnoDs::getInstance();
    }
	

	public function cmpTurnosDashboard($aTurno, $bTurno){
		/* si el estado es Recepcionado o Reservado se usa lo hora de incio para el orden
		/* si el estado es en servicio o terminado, se usa la hora de fin */
	
		$a = $aTurno->horaComparativa;
		$b = $bTurno->horaComparativa;
	
		if ($a == $b) {
			return 0;
		}
		return ($a < $b) ? -1 : 1;
		
	}
			
	public function toArray($data){
		
		$arrayData = array();
		
		$arrayData["id"] = $data->id;
		$arrayData['fecha_hora'] = \Managers\MainManager::getInstance()->fechaFormateada($data->fecha_hora);
		$arrayData['servicio'] = $data->servicio->nombre;
		$arrayData['coiffeur'] = $data->coiffeur->nombre;
		$arrayData["foto"] = ImagenManager::getInstance()->getUrl($data->fotos[0],"");
		/*$arrayData['servicio_duracion'] = $data->servicio->duracion;
		$arrayData['servicio_espera'] = $data->servicio->duracion_espera;		
		$arrayData['prioridad'] = $data->prioridad;*/
		$arrayData["hashdata"] = $this->doHash($data);
		
		return $arrayData;
		
	}

	public function doHash($data){
		return md5($data->id.'|'.$data->cliente->email);
	}

	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return \Dataservices\TurnoDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\TurnoDs::getInstance()->searchCount($searchText, $seccion);
	}


	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			'acciones' => function($aTurno){
				return MainManager::getInstance()->getParse('admin/usuarios/acciones.tpl',array('edit_user' => $aTurno));
			},
			'fecha_nac' => function($aTurno){
				if($aTurno->fecha_nac){
					return $aTurno->fecha_nac->format('d/m/Y');
				}
				return 'no definido';
			},			
			'fecha_registro' => function($aTurno){
				if($aTurno->fecha_registro){
					return $aTurno->fecha_registro->format('d/m/Y');
				}
				return 'no definido';
			},
			'fecha' => function($aTurno){
				if($aTurno->fecha_hora){
					return $aTurno->fecha_hora->format('d/m/Y H:m');
				}
				return 'no definido';
			},
			'cliente' => function($aTurno){
				if($aTurno->cliente){
					return $aTurno->cliente->nombre;
				}
				return '--';
			},
			'servicio' => function($aTurno){
				if($aTurno->servicio){
					return $aTurno->servicio->nombre;
				}
				return '--';
			},
			'estado' => function($aTurno){
				if($aTurno->estadoTurno){
					return $aTurno->estadoTurno->nombre;
				}
				return '--';
			}
			
		);		
		
		$datasource = \Dataservices\TurnoDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\TurnoDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}
	

	public function getByClienteProximos($aCliente, $diaActual, $cantidad = null){
		return \Dataservices\TurnoDs::getInstance()->getByClienteProximos($aCliente, $diaActual, $cantidad);
	}

	public function getByClienteVencidos($aCliente, $diaActual, $cantidad = null){
		return \Dataservices\TurnoDs::getInstance()->getByClienteVencidos($aCliente, $diaActual, $cantidad);
	}

	public function getByFecha($aServicio, $aCoiffeur, $fechaInicio){
		return \Dataservices\TurnoDs::getInstance()->getByFecha($aServicio, $aCoiffeur, $fechaInicio);
	}

	public function getByFechaSinServicio($aCoiffeur, $fechaInicio){
		return \Dataservices\TurnoDs::getInstance()->getByFechaSinServicio($aCoiffeur, $fechaInicio);
	}

	public function getByFechaByCoiffeur($aCoiffeur, $fechaInicio){
		return \Dataservices\TurnoDs::getInstance()->getByFechaByCoiffeur($aCoiffeur, $fechaInicio);
	}

	public function getByDiaByCoiffeur($aCoiffeur, $fechaInicio){
		return \Dataservices\TurnoDs::getInstance()->getByDiaByCoiffeur($aCoiffeur, $fechaInicio);
	}

	public function getByDia($fechaInicio, $estado = null){
		return \Dataservices\TurnoDs::getInstance()->getByDia($fechaInicio, $estado);
	}

	public function getTurnosDashboard($fechaInicio, $aCliente = null, $enEstado = null){
		$aTurnos =  \Dataservices\TurnoDs::getInstance()->getTurnosDashboard($fechaInicio, $aCliente, $enEstado);
		usort($aTurnos, array($this, "cmpTurnosDashboard"));
		
		return $aTurnos;
	}
	
	public function getByClienteAndEstado($aTurno, $aEstado){
		return \Dataservices\TurnoDs::getInstance()->getByClienteAndEstado($aTurno, $aEstado);
	}

	public function tieneTurno($aServicio, $fechaInicio, $aCliente){
		return \Dataservices\TurnoDs::getInstance()->tieneTurno($aServicio, $fechaInicio, $aCliente);
	}

	public function setJoinDeCliente($aCliente = null){
		return \Dataservices\TurnoDs::getInstance()->setJoinDeCliente($aCliente);		
	}

	public function setJoinDeEstados($aEstado = null){
		return \Dataservices\TurnoDs::getInstance()->setJoinDeEstados($aEstado);		
	}
	
	public function setJoinDeFecha($fecha_actual, $fecha_vencimiento){
		return \Dataservices\TurnoDs::getInstance()->setJoinDeFecha($fecha_actual, $fecha_vencimiento);		
	}

	public function getTurnosManiana(){
		return \Dataservices\TurnoDs::getInstance()->getTurnosManiana();
	}

	public function getTurnosHoraAntes($inicio){
		return \Dataservices\TurnoDs::getInstance()->getTurnosHoraAntes($inicio);
	}

}
?>