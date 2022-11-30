
  
  /*=============================================
                 EDITAR USUARIO
  =============================================*/
  $(".btnEditarUsuario").click(function() {
    var idUsersConsole = $(this).attr("idUsersConsole");
    //console.log("idUsuario", idUsuario);
    var datos = new FormData();
    datos.append("idUsersConsole", idUsersConsole);
    $.ajax({
  
      url: "ajax/users-console.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
  
      success: function(respuesta) {

        console.log("respuesta", respuesta);
        $("#editarNombre").val(respuesta["cc_name_console"]);
        $("#editarUsuario").val(respuesta["cc_user_console"]);
        $("#idUsuarioConsola").val(respuesta["id_ccUsersConsole"]);
        $("#passwordActual").val(respuesta["cc_psswd_console"]);
  
      }
  
    });
  
  })
  
  /*=============================================
            BOTÓN PARA ACTIVAR USUARIO
  =============================================*/
  $(".btnActivar").click(function() {
  
      var idUsuarioConsola = $(this).attr("idUsuarioConsola");
      var estadoAdmin = $(this).attr("estadoAdmin");
  
      var datos = new FormData();
      datos.append("activarId", idUsuarioConsola);
      datos.append("activarUsuarioConsola", estadoAdmin);
  
      $.ajax({
        url: "ajax/users-console.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
  
        }
      })
    //0 = Cancelada
    //1 = Pendiente
  
    //Desactivado = Cancelada
    //Acticado = Pendiente
  
      if (estadoAdmin == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoAdmin', 1);
      } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoAdmin', 0);
      }
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
        url: "ajax/usuarios.ajax.php",
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
  $(".btnEliminarUsuario").click(function() {

    var idUsersConsole = $(this).attr("idUsersConsole");
  
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

          "index.php?ruta=users-console&idUsersConsole=" + idUsersConsole;

      }
    })
  
  })
  