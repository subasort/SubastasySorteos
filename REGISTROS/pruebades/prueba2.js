var urlWS = "";
$(document).ready(function() {
 
    urlWS = "http://subasort01.byethost24.com/server/";
});

function crear(){
    idUsuario = document.getElementById("idUsuario").value;
    nombreUsuario = document.getElementById("nombreUsuario").value;
    urlWS +"Usuario/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data:JSON.stringify({idUsuario: idUsuario, nombreUsuario: nombreUsuario}),
        async:true,
        success: function (respuesta) {
            if(respuesta=="false"){
                alert("Registro creado");
            }else{
                alert("registro no se pudo crear")
            }
        }
    });
    leer();
}
