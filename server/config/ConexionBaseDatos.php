<?php
include_once("../persistencia/DatosConexion.php");
class ConexionBaseDatos {
    private static $array = array();
    public static function DatosConexiones(){
        $array = array();
                $array[] = new DatosConexion('local','sql313.byethost24.com','b24_21140747_SUBASORT','b24_21140747','hqsrvpkt');
                return $array;
    }
}