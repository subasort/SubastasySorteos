var urlWS = "";
$(document).ready(function () {
    urlWS = "http://subasort01.byethost24.com/server/";

});
function limpiar() {
    urltorequest = urlWS + "Producto/leer";
    document.getElementById("idProducto").value = "";
    document.getElementById("nomProducto").value = "";
    document.getElementById("descProducto").value = "";
    document.getElementById("precioCompra").value = "";
}
function leerfiltrado() {
    type: "get",
        filtro = document.getElementById("nomProductoBuscar").value;
    urltorequest = urlWS + "Producto/leer_filtrado";
    $.ajax({
        type: "get",
        url: urltorequest + "?columna=nomProducto&tipo_filtro=contiene&filtro=" + filtro,
        async: true,
        success: function (respuesta) {
            toshow = JSON.parse(respuesta);
            cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>idProducto</th><th>nomProducto</th></tr></thead><tbody>";
            pieTabla = "</tbody></table>";
            contenidoTabla = "";
            $(toshow).each(function (key, value) {
                contenidoTabla = contenidoTabla + "<tr><td>" + value.idProducto + "</td><td>" + value.nomProducto + "</td></tr>";
            });
            document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
        }
    });
}
function crear() {
    idProducto = document.getElementById("idProducto").value;
    nomProducto = document.getElementById("nomProducto").value;
    descProducto = document.getElementById("descProducto").value;
    precioCompra = document.getElementById("precioCompra").value;
    urltorequest = urlWS + "Producto/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({
            idProducto: idProducto, nomProducto: nomProducto,
            descProducto: descProducto, precioCompra: precioCompra
        }),
        async: true,
        success: function (respuesta) {
            if (respuesta == "true") {
                alert("Registro creado");
            } else {
                alert("registro no se pudo crear")
            }
        }
    });
    limpiar();
    leer();
}

function leer() {
    urltorequest = urlWS + "Producto/leer";
    $.ajax({
        type: "get",
        url: urltorequest,
        async: false,
        success: function (respuesta) {
            toshow = JSON.parse(respuesta);
            cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>ids</th><th>NombreProducto</th><th>Descuento</th><th>Precio de compra</th></tr></thead><tbody>";
            pieTabla = "</tbody></table>";
            contenidoTabla = "";
            $(toshow).each(function (key, value) {
                contenidoTabla = contenidoTabla + "<tr><td>" + value.idProducto + "</td><td>" + value.nomProducto + "</td><td>" + value.descProducto + "</td><td>" + value.precioCompra + "</td></tr>";
            });
            document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
        }
    });

}


function borrar() {
    idProducto = document.getElementById("idProducto").value;

    urltorequest = urlWS + "Producto/borrar?id=" + idProducto;
    $.ajax({
        type: "get",
        url: urltorequest,
        async: false,
        success: function (respuesta) {
            if (respuesta == "false") {
                alert("Error al borrar el registro:" + idProducto + ".");
            } else {
                alert("Registro borrado:" + idProducto + ".");
            }
        }
    });
    limpiar();
    leer();

}

function actualizar() {
    idProducto = document.getElementById("idProducto").value;
    nomProducto = document.getElementById("nomProducto").value;
    descProducto = document.getElementById("descProducto").value;
    precioCompra = document.getElementById("precioCompra").value;
    urltorequest = urlWS + "Producto/actualizar";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({
            idProducto: idProducto, nomProducto: nomProducto,
            descProducto: descProducto, precioCompra: precioCompra
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
