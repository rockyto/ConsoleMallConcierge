<?php

require_once "conexion.php";

class ModeloRegistroIntereses{


    static public function mdlMostrarIntereses($tabla, $item, $valor){
        
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

    static public function mdlMostrarRangoRegistrosIntereses($tabla, $fechaInicialIntereses, $fechaFinalIntereses){

        if($fechaInicialIntereses == $fechaFinalIntereses){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechaRegistroInt like '%$fechaFinalIntereses%'");

            $stmt -> bindParam(":fechaRegistroInt", $fechaFinalIntereses, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetchAll();
        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fechaRegistroInt BETWEEN '$fechaInicialIntereses' AND '$fechaFinalIntereses'");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();
        $stmt = null;
    }

}