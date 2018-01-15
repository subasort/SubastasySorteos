<?php

SELECT * FROM idUsuario ORDER BY RAND( ) LIMIT 0 , 100

//Conexion con la base 
$conn = mysql_connect("localhost","root","123456"); 

//selección de la base de datos con la que vamos a trabajar 
mysql_select_db("concurso-rwd", $conn); 

//Selecciono el número de participantes con count 
$ssql = "select count(*) as num from participante where 1"; 
if(!$rs = mysql_query($ssql, $conn)){ 
   //si la sentencia dio error de sql, lo muestro 
   echo mysql_error(); 
   exit; 
} 

//extraigo el número de participantes 
$num_participantes = mysql_fetch_object($rs)->num; 

//alimento con la semilla la generación de aleatorios 
srand (time()); 

//creo un array donde voy a colocar los ID de los participantes que han sido premiados. 
$array_id_ganadores = array(); 

//mientras el número de ganadores sea menor que 100 (100 premios que se otorgan) 
while(count($array_id_ganadores) < 100){ 
   //generamos un número aleatorio 
   $numero_aleatorio = rand(1,$num_participantes); 
   //compruebo si ya estaba ese ID ganador en el array 
   if(!in_array($numero_aleatorio, $array_id_ganadores)){ 
      //si el participante no estaba en el array, entonces lo meto dentro de los ganadores. 
      array_push($array_id_ganadores, $numero_aleatorio); 
   } 
} 

//ahora tengo los 100 diferentes ganadores en un array 
//voy a seleccionar los datos de los participantes cuyos ID se seleccionaron como ganadores 
$ssql = "select * from participante where id in (" . implode(",", $array_id_ganadores) . ")"; 

//ejecutamos la sentencia 
$rs = mysql_query($ssql, $conn);