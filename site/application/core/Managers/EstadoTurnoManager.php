<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class EstadoTurnoManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\EstadoTurnoDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		$arrayData["nombre"] = $data->nombre;
		$arrayData["hashdata"] = $this->doHash($data);
		
		return $arrayData;
	}

	public function doHash($data){
		return md5($data->id.'|'.$data->nombre);
	}

	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return \Dataservices\EstadoTurnoDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\EstadoTurnoDs::getInstance()->searchCount($searchText, $seccion);
	}


	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			'acciones' => function($aUsuario){
				return MainManager::getInstance()->getParse('admin/usuarios/acciones.tpl',array('edit_user' => $aUsuario));
			},
			'fecha_nac' => function($aUsuario){
				if($aUsuario->fecha_nac){
					return $aUsuario->fecha_nac->format('d/m/Y');
				}
				return 'no definido';
			},
			'federacion' => function($aUsuario){
				if($aUsuario->federacion){
					return $aUsuario->federacion->nombre;
				}
				return 'no definido';
			},
			'fecha_registro' => function($aUsuario){
				if($aUsuario->fecha_registro){
					return $aUsuario->fecha_registro->format('d/m/Y');
				}
				return 'no definido';
			}
			
		);		
		
		$datasource = \Dataservices\EstadoTurnoDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\EstadoTurnoDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}
	

	public function getEstadoAnulado(){
		return $this->get(ESTADO_TURNO_ANULADO);
	}

	public function getEstadoCobrado(){
		return $this->get(ESTADO_TURNO_COBRADO);
	}

	public function getEstadoReservado(){
		return $this->get(ESTADO_TURNO_ASIGNADO);
	}


}
?>