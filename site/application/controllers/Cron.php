<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once APPPATH."core/controllers/basecli.php";

class Cron extends BaseCLI_Controller
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

    public function __construct()
    {
        parent::__construct();

	date_default_timezone_set('America/Argentina/Buenos_Aires');
        // check login admin
    }


    /* este se ejecuta una sola vez por día */
    public function cron_avisoTurno($dotest = false)
    {

        if ($dotest){
            echo "<html><body><h1>Iniciando prueba de cron</h1>";
            echo "<p>No se enviaran notificaciones ni mails a los clientes.</p>";
        
            $aClienteNasoft = \Managers\ClienteManager::getInstance()->get(61);

            echo "<p>Cliente Nasoft: ".$aClienteNasoft->nombre.'</p>';

        }
        $aTurnosManiana = \Managers\TurnoManager::getInstance()->getTurnosManiana();



        //echo count($aTurnosManiana);
        $response = 'No hay turnos para mañana';

        if (count($aTurnosManiana)) {
            $response = 'Encontramos '.count($aTurnosManiana).' turno/s para mañana.';
            foreach ($aTurnosManiana as $turno) {
                //$playerId = ($turno->cliente->playerId)?$turno->cliente->playerId:false;

                // var_dump($turno); die();

                if ($turno->cliente){
                
                    echo $turno->cliente->email.'<br/>';

                    $nombreCliente = ($turno->cliente)?$turno->cliente->nombre:$turno->nombre;

                    $titulo = "Recordatorio Turno Diego Dap's";
                    $descripcion = $nombreCliente.' tiene turno mañana '.$turno->fecha_hora->format("H:i").' hs con '.$turno->coiffeur->nombre;
                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();
                    $aNotificacion->titulo = $titulo;
                    $aNotificacion->descripcion = $descripcion;
                    $aNotificacion->visto = false;
                    $aNotificacion->tipo = true;

                    $aNotificacion->cliente = ($turno->cliente)?$turno->cliente:null;
                    $aNotificacion->fecha = new \DateTime('now');
                    if (!$dotest){
                        $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);
                    } else {
                        $aNotificacion->cliente = $aClienteNasoft;                        
                        $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);
                    }

                    $somedata['usuario'] = $nombreCliente;
                    $somedata['cuando'] = 'mañana';
                    $somedata['fecha_hora'] = $turno->fecha_hora->format("H:i");
                    $contenido = $this->parser->parse('mails/recordatorio.tpl', $somedata, true);

                    if(!$dotest){
                        \Managers\MailManager::getInstance()->sendMail($turno->cliente->email, "Recordatorio Turno Diego Dap's", $contenido);
                    } else { 
                        \Managers\MailManager::getInstance()->sendMail('nachoalbano@gmail.com', "TEST. Recordatorio Turno Diego Dap's", $contenido);
                    }
                    
                }
            }
        }

        /* Enviamos notificaciones a los que cumple años hoy a las 00:00 */
        $tomorrow = new \DateTime('tomorrow');
        $clientesCumple = \Managers\ClienteManager::getInstance()->getCumpleanos($tomorrow);
        foreach ($clientesCumple as $aCliente){


            $titulo = '¡Feliz cumpleaños '.$aCliente->nombre.' !' ;
            $descripcion = 'Te regalamos un 20% de descuento en cualquier servicio para que salgas genial en las fotos.';
            $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();
            $aNotificacion->titulo = $titulo;
            $aNotificacion->descripcion = $descripcion;
            $aNotificacion->visto = false;
            $aNotificacion->tipo = true;
            $aNotificacion->cliente = $aCliente;
            $aNotificacion->fecha = new \DateTime('now');
            $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);


            $somedata['usuario'] = $aCliente->nombre;
            $contenido = $this->parser->parse('mails/recordatorio_cumple.tpl', $somedata, true);

            if (!$dotest){
                \Managers\MailManager::getInstance()->sendMail($aCliente->email, "Descuento por cumpleaños en Diego Dap's", $contenido);
            }

        }

        // \Managers\MailManager::getInstance()->sendMail('nachoalbano@gmail.com', "Ejecución de Recordatio de turnos de Mañana", $response);

        /*

        $result["allresponses"] = $response;
        */
        echo $response;
    }

    public function cron_avisoHoraAntes($dotest = 0)
    {	

        if ($dotest){
            echo "<html><body><h1>Iniciando prueba de cron Hora Antes</h1>";
            echo "<p>No se enviaran notificaciones ni mails a los clientes.</p>";
        
            $aClienteNasoft = \Managers\ClienteManager::getInstance()->get(61);

            echo "<p>Cliente Nasoft: ".$aClienteNasoft->nombre.'</p>';
            
           // die();
        }

        $actual = new \DateTime('now');
        $inicio = new \DateTime('now');
        $inicio->modify('+ 2 hour');
        //echo $inicio->format('Y-m-d H:00:00');
        //echo count($aTurnosManiana);

        if ($dotest){
            // $inicio = Datetime::createFromFormat('Y-m-d H:i:s', '2018-03-08 10:00:01');
            echo "<p>Hora de Consulta: ".$inicio->format('Y-m-d H:i:s')."</p>";
            echo "<p>Hora de Consulta Modificada: ".$inicio->format('Y-m-d H:i:s')."</p>";   
        }

        $aTurnos = \Managers\TurnoManager::getInstance()->getTurnosHoraAntes($inicio);
        
        $response = 'No hay turnos para hoy';
        if (count($aTurnos)) {
            $response = '';
            foreach ($aTurnos as $turno) {

                if ($turno->cliente){


                    $nombreCliente = ($turno->cliente)?$turno->cliente->nombre:$turno->nombre;
                    $titulo = 'Recordatorio de turno';
                    $descripcion = 'Hola '.$nombreCliente.', hoy tenés un turno a las '.$turno->fecha_hora->format("H:i").' hs con '.$turno->coiffeur->nombre;

                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();
                    $aNotificacion->titulo = $titulo;
                    $aNotificacion->descripcion = $descripcion;
                    $aNotificacion->visto = false;
                    $aNotificacion->tipo = true;
                    $aNotificacion->cliente = ($turno->cliente)?$turno->cliente:null;
                    $aNotificacion->fecha = new \DateTime('now');

                    if (!$dotest){
                        $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);
                    } else {
                        $aNotificacion->cliente = $aClienteNasoft;                        
                        $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);
                    }

                    $somedata['usuario'] = $nombreCliente;
                    $somedata['cuando'] = 'hoy';
                    $somedata['fecha_hora'] = $turno->fecha_hora->format("H:i");
                    $contenido = $this->parser->parse('mails/recordatorio.tpl', $somedata, true);

                    if(!$dotest){
                        \Managers\MailManager::getInstance()->sendMail($turno->cliente->email, "Recordatorio Turno Diego Dap's", $contenido);
                    }
                    
                    $response .= "\n".' / Hola '.$nombreCliente.', hoy tenés un turno a las '.$turno->fecha_hora->format("H:i").' hs con '.$turno->coiffeur->nombre;
                }
            }
        }
        $response .= "\n".' / Fecha de ejecucion cron: '.$actual->format('d/m/Y H:i:s');
        $response .= "\n".' / Fecha de ejecucion cron + 2 horas: '.$inicio->format('d/m/Y H:i:s');
        /*
        $result["allresponses"] = $response;
        */

        //\Managers\MailManager::getInstance()->sendMail('nachoalbano@gmail.com', "Ejecución de Recordatio de turnos de 2 Horas Antes", $response);
 
        echo $response;
    }


    public function cron_desbloqueo()
    {           

        $actual = new \DateTime('now');
                
        $aClientesaDesbloquear = \Managers\ClienteManager::getInstance()->getClientesaDesbloquear($actual);
        
        $response = 'No hay clientes a desbloquear';
        if (count($aClientesaDesbloquear)) {
            $response = '';
            foreach ($aClientesaDesbloquear as $cliente) {

                //desbloquear cliente
                $cliente->bloqueado = 0;
                $cliente->fecha_bloqueo = null;
                $cliente->fecha_desbloqueo = null;

                $cliente = \Managers\ClienteManager::getInstance()->save($cliente);
                
                $response .= "\n".' / Cliente: '.$cliente->nombre.', ha sido desbloqueado';
                
            }
            
        }

        $response .= "\n".' / Fecha de ejecucion cron: '.$actual->format('d/m/Y H:i:s');
        
        echo $response;
    }


    public function cron_jobi()
    {

        /*$aComprasVencidas = Managers\CompraManager::getInstance()->getComprasVencidasXFecha();
        $result = array();
        foreach ($aComprasVencidas as $cv) {
            //var_dump($cv->fecha_vencimiento);
            $creditos_vencidos = $cv->creditos-$cv->creditos_usados;
            if($creditos_vencidos > 0){

                $result[$cv->usuario->id]['objeto'] = $cv->usuario;
                if(isset($result[$cv->usuario->id]['creditos'])){
                    $result[$cv->usuario->id]['creditos'] += $creditos_vencidos;
                }else{
                    $result[$cv->usuario->id]['creditos'] = $creditos_vencidos;
                }
                $result[$cv->usuario->id]['compras'][] = $cv;

            }


        }

        foreach ($result as $r) {

            $usuario = $r['objeto'];
            $compras = $r['compras'];
            $creditos_vencidos = $r['creditos'];

                if(count($usuario->cuentas)>0){
                    $saldo = $usuario->cuentas->first()->saldo;
                }else{
                    $saldo = 0;
                }

                $aCuenta = Managers\CuentaManager::getInstance()->create();
                $aCuenta->usuario = $usuario;
                $aCuenta->tipo_movimiento = 'Vencimiento';
                $aCuenta->debe = $creditos_vencidos;
                $aCuenta->haber = 0;

                $aCuenta->saldo = $saldo - $creditos_vencidos;

                $aCuenta = Managers\CuentaManager::getInstance()->save($aCuenta);

                foreach ($compras as $c) {

                    $c->cuenta_vencido = $aCuenta;
                    $c = Managers\CompraManager::getInstance()->save($cv);

                }

        }

        Managers\CompraManager::getInstance()->setComprasVencidasXFecha();*/

        $contenido = 'texto de prueba';

        \Managers\MailManager::getInstance()->sendMail('ighirlanda@gmail.com', "Prueba cron Diego Dap's", $contenido);

        echo 'Comando Ejecutado Daps!! ';
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
