<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	                MOSTRAR USUARIOS
	=============================================*/
	static public function mdlMostrarUsuarios($tabla, $item, $valor){

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

	/*=============================================
	                REGISTRO DE USUARIOS
	=============================================*/
	static public function mdlIngresarUsuario($tabla, $datos){

	 $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreUsuario, usuarioGents, passwordUsuario, perfilGents, fotoUsuarioGents) VALUES (:nombreUsuario, :usuarioGents, :passwordUsuario, :perfilGents, :fotoUsuarioGents)");

	 $stmt->bindParam(":nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
	 $stmt->bindParam(":usuarioGents", $datos["usuarioGents"], PDO::PARAM_STR);
	 $stmt->bindParam(":passwordUsuario", $datos["passwordUsuario"], PDO::PARAM_STR);
	 $stmt->bindParam(":perfilGents", $datos["perfilGents"], PDO::PARAM_STR);
	 $stmt->bindParam(":fotoUsuarioGents", $datos["fotoUsuarioGents"], PDO::PARAM_STR);

	 if($stmt->execute()){

		 return "ok";

	 }else{

		 return "error";

	 }

	 $stmt->close();

	 $stmt = null;

}

    /*=============================================
                     EDITAR USUARIO
    =============================================*/
    static public function mdlEditarUsuario($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreUsuario = :nombreUsuario, usuarioGents = :usuarioGents, passwordUsuario = :passwordUsuario, perfilGents = :perfilGents, fotoUsuarioGents = :fotoUsuarioGents WHERE usuarioGents = :usuarioGents");

	$stmt->bindParam(":nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
	$stmt->bindParam(":usuarioGents", $datos["usuarioGents"], PDO::PARAM_STR);
	$stmt->bindParam(":passwordUsuario", $datos["passwordUsuario"], PDO::PARAM_STR);
	$stmt->bindParam(":perfilGents", $datos["perfilGents"], PDO::PARAM_STR);
	$stmt->bindParam(":fotoUsuarioGents", $datos["fotoUsuarioGents"], PDO::PARAM_STR);

	if($stmt -> execute()){

		return "ok";

	}else{

		return "error";

	}
	$stmt -> close();

	$stmt = null;
}

    /*=============================================
                    ACTUALIZAR USUARIO
    =============================================*/
    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

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

    /*=============================================
                       BORRAR USUARIO
    =============================================*/
    static public function mdlBorrarUsuario($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuarioGents = :idUsuario");

	$stmt -> bindParam(":idUsuario", $datos, PDO::PARAM_INT);

	if($stmt -> execute()){

		return "ok";

	}else{

		return "error";

	}

	$stmt -> close();

	$stmt = null;

}


}
