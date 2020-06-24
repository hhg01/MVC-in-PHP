$('.updateMenu').on('click', function () {
    var id = $(this).closest("tr").find(".id").text();
    var nombre = $(this).closest("tr").find(".nombre").text();
    var dependencia = $(this).closest("tr").find(".dependencia").text();
    var descripcion = $(this).closest("tr").find(".descripcion").text();

    $('#nombreMenu').val(nombre);
    $('#descripcionMenu').val(descripcion);

    if (dependencia == '') {
        dependencia = "Seleccionar...";
    }
    $("select option").filter(function () {
        //may want to use $.trim in here
        return $(this).text() == dependencia;
    }).prop('selected', true);

    $('#updateInfo').removeAttr('hidden');
    $('#guardarInfo').attr("hidden", true);

    $('#updateInfo').on('click', function () {
        let dependencia = $("#selectMenuPadre").val();
        let nombre = $("#nombreMenu").val();
        let descripcion = $("#descripcionMenu").val();
        let datosEnvio = {
            id: id,
            dependencia: dependencia,
            nombre: nombre,
            descripcion: descripcion
        }
        $.ajax({
            type: "POST",
            url: "http://localhost/EvaluacionTecnica/Menumanager/updateMenu",
            data: datosEnvio,
            success: function (data) {
                $('#modalAgregar').modal('hide');
                mensaje = '<div id="mensaje" class="alert alert-success" role="alert">\n\
                                    Elemento Actualizado\n\
                                </div>';
                mensajeAjax(mensaje);
                location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#modalAgregar').modal('hide');
                mensaje = '<div id="mensaje" class="alert alert-danger" role="alert">\n\
                                Ocurrio un error, intentalo mas tarde\n\
                            </div>';
                mensajeAjax(mensaje);
            }
        });
    });
});

$('.deleteMenu').on('click', function () {
    var item = $(this).closest("tr").find(".id").text();
    let datosEnvio = {
        id: item
    }
    $.ajax({
        type: "POST",
        url: "http://localhost/EvaluacionTecnica/Menumanager/deleteMenu",
        data: datosEnvio,
        success: function (data) {
            mensaje = '<div id="mensaje" class="alert alert-success" role="alert">\n\
                                Elemento Eliminado\n\
                            </div>';
            mensajeAjax(mensaje);
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            mensaje = '<div id="mensaje" class="alert alert-danger" role="alert">\n\
                            Ocurrio un error, intentalo mas tarde\n\
                        </div>';
            mensajeAjax(mensaje);
        }
    });
});

$('#guardarInfo').on('click', function () {
    let id = $("#selectMenuPadre").val();
    let nombre = $("#nombreMenu").val();
    let descripcion = $("#descripcionMenu").val();
    let mensaje = '';
    if (nombre != '') {
        let datosEnvio = {
            id: id,
            nombre: nombre,
            descripcion: descripcion
        }
        $.ajax({
            type: "POST",
            url: "http://localhost/EvaluacionTecnica/Menumanager/saveMenu",
            data: datosEnvio,
            success: function (data) {
                $('#modalAgregar').modal('hide');
                mensaje = '<div id="mensaje" class="alert alert-success" role="alert">\n\
                                    Guardado Exitosamente\n\
                                </div>';
                mensajeAjax(mensaje);
                location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('#modalAgregar').modal('hide');
                mensaje = '<div id="mensaje" class="alert alert-danger" role="alert">\n\
                                Ocurrio un error, intentalo mas tarde\n\
                            </div>';
                mensajeAjax(mensaje);
            }
        });
    } else {
        mensaje = '<div id="mensaje" class="alert alert-danger" role="alert">\n\
                        El nombre es necesario\n\
                    </div>';
        mensajeAjax(mensaje);
    }
});

function mensajeAjax(mensaje) {
    $('#mensajeRespuesta').empty().append(mensaje);
    setTimeout(function () {
        $('#mensaje').fadeOut('slow', function () {
            $(this).remove();
        });
    }, 2000);
}

$('#cancel').on('click', function () {
    $('#guardarInfo').removeAttr('hidden');
    $('#updateInfo').attr("hidden", true);
});