<?php
namespace Dataservices;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * Description of ImagenDs
 *
 * @author 
 */
class ImagenDs extends BaseDataService {
   
   
    protected static $qb;

    protected function __construct() {
        parent::__construct();
        $this->tbl_name = "models\Foto";
    }
	
	
	
	
}