<?php

require_once "../controladores/registros.controlador.php";
require_once "../modelos/registros.modelos.php";

require_once "../controladores/centroscomerciales.controlador.php";
require_once "../modelos/centroscomerciales.modelo.php";


class TablaRegistros{

    /*=============================================
             MOSTRAR LA TABLA DEL REGISTRO
    =============================================*/

    public function mostrarTabla(){

        $item = null;
        $valor = null;

        $registros = ControladorRegistros::ctrMostrarRegistros($item, $valor);

    echo '{
            "data": [';

            for($i = 0; $i < count($registros)-1; $i++){

                $item = "cc_id"; //ID de la tabla CentrosComerciales (llave primaria)
                $valor = $registros[$i]["ccID"]; //ID como llave foranea de la tabla Registros

                $centroscomerciales = ControladorCentrosComerciales::ctrCentrosComerciales($item, $valor);

                    echo '[
                        "'.($i+1).'",
                        "'.$registros[$i]["clientName"].'",
                        "'.$registros[$i]["clientLastName"].'",
                        "'.$registros[$i]["clientAge"].'",
                        "'.$registros[$i]["clientGenre"].'",
                        "'.$centroscomerciales["cc_name"].'",
                        "'.$registros[$i]["dateRecordClient"].'",
                        "'.$registros[$i]["cc_event"].'"
                    ],';

                }

            $item = "cc_id";
            $valor = $registros[count($registros)-1]["ccID"];

            $centroscomerciales = ControladorCentrosComerciales::ctrCentrosComerciales($item, $valor);

            echo'[
                    "'.count($registros).'",
                    "'.$registros[count($registros)-1]["clientName"].'",
                    "'.$registros[count($registros)-1]["clientLastName"].'",
                    "'.$registros[count($registros)-1]["clientAge"].'",
                    "'.$registros[count($registros)-1]["clientGenre"].'",
                    "'.$centroscomerciales["cc_name"].'",
                    "'.$registros[count($registros)-1]["dateRecordClient"].'",
                    "'.$registros[count($registros)-1]["cc_event"].'"
               ]    
            ]
        }';
    }
}

$activar = new Tablaregistros();
$activar -> mostrarTabla();