var urlWS = "";
$(document).ready(function () {
    urlWS = "http://subasort01.byethost24.com/server/";

});
function limpiar() {
    urltorequest = urlWS + "InscSorteo/leer";
    document.getElementById("idInscSorteo").value = "";
    document.getElementById("idSorteo").value = "";
    document.getElementById("idUsuario").value = "";
   
    
function leerfiltrado() {
    type: "get",
        filtro = document.getElementById("nombreUsuarioBuscar").value;
    urltorequest = urlWS + "InscSorteo/leer_filtrado";
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
                contenidoTabla = contenidoTabla + "<tr><td>" + value.idInscSorteo + "</td><td>" + value.idSorteo + "</td><td>" + value.idUsuario + "</td></tr>";
            });
            document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
        }
    });
}
function crear() {
    idInscSub = document.getElementById("idInscSorteo").value;
    idSubasta = document.getElementById("idSorteo").value;
    ciUsuario = document.getElementById("idUsuario").value;
   
    urltorequest = urlWS + "InscSorteo/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({
            idInscSorteo: idInscSorteo, idSorteo :idSorteo, idUsuario: idUsuario
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
   
    urltorequest = urlWS + "InscSorteo/leer";
    $.ajax({
        type: "get",
        url: urltorequest,
        async: false,
        success: function (respuesta) {
            toshow = JSON.parse(respuesta);
            cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>ids </th><th>NumeroSorteo</th><th>idUsuario</th></tr></thead><tbody>";
            pieTabla = "</tbody></table>";
            contenidoTabla = "";
            $(toshow).each(function (key, value) {
                contenidoTabla = contenidoTabla + "<tr><td>" + value.idInscSorteo + "</td><td>" + value.idSorteo + "</td><td>" + value.idUsuario+ "</td></tr>";
            });
            document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
        }
    });

}


function borrar() {
    idInscSub = document.getElementById("idInscSorteo").value;
    idSubasta = document.getElementById("idSorteo").value;
    ciUsuario = document.getElementById("idUsuario").value;
    
    
    urltorequest = urlWS + "InscSorteo/borrar?id=" + idInscSosrteo;
    $.ajax({
        type: "get",
        url: urltorequest,
        async: false,
        success: function (respuesta) {
            if (respuesta == "false") {
                alert("Error al borrar el registro:" + idInscSort + ".");
            } else {
                alert("Registro borrado:" + idInscSort + ".");
            }
        }
    });
    limpiar();
    leer();

}

function actualizar() {
    idInscSub = document.getElementById("idInscSort").value;
    idSubasta = document.getElementById("idSubasta").value;
    ciUsuario = document.getElementById("idUsuario").value;
    urltorequest = urlWS + "InscSubasta/actualizar";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({
            idInscSub: idInscSub, idSubasta: idSubasta, idUsuario: idUsuario
           
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