<div class="content-wrapper">
    <section class="content-header">
        <h1>

            Administrar productos

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-tags"></i> Administrar productos</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
                    Agregar producto
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaProductos">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Marca</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Agregado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <!--ETIQUETA PARA LA TABLA-->

                </table>
            </div>
        </div>
    </section>
</div>

<!--MODAL PARA AGREGAR NUEVO PRODUCTO-->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar producto</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA CAPTURAR EL NOMBRE DEL PRODUCTO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoProducto" placeholder="Nombre" required>
                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR LA DESCRIPCIÓN DEL PRODUCTO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Descripción" required>
                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR EL CÓDIGO DE BARRAS DEL PRODUCTO (SKU)-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Código" required>
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR LA MARCA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" id="nuevaMarca" name="nuevaMarca">
                                        <option value="">Seleccionar marca</option>
                                        <?php

                                        $item = null;
                                        $valor = null;

                                        $marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
                                        foreach ($marcas as $key => $value) {

        echo'<option value="'.$value["idMarcasProductos"].'">'.$value["nombreMarcas"].'</option>';

                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR EL STOCK-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>
                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR EL COSTO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="nuevoCosto" min="0" placeholder="Costo" required>
                                </div>
                            </div>

                            <!--CAMPO PARA LA FOTO-->
                            <div class="form-group">
                                <div class="panel">Subir foto</div>
                                <input type="file" class="nuevaFotoProducto" name="nuevaFotoProducto">
                                <p class="help-block">Máximo de subida 2MB</p>
                                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                            </div>

                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

            <?php

            $crearProducto = new ControladorProductos();
            $crearProducto -> ctrCrearProducto();

            ?>

        </div>
    </div>
</div>


<!--MODAL PARA EDITAR PRODUCTO-->
<div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--CABECERA DEL MODAL-->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: white;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar producto</h4>
                </div>

                <!--CUERPO DEL MODAL-->
                <div class="modal-body">
                    <div class="box-body">
                        <div class="box-body">

                            <!--CAMPO PARA CAPTURAR EL NOMBRE DEL PRODUCTO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="text" class="form-control input-lg" id="editarProducto" name="editarProducto" required>
                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR LA DESCRIPCIÓN DEL PRODUCTO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                    <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>
                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR EL CÓDIGO DE BARRAS DEL PRODUCTO (SKU)-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>
                                </div>
                            </div>

                            <!--CAMPO PARA SELECCIONAR LA MARCA DESDE LA BASE DATOS -->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                    <select class="form-control input-lg" name="editarMarca">
                                        <option id="editarMarca"></option>

                                    </select>
                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR EL STOCK-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarStock" id="editarStock" min="0" required>
                                </div>
                            </div>

                            <!--CAMPO PARA CAPTURAR EL COSTO-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                    <input type="number" class="form-control input-lg" name="editarCosto" id="editarCosto" min="0" required>
                                </div>
                            </div>

                            <!--CAMPO PARA LA FOTO-->
                            <div class="form-group">
                                <div class="panel">Subir foto</div>
                                <input type="file" class="nuevaFotoProducto" name="editarFotoProducto">
                                <p class="help-block">Máximo de subida 2MB</p>
                                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                                <input type="hidden" name="fotoProductoActual" id="fotoProductoActual">
                            </div>

                        </div>
                    </div>
                </div>

                <!--PIE DEL MODAL-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>

            <?php

            $editarProducto = new ControladorProductos();
            $editarProducto -> ctrEditarProducto();

            ?>
        </div>
    </div>
</div>
<?php

$eliminarProducto = new ControladorProductos();
$eliminarProducto -> ctrEliminarProducto();

?>