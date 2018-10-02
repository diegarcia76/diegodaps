<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="coiffeures")
 * @Entity
 */
class Coiffeur extends My_Models
{	

    public function __construct() {

        $this->serviciosXCoiffeur = new \Doctrine\Common\Collections\ArrayCollection();
		$this->comisiones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->turnos = new \Doctrine\Common\Collections\ArrayCollection(); 
        $this->horariosDeAtencionXCoiffeur = new \Doctrine\Common\Collections\ArrayCollection();  
        $this->horariosDeAtencionEspecialXCoiffeur = new \Doctrine\Common\Collections\ArrayCollection();  
        $this->ausencias = new \Doctrine\Common\Collections\ArrayCollection();

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
     * @Column(name="nombre", type="string", length=250, nullable=true)
     */
    protected $nombre;

    /**
     * @OneToOne(targetEntity="Foto", inversedBy="coiffeur")
     * @JoinColumn(name="foto_id", referencedColumnName="id")
     **/
    protected $foto = null;

    /**
     * @var boolean $activo
     * @Column(name="activo", type="boolean", nullable=true)
     */
    protected $activo = true;

    /**
     * @var string $descripcion
     * @Column(name="descripcion", type="string", nullable=true)
     */
    protected $descripcion;

    /**
     * @var boolean $borrado
     * @Column(name="borrado", type="boolean", nullable=true)
     */
    protected $borrado = false;


    /**
     * @OneToMany(targetEntity="ServicioXCoiffeur", mappedBy="coiffeur", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $serviciosXCoiffeur = array();


    /**
     * @OneToMany(targetEntity="DetallePago", mappedBy="coiffeur", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $comisiones = array();

    /**
     * @OneToMany(targetEntity="Turno", mappedBy="coiffeur", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $turnos = array();

    /**
     * @OneToMany(targetEntity="HorarioDeAtencionXCoiffeur", mappedBy="coiffeur", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     * @OrderBy({"diaSemana" = "ASC","horaDesde" = "ASC"})
     */         
    protected $horariosDeAtencionXCoiffeur = array();

    /**
     * @OneToMany(targetEntity="HorarioDeAtencionEspecialXCoiffeur", mappedBy="coiffeur", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $horariosDeAtencionEspecialXCoiffeur = array();

    /**
     * @OneToMany(targetEntity="Ausencia", mappedBy="coiffeur", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $ausencias = array();

   
    public function getServicioXCoiffeur($servicio_id){

        $aServicio = \Managers\ServicioManager::getInstance()->get($servicio_id);
        foreach ($this->serviciosXCoiffeur as $sc) {            
            //print_r($sc->id);
            if($sc->servicio == $aServicio)
                return $sc->id;                           

        }

        return 0;

    }

    public function estaAusente($fecha){

        $fecha = \Datetime::createFromFormat('Y-m-d H:i:s', $fecha->format('Y-m-d').' 00:00:00');

        foreach ($this->ausencias as $aAusencia) {
            if (($fecha >= $aAusencia->fecha_inicio) and ($fecha <= $aAusencia->fecha_fin)){
                return true;
            }
        }

        return false;

    }


}
