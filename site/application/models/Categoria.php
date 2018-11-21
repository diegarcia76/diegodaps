<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="categorias")
 * @Entity
 */
class Categoria extends My_Models
{	


    public function __construct() {
      
    }
    
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

	/**
     * @var string $nombre
     * @Column(name="nombre", type="string", length=250, nullable=false)
     */
    protected $nombre;
	
	/**
     * @var string $color
     * @Column(name="color", type="string", length=250, nullable=false)
     */
    protected $color;   

   
   
    /**
     * @var integer $extra
     * @Column(name="extra", type="integer", nullable=true)
     */
    protected $extra;	

 

}
