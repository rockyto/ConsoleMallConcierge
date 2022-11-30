<?php

require_once "../controladores/registro.intereses.controlador.php";
require_once "../modelos/registro-intereses.modelo.php";

class ajaxRegistrosIntereses{

    public $fechaInicialIntereses;
    public $fechaFinalIntereses;

    public function ajaxRangoFechas(){

        if($this->fechaInicialIntereses == "" && $this->fechaFinalIntereses == ""){

            $fechaInicialIntereses = null;
            $fechaFinalIntereses = null;

        }else{

            $fechaInicialIntereses = $this->fechaInicialIntereses;
            $fechaFinalIntereses = $this->fechaFinalIntereses;

        }

        $respuesta = ControladorRegistroIntereses::ctrMostrarRangoRegistrosIntereses($fechaInicialIntereses, $fechaFinalIntereses);

        echo json_encode($respuesta);

    }
}

if(isset($_POST["fechaInicialIntereses"])){

    $rango = new ajaxRegistrosIntereses();
    $rango -> fechaInicialIntereses = $_POST["fechaInicialIntereses"];
    $rango -> fechaFinalIntereses = $_POST["fechaFinalIntereses"];
    $rango -> ajaxRangoFechas();

}

