<?php

require_once "conexion.php";

class ModeloUsersConsole{

    static public function mdlMostrarUsersConsole($tabla, $item, $valor){

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

    static public function mdlCreateNewUserConsole($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cc_name_console, cc_user_console, cc_psswd_console) VALUES (:cc_name_console, :cc_user_console, :cc_psswd_console)");
        
        $stmt->bindParam(":cc_name_console", $datos["cc_name_console"],PDO::PARAM_STR);
        $stmt->bindParam(":cc_user_console", $datos["cc_user_console"],PDO::PARAM_STR);
        $stmt->bindParam(":cc_psswd_console", $datos["cc_psswd_console"],PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    static public function mdlActualizaUsuario($tabla, $item1, $valor1, $item2, $valor2){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt -> close();
        $stmt = null;
    }

    static public function mdlEditarUserConsole($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cc_name_console = :cc_name_console, cc_user_console = :cc_user_console, cc_psswd_console = :cc_psswd_console WHERE id_ccUsersConsole = :id_ccUsersConsole");

        $stmt->bindParam(":cc_name_console", $datos["cc_name_console"],PDO::PARAM_STR);
        $stmt->bindParam(":cc_user_console", $datos["cc_user_console"],PDO::PARAM_STR);
        $stmt->bindParam(":cc_psswd_console", $datos["cc_psswd_console"],PDO::PARAM_STR);
        $stmt->bindParam(":id_ccUsersConsole", $datos["id_ccUsersConsole"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;

    }

    static public function mdlBorrarUserConsole($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_ccUsersConsole = :idUsuario");

        $stmt -> bindParam(":idUsuario", $datos, PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;

    }

}