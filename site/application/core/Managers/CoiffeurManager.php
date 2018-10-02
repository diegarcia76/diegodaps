<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class CoiffeurManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\CoiffeurDs::getInstance();
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
		return \Dataservices\CoiffeurDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\CoiffeurDs::getInstance()->searchCount($searchText, $seccion);
	}


	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			'acciones' => function($aUsuario){
				$aHorariosEspeciales = \Managers\HorarioEspecialManager::getInstance()->getAll();
				return MainManager::getInstance()->getParse('admin/coiffeurs/acciones.tpl',array('edit_user' => $aUsuario, 'aHorariosEspeciales' => $aHorariosEspeciales));
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
		
		$datasource = \Dataservices\CoiffeurDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\CoiffeurDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}

	public function estaDisponible($fecha_ini, $fecha_fin, $aCoiffeur = null){
		
		if ($aCoiffeur){
			foreach ($aCoiffeur->ausencias as $aAusencia) {
				if (($fecha_ini >= $aAusencia->fecha_inicio) and ($fecha_ini <= $aAusencia->fecha_fin)){
					return false;
				}
			}
		}

		return \Dataservices\CoiffeurDs::getInstance()->estaDisponible($fecha_ini, $fecha_fin, $aCoiffeur);
	}


	/*public function save($data){
		if (! $data->id){

			$servicios = \Managers\ServicioManager::getInstance()->getAll();
			foreach ($servicios as $aServicio){
				$aServicioXCouffeur = \Managers\ServicioXCoiffeurManager::getInstance()->create();
				
				$aServicioXCouffeur->servicio = $aServicio;
				$aServicioXCouffeur->precio = $aServicio->precio_default;
				$aServicioXCouffeur->precio_efectivo = $aServicio->precio_efectivo_default;
				$aServicioXCouffeur->comision = $aServicio->comision_default;
				$aServicioXCouffeur->coiffeur = $data;

				$data->serviciosXCoiffeur->add($aServicioXCouffeur);


			}			
		}
		
		return 	parent::save($data);
	}*/


	public function getByServicio($aServicio){
		$result = array();
		foreach ($aServicio->coiffeurs as $aCoiffeur) {
			if(!$aCoiffeur->borrado)
				$result[] = $aCoiffeur;
		}
		return $result;
	}

}
?>