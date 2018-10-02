<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="dispositivos_x_cliente")
 * @Entity
 */
class Dispositivo extends My_Models
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
     * @ManyToOne(targetEntity="Cliente", inversedBy="dispositivos")
     * @JoinColumn(name="clienteId", referencedColumnName="id")
     */ 
    protected $cliente = null;

	/**
     * @var string $playerId
     * @Column(name="playerId", type="string", length=250, nullable=true)
     */
    protected $playerId;

   
}
