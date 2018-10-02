<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="ausenciasxcoiffeur")
 * @Entity
 */
class Ausencia extends My_Models
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
     * @var string $fechaInicio
     * @Column(name="fecha_inicio", type="date", nullable=false)
     */
    protected $fecha_inicio;    

    /**
     * @var string $fechaFin
     * @Column(name="fecha_fin", type="date", nullable=false)
     */
    protected $fecha_fin;

    /**
     * @var string $fechaGen
     * @Column(name="fecha_generada", type="datetime", nullable=false)
     */
    protected $fecha_generada;

    /**
     * @var string $motivo
     * @Column(name="motivo", type="string", nullable=false)
     */
    protected $motivo;

    /**
     * @ManyToOne(targetEntity="Coiffeur", inversedBy="ausencias")
     * @JoinColumn(name="coiffeur_id", referencedColumnName="id")
     */ 
    protected $coiffeur = null; 



}
