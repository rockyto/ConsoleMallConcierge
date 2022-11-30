<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar renovaciones

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-calendar-check-o"></i> Administrar renovaciones</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablaRenovaciones">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Número de tarjeta</th>
                            <th>Estado</th>
                            <th>Fecha de incio</th>
                            <th>Vigencia</th>
                            <th>Renovar</th>
                        </tr>
                    </thead>
                    <!--ETIQUETA PARA LA TABLA-->
                </table>
            </div>
        </div>
    </section>
</div>
<!--MODAL PARA ASIGNAR TARJETA-->
<div id="modalRenueva" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Renovación de membresía</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <h3>Por favor verifique que todos los datos del cliente sean correctos.</h3>
                        <div class="box-body">

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

                            <h4>DATOS DEL CLIENTE</h4>

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
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoMailCliente" id="nuevoMailCliente" placeholder="Correo electrónico">
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

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                    <select class="form-control input-lg" name="statusMembresia">
                                        <option id="statusMembresia"></option>
                                        <option value="">-Seleecione status-</option>

                                        <option value="Vigente">Vigente</option>
                                        <option value="Cancelada">Cancelada</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--PIE DEL MODAL-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Renovar</button>
                    </div>
                </div>
            </form>
            <?php

            $renuevaMembresia = new ControladorRenovaciones();
            $renuevaMembresia -> ctrActualizaRenueva();

            ?>
        </div>
    </div>
</div>