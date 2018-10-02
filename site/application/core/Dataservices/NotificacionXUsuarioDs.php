<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of NotificacionXUsuarioDs
 *
 * @author 
 */
class NotificacionXUsuarioDs extends BaseDataService {
   
   

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\NotificacionXUsuario";
    }


	public function getByUser($aUsuario, $vistas = null){
		if($vistas)
			$todos = $this->em->getRepository($this->tbl_name)->findBy(array('usuario' => $aUsuario, 'visto' => true), array('fecha' => 'DESC'));
		else
			$todos = $this->em->getRepository($this->tbl_name)->findBy(array('usuario' => $aUsuario, 'visto' => false), array('fecha' => 'DESC'));
		return $todos;
	}	

	public function setVistasByUser($aUsuario = null){
		
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->update($this->tbl_name, 'd') 
 			     ->set('d.visto', true)
			 	 ->where(
					$this->qb->expr()->andX(
						$this->qb->expr()->eq('d.visto', 0),
						$this->qb->expr()->eq('d.usuario', $aUsuario->id)
					)
				 );		

		$query = $this->qb->getQuery();
		return $query->execute();

	}

	public function getAllNoti($aUsuario = null, $limit){
		$todos = $this->em->getRepository($this->tbl_name)->findBy(array('usuario' => $aUsuario), array('fecha' => 'DESC'), $limit);
		return $todos;
	}

}

?>
