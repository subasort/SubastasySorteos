<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Usuario.php');
class ControladorUsuario extends ControladorBase
{
   function crear(Usuario $usuario)
   {
      $sql = "INSERT INTO Usuario (idUsuario,ciUsuario,nombreUsuario,apellidoUsuario,direccionUsuario,telfUsuario,correoUsuario) VALUES (?,?,?,?,?,?,?);";
      $parametros = array($usuario->idUsuario,$usuario->ciUsuario,$usuario->nombreUsuario,$usuario->apellidoUsuario,$usuario->direccionUsuario,$usuario->telfUsuario,$usuario->correoUsuario);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Usuario $usuario)
   {
      $parametros = array($usuario->idUsuario,$usuario->ciUsuario,$usuario->nombreUsuario,$usuario->apellidoUsuario,$usuario->direccionUsuario,$usuario->telfUsuario,$usuario->correoUsuario,$usuario->idUsuario);
      $sql = "UPDATE Usuario SET idUsuario = ?,ciUsuario = ?,nombreUsuario = ?,apellidoUsuario = ?,direccionUsuario = ?,telfUsuario = ?,correoUsuario = ? WHERE idUsuario = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Usuario WHERE idUsuario = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
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