<?php


class ControladorRegistroIntereses{

    static public function ctrMostrarIntereses($item, $valor){

        $tabla = "ccRecordsIntsClients";

        $respuesta = ModeloRegistroIntereses::mdlMostrarIntereses($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrMostrarRangoRegistrosIntereses($fechaInicialIntereses, $fechaFinalIntereses){

        $tabla = "ccRecordsIntsClients";

        $respuesta = ModeloRegistroIntereses::mdlMostrarRangoRegistrosIntereses($tabla, $fechaInicialIntereses, $fechaFinalIntereses);

        return $respuesta;

    }

    static public function ctrDescargarRegistrosIntereses(){

        if (isset($_GET["reporteIntereses"])){

            $name = "";
            $tabla = "ccRecordsIntsClients";

            if (isset($_GET["fechaInicialIntereses"]) && isset($_GET["fechaFinalIntereses"])){

                $name = "ReporteRegistroInteresesDel". $_GET["fechaInicialIntereses"]. "-al-". $_GET["fechaFinalIntereses"]. '.xls';

                $registrosIntereses = ModeloRegistroIntereses::mdlMostrarRangoRegistrosIntereses($tabla, $_GET["fechaInicialIntereses"], $_GET["fechaFinalIntereses"]);

            }else{

                $item = null;
                $valor = null;

                $name = "ReporteGeneralRegistroInteresesPorUsuario".'.xls';

                $registrosIntereses = ModeloRegistroIntereses::mdlMostrarIntereses($tabla, $item, $valor);

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
            <td style='font-weight:bold; border: 1px solid #eee;'>Edad</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Sexo</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Interés</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Correo</td>
            <td style='font-weight:bold; border: 1px solid #eee;'>Centro Comercial registrado</td>
            </tr>");

            foreach ($registrosIntereses as $row => $item){

                $registros = ControladorRegistros::ctrMostrarRegistros("idCCRecordsClients", $item["idRecordClient"]);
                $plazas = ControladorCentrosComerciales::ctrCentrosComerciales("cc_id", $registros["ccID"]);
                $interes = ControladorIntereses::ctrMostrarIntereses("idInteres", $item["idInteres"]);

                echo ("<tr>

                   <td style='border: 1px solid #eee;'>". $registros["clientName"]."</td>
                   <td style='border: 1px solid #eee;'>". $registros["clientAge"]."</td>
                   <td style='border: 1px solid #eee;'>". $registros["clientGenre"]."</td>
                   <td style='border: 1px solid #eee;'>".$interes["interesNombre"]."</td>
                   <td style='border: 1px solid #eee;'>". $registros["clientMail"]."</td>
                   <td style='border: 1px solid #eee;'>".$plazas["cc_name"]."</td>
                   </tr>");

            }
            echo "</table>";

        }
    }

}