<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of ValoracionDs
 *
 * @author 
 */
class ValoracionDs extends BaseDataService {
   
    protected $qb;    
    protected $aCoiffeur = null;
    protected $fecha_hasta = null;

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Valoracion";
        $this->qb = $this->em->createQueryBuilder(); 

    }

    public function search($searchText, $itemsperpage = 20, $page = 1, $seccion = ''){

		$searchText = str_replace('%20', ' ', $searchText);
		//var_dump($searchText);
		$page = intval($page);
		$page = ($page <= 0)?1:$page;
		
		$offset = ($itemsperpage * ($page - 1));
		
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->andX(
						$this->qb->expr()->like('d.nombre', $this->qb->expr()->literal('%'.$searchText.'%'))
						//,$this->qb->expr()->like('d.usuario', $this->qb->expr()->literal('%'.$searchText.'%'))
				 	)
				 )
				 ->OrderBy('d.nombre','DESC');	   

			
			$this->qb->setFirstResult($offset)
			 		 ->setMaxResults($itemsperpage);

			$query = $this->qb->getQuery();
			$obj = new Paginator($query, $fetchJoinCollection = true);

		
		if(!empty($obj))
			return $obj;
		
		return array();
	}

	public function searchCount($searchText, $seccion = ''){

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('count(d) as cantidad') 
 			     ->from($this->tbl_name, 'd')
			 	 ->where(
					$this->qb->expr()->orX(
						$this->qb->expr()->like('d.nombre', $this->qb->expr()->literal('%'.$searchText.'%')),
						$this->qb->expr()->like('d.usuario', $this->qb->expr()->literal('%'.$searchText.'%'))
					)
				 )
				 ->OrderBy('d.sistema','DESC')
				 ->addOrderBy('d.nombre','ASC');	   
		

		$query = $this->qb->getQuery();
		return $query->getSingleScalarResult();
		
	}
	
	
    public function setJoinDeCoiffeur($aCoiffeur = null){
        $this->aCoiffeur = $aCoiffeur;
        $this->miFuncion[] = 'setDatasourceJoinsCoiffeur';
    }

    protected function setDatasourceJoinsCoiffeur(){        
    	$this->qb->leftjoin('d.turno','t');
        $this->qb->leftjoin('t.coiffeur','c');
        if($this->aCoiffeur){ 
            $this->qb->andWhere($this->qb->expr()->eq('c.id', $this->aCoiffeur->id));
        }
    }

    public function setJoinDeFecha($fecha_desde, $fecha_hasta){
        $this->fecha_desde = $fecha_desde;
        $this->fecha_hasta = $fecha_hasta;
        $this->miFuncion[] = 'setDatasourceJoinsFecha';
    }

    
    protected function setDatasourceJoinsFecha(){        
        if($this->fecha_hasta){
            $this->qb->andWhere('d.fecha BETWEEN :fecha1 AND :fecha2');
            $this->qb->setParameter('fecha1', $this->fecha_desde->format('Y-m-d 00:00:00'));
            $this->qb->setParameter('fecha2', $this->fecha_hasta->format('Y-m-d 23:59:59'));
            
            //$this->qb->andWhere($this->qb->expr()->gt('fecha_vencimiento', $this->fecha_vencimiento));
        }
    }
	
    public function getByTurno($aTurno){
		$todos = $this->em->getRepository($this->tbl_name)->findOneBy(array('turno' => $aTurno));
		return $todos;
	} 
	

}

?>
