<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of HorarioDeAtencionEspecialXCoiffeurManager
 *
 * @author NASoft
 */
class HorarioDeAtencionEspecialXCoiffeurManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\HorarioDeAtencionEspecialXCoiffeurDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		
		return $arrayData;
	}
	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return $this->dataservice->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\HorarioDeAtencionEspecialXCoiffeurDs::getInstance()->searchCount($searchText, $seccion);
	}

	public function getAll(){
		return \Dataservices\HorarioDeAtencionEspecialXCoiffeurDs::getInstance()->getAll();
	}
	
	public function getByDia($aHorarioEspecial, $aDay, $aCoiffeur = null){
		return \Dataservices\HorarioDeAtencionEspecialXCoiffeurDs::getInstance()->getByDia($aHorarioEspecial, $aDay, $aCoiffeur);
	}

	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(			
			'acciones' => function($aCiudad){
				return MainManager::getInstance()->getParse('admin/ciudades/acciones.tpl',array('edit_ciudad' => $aCiudad));
			}/*,
			'imagen' => function($aFederacion){
				if($aFederacion->avatar){
					$image = ImagenManager::getInstance()->getUrl($aFederacion->avatar,'55x55');
				}else{
					$image = site_url().'uploads/sin-imagen55.jpg';
				}
				return '<img src="'.$image.'">';
			},			
			'fecha_alta' => function($aPrestador){
				if($aPrestador->fecha_alta){
					return $aPrestador->fecha_alta->format('d/m/Y');
				}
				return 'no definido';
			}*/
			
		);	
			
		$datasource = \Dataservices\HorarioDeAtencionEspecialXCoiffeurDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\HorarioDeAtencionEspecialXCoiffeurDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}

	public function getMinMaxByDia($aHorarioEspecial, $aDay){
		$horaMin = \Dataservices\HorarioDeAtencionEspecialXCoiffeurDs::getInstance()->getMinByDia($aHorarioEspecial, $aDay);
		$horaMax = \Dataservices\HorarioDeAtencionEspecialXCoiffeurDs::getInstance()->getMaxByDia($aHorarioEspecial, $aDay);

		/*$horaPartes = explode(':', $horaMax);
		if( intval($horaPartes[1]) > 0 ){
			$aux = intval($horaMax)+1;
		}else{
			$aux = intval($horaMax);
		}*/
		//var_dump($horaMax); die();
		return 	arraY(intval($horaMin), intval($horaMax));	
	}

	
}