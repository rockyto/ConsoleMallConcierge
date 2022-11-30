<?php

class ControladorLog{

    /*
        static public function ctrNewUserConsole(){
        if(isset($_POST["newAdminConsole"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                $tabla = "";
            }
        }
    }
    */

    static public function ctrRecordLog(){

        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $tabla = "logActivityConsole";
        $fechaActual = $fecha.' '.$hora;
       
        $datos = array("cc_user_console" => $_POST["userConsole"], 
        "cc_log_tipe" => $_POST["logTipe"], 
        "cc_date_activity" => $fechaActual);

        $respuesta =  ModeloLog::mdlRecordLog($tabla, $datos);

    }

    static public function ctrMostrarLog(){

        $tabla = "logActivityConsole";
        
        $respuesta = ModeloLog::mdlMostrarLog($tabla);
        
        return $respuesta;

    }


}