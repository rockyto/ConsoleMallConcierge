<?php

require_once "../controladores/registros.controlador.php";
require_once "../modelos/registros.modelos.php";

require_once "../controladores/intereses.controlador.php";
require_once "../modelos/intereses.modelo.php";

require_once "../controladores/centroscomerciales.controlador.php";
require_once "../modelos/centroscomerciales.modelo.php";

require_once "../controladores/registro.intereses.controlador.php";
require_once "../modelos/registro-intereses.modelo.php";


class TablaRegistrosIntereses{

    /*=============================================
             MOSTRAR LA TABLA DEL REGISTRO
    =============================================*/

    public function mostrarTabla(){

        $item = null;
        $valor = null;

        $registrosIntereses = ControladorRegistroIntereses::ctrMostrarIntereses($item, $valor);

        echo '{
            "data": [';

        for($i = 0; $i < count($registrosIntereses)-1; $i++){

            $item = "idInteres"; //ID de la tabla Intereses (llave primaria)
            $valor = $registrosIntereses[$i]["idInteres"]; //ID como llave foranea de la tabla Registros Intereses
            $interesesCatalogo = ControladorIntereses::ctrMostrarIntereses($item, $valor);

            $item = "idCCRecordsClients";
            $valor = $registrosIntereses[$i]["idRecordClient"];
            $interesesClientes = ControladorRegistros::ctrMostrarRegistros($item, $valor);

            $item = "cc_id"; //ID de la tabla CentrosComerciales (llave primaria)
            $valor = $interesesClientes["ccID"]; //ID como llave foranea de la tabla Registros
            $centroscomerciales = ControladorCentrosComerciales::ctrCentrosComerciales($item, $valor);

            echo '[
            
            "'.($i+1).'",
            "'.$interesesClientes["clientName"].'",
            "'.$interesesClientes["clientAge"].'",
            "'.$interesesClientes["clientMail"].'",
            "'.$interesesClientes["clientGenre"].'",
            "'.$interesesCatalogo["interesNombre"].'",
             "'.$centroscomerciales["cc_name"].'",
            "'.$registrosIntereses[$i]["fechaRegistroInt"].'"
            ],';

        }

        $item = "idInteres";
        $valor = $registrosIntereses[count($registrosIntereses)-1]["idInteres"];

        $interesesCatalogo = ControladorIntereses::ctrMostrarIntereses($item, $valor);

        $item = "idCCRecordsClients";
        $valor = $registrosIntereses[count($registrosIntereses)-1]["idRecordClient"];
        $interesesClientes = ControladorRegistros::ctrMostrarRegistros($item, $valor);

        $item = "cc_id";
        $valor = $interesesClientes["ccID"];
        $centroscomerciales = ControladorCentrosComerciales::ctrCentrosComerciales($item, $valor);

        echo'[
                    "'.count($registrosIntereses).'",
                    
                    "'.$interesesClientes["clientName"].'",
                    "'.$interesesClientes["clientAge"].'",
                    "'.$interesesClientes["clientMail"].'",
                    "'.$interesesClientes["clientGenre"].'",
                    "'.$interesesCatalogo["interesNombre"].'",
                   
                    "'.$centroscomerciales["cc_name"].'",
                    
                    "'.$registrosIntereses[count($registrosIntereses)-1]["fechaRegistroInt"].'"
               ]    
            ]
        }';
    }
}

$activar = new TablaregistrosIntereses();
$activar -> mostrarTabla();
