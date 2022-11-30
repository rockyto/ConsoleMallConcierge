<?php

if(empty($_REQUEST['mailUser'])){

    $return['status'] = '400';
    $return['message'] = 'Falta información requerida';
    echo json_encode($return);
    return;

}else{
    
        $mailUser = htmlentities($_REQUEST['mailUser']);
        require('../API-movil/secure/acceso.php');
        $access = new acceso('localhost', '4dm1nC0nci3rg320', 'MKdY+Q9M*Aa%', '65MappConcierge2020', '8888');
        $access->conecta();
        $selectMail = $access->selectUser($mailUser);
        
        if($selectMail){
            
            $deleteMail = $access->byeMail($mailUser);
        
            if($deleteMail){
            $return['status'] = '200';
            $return['message'] = 'Usuario eliminado';

            }
        
    }else{
        
        $return['status'] = '404';
        $return['message'] = 'No se encontraron datos';
        
    }
}


$access->desconecta();
echo json_encode($return);
