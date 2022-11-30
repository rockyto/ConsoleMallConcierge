<?php  

if(empty($_REQUEST['ccName']) || empty($_REQUEST['ccUser']) || empty($_REQUEST['ccPsswd'])){

	$return['status'] = '400';
	$return['message'] = 'Falta información requerida';
	echo json_encode($return);
	$return;

}else{

$ccName = htmlentities($_REQUEST['ccName']);
$ccUser = htmlentities($_REQUEST['ccUser']);
$ccPsswd = htmlentities($_REQUEST['ccPsswd']);

require('secure/acceso.php');
$access = new acceso('localhost', '4dm1nC0nci3rg320', 'MKdY+Q9M*Aa%', '65MappConcierge2020', '8888');
$access->conecta();

$encriptaPsswd = crypt($ccPsswd, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


$user = $ccUser;
$verifyCC = $access->seleccionaCC($user);

if(!empty($verifyCC)){

	$return['status'] = '400';
	$return['message'] = 'Centro Comercial ya registrado';
	echo json_encode($return);
	$access->desconecta();
	return;

}else{

	$register = $access->registraCC($ccName, $ccUser, $encriptaPsswd);

	if($register){

		$verifyCC = $access->seleccionaCC($user);
		$return['status'] = '200';
		$return['message'] = 'Centro comercial registrado';
		$return['IDCentroComercial'] = $verifyCC['cc_id'];
		
		echo json_encode($return);
		$access->desconecta();
		return;

	}
}
}