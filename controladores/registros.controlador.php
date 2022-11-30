<?php


class ControladorRegistros{

    /*=============================================
                    MUESTRA REGISTROS
    =============================================*/
    static public function ctrMostrarRegistros($item, $valor){

        $tabla = "ccRecordsClients";

        $respuesta = ModeloRegistros::mdlMostrarRegistros($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrMostrarRangoRegistro($fechaInicial, $fechaFinal){

        $tabla = "ccRecordsClients";

        $respuesta = ModeloRegistros::mdlMostrarRangoRegistros($tabla, $fechaInicial, $fechaFinal);

        return $respuesta;
    }

    static public function ctrDescargarRegistros(){

        if(isset($_GET["reporte"])){

            $name = "";

            $tabla = "ccRecordsClients";

            if (isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

                $registros = ModeloRegistros::mdlMostrarRangoRegistros($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

                $name = "ReporteDel". $_GET["fechaInicial"]. "-al-". $_GET["fechaFinal"]. '.xls';

            }else{

                $item = "";
                $valor = "";

                if(isset($_GET["ccID"])){

                    $item = "ccID";
                    $valor = $_GET["ccID"];

                    $name = "ReportePorCentroComercial".'.xls';

                    $registros = ModeloRegistros::mdlMostrarRegistros($tabla, $item, $valor);

                }else{

                    $item = null;
                    $valor = null;

                    $name = "ReporteGeneral".'.xls';
                }

                $registros = ModeloRegistros::mdlMostrarRegistros($tabla, $item, $valor);


            }

            header('Expires: 0');
            header('Cache-control: private');
            header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
            header("Cache-Control: cache, must-revalidate");
            header('Content-Description: File Transfer');
            header('Last-Modified: '.date('D, d M Y H:i:s'));
            header("Pragma: public");
            header('Content-Disposition:; filename="'.$name.'"');
            header("Content-Transfer-Encoding: binary");


            echo ("<table>
            <tr>
            <td style='font-weight:bold; border: 1px solid #eee;'>Nombre</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Apellido</td>

            <td style='font-weight:bold; border: 1px solid #eee;'>Genero</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Edad</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Colonia</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>C&oacute;digo postal</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Delegaci&oacute;n o municipio</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Ciudad</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Correo</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Celular</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Centro Comercial registrado</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Fecha de registro</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Evento</td>
            </tr>");

            foreach ($registros as $row => $item){

                $plazas = ControladorCentrosComerciales::ctrCentrosComerciales("cc_id", $item["ccID"]);

                echo ("<tr>
                    <td style='border: 1px solid #eee;'>".$item["clientName"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["clientLastName"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["clientGenre"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["clientAge"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["clientSuburb"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["clientZipCode"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["clientTown"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["clientCity"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["clientMail"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["clientCell"]."</td>  
                    <td style='border: 1px solid #eee;'>".$plazas["cc_name"]."</td>
                    <td style='border: 1px solid #eee;'>".$item["dateRecordClient"]."</td>  
                    <td style='border: 1px solid #eee;'>".$item["cc_event"]."</td>
                                        </tr>");
            }

            echo "</table>";

        }
    }

}