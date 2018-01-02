$(function(){
    var operation = "C";
    var selected_prueba2 = -1;
    var tblUsuario= localStorage.getItem("tblUsuario");
    tblUsuario = JSON.parse(tblUsuario);
    if (tblUsuario === null)
        tblUsuario = [];

    function Create() {
        
        var Usaurio = JSON.stringify(tblUsuario({
            idUsuario: $("#idUsuario").val(),
            nomnreUsuario: $("#nomnreUsuario").val(),
            apellidoUsuario: $("#apellidoUsuario").val(),
            telfUsuario: $("#telfUsuario").val(),
            direccionUsuario: $("#direccionUsuario").val(),
            correoUsuario: $("#correoUsuario").val()

        });
        
        tblUsuario.push(Usuario);

        localStorage.setItem("tblUIsuario",JSON.stringify(tblUsuario));
        alert("datos no almasenados");

 
    }

});