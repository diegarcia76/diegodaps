<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class MarcaDs extends BaseDataService {
   
   
    protected $qb;    

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Marca";
        $this->qb = $this->em->createQueryBuilder(); 
        //$this->borradoLogico = true;       
        //$this->miFuncion[] = 'setJoins'; 
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
	
	
    public function getDatatableSource($data){
	
	
		
		$start = intval($data['start']);
		$length = intval($data['length']);

		// Create QueryBuilder
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
 			     ->where(
 			     		$this->qb->expr()->isNull('d.parent')
 			     	);
		
		//$this->presetQB($data);
		$this->qb->setFirstResult($start)
				 ->setMaxResults($length);

		$query = $this->qb->getQuery();
		$obj = new Paginator($query, $fetchJoinCollection = true);

		
		if(!empty($obj))
			return $obj;
		
		return array();

	}
	

	public function getDatatableSourceCount($data){
		

		// Create QueryBuilder
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('count(d) as cantidad') 
 			     ->from($this->tbl_name, 'd')
 			     ->where(
 			     		$this->qb->expr()->isNull('d.parent')
 			     	);
		
		//$this->presetQB($data);

		$query = $this->qb->getQuery();
		return $query->getSingleScalarResult();

	}


}

?>
