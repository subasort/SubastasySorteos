var urlWS = "";
$(document).ready(function(){
   urlWS = "http://subasort01.byethost24.com/server/";
   leer(0);
});

function limpiar(){
    urltorequest = urlWS +"Usuario/leer";
    document.getElementById("idUsuario").value = "";
    document.getElementById("nombreUsuario").value = "";
    document.getElementById("apellidoUsuario").value = "";
    document.getElementById("direccionUsuario").value = "";
    document.getElementById("telfUsuario").value = "";
    document.getElementById("correoUsuario").value = "";
}

function leer(id){
   
        urltorequest = urlWS +"Usuario/leer";
    $.ajax({
        type: "get",
        url: urltorequest,
        async:false,
        success:  function (respuesta) {
           toshow = JSON.parse(respuesta);
           cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>id</th><th>Nombre</th><th>Apellido</th><th>Direccion</th><th>Telefono</th><th>correo</th></tr></thead><tbody>";
           pieTabla = "</tbody></table>";
           contenidoTabla = "";
           $(toshow).each(function(key,value){
                contenidoTabla=contenidoTabla+"<tr><td>"+value.idUsuario+"</td><td>"+value.nombreUsuario+"</td><td>"+value.apellidoUsuario+"</td><td>"+value.direccionUsuario+"</td><td>"+value.telfUsuario+"</td><td>"+value.correoUsuario+"</td></tr>";
           });
           document.getElementById("respuesta").innerHTML=cabeceraTabla+contenidoTabla+pieTabla;
        }
    });
    leer(0);
}
 

function crear(){
    idUsuario = document.getElementById("idUsuario").value ;
    nombreUsuario = document.getElementById("nombreUsuario").value ;
    apellidaUsuario = document.getElementById("apellidoUsuario").value ;
    direccionUsuario = document.getElementById("direccionUsuario").value ;
    telfUsuario = document.getElementById("telfUsuario").value ;
    correoUsuario = document.getElementById("correoUsuario").value ;
    urltorequest = urlWS +"Usuario/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data:JSON.stringify({idUsuario: idUsuario, nombreUsuario: nombreUsuario, apellidoUsuario: apellidoUsuario,direccionUsuario:direccionUsuario,telfUsuario:telfUsuario,correoUsuario:correoUsuario}),
        async:true,
        success:  function (respuesta) {
            if(respuesta=="true"){
                alert("Error al crear el registro");
            }else{
                alert("Registro creado.");
            }
        }
    });
    leer(0);
}

function borrar(){
    idUsuario = document.getElementById("idUsuario").value ;
    nombreUsuario = document.getElementById("nombreUsuario").value ;
    apellidoUsuario = document.getElementById("apellidoUsuario").value ;
    direccionUsuario = document.getElementById("direccionUsuario").value ;
    telfUsuario = document.getElementById("telfUsuario").value ;
    correoUsuario = document.getElementById("correoUsuario").value ;
    urltorequest = urlWS +"Usuario/borrar?id="+idUsuario;
    $.ajax({
        type: "get",
        url: urltorequest,
        async:false,
        success:  function (respuesta) {
            if(respuesta=="false"){
                alert("Errorrar or al bel registro " + nombreUsuario + "."+ apellidoUsuario + "."+ direccionUsuario + "."+ telfUsuario + "."+ correoUsuario + ".");
            }else{
                alert("Registro borrado: " + nombreUsuario + "."+ apellidoUsuario + "."+ direccionUsuario + "."+ telfUsuario + "."+ correoUsuario + ".");
            }
        }
    });
    leer(0);
}
   

function actualizar(){
    
    idUsuario = document.getElementById("idUsuario").value ;
    nombreUsuario = document.getElementById("nombreUsuario").value;
    apellidoUsuario = document.getElementById("apellidoUsuario").value;
    direccionUsuario = document.getElementById("direccionUsuario").value ;
    telfUsuario = document.getElementById("telfUsuario").value ;
    correoUsuario = document.getElementById("correoUsuario").value;
    urltorequest = urlWS +"Usuario/actualizar";
    $.ajax({
        type: "post",
        url: urltorequest,
        data:JSON.stringify({idUsuario: idUsuario,nombreUsuario: nombreUsuario, apellidoUsuario: apellidoUsuario,direccionUsuario:direccionUsuario,telfUsuario:telfUsuario,correoUsuario:correoUsuario}),
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
