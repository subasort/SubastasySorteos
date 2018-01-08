var urlWS = "";
$(document).ready(function () {
    urlWS = "http://subasort01.byethost24.com/server/";

});
function limpiar() {
    urltorequest = urlWS + "InscSubasta/leer";
    document.getElementById("idInscSub").value = "";
    document.getElementById("idSubasta").value = "";
    document.getElementById("ciUsuario").value = "";
   
    
function leerfiltrado() {
    type: "get",
        filtro = document.getElementById("nombreUsuarioBuscar").value;
    urltorequest = urlWS + "InscSubasta/leer_filtrado";
    $.ajax({
        type: "get",
        url: urltorequest + "?columna=idSubasta&tipo_filtro=contiene&filtro=" + filtro,
        async: true,
        success: function (respuesta) {
            toshow = JSON.parse(respuesta);
            cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>idInscSub</th><th>idSubasta</th><th>idUsuario</th></tr></thead><tbody>";
            pieTabla = "</tbody></table>";
            contenidoTabla = "";
            $(toshow).each(function (key, value) {
                contenidoTabla = contenidoTabla + "<tr><td>" + value.idInscSub + "</td><td>" + value.idSubasta + "</td><td>" + value.ciUsuario + "</td></tr>";
            });
            document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
        }
    });
}
function crear() {
    idInscSub = document.getElementById("idInscSub").value;
    idSubasta = document.getElementById("idSubasta").value;
    ciUsuario = document.getElementById("ciUsuario").value;
   
    urltorequest = urlWS + "InscSubasta/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({
            idInscSub: idInscSub, idSubasta :idSubasta, ciUsuario: ciUsuario
        }),
        async: true,
        success: function (respuesta) {
            if (respuesta == "true") {
                alert("Usuario Inscrito");
            } else {
                alert("Usuario no se pudo inscribir o exceso de insccripsiones")
            }
        }
    });
    limpiar();
    leer();
}

function leer() {
    idInscSub = document.getElementById("idInscSub").value;
    idSubasta = document.getElementById("idSubasta").value;
    ciUsuario = document.getElementById("ciUsuario").value;
    urltorequest = urlWS + "InscSubasta/leer";
    $.ajax({
        type: "get",
        url: urltorequest,
        async: false,
        success: function (respuesta) {
            toshow = JSON.parse(respuesta);
            cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>ids de inscripcion</th><th>Numero para sortear</th><th>céduda</th></tr></thead><tbody>";
            pieTabla = "</tbody></table>";
            contenidoTabla = "";
            $(toshow).each(function (key, value) {
                contenidoTabla = contenidoTabla + "<tr><td>" + value.idInscSub + "</td><td>" + value.idSubasta + "</td><td>" + value.ciUsuario+ "</td></tr>";
            });
            document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
        }
    });

}


function borrar() {
    idInscSub = document.getElementById("idInscSub").value;
    idSubasta = document.getElementById("idSubasta").value;
    ciUsuario = document.getElementById("ciUsuario").value;
    
    urltorequest = urlWS + "InscSubasta/borrar?id=" + idInscSub;
    $.ajax({
        type: "get",
        url: urltorequest,
        async: false,
        success: function (respuesta) {
            if (respuesta == "false") {
                alert("Error al borrar el registro:" + idInscSub + ".");
            } else {
                alert("Registro borrado:" + idInscSub + ".");
            }
        }
    });
    limpiar();
    leer();

}

function actualizar() {
    idInscSub = document.getElementById("idInscSub").value;
    idSubasta = document.getElementById("idSubasta").value;
    ciUsuario = document.getElementById("ciUsuario").value;
    urltorequest = urlWS + "InscSubasta/actualizar";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({
            idInscSub: idInscSub, idSubasta: idSubasta, ciUsuario: ciUsuario
           
        }),
        async: false,
        success: function (respuesta) {
            if (respuesta == "false") {
                alert("Error al actualizar el registro");
            } else {
                alert("Registro actualizado.");
            }
        }
    });
    limpiar();
    leer();
}
}