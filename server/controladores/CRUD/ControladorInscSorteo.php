<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/InscSorteo.php');
class ControladorInscSorteo extends ControladorBase
{
   function crear(InscSorteo $inscsorteo)
   {
      $sql = "INSERT INTO InscSorteo (idInscSorteo,idSorteo,idUsuario) VALUES (?,?,?);";
      $parametros = array($inscsorteo->idInscSorteo,$inscsorteo->idSorteo,$inscsorteo->idUsuario);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(InscSorteo $inscsorteo)
   {
      $parametros = array($inscsorteo->idInscSorteo,$inscsorteo->idSorteo,$inscsorteo->idUsuario,$inscsorteo->idInscSorteo);
      $sql = "UPDATE InscSorteo SET idInscSorteo = ?,idSorteo = ?,idUsuario = ? WHERE idInscSorteo = ?;";
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
      $sql = "DELETE FROM InscSorteo WHERE idInscSorteo = ?;";
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
         $sql = "SELECT * FROM InscSorteo;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM InscSorteo WHERE idInscSorteo = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM InscSorteo LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM InscSorteo;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM InscSorteo WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM InscSorteo WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM InscSorteo WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM InscSorteo WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}