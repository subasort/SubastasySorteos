<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Subasta.php');
class ControladorSubasta extends ControladorBase
{
   function crear(Subasta $subasta)
   {
      $sql = "INSERT INTO Subasta (idSubasta,idProdSubasta,idGanaSubasta,fechaSubasta,montoMinimo) VALUES (?,?,?,?,?);";
      $parametros = array($subasta->idSubasta,$subasta->idProdSubasta,$subasta->idGanaSubasta,$subasta->fechaSubasta,$subasta->montoMinimo);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Subasta $subasta)
   {
      $parametros = array($subasta->idSubasta,$subasta->idProdSubasta,$subasta->idGanaSubasta,$subasta->fechaSubasta,$subasta->montoMinimo,$subasta->id);
      $sql = "UPDATE Subasta SET idSubasta = ?,idProdSubasta = ?,idGanaSubasta = ?,fechaSubasta = ?,montoMinimo = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Subasta WHERE id = ?;";
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
         $sql = "SELECT * FROM Subasta;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Subasta WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Subasta LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Subasta;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Subasta WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Subasta WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Subasta WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Subasta WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}