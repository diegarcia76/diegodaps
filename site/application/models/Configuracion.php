<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="configuraciones")
 * @Entity
 */
class Configuracion extends My_Models
{	

    public function __construct() {

        //$this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();

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
     * @var float $descuento_efectivo
     * @Column(name="descuento_efectivo", type="float", nullable=true)
     */
    protected $descuento_efectivo;

    /**
     * @var float $comision_productos
     * @Column(name="comision_productos", type="float", nullable=true)
     */
    protected $comision_productos;

    /**
     * @var float $descuento_efectivo_productos
     * @Column(name="descuento_efectivo_productos", type="float", nullable=true)
     */
    protected $descuento_efectivo_productos;

    /**
     * @var integer $cancelar_antes
     * @Column(name="cancelar_antes", type="integer", nullable=true)
     */
    protected $cancelar_antes = 0;

    /**
     * @var integer $dias_bloqueado
     * @Column(name="dias_bloqueado", type="integer", nullable=true)
     */
    protected $dias_bloqueado = 0;

   
}
