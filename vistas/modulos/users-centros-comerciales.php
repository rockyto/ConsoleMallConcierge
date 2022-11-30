<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar Centros Comerciales

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-user"></i> Administrar Centros Comerciales</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCC">
                    Agregar usuario
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Centro Comercial</th>
                            <th>Usuario</th>
                            <th>Color del formulario</th>
                            
                        
                            <th>Logo</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $item = null;
                    $valor = null;
                    
                    $usuariosCC = ControladorCentrosComerciales::ctrCentrosComerciales($item, $valor);
                    
                    foreach($usuariosCC as $key => $value){
                        
                        //  var_dump($value["nombreUsuario"]);
                        
                        echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["cc_name"].'</td>
                        <td>'.$value["cc_user"].'</td>
                        
                  <td>
                  <div class="input-group my-colorpicker1">
                  <input type="text" class="form-control" placeholder="'.$value["cc_ColorForm"].'" disabled="true">
                  <div class="input-group-addon">
                  <i style="background-color:'.$value["cc_ColorForm"].'" disabled="true"></i>
                  </div>
                  </div>
                  </td>';
                        
                        echo '<td>
                        <img src="'.$value["ccLogo"].'" class="img-thumbnail" width="100px">
                        
                        </td>';
                        
                        
                        
                        echo'<td>

                        <div class="btn-group">

                        <button class="btn btn-warning btnEditarUsuarioCC" idUsersCC="'.$value["cc_id"].'" data-toggle="modal" data-target="#modalEditarUserCC"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarUsuarioCC" idUsersCC="'.$value["cc_id"].'" ><i class="fa fa-times"></i></button>
                        
                        <a href="vistas/modulos/descargar/exportar-reporte.php?reporte=reporte&ccID='.$value["cc_id"].'">
                        <button class="btn btn-success btnImprimirRepoCC" idUsersCC="'.$value["cc_id"].'" ><i class="fa fa-file-excel-o"></i>
                        </button></a>
                                                                                       
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
<div id="modalAgregarCC" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Centro Comercial</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" name="ccNombre" placeholder="Centro Comercial" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control input-lg" name="ccUser" placeholder="Usuario Centro Comercial" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="Password" class="form-control input-lg" name="nuevoPassword" placeholder="Password" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Color del formulario:</label>
                                <div class="input-group my-colorpicker1">
                                    <input type="text" class="form-control" name="ccColorForm" required>
                                    <div class="input-group-addon">
                                        <i></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="panel">Subir logo</div>
                                <input type="file" class="nuevoLogo" name="nuevaFoto">
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
                
                $crearCC = new ControladorCentrosComerciales();
                $crearCC -> ctrCreaCentrosComerciales();
                
                ?>
            </form>
        </div>
    </div>
</div>


<!--MODAL PARA EDITAR USUARIO-->
<div id="modalEditarUserCC" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Centro Comercial</h4>
                </div>
                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg" id="editaCCNombre" name="editaCCNombre" value="" placeholder="Centro Comercial" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control input-lg" id="editaCCUser" name="editaCCUser" value="" placeholder="Usuario Centro Comercial" required>
                                    <input type="hidden" id="idUsuarioCC" name="idUsuarioCC">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="Password" class="form-control input-lg" name="editarPassword" name="editarPassword" value="" placeholder="Nueva Password">
                                    <input type="hidden" id="passwordActual" name="passwordActual">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Color del formulario:</label>
                                <div class="input-group my-colorpicker1">
                                    <input type="text" class="form-control" name="editacc_ColorForm" id="editacc_ColorForm" value="">
                                    <div class="input-group-addon">
                                        <i class="previsualizaColor" style="background-color:"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <!--CAMPO PARA EDITAR LOGO-->
                            <div class="form-group">
                                <div class="panel">Subir logo</div>
                                <input type="file" class="nuevoLogo" name="editarLogo">
                                <p class="help-block">Máximo de subida 2MB</p>
                                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                                <input type="hidden" name="logoActual" id="logoActual">
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

                $editarUsuario = new ControladorCentrosComerciales();
                $editarUsuario -> ctrEditarUserCC();

                ?>
            </form>
        </div>
    </div>
    <div class="colorpicker dropdown-menu colorpicker-with-alpha colorpicker-right colorpicker-hidden" style="top: 919px; left: 902px;">
        
        <div class="colorpicker-saturation" style="background-color: rgb(0, 148, 255);">
            <i style="left: 100px; top: 0px;"></i>
        </div>
        
        <div class="colorpicker-hue">
                <i style="top: 43px; left: 0px;">
                </i>
        </div>
        
        <div class="colorpicker-alpha" style="background-color: rgb(0, 148, 255);">
                <i style="top: 0px;"></i>
        </div>
        
        <div class="colorpicker-color" style="background-color: rgb(0, 148, 255);">
                <div style="background-color: rgb(0, 148, 255);">
                    
                </div>
        </div>
       
        <div class="colorpicker-selectors">
        </div>
        
    </div>
    <div class="colorpicker dropdown-menu colorpicker-with-alpha colorpicker-right colorpicker-hidden" style="top: 993px; left: 902px;"><div class="colorpicker-saturation" style="background-color: rgb(255, 0, 0);"><i style="left: 81px; top: 27px;"><b></b></i></div><div class="colorpicker-hue"><i style="top: 100px;"></i></div><div class="colorpicker-alpha" style="background-color: rgb(186, 35, 35);"><i style="top: 0px;"></i></div><div class="colorpicker-color" style="background-color: rgb(186, 35, 35);"><div style="background-color: rgb(186, 35, 35);"></div></div><div class="colorpicker-selectors"></div></div>

<script>

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon

</script>
</div>
<?php

$borrarUsuario = new ControladorCentrosComerciales();
$borrarUsuario -> ctrBorrarUserCC();

?>