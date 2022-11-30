<?php
/**
 * Created by PhpStorm.
 * User: communitymanager
 * Date: 2019-05-10
 * Time: 15:54
 */

require_once "conexion.php";

class ModeloConsulta{


    /*=============================================
         MUESTRA EL HISTORIAL DE LA MEMBRESIA
    =============================================*/
    static public function mdlConsultaMembresia($item, $valor){

        try {
            if($item != null){
                $datos = array();
                $stmt = Conexion::conectar()->prepare("SELECT
                    gentsmx_app.tblUsuariosClientes.nombreCliente,
                    gentsmx_app.tblUsuariosClientes.apesCliente,
                    gentsmx_app.tblUsuariosClientes.numeroTarjeta,
                    gentsmx_app.tblUsuariosClientes.nomUsuarioCliente,
                    gentsmx_app.tblUsuariosClientes.telUsuarioCliente,
                    gentsmx_app.tblUsuariosClientes.mailUsuarioCliente,
                    gentsmx_app.tblRenovacion.fecha_inicio,
                    gentsmx_app.tblRenovacion.fecha_vencimiento,
                    gentsmx_app.tblRenovacion.statusRenovacion,
                    gentsmx_app.tblTipoMembresias.nombreTipoMembresia,
                    gentsmx_app.tblTipoMembresias.descuentoTarjetaMembresia,
                    gentsmx_app.tblCatalogoMembresias.fechaRegMembresia,
                    gentsmx_app.tblCatalogoMembresias.statusMembresia
                    FROM
                    gentsmx_app.tblCatalogoMembresias
                    JOIN gentsmx_app.tblRenovacion
                    ON gentsmx_app.tblCatalogoMembresias.numeroTarjeta = gentsmx_app.tblRenovacion.numeroTarjeta 
                    JOIN gentsmx_app.tblUsuariosClientes
                    ON gentsmx_app.tblCatalogoMembresias.numeroTarjeta = gentsmx_app.tblUsuariosClientes.numeroTarjeta 
                    JOIN gentsmx_app.tblTipoMembresias
                    ON gentsmx_app.tblTipoMembresias.idTipoMembresias = gentsmx_app.tblCatalogoMembresias.idTipoMembresia
                    WHERE
                    gentsmx_app.tblUsuariosClientes.numeroTarjeta = :$item");

                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();

                $stmt2 = Conexion::conectar()->prepare("SELECT
                    gentsmx_app.tblHistorialBenUsado.fechaBenUsado,
                    gentsmx_app.tblBeneficios.descripcionBeneficio,
                    gentsmx_app.tblBeneficios.nombreBeneficio
                    FROM
                    gentsmx_app.tblUsuariosClientes
                    JOIN gentsmx_app.tblHistorialBenUsado
                    ON gentsmx_app.tblUsuariosClientes.numeroTarjeta = gentsmx_app.tblHistorialBenUsado.numeroTarjeta 
                    JOIN gentsmx_app.tblBeneficios
                    ON gentsmx_app.tblBeneficios.idBeneficios = gentsmx_app.tblHistorialBenUsado.id_tblBeneficios
                    WHERE
                    gentsmx_app.tblUsuariosClientes.numeroTarjeta  = :$item");

                $stmt2 -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt2 -> execute();


                $datos['datosCliente'] = $stmt -> fetch();
                $datos['datosHistorial'] = $stmt2 -> fetchAll();
                return $datos;

            }

            $stmt -> close();
            $stmt = null;

        }catch(Exception $e){
            echo 'Error: ',  $e->getMessage(), "\n";
        }

    }



}