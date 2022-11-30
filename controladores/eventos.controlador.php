<?php

class ControladorEventos{

    /*=============================================
                CREA NUEVO EVENTO
    =============================================*/
    static public function ctrCrearEvento(){

        if(isset($_POST["nuevoEvento"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEvento"])){

                $tabla = "ccEvents";

                $datos = array("ccEventName" => $_POST["nuevoEvento"]);

                $respuesta = ModeloEventos::mdlNuevoEvento($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

							swal({

								type: "success",
								title: "Nuevo evento creado",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

							}).then((result)=>{

								if(result.value){

									window.location = "events";

								}

							});

						</script>';
                }
            }
        }//LLAVE QUE FINALIZA LA CONDICIÓN "NUEVO USUARIO"
    } //LLAVE QUE FINALIZA LA CLASE "ctrCrearUsuario"

    static public function ctrMostrarEventos($item, $valor){

        $tabla = "ccEvents";

        $respuesta = ModeloEventos::mdlMostrarEventos($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrEditaEvento(){

        if(isset($_POST["editaEvento"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editaEvento"])){

                    $tabla = "ccEvents";

                    $datos = array("ccEventName"=> $_POST["editaEvento"], "ccEventID"=>$_POST["idEvents"]);

                    $respuesta = ModeloEventos::mdlEditaEvento($tabla, $datos);

                    if($respuesta == "ok"){

                        echo '<script>
					swal({
						type: "success",
						title: "El evento se ha modificado",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
					}).then((result) => {
						if (result.value){
							window.location = "events";
						}
					})
				</script>';

                    }else{

                        echo '<script>
					swal({
						type: "error",
						title: "El evento no se modificó",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
					}).then((result) => {
						if (result.value){
							window.location = "events";
						}
					})
				</script>';

                    }

                }
            }

    }


    static public function ctrBorrarEvento(){

        if(isset($_GET["idEvent"])){

            $tabla = "ccEvents";

            $datos = $_GET["idEvent"];

            $respuesta = ModeloEventos::mdlBorrarEvento($tabla, $datos);

            if ($respuesta == "ok"){

                echo'<script>

			swal({
					type: "success",
					title: "El evento ha sido eliminado",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then((result) => {
							if (result.value) {

							window.location = "events";

							}
						})

			</script>';
            }
        }
    }
}