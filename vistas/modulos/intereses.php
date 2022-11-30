<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar Intereses

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-user"></i> Administrar Intereses</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarNuevoInteres">
                    Agregar interés
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Intereses</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $item = null;
                    $valor = null;

                    $InteresCC = ControladorIntereses::ctrMostrarIntereses($item, $valor);
                    
                    foreach($InteresCC  as $key => $value){
                        
                        echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["interesNombre"].'</td>
    
                        <td>

                        <div class="btn-group">

                        <button class="btn btn-warning btnEditarInteres" idInteres="'.$value["idInteres"].'" data-toggle="modal" data-target="#modalEditarInteres"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarInteres" idInteres="'.$value["idInteres"].'" ><i class="fa fa-times"></i></button>

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


<div id="modalAgregarNuevoInteres" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Agregar nuevo interés</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-diamond"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoInteres" placeholder="Interés" required>
                                </div>
                            </div>


                        </div>

                    </div>
                    <!--PIE DEL MODAL-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </div>
                <?php

                $crearInteres = new ControladorIntereses();
                $crearInteres -> ctrCrearInteres();

                ?>
            </form>
        </div>
    </div>
</div>

<div id="modalEditarInteres" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Editar interes</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-bullhorn"></i></span>
                                    <input type="text" class="form-control input-lg" id="editaInteres" name="editaInteres" placeholder="Interés" required>
                                    <input type="hidden" id="idInteres" name="idInteres">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--PIE DEL MODAL-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </div>
                <?php

                $editaInteres = new ControladorIntereses();
                $editaInteres -> ctrEditarInteres();

                ?>
            </form>
        </div>
    </div>
</div>

<?php

$borrarInteres = new ControladorIntereses();
$borrarInteres -> ctrBorrarInteres();


?>