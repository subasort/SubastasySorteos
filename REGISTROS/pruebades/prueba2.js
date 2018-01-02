var urlWS = "";
$(document).ready(function () {
    urlWS = "http://subasort01.byethost24.com/server/";

});

function crear() {
    idUsuario = document.getElementById("idUsuario").value;
    ciUsuario = document.getElementById("ciUsuario").value;
    nombreUsuario = document.getElementById("nombreUsuario").value;
    apellidoUsuario = document.getElementById("apellidoUsuario").value;
    direccionUsuario = document.getElementById("direccionUsuario").value;
    telfUsuario = document.getElementById("telfUsuario").value;
    correoUsuario = document.getElementById("correoUsuario").value;
    urltorequest = urlWS + "Usuario/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({
            idUsuario: idUsuario, ciUsuario: ciUsuario, nombreUsuario: nombreUsuario,
            apellidoUsuario: apellidoUsuario, direccionUsuario: direccionUsuario,
            telfUsuario: telfUsuario, correoUsuario: correoUsuario
        }),
        async: true,
        success: function (respuesta) {
            if (respuesta == "false") {
                alert("Registro creado");
            } else {
                alert("registro no se pudo crear")
            }
        }
    });
}

