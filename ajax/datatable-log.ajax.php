<?php

require_once "../controladores/logconsole.controlador.php";
require_once "../modelos/logconsole.modelo.php";

class TablaLog{

    public function mostrarLog(){

        $item = null;
        $valor = null;

        //editar
        $log = ControladorLog::ctrMostrarLog($item, $valor);

        echo '{
			"data": [';

        for($i =0; $i < count($log)-1; $i++){

            echo '[
            "'.($i+1).'",
            "'.$log[$i]["cc_user_console"].'",
            "'.$log[$i]["cc_log_tipe"].'",
            "'.$log[$i]["cc_date_activity"].'"
            ],';

        }

        echo'[
        "'.count($log).'",
        "'.$log[count($log)-1]["cc_user_console"].'",
        "'.$log[count($log)-1]["cc_log_tipe"].'",
        "'.$log[count($log)-1]["cc_date_activity"].'"
        ]    
    ]
    }';

    }

}
$activar = new TablaLog();
$activar->mostrarLog();