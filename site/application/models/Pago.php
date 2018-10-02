<?php

namespace models;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="pagos")
 * @Entity
 */
class Pago extends My_Models
{	

    public function __construct() {

        $this->turnos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->detallePago = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pagos = new \Doctrine\Common\Collections\ArrayCollection();

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
     * @var datetime $fecha
     * @Column(name="fecha", type="datetime", nullable=true)
     */
    protected $fecha;

    /**
     * @var datetime $fecha_pago
     * @Column(name="fecha_pago", type="datetime", nullable=true)
     */
    protected $fecha_pago;

    /**
     * @var float $total
     * @Column(name="total", type="float", nullable=true)
     */
    protected $total;

    /**
     * @var string $comentario
     * @Column(name="comentario", type="string", nullable=true)
     */
    protected $comentario;

    /**
     * @var boolean $cobrado
     * @Column(name="cobrado", type="boolean", nullable=true)
     */
    protected $cobrado = false;

    /**
     * @var boolean $canje
     * @Column(name="canje", type="boolean", nullable=true)
     */
    protected $canje = false;

    /**
     * @var string $nombre
     * @Column(name="nombre", type="string", length=250, nullable=false)
     */
    protected $nombre;       

    /**
     * @OneToMany(targetEntity="Turno", mappedBy="pago", fetch="EXTRA_LAZY")
     */         
    protected $turnos = array();  
	
    /**
     * @OneToMany(targetEntity="Pago", mappedBy="cliente", orphanRemoval=true)
     **/
    protected $pagos = null;	

    /**
     * @OneToMany(targetEntity="DetallePago", mappedBy="pago", fetch="EXTRA_LAZY", cascade={"persist"}, orphanRemoval=true)
     */         
    protected $detallePago = array();  


    /**
     * @ManyToOne(targetEntity="Cliente", inversedBy="pagos")
     * @JoinColumn(name="cliente_id", referencedColumnName="id")
     */ 
    protected $cliente = null;   
	
	public function addDetallePago($detalle, $cantidad, $precio, $tipo, $aCoiffeur = null, $comision = null, $descuento = null, $id =null){
		$aDetallePago = \Managers\DetallePagoManager::getInstance()->create();
		$aDetallePago->descripcion = $detalle;
		$aDetallePago->cantidad = $cantidad;
		if($tipo=='descuento'){
			$precio = (-1)*$precio;
		}	
		$aDetallePago->precio = $precio;	
		$aDetallePago->coiffeur = $aCoiffeur;
		$aDetallePago->comision = $comision;
		$aDetallePago->descuento = $descuento;
		$aDetallePago->tipo = $tipo;

		if($id){
			if($tipo=='servicio'){
				$aServicio = \Managers\ServicioManager::getInstance()->get($id);
				$aDetallePago->servicio = $aServicio;
			}elseif($tipo=='producto'){
				$aProducto = \Managers\ProductoManager::getInstance()->get($id);
				$aDetallePago->producto = $aProducto;
			}
		}
	
		$subTotoal = $cantidad * $precio;
		$this->total += $subTotoal;
		
		$this->detallePago->add($aDetallePago);
		$aDetallePago->pago = $this;
		
		return $this;
	}

	public function getTotal_descuentos(){
		$descuentos = 0;
		foreach ($this->detallePago as $dp) {
			$descuentos += $dp->descuento;
		}
		
		return $descuentos;
	}
	
	public function addTurno($aTurno){

		$precioServicio = 0;
		$detalleExtra = '';

		$aServicioXCoiffeur = \Managers\ServicioXCoiffeurManager::getInstance()->getByTurno($aTurno);

		// revisamos si el servicio fue canjeado revisando el turno
		if ($aTurno->canjeado == true){
			$detalleExtra = ' (X Canje de puntos ['.$aTurno->canjeado_puntos.'])';
		} else {
			$precioServicio = $aServicioXCoiffeur->precio;
		}

		$configuracion = \Managers\ConfiguracionManager::getInstance()->get(1);

		$descuento = $precioServicio - $aServicioXCoiffeur->precio_efectivo;

		$aDetallePago = \Managers\DetallePagoManager::getInstance()->create();
		//Solo muestra el nombre del servicio
		$aDetallePago->descripcion = $aTurno->servicio->nombre;
		//$aDetallePago->descripcion = $aTurno->servicio->nombre.' con '.$aTurno->coiffeur->nombre.$detalleExtra;
		$aDetallePago->cantidad = 1;
		$aDetallePago->precio = $precioServicio;
		$aDetallePago->descuento = $descuento;
		$aDetallePago->tipo = 'servicio';
		$aDetallePago->servicio = $aTurno->servicio;
		
		//Genera la comision tomando el precio menos el descuento (precio efectivo) [MP]
		$comisionCoiffeur = ($aServicioXCoiffeur->precio - $descuento) * ($aServicioXCoiffeur->comision / 100);
		//$comisionCoiffeur = $aServicioXCoiffeur->precio * $aServicioXCoiffeur->comision / 100;
		
		$aDetallePago->coiffeur = $aTurno->coiffeur;
		$aDetallePago->comision = $comisionCoiffeur;
	
		$this->total += $precioServicio;
		
		
		$this->turnos->add($aTurno);
		$aTurno->pago = $this;
		
		$this->detallePago->add($aDetallePago);
		$aDetallePago->pago = $this;
		
		return $this;
	}

	public function getNroFormateado(){
		return substr('00000'.$this->id, -5);
	}
	
}
