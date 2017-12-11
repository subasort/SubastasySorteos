<?php
include_once("../persistencia/DatosConexion.php");
class ConexionBaseDatos {
    private static $array = array();
    public static function DatosConexiones(){
        $array = array();
        
        $array[] = new DatosConexion("sql313.byethost24.com","	subasort01.byethost24.com","ignug","b24_21140747","hqsrvptkt");
        return $array;
    }
}