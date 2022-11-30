<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar tarjetas de regalo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-gift"></i> Administrar tarjetas de regalo</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRegalo">
                    Agregar tarjeta de regalo
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablaRegalo">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Número de tarjeta</th>
                            <th>Saldo</th>
                            <th>Status</th>
                            <th>Vender/Cancelar</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <!-- ETIQUETA PARA LA TABLA -->
                </table>
            </div>
        </div>
    </section>
</div>
<?php

$eliminarRegalo = new ControladorRegalo();
$eliminarRegalo -> ctrEliminarRegalo();


?>



<!--MODAL PARA AGREGAR TARJETA DE REGALO-->
<div id="modalAgregarRegalo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar nueva tarjeta de regalo</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!-- CAMPO PARA AGREGAR NUEVA TARJETA DE REGALO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevaTarjetaRegalo" placeholder="Número de tarjeta" required>
                                </div>
                            </div>

                            <!-- SALDO PARA LA NUEVA TARJETA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoSaldoRegalo" placeholder="Saldo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php

                $crearRegalo = new ControladorRegalo();
                $crearRegalo -> ctrCrearTarjetaRegalo();

                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA EDITAR TARJETA DE REGALO-->
<div id="modalEditarRegalo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar nueva tarjeta de regalo</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!-- CAMPO PARA AGREGAR NUEVA TARJETA DE REGALO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarTarjetaRegalo" id="editarTarjetaRegalo" placeholder="Número de tarjeta" required>
                                    <input type="hidden" name="idRegalo" id="idRegalo">
                                </div>
                            </div>

                            <!-- SALDO PARA LA NUEVA TARJETA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarSaldoRegalo" id="editarSaldoRegalo" placeholder="Saldo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
                <?php

                $editarRegalo = new ControladorRegalo();
                $editarRegalo -> ctrEditarRegalo();

                ?>
            </form>
        </div>
    </div>
</div>


<!--MODAL PARA ASIGNAR TARJETA-->
<div id="modalAsignarRegalo" class="modal fade" role="dialog">
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
                                    <input type="text" class="form-control input-lg" name="nuevoNombreCliente" id="nuevoNombreCliente" placeholder="Nombre" required disabled>
                                    <input type="hidden" name="idCliente" id="idCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoApellidosCliente" id="nuevoApellidosCliente" placeholder="Apellidos" required disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoTelefonoCliente" id="nuevoTelefonoCliente" placeholder="Teléfono" required disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="date" class="form-control input-lg" name="nuevoCumpleCliente" id="nuevoCumpleCliente" placeholder="Cumpleaños" required disabled>
                                </div>
                            </div>

                            <h4>DATOS DE TARJETA DE REGALO</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="asignarRegalo" name="asignarRegalo" readonly>
                                    <input type="hidden" name="idRegalo" id="idRegalo">
                                </div>
                            </div>

                            <!-- SALDO PARA LA NUEVA TARJETA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" class="form-control input-lg" name="asignarSaldoRegalo" id="asignarSaldoRegalo">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Vender</button>
                </div>
                <?php

                $crearAsignarRegalo = new ControladorVentaTarjetas();
                $crearAsignarRegalo -> ctrCrearAsignacionRegalo();

                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA CANCELAR TARJETA-->
<div id="modalCancelaRegalo" class="modal fade" role="dialog">
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
                                    <input type="text" class="form-control input-lg" name="cancelaMailCliente" id="cancelaMailCliente" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="cancelaNombreCliente" id="cancelaNombreCliente" readonly>
                                    <input type="hidden" name="idCliente" id="idCliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="cancelaApellidosCliente" id="cancelaApellidosCliente" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                    <input type="text" class="form-control input-lg" name="cancelaTelefonoCliente" id="cancelaTelefonoCliente" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="date" class="form-control input-lg" name="cancelaCumpleCliente" id="cancelaCumpleCliente" readonly>
                                </div>
                            </div>

                            <h4>DATOS DE TARJETA DE REGALO</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="cancelaRegalo" name="cancelaRegalo" readonly>
                                    <input type="hidden" name="idRegalo" id="idRegalo">
                                </div>
                            </div>

                            <!-- SALDO PARA LA NUEVA TARJETA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" class="form-control input-lg" name="cancelaSaldoRegalo" id="cancelaSaldoRegalo">
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