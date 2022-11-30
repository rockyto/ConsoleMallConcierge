/*=============================================
              VARIABLE LOCAL STORAGE
=============================================*/
if(localStorage.getItem("capturaRango") != null){

    $("#daterange-btn span").html(localStorage.getItem("capturaRango"));

}else{

    $("#daterange-btn span").html('<i class="fa fa-calendar"></i>Rango de fecha')

}

/*=============================================
              CARGAR TABLA DINÁMICA
=============================================*/
var table = $(".tablaRegistros").DataTable({

    "ajax":"ajax/datatable-registros.ajax.php",

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


$('#daterange-btn').daterangepicker(
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

        $('#daterange-btn  span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        var fechaInicial = start.format('YYYY-M-D');

        var fechaFinal = end.format('YYYY-M-D');

        var datos = new FormData();
        datos.append("fechaInicial", fechaInicial);
        datos.append("fechaFinal", fechaFinal);

        $.ajax({
            url:"ajax/registros.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(respuesta){

                $(".rangoFechas tbody").html("");

                respuesta.forEach(funcionForEach);

                function funcionForEach(item, index){

                    var idUsersCC = item.ccID;

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

                            $(".rangoFechas tbody").append(

                                '<tr>'+

                                '<td>'+(index+1)+'</td>'+

                                '<td>'+item.clientName+'</td>'+
                                '<td>'+item.clientLastName+'</td>'+
                                '<td>'+item.clientAge+'</td>'+
                                '<td>'+item.clientGenre+'</td>'+
                                '<td>'+respuestaCC["cc_name"]+'</td>'+
                                '<td>'+item.cc_event+'</td>'+
                                '<td>'+item.dateRecordClient+'</td>'+
                                '</tr>'
                            );
                        }
                    })
                }
            }
        })

        var capturaRango = $("#daterange-btn span").html();
        console.log("Rango capturado:", capturaRango);

        localStorage.setItem("capturaRango", capturaRango);
        $("#fechaInicial").val(fechaInicial);
        $("#fechaFinal").val(fechaFinal);

        var urlReporte = document.getElementById("reporte");
        urlReporte.href = "vistas/modulos/descargar/exportar-reporte.php?reporte=reporte&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

    }
)


/*=============================================
             CANCELAR RANGO DE FECHAS
=============================================*/
$(".daterangepicker .range_inputs .cancelBtn").on("click", function(){

    localStorage.removeItem("capturaRango");
    localStorage.clear();
    window.location = "inicio";

    var urlReporte = document.getElementById("reporte");
    urlReporte.href = "vistas/modulos/descargar/exportar-reporte.php?reporte=reporte";


})

