<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar intereses registrados
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">

                <?php

                echo '<a id="reporteIntereses" href="vistas/modulos/descargar/exportar-reporte.php?reporteIntereses=reporteIntereses">

               
                <button class="btn btn-success" style="margin-top: 5px">Exportar a Excel</button>
               
                <input type="hidden" id="fechaInicialIntereses" name="fechaInicialIntereses">
                <input type="hidden" id="fechaFinalIntereses" name="fechaFinalIntereses">
                
            </a>';

                ?>
                <button type="button" class="btn btn-default pull-right" id="daterange-btnIntereses">
                    <span>
                        <i class="fa fa-calendar"></i>Rangos de fecha
                    </span>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>


            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas tablaRegistrosIntereses rangoFechasIntereses">
                    <thead>
                    <tr>
                        <th style="width:10px;">#</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Correo electrónico</th>
                        <th>Sexo</th>
                        <th>Interés</th>
                        <th>Centro comercial</th>
                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php




?>