<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="profesiones")
 * @Entity
 */
class Profesion extends My_Models
{	

    public function __construct() {
      	$this->clientes = new \Doctrine\Common\Collections\ArrayCollection();  
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
     * @Column(name="nombre", type="string", length=100, nullable=false)
     */
    protected $nombre;

    /**
     * @OneToMany(targetEntity="Cliente", mappedBy="profesion", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $clientes = array();
   

}
