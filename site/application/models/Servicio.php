<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="servicios")
 * @Entity
 */
class Servicio extends My_Models
{	

    public function __construct() {
      	$this->turnos = new \Doctrine\Common\Collections\ArrayCollection();  
        $this->serviciosXCoiffeur = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @Column(name="nombre", type="string", length=100, nullable=false)
     */
    protected $nombre;

    /**
     * @var integer $precio_puntos
     * @Column(name="precio_puntos", type="integer", nullable=true)
     */
    protected $precio_puntos;

    /**
     * @var integer $puntos_premio
     * @Column(name="puntos_premio", type="integer", nullable=true)
     */
    protected $puntos_premio;	

    /**
     * @var integer $duracion
     * @Column(name="duracion", type="integer", nullable=true)
     */
    protected $duracion;

    /**
     * @var integer $duracion_espera
     * @Column(name="duracion_espera", type="integer", nullable=true)
     */
    protected $duracion_espera;

    /**
     * @var float $precio_default
     * @Column(name="precio_default", type="float", nullable=true)
     */
    protected $precio_default;

    /**
     * @var float $precio_efectivo_default
     * @Column(name="precio_efectivo_default", type="float", nullable=true)
     */
    protected $precio_efectivo_default;

    /**
     * @var float $comision_default
     * @Column(name="comision_default", type="float", nullable=true)
     */
    protected $comision_default;

    /**
     * @var boolean $servicioEnApp
     * @Column(name="servicioEnApp", type="boolean", nullable=true)
     */
    protected $servicioEnApp = false;

    /**
     * @var integer $division_grilla
     * @Column(name="division_grilla", type="integer", nullable=true)
     */
    protected $division_grilla = 30;

    /**
     * @var boolean $activo
     * @Column(name="activo", type="boolean", nullable=true)
     */
    protected $activo = true;

    /**
     * @OneToMany(targetEntity="Turno", mappedBy="servicio", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $turnos = array();

    /**
     * @OneToMany(targetEntity="ServicioXCoiffeur", mappedBy="servicio", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $serviciosXCoiffeur = array();
    
    /**
     * @OneToMany(targetEntity="DetallePago", mappedBy="servicio", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $detallePago = array(); 
   

    public function getCoiffeurs(){
        $coiffeursArr = array();
        foreach ($this->serviciosXCoiffeur as $aServicioXCoiffeur){
            $coiffeursArr[] = $aServicioXCoiffeur->coiffeur;
        }


        return $coiffeursArr;
    }

    public function getDuracion_total(){
        return intval($this->duracion)+intval($this->duracion_espera);
    }

}
