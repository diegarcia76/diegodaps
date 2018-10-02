<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH."core/controllers/base_admin.php";

class Turnos extends BaseAdmin_Controller
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
    private $parsePath = 'admin/turnos/';

    public function __construct()
    {
        parent::__construct();
        $this->data['menuactive'] = 'turnos';
        //$this->data['pageSubtitle'] = 'Turnos';
        //$this->data['accesos'] = $this->session->userdata('permisosLogin');
    }

    public function index()
    {
        //die();
        $breadcrumb = array();
        $breadcrumb['Dashboard'] = $this->controller_url('admin');
        //$breadcrumb['Agregar nuevo Usuario'] = $this->controller_url('admin/usuarios/add');
        $this->data['breadcrumb'] = $breadcrumb;

        $diaActual = new DateTime('now');

        //$this->data['turnosHoy'] = \Managers\TurnoManager::getInstance()->getByDia($diaActual);
        $this->data['aCoiffeurs'] = \Managers\CoiffeurManager::getInstance()->getActiveAll();

        $this->data['submenuactive'] = '';
        $this->parser->parse($this->parsePath.'dashboard.tpl', $this->data);
    }

    public function getTurnosOcupados(){

        function ordenarHoras($a,$b){
            if ($a['start'] == $b['start']) {
                return 0;
            }
            return ($a['start'] > $b['start']) ? +1 : -1;
        }

        $fechaPedida = $this->input->post('fecha');


        $result['status'] = false;
        $result['message'] = 'Turnos por coiffeur';
        $result['coiffeurs'] = array();
        $result['hora_min'] = 0;
        $result['hora_max'] = 24;



        $startDate = Datetime::createFromFormat('Y-m-d H:i:s', $fechaPedida.' 00:00:00');
        //$endDate = Datetime::createFromFormat('Y-m-d H:i:s', $this->input->post('end').' 00:00:00');

       
        $diaActual = new DateTime('now');
        $diaDeSemanaActual = $startDate->format('N');

        //$diaDeSemanaActual = $diaDeSemanaPedido;
        //var_dump($diaDeSemanaActual); die();
        $coifferes = array();

        $aCoiffeurs = Managers\CoiffeurManager::getInstance()->getActiveAll();
        
        $aTurnoDate = $startDate;
        //for ($diaId = 1; $diaId <= 7; $diaId++){
        $aDay = \Managers\DiaSemanaManager::getInstance()->get($diaDeSemanaActual);

        $horaMin = clone $startDate;
        $horaMin->modify('+1 day');
        $horaMax = clone $startDate;
        

        //$horaMinMax = \Managers\HorarioDeAtencionXCoiffeurManager::getInstance()->getMinMaxByDia($diaDeSemanaActual);
        $horaMinMax = \Managers\MainManager::getInstance()->getMinMaxByDia($startDate);
        $result['hora_min'] = $horaMinMax[0];
        $result['hora_max'] = $horaMinMax[1];

        //print_r($result); die();
        foreach ($aCoiffeurs as $aCoiffeur) {

            $turnos = array();            

            $turnosOcupados = \Managers\TurnoManager::getInstance()->getByDiaByCoiffeur($aCoiffeur, $startDate);

            if (count($turnosOcupados) > 0) {
                foreach ($turnosOcupados as $turnoOcupado) {


                        $aTurno = array(
                            'cliente' => ($turnoOcupado->cliente)?$turnoOcupado->cliente->nombre:$turnoOcupado->nombre,
                            'telefono' => ($turnoOcupado->cliente)?(($turnoOcupado->cliente->telefono)?$turnoOcupado->cliente->telefono:'Sin teléfono'):(($turnoOcupado->telefono)?$turnoOcupado->telefono:'Sin teléfono'),
                            'id' => $turnoOcupado->id,
                            'servicio' => $turnoOcupado->servicio->nombre,
                            'start' => $turnoOcupado->fecha_hora->format('H:i'),
                          //  'end' => $turnoOcupado->fecha_hora->modify('+ '.$turnoOcupado->servicio->duracion.' minutes')->format('Y-m-d\TH:i:s'),
                            'fecha_turno' => $startDate->format('YmdHis'),
                            'textColor' => '#000',
                            'prioridad' => $turnoOcupado->prioridad,
                            'className' => $turnoOcupado->estadoTurno->className
                        );

                        $turnos[$turnoOcupado->fecha_hora->format("H")][$aCoiffeur->id][] = $aTurno;
                        $turnos[$turnoOcupado->fecha_hora->format("H")]['Hora'] = $turnoOcupado->fecha_hora->format("H");

                }
            } 



            $jsonTurnos = array();
            foreach ($turnos as $aTurno) {
                $jsonTurnos[$aTurno['Hora']] = $aTurno[$aCoiffeur->id];
            }

            foreach ($jsonTurnos as $key => $value) {
                usort($value, "ordenarHoras");
                $jsonTurnos[$key] = $value;

            }

            $coifferes[$aCoiffeur->id] = array(
                                            'nombre' => $aCoiffeur->nombre,
                                            'horas' => $jsonTurnos,
                                            'id' => $aCoiffeur->id
                                            );

        }


        $result['status'] = true;
        $result['coiffeurs'] = $coifferes;
//      $result['hora_min'] = $horaMin->format('G');
 //     $result['hora_max'] = $horaMax->format('G');


        //  $aTurnoDate->modify('+ 1 days');

        //}
        

        // echo "<pre>", print_r($result), "</pre>"; die();
        //$turnos = array('Turnos' => $turnos );
        echo json_encode($result);        
    }

    public function cargarHorarios($coiffeur_id, $fechaPedida)
    {
        $startDate = Datetime::createFromFormat('Y-m-d H:i:s', $fechaPedida.' 00:00:00');
        //$endDate = Datetime::createFromFormat('Y-m-d H:i:s', $this->input->post('end').' 00:00:00');

        $diaActual = new DateTime('now');
        $diaDeSemanaActual = $startDate->format('N');

        //$diaDeSemanaActual = $diaDeSemanaPedido;
        //var_dump($diaDeSemanaActual); die();
        $turnos = array();
        $aTurno = array();

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

            $continuar = true;
            while ($continuar == true) {
                $fechaInicioAux = Datetime::createFromFormat('Y-m-d H:i:s', $fechaInicio->format('Y-m-d H:i:s'));
                    /*$aTurno = array(
                        'title' => 'Libre',
                        'start' => $fechaInicio->format('H:i'),
                        'end' => $fechaInicio->modify('+ '.$aServicio->duracion.' minutes')->format('Y-m-d\TH:i:s'),
                        'fecha_turno' => $fechaInicioAux->format('YmdHis'),
                        'color' => COLOR_TURNO_DISPONIBLE,
                        'textColor' => '#000',
                        'className' => 'label-success btn-success'
                    );*/
                    //var_dump($fechaFin->format('Y-m-d\TH:i:s'));
                    $turnos[$fechaInicioAux->format("H")]['Hora'] = $fechaInicioAux->format("H");
                if ($turnoOcupado = \Managers\TurnoManager::getInstance()->getByFechaByCoiffeur($aCoiffeur, $fechaInicioAux)) {
                    //var_dump($turnoOcupado[0]->id); die();
                        foreach ($turnoOcupado as $to) {
                            /*switch ($to->estadoTurno->id){
                                case 1: $colorin = COLOR_TURNO_RESERVADO; break;
                                case 2: $colorin = COLOR_TURNO_CANCELADO; break;
                                case 3: $colorin = COLOR_TURNO_PENDIENTE; break;
                                case 4: $colorin = COLOR_TURNO_SERVICIO; break;
                                case 5: $colorin = COLOR_TURNO_TERMINADO; break;
                                case 6: $colorin = COLOR_TURNO_RECEPCIONADO; break;
                                case 7: $colorin = COLOR_TURNO_COBRADO; break;
                            }*/
                            $aTurno = array(
                                'cliente' => $to->cliente->nombre,
                                'id' => $to->id,
                                'servicio' => $to->servicio->nombre,
                                'start' => $to->fecha_hora->format('H:i'),
                                'end' => $to->fecha_hora->modify('+ '.$to->servicio->duracion.' minutes')->format('Y-m-d\TH:i:s'),
                                'fecha_turno' => $fechaInicioAux->format('YmdHis'),
                                //'color' => $colorin,
                                'textColor' => '#000',
                                'className' => $to->estadoTurno->className
                            );
                            $turnos[$fechaInicioAux->format("H")]['Turnos'][] = $aTurno;
                        }
                        /*
                        if(($this->actualUser) && ($turnoOcupado[0]->cliente->id == $this->actualUser->id)){
                            $aTurno['id'] = $turnoOcupado[0]->id;
                            $aTurno['start'] = $fechaInicio->format('H:i'),
                            $aTurno['title'] = 'Reservaste este turno';
                            $aTurno['color'] = COLOR_TURNO_RESERVADO;
                            $aTurno['className'] = 'label-danger btn-danger';
                        }else{
                            $aTurno['title'] = 'No Disponible';
                            $aTurno['color'] = COLOR_TURNO_OCUPADO;
                            $aTurno['className'] = 'label-danger btn-danger';
                        }	*/
                }
                    /*
                    //var_dump($fechaInicioAux->format("Y-m-d H:i:s") .' / '.date("Y-m-d H:i:s"));
                    if($fechaInicioAux->format("Y-m-d H:i:s")<date("Y-m-d H:i:s")){
                        $aTurno['color'] = COLOR_TURNO_NO_DISPONIBLE;
                        $aTurno['title'] = '';
                        $aTurno['en_fecha'] = false;
                    }else{
                        $aTurno['en_fecha'] = true;
                    }
                    */
                    $fechaInicio->modify('+ 1 hour')->format('Y-m-d\TH:i:s');

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







    public function add()
    {
        //if ($this->actualBackuser->perfil->id) {
            $breadcrumb = array();
            $breadcrumb['Turnos'] = $this->controller_url('');
            $breadcrumb['Agregar nuevo Turno'] = $this->controller_url('add');
            $this->data['breadcrumb'] = $breadcrumb;

            $this->data['servicios'] = Managers\ServicioManager::getInstance()->getAll();
            $this->data['clientes'] = Managers\ClienteManager::getInstance()->getAll();

            $this->data['submenuactive'] = 'add';
            $this->data['pageTitle'] = 'Agregar nuevo Turno';
            $this->parser->parse($this->parsePath.'form.tpl', $this->data);
        /*} else {
            redirect('admin');
        }*/
    }

    public function eliminar($turno_id)
    {
        $result['status'] = false;
        $result['title'] = 'Error al eliminar turno';
        $result['message'] = 'Imposible eliminar el turno';
        $result["referer"] = $_SERVER['HTTP_REFERER'];
        $diaActual = new DateTime('now');

        if ($this->actualBackuser->perfil->id) {
            if ($aTurno = Managers\TurnoManager::getInstance()->get($turno_id)) {
                // if ($aTurno->fecha_hora > $diaActual) {
                    $aEstado = Managers\EstadoTurnoManager::getInstance()->get(2); //Estado Cancelado
                    $aTurno->estadoTurno = $aEstado;

                    //si el turno fue canjeado, se devuelven los puntos
                    if ($aTurno->canjeado) {
                        $this->actualUser->puntos_acumulados = $this->actualUser->puntos_acumulados + $aTurno->canjeado_puntos;
                        Managers\ClienteManager::getInstance()->save($this->actualUser);
                    }

                    $aTurno = Managers\TurnoManager::getInstance()->save($aTurno);

                    //agregar notificacion para el Back de turno
                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();

                    $aNotificacion->titulo = (($aTurno->cliente)?$aTurno->cliente->nombre:$aTurno->nombre).': <strong>tu turno del día '.$aTurno->fecha_hora->format('d-m').' a las '.$aTurno->fecha_hora->format('H:i').' fue cancelado </strong><br />';
                    $aNotificacion->descripcion = '<p style="padding:4px 0;">Podés sacar uno nuevo o comunicarte con nosotros para reprogramarlo</p>';
                    $aNotificacion->tipo = true;


                    $aNotificacion->cliente = ($aTurno->cliente)?$aTurno->cliente:null;
                    $aNotificacion->fecha = new DateTime('now');
                    $aNotificacion->visto = false;
                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);

                    $result["title"]   = "Turno cancelado";
                    $result["status"]  = true;
                    $result["message"] = 'Se ha cancelado el turno';
                /* } else {
                    $result["message"] = 'El turno es anterior a la fecha actual. Imposible cancelar!';
                } */
            }
        } else {
            $result['title'] = 'Error de permisos';
        }

        echo json_encode($result);
    }

    public function editar($turno_id)
    {
        if ($this->actualBackuser->perfil->id) {
            if ($editUser = Managers\TurnoManager::getInstance()->get($turno_id)) {
                $this->data['editUser'] = $editUser;

                $breadcrumb = array();
                $breadcrumb['Turnos'] = $this->controller_url('');
                $breadcrumb['Editar Turno'] = $this->controller_url('editar/'.$turno_id);
                $this->data['breadcrumb'] = $breadcrumb;

                $this->data['servicios'] = Managers\ServicioManager::getInstance()->getAll();
                $this->data['coiffeurs'] = Managers\CoiffeurManager::getInstance()->getActiveAll();
                $this->data['clientes'] = Managers\ClienteManager::getInstance()->getAll();
                $this->data['estados'] = Managers\EstadoTurnoManager::getInstance()->getAll();

                $this->data['submenuactive'] = '';
                $this->data['pageTitle'] = 'Editar Turno';
                $this->parser->parse($this->parsePath.'form.tpl', $this->data);
            } else {
                redirect($this->controller_url());
            }
        } else {
            redirect('admin');
        }
    }

    public function ver($cliente_id)
    {
        if ($this->actualBackuser->perfil->id) {
            if ($aCliente = Managers\ClienteManager::getInstance()->get($cliente_id)) {

                /*if (($aUsuario->federacion->id != $this->federacionActual->id) && ($this->session->userdata('login_admin')=='federacion')){
                    redirect('admin/usuarios');
                }*/

                $breadcrumb = array();
                $breadcrumb['Turnos'] = 'admin/turnos/listado';
                $breadcrumb[$aCliente->nombre] = 'admin/turnos/ver/'.$aCliente->id;
                $this->data['breadcrumb'] = $breadcrumb;

                $this->data['contentTitle'] = $aCliente->nombre;
                $this->data['contentSubtitle'] = 'Id '.$aCliente->id;

                $this->data['cliente'] = $aCliente;

                $this->parser->parse('admin/turnos/ver.tpl', $this->data);
            } else {
                redirect('admin/turnos');
            }
        } else {
            redirect('admin');
        }
    }

    public function save()
    {
        $result["title"]   = "Error";
        $result["status"]  = false;
        $result["message"] = 'No se ha podido reservar el turno! <br/> El Coiffeur no existe.';

        $id_servicio = trim($this->input->post('servicio'));
        $id_coiffeur = trim($this->input->post('coiffeur'));
        $id_cliente = trim($this->input->post('cliente'));
        $fecha = trim($this->input->post('fecha'));
        $turno_id = trim($this->input->post('turno_id'));
        $turno_nombre = trim($this->input->post('nombreturno'));
        $turno_telefono = trim($this->input->post('telefonoturno'));
        
        // $puntos = trim($this->input->post('puntos_servicio'));

        if ($aCoiffeur = Managers\CoiffeurManager::getInstance()->get($id_coiffeur)){

            $result["message"] = 'No se ha podido reservar el turno! <br/> Debe seleccionar un <strong>Cliente</strong>.';
            $clienteOk = true;
            if (!$aCliente = Managers\ClienteManager::getInstance()->get($id_cliente)){
                if (empty($turno_nombre)){
                    $clienteOk = false;
                }
                $aCliente = null;                
            } 

            $result["message"] = 'No se ha podido reservar el turno! <br/> Debe seleccionar un <strong>Cliente</strong> o ingresar un nombre.';
            if ($clienteOk){

                if($aCliente && $aCliente->bloqueado){
                    $result["message"] = 'No se ha podido reservar el turno! <br/> <strong>El Cliente se encuentra Bloqueado.</strong>.';
                    echo json_encode($result);
                    die();
                }

                $result["message"] = 'No se ha podido reservar el turno! <br/> Debe seleccionar un <strong>Servicio</strong>.';
                if ($aServicio = Managers\ServicioManager::getInstance()->get($id_servicio)){
                    $fecha = Datetime::createFromFormat('YmdHis', $fecha);

                    //agregar notificacion para el Back de turno
                    $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();

                    if ($aTurno = Managers\TurnoManager::getInstance()->get($turno_id)) {
                        $aTurno->coiffeur = $aCoiffeur;
                        $aTurno->servicio = $aServicio;
                        $aTurno->fecha_hora = $fecha;
                        $aTurno->cliente = $aCliente;
                        ///noti

                        $aNotificacion->titulo = '<strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Tu turno del día '.$aTurno->fecha_hora->format('d-m').' a las '.$aTurno->fecha_hora->format('H:i').' hs fue modificado</strong><br />';
                        $aNotificacion->descripcion = '<p style="padding:4px 0;">Revisá los cambios y comunicate con nosotros ante cualquier duda</p>';
                        $aNotificacion->visto = false;

                        $result["title"]   = "Turno reservado";
                        $result["status"]  = true;
                        $result["message"] = 'Se ha cambiado la reserva del turno';
                    } else {
                        

                        $aTurno =  \Managers\TurnoManager::getInstance()->create();
                        $aEstado = Managers\EstadoTurnoManager::getInstance()->get(1); //Estado Reservado

                        $aTurno->coiffeur = $aCoiffeur;
                        $aTurno->estadoTurno = $aEstado;
                        $aTurno->servicio = $aServicio;
                        $aTurno->cliente = $aCliente;
                        
                        $aTurno->fecha_hora = $fecha;

                        ///noti
                        $aNotificacion->titulo = 'Ya agendamos tu turno. ¡Te esperamos!';
                        $aNotificacion->visto = false;
                        $aNotificacion->descripcion = 'Fecha: '. $fecha->format('d-m-Y H:i'). ' HS';

                        $result["title"]   = "Turno reservado";
                        $result["status"]  = true;
                        $result["message"] = 'Se ha reservado el turno';

                        /*}else{
                            $result["message"] = 'Turno Ocupado!';
                        }*/
                    }

                    if ( $turnoOcupado = \Managers\TurnoManager::getInstance()->getByFecha($aServicio, $aCoiffeur, $fecha) ) {
                        //var_dump($turnoOcupado[0]->prioridad); die();
                        $prioridad = $turnoOcupado[0]->prioridad+1;
                    } else {
                        $prioridad = 0;
                    }

                    $aTurno->prioridad = $prioridad;
                    $aTurno->nombre = $turno_nombre;
                    $aTurno->telefono = $turno_telefono;
                    $aTurno = Managers\TurnoManager::getInstance()->save($aTurno);

                    //noti
                    $aNotificacion->tipo = true;
                    $aNotificacion->cliente = $aCliente;
                    $aNotificacion->fecha = new DateTime('now');

                    if ($aCliente){
                        $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);
                    }
                }
            }
        }

        echo json_encode($result);
    }


    public function datasource()
    {
        // Data for Data-Tables

        /*if($this->session->userdata('login_admin')=='administracion'){
            //$aFederacion = \Managers\FederacionManager::getInstance()->get($this->federacionAc->id);
            \Managers\ClienteManager::getInstance()->setJoinDeAdministracion($this->administracionActual);
        }*/

        $data = \Managers\ClienteManager::getInstance()->getDatatableDatasource($this->input->post());
        echo $data;
    }


    public function guardar_foto()
    {
        $turno_id = intval($this->input->post('turno_id'));

        if ($editUser = Managers\TurnoManager::getInstance()->get($turno_id)) {
            $images_post = ($this->input->post('images'))?$this->input->post('images'):array();
            //var_dump($images_post); die();
            $images_actual = array();

            foreach ($editUser->fotos as $foto) {
                array_push($images_actual, $foto->id);
            }

            $imagenes_add = array_diff($images_post, $images_actual);
            $imagenes_borrar = array_diff($images_actual, $images_post);

            foreach ($imagenes_add as $aImageId) {
                $newImagen = Managers\ImagenManager::getInstance()->get($aImageId);
                $newImagen->temporal = false;
                $editUser->fotos->add($newImagen);
                $newImagen->turno = $editUser;
            }

            foreach ($imagenes_borrar as $aImageId) {
                $newImagen = Managers\ImagenManager::getInstance()->get($aImageId);
                $newImagen->temporal = false;
                $editUser->fotos->removeElement($newImagen);
                $newImagen->turno = null;
            }

            $editUser = Managers\TurnoManager::getInstance()->save($editUser);


            //agregar notificacion para la edicion de fotos
            $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();

            $aNotificacion->titulo = '¡Ya podés ver las fotos de tu último turno!';
            $aNotificacion->descripcion = '';

            $aNotificacion->tipo = true;
            $aNotificacion->visto = false;
            $aNotificacion->cliente = $editUser->cliente;
            $aNotificacion->fecha = new DateTime('now');
            $aNotificacion =  \Managers\NotificacionManager::getInstance()->save($aNotificacion);

            $result['id'] = $turno_id;
            $result['title'] = 'Datos guardados correctamente';
            $result['message'] = 'Fotos guardadas.';
            $result['status'] = true;
            $result['data'] = $this->input->post();
        } else {
            $result['id'] = $turno_id;
            $result['title'] = 'Los datos no se guardaron.';
            $result['message'] = 'Las fotos no se guardaron. Probá nuevamente más tarde.';
            $result['status'] = false;
        }

        echo json_encode($result);
    }

    public function uploadfile()
    {
        $this->load->config('images');

        $result = array();

        $imagen = $_FILES['files']['tmp_name'][0];

        $newImagen = Managers\ImagenManager::getInstance()->create($imagen);
        //$newImagen->temporal = false;
        $newImagen = Managers\ImagenManager::getInstance()->save($newImagen);

        $images_root = config_item('images_root');
        $imageUrl = Managers\ImagenManager::getInstance()->getUrl($newImagen, '55x55');
        $imageRoot = $images_root.'/'.$newImagen->id;

        $result = array(
            'name' => $newImagen->id.'.jpg',
            'size' => 999999999,
            'url' =>  $imageUrl,
            'type' => 'Nombre.jpg',
            'thumbnailUrl' => $imageUrl,
            'deleteUrl' => 'Nombre.jpg',
            'deleteType' => 'Nombre.jpg',
            'error' => 'Fuck!',
            'id' => $newImagen->id
        );

        header('Content-type: application/json');
        echo json_encode(array('files' => array($result)));
    }


    public function cargarHorariosTodos($servicio_id, $coiffeur_id, $fechaPedida)
    {
        $startDate = Datetime::createFromFormat('Y-m-d H:i:s', $fechaPedida.' 00:00:00');
        //$endDate = Datetime::createFromFormat('Y-m-d H:i:s', $this->input->post('end').' 00:00:00');

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
            //var_dump('fechaInicio: '.$fechaInicio->format('Y-m-d H:i:s').' / fechaFin: '.$fechaFin->format('Y-m-d H:i:s')); die;
            $continuar = true;
            while ($continuar == true) {
                $fechaInicioAux = Datetime::createFromFormat('Y-m-d H:i:s', $fechaInicio->format('Y-m-d H:i:s'));
                $aTurno = array(
                    'title' => 'Libre',
                    'start' => $fechaInicio->format('H:i'),
                    'end' => $fechaInicio->modify('+ '.$aServicio->duracion.' minutes')->format('Y-m-d\TH:i:s'),
                    'fecha_turno' => $fechaInicioAux->format('YmdHis'),
                    //'color' => COLOR_TURNO_DISPONIBLE,
                    'textColor' => '#000',
                    'className' => 'disponible'
                );
            
                $fechaInicioConsulta = $fechaInicioAux;
                $fechaFinConsulta    = $fechaInicio;

                $coiffeurDisponible = \Managers\CoiffeurManager::getInstance()->estaDisponible($fechaInicioConsulta, $fechaFinConsulta, $aCoiffeur);

                $clienteDisponible = \Managers\ClienteManager::getInstance()->estaDisponible($fechaInicioConsulta, $fechaFinConsulta, $this->actualUser);
                //print_r('fechaInicio: '.$fechaInicio->format('Y-m-d H:i')); 
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

                        if (($this->actualUser) && ($turnoOcupado[0]->cliente->id == $this->actualUser->id)) {
                            $aTurno['id'] = $turnoOcupado[0]->id;
                            $aTurno['title'] = 'Reservaste este turno';
                            //$aTurno['color'] = COLOR_TURNO_RESERVADO;
                            $aTurno['className'] = 'btn-danger reservado';
                        } else {
                            $aTurno['title'] = 'No Disponible';
                            //$aTurno['color'] = COLOR_TURNO_OCUPADO;
                            $aTurno['className'] = 'btn-danger ocupado';
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

                $turnos[$fechaInicioAux->format("H")]['Turnos'][] = $aTurno;
                $turnos[$fechaInicioAux->format("H")]['Hora'] = $fechaInicioAux->format("H");

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


    public function cargarHorariosTodosCoiffeurs()
    {


        $servicio_id = $this->input->post('servicio_id');
        $fechaPedida = $this->input->post('fecha');
        $cliente_id = $this->input->post('cliente_id');
        $turno_id = $this->input->post('turno_id');

        $result['status'] = false;
        $result['message'] = 'Turnos por servicio por coiffeur';
        $result['coiffeurs'] = array();
        $result['hora_min'] = 0;
        $result['hora_max'] = 24;
        $editando=false;

        if($aTurnoEdit = \Managers\TurnoManager::getInstance()->get($turno_id)){
            $editando=true;
        }

        if($cliente_id!=''){

            $startDate = Datetime::createFromFormat('Y-m-d H:i:s', $fechaPedida.' 00:00:00');
            //$endDate = Datetime::createFromFormat('Y-m-d H:i:s', $this->input->post('end').' 00:00:00');

            $diaActual = new DateTime('now');
            $diaDeSemanaActual = $startDate->format('N');

            //$diaDeSemanaActual = $diaDeSemanaPedido;
            //var_dump($diaDeSemanaActual); die();
            $coifferes = array();

            $aServicio = Managers\ServicioManager::getInstance()->get($servicio_id);
            // $aCoiffeurs = Managers\CoiffeurManager::getInstance()->getAll();
            //$aCoiffeurs = $aServicio->coiffeurs; // levanto solo los coiffeures dle servicio
            $aCoiffeurs = Managers\CoiffeurManager::getInstance()->getByServicio($aServicio);

            $aTurnoDate = $startDate;
            //for ($diaId = 1; $diaId <= 7; $diaId++){
            $aDay = \Managers\DiaSemanaManager::getInstance()->get($diaDeSemanaActual);

            $aCliente = \Managers\ClienteManager::getInstance()->get($cliente_id);

            $horaMin = clone $startDate;
            $horaMin->modify('+1 day');
            $horaMax = clone $startDate;

            foreach ($aCoiffeurs as $aCoiffeur) {

                $turnos = array();            
                //$horariosDia = \Managers\HorarioDeAtencionXCoiffeurManager::getInstance()->getByDia($aDay, $aCoiffeur);
                $horariosDia = \Managers\MainManager::getInstance()->getByDia($startDate, $aDay, $aCoiffeur);

                foreach ($horariosDia as $aHorario) {

                    $fechaInicio = Datetime::createFromFormat('Y-m-d H:i:s', $aTurnoDate->format('Y-m-d').' '.$aHorario->horaDesde->format('H:i:s'));
                    $fechaFin = Datetime::createFromFormat('Y-m-d H:i:s', $aTurnoDate->format('Y-m-d').' '.$aHorario->horaHasta->format('H:i:s'));
                    
                    if ($fechaInicio <= $horaMin){
                        $horaMin = clone $fechaInicio;
                    }

                    if ($fechaFin >= $horaMax){
                        $horaMax = clone $fechaFin;
                    }


                    
                    $continuar = true;
                    while ($continuar == true) {
                        $fechaInicioAux = Datetime::createFromFormat('Y-m-d H:i:s', $fechaInicio->format('Y-m-d H:i:s'));
                        
                        $horaFinDeturno = clone $fechaInicioAux; 
                        $inicioMasQuince = clone $fechaInicioAux;
                        $horaFinDeturno->modify('+ '.$aServicio->duracion_total.' minutes');
                        $inicioMasQuince->modify('+ 30 minutes');

                        $aTurno = array(
                            'title' => 'Libre',
                            'start' => $fechaInicio->format('H:i'),
                            //'end' => $fechaInicio->modify('+ '.$aServicio->duracion.' minutes')->format('Y-m-d\TH:i:s'),
                            'end' => $fechaInicio->modify('+ 15 minutes')->format('Y-m-d\TH:i:s'),
                            'fecha_turno' => $fechaInicioAux->format('YmdHis'),
                            //'color' => COLOR_TURNO_DISPONIBLE,
                            'textColor' => '#000',
                            'className' => 'disponible'
                        );


                        $fechaInicioConsulta = $fechaInicioAux;
                        $fechaFinConsulta    = $fechaInicio;

                        if ($inicioMasQuince->format("Y-m-d H:i:s") < date("Y-m-d H:i:s")) {
                            //$aTurno['color'] = COLOR_TURNO_NO_DISPONIBLE;
                            $aTurno['className'] = 'nodisponible';
                            $aTurno['title'] = '';
                            $aTurno['en_fecha'] = false;
                        } else {
                            $aTurno['en_fecha'] = true;             


                            $coiffeurDisponible = \Managers\CoiffeurManager::getInstance()->estaDisponible($fechaInicioConsulta, $fechaFinConsulta, $aCoiffeur);
                            $clienteDisponible = \Managers\ClienteManager::getInstance()->estaDisponible($fechaInicioConsulta, $fechaFinConsulta, $aCliente, $aTurnoEdit);


                            $aTurno['coiffeurDisponible'] = $coiffeurDisponible;             
                            $aTurno['clienteDisponible'] = $clienteDisponible;             

                            //print_r('fechaInicio: '.$fechaInicio->format('Y-m-d H:i')); 
                            if (!$coiffeurDisponible) {
                                $aTurno['className'] = 'ocupado';
                                $aTurno['title'] = '';
                                $aTurno['disponible'] = true;

                            } 

                            if (!$clienteDisponible) {                                
                                $aTurno['className'] = 'nodisponible';
                                $aTurno['title'] = '';
                                $aTurno['disponible'] = false;
                            }

                            if ( $turnosOcupados = \Managers\TurnoManager::getInstance()->getByFechaSinServicio($aCoiffeur, $fechaInicioAux)) {
                                //var_dump($turnoOcupado[0]->id);
                                $reservado_cliente = false;
                                $editando_cliente = false;
                                foreach ($turnosOcupados as $turnoOcupado) {
                                    if (($aCliente) && (($turnoOcupado->cliente) && ($turnoOcupado->cliente->id == $aCliente->id))) {
                                        $aTurno['id'] = $turnoOcupado->id;
                                        $aTurno['title'] = 'Reservaste este turno';
                                        $reservado_cliente = true;
                                        //$aTurno['color'] = COLOR_TURNO_RESERVADO;
                                    }

                                    if ($turnoOcupado == $aTurnoEdit){
                                        $editando_cliente = true;
                                    }
                                }
                                if ($editando_cliente){
                                    $aTurno['className'] = 'editando_cliente';
                                } elseif ($reservado_cliente){
                                    $aTurno['className'] = 'reservado_cliente';                                    
                                }

                                     /*else {
                                        $aTurno['title'] = 'No Disponible';
                                        //$aTurno['color'] = COLOR_TURNO_OCUPADO;
                                        $aTurno['className'] = 'btn-danger ocupado disponible';
                                    }*/
                            }

                        }
                            //var_dump($fechaInicioAux->format("Y-m-d H:i:s") .' / '.date("Y-m-d H:i:s"));
                        /*if ($fechaInicioAux->format("Y-m-d H:i:s")<date("Y-m-d H:i:s")) {
                            //$aTurno['color'] = COLOR_TURNO_NO_DISPONIBLE;
                            $aTurno['className'] = 'nodisponible';
                            $aTurno['title'] = '';
                            $aTurno['en_fecha'] = false;
                        } else {
                            $aTurno['en_fecha'] = true;
                        }*/

                        if (!$aCoiffeur->estaAusente($fechaInicioAux) && ($horaFinDeturno <= $fechaFin)){
                            $turnos[$fechaInicioAux->format("H")][$aCoiffeur->id][] = $aTurno;
                            $turnos[$fechaInicioAux->format("H")]['Hora'] = $fechaInicioAux->format("H");
                        }

                        $continuar = ($fechaInicio >= $fechaFin)?false:true;
                    } //end while

             
                }//end foreach

                $jsonTurnos = array();
                foreach ($turnos as $aTurno) {
                    $jsonTurnos[$aTurno['Hora']] = $aTurno[$aCoiffeur->id];
                }

                $coifferes[$aCoiffeur->id] = array(
                                                'nombre' => $aCoiffeur->nombre,
                                                'horas' => $jsonTurnos,
                                                'id' => $aCoiffeur->id
                                                );

            }


            $result['status'] = true;
            $result['coiffeurs'] = $coifferes;
            $result['hora_min'] = $horaMin->format('G');
            $result['hora_max'] = $horaMax->format('G');

        }else{

            $result['message'] = 'Debe seleccionar un Cliente!';

        }    

        // echo "<pre>", print_r($result), "</pre>"; die();
        //$turnos = array('Turnos' => $turnos );
        echo json_encode($result);
    }


    public function cargarHorariosMaximos($fechaPedida)
    {
        $startDate = Datetime::createFromFormat('Y-m-d H:i:s', $fechaPedida.' 00:00:00');
        //$endDate = Datetime::createFromFormat('Y-m-d H:i:s', $this->input->post('end').' 00:00:00');

        $diaActual = new DateTime('now');
        $diaDeSemanaActual = $startDate->format('N');

        //$diaDeSemanaActual = $diaDeSemanaPedido;
        //var_dump($diaDeSemanaActual); die();
        $turnos = array();

        $aCoiffeurs = Managers\CoiffeurManager::getInstance()->getAll();

        $aTurnoDate = $startDate;
        //for ($diaId = 1; $diaId <= 7; $diaId++){
        $aDay = \Managers\DiaSemanaManager::getInstance()->get($diaDeSemanaActual);
        $jsonTurnos = array();

        foreach ($aCoiffeurs as $aCoiffeur) {
            
            //$horariosDia = \Managers\HorarioDeAtencionManager::getInstance()->getByDia($aDay);
            //$horariosDia = \Managers\HorarioDeAtencionXCoiffeurManager::getInstance()->getByDia($aDay, $aCoiffeur);
            $horariosDia = \Managers\MainManager::getInstance()->getByDia($startDate, $aDay, $aCoiffeur);

            foreach ($horariosDia as $aHorario) {
                $fechaInicio = Datetime::createFromFormat('Y-m-d H:i:s', $aTurnoDate->format('Y-m-d').' '.$aHorario->horaDesde->format('H:i:s'));
                $fechaFin = Datetime::createFromFormat('Y-m-d H:i:s', $aTurnoDate->format('Y-m-d').' '.$aHorario->horaHasta->format('H:i:s'));

                $continuar = true;
                while ($continuar == true) {
                    $fechaInicioAux = Datetime::createFromFormat('Y-m-d H:i:s', $fechaInicio->format('Y-m-d H:i:s'));

                    $turnos[$fechaInicioAux->format("H")]['Hora'] = $fechaInicioAux->format("H");
                    $turnos[$fechaInicioAux->format("H")]['c'] = $aCoiffeur->nombre;
                    
                    

                    $fechaInicio->modify('+ 1 hour')->format('Y-m-d\TH:i:s');

                    $continuar = ($fechaInicio >= $fechaFin)?false:true;
                } //end while
            }//end foreach

        }//end foreach

        foreach ($turnos as $aTurno) {
                $jsonTurnos[] = array(
                                    'hora' => $aTurno['Hora']
                                );
            }

        //echo "<pre>", print_r($jsonTurnos), "</pre>"; die();
        //$turnos = array('Turnos' => $turnos );
        echo json_encode($jsonTurnos);
    }


}