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
function leerfiltrado(){
        type: "get",
        filtro = document.getElementById("nombreUsuarioBuscar").value;
    urltorequest = urlWS +"Usuario/leer_filtrado";
    $.ajax({
        type: "get",
        url: urltorequest+"?columna=nombreUsuario&tipo_filtro=contiene&filtro="+filtro,
        async:true,
        success:  function (respuesta) {
           toshow = JSON.parse(respuesta);
           cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>idUsaurio</th><th>nombreUsuario</th></tr></thead><tbody>";
           pieTabla = "</tbody></table>";
           contenidoTabla = "";
           $(toshow).each(function(key,value){
                contenidoTabla=contenidoTabla+"<tr><td>"+value.idUsaurio+"</td><td>"+value.nombreUsuario+"</td></tr>";
           });
           document.getElementById("respuesta").innerHTML=cabeceraTabla+contenidoTabla+pieTabla;
        }
    });
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


function borrar(){
    idUsuario = document.getElementById("idUsuario").value ;
    
    urltorequest = urlWS +"Usuario/borrar?idUsuario="+idUsuario;
    $.ajax({
        type: "get",
        url: urltorequest,
        async:false,
        success:  function (respuesta) {
            if(respuesta=="false"){
                alert("Error al borrar el registro:"+ idUsuario + ".");
            }else{
                alert("Registro borrado:"+ idUsuario + ".");
            }
        }
    });
   
}

function actualizar(){
    idUsuario = document.getElementById("idUsuario").value ;
    nombreUsuario = document.getElementById("nombreUsuario").value ;
    apellidoUsuario = document.getElementById("apellidoUsuario").value ;
    ciUsuario = document.getElementById("ciUsuario").value;
    direccionUsuario = document.getElementById("direccionUsuario").value ;
    telfUsuario = document.getElementById("telfUsuario").value ;
    correoUsuario = document.getElementById("correoUsuario").value ;
    urltorequest = urlWS +"Usuario/actualizar";
    $.ajax({
        type: "post",
        url: urltorequest,
        data:JSON.stringify({idUsuario: idUsuario, ciUsuario: ciUsuario, nombreUsuario: nombreUsuario,
            apellidoUsuario: apellidoUsuario, direccionUsuario: direccionUsuario,
            telfUsuario: telfUsuario, correoUsuario: correoUsuario}),
        async:true,
        success:  function (respuesta) {
            if(respuesta=="true"){
                alert("Error al actualizar el registro");
            }else{
                alert("Registro actualizado.");
            }
        }
    });
    limpiar();
}