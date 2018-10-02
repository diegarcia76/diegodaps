<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="perfiles")
 * @Entity
 */
class Perfil extends My_Models
{	

    public function __construct() {

        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();

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
     * @Column(name="nombre", type="string", length=100, nullable=true)
     */
    protected $nombre;

    /**
     * @var string $descripcion
     * @Column(name="descripcion", type="string", nullable=true)
     */
    protected $descripcion;

    /**
     * @OneToMany(targetEntity="Usuario", mappedBy="perfil", fetch="EXTRA_LAZY")
     */         
    protected $usuarios = array();  

   
}
