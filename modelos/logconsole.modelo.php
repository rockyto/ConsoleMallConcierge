<?php

require_once "conexion.php";

class ModeloLog{
    
    static public function mdlRecordLog($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cc_user_console, cc_log_tipe, cc_date_activity) VALUES (:cc_user_console, :cc_log_tipe, :cc_date_activity)");

        $stmt->bindParam(":cc_user_console", $datos["cc_user_console"], PDO::PARAM_STR);
        $stmt->bindParam(":cc_log_tipe", $datos["cc_log_tipe"], PDO::PARAM_STR);
        $stmt->bindParam(":cc_date_activity", $datos["cc_date_activity"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        
        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    static public function mdlMostrarLog($tabla){
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY cc_date_activity DESC");
        
        $stmt -> execute();
        
        return $stmt -> fetchAll();
        
        $stmt -> close();

        $stmt = null;
        
    }
}