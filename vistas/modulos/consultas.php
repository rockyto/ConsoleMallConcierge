<div class="content-wrapper">
    <section class="content-header">
        <h1>Consultas
            <small>Introduzca el número de tarjeta o escanee con el código de barras para consular.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-barcode"></i> Consultas</li>
        </ol>
        <p class="margin"></p>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#membresia" data-toggle="tab">Membresía</a></li>
                        <li><a href="#lealtad" data-toggle="tab">Lealtad</a></li>
                        <li><a href="#tarjetaRegalo" data-toggle="tab">De regalo</a></li>
                    </ul>

                    <!-- INICIAN PESTAÑAS -->
                    <div class="tab-content">

                        <!-- INICIA PESTAÑA DE MEMBRESÍA-->
                        <div class="active tab-pane" id="membresia">

                            <!-- BARRA DE BUSQUEDA PARA MEMBRESÍA-->
                            <div class="input-group input-group-lg">

                                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                <input type="text" id="consultaNumeroMembresia" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" id="btnConsultaMembresia" class="btn btn-info btn-flat"><i class="fa fa-search"></i>Buscar</button>
                                </span>
                            </div>

                            <!-- BARRA DE BUSQUEDA PARA MEMBRESÍA -->
                            <section class="content">

                                <!-- INICIA COLUMNA GENERAL -->
                                <div class="row">

                                    <!-- INICIA COLUMNA PARA LOS WIDGETS -->
                                    <div class="row">

                                        <!--INICIA WIDGET PARA EL ESTADO DE LA MEMBRESÍA-->
                                        <div class="col-md-4">
                                            <div class="info-box bg-gray" id="tarjetaEstadoMembresia">
                                                <span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        <h4>Estado</h4>
                                                    </span>
                                                    <span class="info-box-number" id="statusMembresia">-</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA WIDGET PARA EL ESTADO DE LA MEMBRESÍA-->

                                        <!--INICIA WIDGET PARA EL TIPO DE MEMBRESÍA-->
                                        <div class="col-md-4">

                                            <div class="info-box bg-yellow">
                                                <span class="info-box-icon"><i class="fa fa-credit-card"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        <h4>Membresía</h4>
                                                    </span>
                                                    <span class="info-box-number" id="tipoMembresia">-</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA WIDGET PARA EL TIPO DE MEMBRESÍA-->

                                        <!--INICIA WIDGET PARA EL DESCUENTO-->
                                        <div class="col-md-4">
                                            <div class="info-box bg-gray" id="tarjetaDescuentoMembresia">
                                                <span class="info-box-icon"><i class="fa fa-tags"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        <h4>Descuento</h4>
                                                    </span>
                                                    <span class="info-box-number" id="descuentoMembresia">-</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA EL WIDGET PARA EL DESCUENTO-->

                                    </div>
                                    <!-- TERMINA COLUMNA DE LOS WIDGETS-->

                                    <!--INICIA COLUMNA PARA PERFIL-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--INICIA PERFIL-->
                                            <div class="box box-primary">
                                                <div class="box-body box-profile">
                                                    <img class="profile-user-img img-responsive img-circle" src="vistas/img/usuarios/default/anonymous.png" alt="User profile picture">
                                                    <h3 class="profile-username text-center" id="nombreUsuarioMembresia">Nombre usuario</h3>
                                                    <p class="text-muted text-center" id="numeroTarjetaMembresia">Número de tarjeta</p>
                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item">
                                                            <b>Fecha de registro</b> <a class="pull-right"><span class="label label-success" id="fechaRegistroMembresia">01/01/2019</span></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Fecha de vencimiento</b> <a class="pull-right"><span class="label label-danger" id="fechaVencimientoMembresia">01/01/2020</span></a>
                                                        </li>
                                                        <strong><i class="fa fa-map-marker margin-r-5"></i>Dirección</strong>
                                                        <p class="text-muted">Villahermosa, Tabasco.</p>
                                                        <hr>
                                                        <strong><i class="fa fa-envelope-o margin-r-5"></i>Correo electrónico</strong>
                                                        <p id="correoMembresia">ejemplo@gents.mx</p>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--TERMINA PERFIL-->
                                        </div>

                                        <!--INICIA COLUMNA HISTORIAL-->
                                        <div class="col-md-8">
                                            <div class="box box-primary">
                                                <div class="box-header">
                                                    <h3 class="box-title"><i class="fa fa-clock-o"></i> Historial</h3>
                                                </div>
                                                <div class="box-body">
                                                    <ul class="timeline" id="historial_beneficios">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA COLUMNA HISTORIAL-->

                                    </div>
                                    <!--TERMINA COLUMNA PARA PERFIL-->

                                </div>
                                <!--COLUMNA DE LA PESTAÑA-->

                            </section>
                            <!-- TERMINA SECCIÓN PESTAÑA DE MEMBRESÍA -->

                        </div>
                        <!-- TERMINA PESTAÑA DE MEMBRESÍA -->

                        <!-- INICIA PESTAÑA DE LEALTAD -->
                        <div class="tab-pane" id="lealtad">

                            <!-- BARRA DE BUSQUEDA PARA MEMBRESÍA-->
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i>Buscar</button>
                                </span>
                            </div>
                            <!-- TERMINA BARRA DE BUSQUEDA PARA MEMBRESÍA-->

                            <section class="content">
                                <div class="row">

                                    <!--INICIA COLUMNA DE WIDGETS-->
                                    <div class="row">

                                        <!--INICIA WIDGET PARA ESTADO DE LA TARJETA-->
                                        <div class="col-md-4">
                                            <div class="info-box bg-green">
                                                <span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        <h4>Estado</h4>
                                                    </span>
                                                    <span class="info-box-number">Activada</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA WIDGET ESTADO DE LA TARJETA-->

                                        <!--INICIA WIDGET PARA INFORMACIÓN DE CONVENIO-->
                                        <div class="col-md-4">
                                            <div class="info-box bg-yellow">
                                                <span class="info-box-icon"><i class="fa fa-credit-card"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        <h4>Convenio</h4>
                                                    </span>
                                                    <span class="info-box-number">Grupo DG</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA WIDGET PARA INFORMAR CONVENIO-->

                                        <!--INICIA WIDGET DE REGALOS-->
                                        <div class="col-md-4">
                                            <div class="info-box bg-aqua">
                                                <span class="info-box-icon"><i class="fa fa-gift"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        <h4>Regalos</h4>
                                                    </span>
                                                    <span class="info-box-number">3</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA WIDGET DE REGALO-->

                                    </div>
                                    <!--TERMINA COLUMNA DE WIDGETS-->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="box box-primary">
                                                <div class="box-body box-profile">
                                                    <img class="profile-user-img img-responsive img-circle" src="vistas/img/usuarios/default/anonymous.png" alt="User profile picture">
                                                    <h3 class="profile-username text-center">Nombre usuario</h3>
                                                    <p class="text-muted text-center">Número de tarjeta</p>
                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item">
                                                            <b>Fecha de registro</b> <a class="pull-right"><span class="label label-success">01/01/2019</span></a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Fecha de vencimiento</b> <a class="pull-right"><span class="label label-danger">01/01/2020</span></a>
                                                        </li>
                                                        <strong><i class="fa fa-map-marker margin-r-5"></i>Dirección</strong>
                                                        <p class="text-muted">Villahermosa, Tabasco.</p>
                                                        <hr>
                                                        <strong><i class="fa fa-envelope-o margin-r-5"></i>Correo electrónico</strong>
                                                        <p>ejemplo@gents.mx</p>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="box box-primary">
                                                <div class="box-header">
                                                    <h3 class="box-title"><i class="fa fa-clock-o"></i> Historial</h3>
                                                </div>
                                                <div class="box-body">
                                                    <ul class="timeline">
                                                        <li class="time-label">
                                                            <span class="bg-red">10 Feb. 2014</span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-envelope bg-blue"></i>
                                                            <div class="timeline-item">
                                                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                                                <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
                                                                <div class="timeline-body">...Content goes here
                                                                </div>

                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- TERMINA PESTAÑA DE LEALTAD -->


                        <!-- INICIA PESTAÑA DE REGALO -->
                        <div class="tab-pane" id="tarjetaRegalo">

                            <!-- BARRA DE BUSQUEDA PARA MEMBRESÍA-->
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i>Buscar</button>
                                </span>
                            </div>
                            <!-- TERMINA BARRA DE BUSQUEDA PARA MEMBRESÍA-->

                            <section class="content">
                                <div class="row">

                                    <!--INICIA COLUMNA DE WIDGETS-->
                                    <div class="row">

                                        <!--INICIA WIDGET 1-->
                                        <div class="col-md-4">
                                            <div class="info-box bg-green">
                                                <span class="info-box-icon"><i class="fa fa-money"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        <h4>Saldo</h4>
                                                    </span>
                                                    <span class="info-box-number">$000,000</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA WIDGET 1-->

                                        <!--INICIA WIDGET 2-->
                                        <div class="col-md-4">
                                            <div class="info-box bg-yellow">
                                                <span class="info-box-icon"><i class="fa fa-credit-card"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        <h4>Atributo 1</h4>
                                                    </span>
                                                    <span class="info-box-number">Uno</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA WIDGET 2-->

                                        <!--INICIA WIDGET 3-->
                                        <div class="col-md-4">
                                            <div class="info-box bg-aqua">
                                                <span class="info-box-icon"><i class="fa fa-gift"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        <h4>Atributo 2</h4>
                                                    </span>
                                                    <span class="info-box-number">Dos</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--TERMINA WIDGET 3-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="box box-primary">
                                                <div class="box-body box-profile">
                                                    <img class="profile-user-img img-responsive img-circle" src="vistas/img/usuarios/default/anonymous.png" alt="User profile picture">
                                                    <h3 class="profile-username text-center">Nombre usuario</h3>
                                                    <p class="text-muted text-center">Número de tarjeta</p>
                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item">
                                                            <b>Estado</b> <a class="pull-right"><span class="label label-success">Activada</span></a>
                                                        </li>
                                                        <strong><i class="fa fa-map-marker margin-r-5"></i>Dirección</strong>
                                                        <p class="text-muted">Villahermosa, Tabasco.</p>
                                                        <hr>
                                                        <strong><i class="fa fa-envelope-o margin-r-5"></i>Correo electrónico</strong>
                                                        <p>ejemplo@gents.mx</p>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="box box-primary">
                                                <div class="box-header">
                                                    <h3 class="box-title"><i class="fa fa-clock-o"></i> Historial</h3>
                                                </div>
                                                <div class="box-body">
                                                    <ul class="timeline">
                                                        <li class="time-label">
                                                            <span class="bg-red">10 Feb. 2014</span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-envelope bg-blue"></i>
                                                            <div class="timeline-item">
                                                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                                                <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
                                                                <div class="timeline-body">...Content goes here
                                                                </div>

                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- TERMINA PESTAÑA DE REGALO -->
                    </div>
                    <!-- TERMINAN PESTAÑAS -->
                </div>
            </div>
        </div>
    </section>
</div>