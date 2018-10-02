<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="marcas")
 * @Entity
 */
class Marca extends My_Models
{	

    public function __construct() {
        $this->productos = new \Doctrine\Common\Collections\ArrayCollection();  
        $this->submarcas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @var string $descripcion
     * @Column(name="descripcion", type="string", nullable=true)
     */
    protected $descripcion;

    /**
     * @OneToMany(targetEntity="Producto", mappedBy="marca", orphanRemoval=true)
     * @OrderBy({"linea" = "DESC"})
     **/
    protected $productos = null;

    /**
     * @OneToMany(targetEntity="Marca", mappedBy="parent", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */
    protected $submarcas = array();

    /**
     * @ManyToOne(targetEntity="Marca", inversedBy="submarcas")
     * @JoinColumn(name="parent_id", referencedColumnName="id")
     */ 
    protected $parent = null; 

}
