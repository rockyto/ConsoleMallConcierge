<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar clientes con membresía
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-id-card"></i> Administrar clientes con membresía</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
                    Registrar clientes
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaClientes">
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
</div>


<!--MODAL PARA ASIGNAR TARJETA-->
<div id="modalAgregarCliente" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar cliente</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>Por favor llene todos los campos para el registro del cliente.</h3>
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
                                    <input type="text" class="form-control input-lg" name="nuevoNombreCliente" id="nuevoNombreCliente" placeholder="Nombre">
                                    <input type="hidden" name="idCliente" id="idCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoApellidosCliente" id="nuevoApellidosCliente" placeholder="Apellidos">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoTelefonoCliente" id="nuevoTelefonoCliente" placeholder="Teléfono">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="date" class="form-control input-lg" name="nuevoCumpleCliente" id="nuevoCumpleCliente" placeholder="Cumpleaños">
                                </div>
                            </div>

                            <h4>INTRODUZCA EL NÚMERO DE TARJETA</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="noTarjetaCliente" name="noTarjetaCliente">
                                    <input type="hidden" name="idTarjeta" id="idTarjeta">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="tarjetaTipo">
                                        <option id="tarjetaTipo"></option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!--PIE DEL MODAL-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
            </form>
            <?php

            $registraCliente = new ControladorClientes();
            $registraCliente -> ctrRegistrarClienteMembresia();

            ?>
        </div>
    </div>
</div>

<!--MODAL PARA EDITAR CLIENTE-->
<div id="modalEditarCliente" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar cliente</h4>
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
                                    <input type="hidden" id="EditaridCliente" name="EditaridCliente">
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

                            <h4>INTRODUZCA EL NÚMERO DE TARJETA</h4>

                            <!--CAMPO PARA EDITAR LOS DATOS DE LA TARJETA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="editaNoTarjetaCliente" name="editaNoTarjetaCliente" readonly>
                                    <input type="hidden" name="idTarjeta" id="idTarjeta">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="editaTarjetaTipo" readonly>
                                        <option id="editaTarjetaTipo"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--PIE DEL MODAL-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </form>
            <?php

            $editarElCliente = new ControladorClientes();
            $editarElCliente -> ctrEditarCliente();

            ?>
        </div>
    </div>
</div>


<!--MODAL PARA CANCELAR TARJETA-->
<div id="modalEliminarCliente" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background-color: #d33724 !important; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cancelar tarjeta</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>¿Desea cancelar esta membresía?</h3>
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
                                    <input type="hidden" name="idCliente" id="idCliente">
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

                            <h4>DATOS DE TARJETA</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="eliminarNoTarjetaCliente" name="eliminarNoTarjetaCliente" readonly>
                                    <input type="hidden" name="idTarjeta" id="idTarjeta">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="eliminarTarjetaTipo" readonly>
                                        <option id="eliminarTarjetaTipo"></option>
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

                $cancelarTarjeta = new ControladorVentaTarjetas();
                $cancelarTarjeta -> ctrCancelarTarjeta();

                ?>
            </form>
        </div>
    </div>
</div>