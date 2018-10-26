<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class ComentarioDs extends BaseDataService {
   
   
    protected $qb;   
    protected $aCliente = null;
   

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Comentario";
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
			 	
				 ->OrderBy('d.id','DESC');	   

			
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
			 	
				 ->OrderBy('d.id','DESC');
				   
		

		$query = $this->qb->getQuery();
		return $query->getSingleScalarResult();
		
	}
	
    public function setJoinDeCliente($aCliente = null){
        $this->aCliente = $aCliente;
        $this->miFuncion[] = 'setDatasourceJoinsCliente';
    }

    protected function setDatasourceJoinsCliente(){        
    	$this->qb->leftjoin('d.usuario','c');
        if($this->aCliente){ 
            $this->qb->andWhere($this->qb->expr()->eq('c.id', $this->aCliente->id));
        }
    }

   

  
    
   

   

}

