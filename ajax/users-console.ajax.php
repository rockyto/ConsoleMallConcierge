<?php
require_once "../controladores/usersconsole.controlador.php";
require_once "../modelos/usersconsole.modelo.php";

class AjaxUsersConsole{

    /*=============================================
                EDITAR USUARIO CONSOLA
    =============================================*/

    public $idUsersConsole;
    public function ajaxEditaUsuario(){

        $item = "id_ccUsersConsole";
        $valor = $this->idUsersConsole;
        $respuesta = ControladorUsersConsole::ctrMostrarUsuariosConsole($item, $valor);
        echo json_encode($respuesta);

    }

    /*=============================================
                ACTIVAR USUARIO
    =============================================*/

    public $activarUsuarioConsola;
    public $activarId;

    public function ajaxActivarUsuarioConsola(){

        $tabla = "ccUsersConsole";

        $item1 = "estadoAdmin";
        $valor1 = $this->activarUsuarioConsola;

        $item2 = "id_ccUsersConsole";
        $valor2 = $this->activarId;

        $respuesta = ModeloUsersConsole::mdlActualizaUsuario($tabla, $item1, $valor1, $item2, $valor2);

    }

}

if(isset($_POST["idUsersConsole"])){

    $editar = new AjaxUsersConsole();
    $editar -> idUsersConsole = $_POST["idUsersConsole"];
    $editar -> ajaxEditaUsuario();

}

if(isset($_POST["activarUsuarioConsola"])){

    $activarUsuarioConsola = new AjaxUsersConsole();
    $activarUsuarioConsola ->activarUsuarioConsola = $_POST["activarUsuarioConsola"];
    $activarUsuarioConsola ->activarId = $_POST["activarId"];
    $activarUsuarioConsola -> ajaxActivarUsuarioConsola();

}