var urlWS = "";
$(document).ready(function () {
    urlWS = "http://subasort01.byethost24.com/server/";

});
function limpiar(){
    urltorequest = urlWS +"Usuario/leer";
    document.getElementById("idUsuario").value = "";
    document.getElementById("nombreUsuario").value = "";
    document.getElementById("apellidoUsuario").value = "";
    document.getElementById("ciUsuario").value = "";
    document.getElementById("direccionUsuario").value = "";
    document.getElementById("telfUsuario").value = "";
    document.getElementById("correoUsuario").value = "";
}
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
            if (respuesta == "true") {
                alert("Registro creado");
            } else {
                alert("registro no se pudo crear")
            }
        }
    });
  limpiar();
}

function leer(){
    urltorequest = urlWS +"Usuario/leer";
    $.ajax({
        type: "get",
        url: urltorequest,
        async:false,
        success:  function (respuesta) {
       toshow = JSON.parse(respuesta);
       cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>ids</th><th>Nombre</th><th>Apellido</th><th>cedula</th><th>Direccion</th><th>Telefono</th><th>correo</th></tr></thead><tbody>";
       pieTabla = "</tbody></table>";
       contenidoTabla = "";
       $(toshow).each(function(key,value){
            contenidoTabla=contenidoTabla+"<tr><td>"+value.idUsuario+"</td><td>"+value.nombreUsuario+"</td><td>"+value.apellidoUsuario+"</td><td>"+value.ciUsuario+"</td><td>"+value.direccionUsuario+"</td><td>"+value.telfUsuario+"</td><td>"+value.correoUsuario+"</td></tr>";
       });
       document.getElementById("respuesta").innerHTML=cabeceraTabla+contenidoTabla+pieTabla;
        }
    });

}

