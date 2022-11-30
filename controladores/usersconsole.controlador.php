<?php 

class ControladorUsersConsole{

    /*=============================================
	        INGRESO DE USUARIOS DE CONSOLA
	=============================================*/

    static public function ctrIngresoUsersConsole(){

        if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){


			    $encriptar = crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			    $tabla = "ccUsersConsole";

			    $item = "cc_user_console";
			    $valor = $_POST["ingUsuario"];

			    $respuesta = ModeloUsersConsole::mdlMostrarUsersConsole($tabla, $item, $valor);

					if($respuesta["cc_user_console"] == $_POST["ingUsuario"] && $respuesta["cc_psswd_console"] == $encriptar){

						if($respuesta["estadoAdmin"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id_ccUsersConsole"] = $respuesta["id_ccUsersConsole"];
						$_SESSION["cc_name_console"] = $respuesta["cc_name_console"];
						$_SESSION["cc_user_console"] = $respuesta["cc_user_console"];

						/*=============================================
						                ULTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Mexico_City');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$tablaLog = "logActivityConsole";

						$tipeActivity = "Login";

						$datos = array("cc_user_console" => $respuesta["cc_user_console"], 
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

    static public function ctrMostrarUsuariosConsole($item, $valor){

        $tabla = "ccUsersConsole";

        $respuesta = ModeloUsersConsole::mdlMostrarUsersConsole($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrCreateNewUserConsole(){

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

					 $tabla = "ccUsersConsole";

					 $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					 $datos = array("cc_name_console" => $_POST["nuevoNombre"],
				 					"cc_user_console" => $_POST["nuevoUsuario"],
									"cc_psswd_console" => $encriptar);

					$respuesta = ModeloUsersConsole::mdlCreateNewUserConsole($tabla, $datos);


                date_default_timezone_set('America/Mexico_City');

                $fecha = date('Y-m-d');
                $hora = date('H:i:s');

                $fechaActual = $fecha.' '.$hora;

                $tablaLog = "logActivityConsole";

                $tipeActivity = "".$_SESSION["cc_user_console"]." Registró un nuevo usuario para consola: ". $_POST["nuevoUsuario"];

                $datos = array("cc_user_console" => $_SESSION["cc_user_console"],
                    "cc_log_tipe" => $tipeActivity,
                    "cc_date_activity" => $fechaActual);

                $recordLog = ModeloLog::mdlRecordLog($tablaLog, $datos);


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

									window.location = "users-console";

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

							window.location = "users-console";

						}

					});
				</script>';
			}
		}//LLAVE QUE FINALIZA LA CONDICIÓN "NUEVO USUARIO"
	} 
	
    static public function ctrEditarUserConsole(){

        if(isset($_POST["editarUsuario"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

                $tabla = "ccUsersConsole";

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

								window.location = "users-console";

							}

						});
					</script>';

                    }

                }else{

                    $encriptar = $_POST["passwordActual"];

                }

                $datos = array("cc_name_console"=> $_POST["editarNombre"],
                               "cc_user_console"=> $_POST["editarUsuario"],
                               "id_ccUsersConsole"=>$_POST["idUsuarioConsola"],
                               "cc_psswd_console"=> $encriptar);

                $respuesta = ModeloUsersConsole::mdlEditarUserConsole($tabla, $datos);

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
							window.location = "users-console";
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

						window.location = "users-console";

					}
				})
			</script>';

            }
        }

    }
    
    static public function ctrBorrarUsuarioConsola(){

        if(isset($_GET["idUsersConsole"])){

            $tabla = "ccUsersConsole";

            $datos = $_GET["idUsersConsole"];

            $respuesta = ModeloUsersConsole::mdlBorrarUserConsole($tabla, $datos);

            if ($respuesta == "ok"){

                echo'<script>

			swal({
					type: "success",
					title: "El usuario ha quedado eliminado",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then((result) => {
							if (result.value) {

							window.location = "users-console";

							}
						})

			</script>';
            }
        }
    }


}