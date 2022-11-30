<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar marcas de productos
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-cubes"></i> Administrar marcas</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMarca">
                    Agregar marcas
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Nombre de marca</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

$item = null;
$valor = null;
$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
foreach ($marcas as $key => $value) {
echo '<tr>
<td>
'.($key+1).'
</td>
<td>
'.$value["nombreMarcas"].'
</td>
<td>
<div class="btn-group">
<button class="btn btn-warning btnEditarMarca" idMarca="'.$value["idMarcasProductos"].'" data-toggle="modal" data-target="#modalEditarMarca"><i class="fa fa-pencil"></i></button>
<button class="btn btn-danger btnEliminarMarca" idMarca="'.$value["idMarcasProductos"].'"><i class="fa fa-times"></i></button>
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

<!--MODAL PARA AGREGAR MARCA-->
<div id="modalAgregarMarca" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Marca</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">
                            <!--CAMPO PARA AGREGAR NOMBRE DE LA MARCA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevaMarca" placeholder="Nombre" required>
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

                $crearMarca = new ControladorMarcas();
                $crearMarca -> ctrCrearMarca();

                 ?>
            </form>
        </div>
    </div>
</div>

<!--MODAL PARA EDITAR MARCA-->
<div id="modalEditarMarca" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Marca</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA AGREGAR NOMBRE DE LA MARCA-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarMarca" id="editarMarca" required>
                                    <input type="hidden" name="idMarca" id="idMarca">
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
$editarMarca = new ControladorMarcas();
$editarMarca -> ctrEditarMarca();
?>
            </form>
        </div>
    </div>
</div>
<?php
$borrarMarca = new ControladorMarcas();
$borrarMarca -> ctrBorrarMarca();
?>