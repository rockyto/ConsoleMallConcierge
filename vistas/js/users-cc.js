

/*=============================================
               EDITAR USUARIO
=============================================*/
$(".btnEditarUsuarioCC").click(function() {
    var idUsersCC = $(this).attr("idUsersCC");

    var datos = new FormData();
    datos.append("idUsersCC", idUsersCC);
    $.ajax({

        url: "ajax/users-cc.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        success: function(respuesta) {

            console.log("respuesta", respuesta);
            $("#editaCCNombre").val(respuesta["cc_name"]);
            $("#editaCCUser").val(respuesta["cc_user"]);
            $("#passwordActual").val(respuesta["cc_psswd"]);
            $("#idUsuarioCC").val(respuesta["cc_id"]);
            $("#editacc_ColorForm").val(respuesta["cc_ColorForm"]);
            
            $(".previsualizaColor").css("background-color", respuesta["cc_ColorForm"])
          //$("#fotoActual").val(respuesta["fotoUsuarioGents"]);
            $("#logoActual").val(respuesta["ccLogo"]);
            
             if (respuesta["ccLogo"] !== "") {
        $(".previsualizar").attr("src", respuesta["ccLogo"]);
      }
         

        }

    });

})

/*=============================================
            REVISAR USUARIO REPETIDO
=============================================*/
$("#nuevoUsuario").change(function() {

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();

    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "ajax/users-cc.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            // console.log("respuesta", respuesta);
            if (respuesta) {

                $("#nuevoUsuario").parent().after(
                    '<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>'
                );

                $("#nuevoUsuario").val("");

            }

        }
    })

})

/*=============================================
                ELIMINAR USUARIO
=============================================*/
$(".btnEliminarUsuarioCC").click(function() {

    var idUsersCC = $(this).attr("idUsersCC");

    swal({
        title: '¿Seguro que desea eliminar este usuario?',
        text: "Si no lo está puede cancelar",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar usuario'
    }).then((result) => {

        if (result.value) {
            window.location =

                "index.php?ruta=users-centros-comerciales&idUsersCC=" + idUsersCC;

        }
    })

})
