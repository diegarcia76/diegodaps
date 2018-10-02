<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of HorarioEspecialDs
 *
 * @author 
 */
class HorarioEspecialDs extends BaseDataService {
   
   

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\HorarioEspecial";
    }

	

	public function getSuperposicion($aFechaDesde, $aFechaHasta){
		
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
 			     ->orWhere(':fecha1 BETWEEN d.fecha_desde AND d.fecha_hasta')
				 ->orWhere(':fecha2 BETWEEN d.fecha_desde AND d.fecha_hasta')
 			     ->setParameter('fecha1', $aFechaDesde->format('Y-m-d'))
        		 ->setParameter('fecha2', $aFechaHasta->format('Y-m-d'));
 			    /*
		$this->qb->orWhere('d.fecha_desde BETWEEN :fecha1 AND :fecha2');
        $this->qb->setParameter('fecha1', $aFechaDesde->format('Y-m-d'));
        $this->qb->setParameter('fecha2', $aFechaHasta->format('Y-m-d'));

        $this->qb->orWhere('d.fecha_hasta BETWEEN :fecha1 AND :fecha2');
        $this->qb->setParameter('fecha1', $aFechaDesde->format('Y-m-d'));
        $this->qb->setParameter('fecha2', $aFechaHasta->format('Y-m-d'));
		*/

		$query = $this->qb->getQuery();
		//var_dump($query->getSql()); die();
		$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();

	}

	public function getByFecha($startDate){
		
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd');	

		$this->qb->andWhere(':startDate BETWEEN d.fecha_desde AND d.fecha_hasta');
        $this->qb->setParameter('startDate', $startDate->format('Y-m-d'));

		$query = $this->qb->getQuery();
		//var_dump($query->getSql()); die();
		$obj = $query->getResult();

		
		if(!empty($obj))
			//return $obj[0];
			return $obj;
		
		//return false;
		return array();

	}

}

?>
