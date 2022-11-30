<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar tipo de membresía
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-id-card"></i> Administrar membresía</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipo">
                    Crear un tipo de membresía
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Nombre</th>
                            <th>Costo</th>
                            <th>Descuento</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $item = null;
                            $valor = null;

                            $tipos = ControladorMembresias::ctrMostrarTiposMembresias($item, $valor);

                            foreach ($tipos as $key => $value) {
                            echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["nombreTipoMembresia"].'</td>
                            <td>$'.$value["costoTarjetaMembresia"].'</td>
                            <td>'.$value["descuentoTarjetaMembresia"].'%</td>
                            <td>

                            <div class="btn-group">
                            <button class="btn btn-warning btnEditarTipoMembresia" idTipo="'.$value["idTipoMembresias"].'" data-toggle="modal" data-target="#modalEditarTipo"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btnEliminarTipoMembresia" idTipo="'.$value["idTipoMembresias"].'"><i class="fa fa-times"></i></button>
                            </div>
                            </td>
                            </tr>';
                            }

                            ?>
                    </tbody>
                    <?php

                            $borrarTipo = new ControladorMembresias();
                            $borrarTipo -> ctrBorrarTipoMembresia();

                            ?>
                </table>
            </div>
        </div>
    </section>
</div>


<!--MODAL PARA AGREGAR TIPO MEMBRESIA-->
<div id="modalAgregarTipo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar un tipo de membresía</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA AGREGAR EL NOMBRE DEL TIPO DE MEMBRESÍA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    <input type="text" class="form-control input-lg" name="tipoMembresia" placeholder="Nombre" required>
                                </div>
                            </div>

                            <!--CAMPO PARA AGREGAR EL COSTO TIPO DE MEMBRESÍA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-usd"> </i></span>
                                    <input type="number" class="form-control input-lg" name="tipoCosto" placeholder="Costo" required>
                                </div>
                            </div>

                            <!--CAMPO PARA AGREGAR EL PORCENTAJE DEL TIPO DE MEMBRESÍA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="number" class="form-control input-lg" name="tipoDescuento" placeholder="Descuento" required>
                                </div>
                            </div>

                            <!--CAMPO PARA AGREGAR DESCRIPCIÓN-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                                    <textarea class="form-control" rows="2" name="tipoDescripcion" placeholder="Enter ..."></textarea>
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

                $crearTipoMembresia = new ControladorMembresias();
                $crearTipoMembresia -> ctrCrearTipoMembresia();

                 ?>
            </form>
        </div>
    </div>
</div>



<!--MODAL PARA EDITAR TIPO MEMBRESIA-->
<div id="modalEditarTipo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar un tipo de membresía</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA AGREGAR EL NOMBRE DEL TIPO DE MEMBRESÍA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarTipoMembresia" id="editarTipoMembresia">
                                    <input type="hidden" name="idTipo" id="idTipo">
                                </div>
                            </div>

                            <!--CAMPO PARA AGREGAR EL COSTO TIPO DE MEMBRESÍA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-usd"> </i></span>
                                    <input type="number" class="form-control input-lg" name="editarTipoCosto" id="editarTipoCosto">
                                </div>
                            </div>

                            <!--CAMPO PARA AGREGAR EL PORCENTAJE DEL TIPO DE MEMBRESÍA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarTipoDescuento" id="editarTipoDescuento">
                                </div>
                            </div>

                            <!--CAMPO PARA AGREGAR DESCRIPCIÓN-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                                    <textarea class="form-control" rows="2" name="editarTipoDescripcion" id="editarTipoDescripcion"></textarea>
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

                $editarTipoMembresia = new ControladorMembresias();

                $editarTipoMembresia -> ctrEditarTiposMembresias();

                 ?>
            </form>
        </div>
    </div>
</div>