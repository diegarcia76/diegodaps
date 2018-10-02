<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="valoraciones_servicio")
 * @Entity
 */
class Valoracion extends My_Models
{	

    public function __construct() {        
        //$this->notificacionesXUsuario = new \Doctrine\Common\Collections\ArrayCollection(); 
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
     * @var string $comentario
     * @Column(name="comentario", type="string", nullable=true)
     */
    protected $comentario;

    /**
     * @var float $estrellas
     * @Column(name="estrellas", type="float", nullable=true)
     */
    protected $estrellas;

    /**
     * @var datetime $fecha
     *
     * @Column(name="fecha", type="datetime", nullable=true)
     */
     protected $fecha;
   
    /**
     * @ManyToOne(targetEntity="Turno", inversedBy="valoraciones")
     * @JoinColumn(name="turno_id", referencedColumnName="id")
     */ 
    protected $turno = null;

}
