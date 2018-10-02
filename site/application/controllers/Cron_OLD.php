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

        // check login admin
    }


    /* este se ejecuta una sola vez por día */
    public function cron_avisoTurno()
    {
        $aTurnosManiana = \Managers\TurnoManager::getInstance()->getTurnosManiana();
        //echo count($aTurnosManiana);
        $response = 'No hay turnos para mañana';

        if (count($aTurnosManiana)) {
            foreach ($aTurnosManiana as $turno) {
                //$playerId = ($turno->cliente->playerId)?$turno->cliente->playerId:false;

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
                $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);

                $somedata['usuario'] = $nombreCliente;
                $somedata['cuando'] = 'mañana';
                $somedata['fecha_hora'] = $turno->fecha_hora->format("H:i");
                $contenido = $this->parser->parse('mails/recordatorio.tpl', $somedata, true);

                if($turno->cliente)
                    \Managers\MailManager::getInstance()->sendMail($turno->cliente->email, "Recordatorio Turno Diego Dap's", $contenido);
                //echo 'titulo: '.$titulo.' / descripcion: '.$descripcion;

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

            \Managers\MailManager::getInstance()->sendMail($aCliente->email, "Descuento por cumpleaños en Diego Dap's", $contenido);
            //echo 'titulo: '.$titulo.' / descripcion: '.$descripcion;


        }

        /*

        $result["allresponses"] = $response;
        */
        echo $response;
    }

    public function cron_avisoHoraAntes()
    {
        $actual = new \DateTime('now');
        $inicio = new \DateTime('now');
        $inicio->modify('- 1 hour');
        //echo $inicio->format('Y-m-d H:00:00');
        $aTurnos = \Managers\TurnoManager::getInstance()->getTurnosHoraAntes($inicio);
        //echo count($aTurnosManiana);
        
        $response = 'No hay turnos para hoy';
        if (count($aTurnos)) {
            $response = '';
            foreach ($aTurnos as $turno) {

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
                $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);

                $somedata['usuario'] = $nombreCliente;
                $somedata['cuando'] = 'hoy';
                $somedata['fecha_hora'] = $turno->fecha_hora->format("H:i");
                $contenido = $this->parser->parse('mails/recordatorio.tpl', $somedata, true);

                if($turno->cliente)
                    \Managers\MailManager::getInstance()->sendMail($turno->cliente->email, "Recordatorio Turno Diego Dap's", $contenido);
                //echo 'titulo: '.$titulo.' / descripcion: '.$descripcion;

                $response .= "\n".' / Hola '.$nombreCliente.', hoy tenés un turno a las '.$turno->fecha_hora->format("H:i").' hs con '.$turno->coiffeur->nombre;
            }
        }
        $response .= "\n".' / Fecha de ejecucion cron: '.$actual->format('d/m/Y H:i:s');
        $response .= "\n".' / Fecha de ejecucion cron + 2 horas: '.$inicio->format('d/m/Y H:i:s');
        /*

        $result["allresponses"] = $response;
        */
        echo $response;
    }



    public function cron_job()
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

        echo 'Comando Ejecutado Daps!! ';
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
