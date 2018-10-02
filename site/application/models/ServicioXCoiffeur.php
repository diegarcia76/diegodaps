<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="serviciosxcoiffeur")
 * @Entity
 */
class ServicioXCoiffeur extends My_Models
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
     * @var float $comision
     * @Column(name="comision", type="float", nullable=true)
     */
    protected $comision;

    /**
     * @var boolean $especial
     * @Column(name="especial", type="boolean")
     */
    protected $especial = false;

    /**
     * @ManyToOne(targetEntity="Servicio", inversedBy="serviciosXCoiffeur")
     * @JoinColumn(name="servicio_id", referencedColumnName="id")
     */ 
    protected $servicio = null; 

    
    /**
     * @ManyToOne(targetEntity="Coiffeur", inversedBy="serviciosXCoiffeur")
     * @JoinColumn(name="coiffeur_id", referencedColumnName="id")
     */ 
    protected $coiffeur = null; 



    public function getDescuento_efectivo(){
        return $this->precio - $this->precio_efectivo;
    }    
    

}
