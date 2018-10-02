<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class ProfesionManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\ProfesionDs::getInstance();
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
		return \Dataservices\ProfesionDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\ProfesionDs::getInstance()->searchCount($searchText, $seccion);
	}

/*
	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			'acciones' => function($aUsuario){
				return MainManager::getInstance()->getParse('admin/servicios/acciones.tpl',array('edit_user' => $aUsuario));
			}
			
			
		);		
		
		$datasource = \Dataservices\ProfesionDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\ProfesionDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}
	*/


}
?>