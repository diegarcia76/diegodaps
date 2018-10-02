<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class ServicioXCoiffeurManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\ServicioXCoiffeurDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->coiffeur->id;
		$arrayData["servicioXCoiffeur_id"] = $data->id;
		$arrayData["nombre"] = $data->coiffeur->nombre;
		$arrayData["servicio"] = $data->servicio->id;
		$arrayData["nombre_servicio"] = $data->servicio->nombre;
		$arrayData["precio"] = $data->precio;
		$arrayData["foto"] = ImagenManager::getInstance()->getUrl($data->coiffeur->foto,"55x55");
		$arrayData["hashdata"] = $this->doHash($data);
		
		return $arrayData;
	}

	public function doHash($data){
		return md5($data->coiffeur->id.'|'.$data->coiffeur->nombre);
	}

	public function getPrecioXServicioXCoiffeur($aServicio, $aCoiffeur){
		if ($aServicioCouffeur = \Dataservices\ServicioXCoiffeurDs::getInstance()->getServicioXCoiffeur($aServicio, $aCoiffeur)){
			return $aServicioCouffeur->precio;
		}
		return 0;
	}

	public function getServicioXCoiffeur($aServicio, $aCoiffeur){
		return $this->dataservice->getServicioXCoiffeur($aServicio, $aCoiffeur);
	}


	public function getByTurno($aTurno){
		if ($aServicioCouffeur = \Dataservices\ServicioXCoiffeurDs::getInstance()->getServicioXCoiffeur($aTurno->servicio, $aTurno->coiffeur)){
			return $aServicioCouffeur;
		}
		return false;
	}

}
?>