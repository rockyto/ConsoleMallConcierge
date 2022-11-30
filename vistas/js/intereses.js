/*=============================================
              CARGAR TABLA DINÁMICA
=============================================*/
var table = $(".tablaIntereses").DataTable({

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

$(".btnEditarInteres").click(function() {
    var idInteres = $(this).attr("idInteres");
    var datos = new FormData();
    datos.append("idInteres", idInteres);
    $.ajax({

        url: "ajax/interes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function(respuesta) {

            console.log("respuesta", respuesta);
            $("#editaInteres").val(respuesta["interesNombre"]);
            $("#idInteres").val(respuesta["idInteres"]);

        }

    });

})


/*=============================================
                ELIMINAR USUARIO
=============================================*/
$(".btnEliminarInteres").click(function() {

    var idInteres = $(this).attr("idInteres");

    swal({
        title: '¿Seguro que desea eliminar este interés?',
        text: "Si no lo está puede cancelar",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar interes'
    }).then((result) => {

        if (result.value) {
            window.location =

                "index.php?ruta=intereses&idInteres=" + idInteres;

        }
    })

})
