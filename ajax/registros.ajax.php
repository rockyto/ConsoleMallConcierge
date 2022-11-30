<?php

require_once "../controladores/registros.controlador.php";
require_once "../modelos/registros.modelos.php";

class ajaxRegistros{

    public $fechaInicial;
    public $fechaFinal;

    public function ajaxRangoFechas(){

        if($this->fechaInicial == "" && $this->fechaFinal == ""){

            $fechaInicial = null;
            $fechaFinal = null;

        }else{

            $fechaInicial = $this->fechaInicial;
            $fechaFinal = $this->fechaFinal;

        }

        $respuesta = ControladorRegistros::ctrMostrarRangoRegistro($fechaInicial, $fechaFinal);

        echo json_encode($respuesta);

    }
}


class AjaxRegisterClient{

    /*=============================================
           EDITAR USUARIO CENTROS COMERCIALES
    =============================================*/

    public $idClientRegister;
    public function ajaxselectClient(){

        $item = "idCCRecordsClients";
        $valor = $this->idClientRegister;
        $respuesta = ControladorRegistros::ctrMostrarRegistros($item, $valor);
        echo json_encode($respuesta);

    }

}

if(isset($_POST["idRecordClient"])){

    $editar = new AjaxRegisterClient();
    $editar -> idClientRegister = $_POST["idRecordClient"];
    $editar -> ajaxselectClient();

}

if(isset($_POST["fechaInicial"])){

    $rango = new ajaxRegistros();
    $rango -> fechaInicial = $_POST["fechaInicial"];
    $rango -> fechaFinal = $_POST["fechaFinal"];
    $rango -> ajaxRangoFechas();

}

