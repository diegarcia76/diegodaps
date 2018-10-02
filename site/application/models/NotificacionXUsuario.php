<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="notificacionesxusuario")
 * @Entity
 */
class NotificacionXUsuario extends My_Models
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
     * @ManyToOne(targetEntity="Notificacion", inversedBy="notificacionesXUsuario")
     * @JoinColumn(name="notificacionId", referencedColumnName="id")
     */ 
    protected $notificacion = null;
  
    /**
     * @ManyToOne(targetEntity="Usuario", inversedBy="notificacionesXUsuario")
     * @JoinColumn(name="usuarioId", referencedColumnName="id")
     */ 
    protected $usuario = null;

    /**
     * @var boolean $visto
     * @Column(name="visto", type="boolean", nullable=true)
     */
    protected $visto;

    /**
     * @var datetime $fecha
     *
     * @Column(name="fecha", type="datetime", nullable=true)
     */
     protected $fecha;

}
