<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar tarjeta

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-credit-card"></i> Administrar membresía</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTarjeta">
                    Agregar tarjeta
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaTarjetas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Numero</th>
                            <th>Status</th>
                            <th>Tipo</th>
                            <th>Costo</th>
                            <th>Vender/Cancelar</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>

                    <!--ETIQUETA PARA LA TABLA-->

                </table>
            </div>
        </div>
    </section>
</div>


<!--MODAL PARA AGREGAR TARJETA-->
<div id="modalAgregarTarjeta" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar membresía nueva</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA AGREGAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevaTarjeta" placeholder="Número de tarjeta" required>
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" id="tipoMembresiaTarjeta" name="tipoMembresiaTarjeta">
                                        <option value="">Seleccionar tipo de membresía</option>
                                        <?php

                                        $item = null;
                                        $valor = null;

                                        $tipos = ControladorMembresias::ctrMostrarTiposMembresias($item, $valor);

                                        foreach ($tipos as $key => $value){

                                            echo '<option value="'.$value["idTipoMembresias"].'">'.$value["nombreTipoMembresia"].'</option>';

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


                $crearTarjeta = new ControladorTarjetas();
                $crearTarjeta -> ctrCrearTarjeta();

                ?>
            </form>
        </div>
    </div>
</div>


<!--MODAL PARA ASIGNAR TARJETA-->
<div id="modalAsignarTarjeta" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background-color: #00a65a !important; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Vender tarjeta</h4>
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

                            <h4>DATOS DE TARJETA</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="asignarTarjeta" readonly name="asignarTarjeta">
                                    <input type="hidden" name="idTarjeta" id="idTarjeta" disabled>
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="asignarTipo" readonly required>
                                        <option id="asignarTipo"></option>
                                    </select>
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

                $crearVentaTarjeta = new ControladorVentaTarjetas();
                $crearVentaTarjeta -> ctrCrearVentaTarjeta();

                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA CANCELAR TARJETA-->
<div id="modalCancelarTarjeta" class="modal fade" role="dialog">
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

                            <h4>DATOS DE TARJETA</h4>

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="cancelarTarjeta" name="cancelarTarjeta" readonly>
                                    <input type="hidden" name="idTarjeta" id="idTarjeta">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="cancelarTipo" readonly>
                                        <option id="cancelarTipo"></option>
                                    </select>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Sí</button>
                </div>
                <?php

                $cancelarTarjeta = new ControladorVentaTarjetas();
                $cancelarTarjeta -> ctrCancelarTarjeta();

                ?>
            </form>
        </div>
    </div>
</div>


<!--MODAL PARA EDITAR TARJETA-->
<div id="modalEditarTarjeta" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar tarjeta</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA EDITAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="number" class="form-control input-lg" id="editarTarjeta" name="editarTarjeta">
                                    <input type="hidden" name="idTarjeta" id="idTarjeta">
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="editarTipo" readonly required>
                                        <option id="editarTipo"></option>

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

                $editarTarjeta = new ControladorTarjetas();
                $editarTarjeta -> ctrEditarTarjeta();

                ?>
            </form>
        </div>
    </div>
</div>
<?php

$borrarTarjeta = new ControladorTarjetas();
$borrarTarjeta-> ctrEliminarTarjeta();

?>