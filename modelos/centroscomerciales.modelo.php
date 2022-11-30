<?php

require_once "conexion.php";

class ModeloCentrosComerciales{

    /*=============================================
                    MUESTRA PRODUCTOS
    =============================================*/
    static public function mdlMostrarCentrosComerciales($tabla, $item, $valor){

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

    static public function mdlCreaCentrosComerciales($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cc_name, cc_user, cc_psswd, cc_ColorForm, ccLogo) VALUES (:cc_name, :cc_user, :cc_psswd, :cc_ColorForm, :ccLogo)");
        
        $stmt->bindParam(":cc_name", $datos["cc_name"],PDO::PARAM_STR); 
        $stmt->bindParam(":cc_user", $datos["cc_user"],PDO::PARAM_STR); 
        $stmt->bindParam(":cc_psswd", $datos["cc_psswd"],PDO::PARAM_STR);
        $stmt->bindParam(":cc_ColorForm", $datos["cc_ColorForm"], PDO::PARAM_STR);
        $stmt->bindParam(":ccLogo", $datos["ccLogo"], PDO::PARAM_STR);
        
        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlBorrarUserCC($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cc_id = :idUsuario");

        $stmt -> bindParam(":idUsuario", $datos, PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;

    }
    
    static public function mdlEditarCC($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cc_name = :cc_name, cc_user = :cc_user, cc_psswd = :cc_psswd, cc_ColorForm = :cc_ColorForm, ccLogo = :ccLogo WHERE cc_id = :cc_id");

        $stmt->bindParam(":cc_name", $datos["cc_name"],PDO::PARAM_STR);
        $stmt->bindParam(":cc_user", $datos["cc_user"],PDO::PARAM_STR);
        $stmt->bindParam(":cc_psswd", $datos["cc_psswd"],PDO::PARAM_STR);
        $stmt->bindParam(":cc_ColorForm", $datos["cc_ColorForm"], PDO::PARAM_STR);
        $stmt->bindParam(":ccLogo", $datos["ccLogo"], PDO::PARAM_STR);
        $stmt->bindParam(":cc_id", $datos["cc_id"], PDO::PARAM_INT);
        

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> closer();
        $stmt = null;

    }

}