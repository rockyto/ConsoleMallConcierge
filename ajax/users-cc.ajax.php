<?php

require_once "../controladores/centroscomerciales.controlador.php";
require_once "../modelos/centroscomerciales.modelo.php";

class AjaxUsersCC{

    /*=============================================
           EDITAR USUARIO CENTROS COMERCIALES
    =============================================*/

    public $idUsersCC;
    public function ajaxEditaUsersCC(){

        $item = "cc_id";
        $valor = $this->idUsersCC;
        $respuesta = ControladorCentrosComerciales::ctrCentrosComerciales($item, $valor);
        echo json_encode($respuesta);

    }

}

if(isset($_POST["idUsersCC"])){

    $editar = new AjaxUsersCC();
    $editar -> idUsersCC = $_POST["idUsersCC"];
    $editar -> ajaxEditaUsersCC();

}
