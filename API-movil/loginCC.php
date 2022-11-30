<?php

if(empty($_REQUEST['user']) || empty($_REQUEST['password'])){

    $return['status'] = '400';
    $return['message'] = 'Falta información requerida';
    echo json_encode($return);
    return;

}

$user = htmlentities($_REQUEST['user']);
$password = htmlentities($_REQUEST['password']);

require('secure/acceso.php');
$access = new acceso('localhost', '4dm1nC0nci3rg320', 'MKdY+Q9M*Aa%', '65MappConcierge2020', '8888');
$access->conecta();

$userLogin = $access->seleccionaCC($user);

if ($userLogin){

    $encriptaPasswd = $userLogin['cc_psswd'];
    $passwordCliente = crypt($password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

    if($encriptaPasswd === $passwordCliente){

        date_default_timezone_set('America/Mexico_City');

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $fechaActual = $fecha.' '.$hora;

        $tipeActivity = "iPadSession";

        $recordLog = $access->recordingLog($fechaActual, $user, $tipeActivity);

        $return['status'] = '200';
        $return['message'] = 'Loggin correcto';
        $return['CCid'] = $userLogin['cc_id'];
        $return['logoCC'] = $userLogin['ccLogo'];
        $return['CCColorForm'] = $userLogin['cc_ColorForm'];
        
    } else {
        
        $return['status'] = '401';
        $return['message'] = 'Datos incorrectos';
        
    }

}else{

    $return['status'] = '404';
    $return['message'] = 'Usuario no encontrado';

}

$access->desconecta();
echo json_encode($return);
