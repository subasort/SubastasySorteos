<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Usuario.php');
class ControladorGanador extends ControladorBase

{

function leer_ganador($id)
{
   if ($id==""){
      $sql = "SELECT * FROM Usuario;";
   }else{
   $parametros = array($id);
      $sql = "SELECT * FROM Usuario WHERE idUsuario = ?;";
   }
   $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
   return $respuesta;
}

function leer_paginado($pagina,$registrosPorPagina)
{
   $desde = (($pagina-1)*$registrosPorPagina);
   $sql ="SELECT * FROM Usuario LIMIT $desde,$registrosPorPagina;";
   $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
   return $respuesta;
}

function numero_paginas($registrosPorPagina)
{
   $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Usuario;";
   $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
   return $respuesta[0];
}

function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
{
   switch ($tipoFiltro){
      case "coincide":
         $parametros = array($filtro);
         $sql = "SELECT * FROM Usuario WHERE $nombreUsuario = ?;";
         break;
      case "inicia":
         $sql = "SELECT * FROM Usuario WHERE $nombreUsuario LIKE '$filtro%';";
         break;
      case "termina":
         $sql = "SELECT * FROM Usuario WHERE $nombreColumna LIKE '%$filtro';";
         break;
      default:
         $sql = "SELECT * FROM Usuario WHERE $nombreColumna LIKE '%$filtro%';";
         break;
   }
   $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
   return $respuesta;
}
}
