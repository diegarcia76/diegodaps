<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="turnos")
 * @Entity
 */
class Turno extends My_Models
{	

    public function __construct() {
      	$this->fotos = new \Doctrine\Common\Collections\ArrayCollection();  
        $this->valoraciones = new \Doctrine\Common\Collections\ArrayCollection(); 
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
     * @var datetime $fecha_hora
     *
     * @Column(name="fecha_hora", type="datetime", nullable=true)
     */
     protected $fecha_hora;

    /**
     * @var integer $prioridad
     * @Column(name="prioridad", type="integer", nullable=false)
     */
    protected $prioridad = 0;    

    /**
     * @var boolean $canjeado
     * @Column(name="canjeado", type="boolean")
     */
    protected $canjeado = false;

    /**
     * @var integer $canjeado_puntos
     * @Column(name="canjeado_puntos", type="integer", nullable=false)
     */
    protected $canjeado_puntos = 0; 

    /**
     * @var boolean $editado
     * @Column(name="editado", type="boolean")
     */
    protected $editado = false;


    /**
     * @var string $nombre
     * @Column(name="nombre", type="string", length=250, nullable=false)
     */
    protected $nombre;    

    /**
     * @var string $telefono
     * @Column(name="telefono", type="string", length=255)
     */
    protected $telefono;     
	
	/**
     * @var string $email
     * @Column(name="email", type="string", length=255)
     */
    protected $email;          

    /**
     * @ManyToOne(targetEntity="Cliente", inversedBy="turnos")
     * @JoinColumn(name="cliente_id", referencedColumnName="id")
     */ 
    protected $cliente = null;

    /**
     * @ManyToOne(targetEntity="Servicio", inversedBy="turnos")
     * @JoinColumn(name="servicio_id", referencedColumnName="id")
     */ 
    protected $servicio = null; 

    /**
     * @ManyToOne(targetEntity="Coiffeur", inversedBy="turnos")
     * @JoinColumn(name="coiffeur_id", referencedColumnName="id")
     */ 
    protected $coiffeur = null; 

    /**
     * @ManyToOne(targetEntity="EstadoTurno", inversedBy="turnos")
     * @JoinColumn(name="estado_turno_id", referencedColumnName="id")
     */ 
    protected $estadoTurno = null;

    /**
     * @ManyToOne(targetEntity="Pago", inversedBy="turnos")
     * @JoinColumn(name="pago_id", referencedColumnName="id")
     */ 
    protected $pago = null;

    /**
     * @OneToMany(targetEntity="Foto", mappedBy="turno", orphanRemoval=true)
     **/
    protected $fotos = null;

    /**
     * @OneToMany(targetEntity="Valoracion", mappedBy="turno", orphanRemoval=true)
     **/
    protected $valoraciones = null;

    public function getFecha_hora_fin(){
        $aux = new \Datetime($this->fecha_hora->format('Y-m-d H:i:s'));
        return $aux->modify('+'.$this->servicio->duracion.' minutes');
    }

    public function getPrecioTurno(){
        return \Managers\ServicioXCoiffeurManager::getInstance()->getPrecioXServicioXCoiffeur($this->servicio, $this->coiffeur);
    }
	
	public function getHoraComparativa(){
		switch (strtolower($this->estadoTurno->nombre)){
			case 'reservado': 
			case 'recepcionado': 
				return $this->fecha_hora; 
			break;
			default: 
				return $this->fecha_hora_fin; 
		}
	}

    /*public function getOrden(){
        $aux = $this->fecha_hora;
        if (($this->estadoTurno->id==1) || ($this->estadoTurno->id==6)){
            return $aux->format('Y-m-d H:i:s');
        }else{
            return $aux->modify('+'.$this->servicio->duracion.' minutes')->format('Y-m-d H:i:s');
        }

    }*/

}
