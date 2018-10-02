<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class ClienteManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\ClienteDs::getInstance();
    }

			
	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		$arrayData["nombre"] = $data->nombre;
		$arrayData["usuario"] = $data->email;
		$arrayData["hashdata"] = $this->doHash($data);
		
		return $arrayData;
	}

	public function doHash($data){
		return md5($data->id.'|'.$data->email);
	}

	
	public function search($searchText, $itemsperpage = 0, $page = 1, $seccion = null){
		return \Dataservices\ClienteDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\ClienteDs::getInstance()->searchCount($searchText, $seccion);
	}

	public function getLoginFront(){
		return $this->get($this->CI->session->userdata('login_id'));
	}		
	
	public function getAdmin($username, $pass){
		return \Dataservices\ClienteDs::getInstance()->getAdmin($username, $pass);
	}

	public function getLogin($username, $pass){
		return \Dataservices\ClienteDs::getInstance()->getLogin($username, $pass);
	}

	public function getByUsername($username){
		return \Dataservices\ClienteDs::getInstance()->getByUsername($username);
	}
	
	
	public function esUnicoEmail($email, $usuario_id){
		if (!$usuarioCheck = $this->getByUsername($email)){
			return true;
		} elseif ($usuarioCheck->id == $usuario_id){
			return true;
		}
		return false;
	}
	
	
	
	public function getDatatableDatasource($data){
		// print_r($data);
		// print_r($data);		
		$formats = array(
			'acciones' => function($aCliente){
				$actualBackuser = \Managers\UsuarioManager::getInstance()->getLogin();
				return MainManager::getInstance()->getParse('admin/clientes/acciones.tpl',array('edit_user' => $aCliente, 'actualBackuser' => $actualBackuser));
			},
			'fecha_nacimiento' => function($aCliente){
				if($aCliente->fecha_nacimiento){
					return $aCliente->fecha_nacimiento->format('d/m/Y');
				}
				return 'no definido';
			},
			'foto' => function($aCliente){

				$result = '<img src="'.site_url().'uploads/sin-imagen55.jpg">';

				try{	

					if($aCliente->foto){
	
						$aCliente->foto->id;

						$result = '<img src="'.ImagenManager::getInstance()->getUrl($aCliente->foto,'55x55').'" class="img-preview">';
					}

				} catch(\Exception $e){
					$result = '<img src="'.site_url().'uploads/sin-imagen55.jpg">';
				}

				return $result;
			}
			
		);		
		
		$datasource = \Dataservices\ClienteDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\ClienteDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}
	
	public function getByEmail($email = ''){
		return \Dataservices\ClienteDs::getInstance()->getByEmail($email);
	}
	
	public function getDeudoresByDia($fecha, $estado = null){
		return \Dataservices\ClienteDs::getInstance()->getDeudoresByDia($fecha, $estado);
	}

	public function estaDisponible($fecha_ini, $fecha_fin, $aCliente = null, $aTurnoEdit = false){
		return \Dataservices\ClienteDs::getInstance()->estaDisponible($fecha_ini, $fecha_fin, $aCliente, $aTurnoEdit);
	}

	public function getByFacebookId($facebookId){
		return \Dataservices\ClienteDs::getInstance()->getByFacebookId($facebookId);
	}

	public function getCumpleanos($fechaCumple = null){
		return \Dataservices\ClienteDs::getInstance()->getCumpleanos($fechaCumple);
	}

	public function getClientesaDesbloquear($fecha = null){
		return \Dataservices\ClienteDs::getInstance()->getClientesaDesbloquear($fecha);
	}

}
?>