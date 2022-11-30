<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar servicios

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-hand-scissors-o"></i> Administrar servicios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarServicio">
                    Agregar servicio
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Costo</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                    $item = null;
                    $valor = null;

                    $servicios = ControladorServicios::ctrMostrarServicio($item, $valor);

                    foreach ($servicios as $key => $value){

                        echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>$'.$value["CostoServicio"].'</td>
                            <td>'.$value["NombreServicio"].'</td>
                            <td>'.$value["DescripcionServicio"].'</td>
                            
                            <td>

                            <div class="btn-group">

                            <button class="btn btn-warning btnEditarServicio" idServicio="'.$value["idServicio"].'" data-toggle="modal" data-target="#modalEditarServicio"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btnEliminarServicio" idServicio="'.$value["idServicio"].'"><i class="fa fa-times"></i></button>
                            
                            </div>
                            
                            </td>
                           
                            </tr>';

                    }

                    ?>
                    </tbody>

                    <!--ETIQUETA PARA LA TABLA-->

                </table>
            </div>
        </div>
    </section>
</div>

<!--MODAL PARA AGREGAR NUEVO PRODUCTO-->
<div id="modalAgregarServicio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar servicio</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA CAPTURAR EL NOMBRE DEL SERVICIO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoServicio" placeholder="Nombre" required>

                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR LA DESCRIPCIÓN DEL SERVICIO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Descripción" required>
                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR EL COSTO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoCosto" min="0" placeholder="Costo" required>
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
            </form>
            <?php

            $crearServicio = new ControladorServicios();
            $crearServicio -> ctrCrearServicio();

            ?>
        </div>
    </div>
</div>


<!--MODAL PARA EDITAR PRODUCTO-->
<div id="modalEditarServicio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar servicio</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA EDITAR EL NOMBRE DEL SERVICIO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarServicio" id="editarServicio">
                                    <input type="hidden" id="idServicio" name="idServicio">
                                </div>
                            </div>

                            <!--CAMPO PARA EDITAR LA DESCRIPCIÓN DEL SERVICIO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion">
                                </div>
                            </div>

                            <!--CAMPO PARA EDITAR EL COSTO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarCosto" id="editarCosto" min="0">
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
            </form>

            <?php

            $editarServicio = new ControladorServicios();
            $editarServicio -> ctrEditarServicio();


            ?>
        </div>
    </div>
</div>
<?php

$borrarServicio = new ControladorServicios();
$borrarServicio -> ctrEliminarServicio();

?>