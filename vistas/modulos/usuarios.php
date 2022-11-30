<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar usuarios

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-user"></i> Administrar usuarios</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                    Agregar usuario
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Ultimo login</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                      $item = null;
                      $valor = null;


                      $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                      //var_dump($usuarios);

                      foreach($usuarios as $key => $value){

                      //  var_dump($value["nombreUsuario"]);

                  echo '<tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["nombreUsuario"].'</td>
                          <td>'.$value["usuarioGents"].'</td>';

                          if($value["fotoUsuarioGents"] != ""){

                            echo'<td><img src="'.$value["fotoUsuarioGents"].'" class="img-thumbnail" width="40px"></td>';

                          }else{

                            echo'<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                          }

                      echo'<td>'.$value["perfilGents"].'</td>';

                      if($value["estadoGents"]!=0){

                        echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["idUsuarioGents"].'" estadoUsuario="0">Activado</button></td>';


                      }else{
                        echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["idUsuarioGents"].'" estadoUsuario="1">Desactivado</button></td>';
                      }

                  echo '<td>'.$value["UltimoLoginGents"].'</td>';
                  echo'<td>
                       <div class="btn-group">
                       <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["idUsuarioGents"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                       <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["idUsuarioGents"].'" fotoUsuarioGents="'.$value["fotoUsuarioGents"].'" usuarioGents="'.$value["usuarioGents"].'"><i class="fa fa-times"></i></button>
                       </div>
                       </td>
                      </tr>';
                      }
                       ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!--MODAL PARA AGREGAR USUARIO-->
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

<!--MODAL PARA EDITAR USUARIO-->
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
</div>
<?php

$borrarUsuario = new ControladorUsuarios();
$borrarUsuario -> ctrBorrarUsuario();

 ?>