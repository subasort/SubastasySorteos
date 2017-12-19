var urlWS = "";
$(document).ready(function(){
   urlWS = "http://subasort01.byethost24.com/server/";
   leer(0);
});



function leerfiltrado(){
    filtro = document.getElementById("nombreUsuarioBuscar").value;
    urltorequest = urlWS +"Usuario/leer_filtrado";
    $.ajax({
        type: "get",
        url: urltorequest+"?columna=nombre&tipo_filtro=contiene&filtro="+filtro,
        async:true,
        success:  function (respuesta) {
           toshow = JSON.parse(respuesta);
           cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>id</th><th>Nombre</th></tr></thead><tbody>";
           pieTabla = "</tbody></table>";
           contenidoTabla = "";
           $(toshow).each(function(key,value){
                contenidoTabla=contenidoTabla+"<tr><td>"+value.id+"</td><td>"+value.descripcion+"</td></tr>";
           });
           document.getElementById("respuesta").innerHTML=cabeceraTabla+contenidoTabla+pieTabla;
        }
    });
}

function leer(id){
    if(id==0){
        urltorequest = urlWS +"nombreUsuario/leer";
    }else{
        urltorequest = urlWS +"Usuario/leer?id="+id;
    }
    $.ajax({
        type: "get",
        url: urltorequest,
        async:true,
        success:  function (respuesta) {
           toshow = JSON.parse(respuesta);
           cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>nombreUsuario</th><th>apellidoUsuario</th><th>direccionUsuario</th><th>telfUsuario</th><th>correoUsuario</th></tr></thead><tbody>";
           pieTabla = "</tbody></table>";
           contenidoTabla = "";
           $(toshow).each(function(key,value){
                contenidoTabla=contenidoTabla+"<tr><td>"+value.nombreUsuario+"</td><td>"+value.apellidoUsuario+"</td></tr>"+value.direccionUsuario+"</td></tr>"+value.telfUsuario+"</td></tr>"+value.correoUsuario+"</td></tr>";
           });
           document.getElementById("respuesta").innerHTML=cabeceraTabla+contenidoTabla+pieTabla;
        }
    });
    limpiar();
}

function borrar(){
    nombreUsuario = document.getElementById("nombreUsuario").value ;
    apellidaUsuario = document.getElementById("apellidoUsuario").value ;
    direccionUsuario = document.getElementById("direccionUsuario").value ;
    telfUsuario = document.getElementById("telfUsuario").value ;
    correoUsuario = document.getElementById("correoUsuario").value ;
    urltorequest = urlWS +"Usuario/borrar?id="+id;
    $.ajax({
        type: "get",
        url: urltorequest,
        async:false,
        success:  function (respuesta) {
            if(respuesta=="false"){
                alert("Error al borrar el registro " + nombreUsuario + "."+ apellidoUsuario + "."+ direccionUsuario + "."+ telfUsuario + "."+ correoUsuario + ".");
            }else{
                alert("Registro borrado: " + nombreUsuario + "."+ apellidoUsuario + "."+ direccionUsuario + "."+ telfUsuario + "."+ correoUsuario + ".");
            }
        }
    });
    leer(0);
}

function crear(){
    nombreUsuario = document.getElementById("nombreUsuario").value ;
    apellidaUsuario = document.getElementById("apellidoUsuario").value ;
    direccionUsuario = document.getElementById("direccionUsuario").value ;
    telfUsuario = document.getElementById("telfUsuario").value ;
    correoUsuario = document.getElementById("correoUsuario").value ;
    urltorequest = urlWS +"Usuario/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data:JSON.stringify({nombreUsuario: nombreUsuario, apellidoUsuario: apellidoUsuario,direccionUsuario:direccionUsuario,telfUsuario:telfUsuario,correoUsuario:correoUsuario}),
        async:false,
        success:  function (respuesta) {
            if(respuesta=="false"){
                alert("Error al crear el registro");
            }else{
                alert("Registro creado.");
            }
        }
    });

    leer(0);

function actualizar(){
    nombreUsuario = document.getElementById("nombreUsuario").value;
    apellidoUsuario = document.getElementById("apellidoUsuario").value;
    direccionUsuario = document.getElementById("direccionUsuario").value ;
    telfUsuario = document.getElementById("telfUsuario").value ;
    correoUsuario = document.getElementById("correoUsuario").value;
    urltorequest = urlWS +"Usuario/actualizar";
    $.ajax({
        type: "post",
        url: urltorequest,
        data:JSON.stringify({nombreUsuario: nombreUsuario, apellidoUsuario: apellidoUsuario,direccionUsuario:direccionUsuario,telfUsuario:telfUsuario,correoUsuario:correoUsuario}),
        async:false,
        success:  function (respuesta) {
            if(respuesta=="false"){
                alert("Error al actualizar el registro");
            }else{
                alert("Registro actualizado.");
            }
        }
    });
    leer(0);
}
}