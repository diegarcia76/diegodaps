<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="horariosdeatencionxcoiffeur")
 * @Entity
 */
class HorarioDeAtencionXCoiffeur extends My_Models
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
     * @ManyToOne(targetEntity="Coiffeur", inversedBy="horariosDeAtencionXCoiffeur")
     * @JoinColumn(name="coiffeur_id", referencedColumnName="id")
     */ 
    protected $coiffeur = null; 

    /**
     * @ManyToOne(targetEntity="DiaSemana", inversedBy="horariosDeAtencionXCoiffeur")
     * @JoinColumn(name="diasemana_id", referencedColumnName="id")
     */ 
    protected $diaSemana = null;


}
