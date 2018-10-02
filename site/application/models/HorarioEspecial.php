<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="horarios_especiales")
 * @Entity
 */
class HorarioEspecial extends My_Models
{	

    public function __construct() {

        
        $this->horariosDeAtencionEspecialXCoiffeur = new \Doctrine\Common\Collections\ArrayCollection();
      	
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
     * @var string $fecha_desde
     * @Column(name="fecha_desde", type="date", nullable=false)
     */
    protected $fecha_desde;    

    /**
     * @var string $fecha_hasta
     * @Column(name="fecha_hasta", type="date", nullable=false)
     */
    protected $fecha_hasta;

    /**
     * @var string $activo
     * @Column(name="activo", type="boolean", nullable=true)
     */
    protected $activo = true;

    /**
     * @OneToMany(targetEntity="HorarioDeAtencionEspecialXCoiffeur", mappedBy="horarioEspecial", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $horariosDeAtencionEspecialXCoiffeur = array();

}
