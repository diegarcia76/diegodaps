<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class MarcaManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\MarcaDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		$arrayData["nombre"] = $data->nombre;
		$arrayData["descripcion"] = $data->descripcion;
		$arrayData["hashdata"] = $this->doHash($data);
		
		return $arrayData;
	}

	public function doHash($data){
		return md5($data->id.'|'.$data->nombre);
	}

	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return \Dataservices\MarcaDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\MarcaDs::getInstance()->searchCount($searchText, $seccion);
	}


	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			'acciones' => function($aMarca){
				return MainManager::getInstance()->getParse('admin/productos/acciones_marcas.tpl',array('edit_user' => $aMarca));
			}
			
		);		
		
		$datasource = \Dataservices\MarcaDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\MarcaDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}
	


}
?>