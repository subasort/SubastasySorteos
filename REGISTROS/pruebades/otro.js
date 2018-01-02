var urlWS = "";
$(document).ready(function(){
   urlWS = "http://subasort01.byethost24.com/server/";
});

function leer(){
        urltorequest = urlWS +"Usuario/leer";
        $.ajax({
            type: "get",
            url: "http://subasort01.byethost24.com/REGISTROS/prueba2.html",
            async:false,
            success:  function (respuesta) {
           toshow = JSON.parse(respuesta);
           cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>id</th><th>Apellido</th></tr></thead><tbody>";
           pieTabla = "</tbody></table>";
           contenidoTabla = "";
           $(toshow).each(function(key,value){
                contenidoTabla=contenidoTabla+"<tr><td>"+value.idUsuario+"</td><td>"+value.apellidoUsuario+"</td></tr>";
           });
           document.getElementById("respuesta").innerHTML=cabeceraTabla+contenidoTabla+pieTabla;
            }
        });
    }
    
function crear(){
    urltorequest
}