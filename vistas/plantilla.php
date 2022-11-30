<?php

session_start();
//Comprobamos si esta definida la sesión 'tiempo'.
if(isset($_SESSION['tiempo']) ) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 7200;

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];

    //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
    if($vida_session > $inactivo)
    {
        //Removemos sesión.
        session_unset();
        //Destruimos sesión.
        session_destroy();
        //Redirigimos pagina.
        header("Location: inicio");

        exit();
    } else {  // si no ha caducado la sesion, actualizamos
        $_SESSION['tiempo'] = time();
    }


} else {
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = time();
}

?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>GSM APP</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <script src="vistas/bower_components/moment/moment.js"></script>
    <link rel="stylesheet" href="vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Date range picker -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

    <!-- SweetAlert -->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>


<!--=====================================
PLUGINS DE JAVASCRIPT
======================================-->

    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- ColorPick -->
    <script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>

    <!-- DataTables -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- daterangepicker -->
    <script src="vistas/bower_components/moment/min/moment.min.js"></script>
    <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>



</head>
<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

<?php

if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

  echo '<div class="wrapper">';

include "modulos/cabecera.php";

include "modulos/menu.php";


if(isset($_GET["ruta"])){

  if($_GET["ruta"] == "inicio" ||
     $_GET["ruta"] == "salir" ||
     $_GET["ruta"] == "log-activity" ||
     $_GET["ruta"] == "users-console"||
     $_GET["ruta"] == "users-centros-comerciales" ||
     $_GET["ruta"] == "events" ||
     $_GET["ruta"] == "intereses" ||
     $_GET["ruta"] == "registros-intereses"){

    include "modulos/".$_GET["ruta"].".php";

  }else{

    include "modulos/404.php";

  }
}else{

  include "modulos/inicio.php";

}

include "modulos/footer.php";

echo '</div>';

}else{

  include "modulos/login.php";

}
?>

    <script src="vistas/js/users-cc.js"></script>
    <script src="vistas/js/users-console.js"></script>
    <script src="vistas/js/registros.js"></script>
    <script src="vistas/js/registros-intereses.js"></script>
    <script src="vistas/js/log.js"></script>
    <script src="vistas/js/events.js"></script>
    <script src="vistas/js/intereses.js"></script>

    <script src="vistas/bower_components/fullcalendar/dist/locale/es.js"></script>
    <script src="vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

</body>

</html>