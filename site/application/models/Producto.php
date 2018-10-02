<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="productos")
 * @Entity
 */
class Producto extends My_Models
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
     * @var string $descripcion
     * @Column(name="descripcion", type="string", nullable=true)
     */
    protected $descripcion;

    /**
     * @var string $codigo
     * @Column(name="codigo", type="string", length=20, nullable=true)
     */
    protected $codigo;

    /**
     * @var float $precio
     * @Column(name="precio", type="float", nullable=true)
     */
    protected $precio;

    /**
     * @var float $precio_efectivo
     * @Column(name="precio_efectivo", type="float", nullable=true)
     */
    protected $precio_efectivo;

    /**
     * @OneToMany(targetEntity="DetallePago", mappedBy="producto", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $detallePago = array(); 

    /**
     * @ManyToOne(targetEntity="Marca", inversedBy="productos")
     * @JoinColumn(name="marca_id", referencedColumnName="id")
     */ 
    protected $marca = null;

    /**
     * @ManyToOne(targetEntity="Marca")
     * @JoinColumn(name="linea_id", referencedColumnName="id")
     */ 
    protected $linea = null;

    public function getDescuento_efectivo(){
        return $this->precio - $this->precio_efectivo;
    }
}
