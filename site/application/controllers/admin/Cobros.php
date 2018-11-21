<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Cobros extends BaseAdmin_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    private $parsePath = 'admin/cobros/';

    public function __construct()
    {
        parent::__construct();
        $this->data['menuactive'] = 'cobros';
        $this->data['pageSubtitle'] = 'Pendientes a Cobrar';
        //$this->data['accesos'] = $this->session->userdata('permisosLogin');
    }

    public function index()
    {
        //die();
        $breadcrumb = array();
        $breadcrumb['Dashboard'] = $this->controller_url('admin');
        //$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
        $this->data['breadcrumb'] = $breadcrumb;

        //$aUsuarios = Managers\UsuarioManager::getInstance()->getAll();

        $diaActual = new DateTime('now');

        $this->data['productosActivos'] = \Managers\ProductoManager::getInstance()->getAll();
        $this->data['serviciosActivos'] = \Managers\ServicioManager::getInstance()->getAll();
        //$this->data['pagosPendientes'] =  \Managers\PagoManager::getInstance()->getPendientes();
		 $this->data['pagosPendientes'] =  \Managers\PagoManager::getInstance()->getPendientesByFechaToday();
        $this->data['clientes'] = \Managers\ClienteManager::getInstance()->getAll();
        $this->data['coiffeurs'] = \Managers\CoiffeurManager::getInstance()->getActiveAll();
		  $this->data['t'] = \Managers\TarjetaManager::getInstance()->get(1);
        //var_dump($configuracion->descuento_efectivo_productos); die();

        //$this->data['productosActivos'] = usort(\Managers\ProductoManager::getInstance()->getAll(), "cmp");
        usort($this->data['productosActivos'], function($a, $b)
        {
            return strcmp($a->nombre, $b->nombre);
        });
        

        $this->data['submenuactive'] = '';
        $this->parser->parse($this->parsePath.'home.tpl', $this->data);
    }

    function cmp($a, $b)
    {
        return strcmp($a->nombre, $b->nombre);
    }

    public function pagar($pago_id)
    {
        $result["status"]  = false;
        $result["message"] = 'No se encontró el pago';

        $tipo = $this->input->post('tipo');
        $monto_efectivo = floatval($this->input->post('total_efectivo'));
        $monto_tarjeta = floatval($this->input->post('monto'));
        $cb_modificar_fecha = intval($this->input->post('cb_modificar_fecha'));
        $fecha_cobro = $this->input->post('fecha_cobro');
		$recargo = $this->input->post('recargo');
		
        if ($aPago = \Managers\PagoManager::getInstance()->get($pago_id)) {

            $canje = false;
			
			$aPago->fecha_pago = new \DateTime('now');

            if($cb_modificar_fecha == 1){
                $aPago->fecha = Datetime::createFromFormat('Y-m-d', $fecha_cobro);
            }
			
			if ($tipo=='combinado') {
				$aPago->totale = $monto_tarjeta;
				$aPago->totalt =$recargo;
				$aPago->forma =4;
				$aPago -> cobrado = true;
			
			}else{
			
			
            if ($tipo=='efectivo') {
				$descuento = $aPago->total - $monto_efectivo;
				$aPago->totale = $monto_efectivo;
				$aPago->totalt =0;
				$aPago->forma =1;
				
				 
                $aPago->addDetallePago('Descuento por Pago en Efectivo', 1, $descuento, 'descuento', null, null, null,null, $aPago->fecha);
            } else {
			
				$descuento = $aPago->total - $monto_tarjeta ;
                if ($descuento != 0){
                    $aPago->addDetallePago('Descuento Especial', 1, $descuento, 'descuento', null, null, null,null, $aPago->fecha);                
                }
				
				if ($recargo != 0){
					$aPago->addDetallePago('Recargo', 1, $recargo, 'Interes', null, null, null,null, $aPago->fecha); 
                }
				

                if ($aPago->total == 0 && $monto_tarjeta == 0){
					$aPago->totale = 0;
					$aPago->totalt =0;
					$aPago->forma =3;
                    $canje = true;
                }else{
					$aPago->totale = 0;
					$aPago->totalt =$monto_tarjeta;
					$aPago->forma =2;
				
				}
            }
            $aPago -> cobrado = true;
            $aPago -> canje = $canje;
			}
            

            foreach ($aPago->turnos as $turno) {
                $turno->estadoTurno = \Managers\EstadoTurnoManager::getInstance()->get(ESTADO_TURNO_COBRADO);

                //enviar mail de valoracion por cada turno cobrado
                if($turno->cliente){
                    $userDataMin['id'] = $turno->cliente->id;
                    $userDataMin['turnoid'] = $turno->id;
                    $userDataMin['hash'] = \Managers\ClienteManager::getInstance()->doHash($turno->cliente);

                    $userData = base64_encode(json_encode($userDataMin));
					
					
					
					if (!$turno->cliente->email){
					
					}else{
					 $somedata['verificar_link'] = site_url().'registro/valorarServicio/'.$userData;

                    $somedata['nombre'] =$turno->cliente->nombre;
                    $somedata['servicio'] =$turno->servicio->nombre;
                     
					 
					 
					            
                    $mailbody = $this->parser->parse('mails/valorar.tpl',$somedata, true);
                    \Managers\MailManager::getInstance()->sendmail($turno->cliente->email,"Diego Dap's", $mailbody);

                    $titulo = 'Valora nuestro servicio' ;
                    $descripcion = 'Ingresa al siguiente link: '.$somedata['verificar_link'];
                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();
                    $aNotificacion->titulo = $titulo;
                    $aNotificacion->descripcion = $descripcion;
                    $aNotificacion->visto = false;
                    $aNotificacion->tipo = true;
                    $aNotificacion->cliente = $turno->cliente;
                    $aNotificacion->fecha = new \DateTime('now');
                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion, $somedata['verificar_link']);
					
					
					}	
                   

                }

            }

            $puntosAcumulados = 0;
            foreach ($aPago->detallePago as $aDetallePago){
                if ($aDetallePago->servicio){
                    $puntosAcumulados = $puntosAcumulados + ($aDetallePago->cantidad *  $aDetallePago->servicio->puntos_premio);
                }
            }

            if ($aPago->cliente){
                $aPago->cliente->puntos_acumulados = $aPago->cliente->puntos_acumulados + $puntosAcumulados;
            }

            $aPago = \Managers\PagoManager::getInstance()->save($aPago);            

            $result["status"]  = true;
            $result["message"] = 'Se ha cobrado el pago con éxito.<br/><a href="'.site_url().'admin/tickets/imprimir/'.$pago_id.'" class="btn btn-sm btn-info" target="_blank"><i class="fa fa-print"></i> Imprimir</a>';
        }

        echo json_encode($result);
    }

    public function saveItem()
    {
        $pago_id = $this->input->post('pago-id');
        $cantidad = $this->input->post('cantidad');
        $precio = $this->input->post('precio');
        $descripcion = $this->input->post('descripcion');
        $cliente_id  = $this->input->post('cliente-id');
        $tipo  = $this->input->post('tipo');
        $nombrecobro = trim($this->input->post('nombrecobro'));

        $result['status'] = false;
        $result['message'] = 'Error';

        if (!$aPago = \Managers\PagoManager::getInstance()->get($pago_id)) {
            if ($aCliente = \Managers\ClienteManager::getInstance()->get($cliente_id)) {
                $aPago = \Managers\PagoManager::getInstance()->getPagoCliente($aCliente);
            } else {
                if (empty($nombrecobro)){
                    $aPago = null;
                    $result['message'] = 'Cliente no encontrado';
                }else{
                    $aPago = \Managers\PagoManager::getInstance()->create();
                    $aPago->cliente = null; 
                    $aPago->nombre = $nombrecobro; 

                }
                
            }
        }

        if ($aPago) {
            $configuracion = \Managers\ConfiguracionManager::getInstance()->get(1);
            
			if ($tipo == 'servicio') {
                $descuento = $precio * ($configuracion->descuento_efectivo / 100);
            } else {
                $descuento = $precio * ($configuracion->descuento_efectivo_productos / 100);
            }
			
			//$descuento = 0; 
			$fecha = new \DateTime('now');
            $descuento = $descuento * $cantidad;
            $aPago->addDetallePago($descripcion, $cantidad, $precio, $tipo, null, null, $descuento,null,$fecha );
            $aPago = \Managers\PagoManager::getInstance()->save($aPago);
            $result['status'] = true;
            $result['message'] = 'Se ha agregado el item con éxito';
        }


        echo json_encode($result);
    }

    public function editItem()
    {
        $pago_id = $this->input->post('pago-id');
        $detallePago_id = $this->input->post('detallePago-id');
        $cantidad = $this->input->post('cantidad');
        $precio = $this->input->post('precio');
        $descripcion = $this->input->post('descripcion');
        $cliente_id  = $this->input->post('cliente-id');
        $tipo  = $this->input->post('tipo');

        $result['status'] = false;
        $result['message'] = 'Error';

        if (!$aPago = \Managers\PagoManager::getInstance()->get($pago_id)) {
            if ($aCliente = \Managers\ClienteManager::getInstance()->get($cliente_id)) {
                $aPago = \Managers\PagoManager::getInstance()->getPagoCliente($aCliente);
            } else {
                $aPago = null;
                $result['message'] = 'Cliente no encontrado';
            }
        }

        if ($aPago) {
            $configuracion = \Managers\ConfiguracionManager::getInstance()->get(1);
            if ($tipo == 'servicio') {
                $descuento = $precio * ($configuracion->descuento_efectivo / 100);
            } else {
                $descuento = $precio * ($configuracion->descuento_efectivo_productos / 100);
            }
            $descuento = $descuento * $cantidad;

            //modificar el detalle y actualizar el monto total del pago
            $aDetallePago = \Managers\DetallePagoManager::getInstance()->get($detallePago_id);
            $aDetallePago->descripcion = $descripcion;
            $aDetallePago->precio = $precio;
            $aDetallePago->cantidad = $cantidad;
            $aDetallePago->descuento = $descuento;
            //$aDetallePago->fecha = $fecha = new \DateTime('now');
            //$aDetallePago->producto = $aProducto;
            //$aDetallePago->coiffeur = $aCoiffeur;
            $aDetallePago = \Managers\DetallePagoManager::getInstance()->save($aDetallePago);

            $subTotoal = 0;
            $total = 0;
            foreach ($aPago->detallePago as $dp) {
                $subTotoal = $dp->cantidad * $dp->precio;
                $total += $subTotoal;
            }
            $aPago->total = $total;
            //$aPago->addDetallePago($descripcion, $cantidad, $precio, $tipo, null, null, $descuento);
            
            $aPago = \Managers\PagoManager::getInstance()->save($aPago);
            $result['status'] = true;
            $result['message'] = 'Se ha agregado el item con éxito';
        }


        echo json_encode($result);
    }


    public function addProducto()
    {
        $pago_id = $this->input->post('pago-id');
        $cantidad = $this->input->post('cantidad');
        $cliente_id  = $this->input->post('cliente-id');
        $producto_id = $this->input->post('producto-id');

        $coiffeur_id = $this->input->post('coiffeur-id');

        $nombrecobro = trim($this->input->post('nombrecobro'));
		
		
		 $precio = $this->input->post('precio');
		 
		 //echo $precio;

        $result['status'] = false;
        $result['message'] = 'Error';

        if (!$aPago = \Managers\PagoManager::getInstance()->get($pago_id)) {
            if ($aCliente = \Managers\ClienteManager::getInstance()->get($cliente_id)) {
                $aPago = \Managers\PagoManager::getInstance()->getPagoCliente($aCliente);
            } else {
                if (empty($nombrecobro)){
                    $aPago = null;
                    $result['message'] = 'Cliente no encontrado';
                }else{
                    $aPago = \Managers\PagoManager::getInstance()->create();
                    $aPago->cliente = null; 
                    $aPago->nombre = $nombrecobro; 

                }
            }
        }

        if (!$aProducto = \Managers\ProductoManager::getInstance()->get($producto_id)) {
            $aPago = null;
            $result['message'] = 'Producto no encontrado';
        }

        if ($aPago) {
            $configuracion = \Managers\ConfiguracionManager::getInstance()->get(1);

            $aCoiffeur = \Managers\CoiffeurManager::getInstance()->get($coiffeur_id);

            $descuento = $aProducto->descuento_efectivo;
            $comision = ($aProducto->precio - $descuento) * ($configuracion->comision_productos / 100);

            $descripcion = $aProducto->nombre;
            //$precio = $aProducto->precio;
            $precio = $precio;
			$descuento = $descuento * $cantidad;
            $comision = $comision * $cantidad;
			$fecha = new \DateTime('now');
            $aPago->addDetallePago($descripcion, $cantidad, $precio, 'producto', $aCoiffeur, $comision, $descuento, $producto_id, $fecha);
            $aPago = \Managers\PagoManager::getInstance()->save($aPago);
            $result['status'] = true;
            $result['message'] = 'Se ha agregado el item con éxito';
        }


        echo json_encode($result);
    }

    public function editProducto()
    {
        $detallePago_id = $this->input->post('detallePago-id');
        $pago_id = $this->input->post('pago-id');
        $cantidad = $this->input->post('cantidad');
        $cliente_id  = $this->input->post('cliente-id');
        $producto_id = $this->input->post('producto-id');
		$precio = $this->input->post('precio');

        $coiffeur_id = $this->input->post('coiffeur-id');

        $result['status'] = false;
        $result['message'] = 'Error';

        if (!$aPago = \Managers\PagoManager::getInstance()->get($pago_id)) {
            if ($aCliente = \Managers\ClienteManager::getInstance()->get($cliente_id)) {
                $aPago = \Managers\PagoManager::getInstance()->getPagoCliente($aCliente);
            } else {
                $aPago = null;
                $result['message'] = 'Cliente no encontrado';
            }
        }

        if (!$aProducto = \Managers\ProductoManager::getInstance()->get($producto_id)) {
            $aPago = null;
            $result['message'] = 'Producto no encontrado';
        }

        if ($aPago) {
            $configuracion = \Managers\ConfiguracionManager::getInstance()->get(1);

            $aCoiffeur = \Managers\CoiffeurManager::getInstance()->get($coiffeur_id);

            $descuento = $aProducto->descuento_efectivo;
            $comision = ($aProducto->precio - $descuento) * ($configuracion->comision_productos / 100);

            $descripcion = $aProducto->nombre;
            $precio = $precio;
			//$precio = $aProducto->precio;
            $descuento = $descuento * $cantidad;
            $comision = $comision * $cantidad;

            //modificar el detalle y actualizar el monto total del pago
            $aDetallePago = \Managers\DetallePagoManager::getInstance()->get($detallePago_id);
            $aDetallePago->descripcion = $descripcion;
            $aDetallePago->precio = $precio;
            $aDetallePago->cantidad = $cantidad;
            $aDetallePago->descuento = $descuento;
            $aDetallePago->comision = $comision;
            $aDetallePago->producto = $aProducto;
            $aDetallePago->coiffeur = $aCoiffeur;
            $aDetallePago = \Managers\DetallePagoManager::getInstance()->save($aDetallePago);

            $subTotoal = 0;
            $total = 0;
            foreach ($aPago->detallePago as $dp) {
                $subTotoal = $dp->cantidad * $dp->precio;
                $total += $subTotoal;
            }
            $aPago->total = $total;
            //$aPago->addDetallePago($descripcion, $cantidad, $precio, 'producto', $aCoiffeur, $comision, $descuento, $producto_id);
            $aPago = \Managers\PagoManager::getInstance()->save($aPago);
            $result['status'] = true;
            $result['message'] = 'Se ha agregado el item con éxito';
        }


        echo json_encode($result);
    }

    /*public function cambiar_estado($turno_id){

        if ($aTurno = Managers\TurnoManager::getInstance()->get($turno_id)){

            $aEstadoTurno = $aTurno->estadoTurno->accion_siguiente;
            $aTurno->estadoTurno = $aEstadoTurno;

            $aTurno = Managers\TurnoManager::getInstance()->save($aTurno);
            $result["title"]   = "Estado Cambiado";
            $result["status"]  = true;
            $result["message"] = 'Se ha cambiado el estado del turno';

        }else{
            $result["title"]   = "Error";
            $result["status"]  = false;
            $result["message"] = 'No se ha podido cambiado el estado del turno';
        }

        echo json_encode($result);

    }*/

	public function eliminar_todos(){
		$result['status'] = false;
		$result['title'] = 'Error al eliminar Item';
		$result['message'] = 'Imposible eliminar el Item';

		$lote = $this->input->post('lote');
		
		
		$i =0;
		foreach ($lote as $lot){
			 if ($aDetallePago = \Managers\DetallePagoManager::getInstance()->get($lot)) {
                        
            $aPago = $aDetallePago->pago;  
            $subTotal = $aDetallePago->cantidad * $aDetallePago->precio;
            $aPago->total -= $subTotal;

            if(count($aPago->detallePago)==1){
                foreach ($aPago->turnos as $turno) {
                    $turno->estadoTurno = \Managers\EstadoTurnoManager::getInstance()->get(ESTADO_TURNO_COBRADO);
                }
                $aPago -> cobrado = true;
            }

            $aPago = \Managers\PagoManager::getInstance()->save($aPago);

            \Managers\DetallePagoManager::getInstance()->delete($aDetallePago);

            
           
        }
	}
		
			 $result["status"]  = true;
            $result["message"] = 'Se ha eliminado el item con éxito.';		
			
		

		echo json_encode($result);
	}




    public function eliminarItem($detalle_id)
    {
        $result["status"]  = false;
        $result["message"] = 'No se encontró el item';

        $tipo = $this->input->post('tipo');

        if ($aDetallePago = \Managers\DetallePagoManager::getInstance()->get($detalle_id)) {
                        
            $aPago = $aDetallePago->pago;  
            $subTotal = $aDetallePago->cantidad * $aDetallePago->precio;
            $aPago->total -= $subTotal;

            if(count($aPago->detallePago)==1){
                foreach ($aPago->turnos as $turno) {
                    $turno->estadoTurno = \Managers\EstadoTurnoManager::getInstance()->get(ESTADO_TURNO_COBRADO);
                }
                $aPago -> cobrado = true;
            }

            $aPago = \Managers\PagoManager::getInstance()->save($aPago);

            \Managers\DetallePagoManager::getInstance()->delete($aDetallePago);

            /*if(count($aPago->detallePago)==0){

            }*/

            $result["status"]  = true;
            $result["message"] = 'Se ha eliminado el item con éxito.';
        }

        echo json_encode($result);
    }


    public function addServicio()
    {
        $pago_id = $this->input->post('pago-id');
        $cantidad = $this->input->post('cantidad');
        $cliente_id  = $this->input->post('cliente-id');
        $servicio_id = $this->input->post('servicio-id');
		
		 $precio = $this->input->post('precio');

        $coiffeur_id = $this->input->post('coiffeur-id');

        $nombrecobro = trim($this->input->post('nombrecobro'));

        $result['status'] = false;
        $result['message'] = 'Error';
		
		//echo $servicio_id; die();

        if (!$aPago = \Managers\PagoManager::getInstance()->get($pago_id)) {
            if ($aCliente = \Managers\ClienteManager::getInstance()->get($cliente_id)) {
                $aPago = \Managers\PagoManager::getInstance()->getPagoCliente($aCliente);
            } else {
                if (empty($nombrecobro)){
                    $aPago = null;
                    $result['message'] = 'Cliente no encontrado';
                }else{
                    $aPago = \Managers\PagoManager::getInstance()->create();
                    $aPago->cliente = null; 
                    $aPago->nombre = $nombrecobro; 

                }
            }
        }
		
	if ($coiffeur_id != 8){		
        if (!$aServicioXCoiffeur = \Managers\ServicioXCoiffeurManager::getInstance()->get($servicio_id)) {
            $aPago = null;
            $result['message'] = 'Servicio no encontrado';
        }
	}else{
		 if (!$aServicioXCoiffeur = \Managers\ServicioXCoiffeurManager::getInstance()->get($servicio_id)) {
		 		$aServicio = \Managers\ServicioManager::getInstance()->get($servicio_id);
		 }		
	}
	       
			
        if ($aPago) {
            $configuracion = \Managers\ConfiguracionManager::getInstance()->get(1);

            $aCoiffeur = \Managers\CoiffeurManager::getInstance()->get($coiffeur_id);

			if ($coiffeur_id != 8){		
            	$descuento = $aServicioXCoiffeur->descuento_efectivo;
            	$comision = ($aServicioXCoiffeur->precio - $descuento) * ($aServicioXCoiffeur->comision / 100);
				$descripcion = $aServicioXCoiffeur->servicio->nombre;
			}else{
				if (!$aServicioXCoiffeur = \Managers\ServicioXCoiffeurManager::getInstance()->get($servicio_id)) {
					$descuento = $aServicio->precio_default - $aServicio->precio_efectivo_default;
            		$comision = 0;
					$descripcion = $aServicio->nombre;
				}else{
					$descuento = $aServicioXCoiffeur->descuento_efectivo;
            		$comision = ($aServicioXCoiffeur->precio - $descuento) * ($aServicioXCoiffeur->comision / 100);
					$descripcion = $aServicioXCoiffeur->servicio->nombre;
				
				
				}	
			}
            //$descripcion = $aServicio->nombre;
            //$precio = $aServicioXCoiffeur->precio;
			$precio = $precio;
            $descuento = $descuento * $cantidad;
            $comision = $comision * $cantidad;
			$fecha = new \DateTime('now');
			
			if ($coiffeur_id != 8){	
            $aPago->addDetallePago($descripcion, $cantidad, $precio, 'servicio', $aCoiffeur, $comision, $descuento, $aServicioXCoiffeur->servicio->id, $fecha);
			}else{
				if (!$aServicioXCoiffeur = \Managers\ServicioXCoiffeurManager::getInstance()->get($servicio_id)) {
			 		$aPago->addDetallePago($descripcion, $cantidad, $precio, 'servicio', $aCoiffeur, $comision, $descuento, $aServicio->id, $fecha);
				}else{
					$aPago->addDetallePago($descripcion, $cantidad, $precio, 'servicio', $aCoiffeur, $comision, $descuento, $aServicioXCoiffeur->servicio->id, $fecha);
				}	
			}
            $aPago = \Managers\PagoManager::getInstance()->save($aPago);
            $result['status'] = true;
            $result['message'] = 'Se ha agregado el servicio con éxito';
        }


        echo json_encode($result);
    }

    public function editServicio()
    {
        $pago_id = $this->input->post('pago-id');
        $detallePago_id = $this->input->post('detallePago-id');
        $cantidad = $this->input->post('cantidad');
        $cliente_id  = $this->input->post('cliente-id');
        $servicio_id = $this->input->post('servicio-id');

        $coiffeur_id = $this->input->post('coiffeur-id');
		
		 $precio = $this->input->post('precio');

        $result['status'] = false;
        $result['message'] = 'Error';

        if (!$aPago = \Managers\PagoManager::getInstance()->get($pago_id)) {
            if ($aCliente = \Managers\ClienteManager::getInstance()->get($cliente_id)) {
                $aPago = \Managers\PagoManager::getInstance()->getPagoCliente($aCliente);
            } else {
                $aPago = null;
                $result['message'] = 'Cliente no encontrado';
            }
        }
if ($coiffeur_id != 8){	
        if (!$aServicioXCoiffeur = \Managers\ServicioXCoiffeurManager::getInstance()->get($servicio_id)) {
            $aPago = null;
            $result['message'] = 'Servicio no encontrado';
        }
}else{
		 if (!$aServicioXCoiffeur = \Managers\ServicioXCoiffeurManager::getInstance()->get($servicio_id)) {
		 		$aServicio = \Managers\ServicioManager::getInstance()->get($servicio_id);
		 }		
	}

//$aServicio = \Managers\ServicioManager::getInstance()->get($servicio_id);
        if ($aPago) {
            $configuracion = \Managers\ConfiguracionManager::getInstance()->get(1);

            $aCoiffeur = \Managers\CoiffeurManager::getInstance()->get($coiffeur_id);
			if ($coiffeur_id != 8){		
            	$descuento = $aServicioXCoiffeur->descuento_efectivo;
            	$comision = ($aServicioXCoiffeur->precio - $descuento) * ($aServicioXCoiffeur->comision / 100);
				$descripcion = $aServicioXCoiffeur->servicio->nombre;
			}else{
				if (!$aServicioXCoiffeur = \Managers\ServicioXCoiffeurManager::getInstance()->get($servicio_id)) {
				$descuento = $aServicio->precio_default - $aServicio->precio_efectivo_default;
            	$comision = 0;
				$descripcion = $aServicio->nombre;
				}else{
				$descuento = $aServicioXCoiffeur->descuento_efectivo;
            	$comision = ($aServicioXCoiffeur->precio - $descuento) * ($aServicioXCoiffeur->comision / 100);
				$descripcion = $aServicioXCoiffeur->servicio->nombre;
				}
			}
           // $descripcion = $aServicio->nombre;
        //    $precio = $aServicioXCoiffeur->precio;
			$precio = $precio;
            $descuento = $descuento * $cantidad;
            $comision = $comision * $cantidad;

            //modificar el detalle y actualizar el monto total del pago
            $aDetallePago = \Managers\DetallePagoManager::getInstance()->get($detallePago_id);
            $aDetallePago->descripcion = $descripcion;
            $aDetallePago->precio = $precio;
            $aDetallePago->cantidad = $cantidad;
            $aDetallePago->descuento = $descuento;
            $aDetallePago->comision = $comision;
			if ($coiffeur_id == 8){
				if (!$aServicioXCoiffeur = \Managers\ServicioXCoiffeurManager::getInstance()->get($servicio_id)) {
			   	$aDetallePago->servicio = $aServicio;
			   }else{
			   	$aDetallePago->servicio = $aServicioXCoiffeur->servicio;
			   }
			 }else{
			 	$aDetallePago->servicio = $aServicioXCoiffeur->servicio;
			}  
            $aDetallePago->coiffeur = $aCoiffeur;
            $aDetallePago = \Managers\DetallePagoManager::getInstance()->save($aDetallePago);

            $subTotoal = 0;
            $total = 0;
            foreach ($aPago->detallePago as $dp) {
                $subTotoal = $dp->cantidad * $dp->precio;
                $total += $subTotoal;
            }
            $aPago->total = $total;

            //$aPago->addDetallePago($descripcion, $cantidad, $precio, 'servicio', $aCoiffeur, $comision, $descuento, $aServicioXCoiffeur->servicio->id);
            $aPago = \Managers\PagoManager::getInstance()->save($aPago);
            $result['status'] = true;
            $result['message'] = 'Se ha agregado el servicio con éxito';
        }


        echo json_encode($result);
    }

    public function getDetallePago($detalle_id)
    {
        $result["status"]  = false;
        $result["message"] = 'No se encontró el detalle';        

        if ($aDetallePago = \Managers\DetallePagoManager::getInstance()->get($detalle_id)) {
                        
            
            $result['detallePago'] = \Managers\DetallePagoManager::getInstance()->toArray($aDetallePago);
            $result["status"]  = true;
            $result["message"] = 'item con éxito.';
        }

        echo json_encode($result);
    }

}
