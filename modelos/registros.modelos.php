<?php

require_once "conexion.php";
//ModeloRegistros::mdlMostrarRegistros
class ModeloRegistros{

    /*=============================================
                    MUESTRA PRODUCTOS
    =============================================*/
    static public function mdlMostrarRegistros($tabla, $item, $valor){

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

    static public function mdlMostrarRangoRegistros($tabla, $fechaInicial, $fechaFinal){

        if($fechaInicial == $fechaFinal){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE dateRecordClient like '%$fechaFinal%'");

            $stmt -> bindParam(":dateRecordClient", $fechaFinal, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt ->fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE dateRecordClient BETWEEN '$fechaInicial' AND '$fechaFinal'");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }

    static public function mdlMandaRegsPorCC($tabla, $item, $valor){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item"); //ORDER BY id DESC

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetchAll();


        $stmt -> close();
        $stmt = null;


    }



}