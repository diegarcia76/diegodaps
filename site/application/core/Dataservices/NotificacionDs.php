<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of NotificacionDs
 *
 * @author 
 */
class NotificacionDs extends BaseDataService {
   
   

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Notificacion";
    }


	public function getByUser($aCliente, $todos = null){
		if($todos)
			$todos = $this->em->getRepository($this->tbl_name)->findBy(array('cliente' => $aCliente, 'tipo' => true), array('fecha' => 'DESC'));
		else
			$todos = $this->em->getRepository($this->tbl_name)->findBy(array('cliente' => $aCliente, 'visto' => false, 'tipo' => true), array('fecha' => 'DESC'));
		return $todos;
	}	

	public function setVistasByUser($aCliente = null, $front = null){
		
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->update($this->tbl_name, 'd') 
 			     ->set('d.visto', true)
			 	 ->where(
					$this->qb->expr()->andX(
						$this->qb->expr()->eq('d.visto', 0),
						//$this->qb->expr()->eq('d.cliente', $aCliente->id),
						$this->qb->expr()->eq('d.tipo', $front)
					)
				 );

		if($aCliente){
			$this->qb->andWhere($this->qb->expr()->eq('d.cliente', $aCliente->id));
		}

		$query = $this->qb->getQuery();
		return $query->execute();

	}

	public function getAllNoti($todos = null){
		if($todos)
			$todos = $this->em->getRepository($this->tbl_name)->findBy(array('tipo' => false), array('fecha' => 'DESC'));
		else
			$todos = $this->em->getRepository($this->tbl_name)->findBy(array('visto' => false, 'tipo' => false), array('fecha' => 'DESC'));
		return $todos;
	}

}

?>
