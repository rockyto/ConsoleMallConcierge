<?php

class ControladorCentrosComerciales{
    /*=============================================
                    MUESTRA PRODUCTO
    =============================================*/
    static public function ctrCentrosComerciales($item, $valor){

        $tabla = "ccUsersAdmin";
        $respuesta = ModeloCentrosComerciales::mdlMostrarCentrosComerciales($tabla, $item, $valor);
        return $respuesta;

	}

    static public function ctrCreaCentrosComerciales(){

        if(isset($_POST["ccUser"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ccNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ccUser"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                $ruta = "";

                if(isset($_FILES["nuevoLogo"]["tmp_name"])){

                    list($ancho, $alto) = getimagesize($_FILES["nuevoLogo"]["tmp_name"]);

                    $nuevoAncho = 211;
                    $nuevoAlto = 113;

                    /*=============================================
                            PARA CREAR EL NUEVO DIRECTORIO
                    =============================================*/

                    $directorio = "vistas/img/slides/logoscc/".$_POST["ccUser"];

                    mkdir($directorio, 0755);

                    /*=============================================
             SEGÚN EL TIPO DE IMAGEN SE APLICAN FUNCIONES POR DEFECTO
                   =============================================*/

                    if($_FILES["nuevoLogo"]["type"] == "image/jpeg"){

                        /*=============================================
                                SE GUARDA EN EL DIRECTORIO IMAGEN JPG
                        =============================================*/

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/slides/logoscc/".$_POST["ccUser"].".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevoLogo"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);

                    }
                    if($_FILES["nuevoLogo"]["type"] == "image/png"){

                        /*=============================================
                                    SE GUARDA EN EL DIRECTORIO IMAGEN PNG
                        =============================================*/

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/slides/logoscc/".$_POST["ccUser"].".png";

                        $origen = imagecreatefrompng($_FILES["nuevoLogo"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);

                    }

                }

                $tabla = "ccUsersAdmin";
                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array("cc_name" => $_POST["ccNombre"],
                    "cc_user" => $_POST["ccUser"],
                    "cc_ColorForm" => $_POST["ccColorForm"],
                    "cc_psswd" => $encriptar,
                    "ccLogo" => $ruta);

                $respuesta = ModeloCentrosComerciales::mdlCreaCentrosComerciales($tabla, $datos);

                date_default_timezone_set('America/Mexico_City');

                $fecha = date('Y-m-d');
                $hora = date('H:i:s');

                $fechaActual = $fecha.' '.$hora;

                $tablaLog = "logActivityConsole";

                $usuarioActivo = $_SESSION["cc_user_console"];

                $tipeActivity = "".$usuarioActivo." Registró un nuevo usuario para Centros comerciales: ". $_POST["ccUser"];

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

									window.location = "users-centros-comerciales";

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

							window.location = "users-centros-comerciales";

						}

					});
				</script>';
            }
        }//LLAVE QUE FINALIZA LA CONDICIÓN "NUEVO USUARIO"
    } //LLAVE QUE FINALIZA LA CLASE "ctrCreaCentrosComerciales"

    static public function ctrEditarUserCC(){

        if(isset($_POST["editaCCUser"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editaCCNombre"])){
                
                $ruta = "";
                
                if(isset($_FILES["nuevoLogo"]["tmp_name"])){
                    
                    list($ancho, $alto) = getimagesize($_FILES["nuevoLogo"]["tmp_name"]);
                    
                    $nuevoAncho = 211;
                    $nuevoAlto = 113;
                    
                    $directorio = "vistas/img/slides/logoscc/".$_POST["editaCCUser"];

					mkdir($directorio, 0755);
					
					if($_FILES["nuevoLogo"]["type"] == "image/jpeg"){
					    
					    $ruta = "vistas/img/slides/logoscc/".$_POST["editaCCUser"].".jpg";
					    
					    $origen = imagecreatefromjpeg($_FILES["nuevoLogo"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					    
					}
					
					if($_FILES["nuevoLogo"]["type"] == "image/png"){

							/*=============================================
										SE GUARDA EN EL DIRECTORIO IMAGEN PNG
							=============================================*/
							

							$ruta = "vistas/img/slides/logoscc/".$_POST["editaCCUser"].".png";

							$origen = imagecreatefrompng($_FILES["nuevoLogo"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino, $ruta);

						}
                }

                $tabla = "ccUsersAdmin";

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

								window.location = "users-centros-comerciales";

							}

						});
					</script>';

                    }

                }else{

                    $encriptar = $_POST["passwordActual"];

                }

                $datos = array("cc_name"=> $_POST["editaCCNombre"],
                    "cc_user"=> $_POST["editaCCUser"],
                    "cc_id"=>$_POST["idUsuarioCC"],
                    "cc_ColorForm" => $_POST["editacc_ColorForm"],
                    "ccLogo" => $ruta,
                    "cc_psswd"=> $encriptar);

                $respuesta = ModeloCentrosComerciales::mdlEditarCC($tabla, $datos);

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
							window.location = "users-centros-comerciales";
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

						window.location = "users-centros-comerciales";

					}
				})
			</script>';

            }
        }

    }

    static public function ctrBorrarUserCC(){

        if(isset($_GET["idUsersCC"])){

            $tabla = "ccUsersAdmin";

            $datos = $_GET["idUsersCC"];

            $respuesta = ModeloCentrosComerciales::mdlBorrarUserCC($tabla, $datos);

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

							window.location = "users-centros-comerciales";

							}
						})

			</script>';
            }
        }
    }
}