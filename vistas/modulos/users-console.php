<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar usuarios de consola

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-user"></i> Administrar usuarios de consola</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUserConsole">
                    Agregar usuario
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                        <!--<th>Perfil</th> -->
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $item = null;
                    $valor = null;
                    
                    $usuariosConsole = ControladorUsersConsole::ctrMostrarUsuariosConsole($item, $valor);
                    
                    //var_dump($usuarios);
                    
                    foreach($usuariosConsole as $key => $value){
                        
                        //  var_dump($value["nombreUsuario"]);
                        
                        echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["cc_name_console"].'</td>
                        <td>'.$value["cc_user_console"].'</td>';

                        if($value["estadoAdmin"]!=0){

                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuarioConsola="'.$value["id_ccUsersConsole"].'" estadoAdmin="0">Activado</button></td>';

                        }else{

                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuarioConsola="'.$value["id_ccUsersConsole"].'" estadoAdmin="1">Desactivado</button></td>';

                        }

                        echo'<td>

                        <div class="btn-group">

                        <button class="btn btn-warning btnEditarUsuario" idUsersConsole="'.$value["id_ccUsersConsole"].'" data-toggle="modal" data-target="#modalEditarUserConsole"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarUsuario" idUsersConsole="'.$value["id_ccUsersConsole"].'" ><i class="fa fa-times"></i></button>

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
<div id="modalAgregarUserConsole" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar usuario de consola</h4>
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
                                    <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Usuario" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="Password" class="form-control input-lg" name="nuevoPassword" placeholder="Password" required>
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

$crearUsuario = new ControladorUsersConsole();
$crearUsuario -> ctrCreateNewUserConsole();

?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA EDITAR USUARIO-->
<div id="modalEditarUserConsole" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar usuario de consola</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Nombre">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control input-lg" id="editaUsuario" name="editaUsuario" placeholder="Usuario">
                                    <input type="hidden" id="idUsuarioConsola" name="idUsuarioConsola">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="Password" class="form-control input-lg" name="editarPassword" value="" placeholder="Nueva Password">
                                    <input type="hidden" id="passwordActual" name="passwordActual">

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
                <?php

                $editarUsuario = new ControladorUsersConsole();
                $editarUsuario -> ctrEditarUserConsole();
                ?>
            </form>
        </div>
    </div>
</div>
<?php

$borrarUsuario = new ControladorUsersConsole();
$borrarUsuario -> ctrBorrarUsuarioConsola();

?>