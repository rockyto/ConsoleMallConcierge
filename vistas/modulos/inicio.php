<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar registros
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">

                <?php

                echo '<a id="reporte" href="vistas/modulos/descargar/exportar-reporte.php?reporte=reporte">

               
                <button class="btn btn-success" style="margin-top: 5px">Exportar a Excel</button>
               
                <input type="hidden" id="fechaInicial" name="fechaInicial">
                <input type="hidden" id="fechaFinal" name="fechaFinal">
                
            </a>';

                ?>
                <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                        <i class="fa fa-calendar"></i>Rangos de fecha
                    </span>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>


            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas tablaRegistros rangoFechas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Genero</th>
                            <th>Centro Comercial</th>
                            <th>Fecha de registro</th>
                            <th>Evento</th>
                        </tr>
                    </thead>
                    <tbody>

                   <?php
/*
                    $item = null;
                    $valor = null;

                    $respuesta = ControladorRegistros::ctrMostrarRegistros($item, $valor);

                    foreach ($respuesta as $key => $value){

                        echo '<tr>

                    <td>'.($key+1).'</td>
                    
                    <td>'.$value["clientName"].'</td>
                    <td>'.$value["clientLastName"].'</td>
                    <td>'.$value["clientAge"].'</td>
                    <td>'.$value["clientGenre"].'</td>
                    
                    <td>'.$value["dateRecordClient"].'</td>';
                     
                     $itemCC = "cc_id";
                     $valorCC = $value["ccID"];

                     $respuestaCC = ControladorCentrosComerciales::ctrCentrosComerciales($itemCC, $valorCC);

                     echo '<td>'.$respuestaCC["cc_name"].'</td>';


                    }
                    */?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php

/* 

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar usuario</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Nombre" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Usuario" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="Password" class="form-control input-lg" name="nuevoPassword" placeholder="Password" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                    <select class="form-control input-lg" name="nuevoPerfil">
                                        <option value="">Seleeciona perfil</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Especial">Especial</option>
                                        <option value="Recepcion">Recepción</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="panel">Subir foto</div>
                                <input type="file" class="nuevaFoto" name="nuevaFoto">
                                <p class="help-block">Máximo de subida 2MB</p>
                                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
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

                 $crearUsuario = new ControladorUsuarios();
                 $crearUsuario -> ctrCrearUsuario();

               ?>
            </form>
        </div>
    </div>
</div>

<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar usuario</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA EDITAR EL NOMBRE-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                                </div>
                            </div>

                            <!--CAMPO PARA EDITAR EL USUARIO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
                                </div>
                            </div>

                            <!--CAMPO PARA EDITAR LA CONTRASEÑA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="Password" class="form-control input-lg" name="editarPassword" value="" placeholder="Nueva Password">
                                    <input type="hidden" id="passwordActual" name="passwordActual">
                                </div>
                            </div>

                            <!--CAMPO PARA EDITAR EL PERFIL-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                    <select class="form-control input-lg" name="editarPerfil">
                                        <option value="" id="editarPerfil"></option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Especial">Especial</option>
                                        <option value="Recepcion">Recepción</option>
                                    </select>
                                </div>
                            </div>

                            <!--CAMPO PARA EDITAR LA FOTO-->
                            <div class="form-group">
                                <div class="panel">Subir foto</div>
                                <input type="file" class="nuevaFoto" name="editarFoto">
                                <p class="help-block">Máximo de subida 2MB</p>
                                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                                <input type="hidden" name="fotoActual" id="fotoActual">
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

                 $editarUsuario = new ControladorUsuarios();
                 $editarUsuario -> ctrEditarUsuario();
              ?>
            </form>
        </div>
    </div>
</div> */


 ?>