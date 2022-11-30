<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar Eventos

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-user"></i> Administrar Eventos</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarNuevoEvento">
                    Agregar evento
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Eventos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $item = null;
                    $valor = null;

                    $eventosCC = ControladorEventos::ctrMostrarEventos($item, $valor);
                    
                    foreach($eventosCC as $key => $value){
                        
                        echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["ccEventName"].'</td>
    
                        <td>

                        <div class="btn-group">

                        <button class="btn btn-warning btnEditarEvento" idEvento="'.$value["ccEventID"].'" data-toggle="modal" data-target="#modalEditarEvento"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarEvento" idEvento="'.$value["ccEventID"].'" ><i class="fa fa-times"></i></button>

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


<div id="modalAgregarNuevoEvento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Agregar nuevo evento</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-bullhorn"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoEvento" placeholder="Evento" required>
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

                $crearEvento = new ControladorEventos();
                $crearEvento -> ctrCrearEvento();

                ?>
            </form>
        </div>
    </div>
</div>

<div id="modalEditarEvento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Editar evento</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-bullhorn"></i></span>
                                    <input type="text" class="form-control input-lg" id="editaEvento" name="editaEvento" placeholder="Evento" required>
                                    <input type="hidden" id="idEvents" name="idEvents">
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

                $editaEvento = new ControladorEventos();
                $editaEvento -> ctrEditaEvento();

                ?>
            </form>
        </div>
    </div>
</div>

<?php

$borrarUsuario = new ControladorEventos();
$borrarUsuario -> ctrBorrarEvento();


?>