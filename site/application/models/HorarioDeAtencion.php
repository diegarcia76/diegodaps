<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="horariosdeatencion")
 * @Entity
 */
class HorarioDeAtencion extends My_Models
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
     * @var string $horaDesde
     * @Column(name="horaDesde", type="time", nullable=false)
     */
    protected $horaDesde;    

    /**
     * @var string $horahasta
     * @Column(name="horahasta", type="time", nullable=false)
     */
    protected $horaHasta;

    /**
     * @ManyToOne(targetEntity="DiaSemana", inversedBy="horariosDeAtencion")
     * @JoinColumn(name="diasemana_id", referencedColumnName="id")
     */ 
    protected $diaSemana = null;


}
