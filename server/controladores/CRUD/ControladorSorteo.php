<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Sorteo.php');
class ControladorSorteo extends ControladorBase
{
   function crear(Sorteo $sorteo)
   {
      $sql = "INSERT INTO Sorteo (idSorteo,idProdSorteo,idGanaSorteo,fechaSorteo,precioBoleto) VALUES (?,?,?,?,?);";
      $parametros = array($sorteo->idSorteo,$sorteo->idProdSorteo,$sorteo->idGanaSorteo,$sorteo->fechaSorteo,$sorteo->precioBoleto);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Sorteo $sorteo)
   {
      $parametros = array($sorteo->idSorteo,$sorteo->idProdSorteo,$sorteo->idGanaSorteo,$sorteo->fechaSorteo,$sorteo->precioBoleto,$sorteo->id);
      $sql = "UPDATE Sorteo SET idSorteo = ?,idProdSorteo = ?,idGanaSorteo = ?,fechaSorteo = ?,precioBoleto = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Sorteo WHERE id = ?;";
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
         $sql = "SELECT * FROM Sorteo;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Sorteo WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Sorteo LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Sorteo;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Sorteo WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Sorteo WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Sorteo WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Sorteo WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}