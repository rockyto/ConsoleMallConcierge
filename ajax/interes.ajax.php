<?php
require_once "../controladores/intereses.controlador.php";
require_once "../modelos/intereses.modelo.php";

class AjaxInteres{

    /*=============================================
                EDITAR USUARIO CONSOLA
    =============================================*/

    public $idInteres;
    public function ajaxEditaInteres(){

        $item = "idInteres";
        $valor = $this->idInteres;
       // $respuesta = ControladorInteres::ctrMostrarInteres($item, $valor);
       $respuesta = ControladorIntereses::ctrMostrarIntereses($item, $valor);
       
        echo json_encode($respuesta);

    }

}

if(isset($_POST["idInteres"])){

    $editar = new AjaxInteres();
    $editar -> idInteres = $_POST["idInteres"];
    $editar -> ajaxEditaInteres();

}
