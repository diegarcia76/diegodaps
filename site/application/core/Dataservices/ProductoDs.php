<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class ProductoDs extends BaseDataService {
   
   
    protected $qb;    

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Producto";
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
	
	
    public function getByMarca($aMarca){
		$todos = $this->em->getRepository($this->tbl_name)->findBy(array('marca' => $aMarca), array('marca'=>'ASC','linea'=>'ASC','nombre'=>'ASC'));
		return $todos;
	} 

	public function getAll(){


		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
 			     ->leftjoin('d.marca', 'm')
 			     ->leftjoin('d.linea', 'l')
				 ->orderBy('m.nombre','ASC')
				 ->addOrderBy('l.nombre','ASC')
				 ->addOrderBy('d.nombre','ASC');

			
		$query = $this->qb->getQuery();
		//var_dump($query->getSql());
		$obj = $query->getResult();
		
		if(!empty($obj))
			return $obj;
		
		return array();

	} 

	public function getByMarcaByLinea($aMarca = NULL, $aLinea = NULL){
	
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('d') 
 			     ->from($this->tbl_name, 'd')
				 ->OrderBy('d.nombre','ASC');

		if($aMarca){
			$this->qb->andWhere($this->qb->expr()->eq('d.marca', $aMarca->id));

			if($aLinea)
				$this->qb->andWhere($this->qb->expr()->eq('d.linea', $aLinea->id));
			else
				$this->qb->andWhere($this->qb->expr()->isNull('d.linea'));
			
		} else {
			$this->qb->andWhere($this->qb->expr()->isNull('d.marca'));
		}


			
		$query = $this->qb->getQuery();
		//var_dump($query->getSql());
		$obj = $query->getResult();
		
		if(!empty($obj))
			return $obj;
		
		return array();

	
	} 
	
	
	


    public function setJoinDeMarcas(){
       // $this->aPago = $aPago;
        $this->miFuncion[] = 'setDatasourceJoinsMarca';
    }


    protected function setDatasourceJoinsMarca(){        
        $this->qb->leftjoin('d.marca','m');
        $this->qb->leftjoin('d.linea','l');
    }    

}

