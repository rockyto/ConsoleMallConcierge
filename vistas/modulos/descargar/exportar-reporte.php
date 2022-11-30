<?php


require_once "../../../controladores/registros.controlador.php";

require_once "../../../modelos/registros.modelos.php";

require_once "../../../controladores/centroscomerciales.controlador.php";
require_once "../../../modelos/centroscomerciales.modelo.php";


require_once "../../../controladores/registro.intereses.controlador.php";
require_once "../../../modelos/registro-intereses.modelo.php";

require_once "../../../controladores/intereses.controlador.php";
require_once "../../../modelos/intereses.modelo.php";

$reporte = new ControladorRegistros();
$reporte -> ctrDescargarRegistros();

$reporteIntereses = new ControladorRegistroIntereses();
$reporteIntereses -> ctrDescargarRegistrosIntereses();