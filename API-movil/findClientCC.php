<?php

$client = htmlentities($_REQUEST['client']);

if(empty($_REQUEST['client'])){
    
    $return['status'] = '400';
    $return['message'] = 'Falta información requerida';
    echo json_encode($return);
    return;
    
}else{
    
    require('secure/acceso.php');
    $access = new acceso('localhost', '4dm1nC0nci3rg320', 'MKdY+Q9M*Aa%', '65MappConcierge2020', '8888');
    $access->conecta();
    
    $find = $access->findClientCC($client);
    
    if ($find){
        
        $return['status'] = '200';
        $return['message'] = 'Cliente registrado';
        
    }else{
        
        $return['status'] = '404';
        $return['message'] = 'Cliente no encontrado';
        
    }
    
    $access->desconecta();
    echo json_encode($return);
    
}