<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar Bloqueos
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-calendar"></i> Administrar horarios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">

            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablaBloqueos">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Fecha</th>
                            <th>Razón</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <!-- ETIQUETA PARA LA TABLA -->


                </table>
            </div>
        </div>
    </section>
</div>

<!--MODAL PARA AGREGAR USUARIO-->
<div id="modalEditarBloqueos" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar horario</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">


                            <!--CAMPO PARA SELECCIONAR BARBERO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-scissors"></i></span>
                                    <select class="form-control input-lg" name="tipoBloqueo">
                                        <option id="tipoBloqueo"></option>
                                        <option value="" disabled>Seleccione tipo de disponibilidad</option>
                                        <option value="No Disponible">No Disponible</option>
                                        <option value="Disponible">Disponible</option>
                                    </select>
                                </div>
                            </div>
                            <!--CAMPO PARA SELECCIONAR BARBERO-->




                            <!--CAMPO PARA LA FECHA A RESERVAR-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                    <input type="date" class="form-control input-lg" name="fecha" id="fecha" readonly>
                                </div>
                            </div>
                            <!--CAMPO PARA LA FECHA A RESERVAR-->


                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnGuardarCambios">Guardar cambios</button>
                </div>

                <?php

                $bloquea = new ControladorHorarios();
                $bloquea -> ctrCreaBloqueo();


                ?>
            </form>
        </div>
    </div>
</div>