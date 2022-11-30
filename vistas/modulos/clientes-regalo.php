<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar clientes con tarjeta de regalo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa fa-gift"></i> Administrar clientes con tarjeta de regalo</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarClienteRegalo">
                    Registrar clientes
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaClientesRegalo">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Nombre</th>
                            <th>Número</th>
                            <th>Saldo disponible</th>
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
<div id="modalAgregarClienteRegalo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background-color: #00a65a !important; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Asignar tarjeta de regalo</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>Introduzca primero el correo electrónico del cliente para validar si ya existe un registro.</h3>

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
                                    <input type="text" class="form-control input-lg" name="nuevoNombreCliente" id="nuevoNombreCliente" placeholder="Nombre" required>
                                    <input type="hidden" name="idCliente" id="idCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoApellidosCliente" id="nuevoApellidosCliente" placeholder="Apellidos" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoTelefonoCliente" id="nuevoTelefonoCliente" placeholder="Teléfono" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="date" class="form-control input-lg" name="nuevoCumpleCliente" id="nuevoCumpleCliente" placeholder="Cumpleaños" required>
                                </div>
                            </div>

                            <h4>DATOS DE TARJETA DE REGALO</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="noTarjetaRegalo" name="noTarjetaRegalo">
                                    <input type="hidden" name="idRegalo" id="idRegalo">
                                </div>
                            </div>

                            <!-- SALDO PARA LA NUEVA TARJETA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" class="form-control input-lg" name="tarjetaSaldoRegalo" id="tarjetaSaldoRegalo">
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
                $registraCliente -> ctrRegistraClienteRegalo();

                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA ASIGNAR TARJETA-->
<div id="modalEditarClienteRegalo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar cliente con tarjeta de regalo</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>Introduzca primero el correo electrónico del cliente para validar si ya existe un registro.</h3>

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

                            <h4>DATOS DE TARJETA DE REGALO</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="editarNoTarjetaRegalo" name="editarNoTarjetaRegalo" readonly>
                                    <input type="hidden" name="idRegalo" id="idRegalo">
                                </div>
                            </div>

                            <!-- SALDO PARA LA NUEVA TARJETA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" class="form-control input-lg" id="editarTarjetaSaldoRegalo" name="editarTarjetaSaldoRegalo" readonly>
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

                $editarClienteRegalo = new ControladorClientes();
                $editarClienteRegalo -> ctrEditarClienteRegalo();

                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA CANCELAR TARJETA-->
<div id="modalEliminarClienteRegalo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background-color: #d33724 !important; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cancelar tarjeta de regalo</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>¿Desea cancelar tarjeta de regalo?</h3>

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

                            <h4>DATOS DE TARJETA DE REGALO</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="eliminarNoTarjetaRegalo" name="eliminarNoTarjetaRegalo" readonly>
                                    <input type="hidden" name="idRegalo" id="idRegalo">
                                </div>
                            </div>

                            <!-- SALDO PARA LA NUEVA TARJETA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" class="form-control input-lg" name="eliminarTarjetaSaldoRegalo" id="eliminarTarjetaSaldoRegalo">
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

                $crearCancelaRegalo = new ControladorVentaTarjetas();
                $crearCancelaRegalo -> ctrCancelarRegalo();

                ?>
            </form>
        </div>
    </div>
</div>