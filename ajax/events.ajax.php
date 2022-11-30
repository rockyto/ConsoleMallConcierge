<?php
require_once "../controladores/eventos.controlador.php";
require_once "../modelos/eventos.modelo.php";

class AjaxEventos{

    /*=============================================
                EDITAR USUARIO CONSOLA
    =============================================*/

    public $idEvents;
    public function ajaxEditaEvento(){

        $item = "ccEventID";
        $valor = $this->idEvents;
        $respuesta = ControladorEventos::ctrMostrarEventos($item, $valor);
        echo json_encode($respuesta);

    }

}

if(isset($_POST["idEvents"])){

    $editar = new AjaxEventos();
    $editar -> idEvents = $_POST["idEvents"];
    $editar -> ajaxEditaEvento();

}
