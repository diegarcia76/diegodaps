<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="detalle_pago")
 * @Entity
 */
class DetallePago extends My_Models
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
     * @var string $descripcion
     * @Column(name="descripcion", type="string", nullable=true)
     */
    protected $descripcion;

    /**
     * @var string $tipo
     * @Column(name="tipo", type="string", length=50, nullable=true)
     */
    protected $tipo;

    /**
     * @var integer $cantidad
     * @Column(name="cantidad", type="integer", nullable=true)
     */
    protected $cantidad;

    /**
     * @var float $precio
     * @Column(name="precio", type="float", nullable=true)
     */
    protected $precio;


    /**
     * @var boolean $fecha
     * @Column(name="fecha", type="datetime", nullable=true)
     */
    protected $fecha;
	
    /**
     * @ManyToOne(targetEntity="Pago", inversedBy="detallePago")
     * @JoinColumn(name="pago_id", referencedColumnName="id")
     */ 
    protected $pago = null;

    /**
     * @ManyToOne(targetEntity="Coiffeur", inversedBy="comisiones")
     * @JoinColumn(name="coiffeur_id", referencedColumnName="id")
     */ 
    protected $coiffeur = null;

    /**
     * @var float $comision
     * @Column(name="comision", type="float", nullable=true)
     */
    protected $comision;

    /**
     * @var float $descuento
     * @Column(name="descuento", type="float", nullable=true)
     */
    protected $descuento;

    /**
     * @ManyToOne(targetEntity="Servicio", inversedBy="detallePago")
     * @JoinColumn(name="servicioId", referencedColumnName="id")
     */ 
    protected $servicio = null;
   
    /**
     * @ManyToOne(targetEntity="Producto", inversedBy="detallePago")
     * @JoinColumn(name="productoId", referencedColumnName="id")
     */ 
    protected $producto = null;
}
