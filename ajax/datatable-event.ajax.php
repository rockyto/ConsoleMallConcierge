<?php

require_once "../controladores/eventos.controlador.php";
require_once "../modelos/eventos.modelo.php";

class TablaEventos{

    public function mostrarEventos(){

        $item = null;
        $valor = null;

        $eventos = ControladorEventos::ctrMostrarEventos($item, $valor);

        echo '{
			"data": [';

        for($i =0; $i < count($eventos)-1; $i++){

            echo '[
            "'.($i+1).'",
            "'.$eventos[$i]["ccEventName"].'",
            "'.$eventos[$i]["ccEventID"].'"
            ],';

        }

        echo'[
        "'.count($eventos).'",
        "'.$eventos[count($eventos)-1]["ccEventName"].'",
        "'.$eventos[count($eventos)-1]["ccEventID"].'"
        ]    
    ]
    }';

    }

}
$activar = new TablaEventos();
$activar->mostrarEventos();