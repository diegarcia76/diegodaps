<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class PerfilManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\PerfilDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		$arrayData["nombre"] = $data->nombre;
		$arrayData["codigo"] = $data->codigo;
		$arrayData["hashdata"] = $this->doHash($data);
		
		return $arrayData;
	}

	public function doHash($data){
		return md5($data->id.'|'.$data->codigo);
	}

	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return \Dataservices\PerfilDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\PerfilDs::getInstance()->searchCount($searchText, $seccion);
	}


	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			'acciones' => function($aUsuario){
				return MainManager::getInstance()->getParse('admin/usuarios/acciones.tpl',array('edit_user' => $aUsuario));
			}
			
		);		
		
		$datasource = \Dataservices\PerfilDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\PerfilDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}
		

}
?>