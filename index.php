<?php

//Controladores
require_once "controladores/registros.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/centroscomerciales.controlador.php";
require_once "controladores/usersconsole.controlador.php";
require_once "controladores/eventos.controlador.php";
require_once "controladores/intereses.controlador.php";
require_once "controladores/registro.intereses.controlador.php";

//Modelos
require_once "modelos/registros.modelos.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/logconsole.modelo.php";
require_once "modelos/centroscomerciales.modelo.php";
require_once "modelos/usersconsole.modelo.php";
require_once "modelos/eventos.modelo.php";
require_once "modelos/intereses.modelo.php";
require_once "modelos/registro-intereses.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();