<?php

class ControladorIntereses{

    /*=============================================
                CREA NUEVO Interes
    =============================================*/

    static public function ctrCrearInteres(){

        if(isset($_POST["nuevoInteres"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/ ]+$/', $_POST["nuevoInteres"])){

                $tabla = "ccIntereses";

                $datos = array("interesNombre" => $_POST["nuevoInteres"]);

                $respuesta = ModeloIntereses::mdlNuevoInteres($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

                    swal({
                        type: "success",
                        title: "Nuevo interés creado",
                        showConfirmButton: true, 
                        confirmButtonText: "Cerrar", 
                        closeOnConfirm: false
                    }).then((result)=>{

                        if(result.value){

                            window.location = "intereses";
                        }
                    });

                    </script>';

                }else{
                    echo '<script>

                    swal({
                        type: "error",
                        title: "Error al guardar registro",
                        showConfirmButton: true, 
                        confirmButtonText: "Cerrar", 
                        closeOnConfirm: false
                    }).then((result)=>{

                        if(result.value){

                            window.location = "intereses";
                        }
                    });

                    </script>';
                }

            }else{

                echo '<script>

                swal({
                    type: "error",
                    title: "No se guardó el interés por carácteres.",
                    showConfirmButton: true, 
                    confirmButtonText: "Cerrar", 
                    closeOnConfirm: false
                }).then((result)=>{

                    if(result.value){

                        window.location = "intereses";
                    }
                });

                </script>';

            }

        }

    }

    static public function ctrMostrarIntereses($item, $valor){

        $tabla = "ccIntereses";

        $respuesta = ModeloIntereses::mdlMostrarIntereses($tabla, $item, $valor);

        return $respuesta;

    } 

    static public function ctrEditarInteres(){

        if(isset($_POST["editaInteres"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\/ ]+$/', $_POST["editaInteres"])){

                $tabla = "ccIntereses";

                $datos = array("interesNombre" => $_POST["editaInteres"], "idInteres"=>$_POST["idInteres"]);

                $respuesta = ModeloIntereses::mdlEditaInteres($tabla, $datos);

                if($respuesta == "ok"){

                    echo 
                    '<script>
                    swal({
                        type: "success",
                        title: "El interes se ha modificado",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value){
                            window.location = "intereses";
                        }
                    })
                    </script>';

                }else{

                    echo '
                    <script>
                    swal({
                        type: "error",
                        title: "El interes no se modificó",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    }).then((result) => {
                        if (result.value){
                            window.location = "intereses";
                        }
                    })
                    </script>';

                }

            }


        }


    }

    static public function ctrBorrarInteres(){

        if(isset($_GET["idInteres"])){

            $tabla = "ccIntereses";

            $datos = $_GET["idInteres"];

            $respuesta = ModeloIntereses::mdlBorrarInteres($tabla, $datos);

            if ($respuesta == "ok"){

                echo'
                <script>
                swal({
                    type:"success",
                    title: "El interés ha sido eliminado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if(result.value){

                        window.location = "intereses";
                    }
                })
                </script>
                ';

            }else{

                echo'
                <script>
                swal({
                    type:"error",
                    title: "El interés no se pudo eliminar",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeOnConfirm: false
                }).then((result) => {
                    if(result.value){

                        window.location = "intereses";
                    }
                })
                </script>
                ';

            }
            
        }

    }

}