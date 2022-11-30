<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar horarios
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-calendar"></i> Administrar horarios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarHorarios">
                    Agregar horarios
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablaHorarios">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Barbero</th>
                            <th>Dia</th>
                            <th>Horario</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <!-- ETIQUETA PARA LA TABLA -->

                </table>
            </div>
        </div>
    </section>
</div>
<?php


?>

<!--MODAL PARA AGREGAR USUARIO-->
<div id="modalAgregarHorarios" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Generar horario</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">


                            <!--CAMPO PARA SELECCIONAR BARBERO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-scissors"></i></span>
                                    <select class="form-control input-lg" name="horarioBarbero" id="horarioBarbero" required>
                                        <option value="">Seleeciona barbero</option>

                                        <?php

                                        $item = null;
                                        $valor = null;

                                        $barbers = ControladorBarberos::ctrMostrarBarberos($item, $valor);

                                        foreach ($barbers as $key => $value){

                                            echo '<option value="'.$value["nombreBarbero"].'" id="'.$value["nombreBarbero"].'" enabled="true" >'.$value["nombreBarbero"].'</option>';

                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!--CAMPO PARA SELECCIONAR BARBERO-->


                            <!--CAMPO PARA LA FECHA A RESERVAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                    <input type="date" class="form-control input-lg" name="horario" id="horario" placeholder="Fecha" required disabled>
                                </div>
                            </div>
                            <!--CAMPO PARA LA FECHA A RESERVAR-->


                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnGenerar" disabled>Generar</button>
                </div>

                <?php

                $creaHorario = new ControladorHorarios();
                $creaHorario -> ctrCrearHorarios();



                ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA AGREGAR USUARIO-->
<div id="modalEditarHorario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #f39c12; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edita horario para este barbero</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA SELECCIONAR BARBERO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-scissors"></i></span>
                                    <select class="form-control input-lg" name="editarHorarioBarbero" readonly>
                                        <option id="editarHorarioBarbero">Seleeciona barbero</option>

                                    </select>
                                </div>
                            </div>
                            <!--CAMPO PARA SELECCIONAR BARBERO-->


                            <!--CAMPO PARA LA FECHA A RESERVAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                    <input type="date" class="form-control input-lg" name="editarFechaHorario" id="editarFechaHorario" placeholder="Fecha" disabled>
                                    <input type="hidden" id="idCita" name="idCita" idCita>
                                </div>
                            </div>
                            <!--CAMPO PARA LA FECHA A RESERVAR-->

                            <!--CAMPO PARA LA HORA A RESERVAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <select class="form-control input-lg" name="editarHorario" placeholder="Hora" readonly>
                                        <option id="editarHorario"></option>
                                    </select>
                                </div>
                            </div>
                            <!--CAMPO PARA LA HORA A RESERVAR-->

                            <!--CAMPO PARA EDITAR ESTADO DEL HORARIO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                    <select class="form-control input-lg" name="editarEstado">
                                        <option value="" id="editarEstado"></option>

                                        <option value="Hora de comida">Hora de comida</option>
                                        <option value="Salio de emergencia">Salio de emergencia</option>
                                        <option value="Disponible">Disponible</option>
                                        <option value="No Disponible">No Disponible</option>

                                    </select>
                                </div>
                            </div>
                            <!--CAMPO PARA EDITAR ESTADO DEL HORARIO-->


                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditaHorario" disabled>Guardar cambios</button>
                </div>

                <?php

                $editaHorario = new ControladorHorarios();
                $editaHorario -> ctrEditarHorario();

                ?>
            </form>
        </div>
    </div>
</div>
