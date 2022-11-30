<?php

if(empty($_REQUEST['mailUser'])){

    $return['status'] = '400';
    $return['message'] = 'Falta informaci¨®n requerida';
    echo json_encode($return);
    return;

}else{
        $mailUser = htmlentities($_REQUEST['mailUser']);
        require('../API-movil/secure/acceso.php');
        $access = new acceso('localhost', 'progra24_d35u5cr', 'oC;;(rw,4_GC', 'progra24_g5m2020', '8888');
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
