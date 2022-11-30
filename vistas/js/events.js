/*=============================================
              CARGAR TABLA DINÁMICA
=============================================*/
var table = $(".tablaEventos").DataTable({

    "ajax":"ajax/datatable-log.ajax.php",
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


/*=============================================
               EDITAR USUARIO
=============================================*/

$(".btnEditarEvento").click(function() {
    var idEvents = $(this).attr("idEvento");
    var datos = new FormData();
    datos.append("idEvents", idEvents);
    $.ajax({

        url: "ajax/events.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function(respuesta) {

            console.log("respuesta", respuesta);
            $("#editaEvento").val(respuesta["ccEventName"]);
            $("#idEvents").val(respuesta["ccEventID"]);

        }

    });

})


/*=============================================
                ELIMINAR USUARIO
=============================================*/
$(".btnEliminarEvento").click(function() {

    var idEventos = $(this).attr("idEvento");

    swal({
        title: '¿Seguro que desea eliminar este evento?',
        text: "Si no lo está puede cancelar",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar evento'
    }).then((result) => {

        if (result.value) {
            window.location =

                "index.php?ruta=events&idEvent=" + idEventos;

        }
    })

})
