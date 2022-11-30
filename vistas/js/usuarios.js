/*=============================================
    SCRIPT PARA SUBIR FOTOS DE LOS USUARIOS
=============================================*/
$(".nuevaFoto").change(function() {

  var imagen = this.files[0];

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

    $(".nuevaFoto").val("");
    swal({
      title: "Error al subir imagen",
      text: "La imagen debe estar en formato JPG o PNG",
      type: "error",
      confirmButtonText: "Cerrar"
    });
  } else if (imagen["size"] > 2000000) {

    $(".nuevaFoto").val("");

    swal({
      title: "Error al subir imagen",
      text: "La imagen no debe pesar más de 2MB",
      type: "error",
      confirmButtonText: "Cerrar"
    });

  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event) {
      var rutaImagen = event.target.result;
      $(".previsualizar").attr("src", rutaImagen);
    })
  }

})

/*=============================================
               EDITAR USUARIO
=============================================*/
$(".btnEditarUsuario").click(function() {
  var idUsuario = $(this).attr("idUsuario");
  //console.log("idUsuario", idUsuario);
  var datos = new FormData();
  datos.append("idUsuario", idUsuario);
  $.ajax({

    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function(respuesta) {
      //  console.log("respuesta", respuesta);
      $("#editarNombre").val(respuesta["nombreUsuario"]);
      $("#editarUsuario").val(respuesta["usuarioGents"]);
      $("#editarPerfil").html(respuesta["perfilGents"]);

      $("#fotoActual").val(respuesta["fotoUsuarioGents"]);

      $("#editarPerfil").val(respuesta["perfilGents"]);
      $("#passwordActual").val(respuesta["passwordUsuario"]);

      if (respuesta["fotoUsuarioGents"] !== "") {
        $(".previsualizar").attr("src", respuesta["fotoUsuarioGents"]);
      }



    }


  });

})

/*=============================================
          BOTÓN PARA ACTIVAR USUARIO
=============================================*/
$(".btnActivar").click(function() {

    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({
      url: "ajax/usuarios.ajax.php",
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

    if (estadoUsuario == 0) {
      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Desactivado');
      $(this).attr('estadoUsuario', 1);
    } else {
      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoUsuario', 0);
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

  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuarioGents");
  var usuario = $(this).attr("usuarioGents")


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
        "index.php?ruta=usuarios&idUsuario=" + idUsuario +
        "&usuario=" +
        usuario +
        "&fotoUsuario=" + fotoUsuario;
    }
  })

})
