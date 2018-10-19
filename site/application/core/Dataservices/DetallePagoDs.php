<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class DetallePagoDs extends BaseDataService {
   
   
    protected $qb;    
    protected $aCoiffeur = null;
    protected $aPago = null;
    protected $fecha_hasta = null;

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\DetallePago";
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
	
	
    public function setJoinDeCoiffeur($aCoiffeur = null){
        $this->aCoiffeur = $aCoiffeur;
        $this->miFuncion[] = 'setDatasourceJoinsCoiffeur';
    }

    protected function setDatasourceJoinsCoiffeur(){        
        $this->qb->leftjoin('d.coiffeur','c');
        if($this->aCoiffeur){ 
            $this->qb->andWhere($this->qb->expr()->eq('c.id', $this->aCoiffeur->id));
        }
    }
	
	
	 public function setJoinDeServicio($aServicio = null){
        $this->aServicio = $aServicio;
        $this->miFuncion[] = 'setDatasourceJoinsServicio';
    }
	
	protected function setDatasourceJoinsServicio(){        
        $this->qb->leftjoin('d.servicio','s');
        if($this->aServicio){ 
            $this->qb->andWhere($this->qb->expr()->eq('s.id', $this->aServicio->id));
        }
    }

    public function setJoinDePago($aPago = null){
        $this->aPago = $aPago;
        $this->miFuncion[] = 'setDatasourceJoinsPago';
    }

    protected function setDatasourceJoinsPago(){        
        $this->qb->leftjoin('d.pago','p');
        $this->qb->OrderBy('p.fecha_pago','DESC');
        if($this->aPago){ 
            $this->qb->andWhere($this->qb->expr()->eq('p.id', $this->aPago->id));
        }
    }

    public function setJoinDeFecha($fecha_desde, $fecha_hasta){
        $this->fecha_desde = $fecha_desde;
        $this->fecha_hasta = $fecha_hasta;
        $this->miFuncion[] = 'setDatasourceJoinsFecha';
    }

    
    protected function setDatasourceJoinsFecha(){        
        if($this->fecha_hasta){
            $this->qb->andWhere('p.fecha BETWEEN :fecha1 AND :fecha2');
            $this->qb->setParameter('fecha1', $this->fecha_desde->format('Y-m-d 00:00:00'));
            $this->qb->setParameter('fecha2', $this->fecha_hasta->format('Y-m-d 23:59:59'));
            
            //$this->qb->andWhere($this->qb->expr()->gt('fecha_vencimiento', $this->fecha_vencimiento));
        }
    }

    public function getTotales(){

	    $this->qb = $this->em->createQueryBuilder();
		$this->qb->select('SUM(d.precio) as precio, SUM(d.comision) as comision') 
			   ->from($this->tbl_name, 'd');			   
				   
        $query = $this->qb->getQuery();		
        //var_dump($query->getSql()); die();
		$obj = $query->getResult();

        if (!empty($obj))
            return $obj;

        return false;
	}


	public function getBalancexFechas($fecha_start, $fecha_end){

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select(' c.nombre, sum(d.precio*d.cantidad) as total, sum(d.comision) as comision, sum(d.descuento*d.cantidad) as descuento') 
 			     ->from($this->tbl_name, 'd')
 			     ->innerjoin('d.coiffeur','c')
 			     ->groupBy("c.id");

		if($fecha_start){
            $this->qb->andWhere('d.fecha BETWEEN :fecha1 AND :fecha2');
            $this->qb->setParameter('fecha1', $fecha_start->format('Y-m-d 00:00:00'));
            $this->qb->setParameter('fecha2', $fecha_end->format('Y-m-d 23:59:59'));
            
        }

        
		$query = $this->qb->getQuery();
		//var_dump($query->getSql());die();
		$obj = $query->getResult();
		
		if(!empty($obj))
			return $obj;
			// return $obj;
		
		//return false;
		return array();

    }
	
	public function getBalancexFechas3($fecha_start, $fecha_end, $pel){

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('c.id, c.nombre, sum(d.precio*d.cantidad) as total, sum(d.comision) as comision, sum(d.descuento*d.cantidad) as descuento, d.descripcion, sum(d.cantidad) as cantidad, d.precio') 
 			     ->from($this->tbl_name, 'd')
 			     ->innerjoin('d.coiffeur','c')
				  ->where(
					$this->qb->expr()->eq('c.id', $pel)
					)
 			     ->groupBy("d.descripcion");

		if($fecha_start){
            $this->qb->andWhere('d.fecha BETWEEN :fecha1 AND :fecha2');
            $this->qb->setParameter('fecha1', $fecha_start->format('Y-m-d 00:00:00'));
            $this->qb->setParameter('fecha2', $fecha_end->format('Y-m-d 23:59:59'));
            
        }

        
		$query = $this->qb->getQuery();
		//var_dump($query->getSql());die();
		$obj = $query->getResult();
		
		if(!empty($obj))
			return $obj;
			// return $obj;
		
		//return false;
		return array();

    }
	
	public function getBalancexFechas2($fecha_start, $fecha_end){

		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select(' c.nombre,c.id, d.precio, d.cantidad, d.comision, d.descuento, d.descripcion') 
 			     ->from($this->tbl_name, 'd')
 			     ->innerjoin('d.coiffeur','c')
 			     ->orderBy("c.id");

		if($fecha_start){
            $this->qb->andWhere('d.fecha BETWEEN :fecha1 AND :fecha2');
            $this->qb->setParameter('fecha1', $fecha_start->format('Y-m-d 00:00:00'));
            $this->qb->setParameter('fecha2', $fecha_end->format('Y-m-d 23:59:59'));
            
        }

        
		$query = $this->qb->getQuery();
		//var_dump($query->getSql());die();
		$obj = $query->getResult();
		
		if(!empty($obj))
			return $obj;
			// return $obj;
		
		//return false;
		return array();

    }


}

?>
