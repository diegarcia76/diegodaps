<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH."core/controllers/base.php";

class Webservice extends Base_Controller
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
        //header("Access-Control-Allow-Origin: *");
        //header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE", false);
        //header( 'Access-Control-Allow-Credentials: true' );
        header('Access-Control-Allow-Origin: *');
        //header( 'Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS' );
        //header( 'Access-Control-Allow-Headers: ACCEPT, ORIGIN, X-REQUESTED-WITH, CONTENT-TYPE, AUTHORIZATION' );
        //header( 'Access-Control-Max-Age: 86400' );
        //header( 'Content-Length: 0' );
        header('Content-Type: application/json');
    }

    public function reGenerarToken()
    {

        $result = array();

        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["username"];
        $user_id = isset($data['user_id'])?$data['user_id']:'';        
        $result['status'] = false;
        //$this->session->unset_userdata('login_id');
        //$user_id = 1;

        if ($aUser = \Managers\ClienteManager::getInstance()->get($user_id)) {
        
            $time = time();
            $key = 'diegodaps_secret';

            $token = array(
                'iat' => $time, // Tiempo que inició el token
                'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
                'data' => array( // información del usuario
                    'id' => $aUser->id,
                    'nombre' => (($aUser->nombre)?$aUser->nombre:''),
                    'email' => (($aUser->email)?$aUser->email:''),
                    'foto' => \Managers\ImagenManager::getInstance()->getUrl($aUser->foto, ''),
                    'puntos' => (($aUser->puntos_acumulados)?$aUser->puntos_acumulados:0),
                )
            );

            $jwt = JWT::encode($token, $key);
            //echo $jwt;
            $result['id_token'] = $jwt;
            $result['foto'] = \Managers\ImagenManager::getInstance()->getUrl($aUser->foto, '');
            $result['status'] = true;
        } else {
            $result['message'] = 'Usuario o clave incorrectos.';
        }
           

        echo json_encode($result);
    }

    public function checklogin()
    {


        //header("content-type: application/json");


        $result = array();

        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["username"];

        $username = isset($data['username'])?$data['username']:'';
        $pass = isset($data['password'])?$data['password']:'';

        //var_dump('user: '.$username);
        //$username = 'ighirlanda@gmail.com';
        //$pass = '123456';
        //$recordar = $this->input->post('recordar');

        $result['status'] = false;
        //$this->session->unset_userdata('login_id');

        if ($username) {
            if ($pass != '') {
                $pass = md5($pass);
                if ($aUser = \Managers\ClienteManager::getInstance()->getLogin($username, $pass)) {
                    //$this->session->set_userdata('login_id', $aUser->id);

                    /*if($recordar){
                        $cookie = array(
                            'name'   => 'usuario',
                            'value'  => $username,
                            'expire' => '86500',
                            'secure' => TRUE
                        );
                        $this->input->set_cookie($cookie);
                        $cookie = array(
                            'name'   => 'clave',
                            'value'  => $pass,
                            'expire' => '86500',
                            'secure' => TRUE
                        );
                        $this->input->set_cookie($cookie);
                    }*/

                    /*$result['calendario'] = false;

                    if($this->session->userdata('startEvento')){
                        $result['calendario'] = true;
                        $result['startEvento'] = $this->session->userdata('startEvento');
                        $result['servicio_id'] = $this->session->userdata('servicio_id');
                    }*/

                    $time = time();
                    $key = 'diegodaps_secret';

                    $token = array(
                        'iat' => $time, // Tiempo que inició el token
                        'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
                        'data' => array( // información del usuario
                            'id' => $aUser->id,
                            'nombre' => (($aUser->nombre)?$aUser->nombre:''),
                            'email' => (($aUser->email)?$aUser->email:''),
                            'foto' => \Managers\ImagenManager::getInstance()->getUrl($aUser->foto, ''),
                            'puntos' => (($aUser->puntos_acumulados)?$aUser->puntos_acumulados:0),
                        )
                    );

                    $jwt = JWT::encode($token, $key);
                    //echo $jwt;
                    $result['id_token'] = $jwt;
                    $result['foto'] = \Managers\ImagenManager::getInstance()->getUrl($aUser->foto, '');
                    $result['status'] = true;
                } else {
                    $result['message'] = 'Usuario o clave incorrectos.';
                }
            } else {
                $result['message'] = 'Por favor, ingrese una clave.';
            }
        } else {
            $result['message'] = 'Por favor, ingrese un correo electrónico válido.';
        }

        echo json_encode($result);
    }

    public function getUserByEmail()
    {


        //header("content-type: application/json");
        
        $result = array();

        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["username"];

        $email = $data["email"];
        $accessToken = $data["accessToken"];
        $name = $data["name"];

        /*$email = 'ignacionasoft@gmail.com';
        $accessToken = '117783438767845';
        $name = 'Ignacio Nasoft';*/

        $result['status'] = false;
        //$this->session->unset_userdata('login_id');

        if ($accessToken) {
            if (!$aUser=\Managers\ClienteManager::getInstance()->getByFacebookId($accessToken)) {
                
                $aUser=\Managers\ClienteManager::getInstance()->create();

                //$foto = 'https://scontent.xx.fbcdn.net/v/t1.0-1/p200x200/10846400_10205244134799931_7604105813957542841_n.jpg?oh=28183fe620fc7c0f9977c86e43c4c15c&oe=5A06E34B';//
                $foto = $data['foto'];

                $base64string = file_get_contents($foto);

                //$data = base64_decode($imagen);

                $im = imagecreatefromstring($base64string);
                //header('Content-Type: image/png');
                $resp = imagepng($im, realpath("")."/uploads/temp.png");
                //echo $resp;
                //die();
                $path = realpath("")."/uploads/temp.png";
                // frees image from memory
                imagedestroy($im);

                $newImagen = \Managers\ImagenManager::getInstance()->create($path);
                $newImagen->temporal = false;
                $aUser->foto = $newImagen;
                $newImagen->cliente = $aUser;

                $aUser->email = $email;
                $aUser->nombre = $name;
                $aUser->facebookId = $accessToken;
                $aUser->activo = true;
                $aUser->fecha_alta = new Datetime('now');
                $aUser->puntos_acumulados = 0;

                $aUser=\Managers\ClienteManager::getInstance()->save($aUser);
            }

            $time = time();
            $key = 'diegodaps_secret';

            $token = array(
                'iat' => $time, // Tiempo que inició el token
                'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
                'data' => array( // información del usuario
                    'id' => $aUser->id,
                    'nombre' => (($aUser->nombre)?$aUser->nombre:''),
                    'email' => (($aUser->email)?$aUser->email:''),
                    'foto' => Managers\ImagenManager::getInstance()->getUrl($aUser->foto, ''),
                    'puntos' => (($aUser->puntos_acumulados)?$aUser->puntos_acumulados:0),
                )
            );

            $jwt = JWT::encode($token, $key);
            //echo $jwt;
            $result['id_token'] = $jwt;
            $result['status'] = true;
        } else {
            $result['message'] = 'Por favor, ingrese un accessToken válido.';
        }

        echo json_encode($result);
    }

    public function turnosProximos($user_id)
    {
        $result = array();

        //$data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["username"];

        //$user_id = trim($data["user_id"]);
        //$user_id = 1;


        if ($aUser = \Managers\ClienteManager::getInstance()->get($user_id)) {
            //$this->session->set_userdata('login_id', $aUser->id);
            $diaActual = new DateTime('now');
            $turnos = \Managers\TurnoManager::getInstance()->getByClienteProximos($aUser, $diaActual, 5);
            $turno = array();
            $turnosTodos = array();
            $turnosFinal = array();

            foreach ($turnos as $co) {
                //$turno['fecha'] = $co->fecha_hora->format('d-m-Y');
                $turno['id'] = $co->id;
                $turno['fecha_hora'] = $co->fecha_hora->format('H:i');
                $turno['servicio'] = $co->servicio->nombre;
                $turno['servicio_duracion'] = $co->servicio->duracion;
                $turno['servicio_espera'] = $co->servicio->duracion_espera;
                $turno['coiffeur'] = $co->coiffeur->nombre;
                $turno['prioridad'] = $co->prioridad;
                $turno['canjeado'] = (($co->canjeado)?1:0);
                $turno['canjeado_puntos'] = $co->canjeado_puntos;

                //18 DE DICIEMBRE DE 2016
                //$turnosTodos[$co->fecha_hora->format('d').' DE '.$co->fecha_hora->format('F').' DE '.$co->fecha_hora->format('Y')][] = $turno;
                $turnosTodos[\Managers\MainManager::getInstance()->fechaFormateada($co->fecha_hora)][] = $turno;
                //$turnosTodos[] = $turno;
            }

            foreach ($turnosTodos as $fechaTurno => $turnosFecha) {
                $turnosFinal[] = array('fecha' => $fechaTurno,
                                        'turnos' => $turnosFecha);
            }

            $result['state'] = true;
            $result['fechas'] = $turnosFinal;
        } else {
            $result['state'] = false;
            $result['fechas'] = array();
        }

        echo json_encode($result);
    }


    public function getUsuario()
    {
        $result = array();

        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["username"];

        $user_id = trim($data["user_id"]);
        //$user_id = 48;


        if ($aUser = \Managers\ClienteManager::getInstance()->get($user_id)) {
            //$this->session->set_userdata('login_id', $aUser->id);
            $usuario = array();

            $usuario['id'] = $aUser->id;
            $usuario['nombre'] = $aUser->nombre;
            $usuario['email'] = $aUser->email;
            $usuario['fecha_nacimiento'] = ($aUser->fecha_nacimiento)?$aUser->fecha_nacimiento->format('d/m/Y'):null;
            $usuario['telefono'] = $aUser->telefono;
            $usuario['profesion_id'] = ($aUser->profesion)?$aUser->profesion->id:0;
            $usuario['profesion'] = ($aUser->profesion)?$aUser->profesion->nombre:'';
            $usuario['whatsapp'] = $aUser->whatsapp;
            $usuario['facebook'] = $aUser->facebook;
            $usuario['twitter'] = $aUser->twitter;

            $result['state'] = true;
            $result = $usuario;
        } else {
            $result['state'] = false;
        }

        echo json_encode($result);
    }

    public function getProfesiones()
    {
        $result = array();

        $aProfesiones = \Managers\ProfesionManager::getInstance()->getAll();

        $profesiones = array();
        foreach ($aProfesiones as $p) {
            $profesiones[] = \Managers\ProfesionManager::getInstance()->toArray($p);
        }

        $result = $profesiones;

        echo json_encode($result);
    }

    public function updatePlayerId($user_id)
    {
        $result = array();

        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["username"];

        //$user_id = trim($data["user_id"]);
        $user_id = $user_id;
        $playerId = trim($data["playerId"]);
        //$playerId = 'ca23d19a-51f2-41ef-ba2b-805dd06c9014';

        $result['state'] = false;

        if ($aUser = \Managers\ClienteManager::getInstance()->get($user_id)) {
            //$this->session->set_userdata('login_id', $aUser->id);

            if ($aDispositivo = \Managers\DispositivoManager::getInstance()->getByPlayer($playerId)) {
                $aDispositivo->cliente = $aUser;
            } else {
                $aDispositivo = \Managers\DispositivoManager::getInstance()->create();
                $aDispositivo->cliente = $aUser;
                $aDispositivo->playerId = $playerId;
            }

            $aDispositivo = \Managers\DispositivoManager::getInstance()->save($aDispositivo);
            $result['state'] = true;
            //$result = $usuario;
        }

        echo json_encode($result);
    }

    public function updateUsuario($user_id)
    {
        $result = array();

        $data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["username"];

        //$user_id = trim($data["user_id"]);
        $user_id = $user_id;
        $nombre = trim($data["nombre"]);
        $email = trim($data["email"]);
        $fecha_nacimiento = (isset($data["fecha_nacimiento"]))?trim($data["fecha_nacimiento"]):false;
        $telefono = trim($data["telefono"]);
        $profesion_id = $data["profesion_id"];
        $whatsapp = trim($data["whatsapp"]);
        $facebook = trim($data["facebook"]);
        $twitter = trim($data["twitter"]);
        $result['state'] = false;

        if ($aUser = \Managers\ClienteManager::getInstance()->get($user_id)) {
            //$this->session->set_userdata('login_id', $aUser->id);
            $aProfesion = \Managers\ProfesionManager::getInstance()->get($profesion_id);

            $aUser->nombre = $nombre;
            $aUser->email = $email;
            if($fecha_nacimiento)
                $aUser->fecha_nacimiento = \Datetime::createFromFormat('Y-m-d', $fecha_nacimiento);
            $aUser->telefono = $telefono;
            $aUser->profesion = $aProfesion;
            $aUser->whatsapp = $whatsapp;
            $aUser->facebook = $facebook;
            $aUser->twitter = $twitter;

            $aUser = \Managers\ClienteManager::getInstance()->save($aUser);

            $result['state'] = true;
            //$result = $usuario;
        }

        echo json_encode($result);
    }

    public function getServicios()
    {
        $result = array();

        $aServicios = \Managers\ServicioManager::getInstance()->getAllEnApp();

        $servicios = array();
        foreach ($aServicios as $p) {
            $servicios[] = \Managers\ServicioManager::getInstance()->toArray($p);
        }

        $result = $servicios;

        echo json_encode($result);
    }

    public function getCoiffeurs($id_servicio)
    {
        $result = array();

        $aServicio = Managers\ServicioManager::getInstance()->get($id_servicio);
        $coiffeurs = array();

        foreach ($aServicio->serviciosXCoiffeur as $co) {
            if(!$co->coiffeur->borrado)
                $coiffeurs[] = \Managers\ServicioXCoiffeurManager::getInstance()->toArray($co);
        }

        $result['coiffeurs'] = $coiffeurs;
        echo json_encode($result);
    }


    public function cargarHorarios($servicio_id, $coiffeur_id, $fechaPedida, $user_id)
    {
        $result = array();

        $startDate = Datetime::createFromFormat('Y-m-d H:i:s', $fechaPedida.' 00:00:00');
        
        $diaActual = new DateTime('now');
        $diaDeSemanaActual = $startDate->format('N');

        //$diaDeSemanaActual = $diaDeSemanaPedido;
        //var_dump($diaDeSemanaActual); die();
        $turnos = array();

        $aServicio = Managers\ServicioManager::getInstance()->get($servicio_id);
        $aCoiffeur = Managers\CoiffeurManager::getInstance()->get($coiffeur_id);

        $aUser = Managers\ClienteManager::getInstance()->get($user_id);

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
                        'title' => 'libre',
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

                $clienteDisponible = \Managers\ClienteManager::getInstance()->estaDisponible($fechaInicioConsulta, $fechaFinConsulta, $aUser);
                $aTurno['disponible'] = true;
                if (!$coiffeurDisponible) {
                    $aTurno['className'] = 'nodisponible';
                    $aTurno['title'] = 'nodisponible';
                    $aTurno['disponible'] = false;
                } elseif (!$clienteDisponible) {
                    $aTurno['className'] = 'nodisponible';
                    $aTurno['title'] = 'nodisponible';
                    $aTurno['disponible'] = false;
                }

                if ($turnoOcupado = \Managers\TurnoManager::getInstance()->getByFecha($aServicio, $aCoiffeur, $fechaInicioAux)) {
                    //var_dump($turnoOcupado[0]->id);

                    if ($turnoOcupado = \Managers\TurnoManager::getInstance()->getByFecha($aServicio, $aCoiffeur, $fechaInicioAux)) {
                    //var_dump($turnoOcupado[0]->id);

                        if (($turnoOcupado[0]->cliente)) {
                            if (($aUser) && (($turnoOcupado[0]->cliente) && ($turnoOcupado[0]->cliente->id == $aUser->id))) {
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

                       /*if (($aUser) && (($turnoOcupado[0]->cliente) && ($turnoOcupado[0]->cliente->id == $aUser->id))) {
                            $aTurno['id'] = $turnoOcupado[0]->id;
                            $aTurno['title'] = 'Reservaste este turno';
                            //$aTurno['color'] = COLOR_TURNO_RESERVADO;
                            $aTurno['className'] = 'btn-danger reservado';
                        } else {
                            $aTurno['title'] = 'ocupado';
                            $aTurno['disponible'] = true;
                            //$aTurno['color'] = COLOR_TURNO_OCUPADO;
                            $aTurno['className'] = 'btn-danger ocupado';
                        }*/
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

                $aTurno['showDetails'] = false;

                if (($horaFinDeturno <= $fechaFin) && ($aTurno['className']!='nodisponible') && (!$aCoiffeur->estaAusente($fechaInicioAux)) && ($aTurno['title']!='ocupado')) {
                    $turnos[$fechaInicioAux->format("H")]['hora'] = $fechaInicioAux->format("H");
                    $turnos[$fechaInicioAux->format("H")]['turnos'][] = $aTurno;
                }

                $continuar = ($fechaInicio >= $fechaFin)?false:true;
            } //end while
        }//end foreach


        //	$aTurnoDate->modify('+ 1 days');
        /*
            horarios
                (
                    hora
                    Turnos --> turnos
                ),
                (
                    hora
                    Turnos --> turnos
                ),
                (
                    hora
                    Turnos --> turnos
                ),

        */
        //}
        $jsonTurnos = array();
        /*foreach ($turnos as $fechaTurno => $turnosFecha) {
            $jsonTurnos[] = array('hora' => $fechaTurno,
                                    'turnos' => $turnosFecha);
        }*/

        foreach ($turnos as $aTurno) {
            $jsonTurnos[] = $aTurno;
        }

        //$jsonTurnos = array(1,2,3);

        $result['turnos'] = $jsonTurnos;

        //echo "<pre>", print_r($jsonTurnos), "</pre>"; die();
        //$turnos = array('Turnos' => $turnos );
        echo json_encode($result);
    }

    public function confirmar_turno_1($id_servicio, $id_coiffeur, $fecha, $user_id, $turno_id = null)
    {
        $aCoiffeur = Managers\CoiffeurManager::getInstance()->get($id_coiffeur);
        $aServicio = Managers\ServicioManager::getInstance()->get($id_servicio);
        //setlocale(LC_ALL, "es_ES");
        $fecha_aux = $fecha;
        $fecha = Datetime::createFromFormat('YmdHis', $fecha);
        //$turno['espera'] = false;

        if ($turno_id) {
            $aTurno = Managers\TurnoManager::getInstance()->get($turno_id);
        } else {
            $aTurno = null;
        }

        $aUser = Managers\ClienteManager::getInstance()->get($user_id);

        $turno = array();

        if ((!$tieneTurno = \Managers\TurnoManager::getInstance()->tieneTurno($aServicio, $fecha, $aUser)) || (($aTurno) && (!$aTurno->editado))) {
            if ($turnoOcupado = \Managers\TurnoManager::getInstance()->getByFecha($aServicio, $aCoiffeur, $fecha)) {
                $turno['espera'] = true;
                $turno['status'] = false;
            } else {
                $turno['espera'] = false;
                $turno['status'] = true;
            }

            $turno['servicio'] = $aServicio->nombre;
            $turno['servicio_id'] = $aServicio->id;
            $turno['puntos'] = $aServicio->precio_puntos;
            $turno['coiffeur'] = $aCoiffeur->nombre;
            $turno['coiffeur_id'] = $aCoiffeur->id;
            $turno['fecha_turno'] = $fecha_aux;
            $turno['turno_id'] = '0';

            $turno['fecha'] = $fecha->format('Y-m-d H:i:s');
            $turno['fecha_sola'] = $fecha->format('d \d\e F \d\e Y');
            $turno['hora_sola'] = $fecha->format('H:i');
            
        } else {
            if (($aTurno) && ($aTurno->editado)) {
                $turno['statusEdicion'] = true;
            }
            $turno['status'] = false;
            $turno['message'] = 'No puede reservar más de un turno por día!';
        }


        $result['turno'] = $turno;
        echo json_encode($result);
    }


    public function confirmar_turno_2($user_id)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $result["title"]   = "Error";
        $result["status"]  = false;
        $result["message"] = 'No se ha podido reservar el turno!';

        $id_servicio = $data['servicio_id'];
        $id_coiffeur = $data['coiffeur_id'];
        $fecha = $data['fecha_turno'];
        $turno_id = isset($data['turno_id'])?$data['turno_id']:0;

        if (isset($data['puntos'])) {
            $puntos = $data['puntos'];
        } else {
            $puntos = 0;
        }

        /*$user_id = 1;
        $id_servicio = 3;
        $id_coiffeur = 1;
        $fecha = '20170118180000';
        $turno_id = 0;*/



        $aCoiffeur = Managers\CoiffeurManager::getInstance()->get($id_coiffeur);
        $aServicio = Managers\ServicioManager::getInstance()->get($id_servicio);
        $aUser = Managers\ClienteManager::getInstance()->get($user_id);
        $fecha = \Datetime::createFromFormat('YmdHis', $fecha);
        //var_dump($aUser->nombre); die();
        //agregar notificacion para el Back de turno
        $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();
        //var_dump($fecha->format('d-m H:i')); die();
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
                $result["statusEdicion"]  = false;
                $result["message"] = 'En el caso de no poder asistir, recordá cancelarlo.';
            } else {
                $result["title"]   = "No podemos modificar tu turno";
                $result["status"]  = false;
                $result["statusEdicion"]  = true;
                $result["message"] = 'No podés editarlo más de una vez. Podés elegir un turno para otro día.';
            }
        } else {
            if (!$tieneTurno = \Managers\TurnoManager::getInstance()->tieneTurno($aServicio, $fecha, $aUser)) {
                if ($turnoOcupado = \Managers\TurnoManager::getInstance()->getByFecha($aServicio, $aCoiffeur, $fecha)) {
                    //var_dump($turnoOcupado[0]->prioridad); die();
                    $prioridad = $turnoOcupado[0]->prioridad+1;
                } else {
                    $prioridad = 0;
                }

                $aTurno =  \Managers\TurnoManager::getInstance()->create();
                $aEstado = Managers\EstadoTurnoManager::getInstance()->get(1); //Estado Reservado

                $aTurno->coiffeur = $aCoiffeur;
                $aTurno->estadoTurno = $aEstado;
                $aTurno->servicio = $aServicio;
                $aTurno->cliente = $aUser;
                $aTurno->prioridad = $prioridad;
                $aTurno->fecha_hora = $fecha;

                if ($puntos>0) {
                    $aTurno->canjeado = true;
                    $aTurno->canjeado_puntos = $puntos;
                    //resto los puntos canjeados al cliente
                    $aUser->puntos_acumulados = $aUser->puntos_acumulados - $puntos;
                    Managers\ClienteManager::getInstance()->save($aUser);
                }

                $result["puntos_restantes"] = $aUser->puntos_acumulados;

                $aTurno = Managers\TurnoManager::getInstance()->save($aTurno);

                ///noti

                // ADMIN
                $aNotificacion->titulo = 'Turno Reservado';
                $aNotificacion->visto = false;
                $aNotificacion->descripcion = 'El Cliente '.$aTurno->cliente->nombre.' ha reservado turno en la fecha '. $fecha->format('Y-m-d H:i');

                $result["title"]   = "¡Genial!";
                $result["status"]  = true;
                $result["message"] = 'Ya agendamos tu turno.';
            } else {
                $result["title"]   = "Algo no está bien";
                $result["status"]  = false;
                $result["message"] = 'No podés reservar más de un turno por servicio en el día. Por favor, elegí otro día';
                echo json_encode($result);
                die();
            }
        }

        //noti
        $fecha_noti = new DateTime('now');
        $aNotificacion->tipo = false;
        $aNotificacion->cliente = $aUser;
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
//var_dump($result); die();
        echo json_encode($result);
    }


    public function turnosHistorial($user_id)
    {
        $result = array();

        //$data = json_decode(file_get_contents('php://input'), true);
        //print_r($data);
        //echo $data["username"];

        //$user_id = trim($data["user_id"]);
        //$user_id = 1;


        if ($aUser = \Managers\ClienteManager::getInstance()->get($user_id)) {
            //$this->session->set_userdata('login_id', $aUser->id);
            $diaActual = new DateTime('now');
            $turnos = \Managers\TurnoManager::getInstance()->getByClienteVencidos($aUser, $diaActual);
            $turno = array();
            $turnosTodos = array();
            $turnosFinal = array();

            foreach ($turnos as $co) {
                //$turno['fecha'] = $co->fecha_hora->format('d-m-Y');
                /*$turno['fecha_hora'] = $co->fecha_hora->format('H:i');
                $turno['servicio'] = $co->servicio->nombre;
                $turno['servicio_duracion'] = $co->servicio->duracion;
                $turno['servicio_espera'] = $co->servicio->duracion_espera;
                $turno['coiffeur'] = $co->coiffeur->nombre;
                $turno['prioridad'] = $co->prioridad;
                */
                //18 DE DICIEMBRE DE 2016
                //$turnosTodos[$co->fecha_hora->format('d').' DE '.$co->fecha_hora->format('F').' DE '.$co->fecha_hora->format('Y')][] = $turno;
                //$turnosTodos[\Managers\MainManager::getInstance()->fechaFormateada($co->fecha_hora)][] = $turno;
                $turnosTodos[] = \Managers\TurnoManager::getInstance()->toArray($co);
            }

            /*foreach ($turnosTodos as $fechaTurno => $turnosFecha) {
                $turnosFinal[] = array('fecha' => $fechaTurno,
                                        'turnos' => $turnosFecha);
            }*/

            $result['state'] = true;
            $result['turnos'] = $turnosTodos;
        } else {
            $result['state'] = false;
        }

        echo json_encode($result);
    }


    public function getTurno($id_turno)
    {
        $result = array();
        $result['state'] = false;

        if ($aTurno = Managers\TurnoManager::getInstance()->get($id_turno)) {
            $turno = array();
            $fotos = array();

            $turno['id'] = $aTurno->id;
            $turno['fecha_hora'] = $aTurno->fecha_hora->format('H:i');
            $turno['fecha_formateada'] = \Managers\MainManager::getInstance()->fechaFormateada($aTurno->fecha_hora);
            $turno['servicio'] = $aTurno->servicio->nombre;
            $turno['servicio_duracion'] = $aTurno->servicio->duracion;
            $turno['servicio_espera'] = $aTurno->servicio->duracion_espera;
            $turno['coiffeur'] = $aTurno->coiffeur->nombre;
            $turno['prioridad'] = $aTurno->prioridad;

            foreach ($aTurno->fotos as $foto) {
                $fotos[] = array('foto' => Managers\ImagenManager::getInstance()->getUrl($foto, ''));
            }

            $turno['fotos'] = $fotos;

            $result['state'] = true;
            $result['turno'] = $turno;
        }

        echo json_encode($result);
    }

    public function actualizar_foto()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $result["title"]   = "Error";
        $result["status"]  = false;
        $result["message"] = 'No pudimos actualizar tu foto.';

        $user_id = $data['user_id'];
        //$user_id = 1;
        $foto = $data['foto'];


        if ($editUser = Managers\ClienteManager::getInstance()->get($user_id)) {

            //$imagen = $_FILES['upload']['tmp_name'];
            $imagen = $foto;

            $data = base64_decode($imagen);

            $im = imagecreatefromstring($data);
                //header('Content-Type: image/png');
                $resp = imagepng($im, realpath("")."/uploads/temp.png");
                //echo $resp;
                //die();
                $path = realpath("")."/uploads/temp.png";
                // frees image from memory
                imagedestroy($im);

            $newImagen = Managers\ImagenManager::getInstance()->create($path);
            $newImagen->temporal = false;
            $editUser->foto = $newImagen;
            $newImagen->cliente = $editUser;


            $editUser = Managers\ClienteManager::getInstance()->save($editUser);
            //var_dump($editUser); die();

            $result['title'] = '¡Qué belleza!';
            $result['message'] = 'Ya guardamos tu foto. Podés actualizarla cuando quieras.';
            $result['status'] = true;
            $result['foto'] = Managers\ImagenManager::getInstance()->getUrl($editUser->foto, '120x120');
            unlink($path);
        }

        echo json_encode($result);
    }

    public function getNotificaciones()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $result["title"]   = "Error";
        $result["status"]  = false;
        $result["message"] = 'No se ha podido actualizar!';

        $user_id = $data['user_id'];
        //$user_id = 1;

        if ($editUser = Managers\ClienteManager::getInstance()->get($user_id)) {
            $aNotificaciones = \Managers\NotificacionManager::getInstance()->getByUser($editUser, true);

            $notificaciones = array();

            foreach ($aNotificaciones as $co) {
                $notificaciones[] = \Managers\NotificacionManager::getInstance()->toArray($co);
            }

            $result['notificaciones'] = $notificaciones;

            $result['title'] = 'Datos guardados correctamente';
            $result['message'] = 'exito!';
            $result['status'] = true;
        }

        echo json_encode($result);
    }

    public function cancelar_turno()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        //$data = $this->input->post();

        $result["title"]   = "Error";
        $result["status"]  = false;
        $result["message"] = 'No pudimos cancelar tu turno. Intentá más tarde.';
        $diaActual = new DateTime('now');

        $user_id = $data['user_id'];
        $turno_id = $data['turno_id'];

        if ($aTurno = Managers\TurnoManager::getInstance()->get($turno_id)) {
            if ($aTurno->fecha_hora > $diaActual) {
                $aEstado = Managers\EstadoTurnoManager::getInstance()->get(2); //Estado Cancelado
                $aTurno->estadoTurno = $aEstado;
                $aUser = $aTurno->cliente;

                //si el turno fue canjeado, se devuelven los puntos
                if ($aTurno->canjeado) {
                    $aUser->puntos_acumulados = $aUser->puntos_acumulados + $aTurno->canjeado_puntos;
                    Managers\ClienteManager::getInstance()->save($aUser);
                }

                $aTurno = Managers\TurnoManager::getInstance()->save($aTurno);

                $fecha = new DateTime('now');
                //agregar notificacion para el Back de turno
                $aNotificacion =  \Managers\NotificacionManager::getInstance()->create();

                $aNotificacion->titulo = $aUser->nombre.': tu turno del día '.$aTurno->fecha_hora->format('d-m').' a las '.$aTurno->fecha_hora->format('H:i').' fue cancelado';
                $aNotificacion->descripcion = 'Podés sacar uno nuevo o comunicarte con nosotros para reprogramarlo.';

                $aNotificacion->tipo = false;
                $aNotificacion->cliente = $aUser;
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
                $result["message"] = 'Se ha cancelado el turno';
                $result["puntos"] = $aUser->puntos_acumulados;
            } else {
                $result["message"] = 'El turno es anterior a la fecha actual. Imposible cancelar.';
            }
        }

        echo json_encode($result);
    }


    public function registro()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->helper('cookie');

        $data = json_decode(file_get_contents('php://input'), true);

        // check form
        $result = array();
        $result['status']  = false;

        $password             = $data["password"];
        $cpassword            = $data["password2"];
        $email                = $data["email"];
        $nombre                = $data["nombre"];
        $telefono             = isset($data['telefono'])?$data['telefono']:'';
        $fecha_nacimiento    = isset($data["fecha_nacimiento"])?$data["fecha_nacimiento"]:'';
        $sexo                = isset($data["sexo"])?$data["sexo"]:'';
        $profesion            = isset($data["profesion_id"])?$data["profesion_id"]:'';

        if (($nombre!='') && ($password!='') && ($email!='')) {
            if (!$aUser=\Managers\ClienteManager::getInstance()->getByEmail($email)) {
                if ($password == $cpassword) {
                    $aUsuario = \Managers\ClienteManager::getInstance()->create();
                    $aUsuario->nombre = $nombre;
                    $aUsuario->email = $email;

                    if ($telefono!='') {
                        $aUsuario->telefono = $telefono;
                    }
                    $aUsuario->fecha_alta = new Datetime('now');
                    $aUsuario->puntos_acumulados = 0;
                    if (($sexo!='') || ($sexo==0)) {
                        $aUsuario->sexo = $sexo;
                    }

                    if ($profesion>0) {
                        $aProfesion = \Managers\ProfesionManager::getInstance()->get($profesion);
                        $aUsuario->profesion = $aProfesion;
                    }

                    if ($fecha_nacimiento!='') {
                        $aUsuario->fecha_nacimiento  = Datetime::createFromFormat('Y-m-d', $fecha_nacimiento);
                    }

                    $aUsuario->activo = false;
                    $aUsuario->pass = md5($password);

                    $aUsuario = \Managers\ClienteManager::getInstance()->save($aUsuario);

                    $userDataMin['id'] = $aUsuario->id;
                    $userDataMin['hash'] = \Managers\ClienteManager::getInstance()->doHash($aUsuario);

                    $userData = base64_encode(json_encode($userDataMin));

                    $somedata['verificar_link'] = site_url().'registro/verificar/'.$userData;
                    $contenido = $this->parser->parse('mails/validar.tpl', $somedata, true);

                    /*if($aUsuario = \Managers\UsuarioManager::getInstance()->get($aUsuario->id)){
                        $aUsuario->codigo = MD5($email.'-'.$aUsuario->id);
                        $aUsuario = \Managers\UsuarioManager::getInstance()->save($aUsuario);
                    }*/

                    if (\Managers\MailManager::getInstance()->sendMail($email, 'Valida tu correo', $contenido)) {
                        $result['message'] = 'Enviamos un email a tu correo con las instrucciones para activarlo. Revisa tus correos no deseados, puede que llegue ahí.';
                        $result['title'] = 'Excelente';
                        $result['status']  = true;
                    } else {
                        $result['message'] = 'El envio del mail falló. Intentá más tarde.';
                        $result["status"] = false;
                        $result['title'] = 'No pudimos registrarte';
                    }
                } else {
                    $result['message'] = 'Las contraseñas no coinciden';
                    $result['title'] = 'Error de Password';
                    $result['status']  = false;
                }
            } else {
                $result['message'] = 'El email ya está registrado en nuestro sistema. Probá ingresar.';
                $result['title'] = 'Error de Email';
                $result['status']  = false;
            }
        } else {
            $result['status']  = false;
            $result['message'] = 'Completá todos los campos';
            $result['title'] = 'Error de Validación';
        }

        echo json_encode($result);
    }


    public function olvidopass()
    {
        $result = array();
        $result['status']  = false;
        $result['message'] = '';

        $data = json_decode(file_get_contents('php://input'), true);

        $email                = isset($data['email'])?$data['email']:'';

        if (!$email == '') {
            if (!$newUsuario = \Managers\ClienteManager::getInstance()->getByEmail($email)) {
                $result["status"] = false;
                $result["message"] = 'La dirección de email no es válida.';
            } else {
                /*$newUsuario->codigo= new \Datetime('now');
                    \Managers\UsuarioManager::getInstance()->save($newUsuario);
                    $cod = $newUsuario->codigo->format('m-d-Y h:i:s');
                    $codigo = md5($cod);
                    $total = base64_encode($email."|".$codigo);
                    $total = urlencode($total);
                    $somedata['base']= $total;
                    $somedata["usuario"] = $newUsuario->nombre;*/

                    $userDataMin['id'] = $newUsuario->id;
                $userDataMin['hash'] = \Managers\ClienteManager::getInstance()->doHash($newUsuario);

                $userData = base64_encode(json_encode($userDataMin));

                $somedata['verificar_link'] = site_url().'registro/resetPassword/'.$userData;
                    //$contenido = $this->parser->parse('mails/validar.tpl', $somedata, true);

                    if ($aUsuario = \Managers\ClienteManager::getInstance()->get($newUsuario->id)) {
                        //$aUsuario->codigo = MD5($email.'-'.$aUsuario->id);
                        //$aUsuario = \Managers\ClienteManager::getInstance()->save($aUsuario);
                        $somedata['usuario'] = $aUsuario->nombre;
                    }

                $mailbody = $this->parser->parse('mails/olvido.tpl', $somedata, true);
                \Managers\MailManager::getInstance()->sendmail($email, 'Recuperar tu contraseña', $mailbody);

                $result["message"] = 'Estás a un paso de recuperar tu cuenta. Te enviamos un correo electrónico explicándote como seguir.';
                $result["status"] = true;
            }
        } else {
            $result["status"] = false;
            $result["message"] = 'El correo no es válido o no estás registrado.';
        }

        echo json_encode($result);
    }

    public function getCurrentDatetime(){

        $currentDatetime = new DateTime('now');

        $result = array();
        $result['status']  = true;
        $result['message'] = '';
        $result['datetime'] = $currentDatetime->format('Y-m-d\TH:i:s');
        $result['parte_fecha_hoy'] = $currentDatetime->format('Y-m-d');
        $result['parte_hora_hoy'] = $currentDatetime->format('H:i:s');

        $currentDatetime->modify('+1 day');
        $result['tomorrow'] = $currentDatetime->format('Y-m-d\TH:i:s');
        $result['parte_fecha_manana'] = $currentDatetime->format('Y-m-d');

        echo json_encode($result);
    }
}
