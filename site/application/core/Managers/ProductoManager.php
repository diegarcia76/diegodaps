<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class ProductoManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\ProductoDs::getInstance();
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
		return \Dataservices\ProductoDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\ProductoDs::getInstance()->searchCount($searchText, $seccion);
	}


	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(
			'nombre' => function($aProducto){
				$productoStr = '';
				if ($aProducto->marca){
					$productoStr .= $aProducto->marca->nombre.' - ';
					if ($aProducto->linea) {
						$productoStr .= $aProducto->linea->nombre.' - ';
					}
				}

				$productoStr .= $aProducto->nombre;

				return $productoStr;
			},
			'acciones' => function($aUsuario){
				return MainManager::getInstance()->getParse('admin/productos/acciones.tpl',array('edit_user' => $aUsuario));
			}
			
		);		
		
		$datasource = \Dataservices\ProductoDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\ProductoDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}
	
	public function getByMarca($aMarca){
		return \Dataservices\ProductoDs::getInstance()->getByMarca($aMarca);
	}

	public function getByMarcaByLinea($aMarca, $aLinea){
		return \Dataservices\ProductoDs::getInstance()->getByMarcaByLinea($aMarca, $aLinea);
	}

	public function getAll(){
		return \Dataservices\ProductoDs::getInstance()->getAll();
	}

	public function setJoinDeMarcas(){
		return \Dataservices\ProductoDs::getInstance()->setJoinDeMarcas();		
	}

}