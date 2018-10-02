<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="estado_turno")
 * @Entity
 */
class EstadoTurno extends My_Models
{	

    public function __construct() {

        $this->turnos = new \Doctrine\Common\Collections\ArrayCollection();

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
     * @var string $accion
     * @Column(name="accion", type="string", length=50, nullable=true)
     */
    protected $accion;

    /**
     * @OneToOne(targetEntity="EstadoTurno")
     * @JoinColumn(name="accion_siguiente", referencedColumnName="id")
     */
    protected $accion_siguiente;

    /**
     * @var string $color
     * @Column(name="color", type="string", length=50, nullable=true)
     */
    protected $color;

    /**
     * @var string $className
     * @Column(name="className", type="string", length=50, nullable=true)
     */
    protected $className;

    /**
     * @OneToMany(targetEntity="Turno", mappedBy="estadoTurno", fetch="EXTRA_LAZY")
     */         
    protected $turnos = array();  

   
}
