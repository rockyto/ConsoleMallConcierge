<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar clientes de lealtad
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-thumbs-o-up"></i> Administrar clientes de lealtad</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarClienteLealtad">
                    Registrar clientes
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaClientesLealtad">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Nombre</th>
                            <th>Número</th>
                            <th>Status</th>
                            <th>Fecha y hora de activación</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
    <?php

    $borraClienteLealtad = new ControladorClientes();
    $borraClienteLealtad -> ctrBorraClienteLealtad();

    ?>
</div>



<!--MODAL PARA ASIGNAR TARJETA LEALTAD-->
<div id="modalAgregarClienteLealtad" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar cliente de lealtad</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>Por favor llene todos los campos para el registro del cliente.</h3>

                        <div class="box-body">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoMailCliente" id="nuevoMailCliente" placeholder="Correo electrónico" required>
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
                                    <input type="number" class="form-control input-lg" id="noTarjetaLealtad" name="noTarjetaLealtad">
                                    <input type="hidden" name="idLealtad" id="idLealtad">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="tarjetaConvenio" required>
                                        <option id="tarjetaConvenio"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
                <?php

                $registraCliente = new ControladorClientes();
                $registraCliente -> ctrRegistraClienteLealtad();


                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA ASIGNAR TARJETA LEALTAD-->
<div id="modalEditarClienteLealtad" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar cliente de lealtad</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>Por favor llene todos los campos para el registro del cliente.</h3>

                        <div class="box-body">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarMailCliente" id="editarMailCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarNombreCliente" id="editarNombreCliente">
                                    <input type="hidden" name="EditaridCliente" id="EditaridCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarApellidosCliente" id="editarApellidosCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarTelefonoCliente" id="editarTelefonoCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="date" class="form-control input-lg" name="editarCumpleCliente" id="editarCumpleCliente">
                                </div>
                            </div>

                            <h4>DATOS DE TARJETA DE LEALTAD</h4>

                            <!--CAMPO PARA MOSTRAR EL NÚMERO DE TARJETA DE LEALTAD-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="EditarNoTarjetaLealtad" name="EditarNoTarjetaLealtad" readonly>
                                    <input type="hidden" name="idLealtad" id="idLealtad">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL CONVENIO DE TARJETA DE LEALTAD DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="editarTarjetaConvenio" readonly>
                                        <option id="editarTarjetaConvenio"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
                <?php

                $editarClienteLealtad = new ControladorClientes();
                $editarClienteLealtad -> ctrEditarClienteLealtad();

                ?>
            </form>
        </div>
    </div>
</div>


<!--MODAL PARA CANCELAR TARJETA-->
<div id="modalEliminarClienteLealtad" class="modal fade" role="dialog">
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
                                    <input type="text" class="form-control input-lg" name="eliminarMailCliente" id="eliminarMailCliente" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="eliminarNombreCliente" id="eliminarNombreCliente" readonly>
                                    <input type="hidden" name="EliminaridCliente" id="EliminaridCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="eliminarApellidosCliente" id="eliminarApellidosCliente" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="form-control input-lg" name="eliminarTelefonoCliente" id="eliminarTelefonoCliente" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="date" class="form-control input-lg" name="eliminarCumpleCliente" id="eliminarCumpleCliente" readonly>
                                </div>
                            </div>

                            <h4>DATOS DE TARJETA DE LEALTAD</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="EliminarNoTarjetaLealtad" name="EliminarNoTarjetaLealtad" readonly>
                                    <input type="hidden" name="idLealtad" id="idLealtad">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="eliminarTarjetaConvenio" readonly>
                                        <option id="eliminarTarjetaConvenio"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Sí, cancelar</button>
                </div>
                <?php

                $crearCancelarLealtad = new ControladorVentaTarjetas();
                $crearCancelarLealtad -> ctrCancelarLealtad();

                ?>
            </form>
        </div>
    </div>
</div>