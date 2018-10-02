<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH."core/controllers/base.php";

class Turnos extends Base_Controller
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
        if (!$this->actualUser) {
            redirect('login');
        }
    }


    public function index()
    {
        if ($this->actualUser) {
            $diaActual = new DateTime('now');
            $this->data['turnosProximos'] = \Managers\TurnoManager::getInstance()->getByClienteProximos($this->actualUser, $diaActual);
            $this->parser->parse('turnos/tus-turnos.tpl', $this->data);
        } else {
            redirect('login');
        }
    }

    public function nuevo_turno($canje = false)
    {
        if ($this->actualUser) {
            $this->data['mainSecctionId'] = 'nuevo-turno';
            $this->data['hideSidebar'] = true;
            $this->data['canje'] = $canje;
            $this->data['servicios'] = Managers\ServicioManager::getInstance()->getAllEnApp();
            $this->parser->parse('turnos/form.tpl', $this->data);
        } else {
            redirect('login');
        }
    }

    public function editar_turno($turno_id)
    {
        if ($this->actualUser) {
            $this->data['mainSecctionId'] = 'nuevo-turno';
            $this->data['hideSidebar'] = true;

            if (isset($_SERVER['HTTP_REFERER'])) {
                $this->data['referer'] = $_SERVER['HTTP_REFERER'];
            }

            $this->data['servicios'] = Managers\ServicioManager::getInstance()->getAllEnApp();
            $this->data['aTurno'] = Managers\TurnoManager::getInstance()->get($turno_id);
            $this->parser->parse('turnos/editar.tpl', $this->data);
        } else {
            redirect('login');
        }
    }

    public function editar_turno_paso_2($turno_id)
    {
        if ($this->actualUser) {
            $this->data['mainSecctionId'] = 'nuevo-turno';
            $this->data['hideSidebar'] = true;

            if (isset($_SERVER['HTTP_REFERER'])) {
                $this->data['referer'] = $_SERVER['HTTP_REFERER'];
            }

            $this->data['servicios'] = Managers\ServicioManager::getInstance()->getAllEnApp();
            $this->data['aTurno'] = Managers\TurnoManager::getInstance()->get($turno_id);

            $this->parser->parse('turnos/form.tpl', $this->data);
        } else {
            redirect('login');
        }
    }

    public function ver($turno_id)
    {
        if ($this->actualUser) {

            //$this->data['mainSecctionId'] = 'editar-turno';
            $this->data['hideSidebar'] = true;
            if (isset($_SERVER['HTTP_REFERER'])) {
                $this->data['referer'] = $_SERVER['HTTP_REFERER'];
            }
            $this->data['aTurno'] = Managers\TurnoManager::getInstance()->get($turno_id);

            $this->parser->parse('profile/historia-ficha.tpl', $this->data);
        } else {
            redirect('login');
        }
    }

    public function eliminar($turno_id)
    {
        $result['status'] = false;
        $result['title'] = 'Algo anda mal';
        $result['message'] = 'No podemos cancelar el turno. Intentá más tarde.';
        $result["referer"] = $_SERVER['HTTP_REFERER'];
        $diaActual = new DateTime('now');

        if ($this->actualUser) {
            if ($aTurno = Managers\TurnoManager::getInstance()->get($turno_id)) {
                if ($aTurno->fecha_hora > $diaActual) {

                    $aConfig = \Managers\ConfiguracionManager::getInstance()->get(1);
                    $horaLimite = clone $aTurno->fecha_hora;
                    $horaLimite->modify('- '.$aConfig->cancelar_antes.' minutes');
                    //var_dump($horaLimite); die();
                    $fecha_desbloqueo = clone $diaActual;
                    $fecha_desbloqueo->modify('+ '.$aConfig->dias_bloqueado.' days');
                    if($diaActual > $horaLimite){
                        
                        //$aConfig->dias_bloqueado;
                        $aEstado = Managers\EstadoTurnoManager::getInstance()->get(ESTADO_TURNO_AUSENCIA); //Estado Cancelado
                        if($aTurno->cliente){
                            $aTurno->cliente->bloqueado = true;
                            $aTurno->cliente->fecha_bloqueo = $diaActual;
                            $aTurno->cliente->fecha_desbloqueo = $fecha_desbloqueo;
                        }
                    }else{
                        $aEstado = Managers\EstadoTurnoManager::getInstance()->get(ESTADO_TURNO_ANULADO); //Estado Cancelado
                    }
                    
                    $aTurno->estadoTurno = $aEstado;

                    //si el turno fue canjeado, se devuelven los puntos
                    if ($aTurno->canjeado) {
                        $this->actualUser->puntos_acumulados = $this->actualUser->puntos_acumulados + $aTurno->canjeado_puntos;
                        Managers\ClienteManager::getInstance()->save($this->actualUser);
                    }

                    $aTurno = Managers\TurnoManager::getInstance()->save($aTurno);

                    $fecha = new DateTime('now');
                    //agregar notificacion para el Back de turno
                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();

                    //$aNotificacion->titulo = 'El cl '.$aTurno->fecha_hora->format('d-m').' a las '.$aTurno->fecha_hora->format('H:i').' fue cancelado';
                    //$aNotificacion->descripcion = 'Podés sacar uno nuevo o comunicarte con nosotros para reprogramarlo.';

                    $aNotificacion->titulo = 'Turno cancelado';
                    $aNotificacion->descripcion = 'Cliente: '.$aTurno->cliente->nombre.'- Fecha: '. $aTurno->fecha_hora->format('Y-m-d H:i');

                    $aNotificacion->tipo = false;

                    $aNotificacion->cliente = $this->actualUser;
                    $aNotificacion->fecha = $fecha;
                    $aNotificacion->visto = false;
                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);

                    $aUsuarios = \Managers\UsuarioManager::getInstance()->getAll();

                    foreach ($aUsuarios as $us) {
                        $aNotificacionXUsuario = \Managers\NotificacionXUsuarioManager::getInstance()->create();
                        $aNotificacionXUsuario->notificacion = $aNotificacion;
                        $aNotificacionXUsuario->usuario = $us;
                        $aNotificacionXUsuario->visto = false;
                        $aNotificacionXUsuario->fecha = $fecha;
                        $aNotificacionXUsuario = \Managers\NotificacionXUsuarioManager::getInstance()->save($aNotificacionXUsuario);
                    }

                    $result["title"]   = "Turno cancelado";
                    $result["status"]  = true;
                    $result["message"] = '¡Te esperamos otro día!';
                } else {
                    $result["message"] = 'El día que elegiste es anterior a la fecha actual.';
                }
            }
        } else {
            $result['title'] = 'Error de permisos';
        }

        echo json_encode($result);
    }


    public function cargarHorarios($servicio_id, $coiffeur_id, $fechaPedida)
    {
        $startDate = Datetime::createFromFormat('Y-m-d H:i:s', $fechaPedida.' 00:00:00');
        $endDate = Datetime::createFromFormat('Y-m-d H:i:s', $this->input->post('end').' 00:00:00');

        $diaActual = new DateTime('now');
        $diaDeSemanaActual = $startDate->format('N');

        //$diaDeSemanaActual = $diaDeSemanaPedido;
        //var_dump($diaDeSemanaActual); die();
        $turnos = array();

        $aServicio = Managers\ServicioManager::getInstance()->get($servicio_id);
        $aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id);

        $aTurnoDate = $startDate;
        //for ($diaId = 1; $diaId <= 7; $diaId++){
            $aDay = \Managers\DiaSemanaManager::getInstance()->get($diaDeSemanaActual);
            //$horariosDia = \Managers\HorarioDeAtencionManager::getInstance()->getByDia($aDay);
            //$horariosDia = \Managers\HorarioDeAtencionXCoiffeurManager::getInstance()->getByDia($aDay, $aCoiffeur);
            $horariosDia = \Managers\MainManager::getInstance()->getByDia($startDate, $aDay, $aCoiffeur);

        foreach ($horariosDia as $aHorario) {
            $fechaInicio = Datetime::createFromFormat('Y-m-d H:i:s', $aTurnoDate->format('Y-m-d').' '.$aHorario->horaDesde->format('H:i:s'));
            $fechaFin = Datetime::createFromFormat('Y-m-d H:i:s', $aTurnoDate->format('Y-m-d').' '.$aHorario->horaHasta->format('H:i:s'));
            $fecha_inicio_aux = Datetime::createFromFormat('Y-m-d H:i:s', $aTurnoDate->format('Y-m-d').' '.$aHorario->horaDesde->format('H:i:s'));

            $continuar = true;
            while ($continuar == true) {
                $fechaInicioAux = Datetime::createFromFormat('Y-m-d H:i:s', $fechaInicio->format('Y-m-d H:i:s'));

                $horaFinDeturno = clone $fechaInicioAux; 
                $horaFinDeturno->modify('+ '.$aServicio->duracion_total.' minutes');

                $aTurno = array(
                        'title' => 'Libre',
                        'start' => $fechaInicio->format('H:i'),
                        //'end' => $fechaInicio->modify('+ '.$aServicio->duracion.' minutes')->format('Y-m-d\TH:i:s'),
                        'end' => $fechaInicio->modify('+ '.$aServicio->division_grilla.' minutes')->format('Y-m-d\TH:i:s'),
                        'fecha_turno' => $fechaInicioAux->format('YmdHis'),
                        //'color' => COLOR_TURNO_DISPONIBLE,
                        'textColor' => '#000',
                        'className' => 'disponible'
                    );

                $fechaInicioConsulta = $fechaInicioAux;
                $fechaFinConsulta    = $fechaInicio;

                $coiffeurDisponible = \Managers\CoiffeurManager::getInstance()->estaDisponible($fechaInicioConsulta, $fechaFinConsulta, $aCoiffeur);

                $clienteDisponible = \Managers\ClienteManager::getInstance()->estaDisponible($fechaInicioConsulta, $fechaFinConsulta, $this->actualUser);

                if (!$coiffeurDisponible) {
                    $aTurno['className'] = 'nodisponible';
                    $aTurno['title'] = '';
                    $aTurno['disponible'] = false;
                } elseif (!$clienteDisponible) {
                    $aTurno['className'] = 'nodisponible';
                    $aTurno['title'] = '';
                    $aTurno['disponible'] = false;
                }

                if ($turnoOcupado = \Managers\TurnoManager::getInstance()->getByFecha($aServicio, $aCoiffeur, $fechaInicioAux)) {
                    //var_dump($turnoOcupado[0]->id);

                        if (($turnoOcupado[0]->cliente)) {
                            if (($this->actualUser) && (($turnoOcupado[0]->cliente) && ($turnoOcupado[0]->cliente->id == $this->actualUser->id))) {
                                $aTurno['id'] = $turnoOcupado[0]->id;
                                $aTurno['title'] = 'Reservaste este turno';
                                //$aTurno['color'] = COLOR_TURNO_RESERVADO;
                                $aTurno['className'] = 'btn-danger reservado';
                            } else {
                                $aTurno['title'] = 'No Disponible';
                                //$aTurno['color'] = COLOR_TURNO_OCUPADO;
                                $aTurno['className'] = 'nodisponible';
                            }
                        } else {
                            $aTurno['title'] = 'No Disponible';
                            //$aTurno['color'] = COLOR_TURNO_OCUPADO;
                            $aTurno['className'] = 'nodisponible';
                        }
                }

                //var_dump($fechaInicioAux->format("Y-m-d H:i:s") .' / '.date("Y-m-d H:i:s"));
                if ($fechaInicioAux->format("Y-m-d H:i:s")<date("Y-m-d H:i:s")) {
                    //$aTurno['color'] = COLOR_TURNO_NO_DISPONIBLE;
                    $aTurno['className'] = 'nodisponible';
                    $aTurno['title'] = '';
                    $aTurno['en_fecha'] = false;
                } else {
                    $aTurno['en_fecha'] = true;
                }

                 //if (($horaFinDeturno <= $fechaFin)){
                if (!$aCoiffeur->estaAusente($fechaInicioAux) && ($horaFinDeturno <= $fechaFin)){
                    $turnos[$fechaInicioAux->format("H")]['Turnos'][] = $aTurno;
                    $turnos[$fechaInicioAux->format("H")]['Hora'] = $fechaInicioAux->format("H");
                }

                $continuar = ($fechaInicio >= $fechaFin)?false:true;
            } //end while
        }//end foreach


        //	$aTurnoDate->modify('+ 1 days');

        //}
        $jsonTurnos = array();
        foreach ($turnos as $aTurno) {
            $jsonTurnos[] = $aTurno;
        }

        //echo "<pre>", print_r($jsonTurnos), "</pre>"; die();
        //$turnos = array('Turnos' => $turnos );
        echo json_encode($jsonTurnos);
    }


    public function confirmar_turno_1($id_servicio, $id_coiffeur, $fecha, $turno_id = null)
    {
        $aCoiffeur = Managers\CoiffeurManager::getInstance()->get($id_coiffeur);
        $aServicio = Managers\ServicioManager::getInstance()->get($id_servicio);
        setlocale(LC_ALL, "es_ES");
        $fecha = Datetime::createFromFormat('YmdHis', $fecha);

        if ($turno_id) {
            $aTurno = Managers\TurnoManager::getInstance()->get($turno_id);
        } else {
            $aTurno = null;
        }

        $coiffeurs = array();
        $coiffeurs['bloqueado'] = false;
        //var_dump($this->actualUser->bloqueado); die();
        if(!$this->actualUser->bloqueado){

            if ((!$tieneTurno = \Managers\TurnoManager::getInstance()->tieneTurno($aServicio, $fecha, $this->actualUser)) || (($aTurno) && (!$aTurno->editado))) {
                if ($turnoOcupado = \Managers\TurnoManager::getInstance()->getByFecha($aServicio, $aCoiffeur, $fecha)) {
                    $coiffeurs['espera'] = true;
                    $coiffeurs['status'] = false;
                } else {
                    $coiffeurs['espera'] = false;
                    $coiffeurs['status'] = true;
                }

                $coiffeurs['servicio'] = $aServicio->nombre;
                $coiffeurs['coiffeur'] = $aCoiffeur->nombre;
                $coiffeurs['fecha'] = $fecha->format('Y-m-d H:i:s');
                $coiffeurs['fecha_sola'] = $fecha->format('d \d\e F \d\e Y');
                $coiffeurs['hora_sola'] = $fecha->format('H:i');
                
            } else {
                if (($aTurno) && ($aTurno->editado)) {
                    $coiffeurs['statusEdicion'] = true;
                }
                $coiffeurs['status'] = false;
                $coiffeurs['message'] = 'No podés reservar más de un turno por servicio en el día. Por favor, elegí otro día';
            }

        } else {
            $coiffeurs['status'] = false;
            $coiffeurs['bloqueado'] = true;
            $coiffeurs['message'] = 'No podés reservar turnos. <br> Estás bloqueado por la ausencia del día '.$this->actualUser->fecha_bloqueo->format('d/m/Y').'.<br> Podrás volver a sacar turnos a partir del día '.$this->actualUser->fecha_desbloqueo->format('d/m/Y'). '. <br>Si desea sacar un turno, comuníquese telefónicamente al (0223) 491-7396.';
        }

        $result['coiffeurs'] = $coiffeurs;
        echo json_encode($result);
    }

    public function confirmar_turno_2()
    {
        $result["title"]   = "Error";
        $result["status"]  = false;
        $result["message"] = 'No pudimos confirmar el turno. Intentá más tarde.';

        $id_servicio = trim($this->input->post('servicio_id'));
        $id_coiffeur = trim($this->input->post('coiffeur_id'));
        $fecha = trim($this->input->post('fecha_turno'));
        $turno_id = trim($this->input->post('turno_id'));
        $puntos = trim($this->input->post('puntos_servicio'));

        $aCoiffeur = Managers\CoiffeurManager::getInstance()->get($id_coiffeur);
        $aServicio = Managers\ServicioManager::getInstance()->get($id_servicio);
        //$fecha_fin_tope = new DateTime($fecha);
        $fecha = Datetime::createFromFormat('YmdHis', $fecha);

        //agregar notificacion para el Back de turno
        $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();

        if(!$this->actualUser->bloqueado){
            if ($aTurno = Managers\TurnoManager::getInstance()->get($turno_id)) {
                if (!$aTurno->editado) {
                    $aTurno->coiffeur = $aCoiffeur;
                    $aTurno->servicio = $aServicio;
                    $aTurno->fecha_hora = $fecha;
                    $aTurno->editado = true;

                    $aTurno = Managers\TurnoManager::getInstance()->save($aTurno);

                    ///noti

                    $aNotificacion->titulo = 'Turno modificado';
                    $aNotificacion->descripcion = 'Cliente:'.$aTurno->cliente->nombre.'-  Fecha:'. $fecha->format('d-m H:i');

                    $result["title"]   = "Ya modificamos tu turno";
                    $result["status"]  = true;
                    $result["message"] = 'En el caso de no poder asistir, recordá cancelarlo.';
                } else {
                    $result["title"]   = "No podemos modificar tu turno";
                    $result["status"]  = false;
                    $result["statusEdicion"]  = true;
                    $result["message"] = 'No podés editarlo más de una vez. Podés elegir un turno para otro día.';
                }
            } else {
                if (!$tieneTurno = \Managers\TurnoManager::getInstance()->tieneTurno($aServicio, $fecha, $this->actualUser)) {
                    if ($turnoOcupado = \Managers\TurnoManager::getInstance()->getByFecha($aServicio, $aCoiffeur, $fecha)) {
                        //var_dump($turnoOcupado[0]->prioridad); die();
                        $prioridad = $turnoOcupado[0]->prioridad+1;
                    } else {
                        $prioridad = 0;
                    }

                    $aTurno =  \Managers\TurnoManager::getInstance()->create();
                    $aEstado = Managers\EstadoTurnoManager::getInstance()->get(ESTADO_TURNO_ASIGNADO); //Estado Reservado

                    $aTurno->coiffeur = $aCoiffeur;
                    $aTurno->estadoTurno = $aEstado;
                    $aTurno->servicio = $aServicio;
                    $aTurno->cliente = $this->actualUser;
                    $aTurno->prioridad = $prioridad;
                    $aTurno->fecha_hora = $fecha;

                    if ($puntos>0) {
                        $aTurno->canjeado = true;
                        $aTurno->canjeado_puntos = $puntos;
                        //resto los puntos canjeados al cliente
                        $this->actualUser->puntos_acumulados = $this->actualUser->puntos_acumulados - $puntos;
                        Managers\ClienteManager::getInstance()->save($this->actualUser);
                    }

                    $aTurno = Managers\TurnoManager::getInstance()->save($aTurno);

                    ///noti
                    $aNotificacion->titulo = 'Nueva reserva de turno';
                    $aNotificacion->visto = false;
                    $aNotificacion->descripcion = 'Cliente:'.$aTurno->cliente->nombre.'-  Fecha:'. $fecha->format('d-m H:i');

                    $result["title"]   = "¡Genial!";
                    $result["status"]  = true;
                    $result["message"] = 'Ya agendamos tu turno. ¡Te esperamos!';
                } else {
                    $result["status"]  = false;
                    $result["message"] = 'No puede reservar más de un turno por servicio en el día. Elegí otra fecha.';
                    echo json_encode($result);
                    die();
                }
            }

            //noti
            $fecha_noti = new DateTime('now');
            $aNotificacion->tipo = false;
            $aNotificacion->cliente = $this->actualUser;
            $aNotificacion->fecha = $fecha_noti;
            $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);

            $aUsuarios = \Managers\UsuarioManager::getInstance()->getAll();

            foreach ($aUsuarios as $us) {
                $aNotificacionXUsuario = \Managers\NotificacionXUsuarioManager::getInstance()->create();
                $aNotificacionXUsuario->notificacion = $aNotificacion;
                $aNotificacionXUsuario->usuario = $us;
                $aNotificacionXUsuario->visto = false;
                $aNotificacionXUsuario->fecha = $fecha_noti;
                $aNotificacionXUsuario = \Managers\NotificacionXUsuarioManager::getInstance()->save($aNotificacionXUsuario);
            }

        } else {
            $result["status"]  = false;
            $result["message"] = 'No podés reservar turnos. <br> Estás bloqueado por la ausencia del día '.$this->actualUser->fecha_bloqueo->format('d/m/Y').'.<br> Podrás volver a sacar turnos a partir del día '.$this->actualUser->fecha_desbloqueo->format('d/m/Y'). '. <br>Si desea sacar un turno, comuníquese telefónicamente al (0223) 491-7396.';
            
            echo json_encode($result);
            die();
        }

        echo json_encode($result);
    }

    public function checkCancelacion($turnoId){

        $result["status"]  = true;
        $fechaActual = new \Datetime('now');

        if($aTurno = \Managers\TurnoManager::getInstance()->get($turnoId)){

            $aConfig = \Managers\ConfiguracionManager::getInstance()->get(1);
            $horaLimite = clone $aTurno->fecha_hora;
            $horaLimite->modify('- '.$aConfig->cancelar_antes.' minutes');
            //var_dump($horaLimite); die();
            if($fechaActual > $horaLimite){
                $result["status"]  = false;                
                $result["dias"]  = $aConfig->dias_bloqueado;
            }

        }

        echo json_encode($result);

    }


}
