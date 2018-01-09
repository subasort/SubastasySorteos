var urlWS = "";
$(document).ready(function () {
    urlWS = "http://subasort01.byethost24.com/server/";

});
function leer() {
    urltorequest = urlWS + "Usuario/leer";
    $.ajax({
        type: "get",
        url: urltorequest,
        async: false,
        success: function (respuesta) {
            toshow = JSON.parse(respuesta);
            cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>ids</th><th>Nombre</th></tr></thead><tbody>";
            pieTabla = "</tbody></table>";
            contenidoTabla = "";

            $(toshow).each(function (key, value) {
                contenidoTabla = contenidoTabla + "<tr><td>" + value.idUsuario + "</td><td>" + value.nombreUsuario + "</td></tr>";
            });
            document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
        }
    });
}

function leer_ganador() {
    urltorequest = urlWS + "Usuario/leer";

    var $db_Usuario = ["jorge", "christian", "carlos"],
        random = (max, min, inclusive) => inclusive === true ?
            Math.floor(Math.random() * (max - min + 1) + min) :
            Math.floor(Math.random() * (max - min) + min),

        nameSelected = $db_Usuario[random($db_Usuario.length, 0, "false")];


    console.log(nameSelected);


}
