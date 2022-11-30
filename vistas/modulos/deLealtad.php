<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar tarjetas de lealtad
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-credit-card"></i> Administrar tarjetas de lealtad</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarLealtad">
                    Agregar tarjeta de lealtad
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablaLealtad">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Numero de tarjeta</th>
                            <th>Empresa</th>
                            <th>Status</th>
                            <th>Otorgar/Cancelar</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php

$eliminarLealtad = new ControladorLealtad();
$eliminarLealtad -> ctrEliminarLealtad();

?>



<!--MODAL PARA ASIGNAR TARJETA-->
<div id="modalAsignarLealtad" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background-color: #00a65a !important; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Asignar tarjeta de lealtad</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>Introduzca primero el correo electrónico del cliente para validar si ya existe un registro.</h3>

                        <div class="box-body">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoMailCliente" id="nuevoMailCliente" placeholder="Correo electrónico">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoNombreCliente" id="nuevoNombreCliente" placeholder="Nombre" disabled>
                                    <input type="hidden" name="idCliente" id="idCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoApellidosCliente" id="nuevoApellidosCliente" placeholder="Apellidos" disabled>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoTelefonoCliente" id="nuevoTelefonoCliente" placeholder="Teléfono" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="date" class="form-control input-lg" name="nuevoCumpleCliente" id="nuevoCumpleCliente" placeholder="Cumpleaños" disabled>
                                </div>
                            </div>

                            <h4>DATOS DE TARJETA DE LEALTAD</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="asignarLealtad" name="asignarLealtad" readonly>
                                    <input type="hidden" name="idLealtad" id="idLealtad">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="asignarConvenio" readonly required>
                                        <option id="asignarConvenio"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Otorgar</button>
                </div>
                <?php

                $crearAsignarLealtad = new ControladorVentaTarjetas();
                $crearAsignarLealtad -> ctrCrearAsignacionLealtad();

                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA CANCELAR TARJETA-->
<div id="modalCancelarLealtad" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background-color: #d33724 !important; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cancelar tarjeta de lealtad</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>¿Desea cancelar esta tarjeta de lealtad?</h3>
                        <div class="box-body">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input type="text" class="form-control input-lg" name="cancelarMailCliente" id="cancelarMailCliente" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="cancelarNombreCliente" id="cancelarNombreCliente" readonly>
                                    <input type="hidden" name="idCliente" id="idCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="cancelarApellidosCliente" id="cancelarApellidosCliente" readonly>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="form-control input-lg" name="cancelarTelefonoCliente" id="cancelarTelefonoCliente" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="date" class="form-control input-lg" name="cancelarCumpleCliente" id="cancelarCumpleCliente" readonly>
                                </div>
                            </div>

                            <h4>DATOS DE TARJETA DE LEALTAD</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="cancelarLealtad" name="cancelarLealtad" readonly>
                                    <input type="hidden" name="idLealtad" id="idLealtad">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="cancelarConvenio" readonly required>
                                        <option id="cancelarConvenio"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                </div>
                <?php

                $crearCancelarLealtad = new ControladorVentaTarjetas();
                $crearCancelarLealtad -> ctrCancelarLealtad();

                ?>
            </form>
        </div>
    </div>
</div>



<!--MODAL PARA AGREGAR TARJETA LEALTAD-->
<div id="modalAgregarLealtad" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar nueva tarjeta de lealtad</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA AGREGAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevaTarjetaLealtad" placeholder="Número de tarjeta" required>
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE CONVENIO DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" id="convenioLealtad" name="convenioLealtad">
                                        <option value="">Seleccionar Convenio</option>
                                        <?php

                                        $item = null;
                                        $valor = null;

                                        $convenios = ControladorConvenios::ctrMostrarConvenios($item, $valor);


                                        foreach ($convenios as $key => $value){

                                        echo '<option value="'.$value["idConvenio"].'">'.$value["empresaConvenio"].'</option>';

                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php

                $crearLealtad = new ControladorLealtad();
                $crearLealtad -> ctrCrearLealtad();

                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA EDITAR TARJETA LEALTAD-->
<div id="modalEditarLealtad" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar tarjeta de lealtad</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarTarjetaLealtad" id="editarTarjetaLealtad">
                                    <input type="hidden" name="idLealtad" id="idLealtad">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="editarConvenioLealtad" readonly required>
                                        <option id="editarConvenioLealtad"></option>
                                    </select>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php


                $editarLealtad = new ControladorLealtad();
                $editarLealtad -> ctrEditarLealtad();

                ?>
            </form>
        </div>
    </div>
</div>