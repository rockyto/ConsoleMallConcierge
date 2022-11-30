<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar beneficios

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-star"></i> Administrar beneficios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarBeneficio">
                    Registrar beneficio
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablaBeneficios">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tipo de membresía</th>
                            <th>Asignar</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </section>
</div>

<!--MODAL PARA AGREGAR CONVENIO-->
<div id="modalAgregarBeneficio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar Beneficio</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <input type="text" class="form-control input-lg" name="nombreBeneficio" placeholder="Nombre" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                    <input type="text" class="form-control input-lg" name="descripcionBeneficio" placeholder="Descripción" required>
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

                $crearBeneficio = new ControladorBeneficios();
                $crearBeneficio -> ctrCrearBeneficio();

                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA AGREGAR CONVENIO-->
<div id="modalAgregarBeneficio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Beneficio</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-star"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarBeneficio" id="editarBeneficio" placeholder="Nombre" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarBeneficio" id="editarBeneficio" placeholder="Descripción" required>
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR EL TIPO DE TARJETA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" id="editarTipoMembresiaTarjeta" name="editarTipoMembresiaTarjeta">
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



                ?>
            </form>
        </div>
    </div>
</div>