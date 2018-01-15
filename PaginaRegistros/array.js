function usoArray(parametro) {

    //declaramos una variable y le asignamos el valor que se recoge de parametro
    var valor_recivido = parametro.value;

    //Declaramos un array y le agregamos los valos que estamos ingresando
    var array = [valor_recivido] ;

    //Recorremos el array para ir mostrando lo que se va ingresando

    for ( i = 0; i < array.length; i++) {
         var resultado = array[i];
         imprimir(resultado);   
    }

}

function imprimir(valor){

    document.getElementById("resultado").innerHTML += valor + "<br>";
    
}