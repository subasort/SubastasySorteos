<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/InscSubasta.php');
class ControladorInscSubasta extends ControladorBase
{
   function crear(InscSubasta $inscsubasta)
   {
      $sql = "INSERT INTO InscSubasta (idInscSub,idSubasta,idUsuario) VALUES (?,?,?);";
      $parametros = array($inscsubasta->idInscSub,$inscsubasta->idSubasta,$inscsubasta->idUsuario);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(InscSubasta $inscsubasta)
   {
      $parametros = array($inscsubasta->idInscSub,$inscsubasta->idSubasta,$inscsubasta->idUsuario,$inscsubasta->id);
      $sql = "UPDATE InscSubasta SET idInscSub = ?,idSubasta = ?,idUsuario = ? WHERE idInscSub = ?;";
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
      $sql = "DELETE FROM InscSubasta WHERE idInscSub = ?;";
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
         $sql = "SELECT * FROM InscSubasta;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM InscSubasta WHERE idInscSub = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM InscSubasta LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM InscSubasta;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM InscSubasta WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM InscSubasta WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM InscSubasta WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM InscSubasta WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}