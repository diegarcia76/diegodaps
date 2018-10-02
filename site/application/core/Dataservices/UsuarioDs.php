<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of Faqs_ds
 *
 * @author 
 */
class UsuarioDs extends BaseDataService {
   
   
    protected $qb;

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Usuario";
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
/*
	public function getAll(){
		$todos = $this->em->getRepository($this->tbl_name)->findBy();
		return $todos;
	}    	
*/	
	/*public function getLogin($username, $pass){
		 
		
		$federacionActual = $this->ci->getFederacion();
		
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u') 
			   ->from($this->tbl_name, 'u')
			//  ->join('u.federacion','f')
			   ->where(
				   $this->qb->expr()->eq('u.email', '?1')
				   ,$this->qb->expr()->eq('u.pass', '?2')
				   ,$this->qb->expr()->eq('u.activo', '?3')
				   ,$this->qb->expr()->eq('u.borrado', '?4')
				   // $this->qb->expr()->eq('f.id', $federacionActual->id)
			   )
			   ->setParameter(1,$username)
			   ->setParameter(2,$pass)
			   ->setParameter(3,'1')
			   ->setParameter(4,'0');
			   
				   
        $query = $this->qb->getQuery();

		$obj = $query->getResult();		

        if (count($obj) > 0){
            return $query->getSingleResult();
        }

        return false;
	}*/
	

/*
	public function delete($data){		
		if (isset($data)) {
            //$this->em->remove($data);
			$data->borrado = 1;
            $this->em->persist($data);
            $this->em->flush();
            return(true);
        } else {
            return(false);
        }
   
    }

*/

	public function getByUsername($username){
		$todos = $this->em->getRepository($this->tbl_name)->findOneBy(array('email' => $username));
		return $todos;
	} 
	
	
	
	public function getByEmail($email){
		$federacionActual = $this->ci->getFederacion();	
	    $this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u') 
			   ->from('models\Usuario', 'u')
			   ->join('u.federacion','f')
			   ->where(
				   $this->qb->expr()->eq('u.email', '?1'),
				  $this->qb->expr()->eq('f.id', $federacionActual->id)
				  )
			   ->OrderBy('u.id','DESC')	 	 
			   ->setParameter(1,$email);			   
				   
        $query = $this->qb->getQuery();		
		$obj = $query->getResult();

        if (!empty($obj))
            return $obj[0];

        return false;
	}
	

	public function getAdmin($username, $pass){
		$this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u') 
			   ->from($this->tbl_name, 'u')
			   ->where(
				   $this->qb->expr()->eq('u.email', '?1'),
				   $this->qb->expr()->eq('u.pass', '?2')
			   )
			   ->setParameter(1,$username)
			   ->setParameter(2,$pass);
			   
				   
        $query = $this->qb->getQuery();
		
		$obj = $query->getResult();

        if (count($obj) > 0)
            return $query->getSingleResult();

        return false;
	}
	

    public function getByFacebookId($facebookId){
		//$federacionActual = $this->ci->getFederacion();
        $this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u')
				 ->from($this->tbl_name,'u')
				 // ->join('u.federacion','f')
				 ->where(
						 $this->qb->expr()->eq('u.facebook_id', '?1')
					)
				 ->setParameter(1, $facebookId);
				 
		$query = $this->qb->getQuery();
		
		$obj = $query->getResult();
		
		if(count($obj) > 0)
			return $obj[0];
		
		return false;
	}


	public function getUserByEmailOrDocument($email){	
	    $this->qb = $this->em->createQueryBuilder();
		$this->qb->select('u') 
			   ->from('models\Usuario', 'u')
			   ->where(
				  
					$this->qb->expr()->orX(
						$this->qb->expr()->eq('u.email', '?1')
					)
				 )  
			   ->OrderBy('u.id','DESC')	 	 
			   ->setParameter(1,$email);			   
				   
        $query = $this->qb->getQuery();		
		$obj = $query->getResult();

        if (!empty($obj))
            return $obj[0];

        return false;
	}

	
}

?>
