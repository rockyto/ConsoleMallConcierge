<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar Convenios

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-thumbs-o-up"></i> Administrar Convenios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarConvenio">
                    Registrar Convenio
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Empresa</th>
                            <th>Fecha de registro</th>
                            <th>Fecha de vencimiento</th>
                            <th>Descuento</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                    $item = null;
                    $valor = null;

                    $convenio = ControladorConvenios::ctrMostrarConvenios($item, $valor);
                    foreach ($convenio as $key => $value){
                        echo'<tr>
                             <td>'.($key+1).'</td>
                             <td>'.$value["empresaConvenio"].'</td>
                             <td>'.$value["fechaInicioConvenio"].'</td>
                             <td>'.$value["fechaFinalizaConvenio"].'</td>
                             <td>'.$value["descuentoConvenio"].'%</td>
                             <td>
                             <div class="btn group">
                             <button class="btn btn-warning btnEditarConvenio" idConvenio="'.$value["idConvenio"].'" data-toggle="modal" data-target="#modalEditarConvenio"><i class="fa fa-pencil"></i></button>
                             <button class="btn btn-danger btnEliminarConvenio" idConvenio="'.$value["idConvenio"].'"><i class="fa fa-times"></i></button>
                             </div>
                             </td>
                             </tr>';
                    }
                    ?>
                    </tbody>
                    <?php

                    $eliminarConvenio = new ControladorConvenios();
                    $eliminarConvenio -> ctrEliminarConvenio();

                    ?>
                </table>
            </div>
        </div>
    </section>
</div>

<!--MODAL PARA AGREGAR CONVENIO-->
<div id="modalAgregarConvenio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar Convenio</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevaEmpresa" placeholder="Empresa" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
                                    <input type="date" class="form-control input-lg" name="fechaRegistroConvenio" placeholder="Fecha de registro" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa  fa-calendar-minus-o"></i></span>
                                    <input type="date" class="form-control input-lg" name="fechaVenciConvenio" placeholder="Fecha de vencimiento" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="number" class="form-control input-lg" name="convenioDescuento" placeholder="Descuento" required>
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

                $crearConvenio = new ControladorConvenios();
                $crearConvenio -> ctrCrearConvenio();

                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA EDITAR CONVENIO-->
<div id="modalEditarConvenio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Convenio</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarEmpresa" id="editarEmpresa">
                                    <input type="hidden" name="idConvenio" id="idConvenio">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
                                    <input type="date" class="form-control input-lg" name="editarFechaRegistroConvenio" id="editarFechaRegistroConvenio">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa  fa-calendar-minus-o"></i></span>
                                    <input type="date" class="form-control input-lg" name="editarFechaVenciConvenio" id="editarFechaVenciConvenio">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarConvenioDescuento" id="editarConvenioDescuento">
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

                $editarConvenio = new ControladorConvenios();
                $editarConvenio -> ctrEditarConvenio();

                ?>
            </form>
        </div>
    </div>
</div>