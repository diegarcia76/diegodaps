<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of FaqsDS
 *
 * @author NASoft
 */
class UsuarioManager extends BaseManager{

    protected function __construct() {
        parent::__construct();
		$this->dataservice = \Dataservices\UsuarioDs::getInstance();
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
		return \Dataservices\UsuarioDs::getInstance()->search($searchText, $itemsperpage, $page, $seccion);
	}

	public function searchCount($searchText, $seccion = 0){
		return \Dataservices\UsuarioDs::getInstance()->searchCount($searchText, $seccion);
	}

	/*public function getLoginFront(){
		return $this->get($this->CI->session->userdata('login_id'));
	}*/		
	
	public function getAdmin($username, $pass){
		return \Dataservices\UsuarioDs::getInstance()->getAdmin($username, $pass);
	}

	/*public function getLogin($username, $pass){
		return \Dataservices\UsuarioDs::getInstance()->getLogin($username, $pass);
	}*/

	public function getLogin(){
		return $this->get($this->CI->session->userdata('login_administradorId'));
	}	

	public function getByUsername($username){
		return \Dataservices\UsuarioDs::getInstance()->getByUsername($username);
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
			'acciones' => function($aUsuario){
				return MainManager::getInstance()->getParse('admin/usuarios/acciones.tpl',array('edit_user' => $aUsuario));
			},
			'perfil' => function($aUsuario){
				if($aUsuario->perfil){
					return $aUsuario->perfil->nombre;
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
		
		$datasource = \Dataservices\UsuarioDs::getInstance()->getDatatableSource($data);
		$count 		= \Dataservices\UsuarioDs::getInstance()->getDatatableSourceCount($data);
				
		return DatatableManager::getInstance()->getDatasource($datasource, $data, $count, $formats);
	}
	
	public function getByEmail($email = ''){
		return \Dataservices\UsuarioDs::getInstance()->getByEmail($email);
	}


}
?>