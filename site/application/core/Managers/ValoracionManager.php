<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of ValoracionManager
 *
 * @author NASoft
 */
class ValoracionManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\ValoracionDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		$arrayData["turno"] = $data->turno->id;
		$arrayData["comentario"] = $data->comentario;
		$arrayData["fecha"] = $data->fecha->format('Y-m-d H:i:s');
		$arrayData["estrellas"] = $data->estrellas;
		
		return $arrayData;
	}

	public function create(){
		$aComentario = parent::create();
		$aComentario->fecha = new \Datetime('now');
		
		return $aComentario;
	}
	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return $this->dataservice->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\ValoracionDs::getInstance()->searchCount($searchText, $seccion);
	}	

	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);
		$formats = array(			
			'fecha' => function($aComentario){
				if($aComentario->fecha){
					return $aComentario->fecha->format('d/m/Y H:m');
				}
				return 'no definido';
			},
			'coiffeur' => function($aComentario){
				if($aComentario->turno->coiffeur){
					return $aComentario->turno->coiffeur->nombre;
				}
				return '--';
			},
			'cliente' => function($aComentario){
				if($aComentario->turno->cliente){
					return $aComentario->turno->cliente->nombre;
				}
				return $aComentario->turno->nombre;
			},
			'estrellas' => function($aComentario){
				if($aComentario->estrellas){
					return '* '.number_format($aComentario->estrellas, 2);
				}
				return '* '.number_format(0, 2);
			},
			
		);	
			
		$datasource = \Dataservices\ValoracionDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\ValoracionDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}

	public function setJoinDeCoiffeur($aCoiffeur = null){
		return \Dataservices\ValoracionDs::getInstance()->setJoinDeCoiffeur($aCoiffeur);		
	}
	
	public function setJoinDeFecha($fecha_actual, $fecha_vencimiento){
		return \Dataservices\ValoracionDs::getInstance()->setJoinDeFecha($fecha_actual, $fecha_vencimiento);		
	}
	
	public function getByTurno($aTurno){
		return \Dataservices\ValoracionDs::getInstance()->getByTurno($aTurno);
	}

}
?>