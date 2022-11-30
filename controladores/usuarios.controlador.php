<?php

class ControladorUsuarios{

	/*=============================================
	             INGRESO DE USUARIOS
	=============================================*/
	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){


			    $encriptar = crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			   	$tabla = "ccUsersAdmin";

			    $item = "cc_user";
			    $valor = $_POST["ingUsuario"];

			    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

					if($respuesta["cc_user"] == $_POST["ingUsuario"] && $respuesta["cc_psswd"] == $encriptar){

						if($respuesta["estadoAdmin"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["cc_id"] = $respuesta["cc_id"];
						$_SESSION["cc_name"] = $respuesta["cc_name"];
						$_SESSION["cc_user"] = $respuesta["cc_user"];

						/*=============================================
						             ULTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Mexico_City');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$tablaLog = "logActivityConsole";

						$tipeActivity = "Login";

						$datos = array("cc_user_console" => $respuesta["cc_user"], 
						"cc_log_tipe" => $tipeActivity, 
						"cc_date_activity" => $fechaActual);

						$ultimoLogin = ModeloLog::mdlRecordLog($tablaLog, $datos);

						if($ultimoLogin == "ok"){
                            
                            echo '<script>
                            window.location = "inicio";
                            </script>';
						}

					}else{

						echo '<br>
						<div class="alert alert-danger">Cuenta aún no activada.</div>';
						
					}

			}else{

						echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo.</div>';

					}

			}

		}

	}


	/*=============================================
				CREA NUEVO USUARIO
	=============================================*/
    static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){


					 $ruta = "";

					 if(isset($_FILES["nuevaFoto"]["tmp_name"])){

						 list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

						 $nuevoAncho = 500;
						 $nuevoAlto = 500;

						 /*=============================================
						         PARA CREAR EL NUEVO DIRECTORIO
						 =============================================*/

						 $directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

						 mkdir($directorio, 0755);

						 /*=============================================
				  SEGÚN EL TIPO DE IMAGEN SE APLICAN FUNCIONES POR DEFECTO
						=============================================*/

						if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

							/*=============================================
									SE GUARDA EN EL DIRECTORIO IMAGEN JPG
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino, $ruta);

						}
						if($_FILES["nuevaFoto"]["type"] == "image/png"){

							/*=============================================
										SE GUARDA EN EL DIRECTORIO IMAGEN PNG
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

							$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino, $ruta);

						}

					 }

					 $tabla = "tblUsuariogents";

					 $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					 $datos = array("nombreUsuario" => $_POST["nuevoNombre"],
				 								 	 "usuarioGents" => $_POST["nuevoUsuario"],
													 "passwordUsuario" => $encriptar,
													 "perfilGents" => $_POST["nuevoPerfil"],
													 "fotoUsuarioGents"=>$ruta);

					$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "Nuevo usuario registrado",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

							}).then((result)=>{

								if(result.value){

									window.location = "usuarios";

								}

							});

						</script>';

					}

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "El campo usuario no puede llevar caracteres especiales",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){

							window.location = "usuarios";

						}

					});
				</script>';
			}
		}//LLAVE QUE FINALIZA LA CONDICIÓN "NUEVO USUARIO"
	} //LLAVE QUE FINALIZA LA CLASE "ctrCrearUsuario"

	/*=============================================
	                MUESTRA USUARIOS
	=============================================*/
	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "tblUsuariogents";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
			        EDITAR USUARIO
	=============================================*/
	static public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

			$ruta = $_POST["fotoActual"];

			if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
						PARA CREAR EL NUEVO DIRECTORIO
				=============================================*/

				$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

				/*=============================================
	 					SE PREGUNTA SI EXISTE IMAGE EN LA BD
			 =============================================*/

			 if(!empty($_POST["fotoActual"])){

				 unlink($_POST["fotoActual"]);

			 }else{
				 mkdir($directorio, 0755);
			 }

				mkdir($directorio, 0755);

				/*=============================================
	 SEGÚN EL TIPO DE IMAGEN SE APLICAN FUNCIONES POR DEFECTO
			 =============================================*/

			 if($_FILES["editarFoto"]["type"] == "image/jpeg"){

				 /*=============================================
						 SE GUARDA EN EL DIRECTORIO IMAGEN JPG
				 =============================================*/

				 $aleatorio = mt_rand(100,999);

				 $ruta = "vistas/img/usuarios/".$_POST["editarFoto"]."/".$aleatorio.".jpg";

				 $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

				 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				 imagejpeg($destino, $ruta);

			 }
			 if($_FILES["nuevaFoto"]["type"] == "image/png"){

				 /*=============================================
							 SE GUARDA EN EL DIRECTORIO IMAGEN PNG
				 =============================================*/

				 $aleatorio = mt_rand(100,999);

				 $ruta = "vistas/img/usuarios/".$_POST["editarFoto"]."/".$aleatorio.".png";

				 $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

				 $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				 imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				 imagepng($destino, $ruta);

			 }

			}

			$tabla = "tblUsuariogents";

			if($_POST["editarPassword"] != ""){

				if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

					$encriptar = crypt($_POST["editarPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				}else{

					echo '<script>

						swal({

							type: "error",
							title: "La contraseña no puede llevar carácteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false

						}).then((result)=>{

							if(result.value){

								window.location = "usuarios";

							}

						});
					</script>';

				}

			}else{


				$encriptar = $passwordActual;


			}

			$datos = array("nombreUsuario" => $_POST["editarNombre"],
                           "usuarioGents" => $_POST["editarUsuario"],
                           "passwordUsuario" => $encriptar,
                           "perfilGents" => $_POST["editarPerfil"],
                           "fotoUsuarioGents"=>$ruta);

			$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo '<script>
					swal({
						type: "success",
						title: "El usuario se ha modificado",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
					}).then((result) => {
						if (result.value){
							window.location = "usuarios";
						}
					})
				</script>';

			}

		}else{
			echo'<script>
				swal({
					type:"error",
					title:"El usuario no puede contener carácteres especiales",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
				}).then((result) => {
					if (result.value){

						window.location = "usuarios";

					}
				})
			</script>';
		}
	}

}

    /*=============================================
					BORRAR USUARIO
    =============================================*/
    static public function ctrBorrarUsuario(){

	if(isset($_GET["idUsuario"])){

		$tabla = "tblUsuariogents";
		$datos = $_GET["idUsuario"];

		if($_GET["fotoUsuario"] != ""){

			unlink($_GET["fotoUsuario"]);
			rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

		}

		$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);
		if ($respuesta == "ok"){

			echo'<script>

			swal({
					type: "success",
					title: "El usuario ha sido borrado correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then((result) => {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			</script>';
		}
	}

}

}