/*=============================================
              VARIABLE LOCAL STORAGE
=============================================*/
if(localStorage.getItem("capturaRangoIntereses") != null){

    $("#daterange-btnIntereses span").html(localStorage.getItem("capturaRangoIntereses"));

}else{

    $("#daterange-btnIntereses span").html('<i class="fa fa-calendar"></i>Rango de fecha')

}

/*=============================================
              CARGAR TABLA DINÁMICA
=============================================*/
var table = $(".tablaRegistrosIntereses").DataTable({

    "ajax":"ajax/datatable-registros-intereses.ajax.php",

    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }
})


$('#daterange-btnIntereses').daterangepicker(
    {
        ranges: {
            'Hoy'  : [moment(),moment(new Date()).add(1,'days')],
            'Ayer' : [moment().subtract(1, 'days'), moment()],
            'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
            'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
            'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
            'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

        },
        startDate: moment().subtract(29, 'days'),
        endDate : moment()
    },
    function (start, end) {

        $('#daterange-btnIntereses span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        var fechaInicialIntereses = start.format('YYYY-M-D');
        var fechaFinalIntereses = end.format('YYYY-M-D');

        var datos = new FormData();
        datos.append("fechaInicialIntereses", fechaInicialIntereses);
        datos.append("fechaFinalIntereses", fechaFinalIntereses);

        $.ajax({
            url:"ajax/registros.intereses.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){

                $(".rangoFechasIntereses tbody").html("");
                respuesta.forEach(funcionForEach);

                function funcionForEach(item, index){

                    var idClientRegister = item.idRecordClient;
                    var datosClient = new FormData();
                    datosClient.append("idRecordClient", idClientRegister);

                    var idIntereses = item.idInteres;
                    var datosIntereses = new FormData();
                    datosIntereses.append("idInteres", idIntereses);

                    $.ajax({
                        url:"ajax/registros.ajax.php",
                        method: "POST",
                        data: datosClient,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType:"json",
                        success:function(respuestaRegistros){

                            $.ajax({
                                url:"ajax/interes.ajax.php",
                                method: "POST",
                                data: datosIntereses,
                                cache: false,
                                contentType: false,
                                processData: false,
                                dataType:"json",
                                success:function(respuestaIntereses){

                                    var idUsersCC = respuestaRegistros.ccID;
                                    var datosCC = new FormData();
                                    datosCC.append("idUsersCC", idUsersCC);

                                    $.ajax({
                                        url:"ajax/users-cc.ajax.php",
                                        method: "POST",
                                        data: datosCC,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        dataType: "json",
                                        success:function (respuestaCC) {

                                            $(".rangoFechasIntereses tbody").append(
                                                '<tr>'+
                                                '<td>'+(index+1)+'</td>'+
                                                '<td>'+respuestaRegistros["clientName"]+'</td>'+
                                                '<td>'+respuestaRegistros["clientAge"]+'</td>'+
                                                '<td>'+respuestaRegistros["clientMail"]+'</td>'+
                                                '<td>'+respuestaRegistros["clientGenre"]+'</td>'+
                                                '<td>'+respuestaIntereses["interesNombre"]+'</td>'+
                                                '<td>'+respuestaCC["cc_name"]+'</td>'+


                                                '</tr>'
                                            );
                                        }
                                    })

                                }
                            })

                        }
                    })

                }
            }
        })

        var capturaRangoIntereses = $("#daterange-btnIntereses span").html();
        console.log("Rango capturado:", capturaRangoIntereses);

        localStorage.setItem("capturaRangoIntereses", capturaRangoIntereses);
        $("#fechaInicialIntereses").val(fechaInicialIntereses);
        $("#fechaFinalIntereses").val(fechaFinalIntereses);

        var urlReporte = document.getElementById("reporteIntereses");
        urlReporte.href = "vistas/modulos/descargar/exportar-reporte.php?reporteIntereses=reporteIntereses&fechaInicialIntereses=" + fechaInicialIntereses + "&fechaFinalIntereses=" + fechaFinalIntereses;

    }
)


/*=============================================
             CANCELAR RANGO DE FECHAS
=============================================*/
$(".daterangepicker .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturaRangoIntereses");
    console.log("Cerrando");
    localStorage.clear();
    window.location = "registros-intereses";

    var urlReporte = document.getElementById("reporteIntereses");
    urlReporte.href = "vistas/modulos/descargar/exportar-reporte.php?reporteIntereses=reporteIntereses";

})

