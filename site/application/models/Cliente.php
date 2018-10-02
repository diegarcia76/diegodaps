<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="clientes")
 * @Entity
 */
class Cliente extends My_Models
{	

    public function __construct() {
      	$this->turnos = new \Doctrine\Common\Collections\ArrayCollection();  
        $this->notificaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pagos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dispositivos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @Column(name="nombre", type="string", length=250, nullable=false)
     */
    protected $nombre;   

     /**
     * @var datetime $fecha_nacimiento
     * @Column(name="fecha_nacimiento", type="datetime", nullable=true)
     */
     protected $fecha_nacimiento;

    /**
     * @var datetime $fecha_alta
     * @Column(name="fecha_alta", type="datetime", nullable=true)
     */
    protected $fecha_alta;

	/**
     * @var string $email
     * @Column(name="email", type="string", length=255, nullable=true)
     */
    protected $email;

    /**
     * @var string $password
     * @Column(name="password", type="string", nullable=true)
     */
    protected $pass;

    /**
     * @var integer $ptos_acumulados
     * @Column(name="ptos_acumulados", type="integer", nullable=true)
     */
    protected $puntos_acumulados;	

    /**
     * @var string $telefono
     * @Column(name="telefono", type="string", length=100, nullable=false)
     */
    protected $telefono;  

    /**
     * @ManyToOne(targetEntity="Profesion", inversedBy="clientes")
     * @JoinColumn(name="profesion_id", referencedColumnName="id")
     */ 
    protected $profesion = null; 

    /**
     * @var string $whatsapp
     * @Column(name="whatsapp", type="string", length=100, nullable=false)
     */
    protected $whatsapp; 

    /**
     * @var string $facebook
     * @Column(name="facebook", type="string", length=255, nullable=false)
     */
    protected $facebook; 

    /**
     * @var string $facebookId
     * @Column(name="facebookId", type="string", length=255, nullable=false)
     */
    protected $facebookId; 

    /**
     * @var string $twitter
     * @Column(name="twitter", type="string", length=255, nullable=false)
     */
    protected $twitter; 

    /**
     * @var string $playerId
     * @Column(name="playerId", type="string", length=255, nullable=true)
     */
    protected $playerId;

    /**
     * @var integer $sexo
     * @Column(name="sexo", type="integer", nullable=true)
     */
    protected $sexo;   

    /**
     * @var string $activo
     * @Column(name="activo", type="boolean", nullable=true)
     */
    protected $activo = false;

    /**
     * @var string $borrado
     * @Column(name="borrado", type="boolean", nullable=true)
     */
    protected $borrado = false;

    /**
     * @var boolean $bloqueado
     * @Column(name="bloqueado", type="boolean", nullable=true)
     */
    protected $bloqueado = false;

    /**
     * @var datetime $fecha_bloqueo
     * @Column(name="fecha_bloqueo", type="datetime", nullable=true)
     */
    protected $fecha_bloqueo;

    /**
     * @var datetime $fecha_desbloqueo
     * @Column(name="fecha_desbloqueo", type="datetime", nullable=true)
     */
    protected $fecha_desbloqueo;

    /**
     * @OneToOne(targetEntity="Foto", inversedBy="cliente")
     * @JoinColumn(name="foto_id", referencedColumnName="id")
     **/
    protected $foto = null;

    /**
     * @OneToMany(targetEntity="Turno", mappedBy="cliente", orphanRemoval=true)
     * @OrderBy({"fecha_hora" = "DESC"})
     **/
    protected $turnos = null;

    /**
     * @OneToMany(targetEntity="Notificacion", mappedBy="cliente", orphanRemoval=true)
     **/
    protected $notificaciones = null;

    /**
     * @OneToMany(targetEntity="Dispositivo", mappedBy="cliente", orphanRemoval=true)
     **/
    protected $dispositivos = null;

    /**
     * @OneToMany(targetEntity="Pago", mappedBy="cliente", orphanRemoval=true)
     **/
    protected $pagos = null;

	public function getTurnosPendientesDepago(){
		$aEstadoTerminado = \Managers\EstadoTurnoManager::getInstance()->get(5);
        return \Managers\TurnoManager::getInstance()->getByClienteAndEstado($this, $aEstadoTerminado);
	}

}
