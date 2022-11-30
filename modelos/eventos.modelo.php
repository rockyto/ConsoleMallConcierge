<?php

require_once "conexion.php";

class ModeloEventos{

    static public function mdlMostrarEventos($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlNuevoEvento($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ccEventName) VALUES (:ccEventName)");
        $stmt->bindParam(":ccEventName", $datos["ccEventName"],PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    static public function mdlEditaEvento($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ccEventName = :ccEventName WHERE ccEventID = :ccEventID");

        $stmt->bindParam(":ccEventID", $datos["ccEventID"], PDO::PARAM_STR);
        $stmt->bindParam(":ccEventName", $datos["ccEventName"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;

    }

    static public function mdlBorrarEvento($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ccEventID = :ccEventID");

        $stmt -> bindParam(":ccEventID", $datos, PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;

    }

}

