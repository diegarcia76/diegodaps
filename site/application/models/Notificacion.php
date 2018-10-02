<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="notificaciones")
 * @Entity
 */
class Notificacion extends My_Models
{	

    public function __construct() {        
        $this->notificacionesXUsuario = new \Doctrine\Common\Collections\ArrayCollection(); 
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
     * @var string $titulo
     * @Column(name="titulo", type="string", length=255, nullable=true)
     */
    protected $titulo;

    /**
     * @var string $descripcion
     * @Column(name="descripcion", type="string", nullable=true)
     */
    protected $descripcion;

    /**
     * @var boolean $tipo
     * @Column(name="tipo", type="boolean", nullable=true)
     */
    protected $tipo;

    /**
     * @var datetime $fecha
     *
     * @Column(name="fecha", type="datetime", nullable=true)
     */
     protected $fecha;
   
    /**
     * @ManyToOne(targetEntity="Cliente", inversedBy="notificaciones")
     * @JoinColumn(name="cliente_id", referencedColumnName="id")
     */ 
    protected $cliente = null;

    /**
     * @var boolean $visto
     * @Column(name="visto", type="boolean", nullable=true)
     */
    protected $visto;

    /**
     * @OneToMany(targetEntity="NotificacionXUsuario", mappedBy="notificacion", orphanRemoval=true)
     **/
    protected $notificacionesXUsuario = null;

}
