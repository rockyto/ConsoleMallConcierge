<?php

$idRecordClient = htmlentities($_REQUEST['idRecordClient']);
$interest1 = htmlentities($_REQUEST['interest1']);
$interest2 = htmlentities($_REQUEST['interest2']);
$interest3 = htmlentities($_REQUEST['interest3']);
$interest4 = htmlentities($_REQUEST['interest4']);
$interest5 = htmlentities($_REQUEST['interest5']);
$interest6 = htmlentities($_REQUEST['interest6']);
$interest7 = htmlentities($_REQUEST['interest7']);
$interest8 = htmlentities($_REQUEST['interest8']);

$cantIntrst = htmlentities($_REQUEST['cantIntrst']);

require('secure/acceso.php');
$access = new acceso('localhost', '4dm1nC0nci3rg320', 'MKdY+Q9M*Aa%', '65MappConcierge2020', '8888');
//$access = new acceso('localhost', 'root', 'root', '65MappConcierge2020');


$access->conecta();

$arregloIntereses = [$interest1, $interest2, $interest3, $interest4, $interest5, $interest6, $interest7, $interest8];


switch ($cantIntrst){

	case 1 : 

		for($i=0; $i < 1; $i++){
			
			$interes = $arregloIntereses[$i];
			$recordInterests = $access->recordInterest($interes, $idRecordClient);
		
		}

		break;

	case 2 : 
		for($i=0; $i < 2; $i++){
			
			$interes = $arregloIntereses[$i];
			$recordInterests = $access->recordInterest($interes, $idRecordClient);
		
		}
		break;

	case 3 : 

		for($i=0; $i < 3; $i++){
			
			$interes = $arregloIntereses[$i];
			$recordInterests = $access->recordInterest($interes, $idRecordClient);
		
		}

		break; 
	case 4:

		for($i=0; $i < 4; $i++){
			
			$interes = $arregloIntereses[$i];
			$recordInterests = $access->recordInterest($interes, $idRecordClient);
		
		}

		break;
	case 5:

		for($i=0; $i < 5; $i++){
			
			$interes = $arregloIntereses[$i];
			$recordInterests = $access->recordInterest($interes, $idRecordClient);
		
		}

		break;
	case 6:

		for($i=0; $i < 6; $i++){
			
			$interes = $arregloIntereses[$i];
			$recordInterests = $access->recordInterest($interes, $idRecordClient);
		
		}

		break;
	case 7:

		for($i=0; $i < 7; $i++){
			
			$interes = $arregloIntereses[$i];
			$recordInterests = $access->recordInterest($interes, $idRecordClient);
		
		}

		break;
	case 8:

		for($i=0; $i < 8; $i++){
			
			$interes = $arregloIntereses[$i];
			$recordInterests = $access->recordInterest($interes, $idRecordClient);
		
		}

		break;
	default:
	
}

if (empty($_REQUEST['interest1'])){	

    $return['status'] = '400';
    $return['message'] = 'Falta información requerida';
    echo json_encode($return);
    return;

}else{
	
	$return['status'] = '202';
	$return['message'] = 'Intereses del cliente registrados';
  
}
   
    echo json_encode($return);
    $access->desconecta();
    return;

